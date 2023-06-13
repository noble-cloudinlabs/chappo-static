<?php

$options = array(
        'blog_cat_is_settings'                    => array(
                'label'        => esc_html__( 'Enable Settings', 'ulina' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Show', 'ulina' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'Hide', 'ulina' )
                ),
                'value'        => '2',
                'desc'         => esc_html__('If you enable settings here for this category then Base Category Banner Settings will override by those individual settings.', 'ulina'),
        ),
        'blog_cat_is_banner'                    => array(
                'label'        => esc_html__( 'Is Banner', 'ulina' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Show', 'ulina' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'Hide', 'ulina' )
                ),
                'value'        => '1',
                'desc'         => esc_html__('Sect this category page banner informations.', 'ulina'),
        ),
        'blog_cat_banner_bg'	 => array(
                'type'	 => 'upload',
                'label'	 => esc_html__( 'Banner BG IMG', 'ulina' ),
                'desc'	 => esc_html__( 'Upload your page banner bg image and this only work for this category.', 'ulina' ),
        ),
        'blog_cat_banner_color'	 => array(
                'type'  => 'rgba-color-picker',
                'value' => '',
                'palettes' => array(),
                'label' => esc_html__('Banner BG Color', 'ulina'),
                'desc'  => esc_html__('Insert your custom banner BG color color in RGBA mode and this only work for this category.', 'ulina'),
        ),
        'blog_cat_banner_title'		 => array(
                'type'		 => 'text',
                'value'		 => '',
                'label'		 => esc_html__( 'Banner Title', 'ulina' ),
                'desc'		 => esc_html__( 'Insert your page banner title.', 'ulina' ),
        ),
        'blog_cat_is_breadcrumb'                    => array(
                'label'        => esc_html__( 'Is Breadcrumb?', 'ulina' ),
                'type'         => 'switch',
                'right-choice' => array(
                        'value' => '1',
                        'label' => esc_html__( 'Yes', 'ulina' )
                ),
                'left-choice'  => array(
                        'value' => '2',
                        'label' => esc_html__( 'No', 'ulina' )
                ),
                'value'        => '1',
                'desc'         => esc_html__('Do you want to show breadcrumb on page banner?', 'ulina'),
        ),
        'blog_cat_banner_alignment'              => array(
                'label'   => esc_html__( 'Banner Alignment', 'ulina' ),
                'type'    => 'short-select',
                'value'   => 'center',
                'desc'    => esc_html__( 'Select your category banner text alignment.', 'ulina' ),
                'choices' => array(
                        'left'         => esc_html__( 'Left', 'ulina' ),
                        'center'       => esc_html__( 'Center', 'ulina' ),
                        'right'        => esc_html__( 'Right', 'ulina' ),
                ),
        ),
);