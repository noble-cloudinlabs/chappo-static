<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $product;

if ( $related_products ) : ?>
<?php
    $shop_product_area_title = get_theme_mod('shop_product_area_title', esc_html__( 'More Products Like This', 'ulina' ));
    $shop_product_related_is_flashlabels = get_theme_mod('shop_product_related_is_flashlabels', true);
    $shop_product_related_is_wishlist = get_theme_mod('shop_product_related_is_wishlist', false);
    $shop_product_related_is_quickview = get_theme_mod('shop_product_related_is_quickview', false);
    $shop_product_is_rating_count = get_theme_mod('shop_product_is_rating_count', false);
    $shop_product_review_label = get_theme_mod('shop_product_review_label', esc_html__('Reviews', 'ulina'));

    $productID = get_the_ID();
    if(defined('FW')):
        $shop_products_enable_content_setting = fw_get_db_post_option($productID, 'shop_products_enable_content_setting', 2);
	    if($shop_products_enable_content_setting == 1):
            $shop_products_area_title = fw_get_db_post_option($productID, 'shop_products_area_title', esc_html__( 'More Products Like This', 'ulina' ));
            $shop_products_related_is_flashlabels = fw_get_db_post_option($productID, 'shop_products_related_is_flashlabels', 1);
            $shop_products_related_is_wishlist = fw_get_db_post_option($productID, 'shop_products_related_is_wishlist', 2);
            $shop_products_related_is_quickview = fw_get_db_post_option($productID, 'shop_products_related_is_quickview', 2);
            $shop_products_is_rating_count = fw_get_db_post_option($productID, 'shop_products_is_rating_count', 2);
            $shop_products_review_label = fw_get_db_post_option($productID, 'shop_products_review_label', '');

            $shop_product_area_title = (!empty($shop_products_area_title) ? $shop_products_area_title : $shop_product_area_title);
            $shop_product_related_is_flashlabels = ($shop_products_related_is_flashlabels > 0 ? ($shop_products_related_is_flashlabels == 1 ? true : false) : $shop_product_related_is_flashlabels);
            $shop_product_related_is_wishlist = ($shop_products_related_is_wishlist > 0 ? ($shop_products_related_is_wishlist == 1 ? true : false) : $shop_product_related_is_wishlist);
            $shop_product_related_is_quickview = ($shop_products_related_is_quickview > 0 ? ($shop_products_related_is_quickview == 1 ? true : false) : $shop_product_related_is_quickview);
            $shop_product_is_rating_count = ($shop_products_is_rating_count > 0 ? ($shop_products_is_rating_count == 1 ? true : false) : $shop_product_is_rating_count);
            $shop_product_review_label = ($shop_products_review_label != '' ? $shop_products_review_label : $shop_product_review_label);
        endif;
    endif;

?>
<div class="row relatedProductRow">
    <div class="col-lg-12">
        <?php if(!empty($shop_product_area_title)): ?>
        <h2 class="secTitle"><?php echo esc_html($shop_product_area_title) ?></h2>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="relatedProductCarousel owl-carousel">
                    <?php
                    foreach ( $related_products as $related_product ) :
                        $post_object = get_post( $related_product->get_id() );
                        setup_postdata( $GLOBALS['post'] =& $post_object );
                        $rProduct = wc_get_product(get_the_ID());

                        if(defined('FW')){
                            $_secondary_image = fw_get_db_post_option(get_the_ID(), '_product_img_2', array());
                        }
                        $_secondary_image_id = (isset($_secondary_image['attachment_id']) && $_secondary_image['attachment_id'] > 0 ? $_secondary_image['attachment_id'] : get_post_thumbnail_id(get_the_ID()));

                        $w = 270;
                        $h = 355;
                        ?>
                        <div <?php wc_product_class('uiuxomProductWrapper', $rProduct); ?>>
                            <div class="productItem01 <?php echo esc_attr((get_option('woocommerce_enable_review_rating') === 'yes' && $rProduct->get_review_count() > 0 ? '' : 'pi01NoRating')); ?>">
                                <div class="pi01Thumb">
                                    <img src="<?php echo ulina_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                                    <img src="<?php echo ulina_attachment_url($_secondary_image_id, $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                                    <div class="pi01Actions">
                                        <?php if($rProduct->is_type( 'variable' ) && ulina_plugin_active('wcboost-variation-swatches')): ?> 
                                            <?php if(function_exists('ulina_variable_add_to_cart')){ ulina_variable_add_to_cart(); } ?>
                                        <?php else: ?>
                                            <?php if(function_exists('ulina_add_to_cart')){ ulina_add_to_cart(); } ?>
                                        <?php endif; ?>
                                        <?php if ($shop_product_related_is_quickview): ?>
                                            <?php function_exists('ulina_quick_view') ? ulina_quick_view(get_the_ID()) : '' ?>
                                        <?php endif; ?>
                                        <?php if (shortcode_exists('yith_wcwl_add_to_wishlist') && $shop_product_related_is_wishlist): ?>
                                            <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                                        <?php endif; ?>
                                    </div>
                                    <?php if($shop_product_related_is_flashlabels): ?>
                                        <?php echo ulina_product_flash_notice_label(get_the_ID()); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="pi01Details">
                                    <?php if (get_option('woocommerce_enable_review_rating') === 'yes' && $rProduct->get_review_count() > 0) : ?>
                                    <div class="productRatings">
                                        <div class="productRatingWrap">
                                            <?php if (function_exists('woocommerce_template_loop_rating')): ?>
                                                <?php echo woocommerce_template_loop_rating(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <?php if($shop_product_is_rating_count && !empty($shop_product_review_label)): ?>
                                            <div class="ratingCounts"><?php echo esc_html($rProduct->get_review_count()) ?> <?php echo esc_html($shop_product_review_label); ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                    <h3><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a></h3>
                                    <div class="pi01Price">
                                        <?php echo ulina_kses($rProduct->get_price_html()); ?>
                                    </div>
                                    <?php if($rProduct->is_type( 'variable' ) && ulina_plugin_active('wcboost-variation-swatches')): ?> 
                                        <?php if(function_exists('display_variation_dropdown')): display_variation_dropdown(); endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div> 
</div>
<?php
wp_reset_postdata();
endif;