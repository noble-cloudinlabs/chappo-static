<?php if ( !defined( 'FW' ) ) {	die( 'Forbidden' ); }
$options = array(
	'main' => array(
		'title'   => false,
		'type'    => 'box',
		'options' => array(
                        'post_banner_setting' => array(
                                'title' => esc_html__('Banner Settings', 'ulina'),
                                'type' => 'tab',
                                'options' => array(
                                        'blog_si_is_settings'                    => array(
                                                'label'        => esc_html__( 'Enable Settings', 'ulina' ),
                                                'type'         => 'switch',
                                                'right-choice' => array(
                                                        'value' => '1',
                                                        'label' => esc_html__( 'Yes', 'ulina' )
                                                ),
                                                'left-choice'  => array(
                                                        'value' => '2',
                                                        'label' => esc_html__( 'No', 'ulina' )
                                                ),
                                                'value'        => '2',
                                                'desc'         => esc_html__('Do you want to use those settings for single post banner instead of customizer global settings? Then turn it to Yes.', 'ulina'),
                                        ),
                                        'blog_si_is_banner'                    => array(
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
                                                'desc'         => esc_html__('Do you want to hide banner? Then turn it to Hide.', 'ulina'),
                                        ),
                                        'blog_si_banner_bg'	 => array(
                                                'type'	 => 'upload',
                                                'label'	 => esc_html__( 'Banner BG IMG', 'ulina' ),
                                                'desc'	 => esc_html__( 'Upload your page banner bg image.', 'ulina' ),
                                        ),
                                        'blog_si_banner_bg_color'	 => array(
                                                'type'          => 'rgba-color-picker',
                                                'value'         => '',
                                                'palettes'      => array(),
                                                'label' => esc_html__('Banner BG Color', 'ulina'),
                                                'desc'  => esc_html__('Insert your custom banner BG color.', 'ulina'),
                                        ),
                                        'blog_si_banner_title'		 => array(
                                                'type'		 => 'text',
                                                'value'		 => '',
                                                'label'		 => esc_html__( 'Banner Title', 'ulina' ),
                                                'desc'		 => esc_html__( 'Insert your page banner title.', 'ulina' ),
                                        ),
                                        'blog_si_banner_alignment'              => array(
                                                'label'   => esc_html__( 'Banner Alignment', 'ulina' ),
                                                'type'    => 'short-select',
                                                'value'   => 'center',
                                                'desc'    => esc_html__( 'Select your page banner content alignment.', 'ulina' ),
                                                'choices' => array(
                                                        'left'      => esc_html__( 'Left', 'ulina' ),
                                                        'center'    => esc_html__( 'Center', 'ulina' ),
                                                        'right'     => esc_html__( 'Right', 'ulina' ),
                                                ),
                                        ),
                                )
                        ),
			'_post_meta' => array(
                                'title'		 => esc_html__( 'Template And Content Settings', 'ulina' ),
                                'type'		 => 'tab',
                                'options'	 => array(
                                        'blog_si_is_content_enable'                    => array(
                                                'label'        => esc_html__( 'Enable Settings', 'ulina' ),
                                                'type'         => 'switch',
                                                'right-choice' => array(
                                                        'value' => '1',
                                                        'label' => esc_html__( 'Yes', 'ulina' )
                                                ),
                                                'left-choice'  => array(
                                                        'value' => '2',
                                                        'label' => esc_html__( 'No', 'ulina' )
                                                ),
                                                'value'        => '2'
                                        ),
                                        'blog_si_post_sidebar'              => array(
                                                'label'   => esc_html__( 'Sidebar Position', 'ulina' ),
                                                'type'    => 'short-select',
                                                'value'   => '3',
                                                'desc'    => esc_html__( 'Select your post sidebar position.', 'ulina' ),
                                                'choices' => array(
                                                        '1'      => esc_html__('None','ulina'),
                                                        '2'      => esc_html__('Left','ulina'),
                                                        '3'      => esc_html__('Right','ulina'),
                                                ),
                                        ),
                                        'blog_si_is_tag'                    => array(
                                                'label'        => esc_html__( 'Is Tags?', 'ulina' ),
                                                'type'         => 'switch',
                                                'right-choice' => array(
                                                        'value' => '1',
                                                        'label' => esc_html__( 'Show', 'ulina' )
                                                ),
                                                'left-choice'  => array(
                                                        'value' => '2',
                                                        'label' => esc_html__( 'Hide', 'ulina' )
                                                ),
                                                'value'        => '1'
                                        ),
                                        'blog_si_is_share'                    => array(
                                                'label'        => esc_html__( 'Is Share?', 'ulina' ),
                                                'type'         => 'switch',
                                                'right-choice' => array(
                                                        'value' => '1',
                                                        'label' => esc_html__( 'Show', 'ulina' )
                                                ),
                                                'left-choice'  => array(
                                                        'value' => '2',
                                                        'label' => esc_html__( 'Hide', 'ulina' )
                                                ),
                                                'value'        => '2'
                                        ),
                                        'blog_si_socials'                    => array(
                                                'label'        => esc_html__( 'Select Social Media', 'ulina' ),
                                                'type'         => 'checkboxes',
                                                'value'        => array(),
                                                'choices'      => array(
                                                        '1'   => esc_html__( 'Facebook', 'ulina' ),
                                                        '2'   => esc_html__( 'Twitter', 'ulina' ),
                                                        '3'   => esc_html__( 'Email', 'ulina' ),
                                                        '4'   => esc_html__( 'LinkedIn', 'ulina' ),
                                                        '5'   => esc_html__( 'Pinterest', 'ulina' ),
                                                        '6'   => esc_html__( 'Whatsapp', 'ulina' ),
                                                        '7'   => esc_html__( 'Digg', 'ulina' ),
                                                        '8'   => esc_html__( 'Tumblr', 'ulina' ),
                                                        '9'   => esc_html__( 'Reddit', 'ulina' ),
                                                )
                                        ),
                                        'blog_si_is_pagination'                    => array(
                                                'label'        => esc_html__( 'Is Post Pagination?', 'ulina' ),
                                                'type'         => 'switch',
                                                'right-choice' => array(
                                                        'value' => '1',
                                                        'label' => esc_html__( 'Show', 'ulina' )
                                                ),
                                                'left-choice'  => array(
                                                        'value' => '2',
                                                        'label' => esc_html__( 'Hide', 'ulina' )
                                                ),
                                                'value'         => '2'
                                        ),
                                        'blog_si_is_author_box'                    => array(
                                                'label'        => esc_html__( 'Is Author Box?', 'ulina' ),
                                                'type'         => 'switch',
                                                'right-choice' => array(
                                                        'value' => '1',
                                                        'label' => esc_html__( 'Show', 'ulina' )
                                                ),
                                                'left-choice'  => array(
                                                        'value' => '2',
                                                        'label' => esc_html__( 'Hide', 'ulina' )
                                                ),
                                                'value'         => '2'
                                        ),
                                ),
                        ),
		),
	),
);
