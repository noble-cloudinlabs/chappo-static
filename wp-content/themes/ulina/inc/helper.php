<?php
/* 
 * Ulina Helpar File
 */

/*
 * Register Sidebar  for this theme.
 */
if (!function_exists('ulina_register_sidebars')) {
    function ulina_register_sidebars($areas, $defaultParams = array())
    {
        if (empty($defaultParams)) {
            $defaultParams = array(
                'before_widget' => '<div id="%1$s" class="widget widget-container %2$s">',
                'after_widget' => "</div>",
                'before_title' => '<h3 class="widget_title">',
                'after_title' => '</h3>',
            );
        }

        foreach ($areas as $id => $area) {
            $params = array_merge($defaultParams, $area, array('id' => $id));
            register_sidebar($params);
        }
    }
}

/*
 * Google Font Enqueue  for this theme.
 */
if (!function_exists('ulina_google_fonts_url')) {
    function ulina_google_fonts_url()
    {
        $fonts_url = '';
        $font_families = array();

        $Jost       = _x('on', 'Jost font: on or off', 'ulina');
        $OpenSans   = _x('on', 'Open Sans font: on or off', 'ulina');

        if ('off' !== $Jost) {
            $font_families[] = 'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
        }
        if ('off' !== $OpenSans) {
            $font_families[] = 'Open Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600&display=swap';
        }

        if ($font_families) {
            $query_args = array(
                'family' => urlencode(implode('|', $font_families)),
                'subset' => urlencode('latin,latin-ext'),
            );
            $fonts_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
        }

        return esc_url_raw($fonts_url);
    }
}

/*
 * Custom Comment List for this theme.
 */
if (!function_exists('ulina_comment_listing')) {
    function ulina_comment_listing($comment, $args, $depth){
        $GLOBALS['comment'] = $comment;
        $avater = get_avatar_url($comment->comment_author_email);
        if ($comment->user_id != '' && $comment->user_id != 0) {
            $userId = $comment->user_id;
            $avID = get_the_author_meta('user_av_ID', $userId);
            if ($avID != '') {
                $userAvater = ulina_attachment_url($avID, 96, 96);
            } else {
                $userAvater = $avater;
            }
        } else {
            $userAvater = $avater;
        }
        $dateFormat = (get_option('date_format') != '' ? get_option('date_format') : 'M d, Y');
        ?>
        <li id="comment-<?php echo esc_attr($comment->comment_ID); ?>" <?php comment_class($args['has_children'] ? 'parent' : '', $comment); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body singleComment clearfix <?php if ($comment->comment_type == 'pingback' || $comment->comment_type == 'trackback') { ?> pingbackcomments <?php } ?>">
            <?php if ($comment->comment_type != 'pingback' && $comment->comment_type != 'trackback'): ?>
                <img src="<?php echo esc_url($userAvater); ?>" alt="<?php echo esc_attr($comment->comment_author); ?>">
            <?php endif; ?>
            <h4 class="cm_author"><?php echo esc_html($comment->comment_author); ?></h4>
            <div class="commentTime"><span><?php echo get_the_time($dateFormat); ?><?php echo esc_html__(' at', 'ulina');?> <?php echo get_the_time('g:i a') ?></span></div>
            <div class="commentContent">
                <?php comment_text(); ?>
            </div>
            <?php comment_reply_link(array_merge($args, array('add_below' => 'div-comment', 'reply_text' =>esc_html__('Reply', 'ulina'), 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </article>
        <?php
    }
}

/*
 * Post View Count  for this theme.
 */
function ulina_post_view_count($id)
{
    $view = get_post_meta($id, '_ulina_post_view', true);
    $view = (empty($view)) ? 0 : $view;
    $view += 1;

    update_post_meta($id, '_ulina_post_view', $view);
}


/*
 * Get Post View Count  for this theme.
 */
function ulina_get_post_view_count($id)
{
    $view = get_post_meta($id, '_ulina_post_view', true);
    $view = (empty($view)) ? 0 : $view;
    $view = $view . ($view == 1 ? esc_html__(' View', 'ulina') : esc_html__(' Views', 'ulina'));
    return $view;
}

/*
 * Check if Plugin is Active for this theme.
 */
if (!function_exists('ulina_plugin_active')) {
    function ulina_plugin_active($plugin)
    {
        return in_array($plugin . '/' . $plugin . '.php', apply_filters('active_plugins', get_option('active_plugins')));
    }
}


if (!function_exists('ulina_return')) {
    function ulina_return($s)
    {
        return $s;
    }
}

/**
 * Get option value
 * @since  1.0.0
 */

if (!function_exists('ulina_option')) {
    function ulina_option($option)
    {
        return get_theme_mod($option, ulina_defaults($option));
    }
}

/**
 *Default option value
 * @since  1.0.0
 */
if (!function_exists('ulina_defaults')) {
    function ulina_defaults($options)
    {
        $default = array(
            'body_font' => array(),
            'heading_font' => array(),
            'header_layout' => '1',
            'show_login' => '',
            'show_header_cta' => '',
        );

        if (!empty($default[$options])) {
            return $default[$options];
        }
    }
}

/* * ---------------------------------------------------------------
* Get Author Avater URL
* -------------------------------------------------------------* */
function ulina_get_author_avater_url($userid, $w = 'full', $h = '')
{
    $user_av_ID = get_user_meta($userid, 'user_av_ID', TRUE);
    $email = get_the_author_meta($userid);
    if ($user_av_ID > 0) {
        $img = ulina_attachment_url($user_av_ID, $w, $h);
        return $img;
    } else {
        return get_avatar_url($email, array('size' => 170));
    }
}

/*==============================================================================
/ Site Preloader
/=============================================================================*/
if (!function_exists('ulina_preloader_creator')) {
    function ulina_preloader_creator()
    {
        $show_preloader = get_theme_mod('show_preloader', 2);
        $proloader      = get_theme_mod('proloader', 0);

        $preHTML = '';
        if ($show_preloader == 1) {
            switch ($proloader) {
                case 0:
                    $preHTML .= '<div class="preloader">
                                    <div class="spinner-eff spinner-eff-1">
                                        <div class="bar bar-top"></div>
                                        <div class="bar bar-right"></div>
                                        <div class="bar bar-bottom"></div>
                                        <div class="bar bar-left"></div>
                                    </div>
                                </div>';
                    break;
                case 1:
                    $preHTML .= '<div class="preloader text-center"><div class="la-ball-circus la-2x">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 2:
                    $preHTML .= '<div class="preloader text-center"><div class="la-ball-climbing-dot la-2x">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 3:
                    $preHTML .= '<div class="preloader text-center"><div class="la-ball-clip-rotate la-2x">
                                    <div></div>
                                </div></div>';
                    break;
                case 4:
                    $preHTML .= '<div class="preloader text-center"><div class="la-ball-clip-rotate-multiple la-2x">
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 5:
                    $preHTML .= '<div class="preloader text-center"><div class="la-ball-clip-rotate-pulse la-2x">
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 6:
                    $preHTML .= '<div class="preloader text-center"><div class="la-ball-newton-cradle la-2x">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 7:
                    $preHTML .= '<div class="preloader text-center"><div class="la-ball-rotate la-2x">
                                    <div></div>
                                </div></div>';
                    break;
                case 8:
                    $preHTML .= '<div class="preloader text-center"><div class="la-ball-scale-multiple la-2x">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 9:
                    $preHTML .= '<div class="preloader text-center"><div class="la-ball-scale-ripple-multiple la-2x">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 10:
                    $preHTML .= '<div class="preloader text-center"><div class="la-ball-zig-zag la-2x">
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 11:
                    $preHTML .= '<div class="preloader text-center"><div class="la-fire la-2x">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 12:
                    $preHTML .= '<div class="preloader text-center"><div class="la-line-scale la-2x">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 13:
                    $preHTML .= '<div class="preloader text-center"><div class="la-line-scale-party la-2x">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 14:
                    $preHTML .= '<div class="preloader text-center"><div class="la-line-scale-pulse-out la-2x">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 15:
                    $preHTML .= '<div class="preloader text-center"><div class="la-line-spin-clockwise-fade-rotating la-2x">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 16:
                    $preHTML .= '<div class="preloader text-center"><div class="la-square-jelly-box la-2x">
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 17:
                    $preHTML .= '<div class="preloader text-center"><div class="la-square-spin la-2x">
                                    <div></div>
                                </div></div>';
                    break;
                case 18:
                    $preHTML .= '<div class="preloader text-center"><div class="loader-inner sk-folding-cube">
                                    <div class="sk-cube1 sk-cube"></div>
                                    <div class="sk-cube2 sk-cube"></div>
                                    <div class="sk-cube4 sk-cube"></div>
                                    <div class="sk-cube3 sk-cube"></div>
                                </div></div>';
                    break;
                case 19:
                    $preHTML .= '<div class="preloader text-center"><div class="la-pacman la-2x">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;
                case 20:
                    $preHTML .= '<div class="preloader text-center"><div class="la-timer la-2x">
                                    <div></div>
                                </div></div>';
                    break;
                default:
                    $preHTML .= '<div class="preloader text-center"><div class="la-ball-scale-multiple la-2x">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div></div>';
                    break;

            }
        }

        echo ulina_kses($preHTML);
    }
}


function ulina_get_date_format()
{
    $date_format = get_option('date_format');
    if ($date_format != ''):
        return $date_format;
    else:
        return 'd M';
    endif;
}

function ulina_post_thumbnail($postID = null, $w = '', $h = '', $crop = TRUE)
{
    $src = ($w == 'full' ? 'http://via.placeholder.com/1920x1080.jpg' : 'http://via.placeholder.com/' . $w . 'x' . $h.'.jpg');
    if (has_post_thumbnail($postID)) {
        $src = get_the_post_thumbnail_url($postID, 'full');
        $attachment_id = get_post_thumbnail_id($postID);

        if ($w == 'full') {
            return $src;
        }
        if (defined('FW')) {
            $fw_resize = FW_Resize::getInstance();
            $response = $fw_resize->process($attachment_id, $w, $h, $crop);

            return (!is_wp_error($response) && !empty($response['src'])) ? $response['src'] : $src;
        } else {
            return $src;
        }
    }
    return $src;
}

function ulina_attachment_url($attachmentID = null, $w = '', $h = '', $crop = TRUE){
    $src = ($w == 'full' ? 'http://via.placeholder.com/1920x1080.jpg' : 'http://via.placeholder.com/' . $w . 'x' . $h.'.jpg');
    if ($attachmentID != '' && $attachmentID > 0) {
        $src = wp_get_attachment_image_src($attachmentID, 'full');

        if ($w == 'full') {
            return $src[0];
        }
        if (defined('FW')) {
            $fw_resize = FW_Resize::getInstance();
            $response = $fw_resize->process($attachmentID, $w, $h, $crop);

            return (!is_wp_error($response) && !empty($response['src'])) ? $response['src'] : $src[0];
        } else {
            return $src[0];
        }
    }else{
        $src = 'http://via.placeholder.com/' . $w . 'x' . $h.'.jpg';
    }
    return $src;
}


function ulina_breadcrumbs() {
    if ( is_front_page() ) {
        return;
    }

    global $post;
    $custom_taxonomy  = '';
    $title_lenght = 25;
    $html = '';

    $defaults = array(
        'seperator'   =>  '>',
        'id'          =>  'pageBannerPath',
        'classes'     =>  'pageBannerPath',
        'home_title'  =>  esc_html__( 'Home', 'ulina' )
    );
    $sep  = '&nbsp;&nbsp;<i>'. esc_html( $defaults['seperator'] ) .'</i>&nbsp;&nbsp;';

    $html .= '<div id="'. esc_attr( $defaults['id'] ) .'" class="'. esc_attr( $defaults['classes'] ) .'">';
    $html .= '<a href="'. get_home_url('/') .'">'. esc_html( $defaults['home_title'] ) .'</a>' . $sep;

    if(is_single()){
        $post_type = get_post_type();

        if( $post_type != 'post' ) {
            $post_type_object   = get_post_type_object( $post_type );
            $post_type_link     = get_post_type_archive_link( $post_type );

            $html .= '<span>'. wp_strip_all_tags($post_type_object->labels->name) .'</span>'. $sep;
        }

        $category = get_the_category( $post->ID );
        if( !empty( $category ) ) {
            $category_values      = array_values( $category );
            $get_last_category    = end( $category_values );
            $get_parent_category  = rtrim( get_category_parents( $get_last_category->term_id, true, ',' ), ',' );
            $cat_parent           = explode( ',', $get_parent_category );

            $display_category = '';
            foreach( $cat_parent as $p ) {
                $display_category .=  $p . $sep;
            }
        }
        
        $taxonomy_exists = taxonomy_exists( $custom_taxonomy );
        if( empty( $get_last_category ) && !empty( $custom_taxonomy ) && $taxonomy_exists ) {
            $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
            $cat_id         = $taxonomy_terms[0]->term_id;
            $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
            $cat_name       = $taxonomy_terms[0]->name;
        }

        $single_title = wp_strip_all_tags(get_the_title());
        if(strlen($single_title) > $title_lenght){
            if (preg_match('/^.{1,'.$title_lenght.'}\b/s', $single_title, $myMatch)):
                $single_title = trim($myMatch[0]).'...';
            endif;
        }
        
        
        if( !empty( $get_last_category ) ) {
            $html .= $display_category;
            $html .= '<span>'. esc_html($single_title) .'</span>';
        } else if( !empty( $cat_id ) ) {
            $html .= '<a href="'. $cat_link .'">'. $cat_name .'</a>' . $sep;
            $html .= '<span>'. esc_html($single_title) .'</span>';
        } else {
          $html .= '<span>'. esc_html($single_title) .'</span>';
        }
    }else if( is_archive()  && !is_search() ) {
        if( is_tax() ) {
            $post_type = get_post_type();
            if( $post_type != 'post' ) {
                $post_type_object   = get_post_type_object( $post_type );
                $post_type_link     = get_post_type_archive_link( $post_type );

                $html .= '<span>' . $post_type_object->labels->name . '</span>' . $sep;
            }
            $custom_tax_name = get_queried_object()->name;
            $html .= '<span>'. $custom_tax_name .'</span>';
        } else if ( is_category() ) {
            $parent = get_queried_object()->category_parent;
            if ( $parent !== 0 ) {
                $parent_category = get_category( $parent );
                $category_link   = get_category_link( $parent );
                $html .= '<a href="'. esc_url( $category_link ) .'">'. $parent_category->name .'</a>' . $sep;
            }
            $html .= '<span>'. single_cat_title( '', false ) .'</span>';

        } else if ( is_tag() ) {
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_name  = $terms[0]->name;

            $html .= '<span>'. $get_term_name .'</span>';

        } else if( is_day() ) {
            $html .= '<a href="'. get_year_link( get_the_time('Y') ) .'">'. get_the_time('Y') .'</a>' . $sep;
            $html .= '<a href="'. get_month_link( get_the_time('Y'), get_the_time('m') ) .'">'. get_the_time('M').'</a>' . $sep;

            $html .= '<span>'. get_the_time('jS') .' '. get_the_time('M'). ' </span>';

        } else if( is_month() ) {
            $html .= '<a href="'. get_year_link( get_the_time('Y') ) .'">'. get_the_time('Y') .'</a>' . $sep;
            $html .= '<span>'. get_the_time('M') .'</span>';
        } else if ( is_year() ) {
            $html .= '<span>'. get_the_time('Y') .'</span>';
        } else if ( is_author() ) {
            global $author;
            $userdata = get_userdata( $author );
            $html .= '<span>'. esc_html__('Author: ', 'ulina'). $userdata->display_name . '</span>';
        } else {
            if(is_shop()):
                $html .= '<span>'. esc_html__('Shop', 'ulina') .'</span>';
            else:
                $html .= '<span>'. post_type_archive_title('', false) .'</span>';
            endif;
        }
    } else if ( is_page() ) {
        if( $post->post_parent ) {
            $anc = get_post_ancestors( $post->ID );
            $anc = array_reverse( $anc );
            if ( !isset( $parents ) ) $parents = null;
            foreach ( $anc as $ancestor ) {
                $parents .= '<a href="'. get_permalink( $ancestor ) .'">'. wp_strip_all_tags(get_the_title( $ancestor )) .'</a>' . $sep;
            }
            $html .= $parents;
            $html .= '<span>'. wp_strip_all_tags(get_the_title()) .'</span>';
        } else {
            $html .= '<span>'. wp_strip_all_tags(get_the_title()) .'</span>';
        }
    } else if ( is_search() ) {
        $html .= '<span>'.esc_html__('Search results for:', 'ulina').' '. wp_strip_all_tags(get_search_query()) .'</span>';
    }else if ( is_404() ) {
        $html .=  '<span>' . esc_html__('404', 'ulina') . '</span>';
    }else if(is_home() && !is_front_page()){
        $postsPageID = (get_option('page_for_posts', '') > 0 ? get_option('page_for_posts', '') : 0);
        $blogPageTitle = ($postsPageID > 0 ? get_the_title($postsPageID) : esc_html__('Blog', 'ulina'));
        $html .=  '<span>' . ulina_kses($blogPageTitle) . '</span>';
    }
    $html .= '</div>';

    return $html;
}

function ulina_kses($raw)
{

    $allowed_tags = array(
        'a' => array(
            'class' => array(),
            'href' => array(),
            'rel' => array(),
            'title' => array(),
            'target' => array(),
        ),
        'option' => array(
            'value' => array(),
        ),
        'abbr' => array(
            'title' => array(),
        ),
        'b' => array(),
        'blockquote' => array(
            'cite' => array(),
        ),
        'cite' => array(
            'title' => array(),
        ),
        'code' => array(),
        'del' => array(
            'datetime' => array(),
            'title' => array(),
        ),
        'dd' => array(),
        'div' => array(
            'class' => array(),
            'title' => array(),
            'style' => array(),
        ),
        'dl' => array(),
        'dt' => array(),
        'em' => array(),
        'h1' => array(),
        'h2' => array(),
        'h3' => array(),
        'h4' => array(),
        'h5' => array(),
        'h6' => array(),
        'i' => array(
            'class' => array(),
        ),
        'img' => array(
            'alt' => array(),
            'class' => array(),
            'height' => array(),
            'src' => array(),
            'width' => array(),
        ),
        'li' => array(
            'class' => array(),
        ),
        'ol' => array(
            'class' => array(),
        ),
        'p' => array(
            'class' => array(),
        ),
        'q' => array(
            'cite' => array(),
            'title' => array(),
        ),
        'span' => array(
            'class' => array(),
            'title' => array(),
            'style' => array(),
        ),
        'iframe' => array(
            'width' => array(),
            'height' => array(),
            'scrolling' => array(),
            'frameborder' => array(),
            'allow' => array(),
            'src' => array(),
        ),
        'strike' => array(),
        'br' => array(),
        'strong' => array(),
        'data-wow-duration' => array(),
        'data-wow-delay' => array(),
        'data-wallpaper-options' => array(),
        'data-stellar-background-ratio' => array(),
        'ul' => array(
            'class' => array(),
        ),
    );

    if (function_exists('wp_kses')) { // WP is here
        $allowed = wp_kses($raw, $allowed_tags);
    } else {
        $allowed = $raw;
    }
    return $allowed;
}


/*
* Retrive categories array for elementor options
*/
function ulina_category_array($taxonomy = 'category', $label = 'All Category', $order = 'DESC', $order_by = 'ID', $hideEmpty = 1,$field = 'id')
{
    $category_args = array(
        'orderby' => $order_by,
        'order' => $order,
        'hide_empty' => $hideEmpty,
        'hierarchical' => 1,
        'taxonomy' => $taxonomy
    );
    $categories = get_categories($category_args);
    $catsArray = array('0' => esc_html($label));
    if (is_array($categories) && count($categories) > 0 && $field == 'id') {
        foreach ($categories as $cat) {
            $catsArray[$cat->term_id] = $cat->name;
        }
    }else{
        foreach ($categories as $cat) {
            $catsArray[$cat->slug] = $cat->name;
        }
    }

    return $catsArray;
}

/*
* Retrive Post Type array for elementor options
*/
function ulina_post_array($postType = 'post', $label = 'All Post', $order = 'DESC', $order_by = 'ID')
{
    $post_args = array(
        'post_type' => $postType,
        'post_status' => 'publish',
        'orderby' => $order_by,
        'order' => $order,
        'posts_per_page' => -1
    );
    $allPosts = new WP_Query($post_args);
    $posts_array = array('0' => esc_html($label));
    if ($allPosts->have_posts()):
        while ($allPosts->have_posts()):
            $allPosts->the_post();
            $posts_array[get_the_ID()] = get_the_title();
        endwhile;
    endif;
    wp_reset_postdata();

    return $posts_array;
}

/*
* Ulina Product Flash Labels
*/
function ulina_product_flash_notice_label($productID = 0){
    if($productID == '' || $productID == 0){
        return;
    }
    
    $product = wc_get_product($productID);
    $productId = $product->get_id();
    if ($product->is_type('grouped')) {
        return;
    }

    $total_sales = get_post_meta($product->get_id(), 'total_sales', TRUE);
    $_stock = get_post_meta($product->get_id(), '_stock', TRUE);
    $_low_stock_amount = get_post_meta($product->get_id(), '_low_stock_amount', TRUE);
    $_stock_status = get_post_meta($product->get_id(), '_stock_status', TRUE);

    $_is_top = (defined('FW') ? fw_get_db_post_option($productId, '_is_top', 2) : 2);
    $_is_hot = (defined('FW') ? fw_get_db_post_option($productId, '_is_hot', 2) : 2);


    $html = '<div class="productLabels">';
        $html .= '<div class="row">';
            if ($_is_top == 1):
                $html .= '<div class="col-6"><span class="plTop">' . esc_html__('Top', 'ulina') . '</span></div>';
            endif;
            if ($_is_hot == 1):
                $html .= '<div class="col-6"><span class="plHot">' . esc_html__('Hot', 'ulina') . '</span></div>';
            endif;

            if ($product->is_type('variable')): 
                $percentages = 0;
                $prices = $product->get_variation_prices();
                foreach ($prices['price'] as $key => $price):
                    if ($prices['regular_price'][$key] !== $price):
                        $percentages += 1;
                    endif;
                endforeach;
                if ($percentages > 0):
                    $html .= '<div class="col-6"><span class="plSale">' . esc_html__('Sale', 'ulina') . '</span></div>';
                endif;
            elseif ($product->is_on_sale() && !$product->is_type('variable')):
                $regular_price = (float)$product->get_regular_price();
                $sale_price = (float)$product->get_sale_price();

                $html .= '<div class="col-6"><span class="plDis">-' . str_replace('.00', '', wp_strip_all_tags(wc_price(wc_get_price_to_display( $product, array( 'price' => ($regular_price - $sale_price) ))))). '</span></div>';
            endif;

            if ($product->is_featured()):
                $html .= '<div class="col-6"><span class="plFeatured">' . esc_html__('Featured', 'ulina') . '</span></div>';
            endif;

            if ($_stock != '' && $_low_stock_amount != '' && $_stock <= $_low_stock_amount):
                if ($_stock > 0):
                    $html .= '<div class="col-6"><span class="plstock">' . esc_html__('Limited Stock', 'ulina') . '</span></div>';
                else:
                    $html .= '<div class="col-6"><span class="plostock">' . esc_html__('Out of Stock', 'ulina') . '</span></div>';
                endif;
            elseif (($_stock == 0 || $_stock == '') && $_stock_status == 'outofstock'):
                $html .= '<div class="col-6"><span class="plostock">' . esc_html__('Out of Stock', 'ulina') . '</span></div>';
            endif;
        $html .= '</div>';
    $html .= '</div>';

    return $html;
}