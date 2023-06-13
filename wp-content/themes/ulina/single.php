<?php
/**
 * The template for displaying all single posts
 */

get_header();
$blog_single_is_banner = get_theme_mod('blog_single_is_banner', 1);
if(defined('FW')):
    $blog_si_is_settings = fw_get_db_post_option(get_the_ID(), 'blog_si_is_settings', 2);
    $blog_si_is_banner = fw_get_db_post_option(get_the_ID(), 'blog_si_is_banner', 1);
    $blog_single_is_banner = ($blog_si_is_settings == 1 && $blog_si_is_banner > 0 ? $blog_si_is_banner : $blog_single_is_banner);
endif;
if($blog_single_is_banner == 1):
    get_template_part( 'template-parts/header/blog-single', 'header' );
endif;

if(function_exists('ulina_post_view_count')){
    ulina_post_view_count(get_the_ID());
}

$blog_single_sidebar = get_theme_mod('blog_single_sidebar', 3);
$blog_single_is_tag = get_theme_mod('blog_single_is_tag', 1);
$blog_single_is_share = get_theme_mod('blog_single_is_share', 2);
$blog_single_socials = get_theme_mod('blog_single_socials', array(1, 2, 3, 4));
$blog_single_is_pagination = get_theme_mod('blog_single_is_pagination', 2);
$blog_single_is_author_box = get_theme_mod('blog_single_is_author_box', 2);

if(defined('FW')):
    $blog_si_is_content_enable = fw_get_db_post_option(get_the_ID(), 'blog_si_is_content_enable', 2);
    if($blog_si_is_content_enable == 1):
        $blog_si_post_sidebar = fw_get_db_post_option(get_the_ID(), 'blog_si_post_sidebar', 3);
        $blog_si_is_tag = fw_get_db_post_option(get_the_ID(), 'blog_si_is_tag', 1);
        $blog_si_is_share = fw_get_db_post_option(get_the_ID(), 'blog_si_is_share', 2);
        $blog_si_socials = fw_get_db_post_option(get_the_ID(), 'blog_si_socials', array());
        $blog_si_is_pagination = fw_get_db_post_option(get_the_ID(), 'blog_si_is_pagination', 2);
        $blog_si_is_author_box = fw_get_db_post_option(get_the_ID(), 'blog_si_is_author_box', 2);
        
        $blog_single_sidebar = ($blog_si_post_sidebar > 0 ? $blog_si_post_sidebar : $blog_single_sidebar);
        $blog_single_is_tag = ($blog_si_is_tag > 0 ? $blog_si_is_tag : $blog_single_is_tag);
        $blog_single_is_share = ($blog_si_is_share > 0 ? $blog_si_is_share : $blog_single_is_share);
        if(!empty($blog_si_socials)):
            $blog_single_socials = array();
            foreach($blog_si_socials as $key => $val):
                $blog_single_socials[] = $key;
            endforeach;
        endif;
        $blog_single_is_pagination  = ($blog_si_is_pagination > 0 ? $blog_si_is_pagination : $blog_single_is_pagination);
        $blog_single_is_author_box  = ($blog_si_is_author_box > 0 ? $blog_si_is_author_box : $blog_single_is_author_box);
    endif; 
endif;

$column  = ($blog_single_sidebar == 1 || !is_active_sidebar('sidebar-1') ? 'col-lg-10 offset-lg-1' : 'col-xl-8 col-lg-7');

if($blog_single_sidebar == 1 || !is_active_sidebar('sidebar-1')){
    $w = 1076;
    $h = 630;
}else{
    $w = 872;
    $h = 510;
}

$terms = get_the_terms(get_the_ID(), 'category');
$cats  = '';
if (is_array($terms) && count($terms) > 0){
    $p = 1;
    $c = count($terms);
    foreach ($terms as $term) {
        if($p == $c){
            $cats .= '<a class="biCats" href="'.  get_category_link($term->term_id).'">'.$term->name.'</a>';
        }else{
            $cats .= '<a class="biCats" href="'.  get_category_link($term->term_id).'">'.$term->name.'</a>,';
        }
        $p++;
    }
}

$dateFormat = (get_option('date_format') != '' ? get_option('date_format') : 'j M, Y');

?>
<section class="blogDetailsPageSection">
    <div class="container">
        <div class="row">
            <?php if(is_active_sidebar('sidebar-1') && $blog_single_sidebar == 2): ?>
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
                <div class="blogDetailsContentArea <?php if(!has_post_thumbnail()): ?>noThumb<?php endif; ?>">
                    <div class="bi01Meta clearfix">
                        <?php if(!empty($cats)): ?>
                        <span><i class="ulina-folder-open"></i><?php echo ulina_kses($cats); ?></span>
                        <?php endif; ?>
                        <span><i class="ulina-clock"></i><?php echo get_the_time($dateFormat); ?></span>
                        <span><i class="ulina-comments"></i><?php echo get_comments_number(); ?></span>
                    </div>
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
                    <div class="clearfix"></div>
                    <?php if(($blog_single_is_tag == 1 && has_tag()) || ($blog_single_is_share == 1 && ulina_plugin_active('ulina-assistance'))): ?>
                    <div class="row postFooterRow">
                        <div class="<?php if($blog_single_is_share == 1 ): ?>col-md-7<?php else: ?>col-md-12 noSocila<?php endif; ?>">
                            <?php if($blog_single_is_tag == 1 && has_tag()): ?>
                                <div class="postTags clearfix">
                                    <?php echo get_the_tag_list('', '', ''); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if($blog_single_is_share == 1 && ulina_plugin_active('ulina-assistance')): ?>
                        <div class="col-md-5">
                            <div class="postShare bi04Share">
                                <span><?php echo esc_html__('Share', 'ulina'); ?></span>
                                <?php echo do_shortcode('[product-share pid="'.  get_the_ID().'"]'); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php if($blog_single_is_pagination == 1): 
                    $prevpost = get_previous_post();
                    $nextpost = get_next_post();
                    ?>
                    <div class="postNavigationRow clearfix">
                        <div class="row">
                            <div class="col-md-6">
                                <?php if(!empty($prevpost)): ?>
                                <a href="<?php echo get_the_permalink($prevpost->ID); ?>" class="postNavigationItem">
                                    <img src="<?php echo ulina_post_thumbnail($prevpost->ID, 90, 90); ?>" alt="<?php the_title_attribute() ?>">
                                    <h4><i class="ulina-angle-left"></i><?php echo esc_html__('Previous Post', 'ulina'); ?></h4>
                                    <h3><?php echo get_the_title($prevpost->ID); ?></h3>
                                </a>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <?php if(!empty($nextpost)): ?>
                                <a href="<?php echo get_the_permalink($nextpost->ID); ?>" class="postNavigationItem pniRight">
                                    <img src="<?php echo ulina_post_thumbnail($nextpost->ID, 90, 90); ?>" alt="<?php the_title_attribute() ?>">
                                    <h4><?php echo esc_html__('Next Post', 'ulina'); ?><i class="ulina-angle-right"></i></h4>
                                    <h3><?php echo get_the_title($nextpost->ID); ?></h3>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($blog_single_is_author_box == 1): ?>
                <div class="postAuthorBox clearfix">
                    <img src="<?php echo ulina_get_author_avater_url(get_the_author_meta('ID'), 120, 120) ?>" alt="<?php echo esc_attr(get_the_author()); ?>"/>
                    <h3><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a></h3>
                    <?php
                        $_user_facebook = get_the_author_meta('_user_facebook', get_the_author_meta('ID'));
                        $_user_twitter = get_the_author_meta('_user_twitter', get_the_author_meta('ID'));
                        $_user_instagram = get_the_author_meta('_user_instagram', get_the_author_meta('ID'));
                        $_user_vimeo = get_the_author_meta('_user_vimeo', get_the_author_meta('ID'));
                        $_user_linkedin = get_the_author_meta('_user_linkedin', get_the_author_meta('ID'));
                        $_user_pinterest = get_the_author_meta('_user_pinterest', get_the_author_meta('ID'));
                        $_user_dribbble = get_the_author_meta('_user_dribbble', get_the_author_meta('ID'));
                        $_user_behance = get_the_author_meta('_user_behance', get_the_author_meta('ID'));
                        $_user_youtube = get_the_author_meta('_user_youtube', get_the_author_meta('ID'));
                        if($_user_facebook != '' || $_user_twitter != '' || $_user_instagram != '' || $_user_vimeo != '' || $_user_linkedin != '' || $_user_pinterest != '' || $_user_dribbble != '' || $_user_behance != '' || $_user_youtube != ''):
                    ?>
                    <div class="pabSocial">
                        <?php if($_user_facebook != ''): ?>
                        <a class="fac" href="<?php echo esc_url($_user_facebook); ?>"><i class="ulina-facebook-f"></i></a>
                        <?php endif; if($_user_twitter != ''): ?>
                        <a class="twi" href="<?php echo esc_url($_user_twitter); ?>"><i class="ulina-twitter"></i></a>
                        <?php endif; if($_user_instagram != ''): ?>
                        <a class="ins" href="<?php echo esc_url($_user_instagram); ?>"><i class="ulina-instagram"></i></a>
                        <?php endif; if($_user_vimeo != ''): ?>
                        <a class="vim" href="<?php echo esc_url($_user_vimeo); ?>"><i class="ulina-vimeo-v"></i></a>
                        <?php endif; if($_user_linkedin != ''): ?>
                        <a class="lin" href="<?php echo esc_url($_user_linkedin); ?>"><i class="ulina-linkedin-in"></i></a>
                        <?php endif; if($_user_pinterest != ''): ?>
                        <a class="pin" href="<?php echo esc_url($_user_pinterest); ?>"><i class="ulina-pinterest-p"></i></a>
                        <?php endif; if($_user_dribbble != ''): ?>
                        <a class="dri" href="<?php echo esc_url($_user_dribbble); ?>"><i class="ulina-dribbble"></i></a>
                        <?php endif; if($_user_behance != ''): ?>
                        <a class="beh" href="<?php echo esc_url($_user_behance); ?>"><i class="ulina-behance"></i></a>
                        <?php endif; if($_user_youtube != ''): ?>
                        <a class="you" href="<?php echo esc_url($_user_youtube); ?>"><i class="ulina-youtube"></i></a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <?php if(get_the_author_meta('description') != ''): ?>
                        <p>
                            <?php echo wp_strip_all_tags(get_the_author_meta('description')); ?>
                        </p>
                    <?php endif; ?>
                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="ulinaLink"><?php echo esc_html__('View All Posts', 'ulina'); ?><i class="ulina-angle-right"></i></a>
                </div>
                <?php endif; ?>
                <?php if ( comments_open() || get_comments_number() ): ?>
                    <div class="comment_area">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if(is_active_sidebar('sidebar-1') && $blog_single_sidebar == 3): ?>
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
    $single_blog_bloks = get_theme_mod('blog_single_bloks', '');
    $blocks_id = array();
    if(!empty($single_blog_bloks)){
        foreach($single_blog_bloks as $sb):
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