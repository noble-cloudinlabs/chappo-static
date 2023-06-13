<?php
    $fof_banner_title       = get_theme_mod('fof_banner_title', esc_html__('Page Not Found', 'ulina'));
    $fof_is_breadcrumb      = get_theme_mod('fof_is_breadcrumb', 1);
    $fof_banner_alignment   = get_theme_mod('fof_banner_alignment', 'center');
    
    ?>
    <!-- Begin:: Banner Section -->
    <section class="pageBannerSection fof_page_banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pageBannerContent text-<?php echo esc_attr($fof_banner_alignment); ?>">
                        <h2 class="banner-title"><?php echo ulina_kses($fof_banner_title) ?></h2>
                        <?php if($fof_is_breadcrumb == 1): ?>
                            <?php echo ulina_kses(ulina_breadcrumbs()); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Banner Section -->