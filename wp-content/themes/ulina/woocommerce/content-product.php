<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}

if (is_tax('product_cat') && defined('FW')):
    $shop_sidebar = get_theme_mod('shop_cat_sidebar', 3);
    $shop_col_xl = get_theme_mod('shop_cat_col_xl', 4);
    $shop_col_lg = get_theme_mod('shop_cat_col_lg', 4);
    $shop_col_md = get_theme_mod('shop_cat_col_md', 2);
    $shop_col_sm = get_theme_mod('shop_cat_col_sm', 2);
    $shop_thumb_width = get_theme_mod('shop_cat_thumb_width', 0);
    $shop_thumb_height = get_theme_mod('shop_cat_thumb_height', 0);
    $shop_is_flashlabels = get_theme_mod('shop_cat_is_flashlabels', true);
    $shop_is_wishlist = get_theme_mod('shop_cat_is_wishlist', false);
    $shop_is_quickview = get_theme_mod('shop_cat_is_quickview', false);
    $shop_is_rating_count = get_theme_mod('shop_cat_is_rating_count', false);
    $shop_review_label = get_theme_mod('shop_cat_review_label', '');

    $termObject = get_queried_object();
    $termID = $termObject->term_id;

    $shop_cats_is_content_settings = fw_get_db_term_option($termID, 'product_cat', 'shop_cats_is_content_settings', 2);
	if($shop_cats_is_content_settings == 1):
        $shop_cats_sidebar = fw_get_db_term_option($termID, 'product_cat', 'shop_cats_sidebar', 1);
        $shop_cats_col_xl = fw_get_db_term_option($termID, 'product_cat', 'shop_cats_col_xl', 4);
        $shop_cats_col_lg = fw_get_db_term_option($termID, 'product_cat', 'shop_cats_col_lg', 4);
        $shop_cats_col_md = fw_get_db_term_option($termID, 'product_cat', 'shop_cats_col_md', 2);
        $shop_cats_col_sm = fw_get_db_term_option($termID, 'product_cat', 'shop_cats_col_sm', 2);
        $shop_cats_thumb_width = fw_get_db_term_option($termID, 'product_cat', 'shop_cats_thumb_width', 0);
        $shop_cats_thumb_height = fw_get_db_term_option($termID, 'product_cat', 'shop_cats_thumb_height', 0);
        $shop_cats_is_flashlabels = fw_get_db_term_option($termID, 'product_cat', 'shop_cats_is_flashlabels', 1);
        $shop_cats_is_wishlist = fw_get_db_term_option($termID, 'product_cat', 'shop_cats_is_wishlist', 2);
        $shop_cats_is_quickview = fw_get_db_term_option($termID, 'product_cat', 'shop_cats_is_quickview', 2);
        $shop_cats_is_rating_count = fw_get_db_term_option($termID, 'product_cat', 'shop_cats_is_rating_count', 2);
        $shop_cats_review_label = fw_get_db_term_option($termID, 'product_cat', 'shop_cats_review_label', '');

        $shop_sidebar = ($shop_cats_sidebar > 0 ? $shop_cats_sidebar : $shop_sidebar);
        $shop_col_xl = ($shop_cats_col_xl > 0 ? $shop_cats_col_xl : $shop_col_xl);
        $shop_col_lg = ($shop_cats_col_lg > 0 ? $shop_cats_col_lg : $shop_col_lg);
        $shop_col_md = ($shop_cats_col_md > 0 ? $shop_cats_col_md : $shop_col_md);
        $shop_col_sm = ($shop_cats_col_sm > 0 ? $shop_cats_col_sm : $shop_col_sm);
        $shop_thumb_width = ($shop_cats_thumb_width > 0 ? $shop_cats_thumb_width : $shop_thumb_width);
        $shop_thumb_height = ($shop_cats_thumb_height > 0 ? $shop_cats_thumb_height : $shop_thumb_height);
        $shop_is_flashlabels = ($shop_cats_is_flashlabels > 0 ? ($shop_cats_is_flashlabels == 1 ? true : false) : $shop_is_flashlabels);
        $shop_is_wishlist = ($shop_cats_is_wishlist > 0 ? ($shop_cats_is_wishlist == 1 ? true : false) : $shop_is_wishlist);
        $shop_is_quickview = ($shop_cats_is_quickview > 0 ? ($shop_cats_is_quickview == 1 ? true : false) : $shop_is_quickview);
        $shop_is_rating_count = ($shop_cats_is_rating_count > 0 ? ($shop_cats_is_rating_count == 1 ? true : false) : $shop_is_rating_count);
        $shop_review_label = ($shop_cats_review_label != '' ? $shop_cats_review_label : $shop_review_label);
    endif;
elseif (is_tax('product_tag') && defined('FW')):
    $shop_Container = get_theme_mod('shop_tag_Container', 1);
    $shop_sidebar = get_theme_mod('shop_tag_sidebar', 3);
    $shop_col_xl = get_theme_mod('shop_tag_col_xl', 4);
    $shop_col_lg = get_theme_mod('shop_tag_col_lg', 4);
    $shop_col_md = get_theme_mod('shop_tag_col_md', 2);
    $shop_col_sm = get_theme_mod('shop_tag_col_sm', 2);
    $shop_thumb_width = get_theme_mod('shop_tag_thumb_width', 0);
    $shop_thumb_height = get_theme_mod('shop_tag_thumb_height', 0);
    $shop_is_flashlabels = get_theme_mod('shop_tag_is_flashlabels', true);
    $shop_is_wishlist = get_theme_mod('shop_tag_is_wishlist', false);
    $shop_is_quickview = get_theme_mod('shop_tag_is_quickview', false);
    $shop_is_rating_count = get_theme_mod('shop_tag_is_rating_count', false);
    $shop_review_label = get_theme_mod('shop_tag_review_label', '');

    $termObject = get_queried_object();
    $termID = $termObject->term_id;

    $shop_tags_is_content_settings = fw_get_db_term_option($termID, 'product_tag', 'shop_tags_is_content_settings', 2);
	if($shop_tags_is_content_settings == 1):
        $shop_tags_sidebar = fw_get_db_term_option($termID, 'product_tag', 'shop_tags_sidebar', 1);
        $shop_tags_col_xl = fw_get_db_term_option($termID, 'product_tag', 'shop_tags_col_xl', 4);
        $shop_tags_col_lg = fw_get_db_term_option($termID, 'product_tag', 'shop_tags_col_lg', 4);
        $shop_tags_col_md = fw_get_db_term_option($termID, 'product_tag', 'shop_tags_col_md', 2);
        $shop_tags_col_sm = fw_get_db_term_option($termID, 'product_tag', 'shop_tags_col_sm', 2);
        $shop_tags_thumb_width = fw_get_db_term_option($termID, 'product_tag', 'shop_tags_thumb_width', 0);
        $shop_tags_thumb_height = fw_get_db_term_option($termID, 'product_tag', 'shop_tags_thumb_height', 0);
        $shop_tags_is_flashlabels = fw_get_db_term_option($termID, 'product_tag', 'shop_tags_is_flashlabels', 1);
        $shop_tags_is_wishlist = fw_get_db_term_option($termID, 'product_tag', 'shop_tags_is_wishlist', 2);
        $shop_tags_is_quickview = fw_get_db_term_option($termID, 'product_tag', 'shop_tags_is_quickview', 2);
        $shop_tags_is_rating_count = fw_get_db_term_option($termID, 'product_tag', 'shop_tags_is_rating_count', 2);
        $shop_tags_review_label = fw_get_db_term_option($termID, 'product_tag', 'shop_tags_review_label', '');

        $shop_sidebar = ($shop_tags_sidebar > 0 ? $shop_tags_sidebar : $shop_sidebar);
        $shop_col_xl = ($shop_tags_col_xl > 0 ? $shop_tags_col_xl : $shop_col_xl);
        $shop_col_lg = ($shop_tags_col_lg > 0 ? $shop_tags_col_lg : $shop_col_lg);
        $shop_col_md = ($shop_tags_col_md > 0 ? $shop_tags_col_md : $shop_col_md);
        $shop_col_sm = ($shop_tags_col_sm > 0 ? $shop_tags_col_sm : $shop_col_sm);
        $shop_thumb_width = ($shop_tags_thumb_width > 0 ? $shop_tags_thumb_width : $shop_thumb_width);
        $shop_thumb_height = ($shop_tags_thumb_height > 0 ? $shop_tags_thumb_height : $shop_thumb_height);
        $shop_is_flashlabels = ($shop_tags_is_flashlabels > 0 ? ($shop_tags_is_flashlabels == 1 ? true : false) : $shop_is_flashlabels);
        $shop_is_wishlist = ($shop_tags_is_wishlist > 0 ? ($shop_tags_is_wishlist == 1 ? true : false) : $shop_is_wishlist);
        $shop_is_quickview = ($shop_tags_is_quickview > 0 ? ($shop_tags_is_quickview == 1 ? true : false) : $shop_is_quickview);
        $shop_is_rating_count = ($shop_tags_is_rating_count > 0 ? ($shop_tags_is_rating_count == 1 ? true : false) : $shop_is_rating_count);
        $shop_review_label = ($shop_tags_review_label != '' ? $shop_tags_review_label : $shop_review_label);
    endif;
elseif (is_tax('product_brand') && defined('FW')):
    $shop_sidebar = get_theme_mod('shop_brand_sidebar', 3);
    $shop_col_xl = get_theme_mod('shop_brand_col_xl', 4);
    $shop_col_lg = get_theme_mod('shop_brand_col_lg', 4);
    $shop_col_md = get_theme_mod('shop_brand_col_md', 2);
    $shop_col_sm = get_theme_mod('shop_brand_col_sm', 2);
    $shop_thumb_width = get_theme_mod('shop_brand_thumb_width', 0);
    $shop_thumb_height = get_theme_mod('shop_brand_thumb_height', 0);
    $shop_is_flashlabels = get_theme_mod('shop_brand_is_flashlabels', true);
    $shop_is_wishlist = get_theme_mod('shop_brand_is_wishlist', false);
    $shop_is_quickview = get_theme_mod('shop_brand_is_quickview', false);
    $shop_is_rating_count = get_theme_mod('shop_brand_is_rating_count', false);
    $shop_review_label = get_theme_mod('shop_brand_review_label', '');

    $termObject = get_queried_object();
    $termID = $termObject->term_id;

    $shop_brands_is_content_settings = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_is_content_settings', 2);
	if($shop_brands_is_content_settings == 1):
        $shop_brands_Container = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_Container', 1);
        $shop_brands_sidebar = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_sidebar', 1);
        $shop_brands_col_xl = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_col_xl', 4);
        $shop_brands_col_lg = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_col_lg', 4);
        $shop_brands_col_md = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_col_md', 2);
        $shop_brands_col_sm = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_col_sm', 2);
        $shop_brands_thumb_width = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_thumb_width', 0);
        $shop_brands_thumb_height = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_thumb_height', 0);
        $shop_brands_is_flashlabels = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_is_flashlabels', 1);
        $shop_brands_is_wishlist = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_is_wishlist', 2);
        $shop_brands_is_quickview = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_is_quickview', 2);
        $shop_brands_is_rating_count = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_is_rating_count', 2);
        $shop_brands_review_label = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_review_label', '');

        $shop_sidebar = ($shop_brands_sidebar > 0 ? $shop_brands_sidebar : $shop_sidebar);
        $shop_col_xl = ($shop_brands_col_xl > 0 ? $shop_brands_col_xl : $shop_col_xl);
        $shop_col_lg = ($shop_brands_col_lg > 0 ? $shop_brands_col_lg : $shop_col_lg);
        $shop_col_md = ($shop_brands_col_md > 0 ? $shop_brands_col_md : $shop_col_md);
        $shop_col_sm = ($shop_brands_col_sm > 0 ? $shop_brands_col_sm : $shop_col_sm);
        $shop_thumb_width = ($shop_brands_thumb_width > 0 ? $shop_brands_thumb_width : $shop_thumb_width);
        $shop_thumb_height = ($shop_brands_thumb_height > 0 ? $shop_brands_thumb_height : $shop_thumb_height);
        $shop_is_flashlabels = ($shop_brands_is_flashlabels > 0 ? ($shop_brands_is_flashlabels == 1 ? true : false) : $shop_is_flashlabels);
        $shop_is_wishlist = ($shop_brands_is_wishlist > 0 ? ($shop_brands_is_wishlist == 1 ? true : false) : $shop_is_wishlist);
        $shop_is_quickview = ($shop_brands_is_quickview > 0 ? ($shop_brands_is_quickview == 1 ? true : false) : $shop_is_quickview);
        $shop_is_rating_count = ($shop_brands_is_rating_count > 0 ? ($shop_brands_is_rating_count == 1 ? true : false) : $shop_is_rating_count);
        $shop_review_label = ($shop_brands_review_label != '' ? $shop_brands_review_label : $shop_review_label);
    endif;
elseif (is_tax('product_collection') && defined('FW')):
    $shop_sidebar = get_theme_mod('shop_collection_sidebar', 3);
    $shop_col_xl = get_theme_mod('shop_collection_col_xl', 4);
    $shop_col_lg = get_theme_mod('shop_collection_col_lg', 4);
    $shop_col_md = get_theme_mod('shop_collection_col_md', 2);
    $shop_col_sm = get_theme_mod('shop_collection_col_sm', 2);
    $shop_thumb_width = get_theme_mod('shop_collection_thumb_width', 0);
    $shop_thumb_height = get_theme_mod('shop_collection_thumb_height', 0);
    $shop_is_flashlabels = get_theme_mod('shop_collection_is_flashlabels', true);
    $shop_is_wishlist = get_theme_mod('shop_collection_is_wishlist', false);
    $shop_is_quickview = get_theme_mod('shop_collection_is_quickview', false);
    $shop_is_rating_count = get_theme_mod('shop_collection_is_rating_count', false);
    $shop_review_label = get_theme_mod('shop_collection_review_label', '');

    $termObject = get_queried_object();
    $termID = $termObject->term_id;

    $shop_collections_is_content_settings = fw_get_db_term_option($termID, 'product_collection', 'shop_collections_is_content_settings', 2);
    if($shop_collections_is_content_settings == 1):
        $shop_collections_sidebar = fw_get_db_term_option($termID, 'product_collection', 'shop_collections_sidebar', 1);
        $shop_collections_col_xl = fw_get_db_term_option($termID, 'product_collection', 'shop_collections_col_xl', 4);
        $shop_collections_col_lg = fw_get_db_term_option($termID, 'product_collection', 'shop_collections_col_lg', 4);
        $shop_collections_col_md = fw_get_db_term_option($termID, 'product_collection', 'shop_collections_col_md', 2);
        $shop_collections_col_sm = fw_get_db_term_option($termID, 'product_collection', 'shop_collections_col_sm', 2);
        $shop_collections_thumb_width = fw_get_db_term_option($termID, 'product_collection', 'shop_collections_thumb_width', 0);
        $shop_collections_thumb_height = fw_get_db_term_option($termID, 'product_collection', 'shop_collections_thumb_height', 0);
        $shop_collections_is_flashlabels = fw_get_db_term_option($termID, 'product_collection', 'shop_collections_is_flashlabels', 1);
        $shop_collections_is_wishlist = fw_get_db_term_option($termID, 'product_collection', 'shop_collections_is_wishlist', 2);
        $shop_collections_is_quickview = fw_get_db_term_option($termID, 'product_collection', 'shop_collections_is_quickview', 2);
        $shop_collections_is_rating_count = fw_get_db_term_option($termID, 'product_collection', 'shop_collections_is_rating_count', 2);
        $shop_collections_review_label = fw_get_db_term_option($termID, 'product_collection', 'shop_collections_review_label', '');

        $shop_sidebar = ($shop_collections_sidebar > 0 ? $shop_collections_sidebar : $shop_sidebar);
        $shop_col_xl = ($shop_collections_col_xl > 0 ? $shop_collections_col_xl : $shop_col_xl);
        $shop_col_lg = ($shop_collections_col_lg > 0 ? $shop_collections_col_lg : $shop_col_lg);
        $shop_col_md = ($shop_collections_col_md > 0 ? $shop_collections_col_md : $shop_col_md);
        $shop_col_sm = ($shop_collections_col_sm > 0 ? $shop_collections_col_sm : $shop_col_sm);
        $shop_thumb_width = ($shop_collections_thumb_width > 0 ? $shop_collections_thumb_width : $shop_thumb_width);
        $shop_thumb_height = ($shop_collections_thumb_height > 0 ? $shop_collections_thumb_height : $shop_thumb_height);
        $shop_is_flashlabels = ($shop_collections_is_flashlabels > 0 ? ($shop_collections_is_flashlabels == 1 ? true : false) : $shop_is_flashlabels);
        $shop_is_wishlist = ($shop_collections_is_wishlist > 0 ? ($shop_collections_is_wishlist == 1 ? true : false) : $shop_is_wishlist);
        $shop_is_quickview = ($shop_collections_is_quickview > 0 ? ($shop_collections_is_quickview == 1 ? true : false) : $shop_is_quickview);
        $shop_is_rating_count = ($shop_collections_is_rating_count > 0 ? ($shop_collections_is_rating_count == 1 ? true : false) : $shop_is_rating_count);
        $shop_review_label = ($shop_collections_review_label != '' ? $shop_collections_review_label : $shop_review_label);
    endif;
else:
    $shop_sidebar = get_theme_mod('shop_sidebar', 3);
    $shop_col_xl = get_theme_mod('shop_col_xl', 4);
    $shop_col_lg = get_theme_mod('shop_col_lg', 4);
    $shop_col_md = get_theme_mod('shop_col_md', 2);
    $shop_col_sm = get_theme_mod('shop_col_sm', 2);
    $shop_thumb_width = get_theme_mod('shop_thumb_width', 0);
    $shop_thumb_height = get_theme_mod('shop_thumb_height', 0);
    $shop_is_flashlabels = get_theme_mod('shop_is_flashlabels', true);
    $shop_is_wishlist = get_theme_mod('shop_is_wishlist', false);
    $shop_is_quickview = get_theme_mod('shop_is_quickview', false);
    $shop_is_rating_count = get_theme_mod('shop_is_rating_count', false);
    $shop_review_label = get_theme_mod('shop_review_label', '');
endif;

$w = ($shop_thumb_width > 0 ? $shop_thumb_width : 312);
$h = ($shop_thumb_height > 0 ? $shop_thumb_height : 360);

if(defined('FW')){
    $_secondary_image = fw_get_db_post_option(get_the_ID(), '_product_img_2', array());
}
$_secondary_image_id = (isset($_secondary_image['attachment_id']) && $_secondary_image['attachment_id'] > 0 ? $_secondary_image['attachment_id'] : get_post_thumbnail_id(get_the_ID()));

?>
<div class="col-xl-<?php echo round(12 / $shop_col_xl); ?> col-lg-<?php echo round(12 / $shop_col_lg); ?> col-md-<?php echo round(12 / $shop_col_md); ?> ulinaProductCols">
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
                    <?php if ($shop_is_quickview): ?>
                        <?php function_exists('ulina_quick_view') ? ulina_quick_view(get_the_ID()) : '' ?>
                    <?php endif; ?>
                    <?php if (shortcode_exists('yith_wcwl_add_to_wishlist') && $shop_is_wishlist): ?>
                        <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                    <?php endif; ?>
                </div>
                <?php if($shop_is_flashlabels): ?>
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
                    <?php if($shop_is_rating_count && !empty($shop_review_label)): ?>
                        <div class="ratingCounts"><?php echo esc_html($product->get_review_count()) ?> <?php echo esc_html($shop_review_label); ?></div>
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