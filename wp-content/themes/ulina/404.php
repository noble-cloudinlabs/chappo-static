<?php

/**
 * The template for displaying 404 pages (not found)
 */
get_header();
$fof_is_banner = get_theme_mod('fof_is_banner', 1);
if($fof_is_banner == 1):
    get_template_part( 'template-parts/header/404', 'header' );
endif;

$fof_titles     = get_theme_mod('fof_titles', esc_html__('404', 'ulina'));
$fof_sub_title  = get_theme_mod('fof_sub_title', esc_html__('Oops! Page not found.', 'ulina'));
$fof_contents   = get_theme_mod('fof_contents', esc_html__('The page you are looking for was moved removed, renamed or never existed', 'ulina'));
$fof_is_search  = get_theme_mod('fof_is_search', 2);
$fof_is_homes   = get_theme_mod('fof_is_homes', 1);
$fof_hbtn_label = get_theme_mod('fof_hbtn_label', esc_html__('Back To Home', 'ulina'));
?>
<section class="fofPage section_404">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="fofContent text-center">
                    <?php if($fof_titles != ''): ?><h2><?php echo ulina_kses($fof_titles) ?></h2><?php endif; ?>
                    <?php if($fof_sub_title != ''): ?><h3><i class="ulina-face-sad-cry"></i> <?php echo ulina_kses($fof_sub_title) ?></h3><?php endif; ?>
                    <?php if($fof_contents != ''): ?><p><?php echo ulina_kses($fof_contents) ?></p><?php endif; ?>
                    <div class="clearfix"></div>
                    <?php if($fof_is_homes == 1): ?>
                        <a href="<?php echo esc_url(home_url('/')) ?>" class="ulinaBTN"><span><?php echo esc_html($fof_hbtn_label) ?></span></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
