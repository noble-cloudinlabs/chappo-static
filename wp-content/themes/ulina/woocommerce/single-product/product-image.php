<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$shop_product_gallery_style = get_theme_mod('shop_product_gallery_style', 1);
$shop_product_is_zoom = get_theme_mod('shop_product_is_zoom', false);
$shop_product_is_flashlabel = get_theme_mod('shop_product_is_flashlabel', true);
if(defined('FW')):
    $shop_products_enable_content_setting = fw_get_db_post_option($product->get_id(), 'shop_products_enable_content_setting', 2);
    if($shop_products_enable_content_setting == 1):
        $shop_products_gallery_style = fw_get_db_post_option($product->get_id(), 'shop_products_gallery_style', 1);
        $shop_products_is_zoom = fw_get_db_post_option($product->get_id(), 'shop_products_is_zoom', 2);
        $shop_products_is_flashlabel = fw_get_db_post_option($product->get_id(), 'shop_products_is_flashlabel', 1);
        
        $shop_product_gallery_style = ($shop_products_gallery_style > 0 ? $shop_products_gallery_style : $shop_product_gallery_style);
        $shop_product_is_zoom = ( $shop_products_is_zoom > 0 ? ($shop_products_is_zoom == 1 ? true : false) : $shop_product_is_zoom);
        $shop_product_is_flashlabel = ( $shop_products_is_flashlabel > 0 ? ($shop_products_is_flashlabel == 1 ? true : false) : $shop_product_is_flashlabel);
    endif;
endif;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);
$attachment_ids = $product->get_gallery_image_ids();
$gallery_status = (empty($attachment_ids) ? 1 : 2);
if(has_post_thumbnail() && empty($attachment_ids)):
    array_unshift($attachment_ids, $post_thumbnail_id);
endif;
?>
<?php if($shop_product_gallery_style == 2): ?>
    <div class="productGalleryWrap2 clearfix">
        <div class="productGalleryThumb2">
            <?php
                foreach($attachment_ids as $attachment_id):
                    if($attachment_id > 0):
                        ?>
                        <div class="pgtImage2">
                            <img src="<?php echo ulina_attachment_url($attachment_id, 120, 120) ?>" alt="<?php echo esc_attr($product->get_name()) ?>" />
                        </div>
                        <?php 
                    endif;
                endforeach;
            ?>
        </div>
        <div class="productGallery2Wrap">
            <div class="productGallery2">
                <?php
                    foreach($attachment_ids as $attachment_id):
                        if($attachment_id > 0):
                            ?>
                            <div class="pgImage2">
                                <img src="<?php echo ulina_attachment_url($attachment_id, 450, 534) ?>" alt="<?php echo esc_attr($product->get_name()) ?>" />
                                <a class="pdImageZoom" href="<?php echo ulina_attachment_url($attachment_id, 'full') ?>"><i class="ulina-magnifying-glass"></i></a>
                            </div>
                            <?php 
                        endif;
                    endforeach;
                ?>
            </div>
            <?php if($shop_product_is_flashlabel): ?>
                <?php echo ulina_product_flash_notice_label($product->get_id()); ?>
            <?php endif; ?>
        </div>
    </div>
<?php else: ?>
    <div class="productGalleryWrap">
        <div class="productGallery">
            <?php
                foreach($attachment_ids as $attachment_id):
                    if($attachment_id > 0):
                        ?>
                        <div class="pgImage">
                            <img src="<?php echo ulina_attachment_url($attachment_id, 588, 420) ?>" alt="<?php echo esc_attr($product->get_name()) ?>" />
                            <a class="pdImageZoom" href="<?php echo ulina_attachment_url($attachment_id, 'full') ?>"><i class="ulina-magnifying-glass"></i></a>
                        </div>
                        <?php 
                    endif;
                endforeach;
            ?>
        </div>
        <div class="productGalleryThumbWrap">
            <div class="productGalleryThumb">
                <?php
                    foreach($attachment_ids as $attachment_id):
                        if($attachment_id > 0):
                            ?>
                            <div class="pg_thumbs">
                                <img src="<?php echo ulina_attachment_url($attachment_id, 120, 120) ?>" alt="<?php echo esc_attr($product->get_name()) ?>" />
                            </div>
                            <?php 
                        endif;
                    endforeach;
                ?>
            </div>
        </div>
        <?php if($shop_product_is_flashlabel): ?>
            <?php echo ulina_product_flash_notice_label($product->get_id()); ?>
        <?php endif; ?>
    </div>
<?php endif; ?>