<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Do not proceed if Kirki does not exist.
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_config( 'ulina_customizer', array(
	'capability'  => 'edit_theme_options',
	'option_type' => 'theme_mod',
) );


function ulina_customizer_sections($wp_customize){
    $wp_customize->add_panel( 'theme_option', array(
        'priority'    => 10,
        'title'       => esc_html__( 'Theme Options', 'ulina' ),
    ) );

    $wp_customize->add_section( 'general_section', array(
            'title'                 => esc_html__( 'General Settings', 'ulina' ),
            'priority'              => 1,
            'description'           => esc_html__( 'to change site loader and google map api.', 'ulina' ),
            'panel'                 => 'theme_option',
    ) );

    $wp_customize->add_section( 'font_section', array(
            'title'                 => esc_html__( 'Typography Settings', 'ulina' ),
            'priority'              => 2,
            'description'           => esc_html__( 'Setup your site typography.', 'ulina' ),
            'panel'                 => 'theme_option',
    ));

    $wp_customize->add_section( 'colorpreset_section', array(
            'title'                 => esc_html__( 'Color Preset Settings', 'ulina' ),
            'priority'              => 3,
            'description'           => esc_html__( 'Setup your site accent color.', 'ulina' ),
            'panel'                 => 'theme_option',
    ));

    $wp_customize->add_section( 'header_settings', array(
            'title'                 => esc_html__( 'Header Settings', 'ulina' ),
            'priority'              => 4,
            'description'           => esc_html__( 'Setup your site header.', 'ulina' ),
            'panel'                 => 'theme_option',
    ) );

    $wp_customize->add_section( 'header_styling', array(
            'title'                 => esc_html__( 'Header Styling', 'ulina' ),
            'priority'              => 5,
            'description'           => esc_html__( 'Style up your site header.', 'ulina' ),
            'panel'                 => 'theme_option',
    ));

    $wp_customize->add_section( 'shop_settings', array(
            'title'                 => esc_html__( 'Shop Settings', 'ulina' ),
            'priority'              => 5,
            'description'           => esc_html__( 'Setup your shop pages.', 'ulina' ),
            'panel'                 => 'theme_option',
    ));

    $wp_customize->add_section( 'quickview_settings', array(
            'title'                 => esc_html__( 'Quick View Settings', 'ulina' ),
            'priority'              => 5,
            'description'           => esc_html__( 'Setup product quick view popup.', 'ulina' ),
            'panel'                 => 'theme_option',
    ));

    $wp_customize->add_section( 'shop_category_settings', array(
            'title'                 => esc_html__( 'Shop Category Settings', 'ulina' ),
            'priority'              => 5,
            'description'           => esc_html__( 'Setup your shop category page.', 'ulina' ),
            'panel'                 => 'theme_option',
    ));

    $wp_customize->add_section( 'shop_tag_settings', array(
            'title'                 => esc_html__( 'Shop Tag Settings', 'ulina' ),
            'priority'              => 5,
            'description'           => esc_html__( 'Setup your shop tag page.', 'ulina' ),
            'panel'                 => 'theme_option',
    ));

    $wp_customize->add_section( 'shop_brand_settings', array(
            'title'                 => esc_html__( 'Shop Brand Settings', 'ulina' ),
            'priority'              => 5,
            'description'           => esc_html__( 'Setup your shop brand page.', 'ulina' ),
            'panel'                 => 'theme_option',
    ));

    $wp_customize->add_section( 'shop_collection_settings', array(
            'title'                 => esc_html__( 'Shop Collection Settings', 'ulina' ),
            'priority'              => 5,
            'description'           => esc_html__( 'Setup your shop Collection page.', 'ulina' ),
            'panel'                 => 'theme_option',
    ));

    $wp_customize->add_section( 'shop_search_settings', array(
            'title'                 => esc_html__( 'Shop Search Settings', 'ulina' ),
            'priority'              => 5,
            'description'           => esc_html__( 'Setup your shop search result page banner.', 'ulina' ),
            'panel'                 => 'theme_option',
    ));

    $wp_customize->add_section( 'shop_product_settings', array(
            'title'                 => esc_html__( 'Product Settings', 'ulina' ),
            'priority'              => 5,
            'description'           => esc_html__( 'Setup your product details page here.', 'ulina' ),
            'panel'                 => 'theme_option',
    ));

    $wp_customize->add_section( 'blog_settings', array(
            'title'                 => esc_html__( 'Blog Settings', 'ulina' ),
            'priority'              => 6,
            'description'           => esc_html__( 'Setup your blog pages.', 'ulina' ),
            'panel'                 => 'theme_option',
    ) );

    $wp_customize->add_section( 'blog_single_settings', array(
            'title'			=> esc_html__( 'Blog Single Settings', 'ulina' ),
            'priority'              => 7,
            'description'           => esc_html__( 'Setup your blog details pages.', 'ulina' ),
            'panel'                 => 'theme_option',
    ) );

    $wp_customize->add_section( 'blog_others_settings', array(
            'title'                 => esc_html__( 'Blog Others Banner Settings', 'ulina' ),
            'priority'              => 9,
            'description'           => esc_html__( 'Setup your blog related others pages banner ( Search, Archive).', 'ulina' ),
            'panel'                 => 'theme_option',
    ) );

    $wp_customize->add_section( 'page_settings', array(
            'title'                 => esc_html__( 'Page Settings', 'ulina' ),
            'priority'              => 20,
            'description'           => esc_html__( 'Setup your page global options.', 'ulina' ),
            'panel'                 => 'theme_option',
    ));

    $wp_customize->add_section( 'footer_settings', array(
            'title'                 => esc_html__( 'Footer Settings', 'ulina' ),
            'priority'              => 22,
            'description'           => esc_html__( 'Setup your site footer here.', 'ulina' ),
            'panel'                 => 'theme_option',
    ));

    $wp_customize->add_section( 'fof_section', array(
            'title' 		    => esc_html__( '404 Settings', 'ulina' ),
            'priority'              => 23,
            'description'           => esc_html__( 'Setting up your 404 page.', 'ulina' ),
            'panel'                 => 'theme_option',
    ));
}

add_action( 'customize_register', 'ulina_customizer_sections' );

require ULINA_CUSTOMIZER_DIR . 'customizer-fields.php' ;

