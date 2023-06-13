<?php
    $blog_banner_title       = get_theme_mod('blog_banner_title', esc_html__('Latest News', 'ulina'));
    $blog_is_breadcrumb      = get_theme_mod('blog_is_breadcrumb', 1);
    $blog_banner_alignment   = get_theme_mod('blog_banner_alignment', 'center');
    
    $bgi_css = '';
    $blog_page_ID = get_option('page_for_posts', true);
    if(defined('FW') && $blog_page_ID > 0):
        $page_is_settings = fw_get_db_post_option($blog_page_ID, 'page_is_settings', 2);
        if($page_is_settings == 1):
            $page_banner_bg         = fw_get_db_post_option($blog_page_ID, 'page_banner_bg', array());
            $page_banner_bg_color   = fw_get_db_post_option($blog_page_ID, 'page_banner_bg_color', '');
            $page_banner_title      = fw_get_db_post_option($blog_page_ID, 'page_banner_title', '');
            $page_is_breadcrumb     = fw_get_db_post_option($blog_page_ID, 'page_is_breadcrumb', 1);
            $page_banner_alignment  = fw_get_db_post_option($blog_page_ID, 'page_banner_alignment', 'center');
            
            $blog_banner_title      = ($page_banner_title != '' ? $page_banner_title : $blog_banner_title);
            $blog_is_breadcrumb     = ($page_is_breadcrumb > 0 ? $page_is_breadcrumb : $blog_is_breadcrumb);
            $blog_banner_alignment  = ($page_banner_alignment != '' ? $page_banner_alignment : $blog_banner_alignment);

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
    <section class="pageBannerSection blog_page_banner" style="<?php echo esc_attr($bgi_css) ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pageBannerContent text-<?php echo esc_attr($blog_banner_alignment); ?>">
                        <h2 class="banner-title"><?php echo ulina_kses($blog_banner_title); ?></h2>
                        <?php if($blog_is_breadcrumb == 1): ?>
                            <?php echo ulina_kses(ulina_breadcrumbs()); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END: Page Banner Section -->