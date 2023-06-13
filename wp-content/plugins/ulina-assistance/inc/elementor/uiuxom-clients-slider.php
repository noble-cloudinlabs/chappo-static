<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Clients_Slider_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'uiuxom-clients-slider';
    }
    
    public function get_title() {
        return esc_html__( 'Brand Slider', 'uiuxom' );
    }

    public function get_icon() {
        return ' eicon-logo';
    }

    public function get_categories() {
        return [ 'uiuxom-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
            'section_tab_1', [
                'label'     => esc_html__('Client Logo', 'uiuxom')
            ]
        );
            $this->add_control( 'client_slide_autoplay', [
                            'label'             => esc_html__( 'Is Autoplay?', 'uiuxom' ),
                            'type'              => Controls_Manager::SWITCHER,
                            'label_on'          => esc_html__( 'Yes', 'uiuxom' ),
                            'label_off'         => esc_html__( 'No', 'uiuxom' ),
                            'description'       => esc_html__('Do you want to make this slider auto play?', 'uiuxom'),
                            'return_value'      => 'yes',
                            'default'           => 'no',
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
                    ]
            );
            $this->add_control( 'client_slide_nav', [
                            'label'             => esc_html__( 'Is Nav?', 'uiuxom' ),
                            'type'              => Controls_Manager::SWITCHER,
                            'label_on'          => esc_html__( 'Yes', 'uiuxom' ),
                            'label_off'         => esc_html__( 'No', 'uiuxom' ),
                            'description'       => esc_html__('Do you want to show slider arrow navigation?', 'uiuxom'),
                            'return_value'      => 'yes',
                            'default'           => 'no',
                    ]
            );
            $this->add_control( 'client_nav_position', [
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
                            'default'           => 'no',
                    ]
            );
            $this->add_control( 'items_xl_col', [
                            'label'     => esc_html__( 'Select XL Col', 'uiuxom' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => '5',
                            'options'   => [
                                    '2'       => esc_html__( '2 Column', 'uiuxom' ),
                                    '3'       => esc_html__( '3 Column', 'uiuxom' ),
                                    '4'       => esc_html__( '4 Column', 'uiuxom' ),
                                    '5'       => esc_html__( '5 Column', 'uiuxom' ),
                                    '6'       => esc_html__( '6 Column', 'uiuxom' ),
                            ]
                    ]
            );
            $this->add_control( 'items_lg_col', [
                            'label'     => esc_html__( 'Select LG Col', 'uiuxom' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => '4',
                            'options'   => [
                                    '2'       => esc_html__( '2 Column', 'uiuxom' ),
                                    '3'       => esc_html__( '3 Column', 'uiuxom' ),
                                    '4'       => esc_html__( '4 Column', 'uiuxom' ),
                                    '5'       => esc_html__( '5 Column', 'uiuxom' ),
                                    '6'       => esc_html__( '6 Column', 'uiuxom' ),
                            ]
                    ]
            );
            $this->add_control( 'items_md_col', [
                            'label'     => esc_html__( 'Select MD Col', 'uiuxom' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => '3',
                            'options'   => [
                                    '2'       => esc_html__( '2 Column', 'uiuxom' ),
                                    '3'       => esc_html__( '3 Column', 'uiuxom' ),
                                    '4'       => esc_html__( '4 Column', 'uiuxom' ),
                                    '5'       => esc_html__( '5 Column', 'uiuxom' ),
                                    '6'       => esc_html__( '6 Column', 'uiuxom' ),
                            ]
                    ]
            );
            $this->add_control( 'items_sm_col', [
                            'label'     => esc_html__( 'Select SM Col', 'uiuxom' ),
                            'type'      => Controls_Manager::SELECT,
                            'default'   => '2',
                            'options'   => [
                                    '2'       => esc_html__( '2 Column', 'uiuxom' ),
                                    '3'       => esc_html__( '3 Column', 'uiuxom' ),
                                    '4'       => esc_html__( '4 Column', 'uiuxom' ),
                                    '5'       => esc_html__( '5 Column', 'uiuxom' ),
                                    '6'       => esc_html__( '6 Column', 'uiuxom' ),
                            ]
                    ]
            );
            $this->add_control( 'items_gapping', [
                            'label' => esc_html__( 'Items Gapping', 'uiuxom' ),
                            'type' => Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 60,
                            'step' => 1,
                            'default' => 0,
                            'description'       => esc_html__('Insert items gapping if you want.', 'uiuxom'),
                    ]
            );
            $repeater = new \Elementor\Repeater();
                $repeater->add_control( 'client_name', [
                            'label'         => esc_html__( 'Company Name', 'uiuxom' ),
                            'type'          => Controls_Manager::TEXT,
                            'default'       => esc_html__( 'Company Name', 'uiuxom' ),
                            'description'   => esc_html__('Insert your company name here.', 'uiuxom'),
                    ]
                );
                $repeater->add_control( 'client_logo', [
                            'label'         => esc_html__( 'Normal Logo', 'uiuxom' ),
                            'type'          => Controls_Manager::MEDIA,
                            'description'   => esc_html__('Upload your client normal logo.', 'uiuxom'),
                    ]
                );
                $repeater->add_control( 'client_logo_hover', [
                            'label'         => esc_html__( 'Hover Logo', 'uiuxom' ),
                            'type'          => Controls_Manager::MEDIA,
                            'description'   => esc_html__('Upload your client hover logo. Same width height like Normal Logo.', 'uiuxom'),
                    ]
                );
                $repeater->add_control( 'clinet_url', [
                            'label'             => esc_html__( 'Logo URL', 'uiuxom' ),
                            'type'              => Controls_Manager::URL,
                            'input_type'        => 'url',
                            'placeholder'       => esc_html__( 'https://your-link.com', 'uiuxom' ),
                            'show_external'     => true,
                            'default'           => [
                                    'url'            => '',
                                    'is_external'    => true,
                                    'nofollow'       => true,
                            ],
                        ]
                );
                $this->add_control( 'list', [
                            'label'   => esc_html__( 'Client Logo', 'uiuxom' ),
                            'type'    => Controls_Manager::REPEATER,
                            'fields'  => $repeater->get_controls(),
                            'default' => [
                                    [
                                            'client_logo'        => array(),
                                            'client_logo_hover'  => array(),
                                            'clinet_url'         => array()

                                    ],
                            ],
                            'title_field' => '{{{ client_name }}}',
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_202', [
                    'label'             => esc_html__('Slider Styling', 'uiuxom'),
                    'tab'               => Controls_Manager::TAB_STYLE
                ]
        );
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'cs_area_bg',
                                'label' => esc_html__( 'Background', 'uiuxom' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .clslider_wrap',
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'cs_content_shadow',
                                'label' => esc_html__( 'Box Shadow', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .clslider_wrap',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'cs_bg_border',
                                'label' => esc_html__( 'Border', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .clslider_wrap',
                        ]
                );
                $this->add_responsive_control( 'cs_box_radius', [
                                'label' => esc_html__( 'Radius', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .clslider_wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ],
                        ]
                );
                $this->add_responsive_control( 'cs_box_padding', [
                                'label' => esc_html__( 'Paddings', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .clslider_wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ],
                        ]
                );
                $this->add_responsive_control( 'cs_box_margin', [
                                'label' => esc_html__( 'Margins', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .clslider_wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_02', [
                    'label'             => esc_html__('Item Styling', 'uiuxom'),
                    'tab'               => Controls_Manager::TAB_STYLE
                ]
        );
            $this->start_controls_tabs( 'item_styling_tab' );
                $this->start_controls_tab('item_styling_tab_normal', ['label' => esc_html__( 'Normal', 'uiuxom' )]);
                    $this->add_responsive_control( 'cl_item_bg', [
                                    'label' => esc_html__( 'Item BG Color', 'uiuxom' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .clientLogo' => 'background: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                    'name' => 'cl_item_shadow',
                                    'label' => esc_html__( 'Boxs Shadow', 'uiuxom' ),
                                    'selector' => '{{WRAPPER}} .clientLogo',
                            ]
                    );
                    $this->add_group_control( Group_Control_Border::get_type(), [
                                    'name' => 'cl_item_border',
                                    'label' => esc_html__( 'Border', 'uiuxom' ),
                                    'selector' => '{{WRAPPER}} .clientLogo',
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab('item_styling_tab_hover',['label' => esc_html__( 'Hover', 'uiuxom' )]);
                    $this->add_responsive_control( 'cl_item_bg_hover', [
                                    'label' => esc_html__( 'Item BG Color', 'uiuxom' ),
                                    'type'  => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .clientLogo:hover' => 'background: {{VALUE}}',
                                    ],
                            ]
                    );
                    $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                    'name' => 'cl_item_shadow_hover',
                                    'label' => esc_html__( 'Boxs Shadow', 'uiuxom' ),
                                    'selector' => '{{WRAPPER}} .clientLogo:hover',
                            ]
                    );
                    $this->add_group_control( Group_Control_Border::get_type(), [
                                    'name' => 'cl_item_border_hover',
                                    'label' => esc_html__( 'Border', 'uiuxom' ),
                                    'selector' => '{{WRAPPER}} .clientLogo:hover',
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            
            $this->add_responsive_control( 'cl_item_radius', [
                            'label' => esc_html__( 'Item Radius', 'uiuxom' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .clientLogo' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'cl_item_padding', [
                            'label' => esc_html__( 'Item Padding', 'uiuxom' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .clientLogo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'cl_item_margin', [
                            'label' => esc_html__( 'Item Margin', 'uiuxom' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .clientLogo' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                        '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-nav button' => 'width: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-nav button' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control(
                        Group_Control_Typography::get_type(), [
                                'name'      => 'nav_i_typography',
                                'label'     => esc_html__( 'Icon Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-nav button'
                        ]
                );
                $this->start_controls_tabs( 'nav_styling_tab' );
                    $this->start_controls_tab('nav_styling_tab_normal',['label' => esc_html__( 'Normal', 'uiuxom' ),]);
                            $this->add_responsive_control( 'bl_nav_color', [
                                            'label' => esc_html__( 'Nav Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-nav button' => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'bl_nav_bg',
                                        'label' => esc_html__( 'Nav Background', 'uiuxom' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-nav button',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'bl_nav_bg_shadow',
                                            'label' => esc_html__( 'Boxs Shadow', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-nav button',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'bl_nav_bg_border',
                                            'label' => esc_html__( 'Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-nav button',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('nav_styling_tab_hover',['label' => esc_html__( 'Hover', 'uiuxom' )]);
                            $this->add_responsive_control( 'bl_nav_color_hover', [
                                            'label' => esc_html__( 'Nav Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-nav button:hover' => 'color: {{VALUE}}'
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'bl_nav_bg_hover',
                                        'label' => esc_html__( 'Nav Background', 'uiuxom' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-nav button:hover',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'bl_nav_bg_shadow_hover',
                                            'label' => esc_html__( 'Boxs Shadow', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-nav button:hover',
                                    ]
                            );
                            $this->add_group_control(Group_Control_Border::get_type(), [
                                            'name' => 'bl_nav_bg_border_hover',
                                            'label' => esc_html__( 'Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-nav button:hover',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
            $this->add_control( 'bl_nav_radius', [
                            'label' => esc_html__( 'Nav Buttons  Radius', 'uiuxom' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'folioSlider_nav_padding', [
                            'label'      => esc_html__( 'Nav Buttons Padding', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-nav button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'left_nav_margin', [
                            'label'      => esc_html__( 'Left Margin', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-nav button.owl-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'right_nav_margin', [
                            'label'      => esc_html__( 'Right Margin', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-nav button.owl-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'area_nav_margin', [
                            'label'      => esc_html__( 'Area Margin', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                        '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-dot' => 'height: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->start_controls_tabs( 'dot_styling_tab' );
                    $this->start_controls_tab('dot_styling_tab_normal',['label' => esc_html__( 'Normal', 'uiuxom' )]);
                            $this->add_responsive_control( 'fs_dot_bg_color', [
                                            'label' => esc_html__( 'Outer BG Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-dot' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'fls_dot_bg_inner_color', [
                                            'label' => esc_html__( 'Inner BG Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-dot span' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'fsl_dot_bg_border',
                                            'label' => esc_html__( 'Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-dot',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('dot_styling_tab_hover',['label' => esc_html__( 'Hover', 'uiuxom' )]);
                            $this->add_responsive_control( 'bl_dot_bg_color_hov', [
                                            'label' => esc_html__( 'Outer BG Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-dot:hover' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-dot.active' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'bl_dot_bg_inner_color_hov', [
                                            'label' => esc_html__( 'Inner BG Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-dot:hover span' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-dot.active span' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'bl_dot_bg_border_hover',
                                            'label' => esc_html__( 'Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-dot:hover, {{WRAPPER}} .clientLogoSlider.owl-carousel .owl-dot.active',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control('bl_dot_radius', [
                                'label' => esc_html__( 'Dots  Radius', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'bl_dot_margin', [
                                'label' => esc_html__( 'Dots  Gapping', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'bl_dots_margin', [
                                'label' => esc_html__( 'Dot Area Margins', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .clientLogoSlider.owl-carousel .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        $logo_style  = (isset($settings['logo_style']) && $settings['logo_style'] > 0) ? $settings['logo_style'] : 2;

        $autoplay = (isset($settings['client_slide_autoplay']) && $settings['client_slide_autoplay'] != '' ? $settings['client_slide_autoplay'] : 'no');
        $loop = (isset($settings['client_slide_loop']) && $settings['client_slide_loop'] != '' ? $settings['client_slide_loop'] : 'no');
        $nav = (isset($settings['client_slide_nav']) && $settings['client_slide_nav'] != '' ? $settings['client_slide_nav'] : 'no');
        $dots = (isset($settings['client_slide_dots']) && $settings['client_slide_dots'] != '' ? $settings['client_slide_dots'] : 'no');
        
        $items_xl_col   = (isset($settings['items_xl_col']) && $settings['items_xl_col'] > 0 ? $settings['items_xl_col'] : 5);
        $items_lg_col  = (isset($settings['items_lg_col']) && $settings['items_lg_col'] > 0 ? $settings['items_lg_col'] : 4);
        $items_md_col  = (isset($settings['items_md_col']) && $settings['items_md_col'] > 0 ? $settings['items_md_col'] : 3);
        $items_sm_col  = (isset($settings['items_sm_col']) && $settings['items_sm_col'] > 0 ? $settings['items_sm_col'] : 2);
        $gapping        = (isset($settings['items_gapping']) && $settings['items_gapping'] > 0 ? $settings['items_gapping'] : 0);
        
        $client_nav_position        = (isset($settings['client_nav_position']) && $settings['client_nav_position'] > 0 ? $settings['client_nav_position'] : 3);
        
        $client         = (isset($settings['list']) && !empty($settings['list'])) ? $settings['list'] : array();
        
        if(!empty($client)):
            ?>
            <div class="clientLogoSliderWrap sliderNavPosition_<?php echo $client_nav_position; ?>" 
                 data-autoplay="<?php echo ($autoplay == 'yes' ? '1' : '0'); ?>" 
                 data-loop="<?php echo ($loop == 'yes' ? '1' : '0'); ?>" 
                 data-nav="<?php echo ($nav == 'yes' ? '1' : '0'); ?>" 
                 data-dots="<?php echo ($dots == 'yes' ? '1' : '0'); ?>" 
                 data-itemxl="<?php echo esc_attr($items_xl_col); ?>"
                 data-itemlg="<?php echo esc_attr($items_lg_col); ?>"
                 data-itemmd="<?php echo esc_attr($items_md_col); ?>"
                 data-itemsm="<?php echo esc_attr($items_sm_col); ?>"
                 data-gapping="<?php echo esc_attr($gapping); ?>"
                 >
                <div class="clientLogoSlider owl-carousel">
                    <?php
                        foreach($client as $item):
                            $client_name       = (isset($item['client_name']) && !empty($item['client_name'])) ? $item['client_name'] : get_bloginfo('name');
                            $logo       = (isset($item['client_logo']['url']) && !empty($item['client_logo']['url'])) ? $item['client_logo']['url'] : '';
                            $logo_hover = (isset($item['client_logo_hover']['url']) && !empty($item['client_logo_hover']['url'])) ? $item['client_logo_hover']['url'] : '';
                            $url        = (isset($item['clinet_url']['url'])) ? $item['clinet_url']['url'] : 'javascript:void(0);';
                            $target     = (isset($item['clinet_url']['is_external'])) ? ' target="_blank"' : '' ;
                            $nofollow   = (isset($item['clinet_url']['nofollow'])) ? ' rel="nofollow"' : '' ;
                            $logo_hover = (!empty($logo_hover) ? $logo_hover : $logo);
                            if($logo != ''): ?>
                                <a class="clientLogo" href="<?php echo $url; ?>">
                                    <img src="<?php echo esc_url($logo) ?>" alt="<?php echo $client_name; ?>">
                                    <img src="<?php echo esc_url($logo_hover) ?>" alt="<?php echo $client_name; ?>">
                                </a>
                            <?php endif;
                        endforeach;
                    ?>
                </div>
            </div>
            <?php
        endif; 
    }
        
    protected function content_template() {}
}