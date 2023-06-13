<?php

namespace Elementor;

if (!defined('ABSPATH'))
    exit;

class Uiuxom_Product_Categories_Widgets extends Widget_Base
{

    public function get_name()
    {
        return 'uiuxom-product-categories';
    }

    public function get_title()
    {
        return esc_html__('Product Category', 'uiuxom');
    }

    public function get_icon()
    {
        return 'eicon-product-categories';
    }

    public function get_categories()
    {
        return ['uiuxom-elements'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_tab', [
                'label' => esc_html__('Product Category', 'uiuxom'),
            ]
        );
                $this->add_control(
                    'cat_style', [
                        'label'     => esc_html__('Category Style', 'uiuxom'),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 1,
                        'options'   => [
                            1       => esc_html__('Slider View', 'uiuxom'),
                            2       => esc_html__('Grid View', 'uiuxom'),
                        ],
                    ]
                );
                $this->add_control(
                    'cat_mode', [
                        'label'     => esc_html__('Category Mode', 'uiuxom'),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 1,
                        'options'   => [
                            1       => esc_html__('Mode 01', 'uiuxom'),
                            2       => esc_html__('Mode 02', 'uiuxom'),
                        ],
                    ]
                );
                $repeater = new \Elementor\Repeater();
                        $repeater->add_control( 'cat_list_category', [
                                        'label' => esc_html__( 'Product Category', 'uiuxom' ),
                                        'type' => Controls_Manager::SELECT2,
                                        'multiple' => false,
                                        'options' => ulina_category_array('product_cat', esc_html__('All Category', 'uiuxom')),
                                        'default' => '0',
                                ]
                        );
                        $repeater->add_control('list_cat_image', [
                                'label' => esc_html__('Custom Image', 'uiuxom'),
                                'type' => \Elementor\Controls_Manager::MEDIA,
                                'default' => [],
                            ]
                        );
                        $repeater->add_control('list_cat_title', [
                                'label' => esc_html__('Custom Title', 'uiuxom'),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'default' => '',
                                'placeholder' => esc_html__('Custom Title', 'uiuxom'),
                            ]
                        );
                        $repeater->add_control('cat_list_count', [
                                'label' => esc_html__('Custom Count', 'uiuxom'),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'min' => 0,
                                'max' => 15000,
                                'step' => 1,
                                'default' => '',
                                'description' => esc_html__('This option not work category view 01 style.', 'uiuxom'),
                            ]
                        );
                        $repeater->add_control('list_cat_count_suffix', [
                                'label' => esc_html__('Count Number Suffix', 'uiuxom'),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'default' => esc_html__('Items', 'uiuxom'),
                            ]
                        );
                        $repeater->add_control('list_cat_btn_url', [
                                'label' => esc_html__('Custom URL', 'uiuxom'),
                                'type' => \Elementor\Controls_Manager::URL,
                                'placeholder' => esc_html__('https://your-link.com', 'uiuxom'),
                                'show_external' => true,
                                'default' => [
                                    'url' => '',
                                ],
                                'description' => esc_html__('Insert your category custome url.', 'uiuxom'),
                            ]
                        );
                $this->add_control('cat_list', [
                        'label' => esc_html__('Category List', 'uiuxom'),
                        'type' => \Elementor\Controls_Manager::REPEATER,
                        'fields' => $repeater->get_controls(),
                        'default' => [],
                        'title_field' => '{{{ list_cat_title }}}',
                    ]
                );
                $this->add_control('cat_slide_autoplay', [
                        'label' => esc_html__('Is Autoplay?', 'uiuxom'),
                        'type' => Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('Yes', 'uiuxom'),
                        'label_off' => esc_html__('No', 'uiuxom'),
                        'description' => esc_html__('Do you want to make this slider auto play?', 'uiuxom'),
                        'return_value' => 'yes',
                        'default' => 'no',
                        'conditions' => [
                            'terms' => [
                                [
                                    'name' => 'cat_style',
                                    'operator' => '==',
                                    'value' => '1',
                                ],
                            ],
                        ],
                    ]
                );
                $this->add_control('cat_slide_loop', [
                        'label' => esc_html__('Is Loop?', 'uiuxom'),
                        'type' => Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('Yes', 'uiuxom'),
                        'label_off' => esc_html__('No', 'uiuxom'),
                        'description' => esc_html__('Do you want to make this slider item loop?', 'uiuxom'),
                        'return_value' => 'yes',
                        'default' => 'yes',
                        'conditions' => [
                            'terms' => [
                                [
                                    'name' => 'cat_style',
                                    'operator' => '==',
                                    'value' => '1',
                                ],
                            ],
                        ],
                    ]
                );
                $this->add_control( 'cat_slide_nav', [
                        'label' => esc_html__('Is Nav?', 'uiuxom'),
                        'type' => Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('Yes', 'uiuxom'),
                        'label_off' => esc_html__('No', 'uiuxom'),
                        'description' => esc_html__('Do you want to show slider arrow navigation?', 'uiuxom'),
                        'return_value' => 'yes',
                        'default' => 'yes',
                        'conditions' => [
                            'terms' => [
                                [
                                    'name' => 'cat_style',
                                    'operator' => '==',
                                    'value' => '1',
                                ],
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
                                    'name' => 'cat_style',
                                    'operator' => '==',
                                    'value' => '1',
                                ],
                                [
                                    'name' => 'cat_slide_nav',
                                    'operator' => '==',
                                    'value' => 'yes',
                                ],
                            ],
                        ],
                    ]
                );
                $this->add_control( 'cat_slide_dots', [
                        'label' => esc_html__('Is Dots?', 'uiuxom'),
                        'type' => Controls_Manager::SWITCHER,
                        'label_on' => esc_html__('Yes', 'uiuxom'),
                        'label_off' => esc_html__('No', 'uiuxom'),
                        'description' => esc_html__('Do you want to show slider bullets item?', 'uiuxom'),
                        'return_value' => 'yes',
                        'default' => 'no',
                        'conditions' => [
                            'terms' => [
                                [
                                    'name' => 'cat_style',
                                    'operator' => '==',
                                    'value' => '1',
                                ],
                            ],
                        ],
                    ]
                );
                $this->add_control( 'cat_items_gapping', [
                                'label' => esc_html__( 'Slider Items Gapping', 'uiuxom' ),
                                'type' => Controls_Manager::NUMBER,
                                'min' => 0,
                                'max' => 60,
                                'step' => 1,
                                'default' => 24,
                                'description'       => esc_html__('Insert items gapping if you want.', 'uiuxom'),
                                'conditions' => [
                                    'terms' => [
                                        [
                                            'name' => 'cat_style',
                                            'operator' => '==',
                                            'value' => '1',
                                        ],
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'cat_xl_col', [
                                'label'     => esc_html__( 'Select XL Col', 'uiuxom' ),
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
                $this->add_control( 'cat_lg_col', [
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
                $this->add_control( 'cat_md_col', [
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
                $this->add_control( 'cat_sm_col', [
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
                $this->add_control( 'cat_box_alignment', [
                                'label'     => esc_html__( 'Box Alignment', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => 'center',
                                'options'   => [
                                        'left'       => esc_html__( 'Left Align', 'uiuxom' ),
                                        'center'       => esc_html__( 'Center Align', 'uiuxom' ),
                                        'right'       => esc_html__( 'Right Align', 'uiuxom' ),
                                ]
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_1', [
                'label' => esc_html__('Box Style', 'uiuxom'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                        'name' => 'cat_box_shadow',
                        'label' => esc_html__('Box Shadow', 'uiuxom'),
                        'selector' => '{{WRAPPER}} .categoryItem01',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                        'name' => 'cat_border',
                        'label' => esc_html__('Box Border', 'uiuxom'),
                        'selector' => '{{WRAPPER}} .categoryItem01',
                    ]
                );
                $this->add_responsive_control( 'cat_box_radius', [
                        'label' => esc_html__('Radius', 'uiuxom'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em'],
                        'selectors' => [
                            '{{WRAPPER}} .categoryItem01' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                        ],
                    ]
                );
                $this->add_responsive_control( 'cat_box_padding', [
                        'label' => esc_html__('Paddings', 'uiuxom'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em'],
                        'selectors' => [
                            '{{WRAPPER}} .categoryItem01' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control( 'icon_box_margin', [
                        'label' => esc_html__('Margins', 'uiuxom'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em'],
                        'selectors' => [
                            '{{WRAPPER}} .categoryItem01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_image', [
                'label' => esc_html__('Category Image Style', 'uiuxom'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_responsive_control( 'cat_img_box_radius', [
                        'label' => esc_html__('Normal Radius', 'uiuxom'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em'],
                        'selectors' => [
                            '{{WRAPPER}} .ci01Thumb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control( 'cat_img_box_margin', [
                        'label' => esc_html__('Margins', 'uiuxom'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em'],
                        'selectors' => [
                            '{{WRAPPER}} .ci01Thumb' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_5', [
                'label' => esc_html__('Category Name Style', 'uiuxom'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                        'name' => 'cat_title_typo',
                        'label' => esc_html__('Typography', 'uiuxom'),
                        'selector' => '{{WRAPPER}} .categoryItem01 h3',
                    ]
                );
                $this->start_controls_tabs('style_tabs_cat');
                    $this->start_controls_tab( 'btn_1_button_style_normal', ['label' => esc_html__('Normal', 'uiuxom')]);
                            $this->add_responsive_control( 'cat_title_color', [
                                    'label' => esc_html__('Color', 'uiuxom'),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .categoryItem01 h3' => 'color: {{VALUE}}'
                                    ],
                                ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('btn_1_button_style_hover',['label' => esc_html__('Hover', 'uiuxom')]);
                            $this->add_responsive_control('cat_title_color_hover',[
                                    'label' => esc_html__('Hover Color', 'uiuxom'),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .categoryItem01 h3 a:hover' => 'color: {{VALUE}}'
                                    ],
                                ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'cat_title_padding', [
                        'label' => esc_html__('Title Paddings', 'uiuxom'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em'],
                        'selectors' => [
                            '{{WRAPPER}} .categoryItem01 h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control( 'cat_title_margin', [
                        'label' => esc_html__('Title Margin', 'uiuxom'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em'],
                        'selectors' => [
                            '{{WRAPPER}} .categoryItem01 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section('section_tab_6', [
                'label' => esc_html__('Count Style', 'uiuxom'),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
                $this->add_responsive_control('cat_count_color', [
                        'label' => esc_html__('Count Color', 'uiuxom'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .categoryItem01 p' => 'color: {{VALUE}}'
                        ],
                    ]
                );
                $this->add_group_control(Group_Control_Typography::get_type(), [
                        'name' => 'cat_count_typo',
                        'label' => esc_html__('Count Typography', 'uiuxom'),
                        'selector' => '{{WRAPPER}} .categoryItem01 p',
                    ]
                );
                $this->add_responsive_control( 'cat_count_padding', [
                        'label' => esc_html__('Count Paddings', 'uiuxom'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em'],
                        'selectors' => [
                            '{{WRAPPER}} .categoryItem01 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control( 'cat_count_margin', [
                        'label' => esc_html__('Count Margin', 'uiuxom'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em'],
                        'selectors' => [
                            '{{WRAPPER}} .categoryItem01 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_03', [
                'label' => esc_html__('Slider Nav Styling', 'uiuxom'),
                'tab' => Controls_Manager::TAB_STYLE,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'cat_style',
                            'operator' => '==',
                            'value' => '1',
                        ],
                        [
                            'name' => 'cat_slide_nav',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
                $this->add_responsive_control( 'cat_nav_width', [
                                'label' => __( 'Nav Width', 'uiuxom' ),
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
                                        '{{WRAPPER}} .categoryCarousel.owl-carousel .owl-nav button' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'cat_nav_height', [
                                'label' => __( 'Nav Height', 'uiuxom' ),
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
                                        '{{WRAPPER}} .categoryCarousel.owl-carousel .owl-nav button' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                        'name' => 'btn_nav_typography',
                        'label' => esc_html__('Typography', 'uiuxom'),
                        'selector' => '{{WRAPPER}} .categoryCarousel.owl-carousel .owl-nav button',
                    ]
                );
                $this->start_controls_tabs('nav_styling_tab');
                    $this->start_controls_tab('nav_styling_tab_normal', ['label' => esc_html__('Normal', 'uiuxom')]);
                            $this->add_control( 'cl_nav_color', [
                                    'label' => esc_html__('Nav Color', 'uiuxom'),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .categoryCarousel.owl-carousel .owl-nav button' => 'color: {{VALUE}}'
                                    ],
                                ]
                            );
                            $this->add_control( 'cl_nav_bg', [
                                    'label' => esc_html__('Nav BG Color', 'uiuxom'),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .categoryCarousel.owl-carousel .owl-nav button' => 'background: {{VALUE}}'
                                    ],
                                ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                    'name' => 'cl_nav_bg_border',
                                    'label' => esc_html__('Nav Border', 'uiuxom'),
                                    'selector' => '{{WRAPPER}} .categoryCarousel.owl-carousel .owl-nav button',
                                ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                    'name' => 'cl_nav_bg_shadow',
                                    'label' => esc_html__('Nav Shadow', 'uiuxom'),
                                    'selector' => '{{WRAPPER}} .categoryCarousel.owl-carousel .owl-nav button',
                                ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('nav_styling_tab_hover',['label' => esc_html__('Hover', 'uiuxom'),]);
                            $this->add_control( 'cl_nav_color_hover', [
                                    'label' => esc_html__('Nav Color', 'uiuxom'),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .categoryCarousel.owl-carousel .owl-nav button:hover' => 'color: {{VALUE}}'
                                    ],
                                ]
                            );
                            $this->add_control( 'cl_nav_bg_hover', [
                                    'label' => esc_html__('Nav BG Color', 'uiuxom'),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .categoryCarousel.owl-carousel .owl-nav button:hover' => 'background: {{VALUE}}'
                                    ],
                                ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                    'name' => 'cl_nav_bg_border_hover',
                                    'label' => esc_html__('Nav Border', 'uiuxom'),
                                    'selector' => '{{WRAPPER}} .categoryCarousel.owl-carousel .owl-nav button:hover',
                                ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                    'name' => 'cl_nav_bg_shadow_hover',
                                    'label' => esc_html__('Nav Shadow', 'uiuxom'),
                                    'selector' => '{{WRAPPER}} .categoryCarousel.owl-carousel .owl-nav button:hover',
                                ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'cat_nav_radius', [
                        'label' => esc_html__('Nav Radius', 'uiuxom'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em'],
                        'selectors' => [
                            '{{WRAPPER}} .categoryCarousel.owl-carousel .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control( 'cat_nav_padding', [
                        'label' => esc_html__('Nav Padding', 'uiuxom'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em'],
                        'selectors' => [
                            '{{WRAPPER}} .categoryCarousel.owl-carousel .owl-nav button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control( 'cat_nav_prev_margin', [
                        'label' => esc_html__('Nav Prev Margin', 'uiuxom'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em'],
                        'selectors' => [
                            '{{WRAPPER}} .categoryCarousel.owl-carousel .owl-nav button.owl-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control( 'cat_nav_next_margin', [
                        'label' => esc_html__('Nav Next Margin', 'uiuxom'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em'],
                        'selectors' => [
                            '{{WRAPPER}} .categoryCarousel.owl-carousel .owl-nav button.owl-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                
                $this->add_responsive_control( 'cat_nav_area_padding', [
                        'label' => esc_html__('Nav Area Padding', 'uiuxom'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em'],
                        'selectors' => [
                            '{{WRAPPER}} .categoryCarouselWrap .categoryCarousel.owl-carousel .owl-nav button.owl-next' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control( 'cat_nav_area_margin', [
                        'label' => esc_html__('Nav Area Margin', 'uiuxom'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em'],
                        'selectors' => [
                            '{{WRAPPER}} .categoryCarouselWrap .categoryCarousel.owl-carousel .owl-nav button.owl-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_04', [
                'label' => esc_html__('Dots Styling', 'uiuxom'),
                'tab' => Controls_Manager::TAB_STYLE,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'cat_style',
                            'operator' => '==',
                            'value' => '1',
                        ],
                        [
                            'name' => 'cat_slide_dots',
                            'operator' => '==',
                            'value' => 'yes',
                        ],
                    ],
                ],
            ]
        );
                $this->add_control( 'dots_width', [
                        'label' => esc_html__('Dots Width', 'uiuxom'),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => ['px'],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 30,
                                'step' => 1,
                            ]
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => '',
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .categoryCarousel .owl-dots .owl-dot' => 'width: {{SIZE}}{{UNIT}};'
                        ],
                    ]
                );
                $this->add_control( 'dots_height', [
                        'label' => esc_html__('Dots Height', 'uiuxom'),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => ['px'],
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
                            '{{WRAPPER}} .categoryCarousel .owl-dots .owl-dot' => 'height: {{SIZE}}{{UNIT}};'
                        ],
                    ]
                );
                $this->add_control( 'dots_inner_width', [
                        'label' => esc_html__('Dots Inner Width', 'uiuxom'),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => ['px'],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 30,
                                'step' => 1,
                            ]
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => '',
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .categoryCarousel .owl-dots .owl-dot span' => 'width: {{SIZE}}{{UNIT}};'
                        ],
                    ]
                );
                $this->add_control( 'dots_inner_height', [
                        'label' => esc_html__('Dots Inner Height', 'uiuxom'),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => ['px'],
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
                            '{{WRAPPER}} .categoryCarousel .owl-dots .owl-dot span' => 'height: {{SIZE}}{{UNIT}};'
                        ],
                    ]
                );
                $this->start_controls_tabs('dot_styling_tab');
                    $this->start_controls_tab('dot_styling_tab_normal',['label' => esc_html__('Normal', 'uiuxom')]);
                            $this->add_control( 'cl_dot_bg', [
                                    'label' => esc_html__('Dots BG Color', 'uiuxom'),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .categoryCarousel .owl-dots .owl-dot' => 'background: {{VALUE}}'
                                    ],
                                ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                    'name' => 'cl_dot_bg_border',
                                    'label' => esc_html__('Border', 'uiuxom'),
                                    'selector' => '{{WRAPPER}} .categoryCarousel .owl-dots .owl-dot',
                                ]
                            );
                            $this->add_responsive_control( 'dots_border_radius', [
                                    'label' => esc_html__('Border Radius', 'uiuxom'),
                                    'type' => Controls_Manager::DIMENSIONS,
                                    'size_units' => ['px', '%', 'em'],
                                    'selectors' => [
                                        '{{WRAPPER}} .categoryCarousel .owl-dots .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                    ],
                                ]
                            );
                            $this->add_control( 'cl_dot_inner_bg', [
                                    'label' => esc_html__('Dots Inner BG Color', 'uiuxom'),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .categoryCarousel .owl-dots .owl-dot span' => 'background: {{VALUE}}'
                                    ],
                                ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                    'name' => 'cl_dot_inner_bg_border',
                                    'label' => esc_html__('Inner Border', 'uiuxom'),
                                    'selector' => '{{WRAPPER}} .categoryCarousel .owl-dots .owl-dot span',
                                ]
                            );
                            $this->add_responsive_control( 'dots_border_inner_radius', [
                                    'label' => esc_html__('Border Inner Radius', 'uiuxom'),
                                    'type' => Controls_Manager::DIMENSIONS,
                                    'size_units' => ['px', '%', 'em'],
                                    'selectors' => [
                                        '{{WRAPPER}} .categoryCarousel .owl-dots .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                    ],
                                ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('dot_styling_tab_hover',['label' => esc_html__('Active', 'uiuxom')]);
                            $this->add_control( 'cl_dot_bg_act', [
                                    'label' => esc_html__('Dots BG Color', 'uiuxom'),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .categoryCarousel .owl-dots .owl-dot.active' => 'background: {{VALUE}}',
                                        '{{WRAPPER}} .categoryCarousel .owl-dots .owl-dot:hover' => 'background: {{VALUE}}',
                                    ],
                                ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                    'name' => 'cl_dot_bg_border_act',
                                    'label' => esc_html__('Border', 'uiuxom'),
                                    'selector' => '{{WRAPPER}} .categoryCarousel .owl-dots .owl-dot.active',
                                    'selector' => '{{WRAPPER}} .categoryCarousel .owl-dots .owl-dot:hover',
                                ]
                            );
                            $this->add_responsive_control( 'dots_border_radius_act', [
                                    'label' => esc_html__('Border Radius', 'uiuxom'),
                                    'type' => Controls_Manager::DIMENSIONS,
                                    'size_units' => ['px', '%', 'em'],
                                    'selectors' => [
                                        '{{WRAPPER}} .categoryCarousel .owl-dots .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .categoryCarousel .owl-dots .owl-dot:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                                ]
                            );
                            $this->add_control( 'cl_dot_inner_bg_act', [
                                    'label' => esc_html__('Dots Inner BG Color', 'uiuxom'),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .categoryCarousel .owl-dots .owl-dot.active span' => 'background: {{VALUE}}',
                                        '{{WRAPPER}} .categoryCarousel .owl-dots .owl-dot:hover span' => 'background: {{VALUE}}',
                                    ],
                                ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                    'name' => 'cl_dot_inner_bg_border_act',
                                    'label' => esc_html__('Inner Border', 'uiuxom'),
                                    'selector' => '{{WRAPPER}} .categoryCarousel .owl-dots .owl-dot.active span',
                                    'selector' => '{{WRAPPER}} .categoryCarousel .owl-dots .owl-dot:hover span',
                                ]
                            );
                            $this->add_responsive_control( 'dots_border_inner_radius_act', [
                                    'label' => esc_html__('Border Inner Radius', 'uiuxom'),
                                    'type' => Controls_Manager::DIMENSIONS,
                                    'size_units' => ['px', '%', 'em'],
                                    'selectors' => [
                                        '{{WRAPPER}} .categoryCarousel .owl-dots .owl-dot.active span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .categoryCarousel .owl-dots .owl-dot:hover span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                    ],
                                ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_control( 'cl_dot_margin', [
                        'label' => esc_html__('Dots  Gapping', 'uiuxom'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em'],
                        'selectors' => [
                            '{{WRAPPER}} .categoryCarousel.owl-carousel .owl-dots .owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ],
                    ]
                );
                $this->add_control( 'cl_dots_padding', [
                        'label' => esc_html__('Dot Area Padding', 'uiuxom'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em'],
                        'selectors' => [
                            '{{WRAPPER}} .categoryCarousel.owl-carousel .owl-dots' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ],
                    ]
                );
                $this->add_control( 'cl_dots_margin', [
                        'label' => esc_html__('Dot Area Margins', 'uiuxom'),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em'],
                        'selectors' => [
                            '{{WRAPPER}} .categoryCarousel.owl-carousel .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ],
                    ]
                );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $cat_style = (isset($settings['cat_style']) && $settings['cat_style'] > 0 ? $settings['cat_style'] : 1);
        $cat_mode = (isset($settings['cat_mode']) && $settings['cat_mode'] > 0 ? $settings['cat_mode'] : 1);
        $cat_box_alignment = (isset($settings['cat_box_alignment']) && $settings['cat_box_alignment'] != '' ? $settings['cat_box_alignment'] : 'center');

        $cat_list = (isset($settings['cat_list']) && !empty($settings['cat_list']) ? $settings['cat_list'] : array());

        $cat_slide_autoplay = (isset($settings['cat_slide_autoplay']) && !empty($settings['cat_slide_autoplay']) ? $settings['cat_slide_autoplay'] : '');
        $cat_slide_loop = (isset($settings['cat_slide_loop']) && !empty($settings['cat_slide_loop']) ? $settings['cat_slide_loop'] : '');
        $cat_slide_nav = (isset($settings['cat_slide_nav']) && !empty($settings['cat_slide_nav']) ? $settings['cat_slide_nav'] : '');
        $cat_slide_dots = (isset($settings['cat_slide_dots']) && !empty($settings['cat_slide_dots']) ? $settings['cat_slide_dots'] : '');
        
        $cat_nav_position = (isset($settings['cat_nav_position']) && !empty($settings['cat_nav_position']) ? $settings['cat_nav_position'] : 2);
        
        $cat_items_gapping = (isset($settings['cat_items_gapping']) && $settings['cat_items_gapping'] > 0 ? $settings['cat_items_gapping'] : 24);
        $cat_xl_col = (isset($settings['cat_xl_col']) && $settings['cat_xl_col'] > 0 ? $settings['cat_xl_col'] : 4);
        $cat_lg_col = (isset($settings['cat_lg_col']) && $settings['cat_lg_col'] > 0 ? $settings['cat_lg_col'] : 4);
        $cat_md_col = (isset($settings['cat_md_col']) && $settings['cat_md_col'] > 0 ? $settings['cat_md_col'] : 3);
        $cat_sm_col = (isset($settings['cat_sm_col']) && $settings['cat_sm_col'] > 0 ? $settings['cat_sm_col'] : 2);

        include dirname(__FILE__) . '/style/category/style-' . $cat_style . '.php';
    }

    protected function content_template()
    {

    }


}