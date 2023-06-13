<?php
/* 
 * Template Name: Demo Blog Grid Right Sidebar
 */
get_header();
$blog_page_ID = get_option('page_for_posts', true);

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
            <div class="col-xl-8 col-lg-7">
                <div class="row">
                    <?php
                        global $wp_query;
                        $page = (get_query_var('paged') != '') ? get_query_var('paged') : 1;
                        $fargs = array(
                            'post_type'         => 'post',
                            'post_status'       => 'publish',
                            'posts_per_page'    => 12,
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
                                <div class="col-md-6">
                                    <div class="blogItem03">
                                        <?php if(has_post_thumbnail()): ?>
                                        <div class="bi03Thumb">
                                        <img src="<?php echo ulina_post_thumbnail(get_the_ID(), 424, 286); ?>" alt="<?php the_title_attribute() ?>">
                                        </div>
                                        <?php endif; ?>
                                        <div class="bi03Details">
                                            <div class="bi01Meta clearfix">
                                                <?php if(!empty($cats)): ?>
                                                    <span><i class="ulina-folder-open"></i><?php echo ulina_kses($cats); ?></span>
                                                <?php endif; ?>
                                                <span><i class="ulina-clock"></i><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_time($dateFormat); ?></a></span>
                                            </div>
                                            <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
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
            <div class="col-xl-4 col-lg-5">
                <div class="sidebar">
                    <?php dynamic_sidebar('sidebar-1'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();