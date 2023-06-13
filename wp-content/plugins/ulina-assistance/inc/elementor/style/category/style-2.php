<?php if (!empty($cat_list)): ?>
    <div class="row categoryGridRow">
        <?php
        $cat_xl_col = ($cat_xl_col == 5 ? 4 : $cat_xl_col);
        $cat_lg_col = ($cat_lg_col == 5 ? 4 : $cat_lg_col);
        $cat_md_col = ($cat_md_col == 5 ? 4 : $cat_md_col);
        $cat_sm_col = ($cat_sm_col == 5 ? 4 : $cat_sm_col);
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
            <div class="col-xl-<?php echo round(12 / $cat_xl_col); ?> col-lg-<?php echo round(12 / $cat_lg_col); ?> col-md-<?php echo round(12 / $cat_md_col); ?> col-sm-<?php echo round(12 / $cat_sm_col); ?>">
                <div class="categoryItem01 <?php echo ($cat_mode == 2 ? 'ci01Mode2' : ''); ?> text-<?php echo $cat_box_alignment; ?>">
                    <div class="ci01Thumb">
                        <img src="<?php echo ulina_attachment_url($list_thumbnail_id, $w, $h) ?>" alt="<?php echo esc_attr($list_cat_title); ?>">
                    </div>
                    <h3><a href="<?php echo esc_url($list_cat_btn_url) ?>"><?php echo ulina_kses($list_cat_title) ?></a></h3>
                    <p><?php echo $cat_list_count.' '.$list_cat_count_suffix; ?></p>
                </div>
            </div>
        <?php
        endforeach;
        ?>
   </div>
<?php else: ?>
    <div class="alert alert-warning" role="alert">
        <strong><?php echo esc_html__('Oops! Not items inserted.', 'uiuxom'); ?></strong><?php echo esc_html__('Items not found', 'uiuxom') ?>
    </div>
<?php endif; ?>

