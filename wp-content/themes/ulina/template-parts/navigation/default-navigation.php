<?php
/**
 * Displays Defeault header navigation
 */

$header_is_sticky = get_theme_mod('header_is_sticky', 2);
$header_logo      = get_theme_mod('header_logo', '');

?>

<!-- BEGIN: Header 01 Section -->
<header class="header01 dHead <?php echo esc_attr($header_is_sticky == 1 ? 'isSticky' : ''); ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="headerInner01">
                    <div class="logo">
                        <?php if (!empty($header_logo)): ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <img src="<?php echo esc_url($header_logo); ?>" alt="<?php echo get_bloginfo(); ?>"/>
                            </a>
                        <?php else: ?>
                            <a class="text" href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_bloginfo('name'); ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="mainMenu">
                    <?php
                        if (has_nav_menu('primary-menu')) {
                            wp_nav_menu(array(
                                'theme_location' => 'primary-menu',
                                'container'      => FALSE,
                                'menu_class'     => '',
                                'menu_id'        => '',
                                'echo'           => true
                            ));
                        } else {
                            echo '<ul>';
                                echo '<li><a href="javascript:void(0)">' . esc_html__('No Menu', 'ulina') . '</a></li>';
                            echo '</ul>';
                        }
                    ?>
                    </div>
                    <a href="javascript:void(0);" class="menuToggler"><i class="ulina-bars"></i> <span><?php echo esc_html__('Menu', 'ulina'); ?></span></a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END: Header 01 Section -->