<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Icon_Box_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'uiuxom-icon-box';
    }
    
    public function get_title() {
        return esc_html__( 'Icon Box', 'uiuxom' );
    }

    public function get_icon() {
        return 'eicon-icon-box';
    }

    public function get_categories() {
        return [ 'uiuxom-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' => esc_html__( 'Icon Box', 'uiuxom' ),
            ]
        );
                $this->add_control( 'icon_or_image', [
                                'label'     => esc_html__( 'Icon Or Image', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => 1,
                                'options'   => [
                                        1       => esc_html__( 'Icon', 'uiuxom' ),
                                        2       => esc_html__( 'Image', 'uiuxom' ),
                                ],
                        ]
                );
                $this->add_control( 'icons', [
                                'label'     => esc_html__( 'Icon', 'uiuxom' ),
                                'type'      => Controls_Manager::ICON,
                                'label_block'   => TRUE,
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'icon_or_image',
                                                'operator'  => '==',
                                                'value'     => '1',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'images', [
                                'label' => esc_html__( 'Choose Image', 'uiuxom' ),
                                'label_block'   => TRUE,
                                'type' => Controls_Manager::MEDIA,
                                'default' => [],
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'icon_or_image',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control('box_title', [
                                'label'         => esc_html__( 'Box Title', 'uiuxom' ),
                                'type'          => Controls_Manager::TEXT,
                                'default'       => esc_html__('Box Title', 'uiuxom'),
                                'label_block'   => TRUE,
                                'placeholder'   => esc_html__('Box Title', 'uiuxom')
                        ]
                );
                $this->add_control( 'box_desc', [
                                'label'         => esc_html__( 'Box Content', 'uiuxom' ),
                                'type'          => Controls_Manager::TEXTAREA,
                                'default'       => esc_html__('Box content goes here.', 'uiuxom'),
                                'placeholder'   => esc_html__('Insert Content Here.', 'uiuxom'),
                        ]
                );
                $this->add_control( 'box_url', [
                            'label'             => esc_html__( 'Box URL', 'uiuxom' ),
                            'description'       => esc_html__( 'Leave blank if you do not want to link it.', 'uiuxom' ),
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
                $this->add_responsive_control( 'box_alignment', [
                                'label'                     =>esc_html__( 'Box Alignment', 'uiuxom' ),
                                'type'                      => Controls_Manager::CHOOSE,
                                'options'                   => [
                                        'left'       => [
                                                'title'  => esc_html__( 'Left', 'uiuxom' ),
                                                'icon'   => 'eicon-text-align-left',
                                        ],
                                        'center'     => [
                                                'title'  => esc_html__( 'Center', 'uiuxom' ),
                                                'icon'   => 'eicon-text-align-center',
                                        ],
                                        'right'      => [
                                                'title'  => esc_html__( 'Right', 'uiuxom' ),
                                                'icon'   => 'eicon-text-align-right',
                                        ]
                                ],
                                'default'                   => 'left',
                                'prefix_class'              => 'box_holder elementor%s-align-',
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_1', [
                    'label'         => esc_html__('Box Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_responsive_control( 'icon_box_radius', [
                                'label' => esc_html__( 'Radius', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .iconBox01' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_padding', [
                                'label' => esc_html__( 'Paddings', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox01' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_margin', [
                                'label' => esc_html__( 'Margins', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->start_controls_tabs( 'ib_box_tot' );
                    $this->start_controls_tab( 'ib_box_nr', [ 'label' => esc_html__( 'Normal', 'uiuxom' )] );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                            'name' => 'icon_box_bg',
                                            'label' => esc_html__( 'Box Background', 'uiuxom' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .iconBox01',
                                    ]
                            );
                            $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'icon_box_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .iconBox01',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'box_border',
                                            'label' => esc_html__( 'Box Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .iconBox01',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab( 'ib_box_hr', [ 'label' => esc_html__( 'Hover', 'uiuxom' )] );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                            'name' => 'icon_box_bg_hr',
                                            'label' => esc_html__( 'Box Background', 'uiuxom' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .iconBox01:hover',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'icon_box_shadow_hr',
                                            'label' => esc_html__( 'Box Shadow', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .iconBox01:hover',
                                    ]
                            );
                            $this->add_group_control(Group_Control_Border::get_type(), [
                                            'name' => 'box_border_hr',
                                            'label' => esc_html__( 'Box Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .iconBox01:hover',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_2',[
                    'label'         => esc_html__('Icon Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms' => [
                            [
                                    'name'      => 'icon_or_image',
                                    'operator'  => '!in',
                                    'value'     => ['2'],
                            ]
                        ],
                    ],
                ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'icon_box_i_typography',
                                'label'     => esc_html__( 'Icon Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .iconBox01 > i'
                        ]
                );
                $this->start_controls_tabs( 'ib_icon_tot' );
                        $this->start_controls_tab( 'ib_icon_nr', [ 'label' => esc_html__( 'Normal', 'uiuxom' )] );
                                $this->add_responsive_control( 'icon_box_i_color',[
                                                'label'     => esc_html__( 'Icon Color', 'uiuxom' ),
                                                'type'      => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .iconBox01 > i' => 'color: {{VALUE}}',
                                                ]
                                        ]
                                );
                                $this->add_group_control( Group_Control_Background::get_type(), [
                                                'name' => 'icon_box_i_bg_color',
                                                'label' => esc_html__( 'Icon Background', 'uiuxom' ),
                                                'types' => [ 'classic', 'gradient'],
                                                'selector' => '{{WRAPPER}} .iconBox01 > i',
                                        ]
                                );
                        $this->end_controls_tab();
                        $this->start_controls_tab( 'ib_icon_hr', [ 'label' => esc_html__( 'Box Hover', 'uiuxom' )] );
                                $this->add_responsive_control( 'icon_box_i_color_hover',[
                                                'label'     => esc_html__( 'Icon Color', 'uiuxom' ),
                                                'type'      => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .iconBox01:hover > i' => 'color: {{VALUE}}',
                                                ]
                                        ]
                                );
                                $this->add_group_control( Group_Control_Background::get_type(), [
                                                'name' => 'icon_box_i_bg_color_hover',
                                                'label' => esc_html__( 'Icon Background', 'uiuxom' ),
                                                'types' => [ 'classic', 'gradient'],
                                                'selector' => '{{WRAPPER}} .iconBox01:hover > i',
                                        ]
                                );
                        $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_control( 'hr_1', [ 'type' => \Elementor\Controls_Manager::DIVIDER, ] );
                $this->add_responsive_control( 'icon_box_i_width', [
                                'label' => __( 'Width', 'uiuxom' ),
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
                                        '{{WRAPPER}} .iconBox01 > i' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_i_height', [
                                'label' => __( 'Height', 'uiuxom' ),
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
                                        '{{WRAPPER}} .iconBox01 > i' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'icon_box_i_border_hr',
                                'label' => esc_html__( 'Border', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .iconBox01 > i',
                        ]
                );
                $this->add_control( 'icon_box_i_radius', [
                            'label' => esc_html__( 'Border Radius', 'uiuxom' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .iconBox01 > i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'icon_box_i__shadow',
                                'label' => esc_html__( 'Box Shadow', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .iconBox01 > i',
                        ]
                );
                $this->add_control( 'icon_box_i_padding', [
                                'label' => esc_html__( 'Paddings', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .iconBox01 > i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_control( 'icon_box_i_margin', [
                                'label' => esc_html__( 'Margins', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .iconBox01 > i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_img',[
                    'label'         => esc_html__('Image Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms' => [
                            [
                                    'name'      => 'icon_or_image',
                                    'operator'  => '==',
                                    'value'     => '2',
                            ]
                        ],
                    ],
                ]
        );
                $this->add_responsive_control( 'icon_box_area_img_width', [
                                'label' => esc_html__( 'Image Area Width', 'uiuxom' ),
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
                                        '{{WRAPPER}} .iconBox01 .ib01Img' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_area_img_height', [
                                'label' => esc_html__( 'Image Area Height', 'uiuxom' ),
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
                                        '{{WRAPPER}} .iconBox01 .ib01Img' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_img_width', [
                                'label' => esc_html__( 'Image Width', 'uiuxom' ),
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
                                        '{{WRAPPER}} .iconBox01 .ib01Img img' => 'max-width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_img_height', [
                                'label' => esc_html__( 'Image Height', 'uiuxom' ),
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
                                        '{{WRAPPER}} .iconBox01 .ib01Img img' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->start_controls_tabs( 'ib_img_tot' );
                    $this->start_controls_tab( 'ib_img_nr', [ 'label' => esc_html__( 'Normal', 'uiuxom' )] );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                            'name' => 'icon_box_img_bgcolor',
                                            'label' => esc_html__( 'Image Background', 'uiuxom' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .iconBox01 .ib01Img',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab( 'ib_img_hr', [ 'label' => esc_html__( 'Hover', 'uiuxom' )] );
                            $this->add_group_control(
                                    Group_Control_Background::get_type(),
                                    [
                                            'name' => 'icon_box_hover_img_bgcolor_hr',
                                            'label' => esc_html__( 'Box Hover Image Background', 'uiuxom' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .iconBox01:hover .ib01Img',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
            
                $this->add_group_control(
                        Group_Control_Box_Shadow::get_type(), [
                                'name' => 'icon_box_img_shadow',
                                'label' => esc_html__( 'Box Shadow', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .iconBox01 .ib01Img',
                        ]
                );
                $this->add_control( 'icon_box_img_radius', [
                                'label' => esc_html__( 'Border Radius', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .iconBox01 .ib01Img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_control( 'icon_box_img_padding', [
                                'label' => esc_html__( 'Paddings', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .iconBox01 .ib01Img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_control(
                        'icon_box_img_margin', [
                                'label' => esc_html__( 'Margins', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox01 .ib01Img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_3',[
                    'label'         => esc_html__('Title Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE
                ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'icon_box_title_typo',
                                'label'     => esc_html__( 'Title Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .iconBox01 h3',
                        ]
                );
                $this->add_control('icon_box_title_color',[
                                'label'     => esc_html__( 'Title Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox01 h3' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control( 'icon_box_hover_title_color2',[
                                'label'     => esc_html__( 'Box Hover Title Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox01:hover h3' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control( 'icon_box_title_padding', [
                                'label'      => esc_html__( 'Title Padding', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .iconBox01 h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'icon_box_title_margin', [
                                'label'      => esc_html__( 'Title Margin', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .iconBox01 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_4', [
                    'label'         => esc_html__('Box Content Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'icon_box_content_typo',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .iconBox01 p',
                        ]
                );
                $this->add_control( 'icon_box_content_color',[
                                'label'     => esc_html__( 'Content Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox01 p' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control( 'icon_box_hover_content_color',[
                                'label'     => esc_html__( 'Box Hover Content Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .iconBox01:hover p' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control( 'icon_box_content_padding', [
                                'label'      => esc_html__( 'Padding', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .iconBox01 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'icon_box_content_margin', [
                                'label'      => esc_html__( 'Margin', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .iconBox01 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

    }
    
    protected function render() {
        $settings        = $this->get_settings_for_display();
        
        $icon_or_image   = (isset($settings['icon_or_image']) && $settings['icon_or_image'] > 0 ) ? $settings['icon_or_image'] : 1;
        $icons          = (isset($settings['icons']) && $settings['icons'] != '') ? $settings['icons'] : 'ulina-hours-support';
        $box_alignment = (isset($settings['box_alignment']) && $settings['box_alignment'] != '') ? $settings['box_alignment'] : 'left';
        $images         = (isset($settings['images']['url']) && $settings['images']['url'] != '') ? $settings['images']['url'] : '';
        
        $box_title      = (isset($settings['box_title']) && $settings['box_title'] != '') ? $settings['box_title'] : esc_html__('Box Title', 'uiuxom');
        $desc           = (isset($settings['box_desc']) && $settings['box_desc'] != '') ? $settings['box_desc'] : '';
        
        
        $target      = isset($settings['box_url']['is_external']) ? ' target="_blank"' : '' ;
        $nofollow    = isset($settings['box_url']['nofollow']) ? ' rel="nofollow"' : '' ;
        $url         = (isset($settings['box_url']['url']) && $settings['box_url']['url'] != '') ? $settings['box_url']['url'] : '';
        
        ?>
        <?php if($url != ''): ?><a class="iconBox01" href="<?php echo esc_url($url) ?>" <?php echo esc_attr($target.$nofollow); ?> ><?php else: ?><div class="iconBox01"><?php endif; ?>
            <?php if($icon_or_image == 2 && !empty($images)): ?>
                <div class="ib01Img">
                    <img src="<?php echo esc_url($images) ?>" alt="<?php echo esc_attr($box_title); ?>"/>
                </div>
            <?php elseif($icon_or_image == 1 && !empty($icons)): ?>
            <i class="<?php echo esc_attr($icons); ?>"></i>
            <?php endif; ?>
            <h3><?php echo ulina_kses($box_title); ?></h3>
            <?php if(!empty($desc)): ?>
            <p>
                <?php echo ulina_kses($desc); ?>
            </p>
            <?php endif; ?>
        <?php if($url != ''): ?></a><?php else: ?></div><?php endif; ?>
        <?php
        
    }
    
    protected function content_template() {

    }
    
    
}