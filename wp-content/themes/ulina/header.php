<?php
/**
 * The header for our theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 
    wp_body_open(); 

    echo(function_exists('ulina_preloader_creator') ? ulina_preloader_creator() : ''); 
    get_template_part('template-parts/navigation/default-navigation');

?>
