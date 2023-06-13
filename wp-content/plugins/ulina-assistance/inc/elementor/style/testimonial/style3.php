<div class="row testimonialGridRow">
    <?php 
        if(!empty($testimony_list)):
            foreach($testimony_list as $ts):
                $rating        = (isset($ts['rating']) ? $ts['rating'] : 0);
                $quote        = (isset($ts['quote']) ? $ts['quote'] : '');
                $au_img       = (isset($ts['au_img']['id']) && $ts['au_img']['id'] > 0) ? $ts['au_img']['id'] : '0';
                $title        = (isset($ts['title']) ? $ts['title'] : '');
                $designation  = (isset($ts['designation']) ? $ts['designation'] : '');

                if($quote != ''): ?>
                    <div class="col-xl-<?php echo round(12 / $grid_xl_col); ?> col-lg-<?php echo round(12 / $grid_lg_col); ?> col-md-<?php echo round(12 / $grid_md_col); ?>">
                        <?php if($testimonial_view == 2): ?>
                            <div class="testimonialItem01 ti01Mode2">
                                <div class="ti01Header clearfix">
                                    <i class="ulina-quote"></i>
                                    <div class="ti01Rating float-end">
                                        <?php if($rating > 0): ?>
                                            <?php
                                                $ratingIntVal = $ratings = intval($rating);
                                                if($ratingIntVal > 0):
                                                    echo str_repeat('<i class="ulina-star1"></i>', $ratingIntVal);
                                                endif;
                                                if($rating > $ratingIntVal):
                                                    echo '<i class="ulina-star-half-stroke1"></i>';
                                                    $ratings += 1;
                                                endif;
                                                if($ratings < 5):
                                                    echo str_repeat('<i class="ulina-star"></i>', (5 - $ratings));
                                                endif;
                                            ?>
                                        <?php else: ?>
                                            <?php echo str_repeat('<i class="ulina-star1"></i>', 5); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="ti01Content">
                                    <?php echo wp_strip_all_tags($quote); ?>
                                </div>
                                <div class="ti01Author">
                                    <img src="<?php echo ulina_attachment_url($au_img, 60, 60); ?>" alt="<?php echo esc_attr($title); ?>">
                                    <?php if(!empty($title)): ?>
                                    <h3><?php echo ulina_kses($title); ?></h3>
                                    <?php endif; ?>
                                    <?php if(!empty($designation)): ?>
                                    <span><?php echo ulina_kses($designation); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="testimonialItem01">
                                <div class="ti01Header clearfix">
                                    <i class="ulina-quote"></i>
                                    <div class="ti01Rating float-end">
                                        <?php if($rating > 0): ?>
                                            <?php
                                                $ratingIntVal = $ratings = intval($rating);
                                                if($ratingIntVal > 0):
                                                    echo str_repeat('<i class="ulina-star1"></i>', $ratingIntVal);
                                                endif;
                                                if($rating > $ratingIntVal):
                                                    echo '<i class="ulina-star-half-stroke1"></i>';
                                                    $ratings += 1;
                                                endif;
                                                if($ratings < 5):
                                                    echo str_repeat('<i class="ulina-star"></i>', (5 - $ratings));
                                                endif;
                                            ?>
                                        <?php else: ?>
                                            <?php echo str_repeat('<i class="ulina-star"></i>', 5); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="ti01Content">
                                    <?php echo wp_strip_all_tags($quote); ?>
                                </div>
                                <div class="ti01Author">
                                    <img src="<?php echo ulina_attachment_url($au_img, 60, 60); ?>" alt="<?php echo esc_attr($title); ?>">
                                    <?php if(!empty($title)): ?>
                                    <h3><?php echo ulina_kses($title); ?></h3>
                                    <?php endif; ?>
                                    <?php if(!empty($designation)): ?>
                                    <span><?php echo ulina_kses($designation); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif;
            endforeach;
        endif;
    ?>
</div>