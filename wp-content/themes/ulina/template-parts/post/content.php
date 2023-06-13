<?php
$blog_view       = get_theme_mod('blog_view', 1);
$blog_sidebar    = get_theme_mod('blog_sidebar', 3);
$blog_str_limit  = get_theme_mod('blog_str_limit', 301);
$blog_readmore   = get_theme_mod('blog_readmore_label', esc_html__('Read More', 'ulina'));

$blog_is_share   = get_theme_mod('blog_is_share', 2);
$blog_socials    = get_theme_mod('blog_socials', array(1, 2, 4));

$blog_sidebar = ($blog_sidebar == 1 || !is_active_sidebar('sidebar-1') ? '1' : $blog_sidebar);
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
    
if($blog_sidebar == 1){
    $col = 'col-lg-4 col-md-6'; 
}else {
    $col = 'col-md-6'; 
}

if($blog_view == 2):
?>
<div class="<?php echo esc_attr($col); ?>">
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
<?php else:  
if($blog_sidebar != 1){
    $w = 872;
    $h = 510;
    $col = 'col-lg-12'; 
}else{
    $w = 1076;
    $h = 630;
    $col = 'col-lg-10 offset-lg-1'; 
}
$col .= (get_post_type( get_the_ID() ) == 'product' ? ' productCols' : '');
?>
<div class="<?php echo esc_attr($col); ?>">
    <div class="blogItem04  <?php if(is_sticky()){ echo 'featured_post';} ?> <?php if(!has_post_thumbnail()): ?>noThumb<?php endif; ?>">
        <?php if(has_post_thumbnail()): ?>
        <div class="bi04Thumb">
            <img src="<?php echo ulina_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php the_title_attribute() ?>">
        </div>
        <?php endif; ?>
        <div class="bi04Detail">
                <?php if(get_post_type( get_the_ID() ) == 'product'): 
                    $product = wc_get_product(get_the_ID() ); 
                    if(!empty($product->get_price_html())):
                        echo '<div class="bi01Meta clearfix">';
                            echo '<span class="price">'.ulina_kses($product->get_price_html()).'</span>';
                        echo '</div>';
                    endif;
                else: ?>
                    <div class="bi01Meta clearfix">
                        <?php if(!empty($cats)): ?>
                        <span><i class="ulina-folder-open"></i><?php echo ulina_kses($cats); ?></span>
                        <?php endif; ?>
                        <span><i class="ulina-clock"></i><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_time($dateFormat); ?></a></span>
                        <span><i class="ulina-comments"></i><a href="<?php echo get_the_permalink(); ?>"><?php echo get_comments_number(); ?></a></span>
                    </div>
                <?php endif; ?>
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
<?php endif; ?>