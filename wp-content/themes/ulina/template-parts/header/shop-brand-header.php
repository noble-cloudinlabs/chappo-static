<?php 
$termObject = get_queried_object();
$termID = $termObject->term_id;

$shop_brand_banner_title = get_theme_mod('shop_brand_banner_title', wp_strip_all_tags($termObject->name));
$shop_brand_banner_title = (!empty($shop_brand_banner_title) ? $shop_brand_banner_title : wp_strip_all_tags($termObject->name));
$shop_brand_is_breadcrumb = get_theme_mod('shop_brand_is_breadcrumb', 1);
$shop_brand_banner_alignment = get_theme_mod('shop_brand_banner_alignment', 'center');

$bgi_css = '';
if(defined('FW')):
    $shop_brands_is_settings         = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_is_settings', 2);
    $shop_brands_banner_bg         = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_banner_bg', array());
    $shop_brands_banner_bg_color   = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_banner_bg_color', '');
    $shop_brands_banner_title   = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_banner_title', '');
    $shop_brands_is_breadcrumb   = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_is_breadcrumb', 1);
    $shop_brands_banner_alignment   = fw_get_db_term_option($termID, 'product_brand', 'shop_brands_banner_alignment', 'center');

    if($shop_brands_is_settings == 1):
        $shop_brand_banner_title = ($shop_brands_banner_title != '' ? $shop_brands_banner_title : $shop_brand_banner_title);
        $shop_brand_is_breadcrumb = ($shop_brands_is_breadcrumb == 1 ? $shop_brands_is_breadcrumb : $shop_brand_is_breadcrumb);
        $shop_brand_banner_alignment = ($shop_brands_banner_alignment == '' ? $shop_brands_banner_alignment : $shop_brand_banner_alignment);

        if(isset($shop_brands_banner_bg['url']) && $shop_brands_banner_bg['url'] != ''):
            $bgi_css .= 'background-image: url('.$shop_brands_banner_bg['url'].'); background-repeat: no-repeat; background-position: center center; background-size: cover;';
        endif;
        if($shop_brands_banner_bg_color != ''):
            $bgi_css .= 'background-color: '.$shop_brands_banner_bg_color.';';
        endif;
    endif;
endif;

?>
<!-- BEGIN: PageBanner Section -->
<section class="pageBannerSection shopTagPageBanner" style="<?php echo esc_attr($bgi_css) ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pageBannerContent text- text-<?php echo esc_attr($shop_brand_banner_alignment); ?>"">
                    <h2><?php echo ulina_kses($shop_brand_banner_title) ?></h2>
                    <?php if($shop_brand_is_breadcrumb == 1): ?>
                        <?php echo ulina_kses(ulina_breadcrumbs()); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END: PageBanner Section -->