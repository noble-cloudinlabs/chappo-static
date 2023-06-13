<?php 
global $post;
$pageID = $post->ID;

$pages_banner_title = get_theme_mod('pages_banner_title', '');
$pages_is_breadcrumb = get_theme_mod('pages_is_breadcrumb', 1);
$pages_banner_alignment = get_theme_mod('pages_banner_alignment', 'center');
$pages_banner_title       = ($pages_banner_title != '' ? $pages_banner_title : get_the_title());

$bgi_css = '';
if(defined('FW')):
    $page_is_settings       = fw_get_db_post_option($pageID, 'page_is_settings', 2);
    $page_banner_bg         = fw_get_db_post_option($pageID, 'page_banner_bg', array());
    $page_banner_bg_color   = fw_get_db_post_option($pageID, 'page_banner_bg_color', '');
    $page_banner_title   = fw_get_db_post_option($pageID, 'page_banner_title', '');
    $page_is_breadcrumb   = fw_get_db_post_option($pageID, 'page_is_breadcrumb', 1);
    $page_banner_alignment   = fw_get_db_post_option($pageID, 'page_banner_alignment', 'center');

    if($page_is_settings == 1):
        $pages_banner_title = ($page_banner_title != '' ? $page_banner_title : $pages_banner_title);
        $pages_is_breadcrumb = ($page_is_breadcrumb == 1 ? $page_is_breadcrumb : $pages_is_breadcrumb);
        $pages_banner_alignment = ($page_banner_alignment == '' ? $page_banner_alignment : $pages_banner_alignment);

        if(isset($page_banner_bg['url']) && $page_banner_bg['url'] != ''):
            $bgi_css .= 'background-image: url('.$page_banner_bg['url'].'); background-repeat: no-repeat; background-position: center center; background-size: cover;';
        endif;
        if($page_banner_bg_color != ''):
            $bgi_css .= 'background-color: '.$page_banner_bg_color.';';
        endif;
    endif;
endif;

?>
<!-- BEGIN: Page Banner Section -->
<section class="pageBannerSection" style="<?php echo esc_attr($bgi_css) ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pageBannerContent text-<?php echo esc_attr($pages_banner_alignment); ?>">
                    <h2><?php echo ulina_kses($pages_banner_title); ?></h2>
                    <?php if($pages_is_breadcrumb == 1): ?>
                        <?php echo ulina_kses(ulina_breadcrumbs()); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END: Page Banner Section -->