<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Product_Grid_Widgets extends Widget_Base{ 
    
    public function get_name() {
        return 'uiuxom-product-grid';
    }
    
    public function get_title() {
        return esc_html__( 'Product Grid', 'uiuxom' );
    }

    public function get_icon() {
        return 'eicon-products';
    }

    public function get_categories() {
        return [ 'uiuxom-elements' ];
    }
    
    protected function register_controls() { 
        $this->start_controls_section(
            'section_tab', [
                'label' => esc_html__( 'Product slider', 'uiuxom' ),
            ]
        );
                $this->add_control( 'ps_product_types', [
                        'label' => esc_html__('Product Types', 'uiuxom'),
                        'type' => Controls_Manager::SELECT,
                        'description' => esc_html__('Select types.', 'uiuxom'),
                        'default' => '1',
                        'multiple' => false,
                        'options' => [
                            1 => esc_html__('All Product', 'uiuxom'),
                            2 => esc_html__('Featured Product', 'uiuxom'),
                            3 => esc_html__('Sale Product', 'uiuxom'),
                            4 => esc_html__('Best Seller Product', 'uiuxom'),
                            5 => esc_html__('Top Rated Product', 'uiuxom'),
                            6 => esc_html__('Specific Product', 'uiuxom'),
                        ],
                    ]
                );
                $this->add_control('ps_category', [
                                'label' => esc_html__('Product Category', 'uiuxom'),
                                'type' => 'uiuxom_autocomplete',
                                'description' => esc_html__('Select product category.', 'uiuxom'),
                                'action' => 'uiuxom_get_taxonomy',
                                'taxonomy' => 'product_cat',
                                'multiple' => true,
                        ]
                );
                $this->add_control('ps_tag', [
                                'label' => esc_html__('Product Tag', 'uiuxom'),
                                'type' => 'uiuxom_autocomplete',
                                'description' => esc_html__('Select product tag.', 'uiuxom'),
                                'action' => 'uiuxom_get_taxonomy',
                                'taxonomy' => 'product_tag',
                                'multiple' => true,
                        ]
                );
                $this->add_control('ps_brand', [
                                'label' => esc_html__('Product Brand', 'uiuxom'),
                                'type' => 'uiuxom_autocomplete',
                                'description' => esc_html__('Select product brand.', 'uiuxom'),
                                'action' => 'uiuxom_get_taxonomy',
                                'taxonomy' => 'product_brand',
                                'multiple' => true,
                        ]
                );
                $this->add_control('ps_collection', [
                                'label' => esc_html__('Product Collection', 'uiuxom'),
                                'type' => 'uiuxom_autocomplete',
                                'description' => esc_html__('Select product collection.', 'uiuxom'),
                                'action' => 'uiuxom_get_taxonomy',
                                'taxonomy' => 'product_collection',
                                'multiple' => true,
                        ]
                );
                $this->add_control( 'ps_specific', [
                                'label'         => esc_html__( 'Specific Product', 'uiuxom' ),
                                'type'          => Controls_Manager::SELECT2,
                                'label_block'   => TRUE,
                                'multiple'      => true,
                                'default'       => array('0'),
                                'options'       => ulina_post_array('product', esc_html__('All Product', 'uiuxom')),
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'ps_product_types',
                                                'operator'  => '==',
                                                'value'     => '6',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'ps_not_specific', [
                                'label'         => esc_html__( 'Exclude Product', 'uiuxom' ),
                                'type'          => Controls_Manager::SELECT2,
                                'label_block'   => TRUE,
                                'multiple'      => true,
                                'default'       => array('0'),
                                'options'       => ulina_post_array('product', esc_html__('All Product', 'uiuxom')),
                        ]
                );
                $this->add_control( 'ps_xl_col', [
                                'label'     => esc_html__( 'Select XL Col', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => '4',
                                'options'   => [
                                        '2'       => esc_html__( '2 Column', 'uiuxom' ),
                                        '3'       => esc_html__( '3 Column', 'uiuxom' ),
                                        '4'       => esc_html__( '4 Column', 'uiuxom' ),
                                        '5'       => esc_html__( '5 Column', 'uiuxom' ),
                                        '6'       => esc_html__( '6 Column', 'uiuxom' ),
                                ],
                        ]
                );
                $this->add_control( 'ps_lg_col', [
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
                $this->add_control( 'ps_md_col', [
                                'label'     => esc_html__( 'Select MD Col', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => '3',
                                'options'   => [
                                        '2'       => esc_html__( '2 Column', 'uiuxom' ),
                                        '3'       => esc_html__( '3 Column', 'uiuxom' ),
                                        '4'       => esc_html__( '4 Column', 'uiuxom' ),
                                        '5'       => esc_html__( '5 Column', 'uiuxom' ),
                                        '6'       => esc_html__( '6 Column', 'uiuxom' ),
                                ],
                        ]
                );
                $this->add_control( 'ps_sm_col', [
                                'label'     => esc_html__( 'Select SM Col', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => '2',
                                'options'   => [
                                        '2'       => esc_html__( '2 Column', 'uiuxom' ),
                                        '3'       => esc_html__( '3 Column', 'uiuxom' ),
                                        '4'       => esc_html__( '4 Column', 'uiuxom' ),
                                        '5'       => esc_html__( '5 Column', 'uiuxom' ),
                                        '6'       => esc_html__( '6 Column', 'uiuxom' ),
                                ],
                        ]
                );
                $this->add_control( 'ps_post_thumb_width', [
                                'label'         => esc_html__( 'Product Thumb Width', 'uiuxom' ),
                                'type'          => Controls_Manager::NUMBER,
                                'min'           => 1,
                                'max'           => 2000,
                                'step'          => 1,
                                'default'       => '',
                                'description'   => esc_html__( 'You can set here a custom width for product thumbnail.', 'uiuxom' ),
                        ]
                );
                $this->add_control( 'ps_post_thumb_height', [
                                'label'         => esc_html__( 'Product Thumb Height', 'uiuxom' ),
                                'type'          => Controls_Manager::NUMBER,
                                'min'           => 1,
                                'max'           => 2000,
                                'step'          => 1,
                                'default'       => '',
                                'description'   => esc_html__( 'You can set here a custom height for product thumbnail.', 'uiuxom' ),
                        ]
                );
                $this->add_control( 'ps_post_item', [
                                'label'         => esc_html__( 'Number Of Item', 'uiuxom' ),
                                'type'          => Controls_Manager::NUMBER,
                                'min'           => 1,
                                'max'           => 2000,
                                'step'          => 1,
                                'default'       => 8,
                                'description'   => esc_html__( 'How many item you want to show.', 'uiuxom' ),
                        ]
                );
                $this->add_control( 'ps_offset', [
                        'label' => esc_html__('Offset', 'uiuxom'),
                        'type' => Controls_Manager::NUMBER,
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                        'description' => esc_html__('How many product item you want to skip?.', 'uiuxom'),
                    ]
                );
                $this->add_control( 'ps_order_by', [
                                'label' => esc_html__( 'Order By', 'uiuxom' ),
                                'type'  => Controls_Manager::SELECT,
                                'default' => 'date',
                                'options' => [
                                        'date'                  => esc_html__( 'Date', 'uiuxom' ),
                                        'title'                 => esc_html__( 'Title', 'uiuxom' ),
                                        'rand'                  => esc_html__( 'Random', 'uiuxom' ),
                                        'comment_count'         => esc_html__( 'Review', 'uiuxom' ),
                                ],
                        ]
                );
                $this->add_control( 'ps_order', [
                                'label' => esc_html__( 'Order', 'uiuxom' ),
                                'type'  => Controls_Manager::SELECT,
                                'default' => 'desc',
                                'options' => [
                                        'asc'        => esc_html__( 'Ascending', 'uiuxom' ),
                                        'desc'       => esc_html__( 'Descending', 'uiuxom' ),
                                ],
                        ]
                );
                $this->add_control( 'ps_show_wishlist', [
                        'label' => esc_html__( 'Show Wishlist BTN', 'uiuxom' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => __( 'Show', 'uiuxom' ),
                        'label_off' => __( 'Hide', 'uiuxom' ),
                        'return_value' => 'yes',
                        'default' => 'no'
                    ]
                );
                $this->add_control( 'ps_show_quickview', [
                        'label' => esc_html__( 'Show Quickview BTN', 'uiuxom' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => __( 'Show', 'uiuxom' ),
                        'label_off' => __( 'Hide', 'uiuxom' ),
                        'return_value' => 'yes',
                        'default' => 'yes'
                    ]
                );
                $this->add_control( 'ps_show_flashlabels', [
                        'label' => esc_html__( 'Show Flash Labels', 'uiuxom' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Show', 'uiuxom' ),
                        'label_off' => esc_html__( 'Hide', 'uiuxom' ),
                        'return_value' => 'yes',
                        'default' => 'no',
                    ]
                );
                
                $this->add_control( 'ps_show_review_count', [
                        'label' => esc_html__( 'Show Review Count', 'uiuxom' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Show', 'uiuxom' ),
                        'label_off' => esc_html__( 'Hide', 'uiuxom' ),
                        'return_value' => 'yes',
                        'default' => 'no',
                    ]
                );
                $this->add_control( 'ps_reviw_suffice', [
                        'label' => esc_html__( 'Review Count Suffix', 'uiuxom' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => esc_html__( 'Reviews', 'uiuxom' ),
                        'conditions'        => [
                                'terms'         => [
                                        [
                                                'name'      => 'ps_show_review_count',
                                                'operator'  => '==',
                                                'value'     => 'yes',
                                        ]
                                ],
                        ],
                    ]
                );
                $this->add_control( 'ps_show_pagination', [
                        'label' => esc_html__( 'Show Pagination', 'uiuxom' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Show', 'uiuxom' ),
                        'label_off' => esc_html__( 'Hide', 'uiuxom' ),
                        'return_value' => 'yes',
                        'default' => 'no',
                    ]
                );
                $this->add_control( 'ps_pagin_type', [
                                'label'     => esc_html__( 'Pagination Type', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => '1',
                                'options'   => [
                                        '1'       => esc_html__( 'Default Pagination', 'uiuxom' ),
                                        '2'       => esc_html__( 'Ajax Pagination', 'uiuxom' ),
                                ],
                                'conditions'        => [
                                        'terms'         => [
                                                [
                                                        'name'      => 'ps_show_pagination',
                                                        'operator'  => '==',
                                                        'value'     => 'yes',
                                                ]
                                        ],
                                ],
                        ]
                );
                $this->add_control( 'ps_load_more_label', [
                        'label' => esc_html__( 'Ajax Btn Label', 'uiuxom' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => esc_html__( 'Load More', 'uiuxom' ),
                        'conditions'        => [
                                'terms'         => [
                                        [
                                                'name'      => 'ps_show_review_count',
                                                'operator'  => '==',
                                                'value'     => 'yes',
                                        ],
                                        [
                                                'name'      => 'ps_pagin_type',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                ],
                        ],
                    ]
                );
                $this->add_control( 'ps_pagin_alignment', [
                                'label'     => esc_html__( 'Pagination Alignment', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => 'center',
                                'options'   => [
                                        'left'       => esc_html__( 'Left Align', 'uiuxom' ),
                                        'center'       => esc_html__( 'Center Align', 'uiuxom' ),
                                        'right'       => esc_html__( 'Right Align', 'uiuxom' ),
                                ],
                                'conditions'        => [
                                        'terms'         => [
                                                [
                                                        'name'      => 'ps_show_pagination',
                                                        'operator'  => '==',
                                                        'value'     => 'yes',
                                                ]
                                        ],
                                ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section(
                'section_tab_1', [
                    'label'         => esc_html__('Product Box Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_group_control( Group_Control_Background::get_type(), [
                            'name' => 'prs_box_bg',
                            'label' => esc_html__( 'Box Background', 'uiuxom' ),
                            'types' => [ 'classic', 'gradient'],
                            'selector' => '{{WRAPPER}} .productItem01',
                    ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                            'name' => 'prs_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'uiuxom' ),
                            'selector' => '{{WRAPPER}} .productItem01',
                    ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                            'name' => 'prs_border',
                            'label' => esc_html__( 'Box Border', 'uiuxom' ),
                            'selector' => '{{WRAPPER}} .productItem01',
                    ]
                );
                $this->add_responsive_control( 'prs_box_radius', [
                                'label' => esc_html__( 'Radius', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .productItem01' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ],
                        ]
                );
                $this->add_responsive_control( 'prs_box_padding', [
                                'label' => esc_html__( 'Paddings', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .productItem01' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'prs_box_margin', [
                                'label' => esc_html__( 'Margins', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .productItem01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section(
                'section_tab_2', [
                    'label'         => esc_html__('Product Thumb Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_responsive_control( 'prs_thumb_radius', [
                            'label' => esc_html__( 'Radius', 'uiuxom' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .pi01Thumb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .pi01Thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'prs_thumb_padding', [
                            'label' => esc_html__( 'Paddings', 'uiuxom' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .pi01Thumb' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'prs_thumb_margin', [
                            'label' => esc_html__( 'Margins', 'uiuxom' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .pi01Thumb' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

        $this->start_controls_section(
                'section_tab_3', [
                    'label'         => esc_html__('Flash Labels Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                        'terms' => [
                            [
                                    'name'      => 'ps_show_flashlabels',
                                    'operator'  => '==',
                                    'value'     => 'yes',
                            ]
                        ],
                    ],
                ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'prs_flash_typography',
                            'label'     => esc_html__( 'Labels Typography', 'uiuxom' ),
                            'selector'  => '{{WRAPPER}} .productLabels span'
                    ]
                );
                $this->add_responsive_control( 'prs_flash_padding', [
                            'label' => esc_html__( 'Items Paddings', 'uiuxom' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .productLabels span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'prs_flash_margin', [
                            'label' => esc_html__( 'Items Margins', 'uiuxom' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .productLabels span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'prs_flash_global_color',[
                                'label'     => esc_html__( 'Flash Global Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .productLabels span' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_flash_global_bg_color',[
                                'label'     => esc_html__( 'Flash Global BG Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .productLabels span' => 'background: {{VALUE}}',
                                ]
                        ]
                );

                $this->add_control( 'prs_heading_01', [
                        'label' => esc_html__( 'TOP Label Style', 'uiuxom' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_responsive_control( 'prs_flash_top_color',[
                                'label'     => esc_html__( 'Flash TOP Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .productLabels span.plTop' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_flash_top_bg_color',[
                                'label'     => esc_html__( 'Flash TOP BG Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .productLabels span.plTop' => 'background: {{VALUE}}',
                                ]
                        ]
                );

                $this->add_control( 'prs_heading_02', [
                        'label' => esc_html__( 'HOT Label Style', 'uiuxom' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_responsive_control( 'prs_flash_hot_color',[
                                'label'     => esc_html__( 'Flash HOT Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .productLabels span.plHot' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_flash_hot_bg_color',[
                                'label'     => esc_html__( 'Flash HOT BG Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .productLabels span.plHot' => 'background: {{VALUE}}',
                                ]
                        ]
                );

                $this->add_control( 'prs_heading_03', [
                        'label' => esc_html__( 'Discount Label Style', 'uiuxom' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_responsive_control( 'prs_flash_dis_color',[
                                'label'     => esc_html__( 'Flash Discount Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .productLabels span.plDis' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_flash_dis_bg_color',[
                                'label'     => esc_html__( 'Flash Discount BG Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .productLabels span.plDis' => 'background: {{VALUE}}',
                                ]
                        ]
                );

                $this->add_control( 'prs_heading_04', [
                        'label' => esc_html__( 'Sale Label Style', 'uiuxom' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_responsive_control( 'prs_flash_sale_color',[
                                'label'     => esc_html__( 'Flash Sale Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .productLabels span.plSale' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_flash_sale_bg_color',[
                                'label'     => esc_html__( 'Flash Sale BG Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .productLabels span.plSale' => 'background: {{VALUE}}',
                                ]
                        ]
                );

                $this->add_control( 'prs_heading_05', [
                        'label' => esc_html__( 'Featured Label Style', 'uiuxom' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_responsive_control( 'prs_flash_featured_color',[
                                'label'     => esc_html__( 'Flash Featured Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .productLabels span.plFeatured' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_flash_featured_bg_color',[
                                'label'     => esc_html__( 'Flash Featured BG Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .productLabels span.plFeatured' => 'background: {{VALUE}}',
                                ]
                        ]
                );

                $this->add_control( 'prs_heading_06', [
                        'label' => esc_html__( 'Limited Stock Label Style', 'uiuxom' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_responsive_control( 'prs_flash_plstock_color',[
                                'label'     => esc_html__( 'Flash Limited Stock Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .productLabels span.plstock' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_flash_plstock_bg_color',[
                                'label'     => esc_html__( 'Flash Limited Stock BG Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .productLabels span.plstock' => 'background: {{VALUE}}',
                                ]
                        ]
                );

                $this->add_control( 'prs_heading_07', [
                        'label' => esc_html__( 'Out Of Stock Label Style', 'uiuxom' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_responsive_control( 'prs_flash_outofstock_color',[
                                'label'     => esc_html__( 'Flash Out of Stock Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .productLabels span.plostock' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_flash_outofstock_bg_color',[
                                'label'     => esc_html__( 'Flash Outof Stock BG Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .productLabels span.plostock' => 'background: {{VALUE}}',
                                ]
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section(
                'section_tab_4', [
                    'label'         => esc_html__('Action Button Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_responsive_control( 'prs_btn_width', [
                                'label' => __( 'BTNs Width', 'uiuxom' ),
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
                                        '{{WRAPPER}} .pi01Actions a' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .woocommerce .uiuxomProductWrapper a.button' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .uiuxomProductWrapper .yith-wcwl-add-button a.add_to_wishlist' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'prs_btn_height', [
                                'label' => __( 'BTNs Height', 'uiuxom' ),
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
                                        '{{WRAPPER}} .pi01Actions a' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .woocommerce .uiuxomProductWrapper a.button' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .uiuxomProductWrapper .yith-wcwl-add-button a.add_to_wishlist' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'prs_btn_radius', [
                                'label' => esc_html__( 'BTNs Radius', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .pi01Actions a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .woocommerce .uiuxomProductWrapper a.button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .uiuxomProductWrapper .yith-wcwl-add-button a.add_to_wishlist' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'prs_btn_margin', [
                                'label' => esc_html__( 'BTNs Margin', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .pi01Actions a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .woocommerce .uiuxomProductWrapper a.button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .uiuxomProductWrapper .yith-wcwl-add-button a.add_to_wishlist' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );

                $this->add_control( 'prs_heading_08', [
                        'label' => esc_html__( 'Add To Cart BTN', 'uiuxom' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'prs_cart_typography',
                                'label'     => esc_html__( 'Cart Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .pi01Actions a.pi01Cart, {{WRAPPER}} .woocommerce .uiuxomProductWrapper a.button.pi01Cart'
                        ]
                );
                $this->add_responsive_control( 'prs_cart_color',[
                                'label'     => esc_html__( 'Cart Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .pi01Actions a.pi01Cart' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .woocommerce .uiuxomProductWrapper a.button.pi01Cart' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_cart_color_hover',[
                                'label'     => esc_html__( 'Cart Hover Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .pi01Actions a.pi01Cart:hover' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .woocommerce .uiuxomProductWrapper a.button.pi01Cart:hover' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_cart_bg',[
                                'label'     => esc_html__( 'Cart BG', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .pi01Actions a.pi01Cart' => 'background: {{VALUE}}',
                                        '{{WRAPPER}} .woocommerce .uiuxomProductWrapper a.button.pi01Cart' => 'background: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_cart_bg_hover',[
                                'label'     => esc_html__( 'Cart Hover BG', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .pi01Actions a.pi01Cart:hover' => 'background: {{VALUE}}',
                                        '{{WRAPPER}} .woocommerce .uiuxomProductWrapper a.button.pi01Cart:hover' => 'background: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_cart_padding', [
                                'label' => esc_html__( 'Cart Padding', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .pi01Actions a.pi01Cart' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .woocommerce .uiuxomProductWrapper a.button.pi01Cart' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );

                $this->add_control( 'prs_heading_09', [
                        'label' => esc_html__( 'Added To Cart BTN', 'uiuxom' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'prs_added_cart_typography',
                                'label'     => esc_html__( 'Added Cart Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .woocommerce .uiuxomProductWrapper a.added_to_cart:after'
                        ]
                );
                $this->add_responsive_control( 'prs_added_cart_color',[
                                'label'     => esc_html__( 'Added Cart Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .woocommerce .uiuxomProductWrapper a.added_to_cart:after' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_added_cart_color_hover',[
                                'label'     => esc_html__( 'Added Cart Hover Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .woocommerce .uiuxomProductWrapper a.added_to_cart:after' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_added_cart_bg',[
                                'label'     => esc_html__( 'Added Cart BG', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .woocommerce .uiuxomProductWrapper a.added_to_cart' => 'background: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_added_cart_bg_hover',[
                                'label'     => esc_html__( 'Added Cart Hover BG', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .woocommerce .uiuxomProductWrapper a.added_to_cart:hover' => 'background: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_added_cart_padding', [
                                'label' => esc_html__( 'Added Cart Padding', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .woocommerce .uiuxomProductWrapper a.added_to_cart:after' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );

                
                $this->add_control( 'prs_heading_10', [
                        'label' => esc_html__( 'Wishlist BTN', 'uiuxom' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'prs_wish_typography',
                                'label'     => esc_html__( 'Wish Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .uiuxomProductWrapper .yith-wcwl-add-button a.add_to_wishlist, {{WRAPPER}} .uiuxomProductWrapper .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:after, {{WRAPPER}} .uiuxomProductWrapper .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:after'
                        ]
                );
                $this->add_responsive_control( 'prs_wish_color',[
                                'label'     => esc_html__( 'Wish Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .uiuxomProductWrapper .yith-wcwl-add-button a.add_to_wishlist' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .uiuxomProductWrapper .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:after' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .uiuxomProductWrapper .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:after' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_wish_color_hover',[
                                'label'     => esc_html__( 'Wish Hover Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .uiuxomProductWrapper .yith-wcwl-add-button a.add_to_wishlist:hover' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .uiuxomProductWrapper .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:hover:after' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .uiuxomProductWrapper .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:hover:after' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_wish_bg',[
                                'label'     => esc_html__( 'Wish BG', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .uiuxomProductWrapper .yith-wcwl-add-button a.add_to_wishlist' => 'background: {{VALUE}}',
                                        '{{WRAPPER}} .uiuxomProductWrapper .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a' => 'background: {{VALUE}}',
                                        '{{WRAPPER}} .uiuxomProductWrapper .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a' => 'background: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_wish_bg_hover',[
                                'label'     => esc_html__( 'Wish Hover BG', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .uiuxomProductWrapper .yith-wcwl-add-button a.add_to_wishlist:hover' => 'background: {{VALUE}}',
                                        '{{WRAPPER}} .uiuxomProductWrapper .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:hover' => 'background: {{VALUE}}',
                                        '{{WRAPPER}} .uiuxomProductWrapper .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:hover' => 'background: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_wish_padding', [
                                'label' => esc_html__( 'Wish Padding', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .uiuxomProductWrapper .yith-wcwl-add-button a.add_to_wishlist' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .uiuxomProductWrapper .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .uiuxomProductWrapper .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );

                $this->add_control( 'prs_heading_11', [
                        'label' => esc_html__( 'Quick View BTN', 'uiuxom' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'prs_qv_typography',
                                'label'     => esc_html__( 'Quick View Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .pi01Actions a.pi01AQView'
                        ]
                );
                $this->add_responsive_control( 'prs_qv_color',[
                                'label'     => esc_html__( 'Quick View Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .pi01Actions a.pi01AQView' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_qv_color_hover',[
                                'label'     => esc_html__( 'Quick View Hover Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .pi01Actions a.pi01AQView' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_qv_bg',[
                                'label'     => esc_html__( 'Quick View BG', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .pi01Actions a.pi01AQView' => 'background: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_qv_bg_hover',[
                                'label'     => esc_html__( 'Quick View Hover BG', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .pi01Actions a.pi01AQView:hover' => 'background: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_qv_padding', [
                                'label' => esc_html__( 'Quick View Padding', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .pi01Actions a.pi01AQView' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section(
                'section_tab_5', [
                    'label'         => esc_html__('Content Area Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'prs_cb_bg',
                                'label' => esc_html__( 'Content Box Background', 'uiuxom' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .pi01Details',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'prs_cb_border',
                                'label' => esc_html__( 'Content Box Border', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .pi01Details',
                        ]
                );
                $this->add_responsive_control( 'prs_cb_radius', [
                                'label' => esc_html__( 'Content Box Radius', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .pi01Details' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ],
                        ]
                );
                $this->add_responsive_control( 'prs_cb_padding', [
                                'label' => esc_html__( 'Content Box Paddings', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .pi01Details' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );

                $this->add_control( 'prs_heading_12', [
                        'label' => esc_html__( 'Product Rating', 'uiuxom' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_responsive_control( 'prs_pr_color',[
                                'label'     => esc_html__( 'Rating Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .productRatingWrap .star-rating span::before' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_epr_color',[
                                'label'     => esc_html__( 'Empty Rating Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .productRatingWrap .star-rating::before' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_pr_margin', [
                                'label' => esc_html__( 'Rating Margin', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .productRatingWrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'prs_pr_area_margin', [
                                'label' => esc_html__( 'Rating Area Margin', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .productRatings' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_control( 'prs_heading_19', [
                        'label' => esc_html__( 'Product Rating Count', 'uiuxom' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'prs_ratCount_typography',
                                'label'     => esc_html__( 'Rating Count Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .ratingCounts'
                        ]
                );
                $this->add_responsive_control( 'prs_ratCount_color',[
                                'label'     => esc_html__( 'Rating Count Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .ratingCounts' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_ratCount_margin', [
                                'label' => esc_html__( 'Rating Count Margin', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .ratingCounts' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );

                $this->add_control( 'prs_heading_13', [
                        'label' => esc_html__( 'Product Title', 'uiuxom' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'prs_prt_typography',
                                'label'     => esc_html__( 'Title Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .pi01Details h3'
                        ]
                );
                $this->add_responsive_control( 'prs_prt_color',[
                                'label'     => esc_html__( 'Title Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .pi01Details h3' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_prt_color_hover',[
                                'label'     => esc_html__( 'Title Hover Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .pi01Details h3 a:hover' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_prt_margin', [
                                'label' => esc_html__( 'Title Margin', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .pi01Details h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );

                $this->add_control( 'prs_heading_14', [
                        'label' => esc_html__( 'Product Price', 'uiuxom' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'prs_prp_typography',
                                'label'     => esc_html__( 'Price Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .pi01Price'
                        ]
                );
                $this->add_responsive_control( 'prs_prp_color',[
                                'label'     => esc_html__( 'Price Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .pi01Price' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_prp_margin', [
                                'label' => esc_html__( 'Price Margin', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .pi01Price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );

                $this->add_control( 'prs_heading_15', [
                        'label' => esc_html__( 'Sale Price', 'uiuxom' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'prs_prps_typography',
                                'label'     => esc_html__( 'Del Price Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .pi01Price del'
                        ]
                );
                $this->add_responsive_control( 'prs_prps_color',[
                                'label'     => esc_html__( 'Del Price Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .pi01Price del' => 'color: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_prps_bar_color',[
                                'label'     => esc_html__( 'Del Bar Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .pi01Price del:after' => 'background: {{VALUE}}',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_prps_bar_margin',[
                                'label'     => esc_html__( 'Del Bar Margin', 'uiuxom' ),
                                'type'      => Controls_Manager::DIMENSIONS,
                                'selectors' => [
                                        '{{WRAPPER}} .pi01Price del:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control( 'prs_prps_padding', [
                                'label' => esc_html__( 'Del Price Padding', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .pi01Price del' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'prs_prps_margin', [
                                'label' => esc_html__( 'Del Price Margin', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .pi01Price del' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_6', [
                    'label'         => esc_html__('Pagination Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'        => [
                        'terms'         => [
                            [
                                    'name'      => 'ps_show_pagination',
                                    'operator'  => '==',
                                    'value'     => 'yes',
                            ]
                        ],
                    ],
                ]
        );
                $this->add_group_control(
                        Group_Control_Typography::get_type(), [
                                'name'      => 'ps_pagi_typography',
                                'label'     => esc_html__( 'Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .shopPagination a, {{WRAPPER}} .shopPagination span, {{WRAPPER}} .ulinaBTN2.shopLoadMore'
                        ]
                );
                $this->add_responsive_control( 'ps_pagi_with', [
                                'label' => esc_html__( 'Item Width', 'uiuxom' ),
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
                                        '{{WRAPPER}} .shopPagination a' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .shopPagination span' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .ulinaBTN2.shopLoadMore' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'ps_pagi_height', [
                                'label' => esc_html__( 'Item Height', 'uiuxom' ),
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
                                        '{{WRAPPER}} .shopPagination a' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .shopPagination span' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .ulinaBTN2.shopLoadMore' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->start_controls_tabs( 'ps_pagi_tab' );
                    $this->start_controls_tab('ps_pagi_tab_normal',['label' => esc_html__( 'Normal', 'uiuxom' ),]);
                            $this->add_responsive_control( 'pagi_nav_color', [
                                            'label' => esc_html__( 'Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .shopPagination a' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .shopPagination span' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .ulinaBTN2.shopLoadMore' => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'pas_pagi_nav_bg',
                                        'label' => esc_html__( 'Background', 'uiuxom' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .shopPagination a, {{WRAPPER}} .shopPagination span, {{WRAPPER}} .ulinaBTN2.shopLoadMore',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'ps_pagi_nav_shadow',
                                            'label' => esc_html__( 'Box Shadow', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .shopPagination a, {{WRAPPER}} .shopPagination span, {{WRAPPER}} .ulinaBTN2.shopLoadMore',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'ps_pagi_nav_border',
                                            'label' => esc_html__( 'Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .shopPagination a, {{WRAPPER}} .shopPagination span, {{WRAPPER}} .ulinaBTN2.shopLoadMore',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('ps_pagi_tab_hover',['label' => esc_html__( 'Hover/Active', 'uiuxom' ),]);
                            $this->add_responsive_control( 'pagi_nav_color_hover', [
                                            'label' => esc_html__( 'Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .shopPagination a:hover' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .shopPagination span.current' => 'color: {{VALUE}}',
                                                    '{{WRAPPER}} .ulinaBTN2.shopLoadMore:hover' => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'pas_pagi_nav_bg_hover',
                                        'label' => esc_html__( 'Background', 'uiuxom' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .shopPagination a:hover, {{WRAPPER}} .shopPagination span.current, {{WRAPPER}} .ulinaBTN2.shopLoadMore:hover',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'ps_pagi_nav_shadow_hover',
                                            'label' => esc_html__( 'Box Shadow', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .shopPagination a:hover, {{WRAPPER}} .shopPagination span.current, {{WRAPPER}} .ulinaBTN2.shopLoadMore:hover',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'ps_pagi_nav_border_hover',
                                            'label' => esc_html__( 'Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .shopPagination a:hover, {{WRAPPER}} .shopPagination span.current, {{WRAPPER}} .ulinaBTN2.shopLoadMore:hover',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'ps_page_padding', [
                                'label' => esc_html__( 'Item Padding', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .shopPagination a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .shopPagination span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .ulinaBTN2.shopLoadMore' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'ps_page_radius', [
                                'label' => esc_html__( 'Item Radius', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .shopPagination a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .shopPagination span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .ulinaBTN2.shopLoadMore' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'ps_page_margin', [
                                'label' => esc_html__( 'Item Margin', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .shopPagination a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .shopPagination span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .ulinaBTN2.shopLoadMore' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'ps_page_area_margin', [
                                'label' => esc_html__( 'Area Margin', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                    '{{WRAPPER}} .shopPaginationRow' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display(); 
  
        $ps_product_types  = (isset($settings['ps_product_types']) && $settings['ps_product_types'] > 0) ? $settings['ps_product_types'] : 1;      

        $ps_category    = (isset($settings['ps_category']) && !empty($settings['ps_category'])? $settings['ps_category'] : array());
        $ps_tag    = (isset($settings['ps_tag']) && !empty($settings['ps_tag'])? $settings['ps_tag'] : array());
        $ps_brand    = (isset($settings['ps_brand']) && !empty($settings['ps_brand'])? $settings['ps_brand'] : array());
        $ps_collection    = (isset($settings['ps_collection']) && !empty($settings['ps_collection'])? $settings['ps_collection'] : array());
        $ps_specific    = (isset($settings['ps_specific']) && !empty($settings['ps_specific'])? $settings['ps_specific'] : array());
        $ps_not_specific    = (isset($settings['ps_not_specific']) && !empty($settings['ps_not_specific'])? $settings['ps_not_specific'] : array());
        
        $ps_xl_col   = (isset($settings['ps_xl_col']) && $settings['ps_xl_col'] > 0) ? $settings['ps_xl_col'] : 4;
        $ps_lg_col   = (isset($settings['ps_lg_col']) && $settings['ps_lg_col'] > 0) ? $settings['ps_lg_col'] : 4;
        $ps_md_col   = (isset($settings['ps_md_col']) && $settings['ps_md_col'] > 0) ? $settings['ps_md_col'] : 3;
        $ps_sm_col   = (isset($settings['ps_sm_col']) && $settings['ps_sm_col'] > 0) ? $settings['ps_sm_col'] : 2;
        
        $ps_order_by    = (isset($settings['ps_order_by']) && $settings['ps_order_by'] != '') ? $settings['ps_order_by'] : 'date';
        $ps_order       = (isset($settings['ps_order']) && $settings['ps_order'] != '') ? $settings['ps_order'] : 'desc';
        
        $ps_show_wishlist           = (isset($settings['ps_show_wishlist']) && $settings['ps_show_wishlist'] != '') ? $settings['ps_show_wishlist'] : 'no';
        $ps_show_quickview           = (isset($settings['ps_show_quickview']) && $settings['ps_show_quickview'] != '') ? $settings['ps_show_quickview'] : 'yes';
        $ps_show_flashlabels           = (isset($settings['ps_show_flashlabels']) && $settings['ps_show_flashlabels'] != '') ? $settings['ps_show_flashlabels'] : 'yes';
        $ps_show_review_count           = (isset($settings['ps_show_review_count']) && $settings['ps_show_review_count'] != '') ? $settings['ps_show_review_count'] : 'no';
        $ps_reviw_suffice           = (isset($settings['ps_reviw_suffice']) && $settings['ps_reviw_suffice'] != '') ? $settings['ps_reviw_suffice'] : '';
        
        $ps_post_thumb_width       = (isset($settings['ps_post_thumb_width']) && $settings['ps_post_thumb_width'] > 0) ? $settings['ps_post_thumb_width'] : '';
        $ps_post_thumb_height       = (isset($settings['ps_post_thumb_height']) && $settings['ps_post_thumb_height'] > 0) ? $settings['ps_post_thumb_height'] : '';
        
        
        $ps_post_item = (isset($settings['ps_post_item']) && $settings['ps_post_item'] > 0 ? $settings['ps_post_item'] : 4);
        $ps_offset = (isset($settings['ps_offset']) && $settings['ps_offset'] > 0 ? $settings['ps_offset'] : 0);
        
        $ps_show_pagination = (isset($settings['ps_show_pagination']) && !empty($settings['ps_show_pagination']) ? $settings['ps_show_pagination'] : 'no');
        $ps_pagin_type = (isset($settings['ps_pagin_type']) && $settings['ps_pagin_type'] > 0 ? $settings['ps_pagin_type'] : '1');
        $ps_load_more_label = (isset($settings['ps_load_more_label']) && !empty($settings['ps_load_more_label']) ? $settings['ps_load_more_label'] : esc_html__('Load More', 'uiuxom'));
        $ps_pagin_alignment = (isset($settings['ps_pagin_alignment']) && !empty($settings['ps_pagin_alignment']) ? $settings['ps_pagin_alignment'] : 'center');
        
        $view_params = [];
        $view_params['ps_xl_col'] = $ps_xl_col;
        $view_params['ps_lg_col'] = $ps_lg_col;
        $view_params['ps_md_col'] = $ps_md_col;
        $view_params['ps_sm_col'] = $ps_sm_col;
        $view_params['ps_show_wishlist'] = $ps_show_wishlist;
        $view_params['ps_show_quickview'] = $ps_show_quickview;
        $view_params['ps_show_flashlabels'] = $ps_show_flashlabels;
        $view_params['ps_show_review_count'] = $ps_show_review_count;
        $view_params['ps_reviw_suffice'] = $ps_reviw_suffice;
        $view_params['ps_post_thumb_width'] = $ps_post_thumb_width;
        $view_params['ps_post_thumb_height'] = $ps_post_thumb_height;
        
        $query_args = [
            'post_type' => 'product',
            'post_status' => 'publish',
            'orderby' => $ps_order_by,
            'order' => $ps_order,
            'posts_per_page' => $ps_post_item,
        ];
        
        if (($key = array_search(0, $ps_category)) !== false) {
            unset($ps_category[$key]);
        }
        if (!empty($ps_category)) {
            $query_args['tax_query'] = array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'id',
                    'terms' => $ps_category,
                    'operator' => 'IN'
                )
            );
        }
        
        if (($key = array_search(0, $ps_tag)) !== false) {
            unset($ps_tag[$key]);
        }
        if (!empty($ps_tag)) {
            if(isset($query_args['tax_query'])):
                $query_args['tax_query'][] = array(
                        'taxonomy' => 'product_tag', 
                        'field' => 'id', 
                        'terms' => $ps_tag,
                        'operator' => 'IN',
                );
            else:
                $query_args['tax_query'] = array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'product_tag',
                        'field' => 'id',
                        'terms' => $ps_tag,
                        'operator' => 'IN'
                    )
                );
            endif;
        }
        
        if (($key = array_search(0, $ps_brand)) !== false) {
            unset($ps_brand[$key]);
        }
        if (!empty($ps_brand)) {
            if(isset($query_args['tax_query'])):
                $query_args['tax_query'][] = array(
                        'taxonomy' => 'product_brand', 
                        'field' => 'id', 
                        'terms' => $ps_brand,
                        'operator' => 'IN',
                );
            else:
                $query_args['tax_query'] = array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'product_brand',
                        'field' => 'id',
                        'terms' => $ps_brand,
                        'operator' => 'IN'
                    )
                );
            endif;
        }
        
        if (($key = array_search(0, $ps_collection)) !== false) {
            unset($ps_collection[$key]);
        }
        if (!empty($ps_collection)) {
            if(isset($query_args['tax_query'])):
                $query_args['tax_query'][] = array(
                        'taxonomy' => 'product_collection', 
                        'field' => 'id', 
                        'terms' => $ps_collection,
                        'operator' => 'IN',
                );
            else:
                $query_args['tax_query'] = array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'product_collection',
                        'field' => 'id',
                        'terms' => $ps_collection,
                        'operator' => 'IN'
                    )
                );
            endif;
        }
        
        
        if ('2' === $ps_product_types) {
            if(isset($query_args['tax_query'])):
                $query_args['tax_query'][] = array(
                        'taxonomy' => 'product_visibility', 
                        'field' => 'name', 
                        'terms' => 'featured',
                        'operator' => 'IN',
                );
            else:
                $query_args['tax_query']   = array(
                    'relation' => 'AND', 
                    array(
                        'taxonomy' => 'product_visibility', 
                        'field' => 'name', 
                        'terms' => 'featured',
                        'operator' => 'IN',
                    ) 
                );
            endif;
        }
        //On Sell product
        if ('3' === $ps_product_types) {
            $query_args['post__in'] = wc_get_product_ids_on_sale();
        }
        //Best Sell product
        if ('4' === $ps_product_types) {
            $query_args['orderby'] = 'meta_value_num';
            $query_args['meta_key'] = 'total_sales';
            $query_args['order'] = 'DESC';
        }
        
        if ('5' === $ps_product_types) {
            $query_args['orderby'] = 'meta_value_num';
            $query_args['meta_key'] = '_wc_average_rating';
            $query_args['order'] = 'DESC';
        }
        
        if (($key = array_search(0, $ps_specific)) !== false) {
            unset($ps_specific[$key]);
        }
        if ($ps_product_types == '6' && !empty($ps_specific)) {
            $query_args['post__in'] = $ps_specific;
            $query_args['orderby'] = 'post__in';
        }
        
        if (($key = array_search(0, $ps_not_specific)) !== false) {
            unset($ps_not_specific[$key]);
        }
        if (!empty($ps_not_specific)) {
            $query_args['post__not_in'] = $ps_not_specific;
        }
        
        if ($ps_offset > 0) {
            $query_args['offset'] = $ps_offset;
        }
        
        if($ps_show_pagination == 'yes'){
            $paged = (get_query_var('paged') != '' ? get_query_var('paged') : '');
            $page = (get_query_var('page') != '' ? get_query_var('page') : 1);
            $query_args['paged'] = ($paged > 0 ? $paged : $page);
        }

        include dirname(__FILE__).'/style/product_grid/style1.php';
    }
    
    protected function content_template() {
        
    }
}