<?php
/**
 * Additional Information tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/additional-information.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
$postID = $product->get_id();

$shop_product_tab_style = get_theme_mod('shop_product_tab_style', 1);
$shop_products_details_area_label = '';
$shop_products_feature_area_label = '';
$shop_products_features = [];
$shop_products_addinfo_area_label = '';
if(defined('FW')):
    $shop_products_details_area_label = fw_get_db_post_option($postID, 'shop_products_details_area_label', '');
    $shop_products_feature_area_label = fw_get_db_post_option($postID, 'shop_products_feature_area_label', '');
    $shop_products_features = fw_get_db_post_option($postID, 'shop_products_features', array());
    $shop_products_addinfo_area_label = fw_get_db_post_option($postID, 'shop_products_addinfo_area_label', '');
    
    $shop_products_enable_content_setting = fw_get_db_post_option($product->get_id(), 'shop_products_enable_content_setting', 2);
    $shop_products_tab_style = fw_get_db_post_option($postID, 'shop_products_tab_style', 1);
    $shop_product_tab_style = ($shop_products_enable_content_setting == 1 && $shop_products_tab_style > 0 ? $shop_products_tab_style : $shop_product_tab_style);
    
endif;
?>
<div class="additionalContentArea">
    <?php if(!empty($shop_products_addinfo_area_label) && $shop_product_tab_style != 3): ?>
    <h3><?php echo esc_html($shop_products_addinfo_area_label) ?></h3>
    <?php endif; ?>
    <?php do_action( 'woocommerce_product_additional_information', $product ); ?>
</div>
