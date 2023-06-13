<?php 

$shop_src_banner_title = get_theme_mod('shop_src_banner_title', get_search_query());
$shop_src_is_breadcrumb = get_theme_mod('shop_src_is_breadcrumb', 1);
$shop_src_banner_alignment = get_theme_mod('shop_src_banner_alignment', 'center');

$shop_src_banner_title = ($shop_src_banner_title != '' ? $shop_src_banner_title : get_search_query());
$shop_src_banner_title = wp_strip_all_tags($shop_src_banner_title);
$shop_src_banner_title = str_replace('Search For:', '', $shop_src_banner_title);
?>
<!-- BEGIN: PageBanner Section -->
<section class="pageBannerSection shopSearchPageBanner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pageBannerContent text- text-<?php echo esc_attr($shop_src_banner_alignment); ?>"">
                    <h2><?php echo ulina_kses($shop_src_banner_title) ?></h2>
                    <?php if($shop_src_is_breadcrumb == 1): ?>
                        <?php echo ulina_kses(ulina_breadcrumbs()); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END: PageBanner Section -->