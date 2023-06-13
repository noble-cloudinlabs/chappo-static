<?php
/**
 * The Template for displaying products in a product tag. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-tag.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header( 'shop' );

$termObject = get_queried_object();
$termID = $termObject->term_id;

$shop_brand_is_banner = get_theme_mod('shop_brand_is_banner', 1);

$shop_brand_sidebar = get_theme_mod('shop_brand_sidebar', 3);
$shop_brand_col_xl = get_theme_mod('shop_brand_col_xl', 4);
$shop_brand_col_lg = get_theme_mod('shop_brand_col_lg', 4);
$shop_brand_col_md = get_theme_mod('shop_brand_col_md', 2);
$shop_brand_col_sm = get_theme_mod('shop_brand_col_sm', 2);
$shop_brand_is_count = get_theme_mod('shop_brand_is_count', true);
$shop_brand_is_sort = get_theme_mod('shop_brand_is_sort', true);
$shop_brand_is_view_toggler = get_theme_mod('shop_brand_is_view_toggler', false);
$shop_brand_default_view = get_theme_mod('shop_brand_default_view', 1);
$shop_brand_pagination_type = get_theme_mod('shop_brand_pagination_type', 1);
$shop_brand_ajax_btn_label = get_theme_mod('shop_brand_ajax_btn_label', esc_html__('Load More', 'ulina'));
$shop_brand_pagi_align = get_theme_mod('shop_brand_pagi_align', 'left');
$shop_brand_top_bloks = get_theme_mod('shop_brand_top_bloks', []);
$shop_brand_bottom_bloks = get_theme_mod('shop_bottom_bloks', []);

if(defined('FW')){
	$shop_brands_is_settings = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_is_settings', 2);
	$shop_brands_is_banner = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_is_banner', 1);

	$shop_brand_is_banner = ($shop_brands_is_settings == 1 && $shop_brands_is_banner == 1 ? $shop_brands_is_banner : $shop_brand_is_banner);

	$shop_brands_is_content_settings = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_is_content_settings', 2);
	if($shop_brands_is_content_settings == 1):
		$shop_brands_sidebar = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_sidebar', 1);
		$shop_brands_col_xl = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_col_xl', 4);
		$shop_brands_col_lg = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_col_lg', 4);
		$shop_brands_col_md = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_col_md', 2);
		$shop_brands_col_sm = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_col_sm', 2);
		$shop_brands_is_count = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_is_count', 1);
		$shop_brands_is_sort = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_is_sort', 1);
		$shop_brands_is_view_toggler = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_is_view_toggler', 2);
		$shop_brands_default_view = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_default_view', 1);
		$shop_brands_pagination_type = fw_get_db_term_option($termID, 'product_cat', 'shop_brands_pagination_type', 1);
		$shop_brands_ajax_btn_label = fw_get_db_term_option($termID, 'product_cat', 'shop_brands_ajax_btn_label', '');
		$shop_brands_pagi_align = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_pagi_align', 'left');
		$shop_brands_top_bloks = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_top_bloks', []);
		$shop_brands_bottom_bloks = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_bottom_bloks', []);
		

		$shop_brand_sidebar = ($shop_brands_sidebar > 0 ? $shop_brands_sidebar : $shop_brand_sidebar);
		$shop_brand_col_xl = ($shop_brands_col_xl > 0 ? $shop_brands_col_xl : $shop_brand_col_xl);
		$shop_brand_col_lg = ($shop_brands_col_lg > 0 ? $shop_brands_col_lg : $shop_brand_col_lg);
		$shop_brand_col_md = ($shop_brands_col_md > 0 ? $shop_brands_col_md : $shop_brand_col_md);
		$shop_brand_col_sm = ($shop_brands_col_sm > 0 ? $shop_brands_col_sm : $shop_brand_col_sm);
		$shop_brand_is_count = ($shop_brands_is_count > 0 ? ($shop_brands_is_count == 1 ? true : false) : $shop_brand_is_count);
		$shop_brand_is_sort = ($shop_brands_is_sort > 0 ? ($shop_brands_is_sort == 1 ? true : false) : $shop_brand_is_sort);
		$shop_brand_is_view_toggler = ($shop_brands_is_view_toggler > 0 ? ($shop_brands_is_view_toggler == 1 ? true : false) : $shop_brand_is_view_toggler);
		$shop_brand_default_view = ($shop_brands_default_view > 0 ? $shop_brands_default_view : $shop_brand_default_view);
		$shop_brand_pagination_type = ($shop_brands_pagination_type > 0 ? $shop_brands_pagination_type : $shop_brand_pagination_type);
		$shop_brand_ajax_btn_label = ($shop_brands_ajax_btn_label != '' ? $shop_brands_ajax_btn_label : $shop_brand_ajax_btn_label);
		$shop_brand_pagi_align = ($shop_brands_pagi_align != '' ? $shop_brands_pagi_align : $shop_brand_pagi_align);
		$shop_brand_top_bloks = (!empty($shop_brands_top_bloks) ? $shop_brands_top_bloks : $shop_brand_top_bloks);
		$shop_brand_bottom_bloks = (!empty($shop_brands_bottom_bloks) ? $shop_brands_bottom_bloks : $shop_brand_bottom_bloks);
	endif;
}

if($shop_brand_is_banner == 1):
	get_template_part('template-parts/header/shop-brand', 'header');
endif;


$sectionClass = '';
$sectionClass .= ($shop_brand_sidebar != 1 && is_active_sidebar('sidebar-3') ? ' shopPageHasSidebar ' : '');
$colmnClass = ($shop_brand_sidebar == 1 || !is_active_sidebar('sidebar-3') ? 'col-lg-12' : 'col-lg-9');


if (!empty($shop_brand_top_bloks)) {
    foreach ($shop_brand_top_bloks as $sb):
        if ($sb['top_block_ids'] != '' && $sb['top_block_ids'] != 'none' && $sb['top_block_ids'] > 0):
            Uiuxom_Builder::render_template($sb['top_block_ids']);
        endif;
    endforeach;
}

global $wp_query;
$maxPageNumber = $wp_query->max_num_pages;
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$page = get_query_var('page') ? get_query_var('page') : 1;
$currentPage = $paged;
?>
<!-- BEGIN: Shop Section -->
<section class="shopPageSection <?php echo esc_attr($sectionClass); ?>">
    <div class="container">
        <div class="row">
            <?php if (is_active_sidebar('sidebar-3') && $shop_brand_sidebar == 2): ?>
            <div class="col-lg-3">
                <div class="shopSidebar">
                    <?php dynamic_sidebar('sidebar-3'); ?>
                </div>
            </div>
            <?php endif; ?>
            
            <div class="<?php echo esc_attr($colmnClass); ?>">
                <div class="row">
                    <div class="col-lg-12 wpc_all_notice_area">
                        <?php echo woocommerce_output_all_notices(); ?>
                    </div>
                </div>
                <?php if($shop_brand_is_count || $shop_brand_is_sort || $shop_brand_is_view_toggler): ?>
                <div class="row shopAccessRow">
                    <div class="col-md-6">
                        <?php if(function_exists('woocommerce_result_count') && $shop_brand_is_count): ?>
                            <?php woocommerce_result_count(); ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <div class="shopAccessBar <?php if ($shop_brand_is_view_toggler == false): ?>noTab<?php endif; ?>">
                            <?php if(function_exists('woocommerce_catalog_ordering') && $shop_brand_is_sort): ?>
                                <div class="sortNav">
                                    <?php echo woocommerce_catalog_ordering(); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($shop_brand_is_view_toggler): ?>
                            <ul class="nav productViewTabnav" id="productViewTab" role="tablist">
                                <li role="presentation">
                                    <button class="<?php echo esc_attr(($shop_brand_default_view == 2 ? 'active' : '')) ?>" id="list-tab" data-bs-toggle="tab" data-bs-target="#list-tab-pane" type="button" role="tab" data-aria-controls="list-tab-pane" data-aria-selected="<?php echo esc_attr(($shop_brand_default_view == 2 ? 'true' : 'false')) ?>"><i class="ulina-list"></i></button>
                                </li>
                                <li role="presentation">
                                    <button class="<?php echo esc_attr(($shop_brand_default_view != 2 ? 'active' : '')) ?>" id="grid-tab" data-bs-toggle="tab" data-bs-target="#grid-tab-pane" type="button" role="tab" data-aria-controls="grid-tab-pane" data-aria-selected="<?php echo esc_attr(($shop_brand_default_view != 2 ? 'true' : 'false')) ?>"><i class="ulina-table-cells"></i></button>
                                </li>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ($shop_brand_is_view_toggler): ?>
                <div class="tab-content productViewTabContent" id="productViewTabContent">
                    <div class="tab-pane <?php echo esc_attr(($shop_brand_default_view != 2 ? 'show active' : '')) ?>" id="grid-tab-pane" role="tabpanel" aria-labelledby="grid-tab" tabindex="0">
                        <div class="row shopProductRow">
                            <?php if (woocommerce_product_loop()): ?>
                                <?php
                                if (wc_get_loop_prop('total')):
                                    while (have_posts()):
                                        the_post();
                                        do_action('woocommerce_shop_loop');
                                        wc_get_template_part('content', 'product');
                                    endwhile;
                                endif;
                                ?>
                            <?php else: ?>
                                    <?php do_action('woocommerce_no_products_found'); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="tab-pane <?php echo esc_attr(($shop_brand_default_view == 2 ? 'show active' : '')) ?>" id="list-tab-pane" role="tabpanel" aria-labelledby="list-tab" tabindex="1">
                        <div class="row shopProductRow">
                            <?php if (woocommerce_product_loop()): ?>
                                <?php
                                if (wc_get_loop_prop('total')):
                                    while (have_posts()):
                                        the_post();
                                        do_action('woocommerce_shop_loop');
                                        wc_get_template_part('content-list', 'product');
                                    endwhile;
                                endif;
                                ?>
                            <?php else: ?>
                                <?php do_action('woocommerce_no_products_found'); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                <div class="row shopProductRow shopPlainGridRow">
                    <?php if (woocommerce_product_loop()): ?>
                        <?php
                        if (wc_get_loop_prop('total')):
                            while (have_posts()):
                                the_post();
                                do_action('woocommerce_shop_loop');
                                wc_get_template_part('content', 'product');
                            endwhile;
                        endif;
                        ?>
                    <?php else: ?>
                        <?php do_action('woocommerce_no_products_found'); ?>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <div class="row shopPaginationRow">
                    <div class="col-lg-12">
                        <div class="ulinaShopPagination text-<?php echo esc_attr($shop_brand_pagi_align); ?>">
                            <?php if($shop_brand_pagination_type == 2): ?>
                                <span class="shopAjaxPagination" data-currentpage="<?php echo esc_attr($currentPage); ?>" data-maxpage="<?php echo esc_attr($maxPageNumber); ?>" data-toggle="<?php echo esc_attr(($shop_brand_is_view_toggler ? 1 : 0)); ?>">
                                    <?php echo get_next_posts_link( $shop_brand_ajax_btn_label ); ?>
                                </span>
                            <?php else: ?>
                                <?php echo woocommerce_pagination(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php if (is_active_sidebar('sidebar-3') && $shop_brand_sidebar == 3): ?>
                <div class="col-lg-3">
                    <div class="shopSidebar">
                        <?php dynamic_sidebar('sidebar-3'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php
if (!empty($shop_brand_bottom_bloks)) {
    foreach ($shop_brand_bottom_bloks as $sb):
        if ($sb['bottom_block_ids'] != '' && $sb['bottom_block_ids'] != 'none' && $sb['bottom_block_ids'] > 0):
            Uiuxom_Builder::render_template($sb['bottom_block_ids']);
        endif;
    endforeach;
}
get_footer( 'shop' );
