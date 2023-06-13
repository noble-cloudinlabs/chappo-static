<?php
    $blog_cats_banner_title = get_theme_mod('blog_cats_banner_title', get_the_archive_title());
    $blog_cats_is_breadcrumb = get_theme_mod('blog_cats_is_breadcrumb', 1);
    $blog_cats_banner_alignment = get_theme_mod('blog_cats_banner_alignment', 'center');
    
    $bgi_css = '';
    if(defined('FW')):
        $category = get_queried_object();
        $category_id = $category->term_id;
        $blog_cat_is_settings = fw_get_db_term_option($category_id, 'category', 'blog_cat_is_settings', 2);
        if($blog_cat_is_settings == 1):
            $blog_cat_banner_bg = fw_get_db_term_option($category_id, 'category', 'blog_cat_banner_bg', array());
            $blog_cat_banner_color = fw_get_db_term_option($category_id, 'category', 'blog_cat_banner_color', '');
            $blog_cat_banner_title = fw_get_db_term_option($category_id, 'category', 'blog_cat_banner_title', '');
            $blog_cat_is_breadcrumb = fw_get_db_term_option($category_id, 'category', 'blog_cat_is_breadcrumb', 1);
            $blog_cat_banner_alignment  = fw_get_db_term_option($category_id, 'category', 'blog_cat_banner_alignment', 'center');
            
            $blog_cats_banner_title         = ($blog_cat_banner_title != '' ? $blog_cat_banner_title : $blog_cats_banner_title);
            $blog_cats_is_breadcrumb        = ($blog_cat_is_breadcrumb > 0 ? $blog_cat_is_breadcrumb : $blog_cats_is_breadcrumb);
            $blog_cats_banner_alignment     = ($blog_cat_banner_alignment != '' ? $blog_cat_banner_alignment : $blog_cats_banner_alignment);
            
            if(isset($blog_cat_banner_bg['url']) && $blog_cat_banner_bg['url'] != ''):
                $bgi_css = 'background-image: url('.$blog_cat_banner_bg['url'].');';
            endif;
            if(isset($blog_cat_banner_color) && $blog_cat_banner_color != ''):
                $bgi_css = 'background-color: '.$blog_cat_banner_color.';';
            endif;
        endif;
    endif;
    
    $blog_cats_banner_title = ($blog_cats_banner_title != '' ? $blog_cats_banner_title : get_the_archive_title());
    $blog_cats_banner_title = wp_strip_all_tags($blog_cats_banner_title);
    $blog_cats_banner_title = str_replace('Category:', '', $blog_cats_banner_title);
    
    ?>
    <!-- Begin:: Banner Section -->
    <section class="pageBannerSection blog_cate_banner" style="<?php echo esc_attr($bgi_css); ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pageBannerContent  text-<?php echo esc_attr($blog_cats_banner_alignment); ?>">
                        <h2 class="banner-title"><?php echo ulina_kses($blog_cats_banner_title); ?></h2>
                        <?php if($blog_cats_is_breadcrumb == 1): ?>
                            <?php echo ulina_kses(ulina_breadcrumbs()); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Banner Section -->