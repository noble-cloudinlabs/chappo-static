<?php
$querys = array(
    'post_type'         => 'post',
    'post_status'       => 'publish',
    'posts_per_page'    => $lb_post_item,
    'orderby'           => $lb_order_by,
    'order'             => $lb_order
);

if (($key = array_search(0, $lb_specific)) !== false) {
    unset($lb_specific[$key]);
}
if(!empty($lb_specific)){
    $querys['post__in'] = $lb_specific;
}
if (($key = array_search(0, $lb_category)) !== false) {
    unset($lb_category[$key]);
}
if(!empty($lb_category)){
    $querys['tax_query']   = array(
        'relation'      => 'AND', 
        array(
            'taxonomy'  => 'category', 
            'field'     => 'id', 
            'terms'     => $lb_category,
            'operator'  => 'IN'
        )
    );
}

$qp = new WP_Query($querys);
if($qp->have_posts()): ?>
    <div class="row blogPostRow">
        <?php
            while($qp->have_posts()):
                $qp->the_post();
            
                $terms = get_the_terms(get_the_ID(), 'category');
                $cats  = '';
                if (is_array($terms)){
                    $p = 1;
                    foreach ($terms as $term) {
                        if($p > 1){ break; }
                        $cats .= '<a href="'.  get_category_link($term->term_id).'">'.$term->name.'</a>';
                        $p++;
                    }
                }
                $date_format = get_option('date_format', 'M d, Y');
                $date_format = ($date_format == 'M d, Y' ? $date_format : 'M d, Y');
                $w = ($lb_post_thumb_width > 0 ? $lb_post_thumb_width : 424);
                $h = ($lb_post_thumb_height > 0 ? $lb_post_thumb_height : 286);
                ?>
                <div class="col-xl-<?php echo round(12 / $lb_xl_col); ?> col-lg-<?php echo round(12 / $lb_lg_col); ?> col-md-<?php echo round(12 / $lb_md_col); ?>  col-sm-<?php echo round(12 / $lb_sm_col); ?>">
                    <?php if($lb_post_style == 2): ?>
                        <div class="blogItem02">
                            <div class="bi01Meta clearfix">
                                <?php if(!empty($cats)): ?>
                                <span><i class="ulina-folder-open"></i><?php echo ulina_kses($cats) ?></span>
                                <?php endif; ?>
                                <span><i class="ulina-clock"></i><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_time($date_format); ?></a></span>
                            </div>
                            <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                            <a href="<?php echo get_the_permalink(); ?>" class="ulinaLink"><i class="ulina-angle-right"></i><?php echo esc_html($rm_label); ?></a>
                        </div>
                    <?php else: ?>
                        <div class="blogItem03">
                            <div class="bi03Thumb">
                                <img src="<?php echo ulina_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                            </div>
                            <div class="bi03Details">
                                <div class="bi01Meta clearfix">
                                    <?php if(!empty($cats)): ?>
                                    <span><i class="ulina-folder-open"></i><?php echo ulina_kses($cats) ?></span>
                                    <?php endif; ?>
                                    <span><i class="ulina-clock"></i><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_time($date_format); ?></a></span>
                                </div>
                                <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <?php
            endwhile;
        ?>
    </div>
<?php endif;
wp_reset_postdata(); ?>