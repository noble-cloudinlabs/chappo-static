<?php
/*
    Plugin Name: Ulina Assistance
    Plugin URI: https://omanthemes.com/ulina/wp/
    Description: Assistance plugin for all Ulina Assistance.
    Version: 1.0.1
    Author: UIUXOM
    Author URI: https://themeforest.net/user/uiuxom
    License: 
    Text Domain: uiuxom
*/

if (!defined('ABSPATH')) {
    exit;
}

/* * ---------------------------------------------------------------
* Including Files
* -------------------------------------------------------------* */
require_once dirname(__FILE__) . '/autoload.php';

class UIUXOM_Assistance
{
    public static $_instance;

    public $plugin_name = 'Ulina Assistance';
    public $plugin_version = '1.0.1';
    public $file = __FILE__;


    public function __construct(){
        add_action('init', array($this, 'UIUXOM_load_textdomain'));
        add_action('plugins_loaded', array($this, 'UIUXOM_init'));
        $this->constants();
    }

    public function constants(){
        define('UIUXOM_PLUGIN_NAME', $this->plugin_name);
        define('UIUXOM_VERSION', $this->plugin_version);
        define('UIUXOM_FILE', $this->file);
        define('UIUXOM_URL', plugins_url('', $this->file));
        define('UIUXOM_ASSETS', plugins_url('', $this->file) . '/assets');
    }

    /* * ---------------------------------------------------------------
    * Init all hooks and others
    * -------------------------------------------------------------* */
    public function UIUXOM_init()
    {
        include dirname(__FILE__) . '/inc/helpers/helpers.php';
        add_action('wp_enqueue_scripts', array($this, 'UIUXOM_enqueue_fontend_js_and_css'), 10);
        add_action('admin_enqueue_scripts', array($this, 'UIUXOM_admin_enqueue_scripts'));
        add_action('widgets_init', array($this, 'UIUXOM_widgets_init'));
        add_filter('pre_get_posts', array($this, 'UIUXOM_search_filter'));
        add_shortcode('post_view', array($this, 'UIUXOM_post_view'));

        add_action('wp_ajax_nopriv_post_like', array($this, 'ulina_ajax_post_like'));
        add_action('wp_ajax_post_like', array($this, 'ulina_ajax_post_like'));
        add_shortcode('post_like', array($this, 'ulina_post_like'));

        $this->UIUXOM_taxonomy_and_post_type_caller();
        $this->UIUXOM_post_type_caller();
        new Uiuxom_Assistance_Helpers();
        new Uiuxom_Users_Meta_Hooks();

        //check elementor load
        if (did_action('elementor/loaded')) {
            Uiuxom_Elementor::UIUXOM_get_instance();
            new Uiuxom_Builder();
        }
        add_action('admin_head', array($this, 'UIUXOM_hide_brizy_admin_notice'));

        add_shortcode('product-share', array($this, 'UIUXOM_Product_Share'));

        add_filter('gutenberg_use_widgets_block_editor', '__return_false');
        add_filter('use_widgets_block_editor', '__return_false');
        
        if (class_exists('woocommerce')):
            add_action('comment_post', [$this, 'uiuxom_insert_product_review_title'], 10, 1 );
            add_action('edit_comment', [$this, 'uiuxom_edit_product_review_title'] );
            add_action( 'add_meta_boxes_comment', [$this, 'uiuxom_add_comment_meta_box'] );
        endif;
    }

    /* * ---------------------------------------------------------------
    * Load textdomain
    * -------------------------------------------------------------* */

    public function UIUXOM_taxonomy_and_post_type_caller(){
        $tmgc_tax = new Uiuxom_Taxonomies('uiuxom');
        $tmgc_tax->UIUXOM_inits('product_brand', 'Brand', 'Brands', 'product');
        $tmgc_tax->UIUXOM_inits('product_collection', 'Collection', 'Collections', 'product');
    }

    /* * ---------------------------------------------------------------
    * Custome Post Type
    * -------------------------------------------------------------* */
    public function UIUXOM_post_type_caller()
    {
        $tmgc_posts = new Uiuxom_Custom_Post('uiuxom');
        $tmgc_posts->UIUXOM_inits('blocks', 'Block', 'Blocks', array('menu_icon' => 'dashicons-editor-kitchensink'));
    }

    /* * ----------------------------------------------------------
    * JS and CSS for Frontend
    * -------------------------------------------------------------* */
    public static function UIUXOM_instance(){
        if (!isset(self::$_instance)) {
            self::$_instance = new UIUXOM_Assistance();
        }
        return self::$_instance;
    }

    function UIUXOM_enqueue_fontend_js_and_css(){
        wp_enqueue_script('ulina-assistance', plugin_dir_url($this->file).'assets/js/ulina-assistance.js', array('jquery'), '', true);
        wp_localize_script( 'ulina-assistance', 'ulina_ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
    }

    /* * ---------------------------------------------------------------
    * Load Css For WP Login
    * -------------------------------------------------------------* */
    public function UIUXOM_load_textdomain()
    {
        load_plugin_textdomain('uiuxom', false, dirname(__FILE__) . '/languages');
    }

    /* * ---------------------------------------------------------------
    * Taxonomy Caller
    * -------------------------------------------------------------* */
    public function UIUXOM_widgets_init(){
        register_widget('Uiuxom_Gallery_Widgets');
        register_widget('Uiuxom_Recentpost_Widgets');
        register_widget('Uiuxom_Social_Widgets');
        register_widget('Uiuxom_Megamenu_Lookbook_Widgets');
    }

    /* * ---------------------------------------------------------------
    * Posttype Caller
    * -------------------------------------------------------------* */
    public function UIUXOM_admin_enqueue_scripts()
    {
        if (function_exists('wp_enqueue_media')) {
            wp_enqueue_media();
        } else {
            wp_enqueue_style('thickbox');
            wp_enqueue_script('media-upload');
            wp_enqueue_script('thickbox');
        }

        wp_enqueue_style('ulina-assistance', plugin_dir_url($this->file) . 'assets/css/admin_style.css', false);
        wp_enqueue_script('uiuxom-theme-core', plugin_dir_url($this->file) . 'assets/js/uiuxom_admin.js', false);
    }

    /* * ---------------------------------------------------------------
    * Hide Brizy
    * -------------------------------------------------------------* */
    function UIUXOM_hide_brizy_admin_notice()
    {
        echo '<style>
        .notice.fw-brz-dismiss {display: none;} 
      </style>';
    }

    /**---------------------------------------------------------------
     * Post View Shortcodes
     * -------------------------------------------------------------**/
    public function UIUXOM_post_view($atts){
        extract(
            shortcode_atts(
                array(
                    'pid' => 0
                ),
                $atts
            )
        );

        if ($pid < 1) {
            return '';
        }

        $view = get_post_meta($pid, '_ulina_post_view', true);
        $view = (empty($view)) ? esc_html__('0', 'uiuxom') : $view;

        $html = ' <a class="fview" href="'.get_the_permalink().'"><i class="ulina-eye"></i>'.esc_html($view).'</a>';

        return $html;
    }

    /**---------------------------------------------------------------
    * Post Like Ajax
    * -------------------------------------------------------------**/
    public function ulina_ajax_post_like(){
        $pid = $_POST['pid'];
            
        $like = get_post_meta($pid, '_ulina_post_like', true);
        $like = ( empty($like) ) ? 0 : $like;
        $like++;
        
        update_post_meta($pid, '_ulina_post_like', $like);
        echo wp_kses_post($like);
        wp_die();
    }
    
    /**---------------------------------------------------------------
    * Post Like Shortcodes
    * -------------------------------------------------------------**/
    public function ulina_post_like($atts){
        extract(
            shortcode_atts(
                array(
                    'pid'   => 0
                ), 
                $atts
            )
        );
        
        if($pid < 1){
            return '';
        }
        
        $post_like = get_post_meta($pid, '_ulina_post_like', TRUE);
        $post_like = ($post_like > 0) ? $post_like : 0;
        
        $html = '<a class="post_like" href="'.$pid.'"><i class="ulina-thumbs-up"></i><span>'.$post_like.'</span></a>';
        return $html;
    }

    /**---------------------------------------------------------------
    * Search Filter
    * -------------------------------------------------------------**/
    public function UIUXOM_search_filter($query)
    {
        if ($query->is_search) {
            if (isset($_GET['product_cat']) && !empty($_GET['product_cat'])) {
                $args['tax_query'] = array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => sanitize_text_field(wp_unslash($_REQUEST['product_cat'])),
                    ),
                );
            }
        }
        return $query;
    }

    /**---------------------------------------------------------------
    * Product Shares
    * -------------------------------------------------------------**/
    public function UIUXOM_Product_Share($atts){
        global $post;
        extract(
            shortcode_atts(
                array(
                    'pid' => 0,
                ), $atts
            )
        );
        $postID = ($pid > 0 ? $pid : $post->ID);
        $html = '';

        if (get_post_type(get_the_ID()) == 'product'):
            $shop_pro_socials = get_theme_mod('shop_pro_socials', array('1', '2', '3', '4'));
            if (defined('FW')):
                $shop_pros_enable_settings = fw_get_db_post_option($postID, 'shop_pros_enable_settings', 2);
                if ($shop_pros_enable_settings == 1):
                    $shop_pros_socials = fw_get_db_post_option($postID, 'shop_pros_socials', array());
                    $shop_pro_socials = (!empty($shop_pros_socials) ? $shop_pros_socials : $shop_pro_socials);
                endif;
            endif;

            if (!empty($shop_pro_socials) && $postID > 0):
                if (in_array(1, $shop_pro_socials)) {
                    $html .= '<a target="_blank" href="https://www.facebook.com/sharer.php?u=' . get_the_permalink($postID) . '&title=' . esc_url(get_the_title($postID)) . '"><i class="icofont-facebook"></i></a>';
                }
                if (in_array(2, $shop_pro_socials)) {
                    $html .= '<a target="_blank" href="https://twitter.com/intent/tweet?url=' . get_the_permalink($postID) . '&text=' . esc_url(get_the_title($postID)) . '"><i class="icofont-twitter"></i></a>';
                }
                if (in_array(3, $shop_pro_socials)) {
                    $html .= '<a target="_blank" href="mailto:?subject=' . get_the_permalink($postID) . '"><i class="icofont-envelope"></i></a>';
                }
                if (in_array(4, $shop_pro_socials)) {
                    $html .= '<a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink($postID) . '&title=' . esc_url(get_the_title($postID)) . '"><i class="icofont-linkedin"></i></a>';
                }
                if (in_array(5, $shop_pro_socials)) {
                    $html .= '<a target="_blank" href="https://pinterest.com/pin/create/bookmarklet/?media=' . get_the_post_thumbnail_url(get_the_ID($postID), 'full') . '&url=' . get_the_permalink($postID) . '&is_video=false&description=' . esc_url(get_the_title($postID)) . '"><i class="icofont-pinterest"></i></a>';
                }
                if (in_array(6, $shop_pro_socials)) {
                    $html .= '<a target="_blank" href="https://api.whatsapp.com/send?text=' . get_the_permalink($postID) . '"><i class="icofont-whatsapp"></i></a>';
                }
                if (in_array(7, $shop_pro_socials)) {
                    $html .= '<a target="_blank" href="https://digg.com/submit?url=' . get_the_permalink($postID) . '&title=' . esc_url(get_the_title($postID)) . '"><i class="icofont-digg"></i></a>';
                }
                if (in_array(8, $shop_pro_socials)) {
                    $html .= '<a target="_blank" href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=' . get_the_permalink() . '&title=' . esc_url(get_the_title($postID)) . '"><i class="icofont-tumblr"></i></a>';
                }
                if (in_array(9, $shop_pro_socials)) {
                    $html .= '<a target="_blank" href="https://reddit.com/submit?url=' . get_the_permalink($postID) . '&title=' . esc_url(get_the_title($postID)) . '"><i class="icofont-reddit"></i></a>';
                }
            endif;
        elseif (get_post_type(get_the_ID()) == 'post'):
            $blog_single_socials = get_theme_mod('blog_single_socials', array(1, 2, 3, 4));
            if (defined('FW')):
                $blog_si_is_content_enable = fw_get_db_post_option($postID, 'blog_si_is_content_enable', 2);
                if ($blog_si_is_content_enable == 1):
                    $blog_si_socials = fw_get_db_post_option(get_the_ID(), 'blog_si_socials', array());

                    if (!empty($blog_si_socials)):
                        $blog_single_socials = array();
                        foreach ($blog_si_socials as $key => $val):
                            $blog_single_socials[] = $key;
                        endforeach;
                    endif;
                endif;
                if (!empty($blog_single_socials) && $postID > 0):
                    if (in_array(1, $blog_single_socials)) {
                        $html .= '<a class="fac" target="_blank" href="https://www.facebook.com/sharer.php?u=' . get_the_permalink($postID) . '&title=' . esc_url(get_the_title($postID)) . '"><i class="ulina-facebook-f"></i></a>';
                    }
                    if (in_array(2, $blog_single_socials)) {
                        $html .= '<a class="twi" target="_blank" href="https://twitter.com/intent/tweet?url=' . get_the_permalink($postID) . '&text=' . esc_url(get_the_title($postID)) . '"><i class="ulina-twitter"></i></a>';
                    }
                    if (in_array(3, $blog_single_socials)) {
                        $html .= '<a class="mai" target="_blank" href="mailto:?subject=' . get_the_permalink($postID) . '"><i class="ulina-envelope"></i></a>';
                    }
                    if (in_array(4, $blog_single_socials)) {
                        $html .= '<a class="lin" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink($postID) . '&title=' . esc_url(get_the_title($postID)) . '"><i class="ulina-linkedin-in"></i></a>';
                    }
                    if (in_array(5, $blog_single_socials)) {
                        $html .= '<a class="pin" target="_blank" href="https://pinterest.com/pin/create/bookmarklet/?media=' . get_the_post_thumbnail_url(get_the_ID($postID), 'full') . '&url=' . get_the_permalink($postID) . '&is_video=false&description=' . esc_url(get_the_title($postID)) . '"><i class="ulina-pinterest-p"></i></a>';
                    }
                    if (in_array(6, $blog_single_socials)) {
                        $html .= '<a class="wha" target="_blank" href="https://api.whatsapp.com/send?text=' . get_the_permalink($postID) . '"><i class="ulina-whatsapp"></i></a>';
                    }
                    if (in_array(7, $blog_single_socials)) {
                        $html .= '<a class="dig" target="_blank" href="https://digg.com/submit?url=' . get_the_permalink($postID) . '&title=' . esc_url(get_the_title($postID)) . '"><i class="ulina-digg"></i></a>';
                    }
                    if (in_array(8, $blog_single_socials)) {
                        $html .= '<a class="tum" target="_blank" href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=' . get_the_permalink($postID) . '&title=' . esc_url(get_the_title($postID)) . '"><i class="ulina-tumblr"></i></a>';
                    }
                    if (in_array(9, $blog_single_socials)) {
                        $html .= '<a class="red" target="_blank" href="https://reddit.com/submit?url=' . get_the_permalink($postID) . '&title=' . esc_url(get_the_title($postID)) . '"><i class="ulina-reddit"></i></a>';
                    }
                endif;
            endif;
        endif;

        return $html;
    }
    
    /**---------------------------------------------------------------
    * Insert Product Comment Meta
    * -------------------------------------------------------------**/
    function uiuxom_insert_product_review_title( $comment_id ){
        if(isset( $_POST['review_title'] )):
            update_comment_meta( $comment_id, 'review_title', esc_html( $_POST['review_title'] ) );
        endif;
    }

    /**---------------------------------------------------------------
    * Update Product Comment Meta
    * -------------------------------------------------------------**/
    function uiuxom_edit_product_review_title( $comment_id ){
            if( ! isset( $_POST['ulina_comment_update'] ) || ! wp_verify_nonce( $_POST['ulina_comment_update'], 'ulina_comment_update' ) ) return;
            if(isset( $_POST['review_title'] )):
                    update_comment_meta( $comment_id, 'review_title', esc_html( $_POST['review_title'] ) );
            endif;
    }

    /**---------------------------------------------------------------
    * Add Product Comment Meta Box
    * -------------------------------------------------------------**/
    function uiuxom_add_comment_meta_box(){
        add_meta_box( 'ulina-review-title', esc_html__( 'Review Title', 'ulina'), [$this, 'uiuxom_comment_review_title_mate_box'], 'comment', 'normal', 'high' );
    }
    function uiuxom_comment_review_title_mate_box($comment){
        $review_title = get_comment_meta( $comment->comment_ID, 'review_title', true );
        wp_nonce_field( 'ulina_comment_update', 'ulina_comment_update', false );
        ?>
        <p>
                <label for="ulina_review_title"><?php esc_html__( 'Review Title', 'ulina' ); ?></label>
                <input type="text" name="review_title" value="<?php echo esc_attr( $review_title ); ?>" class="widefat" />
        </p>
        <?php
    }
}

UIUXOM_Assistance::UIUXOM_instance();