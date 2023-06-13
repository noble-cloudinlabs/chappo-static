<div class="productTabs">
    <?php
        $tabs_id        = uniqid('uiuxom-product-tabs-');
        if(!empty($tabs)):
            echo '<ul class="nav productTabsNav align-'.$ps_nav_alignment.'" id="'.$tabs_id.'" role="tablist">';
                $i = 1;
                foreach ($tabs as $key => $tab):
                    $ps_tab_title      = (isset($tab['ps_tab_title'])) ? $tab['ps_tab_title'] : '';
                    if($ps_tab_title != ''):
                        ?>
                        <li class="nav-item" role="presentation">
                            <button class="<?php if($i == 1): ?>active<?php endif; ?>" id="<?php echo esc_attr($tabs_id . '-label-' . ($key + 1)); ?>" data-bs-toggle="tab" data-bs-target="#<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>" type="button" role="tab" aria-controls="<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>" aria-selected="<?php echo ($i == 1 ? 'true' : 'false') ?>" tabindex="-1">
                                <?php echo ulina_kses($ps_tab_title); ?>
                            </button>
                        </li>
                        <?php
                    endif;
                $i++;
                endforeach;
            echo '</ul>';
            echo '<div class="tab-content productTabContent" id="productTabContent">';
                $i = 1;
                foreach ($tabs as $tkeys => $tab):
                    $ps_tab_title      = (isset($tab['ps_tab_title'])) ? $tab['ps_tab_title'] : '';
                    if($ps_tab_title != ''):
                        $ps_proudct_view           = (isset($tab['ps_proudct_view']) && !empty($tab['ps_proudct_view']) ? $tab['ps_proudct_view'] : '1'); 
     
                        $ps_product_types  = (isset($tab['ps_product_types']) && $tab['ps_product_types'] > 0) ? $tab['ps_product_types'] : 1;      

                        $ps_category    = (isset($tab['ps_category']) && !empty($tab['ps_category'])? $tab['ps_category'] : array());
                        $ps_tag    = (isset($tab['ps_tag']) && !empty($tab['ps_tag'])? $tab['ps_tag'] : array());
                        $ps_brand    = (isset($tab['ps_brand']) && !empty($tab['ps_brand'])? $tab['ps_brand'] : array());
                        $ps_collection    = (isset($tab['ps_collection']) && !empty($tab['ps_collection'])? $tab['ps_collection'] : array());
                        $ps_specific    = (isset($tab['ps_specific']) && !empty($tab['ps_specific'])? $tab['ps_specific'] : array());
                        $ps_not_specific    = (isset($tab['ps_not_specific']) && !empty($tab['ps_not_specific'])? $tab['ps_not_specific'] : array());
                        
                        $ps_xl_col   = (isset($tab['ps_xl_col']) && $tab['ps_xl_col'] > 0) ? $tab['ps_xl_col'] : 4;
                        $ps_lg_col   = (isset($tab['ps_lg_col']) && $tab['ps_lg_col'] > 0) ? $tab['ps_lg_col'] : 4;
                        $ps_md_col   = (isset($tab['ps_md_col']) && $tab['ps_md_col'] > 0) ? $tab['ps_md_col'] : 3;
                        $ps_sm_col   = (isset($tab['ps_sm_col']) && $tab['ps_sm_col'] > 0) ? $tab['ps_sm_col'] : 2;
                        
                        $ps_order_by    = (isset($tab['ps_order_by']) && $tab['ps_order_by'] != '') ? $tab['ps_order_by'] : 'date';
                        $ps_order       = (isset($tab['ps_order']) && $tab['ps_order'] != '') ? $tab['ps_order'] : 'desc';
                        
                        $ps_show_wishlist           = (isset($tab['ps_show_wishlist']) && $tab['ps_show_wishlist'] != '') ? $tab['ps_show_wishlist'] : 'no';
                        $ps_show_quickview           = (isset($tab['ps_show_quickview']) && $tab['ps_show_quickview'] != '') ? $tab['ps_show_quickview'] : 'yes';
                        $ps_show_flashlabels           = (isset($tab['ps_show_flashlabels']) && $tab['ps_show_flashlabels'] != '') ? $tab['ps_show_flashlabels'] : 'yes';
                        $ps_show_review_count           = (isset($tab['ps_show_review_count']) && $tab['ps_show_review_count'] != '') ? $tab['ps_show_review_count'] : 'no';
                        $ps_reviw_suffice           = (isset($tab['ps_reviw_suffice']) && $tab['ps_reviw_suffice'] != '') ? $tab['ps_reviw_suffice'] : '';
                        
                        $ps_post_thumb_width       = (isset($tab['ps_post_thumb_width']) && $tab['ps_post_thumb_width'] > 0) ? $tab['ps_post_thumb_width'] : '';
                        $ps_post_thumb_height       = (isset($tab['ps_post_thumb_height']) && $tab['ps_post_thumb_height'] > 0) ? $tab['ps_post_thumb_height'] : '';
                        
                        
                        $ps_post_item = (isset($tab['ps_post_item']) && $tab['ps_post_item'] > 0 ? $tab['ps_post_item'] : 4);
                        $ps_offset = (isset($tab['ps_offset']) && $tab['ps_offset'] > 0 ? $tab['ps_offset'] : 0);

                        $autoplay       = (isset($tab['ps_slide_autoplay']) && $tab['ps_slide_autoplay'] != '') ? $tab['ps_slide_autoplay'] : 'yes';
                        $loop           = (isset($tab['ps_slide_loop']) && $tab['ps_slide_loop'] != '') ? $tab['ps_slide_loop'] : 'yes';
                        $nav            = (isset($tab['ps_slide_nav']) && $tab['ps_slide_nav'] != '') ? $tab['ps_slide_nav'] : 'no';
                        $dots           = (isset($tab['ps_slide_dots']) && $tab['ps_slide_dots'] != '') ? $tab['ps_slide_dots'] : 'no';
                        $ps_items_gapping   = (isset($tab['ps_items_gapping']) && $tab['ps_items_gapping'] != '') ? $tab['ps_items_gapping'] : 24;
                        $ps_nav_position   = (isset($tab['ps_nav_position']) && $tab['ps_nav_position'] > 0) ? $tab['ps_nav_position'] : 2;

                        $query_args = [];
                        $query_args = [
                            'post_type' => 'product',
                            'post_status' => 'publish',
                            'orderby' => $ps_order_by,
                            'order' => $ps_order,
                            'posts_per_page' => $ps_post_item,
                        ];
                        
                        if (($key = array_search(0, $ps_category)) !== false) {
                            unset($ps_category[$key]);
                        }
                        if (!empty($ps_category)) {
                            $query_args['tax_query'] = array(
                                'relation' => 'AND',
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'id',
                                    'terms' => $ps_category,
                                    'operator' => 'IN'
                                )
                            );
                        }
                        
                        if (($key = array_search(0, $ps_tag)) !== false) {
                            unset($ps_tag[$key]);
                        }
                        if (!empty($ps_tag)) {
                            if(isset($query_args['tax_query'])):
                                $query_args['tax_query'][] = array(
                                        'taxonomy' => 'product_tag', 
                                        'field' => 'id', 
                                        'terms' => $ps_tag,
                                        'operator' => 'IN',
                                );
                            else:
                                $query_args['tax_query'] = array(
                                    'relation' => 'AND',
                                    array(
                                        'taxonomy' => 'product_tag',
                                        'field' => 'id',
                                        'terms' => $ps_tag,
                                        'operator' => 'IN'
                                    )
                                );
                            endif;
                        }
        
                        if (($key = array_search(0, $ps_brand)) !== false) {
                            unset($ps_brand[$key]);
                        }
                        if (!empty($ps_brand)) {
                            if(isset($query_args['tax_query'])):
                                $query_args['tax_query'][] = array(
                                        'taxonomy' => 'product_brand', 
                                        'field' => 'id', 
                                        'terms' => $ps_brand,
                                        'operator' => 'IN',
                                );
                            else:
                                $query_args['tax_query'] = array(
                                    'relation' => 'AND',
                                    array(
                                        'taxonomy' => 'product_brand',
                                        'field' => 'id',
                                        'terms' => $ps_brand,
                                        'operator' => 'IN'
                                    )
                                );
                            endif;
                        }

                        if (($key = array_search(0, $ps_collection)) !== false) {
                            unset($ps_collection[$key]);
                        }
                        if (!empty($ps_collection)) {
                            if(isset($query_args['tax_query'])):
                                $query_args['tax_query'][] = array(
                                        'taxonomy' => 'product_collection', 
                                        'field' => 'id', 
                                        'terms' => $ps_collection,
                                        'operator' => 'IN',
                                );
                            else:
                                $query_args['tax_query'] = array(
                                    'relation' => 'AND',
                                    array(
                                        'taxonomy' => 'product_collection',
                                        'field' => 'id',
                                        'terms' => $ps_collection,
                                        'operator' => 'IN'
                                    )
                                );
                            endif;
                        }
                        
                        
                        if ('2' === $ps_product_types) {
                            if(isset($query_args['tax_query'])):
                                $query_args['tax_query'][] = array(
                                        'taxonomy' => 'product_visibility', 
                                        'field' => 'name', 
                                        'terms' => 'featured',
                                        'operator' => 'IN',
                                );
                            else:
                                $query_args['tax_query']   = array(
                                    'relation' => 'AND', 
                                    array(
                                        'taxonomy' => 'product_visibility', 
                                        'field' => 'name', 
                                        'terms' => 'featured',
                                        'operator' => 'IN',
                                    ) 
                                );
                            endif;
                        }
                        //On Sell product
                        if ('3' === $ps_product_types) {
                            $query_args['post__in'] = wc_get_product_ids_on_sale();
                        }
                        //Best Sell product
                        if ('4' === $ps_product_types) {
                            $query_args['orderby'] = 'meta_value_num';
                            $query_args['meta_key'] = 'total_sales';
                            $query_args['order'] = 'DESC';
                        }
                        
                        if ('5' === $ps_product_types) {
                            $query_args['orderby'] = 'meta_value_num';
                            $query_args['meta_key'] = '_wc_average_rating';
                            $query_args['order'] = 'DESC';
                        }
                        
                        if (($key = array_search(0, $ps_specific)) !== false) {
                            unset($ps_specific[$key]);
                        }
                        if ($ps_product_types == '6' && !empty($ps_specific)) {
                            $query_args['post__in'] = $ps_specific;
                            $query_args['orderby'] = 'post__in';
                        }
                        
                        if (($key = array_search(0, $ps_not_specific)) !== false) {
                            unset($ps_not_specific[$key]);
                        }
                        if (!empty($ps_not_specific)) {
                            $query_args['post__not_in'] = $ps_not_specific;
                        }
                        
                        if ($ps_offset > 0) {
                            $query_args['offset'] = $ps_offset;
                        }
                        
                        $uiuxom_post = new WP_Query($query_args);
                        $w = ($ps_post_thumb_width > 0 ? $ps_post_thumb_width : 312);
                        $h = ($ps_post_thumb_height > 0 ? $ps_post_thumb_height : 360);
                        ?>
                        <div class="tab-pane fade <?php if($i == 1): ?> show active <?php endif; ?>" aria-labelledby="<?php echo esc_attr($tabs_id . '-label-' . ($tkeys + 1)); ?>" id="<?php echo esc_attr($tabs_id . '-' . ($tkeys + 1)); ?>" role="tabpanel">
                            <?php
                                if ($uiuxom_post->have_posts()):
                                    ?>
                                    <?php if($ps_proudct_view == 2): ?>
                                    <div class="productTabCarousleWrap woocommerce sliderNavPosition_<?php echo $ps_nav_position; ?>"
                                        data-autoplay="<?php echo($autoplay == 'yes' ? '1' : '0'); ?>"
                                        data-loop="<?php echo($loop == 'yes' ? '1' : '0'); ?>"
                                        data-nav="<?php echo($nav == 'yes' ? '1' : '0'); ?>"
                                        data-dots="<?php echo($dots == 'yes' ? '1' : '0'); ?>"
                                        data-gapping="<?php echo esc_attr($ps_items_gapping); ?>"
                                        data-itemxl="<?php echo esc_attr($ps_xl_col); ?>"
                                        data-itemlg="<?php echo esc_attr($ps_lg_col); ?>"
                                        data-itemmd="<?php echo esc_attr($ps_md_col); ?>"
                                        data-itemsm="<?php echo esc_attr($ps_sm_col); ?>" 
                                    >
                                    <div class="productTabCarousle owl-carousel">
                                    <?php else: ?>
                                    <div class="row productTabrow productGridRow woocommerce">
                                    <?php endif; ?>
                                        <?php
                                        while ($uiuxom_post->have_posts()):
                                            $uiuxom_post->the_post();
                                            $product = wc_get_product(get_the_ID());
                                            
                                            $_secondary_image = fw_get_db_post_option(get_the_ID(), '_product_img_2', array());
                                            $_secondary_image_id = (isset($_secondary_image['attachment_id']) && $_secondary_image['attachment_id'] > 0 ? $_secondary_image['attachment_id'] : get_post_thumbnail_id(get_the_ID()));
                                
                                            ?>
                                            <?php if($ps_proudct_view != 2): ?>
                                            <div class="productTabcolumn col-xl-<?php echo round(12 / $ps_xl_col); ?> col-lg-<?php echo round(12 / $ps_lg_col); ?> col-md-<?php echo round(12 / $ps_md_col); ?> col-sm-<?php echo round(12 / $ps_sm_col); ?>">
                                            <?php endif; ?>
                                                <div <?php wc_product_class('uiuxomProductWrapper', $product); ?>>
                                                    <div class="productItem01 <?php echo esc_attr((get_option('woocommerce_enable_review_rating') === 'yes' && $product->get_review_count() > 0 ? '' : 'pi01NoRating')); ?>">
                                                        <div class="pi01Thumb">
                                                            <img src="<?php echo ulina_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                                                            <img src="<?php echo ulina_attachment_url($_secondary_image_id, $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                                                            <div class="pi01Actions">
                                                                <?php if($product->is_type( 'variable' ) && ulina_plugin_active('wcboost-variation-swatches')): ?> 
                                                                    <?php if(function_exists('ulina_variable_add_to_cart')){ ulina_variable_add_to_cart(); } ?>
                                                                <?php else: ?>
                                                                    <?php if(function_exists('ulina_add_to_cart')){ ulina_add_to_cart(); } ?>
                                                                <?php endif; ?>
                                                                <?php if ($ps_show_quickview == 'yes'): ?>
                                                                    <?php function_exists('ulina_quick_view') ? ulina_quick_view(get_the_ID()) : '' ?>
                                                                <?php endif; ?>
                                                                <?php if (shortcode_exists('yith_wcwl_add_to_wishlist') && $ps_show_wishlist == 'yes'): ?>
                                                                    <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                                                                <?php endif; ?>
                                                            </div>
                                                            <?php if($ps_show_flashlabels == 'yes'): ?>
                                                                <?php echo ulina_product_flash_notice_label(get_the_ID()); ?>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="pi01Details">
                                                            <?php if (get_option('woocommerce_enable_review_rating') === 'yes' && $product->get_review_count() > 0) : ?>
                                                            <div class="productRatings">
                                                                <div class="productRatingWrap">
                                                                    <?php if (function_exists('woocommerce_template_loop_rating')): ?>
                                                                        <?php echo woocommerce_template_loop_rating(); ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <?php if($ps_show_review_count == 'yes'): ?>
                                                                    <div class="ratingCounts"><?php echo esc_html($product->get_review_count()) ?> <?php echo esc_html($ps_reviw_suffice); ?></div>
                                                                <?php endif; ?>
                                                            </div>
                                                            <?php endif; ?>
                                                            <h3><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a></h3>
                                                            <div class="pi01Price">
                                                                <?php echo $product->get_price_html(); ?>
                                                            </div>
                                                            <?php if($product->is_type( 'variable' ) && ulina_plugin_active('wcboost-variation-swatches')): ?> 
                                                                <?php if(function_exists('display_variation_dropdown')): display_variation_dropdown(); endif; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php if($ps_proudct_view != 2): ?>
                                            </div>
                                            <?php
                                            endif;
                                        endwhile;
                                        ?>
                                        <?php if($ps_proudct_view == 2): ?></div><?php endif; ?>
                                    </div>
                                <?php else: ?>
                                    <div class="alert alert-info" role="alert">
                                        <?php echo esc_html__('No data found!', 'uiuxom'); ?>
                                    </div>
                                <?php endif;
                                wp_reset_postdata();
                            ?>
                        </div>
                        <?php
                        $i++;
                    endif;
                endforeach;
            echo '</div>';
        endif;
    ?>
</div>