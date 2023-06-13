<?php
/* 
 * Template Name: Demo Blog List No Sidebar
 */
get_header();
$blog_page_ID = get_option('page_for_posts', true);

$blog_str_limit  = get_theme_mod('blog_str_limit', 301);
$blog_readmore   = get_theme_mod('blog_readmore_label', esc_html__('Read More', 'ulina'));
$blog_is_share   = get_theme_mod('blog_is_share', 2);
$blog_socials    = get_theme_mod('blog_socials', array(1, 2, 4));

$blog_pagination_alignment = get_theme_mod('blog_pagination_alignment', 'center');

$blog_is_banner  = get_theme_mod('blog_is_banner', 1);

if(defined('FW') && $blog_page_ID > 0):
    $page_is_settings = fw_get_db_post_option($blog_page_ID, 'page_is_settings', 2);
    $page_is_banner   = fw_get_db_post_option($blog_page_ID, 'page_is_banner', 1);
    $blog_is_banner   = ($page_is_settings == 1 && $page_is_banner > 0 ? $page_is_banner : $blog_is_banner);
endif;

if($blog_is_banner == 1):
    get_template_part('template-parts/header/blog', 'header');
endif;

?>
<section class="blogPageSection">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row justify-content-center">
                    <?php
                        global $wp_query;
                        $page = (get_query_var('paged') != '') ? get_query_var('paged') : 1;
                        $fargs = array(
                            'post_type'         => 'post',
                            'post_status'       => 'publish',
                            'posts_per_page'    => 6,
                            'orderby'           => 'ID',
                            'order'             => 'DESC',
                            'paged'             => $page
                        );
                        $wp_query = new WP_Query($fargs);
                        if($wp_query->have_posts()):
                            while($wp_query->have_posts()):
                                $wp_query->the_post();
                                $dateFormat = (get_option('date_format') != '' ? get_option('date_format') : 'j M, Y');
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
                                ?>
                                <div class="col-lg-10 offset-lg-1">
                                    <div class="blogItem04">
                                        <?php if(has_post_thumbnail()): ?>
                                        <div class="bi04Thumb">
                                        <img src="<?php echo ulina_post_thumbnail(get_the_ID(), 1076, 630); ?>" alt="<?php the_title_attribute() ?>">
                                        </div>
                                        <?php endif; ?>
                                        <div class="bi04Detail">
                                            <div class="bi01Meta clearfix">
                                                <?php if(!empty($cats)): ?>
                                                <span><i class="ulina-folder-open"></i><?php echo ulina_kses($cats); ?></span>
                                                <?php endif; ?>
                                                <span><i class="ulina-clock"></i><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_time($dateFormat); ?></a></span>
                                                <span><i class="ulina-comments"></i><a href="<?php echo get_the_permalink(); ?>"><?php echo get_comments_number(); ?></a></span>
                                            </div>
                                            <h2><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
                                            <?php if($blog_str_limit > 0): ?>
                                                <div class="bi04Excerpt">
                                                    <?php 
                                                        echo substr(wp_strip_all_tags(get_the_excerpt()), 0, $blog_str_limit);
                                                    ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($blog_is_share == 1 || $blog_readmore != ''): ?>
                                            <div class="bi04Footer">
                                                <?php if($blog_readmore != ''): ?>
                                                <a href="<?php echo get_the_permalink(); ?>" class="ulinaBTN"><span><?php echo ulina_kses($blog_readmore); ?></span></a>
                                                <?php endif; ?>
                                                <?php if($blog_is_share == 1 &&  !empty($blog_socials)): ?>
                                                <div class="bi04Share">
                                                    <span><?php echo esc_html__('Share', 'ulina'); ?></span>
                                                    <?php
                                                        if(in_array(1, $blog_socials)){ echo '<a class="fac" target="_blank" href="https://www.facebook.com/sharer.php?u='.get_the_permalink().'&title='.esc_url(get_the_title()).'"><i class="ulina-facebook-f"></i></a>'; }
                                                        if(in_array(2, $blog_socials)){ echo '<a class="twi" target="_blank" href="https://twitter.com/intent/tweet?url='.get_the_permalink().'&text='.esc_url(get_the_title()).'"><i class="ulina-twitter"></i></a>'; }
                                                        if(in_array(3, $blog_socials)){ echo '<a class="mai" target="_blank" href="mailto:?subject='.get_the_permalink().'"><i class="ulina-envelope"></i></a>'; }
                                                        if(in_array(4, $blog_socials)){ echo '<a class="lin" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url='.get_the_permalink().'&title='.esc_url(get_the_title()).'"><i class="ulina-linkedin-in"></i></a>'; }
                                                        if(in_array(5, $blog_socials)){ echo '<a class="pin" target="_blank" href="https://pinterest.com/pin/create/bookmarklet/?media='.get_the_post_thumbnail_url(get_the_ID(), 'full').'&url='.get_the_permalink().'&is_video=false&description='.esc_url(get_the_title()).'"><i class="ulina-pinterest-p"></i></a>'; }
                                                        if(in_array(6, $blog_socials)){ echo '<a class="wha" target="_blank" href="https://api.whatsapp.com/send?text='.get_the_permalink().'"><i class="ulina-whatsapp"></i></a>'; }
                                                        if(in_array(7, $blog_socials)){ echo '<a class="fac" target="_blank" href="https://digg.com/submit?url='.get_the_permalink().'&title='.esc_url(get_the_title()).'"><i class="ulina-digg"></i></a>'; }
                                                        if(in_array(8, $blog_socials)){ echo '<a class="tum" target="_blank" href="https://www.tumblr.com/widgets/share/tool?canonicalUrl='.get_the_permalink().'&title='.esc_url(get_the_title()).'"><i class="ulina-tumblr"></i></a>'; }
                                                        if(in_array(9, $blog_socials)){ echo '<a class="red" target="_blank" href="https://reddit.com/submit?url='.get_the_permalink().'&title='.esc_url(get_the_title()).'"><i class="ulina-reddit-alien"></i></a>'; }
                                                    ?>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
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
        </div>
    </div>
</section>
<?php
get_footer();