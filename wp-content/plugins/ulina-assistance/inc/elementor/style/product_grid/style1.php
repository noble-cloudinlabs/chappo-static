<?php
$wp_querys = new WP_Query($query_args);
$w = ($ps_post_thumb_width > 0 ? $ps_post_thumb_width : 312);
$h = ($ps_post_thumb_height > 0 ? $ps_post_thumb_height : 360);

if ($wp_querys->have_posts()):
    ?>
    <div class="productGridWrapper">
        <div class="row productGridRow woocommerce">
            <?php
            while ($wp_querys->have_posts()):
                $wp_querys->the_post();
                $product = wc_get_product(get_the_ID());

                $_secondary_image = fw_get_db_post_option(get_the_ID(), '_product_img_2', array());
                $_secondary_image_id = (isset($_secondary_image['attachment_id']) && $_secondary_image['attachment_id'] > 0 ? $_secondary_image['attachment_id'] : get_post_thumbnail_id(get_the_ID()));

                ?>
                <div class="col-xl-<?php echo round(12 / $ps_xl_col); ?> col-lg-<?php echo round(12 / $ps_lg_col); ?> col-md-<?php echo round(12 / $ps_md_col); ?> col-sm-<?php echo round(12 / $ps_sm_col); ?>">
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
                </div>
                <?php
            endwhile;
            ?>
        </div>
        <?php if($ps_show_pagination == 'yes'): ?>
            <div class="row shopPaginationRow">
                <div class="col-lg-12 text-<?php echo $ps_pagin_alignment; ?>">
                    <?php if($ps_pagin_type == 2): ?>
                        <a href="javascript:void(0);" data-page="1" data-view='<?php echo wp_json_encode($view_params) ?>' data-query='<?php echo wp_json_encode($query_args); ?>' class="ulinaBTN2 shopAjaxLoader01 shopLoadMore"><?php echo esc_html($ps_load_more_label); ?></a>
                    <?php else: ?>
                        <?php
                            the_posts_pagination(
                                array(
                                    'prev_text'        => ulina_kses('<i class="ulina-angle-left"></i>'),
                                    'next_text'        => ulina_kses('<i class="ulina-angle-right"></i>'),
                                    'before_page_number' => '',
                                    'type'               => 'array',
                                    'class'             => 'shopPagination'
                                )
                            );
                        ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php endif;
wp_reset_postdata();