<?php 
$termObject = get_queried_object();
$termID = $termObject->term_id;

$shop_cat_banner_title = get_theme_mod('shop_cat_banner_title', wp_strip_all_tags($termObject->name));
$shop_cat_banner_title = (!empty($shop_cat_banner_title) ? $shop_cat_banner_title : wp_strip_all_tags($termObject->name));
$shop_cat_is_breadcrumb = get_theme_mod('shop_cat_is_breadcrumb', 1);
$shop_cat_banner_alignment = get_theme_mod('shop_cat_banner_alignment', 'center');

$bgi_css = '';
if(defined('FW')):
    $shop_cats_is_settings         = fw_get_db_term_option($termID, 'product_cat', 'shop_cats_is_settings', 2);
    $shop_cats_banner_bg         = fw_get_db_term_option($termID, 'product_cat', 'shop_cats_banner_bg', array());
    $shop_cats_banner_bg_color   = fw_get_db_term_option($termID, 'product_cat', 'shop_cats_banner_bg_color', '');
    $shop_cats_banner_title   = fw_get_db_term_option($termID, 'product_cat', 'shop_cats_banner_title', '');
    $shop_cats_is_breadcrumb   = fw_get_db_term_option($termID, 'product_cat', 'shop_cats_is_breadcrumb', 1);
    $shop_cats_banner_alignment   = fw_get_db_term_option($termID, 'product_cat', 'shop_cats_banner_alignment', 'left');

    if($shop_cats_is_settings == 1):
        $shop_cat_banner_title = ($shop_cats_banner_title != '' ? $shop_cats_banner_title : $shop_cat_banner_title);
        $shop_cat_is_breadcrumb = ($shop_cats_is_breadcrumb == 1 ? $shop_cats_is_breadcrumb : $shop_cat_is_breadcrumb);
        $shop_cat_banner_alignment = ($shop_cats_banner_alignment == '' ? $shop_cats_banner_alignment : $shop_cat_banner_alignment);

        if(isset($shop_cats_banner_bg['url']) && $shop_cats_banner_bg['url'] != ''):
            $bgi_css .= 'background-image: url('.$shop_cats_banner_bg['url'].'); background-repeat: no-repeat; background-position: center center; background-size: cover;';
        endif;
        if($shop_cats_banner_bg_color != ''):
            $bgi_css .= 'background-color: '.$shop_cats_banner_bg_color.';';
        endif;
    endif;
endif;

?>
<!-- BEGIN: PageBanner Section -->
<section class="pageBannerSection shopCatPageBanner" style="<?php echo esc_attr($bgi_css) ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pageBannerContent text- text-<?php echo esc_attr($shop_cat_banner_alignment); ?>"">
                    <h2><?php echo ulina_kses($shop_cat_banner_title) ?></h2>
                    <?php if($shop_cat_is_breadcrumb == 1): ?>
                        <?php echo ulina_kses(ulina_breadcrumbs()); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END: PageBanner Section -->