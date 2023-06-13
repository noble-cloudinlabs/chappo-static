<?php
/**
 * The template for displaying all pages
 */

get_header(); 
$pages_is_banner = get_theme_mod('pages_is_banner', 1);
$pages_sidebar   = get_theme_mod('pages_sidebar', 1);
if(defined('FW')):
    $page_is_settings = fw_get_db_post_option(get_the_ID(), 'page_is_settings', 2);
    $page_is_banner   = fw_get_db_post_option(get_the_ID(), 'page_is_banner', 1);
    $pages_is_banner  = ($page_is_settings == 1 && $page_is_banner > 0 ? $page_is_banner : $pages_is_banner);
    
    $page_is_con_settings = fw_get_db_post_option(get_the_ID(), 'page_is_con_settings', 2);
    $page_sidebar         = fw_get_db_post_option(get_the_ID(), 'page_sidebar', 1);
    $pages_sidebar        = ($page_is_con_settings == 1 && $page_sidebar > 0 ? $page_sidebar : $pages_sidebar);
endif;
if($pages_is_banner == 1):
    get_template_part( 'template-parts/header/page', 'header' );
endif;

$column  = ($pages_sidebar == 1 || !is_active_sidebar('sidebar-2') ? 'col-lg-12' : 'col-xl-8 col-lg-7');

if($pages_sidebar == 1 || !is_active_sidebar('sidebar-2')){
    $w = 1296;
    $h = 630;
}else{
    $w = 872;
    $h = 510;
}

?>
<section class="blogDetailsPageSection page_section">
    <div class="container">
        <div class="row">
            <?php if(is_active_sidebar('sidebar-2') && $pages_sidebar == 2): ?>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar leftSidebar">
                        <?php dynamic_sidebar('sidebar-1'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="<?php echo esc_attr($column); ?>">
                <?php if(has_post_thumbnail()): ?>
                    <div class="blogDetailsThumb">
                        <img src="<?php echo ulina_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php the_title_attribute() ?>">
                    </div>
                <?php endif; ?>
                <?php while(have_posts()): the_post(); ?>
                <div class="blogDetailscontent">
                    <div class="clearfix"></div>
                    <?php the_content(); ?>
                    <div class="clearfix"></div>
                    <?php
                        $defaults = array(
                            'before'           => '<div class="PaginInner clearfix"><strong>' . esc_html__( 'Pages:', 'ulina' ).'</strong>',
                            'after'            => '</div>',
                            'link_before'      => '<span>',
                            'link_after'       => '</span>',
                            'next_or_number'   => 'number',
                            'separator'        => ' ',
                            'nextpagelink'     => '<i class="ulina-angle-left"></i>',
                            'previouspagelink' => '<i class="ulina-angle-right"></i>',
                            'pagelink'         => '%',
                            'echo'             => 1
                        );
                        wp_link_pages( $defaults );
                    ?>
                    <div class="clearfix"></div>
                </div>
                <?php endwhile; ?>
                <?php if ( comments_open() || get_comments_number() ): ?>
                    <div class="comment_area">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if(is_active_sidebar('sidebar-2') && $pages_sidebar == 3): ?>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">
                        <?php dynamic_sidebar('sidebar-1'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php
get_footer();