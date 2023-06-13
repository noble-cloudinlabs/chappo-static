<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Deal_Product_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'uiuxom-deal-product';
    }
    
    public function get_title() {
        return esc_html__( 'Deal Product', 'uiuxom' );
    }

    public function get_icon() {
        return 'eicon-product-upsell';
    }

    public function get_categories() {
        return [ 'uiuxom-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
                'section_tab_1', ['label'     => esc_html__('Deal Product', 'uiuxom')]
        );
                $this->add_control( 'dp_style', [
                                'label' => esc_html__( 'Style', 'uiuxom' ),
                                'type'  => Controls_Manager::SELECT,
                                'default' => '1',
                                'options' => [
                                        '1'                 => esc_html__( 'Vertical 2 Column', 'uiuxom' ),
                                        '2'                 => esc_html__( 'Horizontal 1 Column', 'uiuxom' ),
                                ],
                        ]
                );
                $this->add_control( 'dp_sub_title', [
                                'label' => esc_html__( 'Sub Title', 'uiuxom' ),
                                'type' => Controls_Manager::TEXT,
                                'label_block' => true,
                                'default' => esc_html__( '10% OFF ALL ITEMS', 'uiuxom' ),
                        ]
                );
                $this->add_control( 'dp_title', [
                                'label' => esc_html__( 'Title', 'uiuxom' ),
                                'type' => Controls_Manager::TEXT,
                                'label_block' => true,
                                'default' => esc_html__( 'New Collection', 'uiuxom' ),
                        ]
                );
                $this->add_control( 'dp_desc', [
                                'label' => esc_html__( 'Desc', 'uiuxom' ),
                                'type' => Controls_Manager::TEXTAREA,
                                'label_block' => true,
                                'default' => '',
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'dp_style',
                                                'operator'  => '!in',
                                                'value'     => ['2'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'dp_sale_price', [
                                'label' => esc_html__( 'Sale Price', 'uiuxom' ),
                                'type' => Controls_Manager::TEXT,
                                'label_block' => true,
                                'default' => esc_html__( '199', 'uiuxom' ),
                        ]
                );
                $this->add_control( 'dp_regular_price', [
                                'label' => esc_html__( 'Regular Price', 'uiuxom' ),
                                'type' => Controls_Manager::TEXT,
                                'label_block' => true,
                                'default' => esc_html__( '399', 'uiuxom' ),
                        ]
                );
                $this->add_control( 'dp_btn_label', [
                                'label' => esc_html__( 'Button / Link Label', 'uiuxom' ),
                                'type' => Controls_Manager::TEXT,
                                'default' => esc_html__( 'Buy Now', 'uiuxom' ),
                        ]
                );
                $this->add_control( 'dp_btn_url', [
                            'label'             => esc_html__( 'Button URL', 'uiuxom' ),
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
                $this->add_control( 'dp_timer_label', [
                                'label' => esc_html__( 'Timer Label', 'uiuxom' ),
                                'type' => Controls_Manager::TEXT,
                                'label_block' => true,
                                'default' => esc_html__( 'Ends in', 'uiuxom' ),
                        ]
                );
                $this->add_control( 'due_date', [
				'label' => esc_html__( 'Deal End Date', 'uiuxom' ),
				'type' => Controls_Manager::DATE_TIME,
                                'picker_options' => [
                                    'dateFormat' => 'Y-m-d'
                                ]
			]
		);
                $this->add_control( 'due_days', [
                                'label' => esc_html__( 'Auto Increment Days', 'uiuxom' ),
                                'type' => Controls_Manager::NUMBER,
                                'min' => 0,
                                'max' => 365,
                                'step' => 1,
                                'default' => 0,
                                'description' => esc_html__('This option will work fi Deal End Date found empty.', 'uiuxom')
			]
		);
                $this->add_control( 'dp_image', [
                                'label' => esc_html__( 'Collection Image', 'uiuxom' ),
                                'label_block'   => TRUE,
                                'type' => Controls_Manager::MEDIA,
                                'default'       => [],
                                'description' => esc_html__('Image size should be 414x576px for style 01 and 125x186px for style 02.', 'uiuxom')
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_30', [
                    'label'         => esc_html__('Left Area Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms' => [
                            [
                                    'name'      => 'dp_style',
                                    'operator'  => '==',
                                    'value'     => '1',
                            ]
                        ],
                    ],
                ]
        );
                $this->add_responsive_control('pd_area_paddings', [
                                'label' => esc_html__( 'Area Padding', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .dealProductContent' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control('pd_area_margin', [
                                'label' => esc_html__( 'Area Margin', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .dealProductContent' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_32345', [
                    'label'         => esc_html__('Area Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms' => [
                            [
                                    'name'      => 'dp_style',
                                    'operator'  => '==',
                                    'value'     => '2',
                            ]
                        ],
                    ],
                ]
        );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'col_area_border',
                                'label' => esc_html__( 'Area Border', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .lookBook01.productDeals',
                        ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                'name' => 'coll_area_shadow',
                                'label' => esc_html__( 'Area Shadow', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .lookBook01.productDeals',
                        ]
                );
                $this->add_control('coll_area_radius', [
                                'label' => esc_html__( 'Area Radius', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .lookBook01.productDeals' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control('coll_area_paddings', [
                                'label' => esc_html__( 'Area Padding', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .lookBook01.productDeals' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control('coll_area_margin', [
                                'label' => esc_html__( 'Area Margin', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .lookBook01.productDeals' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_44578', [
                    'label'         => esc_html__('Sub Title Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'coll_stitle_type',
                                'label'     => esc_html__( 'Sub Title Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .dealProductContent h5, {{WRAPPER}} .productDeals .lbContent h3',
                        ]
                );
                $this->add_control('col_stitle_color',[
                                'label'     => esc_html__( 'Sub Title Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .dealProductContent h5' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .productDeals .lbContent h3' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control('col_stitle_text_padding', [
                                'label' => esc_html__( 'Sub Title Padding', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .dealProductContent h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .productDeals .lbContent h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('col_stitle_margin', [
                                'label' => esc_html__( 'Sub Title Margins', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .dealProductContent h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .productDeals .lbContent h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_4', [
                    'label'         => esc_html__('Title Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'coll_title_type',
                                'label'     => esc_html__( 'Title Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .dealProductContent h2, {{WRAPPER}} .productDeals.lb01M11 .lbContent h2',
                        ]
                );
                $this->add_control('col_title_color',[
                                'label'     => esc_html__( 'Title Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .dealProductContent h2' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .productDeals.lb01M11 .lbContent h2' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control('col_title_text_padding', [
                                'label' => esc_html__( 'Title Padding', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .dealProductContent h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .productDeals.lb01M11 .lbContent h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('col_title_margin', [
                                'label' => esc_html__( 'Title Margins', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .dealProductContent h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .productDeals.lb01M11 .lbContent h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_433244sdf', [
                    'label'         => esc_html__('Desc Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms' => [
                            [
                                    'name'      => 'dp_style',
                                    'operator'  => '==',
                                    'value'     => '1',
                            ]
                        ],
                    ],
                ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'coll_desc_type',
                                'label'     => esc_html__( 'Desc Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .dealProductContent p',
                        ]
                );
                $this->add_control('col_desc_color',[
                                'label'     => esc_html__( 'Desc Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .dealProductContent p' => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control('col_desc_text_padding', [
                                'label' => esc_html__( 'Desc Padding', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .dealProductContent p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('col_desc_margin', [
                                'label' => esc_html__( 'Desc Margins', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} ..dealProductContent p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_433244sdf3434', [
                    'label'         => esc_html__('Price Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->start_controls_tabs( 'style_tabs_price' );
                    $this->start_controls_tab('pd_ins_price',['label' => esc_html__( 'Sale', 'uiuxom' ),]);
                        $this->add_group_control( Group_Control_Typography::get_type(), [
                                        'name'      => 'pd_ins_type',
                                        'label'     => esc_html__( 'Sale Typography', 'uiuxom' ),
                                        'selector'  => '{{WRAPPER}} .dpcPriceWrap .pi01Price, {{WRAPPER}} .productDeals.lb01M11 .pi01Price',
                                ]
                        );
                        $this->add_control('pd_ins_color',[
                                        'label'     => esc_html__( 'Sale Color', 'uiuxom' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .dpcPriceWrap .pi01Price' => 'color: {{VALUE}}',
                                                '{{WRAPPER}} .productDeals.lb01M11 .pi01Price' => 'color: {{VALUE}}',
                                        ],
                                ]
                        );
                        $this->add_responsive_control('pd_ins_margin', [
                                        'label' => esc_html__( 'Sale Margin', 'uiuxom' ),
                                        'type' => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .dpcPriceWrap .pi01Price ins' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .productDeals.lb01M11 .pi01Price ins' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                        );
                    $this->end_controls_tab();
                    $this->start_controls_tab('pd_del_price',['label' => esc_html__( 'Regular', 'uiuxom' ),]);
                        $this->add_group_control( Group_Control_Typography::get_type(), [
                                        'name'      => 'pd_del_type',
                                        'label'     => esc_html__( 'Regular Typography', 'uiuxom' ),
                                        'selector'  => '{{WRAPPER}} .dpcPriceWrap .pi01Price del, {{WRAPPER}} .productDeals.lb01M11 .pi01Price del',
                                ]
                        );
                        $this->add_control('pd_del_color',[
                                        'label'     => esc_html__( 'Regular Color', 'uiuxom' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .dpcPriceWrap .pi01Price del' => 'color: {{VALUE}}',
                                                '{{WRAPPER}} .productDeals.lb01M11 .pi01Price del' => 'color: {{VALUE}}',
                                        ],
                                ]
                        );
                        $this->add_control('pd_del_bar_color',[
                                        'label'     => esc_html__( 'Regular Bar Color', 'uiuxom' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .dpcPriceWrap .pi01Price del:after' => 'background: {{VALUE}}',
                                                '{{WRAPPER}} .productDeals.lb01M11 .pi01Price:after' => 'background: {{VALUE}}',
                                        ],
                                ]
                        );
                        $this->add_responsive_control('pd_del_bar_margin', [
                                        'label' => esc_html__( 'Regular Bar Margin', 'uiuxom' ),
                                        'type' => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .dpcPriceWrap .pi01Price del:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .productDeals.lb01M11 .pi01Price del:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                        );
                        $this->add_responsive_control('pd_del_margin', [
                                        'label' => esc_html__( 'Regular Margin', 'uiuxom' ),
                                        'type' => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .dpcPriceWrap .pi01Price del' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                            '{{WRAPPER}} .productDeals.lb01M11 .pi01Price del' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                        );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control('pd_price_area_margin', [
                                'label' => esc_html__( 'Price Area Margin', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .dpcPriceWrap .pi01Price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .productDeals.lb01M11 .pi01Price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_301654', [
                    'label'         => esc_html__('Timer Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_control( 'timer_heading_01', [
				'label' => esc_html__( 'Timer Heading Style', 'uiuxom' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'none',
			]
		);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'pd_tm_heading_type',
                                'label'     => esc_html__( 'Heading Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .countDownWrap h6',
                        ]
                );
                $this->add_control('pd_tm_heading_color',[
                                'label'     => esc_html__( 'Heading Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .countDownWrap h6' => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control('pd_tm_heading_margin', [
                                'label' => esc_html__( 'Heading Margin Margin', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .countDownWrap h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'timer_heading_02', [
				'label' => esc_html__( 'Time Counter Style', 'uiuxom' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'none',
			]
		);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'pd_timer_time_typo',
                                'label'     => esc_html__( 'Time Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .ulinaCountDown .countdown-row span span:first-child',
                        ]
                );
                $this->add_control('pd_time_timer_color',[
                                'label'     => esc_html__( 'Time Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .ulinaCountDown .countdown-row span span:first-child' => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'pd_timer_time_BG',
                                'label' => esc_html__( 'Time Background', 'uiuxom' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .ulinaCountDown .countdown-row span span:first-child',
                        ]
                );
                $this->add_control( 'pd_timer_time_width', [
				'label' => esc_html__( 'Time Width', 'uiuxom' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [],
				'selectors' => [
					'{{WRAPPER}} .ulinaCountDown .countdown-row span span:first-child' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
                $this->add_control( 'pd_timer_time_height', [
				'label' => esc_html__( 'Time Height', 'uiuxom' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [],
				'selectors' => [
					'{{WRAPPER}} .ulinaCountDown .countdown-row span span:first-child' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'pd_timer_time_border',
                                'label' => esc_html__( 'Time Border', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .ulinaCountDown .countdown-row span span:first-child',
                        ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                'name' => 'pd_timer_time_shadow',
                                'label' => esc_html__( 'Time Shadow', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .ulinaCountDown .countdown-row span span:first-child',
                        ]
                );
                $this->add_control('pd_timer_time_radius', [
                                'label' => esc_html__( 'Time Radius', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .ulinaCountDown .countdown-row span span:first-child' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control('pd_timer_time_paddings', [
                                'label' => esc_html__( 'Time Padding', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .ulinaCountDown .countdown-row span span:first-child' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control('pd_timer_time_margin', [
                                'label' => esc_html__( 'Time Margin', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .ulinaCountDown .countdown-row span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_control( 'timer_heading_03', [
				'label' => esc_html__( 'Time Label Style', 'uiuxom' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'none',
			]
		);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'pd_timer_lb_typo',
                                'label'     => esc_html__( 'Time Label Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .ulinaCountDown .countdown-row span span:last-child',
                        ]
                );
                $this->add_control('pd_time_label_color',[
                                'label'     => esc_html__( 'Time Label Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .ulinaCountDown .countdown-row span span:last-child' => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control('pd_timer_label_margin', [
                                'label' => esc_html__( 'Time Label Margin', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .ulinaCountDown .countdown-row span span:last-child' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_control( 'timer_heading_04', [
				'label' => esc_html__( 'Time Clone (:) Style', 'uiuxom' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'none',
			]
		);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'pd_timer_cln_typo',
                                'label'     => esc_html__( 'Time Clone Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .ulinaCountDown .countdown-row span span:first-child:after',
                        ]
                );
                $this->add_control('pd_time_cln_color',[
                                'label'     => esc_html__( 'Time Clone Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .ulinaCountDown .countdown-row span span:first-child:after' => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control('pd_timer_cln_margin', [
                                'label' => esc_html__( 'Time Clone Margin', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .ulinaCountDown .countdown-row span span:first-child:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_control( 'timer_heading_05', [
				'label' => esc_html__( 'Timer Area Style', 'uiuxom' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'none',
			]
		);
                $this->add_responsive_control('pd_timer_area_padding', [
                                'label' => esc_html__( 'Area Padding', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .ulinaCountDown' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control('pd_timer_area_margin', [
                                'label' => esc_html__( 'Area Margin', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .ulinaCountDown' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_301', [
                    'label'         => esc_html__('Image Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_responsive_control('coll_img_paddings', [
                                'label' => esc_html__( 'Image Padding', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .dealProductImage' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .productDeals .lb01M11Img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control('coll_img_margin', [
                                'label' => esc_html__( 'Image Margin', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .dealProductImage' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .productDeals .lb01M11Img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_control( 'timer_heading_06', [
				'label' => esc_html__( 'Image Shape Styling', 'uiuxom' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'none',
			]
		);
                $this->add_control('pd_img_shape_bg',[
                                'label'     => esc_html__( 'Shape BG Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .dealProductImage:after' => 'background: {{VALUE}}',
                                        '{{WRAPPER}} .productDeals .lb01M11Img:after' => 'background: {{VALUE}}',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        
        
        
        $this->start_controls_section(
                'section_tab_43', [
                    'label'         => esc_html__('Button / Link Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_control( 'coll_btn_width', [
				'label' => esc_html__( 'Width', 'uiuxom' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [],
				'selectors' => [
					'{{WRAPPER}} .dealProductContent .ulinaBTN' => 'width: {{SIZE}}{{UNIT}};',
				],
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'dp_style',
                                                'operator'  => '==',
                                                'value'     => '1',
                                        ]
                                    ],
                                ],
			]
		);
                $this->add_control( 'coll_btn_height', [
				'label' => esc_html__( 'Height', 'uiuxom' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [],
				'selectors' => [
					'{{WRAPPER}} .dealProductContent .ulinaBTN' => 'height: {{SIZE}}{{UNIT}};',
				],
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'dp_style',
                                                'operator'  => '==',
                                                'value'     => '1',
                                        ]
                                    ],
                                ],
			]
		);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'coll_btn_type',
                                'label'     => esc_html__( 'BTN Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .dealProductContent .ulinaBTN, {{WRAPPER}} .productDeals .ulinaLink',
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'coll_btn_icon_type',
                                'label'     => esc_html__( 'Icon Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .productDeals .ulinaLink i',
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'dp_style',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->start_controls_tabs( 'style_tabs_2' );
                    $this->start_controls_tab('coll_btn_normal',['label' => esc_html__( 'Normal', 'uiuxom' ),]);
                        $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'col_btn_bg',
                                        'label' => esc_html__( 'Background', 'uiuxom' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .dealProductContent .ulinaBTN:after',
                                        'conditions'    => [
                                            'terms' => [
                                                [
                                                        'name'      => 'dp_style',
                                                        'operator'  => '==',
                                                        'value'     => '1',
                                                ]
                                            ],
                                        ],
                                ]
                        );
                        $this->add_control('col_btn_color',[
                                        'label'     => esc_html__( 'Color', 'uiuxom' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .dealProductContent .ulinaBTN' => 'color: {{VALUE}}',
                                                '{{WRAPPER}} .productDeals .ulinaLink' => 'color: {{VALUE}}',
                                        ],
                                ]
                        );
                        $this->add_control('col_btn_color_i',[
                                        'label'     => esc_html__( 'Icon Color', 'uiuxom' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .productDeals .ulinaLink i' => 'color: {{VALUE}}',
                                        ],
                                        'conditions'    => [
                                            'terms' => [
                                                [
                                                        'name'      => 'dp_style',
                                                        'operator'  => '==',
                                                        'value'     => '2',
                                                ]
                                            ],
                                        ],
                                ]
                        );
                        $this->add_group_control( Group_Control_Border::get_type(), [
                                        'name'      => 'col_btn_border',
                                        'label'     => esc_html__( 'Border', 'uiuxom' ),
                                        'selector'  => '{{WRAPPER}} .dealProductContent .ulinaBTN',
                                        'conditions'    => [
                                            'terms' => [
                                                [
                                                        'name'      => 'dp_style',
                                                        'operator'  => '==',
                                                        'value'     => '1',
                                                ]
                                            ],
                                        ],
                                ]
                        );
                        $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                        'name' => 'coll_btn_shadow',
                                        'label' => esc_html__( 'Shadow', 'uiuxom' ),
                                        'selector' => '{{WRAPPER}} .dealProductContent .ulinaBTN',
                                        'conditions'    => [
                                            'terms' => [
                                                [
                                                        'name'      => 'dp_style',
                                                        'operator'  => '==',
                                                        'value'     => '1',
                                                ]
                                            ],
                                        ],
                                ]
                        );
                    $this->end_controls_tab();
                    $this->start_controls_tab('coll_btn_hover',['label' => esc_html__( 'Hover', 'uiuxom' ),]);
                        $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'col_btn_bg_hover',
                                        'label' => esc_html__( 'Background', 'uiuxom' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .dealProductContent .ulinaBTN:before',
                                        'conditions'    => [
                                            'terms' => [
                                                [
                                                        'name'      => 'dp_style',
                                                        'operator'  => '==',
                                                        'value'     => '1',
                                                ]
                                            ],
                                        ],
                                ]
                        );
                        $this->add_control('col_btn_color_hover',[
                                        'label'     => esc_html__( 'Color', 'uiuxom' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .dealProductContent .ulinaBTN:hover' => 'color: {{VALUE}}',
                                                '{{WRAPPER}} .productDeals .ulinaLink:hover' => 'color: {{VALUE}}',
                                        ],
                                ]
                        );
                        $this->add_control('col_btn_color_hover_i',[
                                        'label'     => esc_html__( 'Icon Color', 'uiuxom' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .productDeals .ulinaLink:hover i' => 'color: {{VALUE}}',
                                        ],
                                        'conditions'    => [
                                            'terms' => [
                                                [
                                                        'name'      => 'dp_style',
                                                        'operator'  => '==',
                                                        'value'     => '2',
                                                ]
                                            ],
                                        ],
                                ]
                        );
                        $this->add_group_control( Group_Control_Border::get_type(), [
                                        'name'      => 'col_btn_border_hover',
                                        'label'     => esc_html__( 'Border', 'uiuxom' ),
                                        'selector'  => '{{WRAPPER}} .dealProductContent .ulinaBTN:hover',
                                        'conditions'    => [
                                            'terms' => [
                                                [
                                                        'name'      => 'dp_style',
                                                        'operator'  => '==',
                                                        'value'     => '1',
                                                ]
                                            ],
                                        ],
                                ]
                        );
                        $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                        'name' => 'coll_btn_shadow_hover',
                                        'label' => esc_html__( 'Shadow', 'uiuxom' ),
                                        'selector' => '{{WRAPPER}} .dealProductContent .ulinaBTN:hover',
                                        'conditions'    => [
                                            'terms' => [
                                                [
                                                        'name'      => 'dp_style',
                                                        'operator'  => '==',
                                                        'value'     => '1',
                                                ]
                                            ],
                                        ],
                                ]
                        );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control('col_btn_i_margin', [
                                'label' => esc_html__( 'Icon Margins', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .productDeals .ulinaLink i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'dp_style',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_responsive_control('col_btn_padding', [
                                'label' => esc_html__( 'BTN Padding', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .productDeals .ulinaLink' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .dealProductContent .ulinaBTN' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control('col_btn_margin', [
                                'label' => esc_html__( 'BTN Margin', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .productDeals .ulinaLink' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .dealProductContent .ulinaBTN' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();
        
        
    }
    protected function render() {
        $settings       = $this->get_settings_for_display();
        $dp_style       = (isset($settings['dp_style']) && $settings['dp_style'] > 0 ? $settings['dp_style'] : 1);
        
        $dp_sub_title = (isset($settings['dp_sub_title']) && $settings['dp_sub_title'] != '' ? $settings['dp_sub_title'] : '');
        $dp_title = (isset($settings['dp_title']) && $settings['dp_title'] != '' ? $settings['dp_title'] : '');
        $dp_desc = (isset($settings['dp_desc']) && $settings['dp_desc'] != '' ? $settings['dp_desc'] : '');
        $dp_sale_price = (isset($settings['dp_sale_price']) && $settings['dp_sale_price'] != '' ? $settings['dp_sale_price'] : '');
        $dp_regular_price = (isset($settings['dp_regular_price']) && $settings['dp_regular_price'] != '' ? $settings['dp_regular_price'] : '');
        $dp_btn_label = (isset($settings['dp_btn_label']) && $settings['dp_btn_label'] != '' ? $settings['dp_btn_label'] : '');
        $dp_timer_label = (isset($settings['dp_timer_label']) && $settings['dp_timer_label'] != '' ? $settings['dp_timer_label'] : '');
        $due_date = (isset($settings['due_date']) && $settings['due_date'] != '' ? $settings['due_date'] : '');
        $due_days = (isset($settings['due_days']) && $settings['due_days'] != '' ? $settings['due_days'] : '0');
        $dp_image = (isset($settings['dp_image']['id']) && $settings['dp_image']['id'] > 0 ? $settings['dp_image']['id'] : '0');
        
        $target         = isset($settings['dp_btn_url']['is_external']) ? ' target="_blank"' : '' ;
        $nofollow       = isset($settings['dp_btn_url']['nofollow']) ? ' rel="nofollow"' : '' ;
        $btn_url        = (isset($settings['dp_btn_url']['url']) && $settings['dp_btn_url']['url'] != '') ? $settings['dp_btn_url']['url'] : 'javascript:void(0);';
        if($dp_style == 2):
            ?>
            <div class="lookBook01 lb01M11 productDeals overLayAnim01">
                <div class="lbContent">
                     <?php if(!empty($dp_sub_title)): ?>
                    <h3><?php echo ulina_kses($dp_sub_title); ?></h3>
                    <?php endif; ?>
                    <?php if(!empty($dp_title)): ?>
                    <h2><?php echo ulina_kses($dp_title); ?></h2>
                    <?php endif; ?>
                    <?php if(!empty($dp_sale_price) || !empty($dp_regular_price)): ?>
                    <div class="pi01Price">
                        <?php if(!empty($dp_sale_price)): ?>
                            <ins><?php echo ulina_kses($dp_sale_price); ?></ins>
                        <?php endif; ?>
                        <?php if(!empty($dp_regular_price)): ?>
                            <del><?php echo ulina_kses($dp_regular_price); ?></del>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <?php if(!empty($dp_btn_label)): ?>
                    <a href="<?php echo esc_url($btn_url) ?>" <?php echo $target.' '.$nofollow; ?> class="ulinaLink"><i class="ulina-angle-right"></i><?php echo ulina_kses($dp_btn_label) ?></a>
                    <?php endif; ?>
                </div>
                <?php if($dp_image > 0): ?>
                <div class="lb01M11Img">
                    <img src="<?php echo ulina_attachment_url($dp_image, 125, 186); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                </div>
                <?php endif; ?>
                <?php if(!empty($due_date) || $due_days > 0): ?>
                <div class="countDownWrap">
                    <?php if(!empty($dp_timer_label)): ?>
                    <h6><?php echo ulina_kses($dp_timer_label)  ?></h6>
                    <?php endif; ?>
                    <?php if(!empty($due_date) || $due_days > 0): ?>
                        <div class="ulinaCountDownWrap <?php echo (!empty($due_date) && $due_date > date('Y-m-d') ? 'fromDate' : ($due_days > 0 ? 'fromAutoInc' : '')) ?>"
                             <?php if(!empty($due_date)): ?>
                             data-d="<?php echo date('d', strtotime($due_date)); ?>"
                             data-m="<?php echo date('m', strtotime($due_date)); ?>"
                             data-y="<?php echo date('Y', strtotime($due_date)); ?>"
                             <?php endif; ?>
                             <?php if($due_days > 0): ?>
                             data-days="<?php echo $due_days; ?>"
                             <?php endif; ?>
                             >
                            <div class="ulinaCountDown"></div>
                        </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php
        else:
            ?>
            <div class="row dealProductRow">
                <div class="col-lg-<?php echo ($dp_image > 0 ? 6 : 12); ?>">
                    <div class="dealProductContent">
                        <?php if(!empty($dp_sub_title)): ?>
                        <h5><?php echo ulina_kses($dp_sub_title); ?></h5>
                        <?php endif; ?>
                        <?php if(!empty($dp_title)): ?>
                        <h2><?php echo ulina_kses($dp_title); ?></h2>
                        <?php endif; ?>
                        <?php if(!empty($dp_desc)): ?>
                        <p><?php echo wp_strip_all_tags($dp_desc); ?></p>
                        <?php endif; ?>
                        <?php if(!empty($dp_sale_price) || !empty($dp_regular_price) || !empty($dp_btn_label)): ?>
                        <div class="dpcPriceWrap">
                            <?php if(!empty($dp_sale_price) || !empty($dp_regular_price)): ?>
                            <div class="pi01Price">
                                <?php if(!empty($dp_sale_price)): ?>
                                    <ins><?php echo ulina_kses($dp_sale_price); ?></ins>
                                <?php endif; ?>
                                <?php if(!empty($dp_regular_price)): ?>
                                    <del><?php echo ulina_kses($dp_regular_price); ?></del>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                            <?php if(!empty($dp_btn_label)): ?>
                                <a href="<?php echo esc_url($btn_url) ?>" <?php echo $target.' '.$nofollow; ?> class="ulinaBTN"><span><?php echo ulina_kses($dp_btn_label) ?></span></a>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <?php if(!empty($due_date) || $due_days > 0): ?>
                        <div class="countDownWrap">
                            <?php if(!empty($dp_timer_label)): ?>
                            <h6><?php echo ulina_kses($dp_timer_label)  ?></h6>
                            <?php endif; ?>
                            <?php if(!empty($due_date) || $due_days > 0): ?>
                                <div class="ulinaCountDownWrap <?php echo (!empty($due_date) && $due_date > date('Y-m-d') ? 'fromDate' : ($due_days > 0 ? 'fromAutoInc' : '')) ?>"
                                     <?php if(!empty($due_date)): ?>
                                     data-d="<?php echo date('d', strtotime($due_date)); ?>"
                                     data-m="<?php echo date('m', strtotime($due_date)); ?>"
                                     data-y="<?php echo date('Y', strtotime($due_date)); ?>"
                                     <?php endif; ?>
                                     <?php if($due_days > 0): ?>
                                     data-days="<?php echo $due_days; ?>"
                                     <?php endif; ?>
                                     >
                                    <div class="ulinaCountDown"></div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if($dp_image > 0): ?>
                <div class="col-lg-6">
                    <div class="dealProductImage">
                        <img src="<?php echo ulina_attachment_url($dp_image, 414, 576); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php
        endif;
    }
    
    protected function content_template() {}
}