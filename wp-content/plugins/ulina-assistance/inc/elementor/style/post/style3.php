<?php
$querys = array(
    'post_type'         => 'post',
    'post_status'       => 'publish',
    'posts_per_page'    => ($lb_post_item < 5 ? 5 : $lb_post_item),
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
    <div class="row masonryGrid" id="masonryGrid">
        <?php
            $i = 1;
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
                $w = 638;
                $h = 543;
                ?>
                <?php if($i == 1): ?> 
                    <div class="col-lg-8 col-xl-6 shafItem">
                        <div class="blogItem01">
                            <img src="<?php echo ulina_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                            <div class="bi01Content">
                                <div class="bi01Meta clearfix">
                                    <?php if(!empty($cats)): ?>
                                    <span><i class="ulina-folder-open"></i><?php echo ulina_kses($cats) ?></span>
                                    <?php endif; ?>
                                    <span><i class="ulina-clock"></i><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_time($date_format); ?></a></span>
                                    <span><i class="ulina-user"></i><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a></span>
                                </div>
                                <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-md-6 col-lg-4 col-xl-3 shafItem">
                        <div class="blogItem02">
                            <div class="biThumb02"><img src="<?php echo ulina_post_thumbnail(get_the_ID(), 360, 260); ?>" alt="<?php echo get_the_title(); ?>"></div>
                            <div class="bi01Meta clearfix">
                                <?php if(!empty($cats)): ?>
                                <span><i class="ulina-folder-open"></i><?php echo ulina_kses($cats) ?></span>
                                <?php endif; ?>
                                <span><i class="ulina-clock"></i><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_time($date_format); ?></a></span>
                            </div>
                            <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                            <a href="<?php echo get_the_permalink(); ?>" class="ulinaLink"><i class="ulina-angle-right"></i><?php echo esc_html($rm_label); ?></a>
                        </div>
                    </div>
                <?php endif; ?>
                <?php
                $i++;
            endwhile;
        ?>
        <div class="col-lg-1 col-sm-1 shafSizer"></div>
    </div>
<?php endif;
wp_reset_postdata(); ?>