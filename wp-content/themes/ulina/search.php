

<?php
/**
 * search.php
 *
 * The Search Result File.
 */
get_header();
$blog_src_is_banner = get_theme_mod('blog_src_is_banner', 1);
if($blog_src_is_banner == 1):
    get_template_part('template-parts/header/blog-search', 'header');
endif;

$blog_sidebar    = get_theme_mod('blog_sidebar', 3);
$blog_pagination_alignment = get_theme_mod('blog_pagination_alignment', 'center');

$area_class     = ($blog_sidebar == 1  || !is_active_sidebar('sidebar-1') ? 'col-lg-12' : 'col-xl-8 col-lg-7');
$blog_sidebar   = ($blog_sidebar == 1  || !is_active_sidebar('sidebar-1') ? '1' : $blog_sidebar);

?>
<section class="blogPageSection">
    <div class="container">
        <div class="row <?php if($blog_sidebar == 1): ?>justify-content-center<?php endif; ?>">
            <?php if(is_active_sidebar('sidebar-1') && $blog_sidebar == 2): ?>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar leftSidebar">
                        <?php dynamic_sidebar('sidebar-1'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="<?php echo esc_attr($area_class); ?>">
                <div class="row">
                    <?php
                        if(have_posts()):
                            while(have_posts()):
                                the_post();
                                get_template_part('template-parts/post/content');
                            endwhile;
                        else:
                            get_template_part('template-parts/post/content', 'none');
                        endif;
                    ?>
                </div>
                <div class="row blogPaginationRow">
                    <div class="col-lg-12">
                        <div class="shopPagination justify-content-<?php echo esc_attr($blog_pagination_alignment); ?>">
                            <?php
                                the_posts_pagination(
                                    array(
                                        'prev_text'        => ulina_kses('<i class="ulina-angle-left"></i>'),
                                        'next_text'        => ulina_kses('<i class="ulina-angle-right"></i>'),
                                        'before_page_number' => '',
                                        'type'               => 'array'
                                    )
                                );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(is_active_sidebar('sidebar-1') && $blog_sidebar == 3): ?>
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
    $blog_bloks = get_theme_mod('blog_bloks', '');
    $blocks_id = array();
    if(!empty($blog_bloks)){
        foreach($blog_bloks as $sb):
            if($sb['block_ids'] != '' && $sb['block_ids'] != 'none'):
                $blocks_id[] = $sb['block_ids'];
            endif;
        endforeach;
        $bloks = array(
            'post_type'     => 'blocks',
            'post_status'   => 'publish',
            'orderby'       => 'post__in',
            'post__in'      => $blocks_id
        );
        $blok = new WP_Query($bloks);
        if($blok->have_posts()):
            while($blok->have_posts()):
            $blok->the_post();
            the_content();
            endwhile;
        endif;
        wp_reset_postdata();
    }
get_footer();