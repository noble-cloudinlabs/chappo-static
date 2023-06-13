<?php 
$termObject = get_queried_object();
$termID = $termObject->term_id;

$shop_collection_banner_title = get_theme_mod('shop_collection_banner_title', wp_strip_all_tags($termObject->name));
$shop_collection_banner_title = (!empty($shop_collection_banner_title) ? $shop_collection_banner_title : wp_strip_all_tags($termObject->name));
$shop_collection_is_breadcrumb = get_theme_mod('shop_collection_is_breadcrumb', 1);
$shop_collection_banner_alignment = get_theme_mod('shop_collection_banner_alignment', 'center');

$bgi_css = '';
if(defined('FW')):
    $shop_collections_is_settings         = fw_get_db_term_option($termID, 'product_collection', 'shop_collections_is_settings', 2);
    $shop_collections_banner_bg         = fw_get_db_term_option($termID, 'product_collection', 'shop_collections_banner_bg', array());
    $shop_collections_banner_bg_color   = fw_get_db_term_option($termID, 'product_collection', 'shop_collections_banner_bg_color', '');
    $shop_collections_banner_title   = fw_get_db_term_option($termID, 'product_collection', 'shop_collections_banner_title', '');
    $shop_collections_is_breadcrumb   = fw_get_db_term_option($termID, 'product_collection', 'shop_collections_is_breadcrumb', 1);
    $shop_collections_banner_alignment   = fw_get_db_term_option($termID, 'product_collection', 'shop_collections_banner_alignment', 'left');

    if($shop_collections_is_settings == 1):
        $shop_collection_banner_title = ($shop_collections_banner_title != '' ? $shop_collections_banner_title : $shop_collection_banner_title);
        $shop_collection_is_breadcrumb = ($shop_collections_is_breadcrumb == 1 ? $shop_collections_is_breadcrumb : $shop_collection_is_breadcrumb);
        $shop_collection_banner_alignment = ($shop_collections_banner_alignment == '' ? $shop_collections_banner_alignment : $shop_collection_banner_alignment);

        if(isset($shop_collections_banner_bg['url']) && $shop_collections_banner_bg['url'] != ''):
            $bgi_css .= 'background-image: url('.$shop_collections_banner_bg['url'].'); background-repeat: no-repeat; background-position: center center; background-size: cover;';
        endif;
        if($shop_collections_banner_bg_color != ''):
            $bgi_css .= 'background-color: '.$shop_collections_banner_bg_color.';';
        endif;
    endif;
endif;

?>
<!-- BEGIN: PageBanner Section -->
<section class="pageBannerSection shopCollPageBanner" style="<?php echo esc_attr($bgi_css) ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pageBannerContent text- text-<?php echo esc_attr($shop_collection_banner_alignment); ?>"">
                    <h2><?php echo ulina_kses($shop_collection_banner_title) ?></h2>
                    <?php if($shop_collection_is_breadcrumb == 1): ?>
                        <?php echo ulina_kses(ulina_breadcrumbs()); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END: PageBanner Section -->