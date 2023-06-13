<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Latest_Blog_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'uiuxom-latest-blog';
    }
    
    public function get_title() {
        return esc_html__( 'Latest Blog Post', 'uiuxom' );
    }

    public function get_icon() {
        return 'eicon-post-list';
    }

    public function get_categories() {
        return [ 'uiuxom-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' => esc_html__( 'Blog Post', 'uiuxom' ),
            ]
        );
                $this->add_control( 'lb_view_style', [
                                'label' => esc_html__( 'View Mode Style', 'uiuxom' ),
                                'type'  => Controls_Manager::SELECT,
                                'default' => 1,
                                'options' => [
                                        1                 => esc_html__( 'Grid', 'uiuxom' ),
                                        2                 => esc_html__( 'Slide', 'uiuxom' ),
                                        3                 => esc_html__( 'Mation Grid', 'uiuxom' ),
                                ],
                        ]
                );
                $this->add_control( 'lb_post_style', [
                                'label' => esc_html__( 'Post Style', 'uiuxom' ),
                                'type'  => Controls_Manager::SELECT,
                                'default' => 1,
                                'options' => [
                                        1                 => esc_html__( 'Style 01', 'uiuxom' ),
                                        2                 => esc_html__( 'Style 02', 'uiuxom' )
                                ],
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'lb_view_style',
                                                'operator'  => '!in',
                                                'value'     => ['3'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'lb_xl_col', [
                                'label'     => esc_html__( 'Select XL Col', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => '3',
                                'options'   => [
                                        '2'       => esc_html__( '2 Column', 'uiuxom' ),
                                        '3'       => esc_html__( '3 Column', 'uiuxom' ),
                                        '4'       => esc_html__( '4 Column', 'uiuxom' ),
                                        '6'       => esc_html__( '6 Column', 'uiuxom' ),
                                ],
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'lb_view_style',
                                                'operator'  => '!in',
                                                'value'     => ['3'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'lb_lg_col', [
                                'label'     => esc_html__( 'Select LG Col', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => '3',
                                'options'   => [
                                        '2'       => esc_html__( '2 Column', 'uiuxom' ),
                                        '3'       => esc_html__( '3 Column', 'uiuxom' ),
                                        '4'       => esc_html__( '4 Column', 'uiuxom' )
                                ],
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'lb_view_style',
                                                'operator'  => '!in',
                                                'value'     => ['3'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'lb_md_col', [
                                'label'     => esc_html__( 'Select MD Col', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => '2',
                                'options'   => [
                                        '2'       => esc_html__( '2 Column', 'uiuxom' ),
                                        '3'       => esc_html__( '3 Column', 'uiuxom' ),
                                        '4'       => esc_html__( '4 Column', 'uiuxom' )
                                ],
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'lb_view_style',
                                                'operator'  => '!in',
                                                'value'     => ['3'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'lb_sm_col', [
                                'label'     => esc_html__( 'Select SM Col', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => '1',
                                'options'   => [
                                        '1'       => esc_html__( '1 Column', 'uiuxom' ),
                                        '2'       => esc_html__( '2 Column', 'uiuxom' ),
                                        '3'       => esc_html__( '3 Column', 'uiuxom' ),
                                        '4'       => esc_html__( '4 Column', 'uiuxom' )
                                ],
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'lb_view_style',
                                                'operator'  => '!in',
                                                'value'     => ['3'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'lb_items_gapping', [
                                'label' => esc_html__( 'Items Gapping', 'uiuxom' ),
                                'type' => Controls_Manager::NUMBER,
                                'min' => 0,
                                'max' => 60,
                                'step' => 1,
                                'default' => 24,
                                'description'       => esc_html__('Insert items gapping if you want.', 'uiuxom'),
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'lb_view_style',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control('lb_category', [
                                'label' => esc_html__('Blog Category', 'uiuxom'),
                                'type' => 'uiuxom_autocomplete',
                                'description' => esc_html__('Select blog category.', 'uiuxom'),
                                'action' => 'uiuxom_get_taxonomy',
                                'taxonomy' => 'category',
                                'multiple' => true,
                        ]
                );
                $this->add_control( 'lb_specific', [
                                'label'         => esc_html__( 'Specific Post', 'uiuxom' ),
                                'type'          => Controls_Manager::SELECT2,
                                'label_block'   => TRUE,
                                'multiple'      => true,
                                'default'       => array('0'),
                                'options'       => ulina_post_array('post', esc_html__('All Post', 'uiuxom')),
                        ]
                );
                $this->add_control( 'rm_label', [
                                'label'         => esc_html__( 'Read More Label', 'uiuxom' ),
                                'type'          => Controls_Manager::TEXT,
                                'default'       => esc_html__('Read More', 'uiuxom'),
                                'label_block'   => TRUE,
                                'placeholder'   => esc_html__('Read More', 'uiuxom'),
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'lb_post_style',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control(
                        'lb_slide_autoplay', [
                                'label'             => esc_html__( 'Is Autoplay?', 'uiuxom' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'uiuxom' ),
                                'label_off'         => esc_html__( 'No', 'uiuxom' ),
                                'description'       => esc_html__('Do you want to make this slider auto play?', 'uiuxom'),
                                'return_value'      => 'yes',
                                'default'           => 'yes',
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'lb_view_style',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'lb_slide_loop', [
                                'label'             => esc_html__( 'Is Loop?', 'uiuxom' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'uiuxom' ),
                                'label_off'         => esc_html__( 'No', 'uiuxom' ),
                                'description'       => esc_html__('Do you want to make this slider item loop?', 'uiuxom'),
                                'return_value'      => 'yes',
                                'default'           => 'yes',
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'lb_view_style',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'lb_slide_nav', [
                                'label'             => esc_html__( 'Is Nav?', 'uiuxom' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'uiuxom' ),
                                'label_off'         => esc_html__( 'No', 'uiuxom' ),
                                'description'       => esc_html__('Do you want to show slider arrow navigation?', 'uiuxom'),
                                'return_value'      => 'yes',
                                'default'           => 'no',
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'lb_view_style',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'lb_slide_dots', [
                                'label'             => esc_html__( 'Is Dots?', 'uiuxom' ),
                                'type'              => Controls_Manager::SWITCHER,
                                'label_on'          => esc_html__( 'Yes', 'uiuxom' ),
                                'label_off'         => esc_html__( 'No', 'uiuxom' ),
                                'description'       => esc_html__('Do you want to show slider bullets item?', 'uiuxom'),
                                'return_value'      => 'yes',
                                'default'           => 'no',
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'lb_view_style',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'lb_post_thumb_width', [
                                'label'         => esc_html__( 'Post Thumb Width', 'uiuxom' ),
                                'type'          => Controls_Manager::NUMBER,
                                'min'           => 1,
                                'max'           => 2000,
                                'step'          => 1,
                                'default'       => '',
                                'description'   => esc_html__( 'You can set here a custom width for post thumbnail.', 'uiuxom' ),
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'lb_view_style',
                                                'operator'  => '!in',
                                                'value'     => ['3'],
                                        ],
                                        [
                                                'name'      => 'lb_post_style',
                                                'operator'  => '!in',
                                                'value'     => ['2'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'lb_post_thumb_height', [
                                'label'         => esc_html__( 'Post Thumb Height', 'uiuxom' ),
                                'type'          => Controls_Manager::NUMBER,
                                'min'           => 1,
                                'max'           => 2000,
                                'step'          => 1,
                                'default'       => '',
                                'description'   => esc_html__( 'You can set here a custom height for post thumbnail.', 'uiuxom' ),
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'lb_view_style',
                                                'operator'  => '!in',
                                                'value'     => ['3'],
                                        ],
                                        [
                                                'name'      => 'lb_post_style',
                                                'operator'  => '!in',
                                                'value'     => ['2'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'lb_post_item', [
                                'label'         => esc_html__( 'Number Of Item', 'uiuxom' ),
                                'type'          => Controls_Manager::NUMBER,
                                'min'           => 1,
                                'max'           => 200,
                                'step'          => 1,
                                'default'       => 3,
                                'description'   => esc_html__( 'How many item you want to show.', 'uiuxom' ),
                        ]
                );
                $this->add_control( 'lb_order_by', [
                                'label' => esc_html__( 'Order By', 'uiuxom' ),
                                'type'  => Controls_Manager::SELECT,
                                'default' => 'date',
                                'options' => [
                                        'date'                  => esc_html__( 'Date', 'uiuxom' ),
                                        'title'                 => esc_html__( 'Title', 'uiuxom' ),
                                        'rand'                  => esc_html__( 'Random', 'uiuxom' ),
                                        'comment_count'         => esc_html__( 'Comment', 'uiuxom' ),
                                ],
                        ]
                );
                $this->add_control( 'lb_order', [
                                'label' => esc_html__( 'Order', 'uiuxom' ),
                                'type'  => Controls_Manager::SELECT,
                                'default' => 'desc',
                                'options' => [
                                        'asc'        => esc_html__( 'Ascending', 'uiuxom' ),
                                        'desc'       => esc_html__( 'Descending', 'uiuxom' ),
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_01', [
                'label'         => esc_html__( 'Item Style', 'uiuxom' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_group_control(Group_Control_Background::get_type(),[
                                'name' => 'lb_item_bg',
                                'label' => esc_html__( 'Item Background', 'uiuxom' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .blogItem02, {{WRAPPER}} .blogItem03',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'lb_item_border',
                                'label' => esc_html__( 'Border', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .blogItem02, {{WRAPPER}} .blogItem03',
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'lb_item_shadow',
                                'label' => esc_html__( 'Box Shadow', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .blogItem01, {{WRAPPER}} .blogItem02, {{WRAPPER}} .blogItem03',
                        ]
                );
                $this->add_responsive_control( 'lb_item_readius', [
                                'label'      => esc_html__( 'Border Radius', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .blogItem01' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .blogItem02' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .blogItem03' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_item_padding', [
                                'label'      => esc_html__( 'Item Paddings', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .blogItem01' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .blogItem02' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .blogItem03' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_item_margin', [
                                'label'      => esc_html__( 'Item Margin', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .blogItem01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .blogItem02' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .blogItem03' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_02', [
                'label'         => esc_html__( 'Thumb and Date Style', 'uiuxom' ),
                'tab'           => Controls_Manager::TAB_STYLE,
                'conditions'    => [
                    'terms' => [
                        [
                                'name'      => 'lb_post_style',
                                'operator'  => '==',
                                'value'     => '1',
                        ]
                    ],
                ],
            ]
        );
                $this->add_group_control(Group_Control_Background::get_type(),[
                                'name' => 'lb_thumb_bg',
                                'label' => esc_html__( 'Thumb Background', 'uiuxom' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .bi03Thumb',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'lb_thumb_border',
                                'label' => esc_html__( 'Border', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .bi03Thumb',
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'lb_thumb_shadow',
                                'label' => esc_html__( 'Box Shadow', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .bi03Thumb',
                        ]
                );
                $this->add_responsive_control( 'lb_thumb_readius', [
                                'label'      => esc_html__( 'Border Radius', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .bi03Thumb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .bi03Thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_thumb_padding', [
                                'label'      => esc_html__( 'Padding', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .bi03Thumb' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_thumb_margin', [
                                'label'      => esc_html__( 'Margin', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .bi03Thumb' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
                
        $this->start_controls_section( 'section_tab_03', [
                'label'         => esc_html__( 'Content Area Style', 'uiuxom' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_group_control(Group_Control_Background::get_type(),[
                                'name' => 'lb_cont_bg',
                                'label' => esc_html__( 'Background', 'uiuxom' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .bi03Details',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'lb_cont_border',
                                'label' => esc_html__( 'Border', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .bi03Details',
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'lb_cont_shadow',
                                'label' => esc_html__( 'Box Shadow', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .bi03Details',
                        ]
                );
                $this->add_responsive_control( 'lb_cont_readius', [
                                'label'      => esc_html__( 'Border Radius', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .bi03Details' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_cont_padding', [
                                'label'      => esc_html__( 'Item Paddings', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .bi03Details' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_cont_margin', [
                                'label'      => esc_html__( 'Item Margin', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .bi03Details' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );

                $this->add_control( 'lb_cont_heading_01', [
				'label' => esc_html__( 'Blog Meta Styling', 'uiuxom' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'lb_meta_typo',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .bi01Meta',
                        ]
                );
                $this->add_responsive_control( 'lb_meta_color',[
                                'label'     => esc_html__( 'Text Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .bi01Meta' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .blogItem02 .bi01Meta' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_meta_icon_color',[
                                'label'     => esc_html__( 'Icon Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .bi03Details .bi01Meta span i' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .blogItem02 .bi01Meta span i' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_meta_color_hov',[
                                'label'     => esc_html__( 'Text Hover Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .bi03Details .bi01Meta a:hover' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .blogItem02 .bi01Meta a:hover' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_meta_item_padding', [
                                'label'      => esc_html__( 'Meta Item Padding', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .bi01Meta span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .blogItem02 .bi01Meta span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_meta_item_margin', [
                                'label'      => esc_html__( 'Meta Item Margin', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .bi01Meta span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .blogItem02 .bi01Meta span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_meta_area_margin', [
                                'label'      => esc_html__( 'Meta Area Margin', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .bi01Meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .blogItem02 .bi01Meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );

                
                $this->add_control( 'lb_cont_heading_02', [
				'label' => esc_html__( 'Blog Title Styling', 'uiuxom' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'lb_btitle_typo',
                                'label'     => esc_html__( 'Title Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .blogItem03 h3, {{WRAPPER}} .blogItem02 h3',
                        ]
                );
                $this->add_responsive_control( 'lb_btitle_color',[
                                'label'     => esc_html__( 'Title Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .blogItem03 h3' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .blogItem02 h3' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_btitle_color_hover',[
                                'label'     => esc_html__( 'Hover Title Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .blogItem03 h3 a:hover' => 'color: {{VALUE}}',
                                    '{{WRAPPER}} .blogItem02 h3 a:hover' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_title_padding', [
                                'label'      => esc_html__( 'Title Margin', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .blogItem03 h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .blogItem02 h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_title_margin', [
                                'label'      => esc_html__( 'Title Margin', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .blogItem03 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .blogItem02 h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                
                $this->add_control( 'lb_cont_heading_03', [
				'label' => esc_html__( 'Read More Styling', 'uiuxom' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'lb_post_style',
                                                'operator'  => 'in',
                                                'value'     => ['2', '3'],
                                        ]
                                    ],
                                ],
			]
		);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'lb_rmb_typo',
                                'label'     => esc_html__( 'Read More Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .blogItem02 .ulinaLink',
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'lb_post_style',
                                                'operator'  => 'in',
                                                'value'     => ['2', '3'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_rmb_color',[
                                'label'     => esc_html__( 'Read More Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .blogItem02 .ulinaLink' => 'color: {{VALUE}}'
                                ],
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'lb_post_style',
                                                'operator'  => '==',
                                                'value'     => '1',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_rmb_color_hov',[
                                'label'     => esc_html__( 'Read More Hover Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .blogItem02 .ulinaLink:hover' => 'color: {{VALUE}}'
                                ],
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'lb_post_style',
                                                'operator'  => 'in',
                                                'value'     => ['2', '3'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_rmb_color_i',[
                                'label'     => esc_html__( 'Read More Icon Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .blogItem02 .ulinaLink i' => 'color: {{VALUE}}'
                                ],
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'lb_post_style',
                                                'operator'  => 'in',
                                                'value'     => ['2', '3'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_rmb_color_i_hov',[
                                'label'     => esc_html__( 'Read More Hover Icon Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .blogItem02 .ulinaLink:hover i' => 'color: {{VALUE}}'
                                ],
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'lb_post_style',
                                                'operator'  => 'in',
                                                'value'     => ['2', '3'],
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_responsive_control( 'lb_rmb_i_margin', [
                                'label'      => esc_html__( 'Read More Icon Margin', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'allowed_dimensions' => ['left'],
                                'selectors'  => [
                                    '{{WRAPPER}} .blogItem02 .ulinaLink i' => 'margin-left: {{LEFT}}{{UNIT}};',
                                ],
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'lb_post_style',
                                                'operator'  => 'in',
                                                'value'     => ['2', '3'],
                                        ]
                                    ],
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_035tr', [
                    'label' => esc_html__('Slider Nav Styling', 'uiuxom'),
                    'tab' => Controls_Manager::TAB_STYLE,
                    'conditions' => [
                        'terms' => [
                            [
                                'name' => 'lb_view_style',
                                'operator' => '==',
                                'value' => '2',
                            ],
                            [
                                'name' => 'lb_slide_nav',
                                'operator' => '==',
                                'value' => 'yes',
                            ]
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
                                            '{{WRAPPER}} .blogCarousel.owl-carousel .owl-nav button' => 'width: {{SIZE}}{{UNIT}};'
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
                                            '{{WRAPPER}} .blogCarousel.owl-carousel .owl-nav button' => 'height: {{SIZE}}{{UNIT}};'
                                    ],
                            ]
                    );
                    $this->add_group_control(
                            Group_Control_Typography::get_type(), [
                                    'name'      => 'nav_i_typography',
                                    'label'     => esc_html__( 'Icon Typography', 'uiuxom' ),
                                    'selector'  => '{{WRAPPER}} .blogCarousel.owl-carousel .owl-nav button'
                            ]
                    );
                    $this->start_controls_tabs( 'nav_styling_tab' );
                        $this->start_controls_tab('nav_styling_tab_normal',['label' => esc_html__( 'Normal', 'uiuxom' ),]);
                                $this->add_responsive_control( 'bl_nav_color', [
                                                'label' => esc_html__( 'Nav Color', 'uiuxom' ),
                                                'type'  => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .blogCarousel.owl-carousel .owl-nav button' => 'color: {{VALUE}}'
                                                ],
                                        ]
                                );
                                $this->add_group_control( Group_Control_Background::get_type(), [
                                            'name' => 'bl_nav_bg',
                                            'label' => esc_html__( 'Nav Background', 'uiuxom' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .blogCarousel.owl-carousel .owl-nav button',
                                        ]
                                );
                                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                                'name' => 'bl_nav_bg_shadow',
                                                'label' => esc_html__( 'Boxs Shadow', 'uiuxom' ),
                                                'selector' => '{{WRAPPER}} .blogCarousel.owl-carousel .owl-nav button',
                                        ]
                                );
                                $this->add_group_control( Group_Control_Border::get_type(), [
                                                'name' => 'bl_nav_bg_border',
                                                'label' => esc_html__( 'Border', 'uiuxom' ),
                                                'selector' => '{{WRAPPER}} .blogCarousel.owl-carousel .owl-nav button',
                                        ]
                                );
                        $this->end_controls_tab();
                        $this->start_controls_tab('nav_styling_tab_hover',['label' => esc_html__( 'Hover', 'uiuxom' )]);
                                $this->add_responsive_control( 'bl_nav_color_hover', [
                                                'label' => esc_html__( 'Nav Color', 'uiuxom' ),
                                                'type'  => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .blogCarousel.owl-carousel .owl-nav button:hover' => 'color: {{VALUE}}',
                                                ],
                                        ]
                                );
                                $this->add_group_control( Group_Control_Background::get_type(), [
                                            'name' => 'bl_nav_bg_hover',
                                            'label' => esc_html__( 'Nav Background', 'uiuxom' ),
                                            'types' => [ 'classic', 'gradient'],
                                            'selector' => '{{WRAPPER}} .blogCarousel.owl-carousel .owl-nav button:hover',
                                        ]
                                );
                                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                                'name' => 'bl_nav_bg_shadow_hover',
                                                'label' => esc_html__( 'Boxs Shadow', 'uiuxom' ),
                                                'selector' => '{{WRAPPER}} .blogCarousel.owl-carousel .owl-nav button:hover',
                                        ]
                                );
                                $this->add_group_control(Group_Control_Border::get_type(), [
                                                'name' => 'bl_nav_bg_border_hover',
                                                'label' => esc_html__( 'Border', 'uiuxom' ),
                                                'selector' => '{{WRAPPER}} .blogCarousel.owl-carousel .owl-nav button:hover',
                                        ]
                                );
                        $this->end_controls_tab();
                    $this->end_controls_tabs();
                $this->add_control( 'bl_nav_radius', [
                                'label' => esc_html__( 'Nav Buttons  Radius', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .blogCarousel.owl-carousel .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'folioSlider_nav_padding', [
                                'label'      => esc_html__( 'Nav Buttons Padding', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .blogCarousel.owl-carousel .owl-nav button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'left_nav_margin', [
                                'label'      => esc_html__( 'Left Margin', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .blogCarousel.owl-carousel .owl-nav button.owl-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'right_nav_margin', [
                                'label'      => esc_html__( 'Right Margin', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .blogCarousel.owl-carousel .owl-nav button.owl-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'area_nav_margin', [
                                'label'      => esc_html__( 'Area Margin', 'uiuxom' ),
                                'type'       => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .blogCarousel.owl-carousel .owl-nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
            $this->end_controls_section();
    
            $this->start_controls_section(
                'section_tab_04345678', [
                    'label' => esc_html__('Dots Styling', 'uiuxom'),
                    'tab' => Controls_Manager::TAB_STYLE,
                    'conditions' => [
                        'terms' => [
                            [
                                'name' => 'lb_slide_dots',
                                'operator' => '==',
                                'value' => 'yes',
                            ],
                            [
                                'name' => 'lb_view_style',
                                'operator' => '==',
                                'value' => '2',
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
                                            '{{WRAPPER}} .blogCarousel.owl-carousel .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
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
                                            '{{WRAPPER}} .blogCarousel.owl-carousel .owl-dot' => 'height: {{SIZE}}{{UNIT}};',
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
                                            '{{WRAPPER}} .blogCarousel.owl-carousel .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
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
                                            '{{WRAPPER}} .blogCarousel.owl-carousel .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
                                    ],
                            ]
                    );
                    $this->start_controls_tabs( 'dot_styling_tab' );
                        $this->start_controls_tab('dot_styling_tab_normal',['label' => esc_html__( 'Normal', 'uiuxom' )]);
                                $this->add_responsive_control( 'fs_dot_bg_color', [
                                                'label' => esc_html__( 'Outer BG Color', 'uiuxom' ),
                                                'type'  => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .blogCarousel.owl-carousel .owl-dot' => 'background: {{VALUE}}',
                                                ],
                                        ]
                                );
                                $this->add_responsive_control( 'fls_dot_bg_inner_color', [
                                                'label' => esc_html__( 'Inner BG Color', 'uiuxom' ),
                                                'type'  => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .blogCarousel.owl-carousel .owl-dot span' => 'background: {{VALUE}}',
                                                ],
                                        ]
                                );
                                $this->add_group_control( Group_Control_Border::get_type(), [
                                                'name' => 'fsl_dot_bg_border',
                                                'label' => esc_html__( 'Border', 'uiuxom' ),
                                                'selector' => '{{WRAPPER}} .blogCarousel.owl-carousel .owl-dot',
                                        ]
                                );
                        $this->end_controls_tab();
                        $this->start_controls_tab('dot_styling_tab_hover',['label' => esc_html__( 'Hover', 'uiuxom' )]);
                                $this->add_responsive_control( 'bl_dot_bg_color_hov', [
                                                'label' => esc_html__( 'Outer BG Color', 'uiuxom' ),
                                                'type'  => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .blogCarousel.owl-carousel .owl-dot:hover' => 'background: {{VALUE}}',
                                                        '{{WRAPPER}} .blogCarousel.owl-carousel .owl-dot.active' => 'background: {{VALUE}}',
                                                ],
                                        ]
                                );
                                $this->add_responsive_control( 'bl_dot_bg_inner_color_hov', [
                                                'label' => esc_html__( 'Inner BG Color', 'uiuxom' ),
                                                'type'  => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .blogCarousel.owl-carousel .owl-dot:hover span' => 'background: {{VALUE}}',
                                                        '{{WRAPPER}} .blogCarousel.owl-carousel .owl-dot.active span' => 'background: {{VALUE}}',
                                                ],
                                        ]
                                );
                                $this->add_group_control( Group_Control_Border::get_type(), [
                                                'name' => 'bl_dot_bg_border_hover',
                                                'label' => esc_html__( 'Border', 'uiuxom' ),
                                                'selector' => '{{WRAPPER}} .blogCarousel.owl-carousel .owl-dot:hover, {{WRAPPER}} .blogCarousel.owl-carousel .owl-dot.active',
                                        ]
                                );
                        $this->end_controls_tab();
                    $this->end_controls_tabs();
                    $this->add_responsive_control('bl_dot_radius', [
                                    'label' => esc_html__( 'Dots  Radius', 'uiuxom' ),
                                    'type'  => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors' => [
                                        '{{WRAPPER}} .blogCarousel.owl-carousel .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .blogCarousel.owl-carousel .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                    );
                    $this->add_responsive_control( 'bl_dot_margin', [
                                    'label' => esc_html__( 'Dots  Gapping', 'uiuxom' ),
                                    'type'  => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors' => [
                                            '{{WRAPPER}} .blogCarousel.owl-carousel .owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                    );
                    $this->add_responsive_control( 'bl_dots_margin', [
                                    'label' => esc_html__( 'Dot Area Margins', 'uiuxom' ),
                                    'type'  => Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px', '%', 'em' ],
                                    'selectors' => [
                                            '{{WRAPPER}} .blogCarousel.owl-carousel .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                            ]
                    );
            $this->end_controls_section();

    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();

        $lb_view_style  = (isset($settings['lb_view_style']) && $settings['lb_view_style'] > 0) ? $settings['lb_view_style'] : 1;
        $lb_post_style  = (isset($settings['lb_post_style']) && $settings['lb_post_style'] > 0) ? $settings['lb_post_style'] : 1;

        $lb_specific    = (isset($settings['lb_specific']) && !empty($settings['lb_specific'])? $settings['lb_specific'] : array());
        $lb_category    = (isset($settings['lb_category']) && !empty($settings['lb_category'])? $settings['lb_category'] : array());
        
        $lb_post_item   = (isset($settings['lb_post_item']) && $settings['lb_post_item'] > 0) ? $settings['lb_post_item'] : 3;
        $lb_order_by    = (isset($settings['lb_order_by']) && $settings['lb_order_by'] != '') ? $settings['lb_order_by'] : 'date';
        $lb_order       = (isset($settings['lb_order']) && $settings['lb_order'] != '') ? $settings['lb_order'] : 'desc';
        
        $autoplay       = (isset($settings['lb_slide_autoplay']) && $settings['lb_slide_autoplay'] != '') ? $settings['lb_slide_autoplay'] : 'yes';
        $loop           = (isset($settings['lb_slide_loop']) && $settings['lb_slide_loop'] != '') ? $settings['lb_slide_loop'] : 'yes';
        $nav            = (isset($settings['lb_slide_nav']) && $settings['lb_slide_nav'] != '') ? $settings['lb_slide_nav'] : 'no';
        $dots           = (isset($settings['lb_slide_dots']) && $settings['lb_slide_dots'] != '') ? $settings['lb_slide_dots'] : 'no';

        $rm_label       = (isset($settings['rm_label']) && $settings['rm_label'] != '') ? $settings['rm_label'] : esc_html__('Read More', 'uiuxom');
        
        $lb_post_thumb_width       = (isset($settings['lb_post_thumb_width']) && $settings['lb_post_thumb_width'] > 0) ? $settings['lb_post_thumb_width'] : '';
        $lb_post_thumb_height       = (isset($settings['lb_post_thumb_height']) && $settings['lb_post_thumb_height'] > 0) ? $settings['lb_post_thumb_height'] : '';
        
        $lb_xl_col            = (isset($settings['lb_xl_col']) && $settings['lb_xl_col'] > 0) ? $settings['lb_xl_col'] : 3;
        $lb_lg_col            = (isset($settings['lb_lg_col']) && $settings['lb_lg_col'] > 0) ? $settings['lb_lg_col'] : 3;
        $lb_md_col            = (isset($settings['lb_md_col']) && $settings['lb_md_col'] > 0) ? $settings['lb_md_col'] : 2;
        $lb_sm_col            = (isset($settings['lb_sm_col']) && $settings['lb_sm_col'] > 0) ? $settings['lb_sm_col'] : 1;
        
        $lb_items_gapping = (isset($settings['lb_items_gapping']) && $settings['lb_items_gapping'] != '' ? $settings['lb_items_gapping'] : 24);

        include dirname(__FILE__).'/style/post/style'.$lb_view_style.'.php';
    }
    
    protected function content_template() {
        
    }
}