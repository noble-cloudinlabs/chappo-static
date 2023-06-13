<?php
/* 
 * Ulina Hooks Class
 */

class Ulina_Hooks_Class
{

    public static $_instance;

    public function __construct() {
        $this->ulina_init();
    }

    /* * ---------------------------------------------------------------
    * Init all hooks and others
    * -------------------------------------------------------------* */

    public function ulina_init()
    {
        add_action('after_setup_theme', array($this, 'ulina_theme_setup'));
        add_action('widgets_init', array($this, 'ulina_widgets_init'));
        
        add_action('wp_enqueue_scripts', array($this, 'ulina_enqueue_style'));
        add_action('wp_enqueue_scripts', array($this, 'ulina_enqueue_script'));
        add_action('admin_enqueue_scripts', array($this, 'ulina_enqueue_style_for_admin'));
        
        add_action('tgmpa_register', array($this, 'ulina_plugin_activation_notive'));
        add_action('admin_menu', array($this,'ulina_remove_theme_settings'),999 );
        add_action('wp_enqueue_scripts', array($this, 'ulina_dequeue_dashicon'));

        add_action('wp_ajax_nopriv_post_like', array($this, 'ulina_ajax_post_like'));
        add_action('wp_ajax_post_like', array($this, 'ulina_ajax_post_like'));
        
        add_filter('fw:option_type:icon-v2:packs', array($this, 'ulina_icon_pack'));
        
        add_action( 'admin_init', array($this, 'ulina_hide_front_page_editor') );

        add_filter('woocommerce_add_to_cart_fragments', array($this, 'ulina_cart_button_item_count'));

        add_filter( 'comment_form_fields', array($this, 'ulina_rearrange_comment_form') );
        
        add_filter( 'body_class', array($this, 'ulina_body_classes') );
        add_filter('fw:ext:backups-demo:demos', array($this, 'ulina_live_demos'));

        add_filter( 'the_password_form', array($this, 'ulina_password_protected_form') );
    }
    
    public function ulina_body_classes($classes){
        $header_style = get_theme_mod('header_style', 1);
        $classes[] = 'active_header_'.$header_style;
        return $classes;
    }
    
    public function ulina_icon_pack($default_packs){
        return array(
                'ulina_icons' => array(
                        'name'                  => 'ulina_icons',
                        'title'                 => esc_html__('Ulina Icons', 'ulina'),
                        'css_class_prefix'      => 'ulinai',
                        'css_file'              => ULINA_ASSETS_CSS_DIR.'/ulina-icons.css',
                        'css_file_uri'          => ULINA_ASSETS_CSS_URL.'/ulina-icons.css'
                )
        );
    }

    /* * ---------------------------------------------------------------
    * Theme Setup
    * -------------------------------------------------------------* */

    public function ulina_theme_setup(){
        load_theme_textdomain('ulina', get_template_directory() . '/languages');
        $GLOBALS['content_width'] = 1170;

        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(755, 420, true);

        add_theme_support('title-tag');

        register_nav_menu('primary-menu', esc_html__('Primary Menu', 'ulina'));

        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'script', 'style'));

        add_theme_support('woocommerce');
    }

    /* * ---------------------------------------------------------------
    * Widget Init
    * -------------------------------------------------------------* */
    public function ulina_widgets_init(){

        ulina_register_sidebars(
            array(
                'sidebar-1'         => array(
                    'name'          => esc_html__('Blog Sidebar', 'ulina'),
                    'description'   => esc_html__('Blog sidebar, Only for blog pages.', 'ulina')
                ),
                'sidebar-2'         => array(
                    'name'          => esc_html__('Page Sidebar', 'ulina'), 
                    'description'   => esc_html__('Page sidebar, Only for pages.', 'ulina')
                ),
                'sidebar-3'         => array(
                    'name'          => esc_html__('Shop Sidebar', 'ulina'),
                    'description'   => esc_html__('Shop sidebar, Only for shop pages.', 'ulina')
                ),
            ),

            array(
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => "</aside>",
                'before_title'  => '<h3 class="widgetTitle">',
                'after_title'   => '</h3>',
            ));

    }

    /* * ---------------------------------------------------------------
    * CSS Enqueue
    * -------------------------------------------------------------* */
    public function ulina_enqueue_style(){
        wp_enqueue_style('ulina-google-fonts', ulina_google_fonts_url());
        wp_enqueue_style('ulina-style', get_stylesheet_uri());
        
        wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css');
        if(defined('FW')):
            fw()->backend->option_type('icon-v2')->packs_loader->enqueue_frontend_css();
        else:
            wp_enqueue_style('ulina-icons', get_template_directory_uri().'/assets/css/ulina-icons.css');
        endif;
        
        wp_enqueue_style('animate', get_template_directory_uri().'/assets/css/animate.css');
        wp_enqueue_style('owl-theme-default', get_template_directory_uri().'/assets/css/owl.theme.default.min.css');
        wp_enqueue_style('owl-carousel', get_template_directory_uri().'/assets/css/owl.carousel.min.css');
        wp_enqueue_style('slick', get_template_directory_uri().'/assets/css/slick.css');
        wp_enqueue_style('nice-select', get_template_directory_uri().'/assets/css/nice-select.css');
        wp_enqueue_style('lightcase', get_template_directory_uri().'/assets/css/lightcase.css');
        wp_enqueue_style('ulina-icons', get_template_directory_uri().'/assets/css/ulina-icons.css');
        wp_enqueue_style('jquery-hotspot', get_template_directory_uri().'/assets/css/jquery.hotspot.css');
        wp_enqueue_style('ulina-preset', get_template_directory_uri().'/assets/css/preset.css');
        wp_enqueue_style('ulina-theme', get_template_directory_uri().'/assets/css/theme.css');
        wp_enqueue_style('ulina-responsive', get_template_directory_uri().'/assets/css/responsive.css');
        wp_enqueue_style('ulina-preloader', get_template_directory_uri().'/assets/css/preloader.css');
    }
    
    public function ulina_enqueue_style_for_admin(){
        wp_enqueue_style('ulina-admin-style', get_template_directory_uri().'/assets/css/ulina-admin-style.css');
    }

    /* * -----------------------------------------------------------
    * JS Enqueue
    * -------------------------------------------------------------* */
    public function ulina_enqueue_script(){
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
        if (class_exists('woocommerce')) {
            wp_enqueue_script('wc-add-to-cart-variation');
        }
        wp_enqueue_script('masonry');
        wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), '', TRUE);
        wp_enqueue_script('shuffle', get_template_directory_uri().'/assets/js/shuffle.min.js', array('bootstrap'), '', TRUE);
        wp_enqueue_script('owl-carousel', get_template_directory_uri().'/assets/js/owl.carousel.min.js', array('shuffle'), '', TRUE);
        wp_enqueue_script('jquery-appear', get_template_directory_uri().'/assets/js/jquery.appear.js', array('owl-carousel'), '', TRUE);
        wp_enqueue_script('lightcase', get_template_directory_uri().'/assets/js/lightcase.js', array('jquery-appear'), '', TRUE);
        wp_enqueue_script('jquery-nice-select', get_template_directory_uri().'/assets/js/jquery.nice-select.js', array('lightcase'), '', TRUE);
        wp_enqueue_script('slick', get_template_directory_uri().'/assets/js/slick.js', array('jquery-nice-select'), '', TRUE);
        wp_enqueue_script('jquery-plugin', get_template_directory_uri().'/assets/js/jquery.plugin.min.js', array('slick'), '', TRUE);
        wp_enqueue_script('jquery-countdown', get_template_directory_uri().'/assets/js/jquery.countdown.min.js', array('jquery-plugin'), '', TRUE);
        wp_enqueue_script('circle-progress', get_template_directory_uri().'/assets/js/circle-progress.js', array('jquery-countdown'), '', TRUE);
        wp_enqueue_script('jquery-hotspot', get_template_directory_uri().'/assets/js/jquery.hotspot.js', array('circle-progress'), '', TRUE);
        wp_enqueue_script('ulina-theme', get_template_directory_uri().'/assets/js/theme.js', array('jquery-hotspot'), '', TRUE);
        
        $params = array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'ajax_nonce' => wp_create_nonce('ulina_security_check'),
        );
        wp_localize_script('ulina-theme', 'ulina_object', $params);
    }
    
    public function ulina_remove_theme_settings() {
        remove_submenu_page( 'themes.php', 'fw-settings' );
    }

    function ulina_dequeue_dashicon() {
        if (current_user_can( 'update_core' )) {
            return;
        }
        wp_deregister_style('dashicons');
    }

    /* * ---------------------------------------------------------------
    * TGMPA Activator
    * -------------------------------------------------------------* */
    public function ulina_plugin_activation_notive(){
        $plugins = array(
            array(
                'name'		 => esc_html__( 'Elementor', 'ulina' ),
                'slug'		 => 'elementor',
                'required'	 => true,
            ),
            array(
                'name'		 => esc_html__( 'Kirki', 'ulina' ),
                'slug'		 => 'kirki',
                'required'	 => true,
            ),
            array(
                'name'		 => esc_html__( 'Unyson', 'ulina' ),
                'slug'		 => 'unyson',
                'required'	 => true,
            ),
            array(
                'name'		 => esc_html__( 'WooCommerce', 'ulina' ),
                'slug'		 => 'woocommerce',
                'required'	 => true,
            ),
            array(
                'name'		 => esc_html__( 'WCBoost Variation Swatches', 'ulina' ),
                'slug'		 => 'wcboost-variation-swatches',
                'required'	 => true,
            ),
            array(
                'name'		 => esc_html__( 'YITH WooCommerce Wishlist', 'ulina' ),
                'slug'		 => 'yith-woocommerce-wishlist',
                'required'	 => false,
            ),
            array(
                'name'               => esc_html__('Ulina Assistance', 'ulina'),
                'slug'		     => 'ulina-assistance',
                'required'	     => true,
                'source'	     => 'https://uiuxom.com/uiuxom_assistance_plugins/ulina-assistance.zip' ,
                'version'            => '',
                'force_activation'   => false,
                'force_deactivation' => false,
                'external_url'       => '',
            ),
            array(
                'name'               => esc_html__('Revolution Slider', 'ulina'),
                'slug'		         => 'revslider',
                'required'	         => true,
                'source'	         => 'https://uiuxom.com/uiuxom_assistance_plugins/revslider.zip' ,
                'version'            => '',
                'force_activation'   => false,
                'force_deactivation' => false,
                'external_url'       => '',
            ),
            array(
                'name'       => esc_html__('Contact Form 7', 'ulina'),
                'slug'       => 'contact-form-7',
                'required'   => TRUE,
            ),
            array(
                'name'      => esc_html__('MC4WP: Mailchimp for WordPress', 'ulina'),
                'slug'      => 'mailchimp-for-wp',
                'required'  => false,
            ),
            array(
                'name' => esc_html__('Max Mega Menu', 'ulina'),
                'slug' => 'megamenu',
                'required' => false,
            ),
        );

        $config = array(
            'id'            => 'ulina',
            'default_path'  => '',
            'menu'          => 'tgmpa-install-plugins',
            'has_notices'   => true,
            'dismissable'   => true,
            'dismiss_msg'   => '',
            'is_automatic'  => false,
            'message'       => '',
        );

        tgmpa($plugins, $config);
    }


    /* * ---------------------------------------------------------------
    * Create Instance
    * -------------------------------------------------------------* */
    public static function ulina_instance(){
        if (!isset(self::$_instance)) {
            self::$_instance = new Ulina_Hooks_Class();
        }
        return self::$_instance;

    }
    
    /* * ---------------------------------------------------------------
    * Hide Front Page Editor
    * -------------------------------------------------------------* */
    function ulina_hide_front_page_editor() {
        $post_id = (isset($_GET['post'])) ? $_GET['post'] : '' ;
        if( $post_id < 1 ) return;

        $template_file = get_post_meta($post_id, '_wp_page_template', true);

        if($template_file == 'page-templates/front-page.php'){ 
            remove_post_type_support('page', 'editor');
        }
    }

    public function ulina_cart_button_item_count($fragments)
    {
        global $woocommerce;
        ob_start();
        ?>
        <a class="halCart ulina_aj_cart" href="javascript:void(0);"><i class="ulina-cart-shopping"></i><span><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'ulina'), $woocommerce->cart->cart_contents_count); ?></span>
        <?php
        $fragments['a.ulina_aj_cart'] = ob_get_clean();
        return $fragments;
    }

    /* * ---------------------------------------------------------------
    * Re Arange Comment Form
    * -------------------------------------------------------------* */
    function ulina_rearrange_comment_form( $fields ) {
        global $post;
        $postID = (isset($post->ID) && $post->ID > 0 ? $post->ID : 0);
        $post_type = get_post_type($postID);
        if($post_type && $post_type != 'product'):
            $comment_field              = $fields[ 'comment' ];
            unset( $fields[ 'comment' ] );
            $fields[ 'comment' ]        = $comment_field;
            return $fields;
        else:
            return $fields;
        endif;
    }
    
    public function ulina_live_demos($demos){
        $demos_array = array(
            'ulina-live-demo' => array(
                'title'          => esc_html__('Ulina Live Dummy', 'ulina'),
                'screenshot'     => get_template_directory_uri().'/screenshot.png',
                'preview_link'   => 'https://uiuxom.com/ulina/wp',
            ),
        );

        $download_url = 'https://uiuxom.com/uiuxom_dummy_data/ulina/ulina_dummy_data/';

        foreach ($demos_array as $id => $data) {
            $demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
                'url' => $download_url,
                'file_id' => $id,
            ));
            $demo->set_title($data['title']);
            $demo->set_screenshot($data['screenshot']);
            $demo->set_preview_link($data['preview_link']);

            $demos[ $demo->get_id() ] = $demo;

            unset($demo);
        }

        return $demos;
    }

    public function ulina_password_protected_form(){
        global $post;

        $password_form_message = esc_html__('This content is password protected. To view it please enter your password below:', 'ulina');
        
        $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
        $form = '<form class="protected-post-form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
            <p class="passwordFormNote">'.$password_form_message.'</p>
            <input placeholder="'.esc_attr__('Password', 'ulina').'" name="post_password" id="' . $label . '" class="pw-window" type="password" size="20" />
            <input type="submit" class="btn btn-large" name="Submit" value="' . esc_attr__( "Submit", 'ulina') . '" />
        </form>';
        return $form;
    }
    
}

$ulina_instance = Ulina_Hooks_Class::Ulina_instance();