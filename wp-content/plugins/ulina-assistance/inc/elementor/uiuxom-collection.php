<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Collection_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'uiuxom-collection';
    }
    
    public function get_title() {
        return esc_html__( 'Collection Lookbook', 'uiuxom' );
    }

    public function get_icon() {
        return 'eicon-product-info';
    }

    public function get_categories() {
        return [ 'uiuxom-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
                'section_tab_1', ['label'     => esc_html__('Collection Lookbook', 'uiuxom')]
        );
                $this->add_control( 'coll_style', [
                                'label' => esc_html__( 'Style', 'uiuxom' ),
                                'type'  => Controls_Manager::SELECT,
                                'default' => '1',
                                'options' => [
                                        '1'                 => esc_html__( 'Style 01', 'uiuxom' ),
                                        '2'                 => esc_html__( 'Style 02', 'uiuxom' ),
                                        '3'                 => esc_html__( 'Style 03', 'uiuxom' ),
                                        '4'                 => esc_html__( 'Style 04', 'uiuxom' ),
                                        '5'                 => esc_html__( 'Style 05', 'uiuxom' ),
                                        '6'                 => esc_html__( 'Style 06', 'uiuxom' ),
                                        '7'                 => esc_html__( 'Style 07', 'uiuxom' ),
                                        '8'                 => esc_html__( 'Style 08', 'uiuxom' ),
                                        '9'                 => esc_html__( 'Style 09', 'uiuxom' ),
                                        '10'                 => esc_html__( 'Style 10', 'uiuxom' ),
                                        '11'                 => esc_html__( 'Style 11', 'uiuxom' ),
                                ],
                        ]
                );
                $this->add_control( 'coll_image', [
                                'label' => esc_html__( 'Collection Image', 'uiuxom' ),
                                'label_block'   => TRUE,
                                'type' => Controls_Manager::MEDIA,
                                'default'       => [],
                                'description' => esc_html__('Image Sizes: 01 => 162x281, 02 => 266x300, 03 => 188x293, 04 => 151x276, 05 => 190x246, 06 => 245x158, 07 => 636x434, 08 => 416x308, 09 => 416x314, 10 => 416x314, 11 => 416x314', 'uiuxom')
                        ]
                );
                $this->add_control( 'coll_sub_title', [
                                'label' => esc_html__( 'Sub Title', 'uiuxom' ),
                                'type' => Controls_Manager::TEXT,
                                'default' => esc_html__( 'Get 40% Off', 'uiuxom' ),
                        ]
                );
                $this->add_control( 'coll_title', [
                                'label' => esc_html__( 'Title', 'uiuxom' ),
                                'type' => Controls_Manager::TEXT,
                                'default' => esc_html__( 'Man’s Latest Collection', 'uiuxom' ),
                        ]
                );
                $this->add_control( 'coll_btn_label', [
                                'label' => esc_html__( 'Link Label', 'uiuxom' ),
                                'type' => Controls_Manager::TEXT,
                                'default' => esc_html__( 'Shop Now', 'uiuxom' ),
                        ]
                );
                $this->add_control( 'coll_btn_url', [
                            'label'             => esc_html__( 'Link URL', 'uiuxom' ),
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
                $this->add_control( 'coll_discount_label', [
                                'label' => esc_html__( 'Discount Label', 'uiuxom' ),
                                'type' => Controls_Manager::TEXT,
                                'default' => esc_html__( '50% OFF', 'uiuxom' ),
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'coll_style',
                                                'operator'  => 'in',
                                                'value'     => ['8'],
                                        ]
                                    ],
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_30', [
                    'label'         => esc_html__('Area Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'col_area_bg',
                                'label' => esc_html__( 'Area Background', 'uiuxom' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .lookBook01',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'col_area_border',
                                'label' => esc_html__( 'Area Border', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .lookBook01',
                        ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                'name' => 'coll_area_shadow',
                                'label' => esc_html__( 'Area Shadow', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .lookBook01',
                        ]
                );
                $this->add_control('coll_area_radius', [
                                'label' => esc_html__( 'Area Radius', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .lookBook01' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control('coll_area_paddings', [
                                'label' => esc_html__( 'Area Padding', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .lookBook01' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control('coll_area_margin', [
                                'label' => esc_html__( 'Area Margin', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .lookBook01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_303434', [
                    'label'         => esc_html__('Content Area Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_responsive_control('coll_conarea_paddings', [
                                'label' => esc_html__( 'Content Area Padding', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .lbContent' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control('coll_conarea_margin', [
                                'label' => esc_html__( 'Content Area Margin', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .lbContent' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_7', [
                    'label'         => esc_html__('Sub Title Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'coll_sub_title_type',
                                'label'     => esc_html__( 'Sub Title Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .lbContent h3',
                        ]
                );
                $this->add_control('col_sub_title_color',[
                                'label'     => esc_html__( 'Sub Title Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .lbContent h3' => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control('col_sub_title_text_padding', [
                                'label' => esc_html__( 'Sub Title Padding', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .lbContent h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('col_sub_title_margin', [
                                'label' => esc_html__( 'Sub Title Margins', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .lbContent h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                'selector'  => '{{WRAPPER}} .lbContent h2',
                        ]
                );
                $this->add_control('col_title_color',[
                                'label'     => esc_html__( 'Title Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .lbContent h2' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control('col_title_padding', [
                                'label' => esc_html__( 'Title Padding', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .lbContent h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control('col_title_margin', [
                                'label' => esc_html__( 'Title Margins', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .lbContent h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();
        
        
        $this->start_controls_section(
                'section_tab_43', [
                    'label'         => esc_html__('Link Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'coll_btn_type',
                                'label'     => esc_html__( 'BTN Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .lbContent a.ulinaLink',
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'coll_btn_icon_type',
                                'label'     => esc_html__( 'Icon Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .lbContent a.ulinaLink i',
                        ]
                );
                $this->start_controls_tabs( 'style_tabs_2' );
                    $this->start_controls_tab('coll_btn_normal',['label' => esc_html__( 'Normal', 'uiuxom' ),]);
                        $this->add_control('col_btn_color',[
                                        'label'     => esc_html__( 'Color', 'uiuxom' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .lbContent a.ulinaLink' => 'color: {{VALUE}}',
                                        ],
                                ]
                        );
                        $this->add_control('col_btn_icon_color',[
                                        'label'     => esc_html__( 'Icon Color', 'uiuxom' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .lbContent a.ulinaLink i' => 'color: {{VALUE}}',
                                        ],
                                ]
                        );
                    $this->end_controls_tab();
                    $this->start_controls_tab('coll_btn_hover',['label' => esc_html__( 'Hover', 'uiuxom' ),]);
                        $this->add_control('col_btn_color_hover',[
                                        'label'     => esc_html__( 'Hover Color', 'uiuxom' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .lbContent a.ulinaLink' => 'color: {{VALUE}}',
                                        ],
                                ]
                        );
                        $this->add_control('col_btn_icon_color_hover',[
                                        'label'     => esc_html__( 'Hover Icon Color', 'uiuxom' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .lbContent a.ulinaLink i' => 'color: {{VALUE}}',
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
                                    '{{WRAPPER}} .lbContent a.ulinaLink i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control('col_btn_padding', [
                                'label' => esc_html__( 'Link Padding', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .lbContent a.ulinaLink' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control('col_btn_margin', [
                                'label' => esc_html__( 'Link Margin', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .lbContent a.ulinaLink' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_44', [
                    'label'         => esc_html__('Image Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms' => [
                            [
                                    'name'      => 'coll_style',
                                    'operator'  => '!in',
                                    'value'     => ['7', '8', '9', '10', '11'],
                            ]
                        ],
                    ],
                ]
        );
                $this->add_responsive_control('col_img_width', [
				'label' => esc_html__( 'Img Width', 'uiuxom' ),
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
					'{{WRAPPER}} .lookBook01 img' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);
                $this->add_responsive_control('col_img_height', [
				'label' => esc_html__( 'Img Height', 'uiuxom' ),
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
					'{{WRAPPER}} .lookBook01 img' => 'height: {{SIZE}}{{UNIT}};'
				],
			]
		);
                $this->add_responsive_control('col_img_margin', [
                                'label' => esc_html__( 'Image Margin', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .lookBook01 img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_45', [
                    'label'         => esc_html__('Shape Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms' => [
                            [
                                    'name'      => 'coll_style',
                                    'operator'  => '!in',
                                    'value'     => ['7', '8', '9', '10', '11'],
                            ]
                        ],
                    ],
                ]
        );
                $this->add_responsive_control('col_shape_width', [
				'label' => esc_html__( 'Shape Width', 'uiuxom' ),
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
					'{{WRAPPER}} .lookBook01:after' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);
                $this->add_responsive_control('col_shape_height', [
				'label' => esc_html__( 'Shape Height', 'uiuxom' ),
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
					'{{WRAPPER}} .lookBook01:after' => 'height: {{SIZE}}{{UNIT}};'
				],
			]
		);
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'col_shape_bg',
                                'label' => esc_html__( 'Shape Background', 'uiuxom' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .lookBook01:after',
                        ]
                );
                $this->add_responsive_control( 'col_shape_position', [
                                'label' => esc_html__( 'Shape Position', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'allowed_dimensions' => ['top', 'bottom'],
                                'selectors' => [
                                        '{{WRAPPER}}.lookBook01:after' => 'top: {{TOP}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control('col_shape_margin', [
                                'label' => esc_html__( 'Shape Margin', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'allowed_dimensions' => ['left', 'right'],
                                'selectors' => [
                                    '{{WRAPPER}} .lookBook01:after' => 'margin-left: {{LEFT}}{{UNIT}}; margin-right: {{RIGHT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_47', [
                    'label'         => esc_html__('Discount Label Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms' => [
                            [
                                    'name'      => 'coll_style',
                                    'operator'  => 'in',
                                    'value'     => ['8', '11'],
                            ]
                        ],
                    ],
                ]
        );
        $this->add_responsive_control('col_dis_width', [
				'label' => esc_html__( 'Width', 'uiuxom' ),
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
					'{{WRAPPER}} .discountLabel' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);
        $this->add_responsive_control('col_dis_height', [
				'label' => esc_html__( 'Height', 'uiuxom' ),
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
					'{{WRAPPER}} .discountLabel' => 'height: {{SIZE}}{{UNIT}};'
				],
			]
		);
        $this->add_group_control( Group_Control_Typography::get_type(), [
                        'name'      => 'coll_dis_type',
                        'label'     => esc_html__( 'Label Typography', 'uiuxom' ),
                        'selector'  => '{{WRAPPER}} .discountLabel',
                ]
        );
        $this->add_group_control( Group_Control_Background::get_type(), [
                        'name' => 'col_dis_bg',
                        'label' => esc_html__( 'Background', 'uiuxom' ),
                        'types' => [ 'classic', 'gradient'],
                        'selector' => '{{WRAPPER}} .discountLabel',
                ]
        );
        $this->add_responsive_control( 'col_dis_position', [
                        'label' => esc_html__( 'Position', 'uiuxom' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'allowed_dimensions' => ['right', 'bottom'],
                        'selectors' => [
                                '{{WRAPPER}} .discountLabel' => 'right: {{RIGHT}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control('col_dis_margin', [
                        'label' => esc_html__( 'Margin', 'uiuxom' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'allowed_dimensions' => ['top', 'left'],
                        'selectors' => [
                            '{{WRAPPER}} .discountLabel' => 'margin-left: {{LEFT}}{{UNIT}}; margin-top: {{TOP}}{{UNIT}};', 
                        ]
                ]
        );
        $this->end_controls_section();
        
        
    }
    protected function render() {
        $settings       = $this->get_settings_for_display();
        
        $coll_style      = (isset($settings['coll_style']) && $settings['coll_style'] > 0) ? $settings['coll_style'] : 1;
        $coll_image       = (isset($settings['coll_image']['id']) && $settings['coll_image']['id'] > 0) ? $settings['coll_image']['id'] : '';


        $coll_sub_title = (isset($settings['coll_sub_title']) && !empty($settings['coll_sub_title'])) ? $settings['coll_sub_title'] : esc_html__('Get 40% Off', 'uiuxom');
        $coll_title       = (isset($settings['coll_title']) && !empty($settings['coll_title'])) ? $settings['coll_title'] : esc_html__('Man’s Latest Collection', 'uiuxom');
        $coll_btn_label  = (isset($settings['coll_btn_label']) && $settings['coll_btn_label'] != '') ? $settings['coll_btn_label'] : '';
        
        $target         = isset($settings['coll_btn_url']['is_external']) ? ' target="_blank"' : '' ;
        $nofollow       = isset($settings['coll_btn_url']['nofollow']) ? ' rel="nofollow"' : '' ;
        $btn_url        = (isset($settings['coll_btn_url']['url']) && $settings['coll_btn_url']['url'] != '') ? $settings['coll_btn_url']['url'] : 'javascript:void(0);';
        
        $coll_discount_label  = (isset($settings['coll_discount_label']) && $settings['coll_discount_label'] != '') ? $settings['coll_discount_label'] : '';
        
        if($coll_style == 2):
            ?>
            <div class="lookBook01 lb01M1 overLayAnim01">
                <div class="lbContent">
                    <?php if(!empty($coll_sub_title)): ?>
                    <h3><?php echo ulina_kses($coll_sub_title) ?></h3>
                    <?php endif; ?>
                    <?php if(!empty($coll_title)): ?>
                    <h2><?php echo ulina_kses($coll_title) ?></h2>
                    <?php endif; ?>
                    <?php if(!empty($coll_btn_label)): ?>
                    <a href="<?php echo esc_url($btn_url) ?>" <?php echo $target.' '.$nofollow; ?> class="ulinaLink"><i class="ulina-angle-right"></i><?php echo ulina_kses($coll_btn_label); ?></a>
                    <?php endif; ?>
                </div>
                <?php if($coll_image > 0): ?>
                    <img src="<?php echo ulina_attachment_url($coll_image, 266, 300); ?>" alt="<?php echo esc_attr($coll_title); ?>">
                <?php else: ?>
                    <img src="https://via.placeholder.com/266x300.jpg?text=Ulina" alt="<?php echo esc_attr($coll_title); ?>">
                <?php endif; ?>
            </div>
            <?php
        elseif($coll_style == 3):
            ?>
            <div class="lookBook01 lb01M2 overLayAnim01">
                <div class="lbContent">
                    <?php if(!empty($coll_sub_title)): ?>
                    <h3><?php echo ulina_kses($coll_sub_title) ?></h3>
                    <?php endif; ?>
                    <?php if(!empty($coll_title)): ?>
                    <h2><?php echo ulina_kses($coll_title) ?></h2>
                    <?php endif; ?>
                    <?php if(!empty($coll_btn_label)): ?>
                    <a href="<?php echo esc_url($btn_url) ?>" <?php echo $target.' '.$nofollow; ?> class="ulinaLink"><i class="ulina-angle-right"></i><?php echo ulina_kses($coll_btn_label); ?></a>
                    <?php endif; ?>
                </div>
                <?php if($coll_image > 0): ?>
                    <img src="<?php echo ulina_attachment_url($coll_image, 188, 293); ?>" alt="<?php echo esc_attr($coll_title); ?>">
                <?php else: ?>
                    <img src="https://via.placeholder.com/188x293.jpg?text=Ulina" alt="<?php echo esc_attr($coll_title); ?>">
                <?php endif; ?>
            </div>
            <?php
        elseif($coll_style == 4):
            ?>
            <div class="lookBook01 lb01M3 overLayAnim01">
                <?php if($coll_image > 0): ?>
                    <img src="<?php echo ulina_attachment_url($coll_image, 151, 276); ?>" alt="<?php echo esc_attr($coll_title); ?>">
                <?php else: ?>
                    <img src="https://via.placeholder.com/151x276.jpg?text=Ulina" alt="<?php echo esc_attr($coll_title); ?>">
                <?php endif; ?>
                <div class="lbContent">
                    <?php if(!empty($coll_sub_title)): ?>
                    <h3><?php echo ulina_kses($coll_sub_title) ?></h3>
                    <?php endif; ?>
                    <?php if(!empty($coll_title)): ?>
                    <h2><?php echo ulina_kses($coll_title) ?></h2>
                    <?php endif; ?>
                    <?php if(!empty($coll_btn_label)): ?>
                    <a href="<?php echo esc_url($btn_url) ?>" <?php echo $target.' '.$nofollow; ?> class="ulinaLink"><i class="ulina-angle-right"></i><?php echo ulina_kses($coll_btn_label); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <?php
        elseif($coll_style == 5):
            ?>
            <div class="lookBook01 lb01M4 overLayAnim01">
                <div class="lbContent">
                    <?php if(!empty($coll_sub_title)): ?>
                    <h3><?php echo ulina_kses($coll_sub_title) ?></h3>
                    <?php endif; ?>
                    <?php if(!empty($coll_title)): ?>
                    <h2><?php echo ulina_kses($coll_title) ?></h2>
                    <?php endif; ?>
                    <?php if(!empty($coll_btn_label)): ?>
                    <a href="<?php echo esc_url($btn_url) ?>" <?php echo $target.' '.$nofollow; ?> class="ulinaLink"><i class="ulina-angle-right"></i><?php echo ulina_kses($coll_btn_label); ?></a>
                    <?php endif; ?>
                </div>
                <?php if($coll_image > 0): ?>
                    <img src="<?php echo ulina_attachment_url($coll_image, 190, 246); ?>" alt="<?php echo esc_attr($coll_title); ?>">
                <?php else: ?>
                    <img src="https://via.placeholder.com/190x246.jpg?text=Ulina" alt="<?php echo esc_attr($coll_title); ?>">
                <?php endif; ?>
            </div>
            <?php
        elseif($coll_style == 6):
            ?>
            <div class="lookBook01 lb01M5 overLayAnim01">
                <div class="lbContent">
                    <?php if(!empty($coll_sub_title)): ?>
                    <h3><?php echo ulina_kses($coll_sub_title) ?></h3>
                    <?php endif; ?>
                    <?php if(!empty($coll_title)): ?>
                    <h2><?php echo ulina_kses($coll_title) ?></h2>
                    <?php endif; ?>
                    <?php if(!empty($coll_btn_label)): ?>
                    <a href="<?php echo esc_url($btn_url) ?>" <?php echo $target.' '.$nofollow; ?> class="ulinaLink"><i class="ulina-angle-right"></i><?php echo ulina_kses($coll_btn_label); ?></a>
                    <?php endif; ?>
                </div>
                <?php if($coll_image > 0): ?>
                    <img src="<?php echo ulina_attachment_url($coll_image, 245, 158); ?>" alt="<?php echo esc_attr($coll_title); ?>">
                <?php else: ?>
                    <img src="https://via.placeholder.com/245x158.jpg?text=Ulina" alt="<?php echo esc_attr($coll_title); ?>">
                <?php endif; ?>
            </div>
        <?php elseif($coll_style == 7): ?>
            <div class="lookBook01 lb01M6 overLayAnim02">
                <div class="lbContent">
                    <?php if(!empty($coll_sub_title)): ?>
                    <h3><?php echo ulina_kses($coll_sub_title) ?></h3>
                    <?php endif; ?>
                    <?php if(!empty($coll_title)): ?>
                    <h2><?php echo ulina_kses($coll_title) ?></h2>
                    <?php endif; ?>
                    <?php if(!empty($coll_btn_label)): ?>
                    <a href="<?php echo esc_url($btn_url) ?>" <?php echo $target.' '.$nofollow; ?> class="ulinaLink"><i class="ulina-angle-right"></i><?php echo ulina_kses($coll_btn_label); ?></a>
                    <?php endif; ?>
                </div>
                <?php if($coll_image > 0): ?>
                    <img src="<?php echo ulina_attachment_url($coll_image, 636, 434); ?>" alt="<?php echo esc_attr($coll_title); ?>">
                <?php else: ?>
                    <img src="https://via.placeholder.com/636x434.jpg?text=Ulina" alt="<?php echo esc_attr($coll_title); ?>">
                <?php endif; ?>
            </div>
        <?php elseif($coll_style == 8): ?>
            <div class="lookBook01 lb01M7 overLayAnim03">
                <div class="lbContent">
                    <?php if(!empty($coll_sub_title)): ?>
                    <h3><?php echo ulina_kses($coll_sub_title) ?></h3>
                    <?php endif; ?>
                    <?php if(!empty($coll_title)): ?>
                    <h2><?php echo ulina_kses($coll_title) ?></h2>
                    <?php endif; ?>
                    <?php if(!empty($coll_btn_label)): ?>
                    <a href="<?php echo esc_url($btn_url) ?>" <?php echo $target.' '.$nofollow; ?> class="ulinaLink"><i class="ulina-angle-right"></i><?php echo ulina_kses($coll_btn_label); ?></a>
                    <?php endif; ?>
                </div>
                <?php if($coll_image > 0): ?>
                    <img src="<?php echo ulina_attachment_url($coll_image, 416, 314); ?>" alt="<?php echo esc_attr($coll_title); ?>">
                <?php else: ?>
                    <img src="https://via.placeholder.com/416x314.jpg?text=Ulina" alt="<?php echo esc_attr($coll_title); ?>">
                <?php endif; ?>
                <?php if(!empty($coll_discount_label)): ?>
                <div class="discountLabel">
                    <?php echo ulina_kses($coll_discount_label); ?>
                </div>
                <?php endif; ?>
            </div>
        <?php elseif($coll_style == 9): ?>
            <div class="lookBook01 lb01M9 overLayAnim02">
                <div class="lbContent">
                    <?php if(!empty($coll_sub_title)): ?>
                    <h3><?php echo ulina_kses($coll_sub_title) ?></h3>
                    <?php endif; ?>
                    <?php if(!empty($coll_title)): ?>
                    <h2><?php echo ulina_kses($coll_title) ?></h2>
                    <?php endif; ?>
                    <?php if(!empty($coll_btn_label)): ?>
                    <a href="<?php echo esc_url($btn_url) ?>" <?php echo $target.' '.$nofollow; ?> class="ulinaLink"><i class="ulina-angle-right"></i><?php echo ulina_kses($coll_btn_label); ?></a>
                    <?php endif; ?>
                </div>
                <?php if($coll_image > 0): ?>
                    <img src="<?php echo ulina_attachment_url($coll_image, 416, 314); ?>" alt="<?php echo esc_attr($coll_title); ?>">
                <?php else: ?>
                    <img src="https://via.placeholder.com/416x314.jpg?text=Ulina" alt="<?php echo esc_attr($coll_title); ?>">
                <?php endif; ?>
            </div>
        <?php elseif($coll_style == 10): ?>
            <div class="lookBook01 lb01M8 overLayAnim02">
                <div class="lbContent">
                    <?php if(!empty($coll_sub_title)): ?>
                    <h3><?php echo ulina_kses($coll_sub_title) ?></h3>
                    <?php endif; ?>
                    <?php if(!empty($coll_title)): ?>
                    <h2><?php echo ulina_kses($coll_title) ?></h2>
                    <?php endif; ?>
                    <?php if(!empty($coll_btn_label)): ?>
                    <a href="<?php echo esc_url($btn_url) ?>" <?php echo $target.' '.$nofollow; ?> class="ulinaLink"><i class="ulina-angle-right"></i><?php echo ulina_kses($coll_btn_label); ?></a>
                    <?php endif; ?>
                </div>
                <?php if($coll_image > 0): ?>
                    <img src="<?php echo ulina_attachment_url($coll_image, 416, 314); ?>" alt="<?php echo esc_attr($coll_title); ?>">
                <?php else: ?>
                    <img src="https://via.placeholder.com/416x314.jpg?text=Ulina" alt="<?php echo esc_attr($coll_title); ?>">
                <?php endif; ?>
            </div>
        <?php elseif($coll_style == 11): ?>
            <div class="lookBook01 lb01M10 overLayAnim03">
                <div class="lbContent">
                    <?php if(!empty($coll_sub_title)): ?>
                    <h3><?php echo ulina_kses($coll_sub_title) ?></h3>
                    <?php endif; ?>
                    <?php if(!empty($coll_title)): ?>
                    <h2><?php echo ulina_kses($coll_title) ?></h2>
                    <?php endif; ?>
                    <?php if(!empty($coll_btn_label)): ?>
                    <a href="<?php echo esc_url($btn_url) ?>" <?php echo $target.' '.$nofollow; ?> class="ulinaLink"><i class="ulina-angle-right"></i><?php echo ulina_kses($coll_btn_label); ?></a>
                    <?php endif; ?>
                </div>
                <?php if($coll_image > 0): ?>
                    <img src="<?php echo ulina_attachment_url($coll_image, 416, 314); ?>" alt="<?php echo esc_attr($coll_title); ?>">
                <?php else: ?>
                    <img src="https://via.placeholder.com/416x314.jpg?text=Ulina" alt="<?php echo esc_attr($coll_title); ?>">
                <?php endif; ?>
                <?php if(!empty($coll_discount_label)): ?>
                <div class="discountLabel">
                    <?php echo ulina_kses($coll_discount_label); ?>
                </div>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <div class="lookBook01 lb01M0 overLayAnim01">
                <div class="lbContent">
                    <?php if(!empty($coll_sub_title)): ?>
                    <h3><?php echo ulina_kses($coll_sub_title) ?></h3>
                    <?php endif; ?>
                    <?php if(!empty($coll_title)): ?>
                    <h2><?php echo ulina_kses($coll_title) ?></h2>
                    <?php endif; ?>
                    <?php if(!empty($coll_btn_label)): ?>
                    <a href="<?php echo esc_url($btn_url) ?>" <?php echo $target.' '.$nofollow; ?> class="ulinaLink"><i class="ulina-angle-right"></i><?php echo ulina_kses($coll_btn_label); ?></a>
                    <?php endif; ?>
                </div>
                <?php if($coll_image > 0): ?>
                    <img src="<?php echo ulina_attachment_url($coll_image, 162, 281); ?>" alt="<?php echo esc_attr($coll_title); ?>">
                <?php else: ?>
                    <img src="https://via.placeholder.com/162x281.jpg?text=Ulina" alt="<?php echo esc_attr($coll_title); ?>">
                <?php endif; ?>
            </div>
            <?php
        endif;
        
    }
    
    protected function content_template() {}
}