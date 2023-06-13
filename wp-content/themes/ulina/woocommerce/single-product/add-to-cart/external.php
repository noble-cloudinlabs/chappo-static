<?php
/**
 * External product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/external.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_add_to_cart_form' ); 

$shop_product_is_wishlist = get_theme_mod('shop_product_is_wishlist', false);
if (defined('FW')):
    $shop_products_enable_content_setting = fw_get_db_post_option($product->get_id(), 'shop_products_enable_content_setting', 2);
    if ($shop_products_enable_content_setting == 1):
        $shop_products_is_wishlist = fw_get_db_post_option($product->get_id(), 'shop_products_is_wishlist', 2);
        
        $shop_product_is_wishlist = ( $shop_products_is_wishlist > 0 ? ($shop_products_is_wishlist == 1 ? true : false) : $shop_product_is_wishlist);
    endif;
endif;

?>

<form class="cart" action="<?php echo esc_url( $product_url ); ?>" method="get">
	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

        <button type="submit" class="single_add_to_cart_button button alt ulinaBTN"><span><?php echo esc_html( $button_text ); ?></span></button>
        
        <?php if (shortcode_exists('yith_wcwl_add_to_wishlist') && $shop_product_is_wishlist): ?>
            <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
        <?php endif; ?>

	<?php wc_query_string_form_fields( $product_url ); ?>

	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
</form>

<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
