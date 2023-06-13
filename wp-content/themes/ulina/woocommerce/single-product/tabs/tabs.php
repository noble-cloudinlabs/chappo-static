<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );
global $product;

$shop_product_tab_style = get_theme_mod('shop_product_tab_style', 1);
$shop_product_tab_align = get_theme_mod('shop_product_tab_align', 'center');

if(defined('FW')):
    $shop_products_enable_content_setting = fw_get_db_post_option($product->get_id(), 'shop_products_enable_content_setting', 2);
    if ($shop_products_enable_content_setting == 1):
        $shop_products_tab_style = fw_get_db_post_option($product->get_id(), 'shop_products_tab_style', 1);
        $shop_products_tab_align = fw_get_db_post_option($product->get_id(), 'shop_products_tab_align', 'center');
        
        $shop_product_tab_style = ($shop_products_tab_style > 0 ? $shop_products_tab_style : $shop_product_tab_style);
        $shop_product_tab_align = ($shop_products_tab_align != '' ? $shop_products_tab_align : $shop_product_tab_align);
    endif;
endif;

if ( ! empty( $product_tabs ) ) : ?>
    <?php if($shop_product_tab_style == 1 || $shop_product_tab_style == 2): ?>
        <div class="row productTabRow">
            <div class="col-lg-12">
                <ul class="nav productDetailsTab pdtAlign_<?php echo esc_attr($shop_product_tab_align); ?> productDetailsTabMode_<?php echo esc_attr($shop_product_tab_style); ?>" id="productDetailsTab" role="tablist">
                    <?php $pt = 1; foreach ( $product_tabs as $key => $product_tab ) : ?>
                    <li role="presentation">
                        <button class="<?php echo esc_attr(($pt == 1 ? 'active' : '')); ?>" id="<?php echo esc_attr( $key ); ?>-tab" data-bs-toggle="tab" data-bs-target="#tab-<?php echo esc_attr( $key ); ?>" type="button" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>" aria-selected="<?php echo esc_attr(($pt == 1 ? 'true' : 'false')); ?>">
                            <?php echo ulina_kses( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
                        </button>
                    </li>
                    <?php $pt++; endforeach; ?>
                </ul>
                <div class="tab-content" id="desInfoRev_content">
                    <?php $pt = 1; foreach ( $product_tabs as $key => $product_tab ) : ?>
                    <div class="tab-pane fade <?php echo esc_attr(($pt == 1 ? ' show active ' : '')); ?>" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr( $key ); ?>-tab" tabindex="0">
                        <div class="inner_<?php echo esc_attr( $key ); ?>">
                            <?php
                                if ( isset( $product_tab['callback'] ) ) {
                                    call_user_func( $product_tab['callback'], $key, $product_tab );
                                }
                            ?>
                        </div>
                    </div>
                    <?php $pt++; endforeach; ?>
                </div>
            </div>
        </div>
    <?php else: ?> 
        <div class="row productContentRow">
            <?php $pt = 1; foreach ( $product_tabs as $key => $product_tab ) : ?>
                <div class="productOpenTab">
                    <h4 class="potTitle"><?php echo ulina_kses( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?></h4>
                    <?php
                        if ( isset( $product_tab['callback'] ) ) {
                            call_user_func( $product_tab['callback'], $key, $product_tab );
                        }
                    ?>
                </div>
            <?php $pt++; endforeach; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>
