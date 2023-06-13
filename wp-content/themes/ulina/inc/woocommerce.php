<?php
function ulina_quick_view($id = 0){
    if (!$id || $id < 1 || empty($id) || $id == ''):
        return;
    endif; ?>
<a data-id="<?php echo esc_attr($id); ?>" href="javascript:void(0);" class="pi01AQView"><i class="ulina-arrows-up-down-left-right"></i></a>
    <?php
}

add_filter( 'woocommerce_product_add_to_cart_text', 'ulina_custom_product_add_to_cart_text' );  
function ulina_custom_product_add_to_cart_text() {
    return ulina_kses('<i class="ulina-cart-shopping"></i>');
}

function ulina_add_to_cart(){
    if (function_exists('woocommerce_template_loop_add_to_cart')) {
        echo woocommerce_template_loop_add_to_cart();
    }
}

function ulina_variable_add_to_cart(){
    global $product;
    ?><a href="javascript:void(0);" class="pi01Cart variableAddToCart disabled" data-product="<?php echo esc_attr($product->get_id()); ?>" type="button"><i class="ulina-cart-shopping"></i></a><?php
}

add_action('wp_ajax_nopriv_ulina_product_quick_view', 'ulina_product_quick_view');
add_action('wp_ajax_ulina_product_quick_view', 'ulina_product_quick_view');
function ulina_product_quick_view(){
    check_ajax_referer('ulina_security_check', 'ulina_security');
    $productID = sanitize_text_field($_POST['productID']);
    
    $qv_is_flashlabel = get_theme_mod('qv_is_flashlabel', true);
    $qv_is_cat = get_theme_mod('qv_is_cat', true);
    $qv_is_review = get_theme_mod('qv_is_review', true);
    $qv_is_stock = get_theme_mod('qv_is_stock', false);
    $qv_stock_label = get_theme_mod('qv_stock_label', esc_html__('Available:', 'ulina'));
    $qv_is_wishlist = get_theme_mod('qv_is_wishlist', false);
    
    $qv_is_sku = get_theme_mod('qv_is_sku', true);
    $qv_is_tag = get_theme_mod('qv_is_tag', true);
    $qv_is_social = get_theme_mod('qv_is_social', false);
    $qv_product_social = get_theme_mod('qv_product_social', ['1', '2', '4', '5']);
    
    $html = '';
    ob_start();
    $pro = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'post__in' => array($productID)
    );
    $pros = new WP_Query($pro);
    if ($pros->have_posts()):
        while ($pros->have_posts()):
            $pros->the_post();
            $product = wc_get_product(get_the_ID());
            
            
            $post_thumbnail_id = $product->get_image_id();
            $attachment_ids = (!empty($product->get_gallery_image_ids()) ? $product->get_gallery_image_ids() : []);
            if(has_post_thumbnail()):
                array_unshift($attachment_ids, $post_thumbnail_id);
            endif;
            ?>
            <div id="product-<?php the_ID(); ?>" <?php wc_product_class('productContainerWrap', $product); ?>>
                <div class="row">
                    <div class="col-md-6">
                        <div class="productGalleryWrap">
                            <div class="productGalleryPopup">
                                <?php 
                                    if(!empty($attachment_ids)):
                                        foreach($attachment_ids as $imgID):
                                        ?>
                                        <div class="pgImage">
                                            <img src="<?php echo ulina_attachment_url($imgID, 447, 470); ?>" alt="<?php echo get_the_title(); ?>"/>
                                        </div>
                                        <?php
                                        endforeach;
                                    else:
                                        ?>
                                        <div class="pgImage">
                                            <img src="<?php echo ulina_post_thumbnail(get_the_ID(), 447, 470); ?>" alt="<?php echo get_the_title(); ?>"/>
                                        </div>
                                        <?php
                                    endif;
                                ?>
                            </div>
                            <div class="productGalleryThumbWrap">
                                <div class="productGalleryThumbPopup">
                                    <?php 
                                        if(!empty($attachment_ids)):
                                            foreach($attachment_ids as $imgID):
                                            ?>
                                            <div class="pgtImage">
                                                <img src="<?php echo ulina_attachment_url($imgID, 120, 120); ?>" alt="<?php echo get_the_title(); ?>"/>
                                            </div>
                                            <?php
                                            endforeach;
                                        else:
                                            ?>
                                            <div class="pgtImage">
                                                <img src="<?php echo ulina_post_thumbnail(get_the_ID(), 120, 120); ?>" alt="<?php echo get_the_title(); ?>"/>
                                            </div>
                                            <?php
                                        endif;
                                    ?>
                                </div>
                            </div>
                            <?php if($qv_is_flashlabel): ?>
                                <?php echo ulina_product_flash_notice_label($product->get_id()); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="quickViewContentWrap">
                            <div class="productContent">
                                <?php if ($qv_is_cat && !empty($product->get_category_ids())): ?>
                                    <div class="pcCategory">
                                        <?php
                                        $categories = $product->get_category_ids();
                                        $i = 1;
                                        foreach ($categories as $cid):
                                            $cTerm = get_term_by('id', $cid, 'product_cat');
                                            echo '<a href="' . get_term_link($cTerm->term_id, 'product_cat') . '">' . $cTerm->name . '</a>' . ($i != count($categories) ? ', ' : '');
                                            $i++;
                                        endforeach;
                                        ?>
                                    </div>
                                <?php endif; ?>
                                <h2><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
                                <div class="pi01Price">
                                    <?php echo woocommerce_template_single_price(); ?>
                                </div>
                                <?php if($qv_is_review || $qv_is_stock): ?>
                                <div class="productRadingsStock clearfix">
                                    <?php if($qv_is_review && (get_option('woocommerce_enable_review_rating') === 'yes' && $product->get_review_count() > 0)): ?>
                                        <div class="productRatings float-start">
                                            <div class="productRatingWrap">
                                                <?php if (function_exists('woocommerce_template_single_rating')): ?>
                                                    <?php echo woocommerce_template_single_rating(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($qv_is_stock): ?>
                                        <div class="productStock <?php echo esc_attr(($qv_is_review && (get_option('woocommerce_enable_review_rating') === 'yes' && $product->get_review_count() > 0) ? 'float-end' : 'float-start')); ?>">
                                            <?php echo (!empty($qv_stock_label) ? '<span>'.$qv_stock_label.'</span> ' : ''); ?>
                                            <?php if ($product->managing_stock() > 0): ?>
                                                <?php echo ' '.wp_strip_all_tags(wc_get_stock_html($product)); ?>
                                            <?php else: ?>
                                                <?php echo esc_html__(' In Stock', 'ulina'); ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                                <?php if(has_excerpt()): ?>
                                    <div class="pcExcerpt">
                                        <?php 
                                            $qv_desc_liength = 137;
                                            $theExcerpt = wp_strip_all_tags(get_the_excerpt());
                                            $theCutExcerpt = $theExcerpt;
                                            if (preg_match('/^.{1,'.$qv_desc_liength.'}\b/s', $theExcerpt, $myMatch)):
                                                $theCutExcerpt = $myMatch[0];
                                            endif;
                                            echo ulina_kses($theCutExcerpt).'...';
                                        ?>
                                    </div>
                                <?php endif; ?>
                                <div class="pcBtns">
                                    <?php echo woocommerce_template_single_add_to_cart(); ?>
                                </div>
                                <?php if($qv_is_sku || $qv_is_tag || $qv_is_social): ?>
                                    <div class="pcMeta">
                                        <?php if($qv_is_sku && !empty($product->get_sku())): ?>
                                        <p>
                                            <span><?php echo esc_html__('Sku:', 'ulina') ?></span>
                                            <a href="javascript:void(0);"><?php echo ulina_kses($product->get_sku()) ?></a>
                                        </p>
                                        <?php endif; ?>
                                        <?php if ($qv_is_tag && !empty($product->get_tag_ids())): ?>
                                            <p class="pcmTags">
                                                <span><?php echo esc_html__('Tags:', 'ulina') ?></span>
                                                <?php
                                                $tags = $product->get_tag_ids();
                                                $i = 1;
                                                foreach ($tags as $tid):
                                                    $cTerm = get_term_by('id', $tid, 'product_tag');
                                                    echo '<a href="' . get_term_link($cTerm->term_id, 'product_tag') . '">' . $cTerm->name . '</a>' . ($i != count($tags) ? ', ' : '');
                                                    $i++;
                                                endforeach;
                                                ?>
                                            </p>
                                        <?php endif; ?>
                                        <?php if ($qv_is_social && !empty($qv_product_social)): ?>
                                            <p class="pcmSocial">
                                                <span><?php echo esc_html__('Share:', 'ulina') ?></span>
                                                <?php
                                                if (in_array(1, $qv_product_social)) {
                                                    echo '<a class="fac" target="_blank" href="https://www.facebook.com/sharer.php?u=' . get_the_permalink() . '&title=' . esc_url(get_the_title()) . '"><i class="ulina-facebook"></i></a>';
                                                }
                                                if (in_array(2, $qv_product_social)) {
                                                    echo '<a  class="twi" target="_blank" href="https://twitter.com/intent/tweet?url=' . get_the_permalink() . '&text=' . esc_url(get_the_title()) . '"><i class="ulina-twitter"></i></a>';
                                                }
                                                if (in_array(4, $qv_product_social)) {
                                                    echo '<a class="lin" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink() . '&title=' . esc_url(get_the_title()) . '"><i class="ulina-linkedin-in"></i></a>';
                                                }
                                                if (in_array(5, $qv_product_social)) {
                                                    echo '<a  class="pin"target="_blank" href="https://pinterest.com/pin/create/bookmarklet/?media=' . get_the_post_thumbnail_url(get_the_ID(), 'full') . '&url=' . get_the_permalink() . '&is_video=false&description=' . esc_url(get_the_title()) . '"><i class="ulina-pinterest-p"></i></a>';
                                                }
                                                if (in_array(6, $qv_product_social)) {
                                                    echo '<a class="wtp" target="_blank" href="https://api.whatsapp.com/send?text=' . get_the_permalink() . '"><i class="ulina-whatsapp"></i></a>';
                                                }
                                                if (in_array(7, $qv_product_social)) {
                                                    echo '<a class="dig" target="_blank" href="https://digg.com/submit?url=' . get_the_permalink() . '&title=' . esc_url(get_the_title()) . '"><i class="ulina-digg"></i></a>';
                                                }
                                                if (in_array(8, $qv_product_social)) {
                                                    echo '<a class="tmb" target="_blank" href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=' . get_the_permalink() . '&title=' . esc_url(get_the_title()) . '"><i class="ulina-tumblr"></i></a>';
                                                }
                                                if (in_array(9, $qv_product_social)) {
                                                    echo '<a class="red" target="_blank" href="https://reddit.com/submit?url=' . get_the_permalink() . '&title=' . esc_url(get_the_title()) . '"><i class="ulina-reddit-alien"></i></a>';
                                                }
                                                if (in_array(3, $qv_product_social)) {
                                                    echo '<a class="mil" target="_blank" href="mailto:?subject=' . get_the_permalink() . '"><i class="ulina-envelope"></i></a>';
                                                }
                                                ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endwhile;
    endif;
    wp_reset_postdata();
    $html = ob_get_clean();
    echo json_encode(array('html' => $html));
    wp_die();
}


add_filter('woocommerce_product_single_add_to_cart_text', 'ulina_custom_single_add_to_cart_text');
function ulina_custom_single_add_to_cart_text(){
    return esc_html__('Add to Cart', 'ulina');
}


add_filter( 'loop_shop_per_page', 'ulina_loop_shop_per_page', 30 );
function ulina_loop_shop_per_page( $products ) {
    $products = get_theme_mod('shop_numof_product', 8);
    return $products;
}

function display_variation_dropdown() {
        global $product;

        if ( ! $product->is_type( 'variable' ) ) {
                return;
        }

        // Get Available variations?
        $get_variations = count( $product->get_children() ) <= apply_filters( 'woocommerce_ajax_variation_threshold', 30, $product );

        // Load the template.
        wc_get_template(
                'loop/add-to-cart-variable.php',
                array(
                        'available_variations' => $get_variations ? $product->get_available_variations() : false,
                        'attributes'           => $product->get_variation_attributes(),
                        'selected_attributes'  => $product->get_default_attributes(),
                )
        );
}

add_action('wp_ajax_nopriv_ulina_variation_price', 'ulina_variation_price');
add_action('wp_ajax_ulina_variation_price', 'ulina_variation_price');
function ulina_variation_price(){
    check_ajax_referer('ulina_security_check', 'ulina_security');
    if ( empty( $_POST['variation_id'] ) || empty( $_POST['product_id'] ) ) {
            exit;
    }
    $product = wc_get_product( $_POST['product_id']);
    
    $variation = new \WC_Product_Variation( $_POST['variation_id'] );
    $output = array(
            'variation' 		=> $variation->get_image(),
            'price_variation'	=> $variation->get_price_html(),
            'stock_status'	=> $variation->get_stock_status(),
            'org_price'         => $product->get_price_html()
    );

    wp_send_json_success( array ( $output ) );
    exit;
}

add_action('wp_ajax_nopriv_ulina_product_price', 'ulina_product_price');
add_action('wp_ajax_ulina_product_price', 'ulina_product_price');
function ulina_product_price(){
    check_ajax_referer('ulina_security_check', 'ulina_security');
    if ( empty( $_POST['product_id'] ) ) {
            exit;
    }
    $product = wc_get_product( $_POST['product_id']);
    
    $output = array(
            'product_price'         => $product->get_price_html()
    );

    wp_send_json_success( array ( $output ) );
    exit;
}

add_action('wp_ajax_nopriv_ulina_loop_variation_addtocart', 'ulina_loop_variation_addtocart');
add_action('wp_ajax_ulina_loop_variation_addtocart', 'ulina_loop_variation_addtocart');
function ulina_loop_variation_addtocart(){
    ob_start();
    check_ajax_referer('ulina_security_check', 'ulina_security');

    $product_id        = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $_POST['product_id'] ) );
    $quantity          = empty( $_POST['quantity'] ) ? 1 : wc_stock_amount( $_POST['quantity'] );

    $variation_id      = isset( $_POST['variation_id'] ) ? absint( $_POST['variation_id'] ) : '';
    $variations         = '';
    if($variation_id > 0):
        $variationDetails = new \WC_Product_Variation( $variation_id );
        $variations = $variationDetails->get_attributes();
    endif;

    $passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity, $variation_id, $variations, $cart_item_data );

    if ( $passed_validation && WC()->cart->add_to_cart( $product_id, $quantity, $variation_id, $variations ) ) {

        do_action( 'woocommerce_ajax_added_to_cart', $product_id );

        if ( get_option( 'woocommerce_cart_redirect_after_add' ) == 'yes' ) {
            wc_add_to_cart_message( $product_id );
        }

        // Return fragments
        WC_AJAX::get_refreshed_fragments();
        
        $data = array(
            'error' => false,
            'cart_url' => wc_get_cart_url()
        );
        
        //wp_send_json( $data );
    } else {

        // If there was an error adding to the cart, redirect to the product page to show any errors
        $data = array(
            'error' => true,
            'product_url' => apply_filters( 'woocommerce_cart_redirect_after_error', get_permalink( $product_id ), $product_id )
        );

        wp_send_json( $data );

    }
    exit;
}

add_action('wp_ajax_nopriv_ulina_ajax_product', 'ulina_ajax_product');
add_action('wp_ajax_ulina_ajax_product', 'ulina_ajax_product');
function ulina_ajax_product(){
    check_ajax_referer('ulina_security_check', 'ulina_security');
    
    $query_args = (isset($_POST['query']) && $_POST['query'] ? json_decode(stripslashes($_POST['query']), true) : []);
    $view_args = (isset($_POST['view']) && $_POST['view'] ? json_decode(stripslashes($_POST['view']), true) : []);
    $page = (isset($_POST['page']) && $_POST['page'] ? $_POST['page'] : 1);
    $page += 1;
    $query_args['paged'] = $page;
    
    $sucs = false;
    $html = '';
    
    $pro_query = new WP_Query($query_args);
    ob_start();
    if($pro_query->have_posts()):
        $suc = true;
        
        $ps_xl_col = (isset($view_args['ps_xl_col']) ? $view_args['ps_xl_col'] : 4);
        $ps_lg_col = (isset($view_args['ps_lg_col']) ? $view_args['ps_lg_col'] : 4);
        $ps_md_col = (isset($view_args['ps_md_col']) ? $view_args['ps_md_col'] : 3);
        $ps_sm_col = (isset($view_args['ps_sm_col']) ? $view_args['ps_sm_col'] : 2);
        $ps_show_wishlist = ($view_args['ps_show_wishlist'] ? $view_args['ps_show_wishlist'] : 'no');
        $ps_show_quickview = (isset($view_args['ps_show_quickview']) ? $view_args['ps_show_quickview'] : 'yes');
        $ps_show_flashlabels = (isset($view_args['ps_show_flashlabels']) ? $view_args['ps_show_flashlabels'] : 'yes');
        $ps_show_review_count = (isset($view_args['ps_show_review_count']) ? $view_args['ps_show_review_count'] : 'no');
        $ps_reviw_suffice = (isset($view_args['ps_reviw_suffice']) ? $view_args['ps_reviw_suffice'] : '');
        $ps_post_thumb_width = (isset($view_args['ps_post_thumb_width']) ? $view_args['ps_post_thumb_width'] : '');
        $ps_post_thumb_height = (isset($view_args['ps_post_thumb_height']) ? $view_args['ps_post_thumb_height'] : '');
        
        $w = ($ps_post_thumb_width > 0 ? $ps_post_thumb_width : 270);
        $h = ($ps_post_thumb_height > 0 ? $ps_post_thumb_height : 355);
    
        while ($pro_query->have_posts()):
            $pro_query->the_post();
            $product = wc_get_product(get_the_ID());
            
            $_secondary_image = fw_get_db_post_option(get_the_ID(), '_product_img_2', array());
            $_secondary_image_id = (isset($_secondary_image['attachment_id']) && $_secondary_image['attachment_id'] > 0 ? $_secondary_image['attachment_id'] : get_post_thumbnail_id(get_the_ID()));

            ?>
            <div class="col-xl-<?php echo round(12 / $ps_xl_col); ?> col-lg-<?php echo round(12 / $ps_lg_col); ?> col-md-<?php echo round(12 / $ps_md_col); ?> col-sm-<?php echo round(12 / $ps_sm_col); ?>">
                <div <?php wc_product_class('uiuxomProductWrapper', $product); ?>>
                    <div class="productItem01 <?php echo esc_attr((get_option('woocommerce_enable_review_rating') === 'yes' && $product->get_review_count() > 0 ? '' : 'pi01NoRating')); ?>">
                        <div class="pi01Thumb">
                            <img src="<?php echo ulina_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                            <img src="<?php echo ulina_attachment_url($_secondary_image_id, $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                            <div class="pi01Actions">
                                <?php if($product->is_type( 'variable' ) && ulina_plugin_active('wcboost-variation-swatches')): ?> 
                                    <?php if(function_exists('ulina_variable_add_to_cart')){ ulina_variable_add_to_cart(); } ?>
                                <?php else: ?>
                                    <?php if(function_exists('ulina_add_to_cart')){ ulina_add_to_cart(); } ?>
                                <?php endif; ?>
                                <?php if ($ps_show_quickview == 'yes'): ?>
                                    <?php function_exists('ulina_quick_view') ? ulina_quick_view(get_the_ID()) : '' ?>
                                <?php endif; ?>
                                <?php if (shortcode_exists('yith_wcwl_add_to_wishlist') && $ps_show_wishlist == 'yes'): ?>
                                    <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                                <?php endif; ?>
                            </div>
                            <?php if($ps_show_flashlabels == 'yes'): ?>
                                <?php echo ulina_product_flash_notice_label(get_the_ID()); ?>
                            <?php endif; ?>
                        </div>
                        <div class="pi01Details">
                            <?php if (get_option('woocommerce_enable_review_rating') === 'yes' && $product->get_review_count() > 0) : ?>
                            <div class="productRatings">
                                <div class="productRatingWrap">
                                    <?php if (function_exists('woocommerce_template_loop_rating')): ?>
                                        <?php echo woocommerce_template_loop_rating(); ?>
                                    <?php endif; ?>
                                </div>
                                <?php if($ps_show_review_count == 'yes'): ?>
                                    <div class="ratingCounts"><?php echo esc_html($product->get_review_count()) ?> <?php echo esc_html($ps_reviw_suffice); ?></div>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                            <h3><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a></h3>
                            <div class="pi01Price">
                                <?php echo ulina_kses($product->get_price_html()); ?>
                            </div>
                            <?php if($product->is_type( 'variable' ) && ulina_plugin_active('wcboost-variation-swatches')): ?> 
                                <?php if(function_exists('display_variation_dropdown')): display_variation_dropdown(); endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        endwhile;
    endif;
    $html .= ob_get_clean();
    
    $data = array(
        'suc' => ($suc ? 1 : 0),
        'page' => $page,
        'html' => $html
    );
    
    wp_send_json($data);
    exit;
}

add_action( 'init', 'ulina_woocommerce_clear_cart_url' );
function ulina_woocommerce_clear_cart_url() {
    if ( isset( $_GET['clear-cart'] ) ) {
        global $woocommerce;
        $woocommerce->cart->empty_cart();
    }
}

add_action('wp_ajax_nopriv_ulina_apply_coupon', 'ulina_apply_coupon');
add_action('wp_ajax_ulina_apply_coupon', 'ulina_apply_coupon');
function ulina_apply_coupon(){
    check_ajax_referer('ulina_security_check', 'ulina_security');
    if ( ! empty( $_POST['coupon_code'] ) ) {
        WC()->cart->add_discount( wc_format_coupon_code( wp_unslash( $_POST['coupon_code'] ) ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
    } else {
        wc_add_notice( WC_Coupon::get_generic_coupon_error( WC_Coupon::E_WC_COUPON_PLEASE_ENTER ), 'error' );
    }

    wc_print_notices();
    wp_die();
}


add_filter( 'woocommerce_checkout_fields', 'ulina_update_checkout_fields_lables_to_placeholder', 9999 );
function ulina_update_checkout_fields_lables_to_placeholder( $fields ) {
   foreach ( $fields as $section => $section_fields ) {
      foreach ( $section_fields as $section_field => $section_field_settings ) {
         $fields[$section][$section_field]['placeholder'] = $fields[$section][$section_field]['label'];
         $fields[$section][$section_field]['label'] = '';
      }
   }
   return $fields;
}


add_action('init', 'ulina_remove_checkout_actions',10);
function ulina_remove_checkout_actions() {
    remove_action('woocommerce_before_checkout_form','woocommerce_checkout_login_form', 10);
    remove_action('woocommerce_before_checkout_form','woocommerce_checkout_coupon_form', 10);
    
    add_action('woocommerce_before_checkout_login_form','woocommerce_checkout_login_form', 10);
    add_action('woocommerce_before_checkout_coupon_form','woocommerce_checkout_coupon_form', 11);
}