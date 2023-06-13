<?php if($is_topbar == 'yes'): ?>
<!-- BEGIN: Topbar Section -->
<section class="topbarSection">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-6">
                <div class="tbInfo">
                    <i class="<?php echo esc_attr($info_icons); ?>"></i> <?php echo esc_html($tp_info); ?>
                    <a href="<?php echo esc_url($info_url); ?>" class="ulinaLink"><i class="<?php echo esc_attr($info_link_icons); ?>"></i><?php echo esc_html($tp_link_info); ?></a>
                </div>
            </div>
            <div class="col-sm-4 col-md-6">
                <div class="tbAccessNav">
                    <?php if (!empty($s2_list)):?>
                    <div class="anSocial">
                        <?php foreach ($s2_list as $sl):
                        $s2_icons = (isset($sl['s2_icons']) ? $sl['s2_icons'] : '');
                        $s2_url   = (isset($sl['s2_url']['url']) ? $sl['s2_url']['url'] : '');
                        $s2_color = (isset($sl['s2_color']) ? $sl['s2_color'] : '');
                        $ib       = ($s2_color != '' ? 'color: '.$s2_color.';' : '');
                        $target   = $sl['s2_url']['is_external'] ? ' target="_blank"' : '';
                        $nofollow = $sl['s2_url']['nofollow'] ? ' rel="nofollow"' : '';
                        if ($s2_icons != ''):
                            ?>
                            <a style="<?php echo esc_attr($ib); ?>" <?php echo esc_attr($target . ' ' . $nofollow); ?> href="<?php echo esc_url($s2_url); ?>"><i class="<?php echo esc_attr($s2_icons); ?>"></i></a>
                        <?php
                        endif;
                        endforeach; ?>
                    </div>
                    <?php endif; ?>
                    <?php if($is_language == 'yes' || $is_currency == 'yes'): ?>
                    <div class="anSelects">
                        <?php if($is_language2 == 'yes' && shortcode_exists('wpml_language_switcher')): ?>
                        <div class="anSelect">
                            <?php echo do_shortcode('[wpml_language_switcher type="widget" flags="'.$is_language_flag2.'"][/wpml_language_switcher]'); ?>
                        </div>
                        <?php endif; ?>
                        <?php if($is_currency2 == 'yes' && shortcode_exists('currency_switcher')): ?>
                        <div class="anSelect">
                            <?php echo do_shortcode('[currency_switcher format="%code%"]'); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row"><div class="col-lg-12"><div class="tbBar"></div></div></div>
    </div>
</section>
<!-- END: Topbar Section -->
<?php endif; ?>

<!-- BEGIN: Header 02 Section -->
<header class="header01 h01Mode2 <?php if ($is_sticky == 'yes'): ?>isSticky<?php endif; ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="headerInner02">
                    <div class="logo">
                        <?php if (!empty($logo)): ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <img src="<?php echo esc_url($logo); ?>" alt="<?php echo get_bloginfo(); ?>"/>
                            </a>
                        <?php else: ?>
                            <a class="text" href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_bloginfo('name'); ?></a>
                        <?php endif; ?>
                    </div>
                    <nav class="mainMenu">
                        <?php
                        if (has_nav_menu('primary-menu')) {
                            wp_nav_menu(array(
                                'theme_location' => 'primary-menu',
                                'container' => FALSE,
                                'menu_class' => '',
                                'menu_id' => '',
                                'echo' => true
                            ));
                        } else {
                            if(is_user_logged_in()){
                            echo '<ul>';
                                echo '<li><a href="javascript:void(0)">' . esc_html__('No Menu', 'uiuxom') . '</a></li>';
                            echo '</ul>';
                            }
                        }
                        ?>
                    </nav>
                    <div class="accessNav">
                        <a href="javascript:void(0);" class="menuToggler"><i class="ulina-bars"></i> <span><?php echo esc_html__('Menu', 'uiuxom') ?></span></a>
                        <div class="anItems">
                            <?php if($is_search_btn == 'yes'): ?>
                                <div class="anSearch"><a href="javascript:void(0);"><i class="ulina-magnifying-glass"></i></a></div>
                            <?php endif; ?>
                            <?php if($is_login2 == 'yes' && class_exists('woocommerce')):
                                $mycc = get_option('woocommerce_myaccount_page_id'); ?>
                                <div class="anUser"><a href="<?php echo esc_url(get_the_permalink($mycc)); ?>"><i class="ulina-user1"></i></a></div>
                            <?php endif; ?>
                            <?php if($is_wishlist == 'yes' && class_exists('YITH_WCWL')): ?>
                                <div class="anWish"><a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>" class="halWishlist"><i class="ulina-heart1"></i></a></div>
                            <?php endif; ?>
                            <?php if ($is_cart == 'yes' && class_exists('woocommerce')): global $woocommerce; ?>
                                <div class="anCart">
                                    <a class="halCart ulina_aj_cart" href="javascript:void(0);"><i class="ulina-cart-shopping"></i><span><?php echo Uiuxom_Assistance_Helpers::mini_cart_count(); ?></span></a>
                                    <?php if($is_mini_cart == 'yes'): ?>
                                    <div class="cartWidgetArea">
                                        <div class="mini_cart widget_shopping_cart_content">
                                            <?php
                                            if(function_exists('woocommerce_mini_cart')):
                                                if ( ! empty( WC()->cart) ) {
                                                    woocommerce_mini_cart(); 
                                                }
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END: Header 02 Section -->
<?php if($is_search_btn == 'yes'): ?>
<!-- BEGIN: PopUp Search Section -->
<section class="popup_search_sec">
    <div class="popup_search_overlay"></div>
    <div class="pop_search_background">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="popup_logo">
                        <?php if (!empty($popup_logo)): ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <img src="<?php echo esc_url($popup_logo); ?>" alt="<?php echo get_bloginfo(); ?>"/>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="javascript:void(0);" id="search_Closer" class="search_Closer"></a>
                </div>
            </div>
        </div>
        <div class="middle_search">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="popup_search_form">
                            <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                <input type="search" name="s" placeholder="<?php if($input_placeholder != ''): echo esc_attr($input_placeholder); endif; ?>" value="<?php echo get_search_query(); ?>" autocomplete="off">
                                <button type="submit"><i class="ulina-magnifying-glass"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End PopUp Section -->
<?php endif; ?>