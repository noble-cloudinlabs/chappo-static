<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Testimonial_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'uiuxom-testimonial';
    }
    public function get_title() {
        return esc_html__( 'Testimonial', 'uiuxom' );
    }

    public function get_icon() {
        return 'eicon-testimonial';
    }

    public function get_categories() {
        return [ 'uiuxom-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section( 'section_tab_1', [
                'label' => esc_html__( 'Testimonial', 'uiuxom' ),
            ]
        );
                $this->add_control( 'testimonial_style', [
                                'label'     => esc_html__( 'Testimonial Style', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => 1,
                                'options'   => [
                                        1       => esc_html__( 'Pertial Slider', 'uiuxom' ),
                                        2       => esc_html__( 'Full Width Slider', 'uiuxom' ),
                                        3       => esc_html__( 'Grid View', 'uiuxom' ),
                                ],
                        ]
                );
                $this->add_control( 'testimonial_view', [
                                'label'     => esc_html__( 'View Style', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => 1,
                                'options'   => [
                                        1       => esc_html__( 'Style 01', 'uiuxom' ),
                                        2       => esc_html__( 'Style 02', 'uiuxom' ),
                                ],
                        ]
                );
                $this->add_control( 'grid_xl_col', [
                                'label'     => esc_html__( 'Select XL Col', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => '3',
                                'options'   => [
                                        '2'       => esc_html__( '2 Column', 'uiuxom' ),
                                        '3'       => esc_html__( '3 Column', 'uiuxom' ),
                                        '4'       => esc_html__( '4 Column', 'uiuxom' ),
                                ],
                                'conditions'        => [
                                        'terms'         => [
                                                [
                                                        'name'      => 'testimonial_style',
                                                        'operator'  => '==',
                                                        'value'     => '3',
                                                ]
                                        ],
                                ],
                        ]
                );
                $this->add_control( 'grid_lg_col', [
                                'label'     => esc_html__( 'Select LG Col', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => '3',
                                'options'   => [
                                        '2'       => esc_html__( '2 Column', 'uiuxom' ),
                                        '3'       => esc_html__( '3 Column', 'uiuxom' ),
                                        '4'       => esc_html__( '4 Column', 'uiuxom' )
                                ],
                                'conditions'        => [
                                        'terms'         => [
                                                [
                                                        'name'      => 'testimonial_style',
                                                        'operator'  => '==',
                                                        'value'     => '3',
                                                ]
                                        ],
                                ],
                        ]
                );
                $this->add_control( 'grid_md_col', [
                                'label'     => esc_html__( 'Select MD Col', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => '2',
                                'options'   => [
                                        '2'       => esc_html__( '2 Column', 'uiuxom' ),
                                        '3'       => esc_html__( '3 Column', 'uiuxom' ),
                                        '4'       => esc_html__( '4 Column', 'uiuxom' )
                                ],
                                'conditions'        => [
                                        'terms'         => [
                                                [
                                                        'name'      => 'testimonial_style',
                                                        'operator'  => '==',
                                                        'value'     => '3',
                                                ]
                                        ],
                                ],
                        ]
                );
                $this->add_control( 'grid_sm_col', [
                                'label'     => esc_html__( 'Select SM Col', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => '2',
                                'options'   => [
                                        '2'       => esc_html__( '2 Column', 'uiuxom' ),
                                        '3'       => esc_html__( '3 Column', 'uiuxom' ),
                                        '4'       => esc_html__( '4 Column', 'uiuxom' )
                                ],
                                'conditions'        => [
                                        'terms'         => [
                                                [
                                                        'name'      => 'testimonial_style',
                                                        'operator'  => '==',
                                                        'value'     => '3',
                                                ]
                                        ],
                                ],
                        ]
                );
                $this->add_control( 'main_title', [
                                'label'         => esc_html__( 'Section Main Title', 'uiuxom' ),
                                'type'          => Controls_Manager::TEXT,
                                'label_block'   => true,
                                'default'   => esc_html__('What Customers Say About Us', 'uiuxom'),
                                'conditions'        => [
                                    'terms'         => [
                                        [
                                                'name'      => 'testimonial_style',
                                                'operator'  => '==',
                                                'value'     => '1',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'description', [
                                'label'         => esc_html__( 'Section Description', 'uiuxom' ),
                                'type'          => Controls_Manager::TEXTAREA,
                                'label_block'   => true,
                                'default'   => esc_html__('Bobore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat ion ullamco laboris', 'uiuxom'),
                                'conditions'        => [
                                    'terms'         => [
                                        [
                                                'name'      => 'testimonial_style',
                                                'operator'  => '==',
                                                'value'     => '1',
                                        ]
                                    ],
                                ],
                        ]
                );
                $repeater = new \Elementor\Repeater();
                    $repeater->add_control( 'rating', [
                                    'label'     => esc_html__( 'Rating', 'uiuxom' ),
                                    'type' => Controls_Manager::NUMBER,
                                    'min' => 0,
                                    'max' => 5,
                                    'step' => .5,
                                    'default' => 4.5,
                            ]
                    );
                    $repeater->add_control( 'quote', [
                                    'label'         => esc_html__( 'Testimonial Quote', 'uiuxom' ),
                                    'type'          => Controls_Manager::TEXTAREA,
                                    'label_block'   => true,
                                    'placeholder'   => esc_html__('Insert your testimony content.', 'uiuxom')
                            ]
                    );
                    $repeater->add_control( 'au_img', [
                                    'label'         => esc_html__( 'Author Image', 'uiuxom' ),
                                    'type'          => Controls_Manager::MEDIA,
                                    'description'   => esc_html__('Upload square size image.', 'uiuxom'),
                            ]
                    );
                    $repeater->add_control( 'title', [
                                    'label'         => esc_html__( 'Author Name', 'uiuxom' ),
                                    'type'          => Controls_Manager::TEXT,
                                    'default'       => '',
                                    'label_block'   => true,
                                    'placeholder'   => esc_html__('Author Name', 'uiuxom')
                            ]
                    );
                    $repeater->add_control( 'designation', [
                                    'label'         => esc_html__( 'Author Designation', 'uiuxom' ),
                                    'type'          => Controls_Manager::TEXT,
                                    'default'       => '',
                                    'label_block'   => true,
                                    'placeholder'   => esc_html__('Author Designation.', 'uiuxom')
                            ]
                    );
                $this->add_control( 'testimony_list', [
                            'label'         => esc_html__( 'Testimonial Slider', 'uiuxom' ),
                            'type'          => Controls_Manager::REPEATER,
                            'fields'        => $repeater->get_controls(),
                            'default'       => [
                                    [
                                            'rating'                 => '',
                                            'quote'                 => '',
                                            'au_img'                => '',
                                            'title'                 => '',
                                            'designation'           => '',
                                    ],
                            ],
                            'title_field' => '{{{ title }}}',
                    ]
                );
                $this->add_control( 'testi_slide_autoplay', [
                                'label'             => esc_html__( 'Is Autoplay?', 'uiuxom' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'uiuxom' ),
                                'label_off'         => esc_html__( 'No', 'uiuxom' ),
                                'description'       => esc_html__('Do you want to make this slider auto play?', 'uiuxom'),
                                'return_value'      => 'yes',
                                'default'           => 'no',
                                'conditions'        => [
                                    'terms'         => [
                                        [
                                                'name'      => 'testimonial_style',
                                                'operator'  => '!in',
                                                'value'     => ['3'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'client_slide_loop', [
                                'label'             => esc_html__( 'Is Loop?', 'uiuxom' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'uiuxom' ),
                                'label_off'         => esc_html__( 'No', 'uiuxom' ),
                                'description'       => esc_html__('Do you want to make this slider item loop?', 'uiuxom'),
                                'return_value'      => 'yes',
                                'default'           => 'no',
                                'conditions'        => [
                                    'terms'         => [
                                        [
                                                'name'      => 'testimonial_style',
                                                'operator'  => '!in',
                                                'value'     => ['3'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'client_slide_nav', [
                                'label'             => esc_html__( 'Is Nav?', 'uiuxom' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'uiuxom' ),
                                'label_off'         => esc_html__( 'No', 'uiuxom' ),
                                'description'       => esc_html__('Do you want to show slider arrow navigation?', 'uiuxom'),
                                'return_value'      => 'yes',
                                'default'           => 'yes',
                                'conditions'        => [
                                    'terms'         => [
                                        [
                                                'name'      => 'testimonial_style',
                                                'operator'  => '!in',
                                                'value'     => ['3'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'cat_nav_position', [
                        'label'     => esc_html__('Category Style', 'uiuxom'),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 2,
                        'options'   => [
                            1       => esc_html__('Top Left', 'uiuxom'),
                            2       => esc_html__('Top Right', 'uiuxom'),
                            3       => esc_html__('Middle Expanded', 'uiuxom'),
                            4       => esc_html__('Bottom Left', 'uiuxom'),
                            5       => esc_html__('Bottom Center', 'uiuxom'),
                            6       => esc_html__('Bottom Right', 'uiuxom'),
                        ],
                        'conditions' => [
                            'terms' => [
                                [
                                    'name' => 'testimonial_style',
                                    'operator' => '==',
                                    'value' => '2',
                                ],
                                [
                                    'name' => 'client_slide_nav',
                                    'operator' => '==',
                                    'value' => 'yes',
                                ],
                            ],
                        ],
                    ]
                );
                $this->add_control( 'client_slide_dots', [
                                'label'             => esc_html__( 'Is Dots?', 'uiuxom' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'uiuxom' ),
                                'label_off'         => esc_html__( 'No', 'uiuxom' ),
                                'description'       => esc_html__('Do you want to show slider bullets item?', 'uiuxom'),
                                'return_value'      => 'yes',
                                'default'           => 'yes',
                                'conditions'        => [
                                    'terms'         => [
                                        [
                                                'name'      => 'testimonial_style',
                                                'operator'  => '!in',
                                                'value'     => ['3'],
                                        ]
                                    ],
                                ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section(
                'section_tab_leftArea', [
                    'label'             => esc_html__('Section Description Style', 'uiuxom'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                    'conditions'        => [
                        'terms'         => [
                            [
                                    'name'      => 'testimonial_style',
                                    'operator'  => '==',
                                    'value'     => '1',
                            ]
                        ],
                    ],
                ]
        );
                $this->add_responsive_control( 'tst_leftarea_padding', [
                                'label' => esc_html__( 'Padding', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .testimoniLeft'  => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'tst_leftarea_margin', [
                                'label' => esc_html__( 'Margin', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .testimoniLeft'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'sd_heading_02', [
				'label' => esc_html__( 'Title Style', 'uiuxom' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
                $this->add_responsive_control( 'tst_sectitles_color', [
                                'label' => esc_html__( 'Color', 'uiuxom' ),
                                'type'  => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .testimoniLeft .secTitle'  => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'tst_sectitles_typo',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .testimoniLeft .secTitle',
                        ]
                );
                $this->add_responsive_control( 'tst_sectitles_margin', [
                                'label' => esc_html__( 'Margin', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .testimoniLeft .secTitle'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'sd_heading_03', [
				'label' => esc_html__( 'Desc Style', 'uiuxom' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
                $this->add_responsive_control( 'tst_secdescs_color', [
                                'label' => esc_html__( 'Color', 'uiuxom' ),
                                'type'  => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .testimoniLeft .secDesc'  => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'tst_secdescs_typo',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .testimoniLeft .secDesc',
                        ]
                );
                $this->add_responsive_control( 'tst_secdescs_margin', [
                                'label' => esc_html__( 'Margin', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .testimoniLeft .secDesc'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section(
                'section_item_styling', [
                    'label'             => esc_html__('Testimonial Item Styling', 'uiuxom'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->start_controls_tabs( 'testimoniItemsTab' );
                    $this->start_controls_tab('testimoni_item_normal', [ 'label' => esc_html__( 'Normal', 'uiuxom' ), ]);
                        $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name'  => 'tst_item_bg',
                                        'label' => esc_html__( 'Item BG', 'uiuxom' ),
                                        'types' => [ 'classic' ],
                                        'selector' => '{{WRAPPER}} .testimonialItem01, {{WRAPPER}} .testimonialItem01.ti01Mode2',
                                ]
                        );
                        $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                        'name' => 'ts_item_shadow',
                                        'label' => esc_html__( 'Item Shadow', 'uiuxom' ),
                                        'selector' => '{{WRAPPER}} .testimonialItem01, {{WRAPPER}} .testimonialItem01.ti01Mode2',
                                ]
                        );
                        $this->add_group_control( Group_Control_Border::get_type(), [
                                        'name'      => 'ts_item_border',
                                        'label'     => esc_html__( 'Item Border', 'uiuxom' ),
                                        'selector'  => '{{WRAPPER}} .testimonialItem01, {{WRAPPER}} .testimonialItem01.ti01Mode2',
                                ]
                        );
                        $this->add_responsive_control( 'ts_item_radius', [
                                        'label' => esc_html__( 'Item Radius', 'uiuxom' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .testimonialItem01'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .testimonialItem01.ti01Mode2'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                        );
                    $this->end_controls_tab();
                    $this->start_controls_tab('testimoni_item_hover', [ 'label' => esc_html__( 'Hover', 'uiuxom' ), ]);
                        $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name'  => 'tst_item_bg_hover',
                                        'label' => esc_html__( 'Item BG', 'uiuxom' ),
                                        'types' => [ 'classic' ],
                                        'selector' => '{{WRAPPER}} .testimonialItem01:hover, {{WRAPPER}} .testimonialItem01.ti01Mode2:hover',
                                ]
                        );
                        $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                        'name' => 'ts_item_shadow_hover',
                                        'label' => esc_html__( 'Item Shadow', 'uiuxom' ),
                                        'selector' => '{{WRAPPER}} .testimonialItem01:hover, {{WRAPPER}} .testimonialItem01.ti01Mode2:hover',
                                ]
                        );
                        $this->add_group_control( Group_Control_Border::get_type(), [
                                        'name'      => 'ts_item_border_hover',
                                        'label'     => esc_html__( 'Item Border', 'uiuxom' ),
                                        'selector'  => '{{WRAPPER}} .testimonialItem01:hover, {{WRAPPER}} .testimonialItem01.ti01Mode2:hover',
                                ]
                        );
                        $this->add_responsive_control( 'ts_item_radius_hover', [
                                        'label' => esc_html__( 'Item Radius', 'uiuxom' ),
                                        'type'  => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .testimonialItem01:hover'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .testimonialItem01.ti01Mode2:hover'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                        );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'ts_item_padding', [
                                'label' => esc_html__( 'Item Padding', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .testimonialItem01'   => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .testimonialItem01.ti01Mode2'   => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'ts_item_margin', [
                                'label' => esc_html__( 'Item Margin', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .testimonialItem01'   => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .testimonialItem01.ti01Mode2'   => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                
        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_200', [
                    'label'             => esc_html__('Item Content Styling', 'uiuxom'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_control( 'tst_content_heading_001', [
				'label' => esc_html__( 'Header Style', 'uiuxom' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'none',
			]
		);
                $this->add_responsive_control( 'tst_header_padding', [
                                'label' => esc_html__( 'Header Padding', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .ti01Mode2 .ti01Header'  => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'tst_header_margin', [
                                'label' => esc_html__( 'Header Margin', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .ti01Mode2 .ti01Header'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'tst_content_heading_002', [
				'label' => esc_html__( 'Quote Icon Style', 'uiuxom' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'tst_quote_icon_typo',
                                'label'     => esc_html__( 'Quote Icon Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .ti01Header > i',
                        ]
                );
                $this->add_responsive_control('tst_quote_icon_color', [
                                'label' => esc_html__( 'Quote Icon Color', 'uiuxom' ),
                                'type'  => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .ti01Header > i'  => 'color: {{VALUE}}',
                                ],
                        ]
                ); 
                $this->add_responsive_control('tst_quote_icon_hover_color', [
                                'label' => esc_html__( 'Item Hover Quote Icon Color', 'uiuxom' ),
                                'type'  => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .testimonialItem01:hover .ti01Header > i'  => 'color: {{VALUE}}',
                                ],
                        ]
                ); 
                $this->add_responsive_control( 'tst_quote_icon_margin', [
                                'label' => esc_html__( 'Quote Icon Margin', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .ti01Header > i'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'tst_content_heading_003', [
				'label' => esc_html__( 'Rating Style', 'uiuxom' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'tst_quote_rating_typo',
                                'label'     => esc_html__( 'Rating Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .ti01Rating',
                        ]
                );
                $this->add_responsive_control('tst_quote_rating_color', [
                                'label' => esc_html__( 'Rating Color', 'uiuxom' ),
                                'type'  => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .ti01Rating'  => 'color: {{VALUE}}',
                                ],
                        ]
                ); 
                $this->add_responsive_control('tst_quote_rating_color_hover', [
                                'label' => esc_html__( 'Item Hover Rating Color', 'uiuxom' ),
                                'type'  => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .testimonialItem01:hover .ti01Rating'  => 'color: {{VALUE}}',
                                ],
                        ]
                ); 
                $this->add_responsive_control( 'tst_quote_rating_margin', [
                                'label' => esc_html__( 'Quote Rating Margin', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .ti01Rating'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                
                $this->add_control( 'tst_content_heading_01', [
				'label' => esc_html__( 'Quote Style', 'uiuxom' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
                $this->add_responsive_control( 'tst_quote_color', [
                                'label' => esc_html__( 'Quote Color', 'uiuxom' ),
                                'type'  => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .ti01Content'  => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control('tst_quote_color_hover', [
                                'label' => esc_html__( 'Item Hover Quote Color', 'uiuxom' ),
                                'type'  => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .testimonialItem01:hover .ti01Content'  => 'color: {{VALUE}}',
                                ],
                        ]
                ); 
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'tst_quote_typo',
                                'label'     => esc_html__( 'Quote Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .ti01Content',
                        ]
                );
                $this->add_responsive_control( 'tst_quote_padding', [
                                'label' => esc_html__( 'Quote Margin', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .ti01Content'  => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'tst_quote_margin', [
                                'label' => esc_html__( 'Quote Margin', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .ti01Content'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'tst_content_heading_02', [
				'label' => esc_html__( 'Author Name Style', 'uiuxom' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
                $this->add_responsive_control( 'tst_aname_color', [
                                'label' => esc_html__( 'Name Color', 'uiuxom' ),
                                'type'  => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .ti01Author h3'  => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control('tst_aname_color_hover', [
                                'label' => esc_html__( 'Item Hover Name Color', 'uiuxom' ),
                                'type'  => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .testimonialItem01:hover .ti01Author h3'  => 'color: {{VALUE}}',
                                ],
                        ]
                ); 
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'tst_aname_typo',
                                'label'     => esc_html__( 'Name Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .ti01Author h3',
                        ]
                );
                $this->add_responsive_control( 'tst_aname_margin', [
                                'label' => esc_html__( 'Name Margin', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .ti01Author h3'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'tst_content_heading_03', [
				'label' => esc_html__( 'Author Designation Style', 'uiuxom' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
                $this->add_responsive_control( 'tst_desig_color', [
                                'label' => esc_html__( 'Designation Color', 'uiuxom' ),
                                'type'  => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .ti01Author span'  => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control('tst_desig_color_hover', [
                                'label' => esc_html__( 'Item Hover Designation Color', 'uiuxom' ),
                                'type'  => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .testimonialItem01:hover .ti01Author span'  => 'color: {{VALUE}}',
                                ],
                        ]
                ); 
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'tst_desig_typo',
                                'label'     => esc_html__( 'Designation Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .ti01Author span',
                        ]
                );
                $this->add_responsive_control( 'tst_desig_margin', [
                                'label' => esc_html__( 'Designation Margin', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .ti01Author span'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        
        $this->start_controls_section(
                'section_tab_nav', [
                    'label'             => esc_html__('Nav Styling', 'uiuxom'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms'     => [
                            [
                                    'name'      => 'testimonial_style',
                                    'operator'  => '!in',
                                    'value'     => ['3'],
                            ],
                            [
                                    'name'      => 'client_slide_nav',
                                    'operator'  => '==',
                                    'value'     => 'yes',
                            ],
                        ],
                    ],
                ]
        );
                $this->add_responsive_control( 'abi_counter_box_with', [
                                'label' => esc_html__( 'Nav BTN Width', 'uiuxom' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px', '%' ],
                                'range' => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 1000,
                                                'step' => 1,
                                        ],
                                        '%' => [
                                                'min' => 0,
                                                'max' => 100,
                                        ],
                                ],
                                'default' => [],
                                'selectors' => [
                                        '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-nav button' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .testimonalNav button' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'abi_counter_box_height', [
                                'label' => esc_html__( 'Nav BTN Height', 'uiuxom' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px', '%' ],
                                'range' => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 1000,
                                                'step' => 1,
                                        ],
                                        '%' => [
                                                'min' => 0,
                                                'max' => 100,
                                        ],
                                ],
                                'default' => [],
                                'selectors' => [
                                        '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-nav button' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .testimonalNav button' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control(
                        Group_Control_Typography::get_type(), [
                                'name'      => 'nav_i_typography',
                                'label'     => esc_html__( 'Icon Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-nav button, {{WRAPPER}} .testimonalNav button'
                        ]
                );
                $this->start_controls_tabs( 'nav_styling_tab' );
                    $this->start_controls_tab('nav_styling_tab_normal',['label' => esc_html__( 'Normal', 'uiuxom' ),]);
                            $this->add_responsive_control( 'bl_nav_color', [
                                            'label' => esc_html__( 'Nav Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-nav button' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .testimonalNav button' => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'bl_nav_bg',
                                        'label' => esc_html__( 'Nav Background', 'uiuxom' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-nav button, {{WRAPPER}} .testimonalNav button',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'bl_nav_bg_shadow',
                                            'label' => esc_html__( 'Boxs Shadow', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-nav button, {{WRAPPER}} .testimonalNav button',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'bl_nav_bg_border',
                                            'label' => esc_html__( 'Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-nav button, {{WRAPPER}} .testimonalNav button',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('nav_styling_tab_hover',['label' => esc_html__( 'Hover', 'uiuxom' )]);
                            $this->add_responsive_control( 'bl_nav_color_hover', [
                                            'label' => esc_html__( 'Nav Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-nav button:hover' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .testimonalNav button:hover' => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'bl_nav_bg_hover',
                                        'label' => esc_html__( 'Nav Background', 'uiuxom' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-nav button:hover, {{WRAPPER}} .testimonalNav button:hover',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'bl_nav_bg_shadow_hover',
                                            'label' => esc_html__( 'Boxs Shadow', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-nav button:hover, {{WRAPPER}} .testimonalNav button:hover',
                                    ]
                            );
                            $this->add_group_control(Group_Control_Border::get_type(), [
                                            'name' => 'bl_nav_bg_border_hover',
                                            'label' => esc_html__( 'Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-nav button:hover, {{WRAPPER}} .testimonalNav button:hover',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
            $this->add_control( 'bl_nav_radius', [
                            'label' => esc_html__( 'Nav Buttons  Radius', 'uiuxom' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .testimonalNav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'folioSlider_nav_padding', [
                            'label'      => esc_html__( 'Nav Buttons Padding', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-nav button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .testimonalNav button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'left_nav_margin', [
                            'label'      => esc_html__( 'Left Margin', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-nav button.owl-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .testimonalNav button.tnPrev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'right_nav_margin', [
                            'label'      => esc_html__( 'Right Margin', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-nav button.owl-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .testimonalNav button.tnNext' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'area_nav_margin', [
                            'label'      => esc_html__( 'Area Margin', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .testimonalNav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_04', [
                    'label'             => esc_html__('Dots Styling', 'uiuxom'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms'     => [
                            [
                                    'name'      => 'testimonial_style',
                                    'operator'  => '!in',
                                    'value'     => ['3'],
                            ],
                            [
                                    'name'      => 'client_slide_dots',
                                    'operator'  => '==',
                                    'value'     => 'yes',
                            ],
                        ],
                    ],
                ]
        );
                $this->add_responsive_control( 'dots_width', [
                                'label' => esc_html__( 'Dots Width', 'uiuxom' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px'],
                                'range' => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 50,
                                                'step' => 1,
                                        ]
                                ],
                                'default' => [
                                        'unit' => 'px',
                                        'size' => '',
                                ],
                                'selectors' => [
                                        '{{WRAPPER}} .testimonialCarousel.owl-carousel .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'dots_height', [
                                'label' => esc_html__( 'Dots Height', 'uiuxom' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px'],
                                'range' => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 50,
                                                'step' => 1,
                                        ]
                                ],
                                'default' => [
                                        'unit' => 'px',
                                        'size' => '',
                                ],
                                'selectors' => [
                                        '{{WRAPPER}} .testimonialCarousel.owl-carousel .owl-dot' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-dot' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'dots_inner_width', [
                                'label' => esc_html__( 'Dots Inner Width', 'uiuxom' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px'],
                                'range' => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 50,
                                                'step' => 1,
                                        ]
                                ],
                                'default' => [
                                        'unit' => 'px',
                                        'size' => '',
                                ],
                                'selectors' => [
                                        '{{WRAPPER}} .testimonialCarousel.owl-carousel .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'dots_inner_height', [
                                'label' => esc_html__( 'Dots Inner Height', 'uiuxom' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px'],
                                'range' => [
                                        'px' => [
                                                'min' => 0,
                                                'max' => 50,
                                                'step' => 1,
                                        ]
                                ],
                                'default' => [
                                        'unit' => 'px',
                                        'size' => '',
                                ],
                                'selectors' => [
                                        '{{WRAPPER}} .testimonialCarousel.owl-carousel .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->start_controls_tabs( 'dot_styling_tab' );
                    $this->start_controls_tab('dot_styling_tab_normal',['label' => esc_html__( 'Normal', 'uiuxom' )]);
                            $this->add_responsive_control( 'fs_dot_bg_color', [
                                            'label' => esc_html__( 'Outer BG Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .testimonialCarousel.owl-carousel .owl-dot' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-dot' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'fls_dot_bg_inner_color', [
                                            'label' => esc_html__( 'Inner BG Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .testimonialCarousel.owl-carousel .owl-dot span' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-dot span' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'fsl_dot_bg_border',
                                            'label' => esc_html__( 'Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .testimonialCarousel.owl-carousel .owl-dot, {{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-dot',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('dot_styling_tab_hover',['label' => esc_html__( 'Hover', 'uiuxom' )]);
                            $this->add_responsive_control( 'bl_dot_bg_color_hov', [
                                            'label' => esc_html__( 'Outer BG Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .testimonialCarousel.owl-carousel .owl-dot:hover' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .testimonialCarousel.owl-carousel .owl-dot.active' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-dot:hover' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-dot.active' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'bl_dot_bg_inner_color_hov', [
                                            'label' => esc_html__( 'Inner BG Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .testimonialCarousel.owl-carousel .owl-dot:hover span' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .testimonialCarousel.owl-carousel .owl-dot.active span' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-dot:hover span' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-dot.active span' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'bl_dot_bg_border_hover',
                                            'label' => esc_html__( 'Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .testimonialCarousel.owl-carousel .owl-dot:hover, {{WRAPPER}} .testimonialCarousel.owl-carousel .owl-dot.active, {{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-dot:hover, {{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-dot.active',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control('bl_dot_radius', [
                                'label' => esc_html__( 'Dots  Radius', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .testimonialCarousel.owl-carousel .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .testimonialCarousel.owl-carousel .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'bl_dot_margin', [
                                'label' => esc_html__( 'Dots  Gapping', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .testimonialCarousel.owl-carousel .owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'bl_dots_margin', [
                                'label' => esc_html__( 'Dot Area Margins', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .testimonialCarousel.owl-carousel .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .testimonialCarousel2.owl-carousel .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings           = $this->get_settings_for_display();
        
        $testimonial_style  = (isset($settings['testimonial_style']) && $settings['testimonial_style'] > 0) ? $settings['testimonial_style'] : 1;
        $testimonial_view  = (isset($settings['testimonial_view']) && $settings['testimonial_view'] > 0) ? $settings['testimonial_view'] : 1;
        
        $grid_xl_col  = (isset($settings['grid_xl_col']) && $settings['grid_xl_col'] > 0) ? $settings['grid_xl_col'] : 3;
        $grid_lg_col  = (isset($settings['grid_lg_col']) && $settings['grid_lg_col'] > 0) ? $settings['grid_lg_col'] : 3;
        $grid_md_col  = (isset($settings['grid_md_col']) && $settings['grid_md_col'] > 0) ? $settings['grid_md_col'] : 2;
        $grid_sm_col  = (isset($settings['grid_sm_col']) && $settings['grid_sm_col'] > 0) ? $settings['grid_sm_col'] : 2;

        $testimony_list     = (isset($settings['testimony_list']) && !empty($settings['testimony_list'])) ? $settings['testimony_list'] : array();
        
        $autoplay = (isset($settings['testi_slide_autoplay']) && $settings['testi_slide_autoplay'] != '' ? $settings['testi_slide_autoplay'] : 'no');
        $loop = (isset($settings['client_slide_loop']) && $settings['client_slide_loop'] != '' ? $settings['client_slide_loop'] : 'no');
        $nav = (isset($settings['client_slide_nav']) && $settings['client_slide_nav'] != '' ? $settings['client_slide_nav'] : 'no');
        $dots = (isset($settings['client_slide_dots']) && $settings['client_slide_dots'] != '' ? $settings['client_slide_dots'] : 'no');
        
        $cat_nav_position = (isset($settings['cat_nav_position']) && $settings['cat_nav_position'] > 0 ? $settings['cat_nav_position'] : '2');
        
        $main_title         = (isset($settings['main_title']) && !empty($settings['main_title']) ? $settings['main_title'] : '');
        $description        = (isset($settings['description']) && !empty($settings['description']) ? $settings['description'] : '');
        
        include dirname(__FILE__).'/style/testimonial/style'.$testimonial_style.'.php';
    }
        
    protected function content_template() {}
}