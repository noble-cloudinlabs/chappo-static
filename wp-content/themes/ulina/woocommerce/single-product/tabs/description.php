<?php
/**
 * Description tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.0.0
 */

defined( 'ABSPATH' ) || exit;

global $post;
$postID = $post->ID;
$shop_products_details_area_label = '';
$shop_products_feature_area_label = '';
$shop_products_features = [];
$shop_products_addinfo_area_label = '';
if(defined('FW')):
    $shop_products_details_area_label = fw_get_db_post_option($postID, 'shop_products_details_area_label', '');
    $shop_products_feature_area_label = fw_get_db_post_option($postID, 'shop_products_feature_area_label', '');
    $shop_products_features = fw_get_db_post_option($postID, 'shop_products_features', array());
    $shop_products_addinfo_area_label = fw_get_db_post_option($postID, 'shop_products_addinfo_area_label', '');
endif;
?>
<div class="productDescContentArea">
    <div class="row">
        <div class="col-lg-<?php echo (!empty($shop_products_features) ? '6' : '12'); ?>">
            <div class="descriptionContent">
                <?php if(!empty($shop_products_details_area_label)): ?>
                <h3><?php echo esc_html($shop_products_details_area_label) ?></h3>
                <?php endif; ?>
                <?php the_content(); ?>
            </div>
        </div>
        <?php if(!empty($shop_products_features)): ?>
        <div class="col-lg-6">
            <div class="descriptionContent featureCols">
                <?php if(!empty($shop_products_feature_area_label)): ?>
                <h3><?php echo esc_html($shop_products_feature_area_label) ?></h3>
                <?php endif; ?>
                <ul>
                    <?php 
                        foreach($shop_products_features as $frs):
                            if(isset($frs['desc']) && !empty($frs['desc'])):
                                echo '<li>'.$frs['desc'].'</li>';
                            endif;
                        endforeach;
                    ?>
                </ul>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
