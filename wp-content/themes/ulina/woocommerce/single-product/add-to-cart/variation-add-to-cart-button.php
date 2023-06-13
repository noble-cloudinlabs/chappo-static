<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

global $product;

$shop_product_is_wishlist = get_theme_mod('shop_product_is_wishlist', false);
if (defined('FW')):
    $shop_products_enable_content_setting = fw_get_db_post_option($product->get_id(), 'shop_products_enable_content_setting', 2);
    if ($shop_products_enable_content_setting == 1):
        $shop_products_is_wishlist = fw_get_db_post_option($product->get_id(), 'shop_products_is_wishlist', 2);
        
        $shop_product_is_wishlist = ( $shop_products_is_wishlist > 0 ? ($shop_products_is_wishlist == 1 ? true : false) : $shop_product_is_wishlist);
    endif;
endif;

?>
<div class="woocommerce-variation-add-to-cart variations_button">
	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

	<?php
	do_action( 'woocommerce_before_add_to_cart_quantity' );

	woocommerce_quantity_input(
		array(
			'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
			'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
			'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
		)
	);

	do_action( 'woocommerce_after_add_to_cart_quantity' );
	?>

        <button type="submit" class="single_add_to_cart_button button alt ulinaBTN"><span><?php echo esc_html( $product->single_add_to_cart_text() ); ?></span></button>
        <?php if (shortcode_exists('yith_wcwl_add_to_wishlist') && $shop_product_is_wishlist): ?>
            <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
        <?php endif; ?>

	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
	<?php 
		echo ulina_kses( apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations ulinaBTN02 ulinaBTN02R" href="#"><span>' . esc_html__( 'Clear', 'ulina' ) . '</span></a>' ) );
	?>
        
</div>
