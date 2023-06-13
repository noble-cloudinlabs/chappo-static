<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Insta_Gallery_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'uiuxom-insta-gallery';
    }
    
    public function get_title() {
        return esc_html__( 'Insta Gallery', 'uiuxom' );
    }

    public function get_icon() {
        return 'eicon-instagram-gallery';
    }

    public function get_categories() {
        return [ 'uiuxom-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
                'section_tab_1', ['label'     => esc_html__('Insta Gallery', 'uiuxom')]
        );
                $this->add_control('gall_model', [
                                'label' => esc_html__( 'View Mode', 'uiuxom' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => '1',
                                'options' => [
                                        '1'  => esc_html__( 'Slider', 'uiuxom' ),
                                        '2' => esc_html__( 'Grid', 'uiuxom' ),
                                ],
                        ]
                );
                $this->add_control('gall_images', [
				'label' => esc_html__( 'Gallery Images', 'uiuxom' ),
				'type' => Controls_Manager::GALLERY,
				'default' => [],
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
                                                'name'      => 'gall_model',
                                                'operator'  => '==',
                                                'value'     => '1',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'gall_slide_loop', [
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
                                                'name'      => 'gall_model',
                                                'operator'  => '==',
                                                'value'     => '1',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'gall_slide_nav', [
                                'label'             => esc_html__( 'Is Nav?', 'uiuxom' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'uiuxom' ),
                                'label_off'         => esc_html__( 'No', 'uiuxom' ),
                                'description'       => esc_html__('Do you want to show slider arrow navigation?', 'uiuxom'),
                                'return_value'      => 'yes',
                                'default'           => 'no',
                                'conditions'        => [
                                    'terms'         => [
                                        [
                                                'name'      => 'gall_model',
                                                'operator'  => '==',
                                                'value'     => '1',
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
                                    'name'      => 'gall_model',
                                    'operator'  => '==',
                                    'value'     => '1',
                                ],
                                [
                                    'name' => 'gall_slide_nav',
                                    'operator' => '==',
                                    'value' => 'yes',
                                ],
                            ],
                        ],
                    ]
                );
                $this->add_control( 'gall_slide_dots', [
                                'label'             => esc_html__( 'Is Dots?', 'uiuxom' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'uiuxom' ),
                                'label_off'         => esc_html__( 'No', 'uiuxom' ),
                                'description'       => esc_html__('Do you want to show slider bullets item?', 'uiuxom'),
                                'return_value'      => 'yes',
                                'default'           => 'no',
                                'conditions'        => [
                                    'terms'         => [
                                        [
                                                'name'      => 'gall_model',
                                                'operator'  => '==',
                                                'value'     => '1',
                                        ]
                                    ],
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_0567893434', [
                    'label'             => esc_html__('Area Styling', 'uiuxom'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'tst_area_border',
                                'label' => esc_html__( 'Gallery Area Border', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .instagramSlider, {{WRAPPER}} .instagramGrid',
                        ]
                );
                $this->add_responsive_control( 'tst_area_radius', [
                                'label' => esc_html__( 'Gallery Area Radius', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .instagramSlider'  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .instagramGrid'  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'tst_area_padding', [
                                'label' => esc_html__( 'Gallery Area Padding', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .instagramSlider'  => 'padidng: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .instagramGrid'  => 'padidng: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'tst_area_margin', [
                                'label' => esc_html__( 'Gallery Area Margin', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .instagramSlider'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .instagramGrid'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_056789', [
                    'label'             => esc_html__('Item Styling', 'uiuxom'),
                    'tab'               => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_responsive_control( 'gall_item_bg_color', [
                                'label' => esc_html__( 'Item BG Color', 'uiuxom' ),
                                'type'  => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .instagramPhoto' => 'background: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control( 'gall_bg_blend_mode', [
                        'label'     => esc_html__('Hover Mix Blend Mode', 'uiuxom'),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 'luminosity',
                        'options'   => [
                            'normal'   => esc_html__( 'Normal', 'ulina' ),
                            'multiply' => esc_html__( 'Multiply', 'ulina' ),
                            'screen'  => esc_html__( 'Screen', 'ulina' ),
                            'overlay'  => esc_html__( 'Overlay', 'ulina' ),
                            'darken'  => esc_html__( 'Darken', 'ulina' ),
                            'lighten'  => esc_html__( 'Lighten', 'ulina' ),
                            'color-dodge'  => esc_html__( 'Color Dodge', 'ulina' ),
                            'color-burn'  => esc_html__( 'Color Burn', 'ulina' ),
                            'hard-light'  => esc_html__( 'Hard Light', 'ulina' ),
                            'soft-light'  => esc_html__( 'Soft Light', 'ulina' ),
                            'difference'  => esc_html__( 'Difference', 'ulina' ),
                            'exclusion'  => esc_html__( 'Exclusion', 'ulina' ),
                            'hue'  => esc_html__( 'Hue', 'ulina' ),
                            'saturation'  => esc_html__( 'Saturation', 'ulina' ),
                            'color'  => esc_html__( 'Color', 'ulina' ),
                            'luminosity'  => esc_html__( 'Luminosity', 'ulina' )
                        ],
                        'selectors' => [
                                '{{WRAPPER}} .instagramPhoto:hover img' => 'mix-blend-mode: {{VALUE}}',
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
                                    'name'      => 'gall_model',
                                    'operator'  => '==',
                                    'value'     => '1',
                            ],
                            [
                                    'name'      => 'gall_slide_nav',
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
                                        '{{WRAPPER}} .instagramSlider.owl-carousel .owl-nav button' => 'width: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .instagramSlider.owl-carousel .owl-nav button' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control(
                        Group_Control_Typography::get_type(), [
                                'name'      => 'nav_i_typography',
                                'label'     => esc_html__( 'Icon Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .instagramSlider.owl-carousel .owl-nav button'
                        ]
                );
                $this->start_controls_tabs( 'nav_styling_tab' );
                    $this->start_controls_tab('nav_styling_tab_normal',['label' => esc_html__( 'Normal', 'uiuxom' ),]);
                            $this->add_responsive_control( 'bl_nav_color', [
                                            'label' => esc_html__( 'Nav Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .instagramSlider.owl-carousel .owl-nav button' => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'bl_nav_bg',
                                        'label' => esc_html__( 'Nav Background', 'uiuxom' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .instagramSlider.owl-carousel .owl-nav button',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'bl_nav_bg_shadow',
                                            'label' => esc_html__( 'Boxs Shadow', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .instagramSlider.owl-carousel .owl-nav button',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'bl_nav_bg_border',
                                            'label' => esc_html__( 'Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .instagramSlider.owl-carousel .owl-nav button',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('nav_styling_tab_hover',['label' => esc_html__( 'Hover', 'uiuxom' )]);
                            $this->add_responsive_control( 'bl_nav_color_hover', [
                                            'label' => esc_html__( 'Nav Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .instagramSlider.owl-carousel .owl-nav button:hover' => 'color: {{VALUE}}'
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'bl_nav_bg_hover',
                                        'label' => esc_html__( 'Nav Background', 'uiuxom' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .instagramSlider.owl-carousel .owl-nav button:hover',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'bl_nav_bg_shadow_hover',
                                            'label' => esc_html__( 'Boxs Shadow', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .instagramSlider.owl-carousel .owl-nav button:hover',
                                    ]
                            );
                            $this->add_group_control(Group_Control_Border::get_type(), [
                                            'name' => 'bl_nav_bg_border_hover',
                                            'label' => esc_html__( 'Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .instagramSlider.owl-carousel .owl-nav button:hover',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
            $this->add_control( 'bl_nav_radius', [
                            'label' => esc_html__( 'Nav Buttons  Radius', 'uiuxom' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .instagramSlider.owl-carousel .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'folioSlider_nav_padding', [
                            'label'      => esc_html__( 'Nav Buttons Padding', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .instagramSlider.owl-carousel .owl-nav button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'left_nav_margin', [
                            'label'      => esc_html__( 'Left Margin', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .instagramSlider.owl-carousel .owl-nav button.owl-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'right_nav_margin', [
                            'label'      => esc_html__( 'Right Margin', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .instagramSlider.owl-carousel .owl-nav button.owl-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'area_nav_margin', [
                            'label'      => esc_html__( 'Area Margin', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .instagramSlider.owl-carousel .owl-nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                    'name'      => 'gall_model',
                                    'operator'  => '==',
                                    'value'     => '1',
                            ],
                            [
                                    'name'      => 'gall_slide_dots',
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
                                        '{{WRAPPER}} .instagramSlider.owl-carousel .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .instagramSlider.owl-carousel .owl-dot' => 'height: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .instagramSlider.owl-carousel .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .instagramSlider.owl-carousel .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->start_controls_tabs( 'dot_styling_tab' );
                    $this->start_controls_tab('dot_styling_tab_normal',['label' => esc_html__( 'Normal', 'uiuxom' )]);
                            $this->add_responsive_control( 'fs_dot_bg_color', [
                                            'label' => esc_html__( 'Outer BG Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .instagramSlider.owl-carousel .owl-dot' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'fls_dot_bg_inner_color', [
                                            'label' => esc_html__( 'Inner BG Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .instagramSlider.owl-carousel .owl-dot span' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'fsl_dot_bg_border',
                                            'label' => esc_html__( 'Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .instagramSlider.owl-carousel .owl-dot',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('dot_styling_tab_hover',['label' => esc_html__( 'Hover', 'uiuxom' )]);
                            $this->add_responsive_control( 'bl_dot_bg_color_hov', [
                                            'label' => esc_html__( 'Outer BG Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .instagramSlider.owl-carousel .owl-dot:hover' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .instagramSlider.owl-carousel .owl-dot.active' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'bl_dot_bg_inner_color_hov', [
                                            'label' => esc_html__( 'Inner BG Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .instagramSlider.owl-carousel .owl-dot:hover span' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .instagramSlider.owl-carousel .owl-dot.active span' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'bl_dot_bg_border_hover',
                                            'label' => esc_html__( 'Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .instagramSlider.owl-carousel .owl-dot:hover, {{WRAPPER}} .instagramSlider.owl-carousel .owl-dot.active',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control('bl_dot_radius', [
                                'label' => esc_html__( 'Dots  Radius', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .instagramSlider.owl-carousel .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .instagramSlider.owl-carousel .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'bl_dot_margin', [
                                'label' => esc_html__( 'Dots  Gapping', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .instagramSlider.owl-carousel .owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'bl_dots_margin', [
                                'label' => esc_html__( 'Dot Area Margins', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .instagramSlider.owl-carousel .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
    }
    protected function render() {
        $settings       = $this->get_settings_for_display();
        
        $gall_model     = (isset($settings['gall_model']) && $settings['gall_model'] > 0 ? $settings['gall_model'] : 1);
        $gall_images     = (isset($settings['gall_images']) && !empty($settings['gall_images']) ? $settings['gall_images'] : []);
        
        $autoplay = (isset($settings['testi_slide_autoplay']) && $settings['testi_slide_autoplay'] != '' ? $settings['testi_slide_autoplay'] : 'no');
        $loop = (isset($settings['gall_slide_loop']) && $settings['gall_slide_loop'] != '' ? $settings['gall_slide_loop'] : 'no');
        $nav = (isset($settings['gall_slide_nav']) && $settings['gall_slide_nav'] != '' ? $settings['gall_slide_nav'] : 'no');
        $dots = (isset($settings['gall_slide_dots']) && $settings['gall_slide_dots'] != '' ? $settings['gall_slide_dots'] : 'no');
        
        $cat_nav_position = (isset($settings['cat_nav_position']) && $settings['cat_nav_position'] > 0 ? $settings['cat_nav_position'] : '2');
        
        if($gall_model == 2): ?>
        <?php if(!empty($gall_images)): ?>
            <div class="instagramGrid clearfix">
                <?php
                    foreach($gall_images as $gimg):
                        if(isset($gimg['id']) && $gimg['id'] > 0):
                            ?>
                            <a href="<?php echo ulina_attachment_url($gimg['id'], 'full') ?>" class="instagramPhoto imgPopup">
                                <img src="<?php echo ulina_attachment_url($gimg['id'], 264, 264) ?>" alt="<?php echo get_bloginfo('name'); ?>">
                            </a>
                            <?php
                        endif;
                    endforeach;
                ?>
            </div>
            <?php else: ?>
                <div class="alert alert-warning" role="alert">
                    <strong><?php echo esc_html__('Oops! ', 'uiuxom'); ?></strong><?php echo esc_html__('Items not found', 'uiuxom') ?>
                </div>
            <?php endif; ?>
        <?php else: ?>
        <div class="instagramSliderWrap sliderNavPosition_<?php echo $cat_nav_position; ?>"
            data-autoplay="<?php echo ($autoplay == 'yes' ? '1' : '0'); ?>" 
            data-loop="<?php echo ($loop == 'yes' ? '1' : '0'); ?>" 
            data-nav="<?php echo ($nav == 'yes' ? '1' : '0'); ?>" 
            data-dots="<?php echo ($dots == 'yes' ? '1' : '0'); ?>" 
            >
            <?php if(!empty($gall_images)): ?>
            <div class="instagramSlider owl-carousel">
                <?php
                    foreach($gall_images as $gimg):
                        if(isset($gimg['id']) && $gimg['id'] > 0):
                            ?>
                            <a href="<?php echo ulina_attachment_url($gimg['id'], 'full') ?>" class="instagramPhoto imgPopup">
                                <img src="<?php echo ulina_attachment_url($gimg['id'], 264, 264) ?>" alt="<?php echo get_bloginfo('name'); ?>">
                            </a>
                            <?php
                        endif;
                    endforeach;
                ?>
            </div>
            <?php else: ?>
                <div class="alert alert-warning" role="alert">
                    <strong><?php echo esc_html__('Oops! ', 'uiuxom'); ?></strong><?php echo esc_html__('Items not found', 'uiuxom') ?>
                </div>
            <?php endif; ?>
        </div>
        <?php endif;
    }
    
    protected function content_template() {}
}