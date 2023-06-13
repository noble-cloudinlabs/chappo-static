<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); 

$shop_product_is_banner = get_theme_mod('shop_product_is_banner', 1);
if(defined('FW')):
	$shop_products_is_settings = fw_get_db_post_option(get_the_ID(), 'shop_products_is_settings', 2);
	$shop_products_is_banner = fw_get_db_post_option(get_the_ID(), 'shop_products_is_banner', 1); 

	$shop_product_is_banner = ($shop_products_is_settings == 1 && $shop_products_is_banner > 0 ? $shop_products_is_banner : $shop_product_is_banner);
endif;
if($shop_product_is_banner == 1):
	get_template_part('template-parts/header/shop-product', 'header');
endif;

?>
<?php while ( have_posts() ) : ?>
	<?php the_post(); ?>
	<?php wc_get_template_part( 'content', 'single-product' ); ?>
<?php endwhile; ?>

<?php
get_footer( 'shop' );  