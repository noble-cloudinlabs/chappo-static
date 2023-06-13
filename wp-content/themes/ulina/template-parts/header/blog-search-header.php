<?php
    $blog_src_banner_title      = get_theme_mod('blog_src_banner_title', get_search_query());
    $blog_src_is_breadcrumb     = get_theme_mod('blog_src_is_breadcrumb', 1);
    $blog_src_banner_alignment  = get_theme_mod('blog_src_banner_alignment', 'center');
    
    $blog_src_banner_title = ($blog_src_banner_title != '' ? $blog_src_banner_title : get_search_query());
    
    ?>
    <!-- Begin:: Banner Section -->
    <section class="pageBannerSection blog_search_banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pageBannerContent  text-<?php echo esc_attr($blog_src_banner_alignment); ?>">
                        <h2 class="banner-title"><?php echo ulina_kses($blog_src_banner_title); ?></h2>
                        <?php if($blog_src_is_breadcrumb == 1): ?>
                            <?php echo ulina_kses(ulina_breadcrumbs()); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Banner Section -->