<?php
/* 
 * Theme Init File
 */

/* * ---------------------------------------------------------------
* Include Files
* -------------------------------------------------------------* */
require_once get_parent_theme_file_path('/inc/helper.php');
require_once get_parent_theme_file_path('/inc/hooks.php');
if (class_exists('woocommerce')) {
    require_once get_parent_theme_file_path().'/inc/woocommerce.php';
}

/* * ---------------------------------------------------------------
* Option Framework
* -------------------------------------------------------------* */
require_once get_parent_theme_file_path('/framework-customizations/customizer/customizer-config.php');
/* * ---------------------------------------------------------------
* TGM Include
* -------------------------------------------------------------* */
require_once get_parent_theme_file_path('/inc/lib/class-tgm-plugin-activation.php');