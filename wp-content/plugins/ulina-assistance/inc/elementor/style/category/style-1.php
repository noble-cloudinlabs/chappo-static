<?php if (!empty($cat_list)): ?>
    <div class="categoryCarouselWrap sliderNavPosition_<?php echo $cat_nav_position; ?>"
        data-autoplay="<?php echo($cat_slide_autoplay == 'yes' ? '1' : '0'); ?>"
        data-loop="<?php echo($cat_slide_loop == 'yes' ? '1' : '0'); ?>"
        data-nav="<?php echo($cat_slide_nav == 'yes' ? '1' : '0'); ?>"
        data-dots="<?php echo($cat_slide_dots == 'yes' ? '1' : '0'); ?>"
        data-gapping="<?php echo esc_attr($cat_items_gapping); ?>"
        data-itemxl="<?php echo esc_attr($cat_xl_col); ?>"
        data-itemlg="<?php echo esc_attr($cat_lg_col); ?>"
        data-itemmd="<?php echo esc_attr($cat_md_col); ?>"
        data-itemsm="<?php echo esc_attr($cat_sm_col); ?>"
        >
        <div class="categoryCarousel owl-carousel">
            <?php
            foreach ($cat_list as $cl):
                $cat_list_category = (isset($cl['cat_list_category']) && $cl['cat_list_category'] > 0 ? $cl['cat_list_category'] : '');
                $list_cat_image = (isset($cl['list_cat_image']) && !empty($cl['list_cat_image']) ? $cl['list_cat_image'] : array());
                $list_thumbnail_id = (isset($list_cat_image['id']) && $list_cat_image['id'] > 0 ? $list_cat_image['id'] : 0);
                $list_cat_title = (isset($cl['list_cat_title']) && !empty($cl['list_cat_title']) ? $cl['list_cat_title'] : '');
                $cat_list_count = (isset($cl['cat_list_count']) && !empty($cl['cat_list_count']) ? $cl['cat_list_count'] : '');
                $list_cat_count_suffix = (isset($cl['list_cat_count_suffix']) && !empty($cl['list_cat_count_suffix']) ? $cl['list_cat_count_suffix'] : '');
                $list_cat_btn_url = (isset($cl['list_cat_btn_url']) && !empty($cl['list_cat_btn_url']) ? $cl['list_cat_btn_url'] : array());
                $list_cat_btn_url = (isset($list_cat_btn_url['url']) && $list_cat_btn_url['url'] != '') ? $list_cat_btn_url['url'] : '';

                if ($cat_list_category > 0):
                    $category     = get_term_by('id', $cat_list_category, 'product_cat');
                    $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);

                    $list_thumbnail_id = ($list_thumbnail_id > 0 ? $list_thumbnail_id : $thumbnail_id);
                    $list_cat_title = ($list_cat_title != '' ? $list_cat_title : $category->name);
                    $list_cat_btn_url = ($list_cat_btn_url != '' ? $list_cat_btn_url : get_category_link($category->term_id));
                    $cat_list_count = ($cat_list_count != '' ? $cat_list_count : $category->count);
                endif;
                
                $w = ($cat_mode == 2 ? 190 : 306);
                $h = ($cat_mode == 2 ? 190 : 235);
                ?>
                <div class="categoryItem01 <?php echo ($cat_mode == 2 ? 'ci01Mode2' : ''); ?> text-<?php echo $cat_box_alignment; ?>">
                    <div class="ci01Thumb">
                        <img src="<?php echo ulina_attachment_url($list_thumbnail_id, $w, $h) ?>" alt="<?php echo esc_attr($list_cat_title); ?>">
                    </div>
                    <h3><a href="<?php echo esc_url($list_cat_btn_url) ?>"><?php echo ulina_kses($list_cat_title) ?></a></h3>
                    <p><?php echo $cat_list_count.' '.$list_cat_count_suffix; ?></p>
                </div>
            <?php
            endforeach;
            ?>
       </div>
    </div>
<?php else: ?>
    <div class="alert alert-warning" role="alert">
        <strong><?php echo esc_html__('Oops!  Not items inserted.', 'uiuxom'); ?></strong><?php echo esc_html__('Items not found', 'uiuxom') ?>
    </div>
<?php endif; ?>

