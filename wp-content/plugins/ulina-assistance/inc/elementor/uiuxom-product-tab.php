<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Product_Tab_Widgets extends Widget_Base{ 
    
    public function get_name() {
        return 'uiuxom-product-tab';
    }
    
    public function get_title() {
        return esc_html__( 'Product Tab', 'uiuxom' );
    }

    public function get_icon() {
        return 'eicon-product-tabs';
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
                $this->add_control( 'ps_nav_alignment', [
                                'label' => esc_html__( 'Tab Nav Alignment', 'uiuxom' ),
                                'type'  => Controls_Manager::SELECT,
                                'default' => 'center',
                                'options' => [
                                        'left'                 => esc_html__( 'Left', 'uiuxom' ),
                                        'center'                 => esc_html__( 'Center', 'uiuxom' ),
                                        'right'                => esc_html__( 'Right', 'uiuxom' ),
                                ],
                        ]
                );
                $repeater = new \Elementor\Repeater();
                        $repeater->add_control( 'ps_tab_title', [
                                        'label' => esc_html__( 'Tab Title', 'uiuxom' ),
                                        'type'  => Controls_Manager::TEXT,
                                        'label_block'  => TRUE,
                                        'default' => esc_html__( 'All Products', 'uiuxom' ),
                                ]
                        );

                        $repeater->add_control( 'ps_proudct_view', [
                                        'label' => esc_html__( 'View Type', 'uiuxom' ),
                                        'type'  => Controls_Manager::SELECT,
                                        'default' => '1',
                                        'options' => [
                                                '1'                 => esc_html__( 'Grid View', 'uiuxom' ),
                                                '2'                 => esc_html__( 'Slider View', 'uiuxom' ),
                                        ],
                                ]
                        );
                        $repeater->add_control( 'ps_items_gapping', [
                                        'label' => esc_html__( 'Items Gapping', 'uiuxom' ),
                                        'type' => Controls_Manager::NUMBER,
                                        'min' => 0,
                                        'max' => 60,
                                        'step' => 1,
                                        'default' => 24,
                                        'description'       => esc_html__('Insert items gapping if you want.', 'uiuxom'),
                                        'conditions'    => [
                                                'terms'     => [
                                                        [
                                                                'name'      => 'ps_proudct_view',
                                                                'operator'  => '==',
                                                                'value'     => '2',
                                                        ]
                                                ],
                                        ],
                                ]
                        );
                        $repeater->add_control( 'ps_slide_autoplay', [
                                        'label'             => esc_html__( 'Is Autoplay?', 'uiuxom' ),
                                        'type'              => Controls_Manager::SWITCHER,
                                        'label_on'          => esc_html__( 'Yes', 'uiuxom' ),
                                        'label_off'         => esc_html__( 'No', 'uiuxom' ),
                                        'description'       => esc_html__('Do you want to make this slider auto play?', 'uiuxom'),
                                        'return_value'      => 'yes',
                                        'default'           => 'yes',
                                        'conditions'    => [
                                                'terms'     => [
                                                        [
                                                                'name'      => 'ps_proudct_view',
                                                                'operator'  => '==',
                                                                'value'     => '2',
                                                        ]
                                                ],
                                        ],
                                ]
                        );
                        $repeater->add_control( 'ps_slide_loop', [
                                        'label'             => esc_html__( 'Is Loop?', 'uiuxom' ),
                                        'type'              => Controls_Manager::SWITCHER,
                                        'label_on'          => esc_html__( 'Yes', 'uiuxom' ),
                                        'label_off'         => esc_html__( 'No', 'uiuxom' ),
                                        'description'       => esc_html__('Do you want to make this slider item loop?', 'uiuxom'),
                                        'return_value'      => 'yes',
                                        'default'           => 'yes',
                                        'conditions'    => [
                                                'terms'     => [
                                                        [
                                                                'name'      => 'ps_proudct_view',
                                                                'operator'  => '==',
                                                                'value'     => '2',
                                                        ]
                                                ],
                                        ],
                                ]
                        );
                        $repeater->add_control( 'ps_slide_nav', [
                                        'label'             => esc_html__( 'Is Nav?', 'uiuxom' ),
                                        'type'              => Controls_Manager::SWITCHER,
                                        'label_on'          => esc_html__( 'Yes', 'uiuxom' ),
                                        'label_off'         => esc_html__( 'No', 'uiuxom' ),
                                        'description'       => esc_html__('Do you want to show slider arrow navigation?', 'uiuxom'),
                                        'return_value'      => 'yes',
                                        'default'           => 'no',
                                        'conditions'    => [
                                                'terms'     => [
                                                        [
                                                                'name'      => 'ps_proudct_view',
                                                                'operator'  => '==',
                                                                'value'     => '2',
                                                        ]
                                                ],
                                        ],
                                ]
                        );
                        $repeater->add_control( 'ps_nav_position', [
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
                                            'name' => 'ps_proudct_view',
                                            'operator' => '==',
                                            'value' => '2',
                                        ],
                                        [
                                            'name' => 'ps_slide_nav',
                                            'operator' => '==',
                                            'value' => 'yes',
                                        ],
                                    ],
                                ],
                            ]
                        );
                        $repeater->add_control( 'ps_slide_dots', [
                                        'label'             => esc_html__( 'Is Dots?', 'uiuxom' ),
                                        'type'              => Controls_Manager::SWITCHER,
                                        'label_on'          => esc_html__( 'Yes', 'uiuxom' ),
                                        'label_off'         => esc_html__( 'No', 'uiuxom' ),
                                        'description'       => esc_html__('Do you want to show slider bullets item?', 'uiuxom'),
                                        'return_value'      => 'yes',
                                        'default'           => 'no',
                                        'conditions'    => [
                                                'terms'     => [
                                                        [
                                                                'name'      => 'ps_proudct_view',
                                                                'operator'  => '==',
                                                                'value'     => '2',
                                                        ]
                                                ],
                                        ],
                                ]
                        );
                        $repeater->add_control( 'ps_product_types', [
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
                        $repeater->add_control('ps_category', [
                                        'label' => esc_html__('Product Category', 'uiuxom'),
                                        'type' => 'uiuxom_autocomplete',
                                        'description' => esc_html__('Select product category.', 'uiuxom'),
                                        'action' => 'uiuxom_get_taxonomy',
                                        'taxonomy' => 'product_cat',
                                        'multiple' => true,
                                ]
                        );
                        $repeater->add_control('ps_tag', [
                                        'label' => esc_html__('Product Tag', 'uiuxom'),
                                        'type' => 'uiuxom_autocomplete',
                                        'description' => esc_html__('Select product tag.', 'uiuxom'),
                                        'action' => 'uiuxom_get_taxonomy',
                                        'taxonomy' => 'product_tag',
                                        'multiple' => true,
                                ]
                        );
                        $repeater->add_control('ps_brand', [
                                        'label' => esc_html__('Product Brand', 'uiuxom'),
                                        'type' => 'uiuxom_autocomplete',
                                        'description' => esc_html__('Select product brand.', 'uiuxom'),
                                        'action' => 'uiuxom_get_taxonomy',
                                        'taxonomy' => 'product_brand',
                                        'multiple' => true,
                                ]
                        );
                        $repeater->add_control('ps_collection', [
                                        'label' => esc_html__('Product Collection', 'uiuxom'),
                                        'type' => 'uiuxom_autocomplete',
                                        'description' => esc_html__('Select product collection.', 'uiuxom'),
                                        'action' => 'uiuxom_get_taxonomy',
                                        'taxonomy' => 'product_collection',
                                        'multiple' => true,
                                ]
                        );
                        $repeater->add_control( 'ps_specific', [
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
                        $repeater->add_control( 'ps_not_specific', [
                                        'label'         => esc_html__( 'Exclude Product', 'uiuxom' ),
                                        'type'          => Controls_Manager::SELECT2,
                                        'label_block'   => TRUE,
                                        'multiple'      => true,
                                        'default'       => array('0'),
                                        'options'       => ulina_post_array('product', esc_html__('All Product', 'uiuxom')),
                                ]
                        );
                        $repeater->add_control( 'ps_xl_col', [
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
                        $repeater->add_control( 'ps_lg_col', [
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
                        $repeater->add_control( 'ps_md_col', [
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
                        $repeater->add_control( 'ps_sm_col', [
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
                        $repeater->add_control( 'ps_post_thumb_width', [
                                        'label'         => esc_html__( 'Product Thumb Width', 'uiuxom' ),
                                        'type'          => Controls_Manager::NUMBER,
                                        'min'           => 1,
                                        'max'           => 2000,
                                        'step'          => 1,
                                        'default'       => '',
                                        'description'   => esc_html__( 'You can set here a custom width for product thumbnail.', 'uiuxom' ),
                                ]
                        );
                        $repeater->add_control( 'ps_post_thumb_height', [
                                        'label'         => esc_html__( 'Product Thumb Height', 'uiuxom' ),
                                        'type'          => Controls_Manager::NUMBER,
                                        'min'           => 1,
                                        'max'           => 2000,
                                        'step'          => 1,
                                        'default'       => '',
                                        'description'   => esc_html__( 'You can set here a custom height for product thumbnail.', 'uiuxom' ),
                                ]
                        );
                        $repeater->add_control( 'ps_post_item', [
                                        'label'         => esc_html__( 'Number Of Item', 'uiuxom' ),
                                        'type'          => Controls_Manager::NUMBER,
                                        'min'           => 1,
                                        'max'           => 2000,
                                        'step'          => 1,
                                        'default'       => 8,
                                        'description'   => esc_html__( 'How many item you want to show.', 'uiuxom' ),
                                ]
                        );
                        $repeater->add_control( 'ps_offset', [
                                'label' => esc_html__('Offset', 'uiuxom'),
                                'type' => Controls_Manager::NUMBER,
                                'min' => 0,
                                'max' => 500,
                                'step' => 1,
                                'description' => esc_html__('How many product item you want to skip?.', 'uiuxom'),
                            ]
                        );
                        $repeater->add_control( 'ps_order_by', [
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
                        $repeater->add_control( 'ps_order', [
                                        'label' => esc_html__( 'Order', 'uiuxom' ),
                                        'type'  => Controls_Manager::SELECT,
                                        'default' => 'desc',
                                        'options' => [
                                                'asc'        => esc_html__( 'Ascending', 'uiuxom' ),
                                                'desc'       => esc_html__( 'Descending', 'uiuxom' ),
                                        ],
                                ]
                        );
                        $repeater->add_control( 'ps_show_wishlist', [
                                'label' => esc_html__( 'Show Wishlist BTN', 'uiuxom' ),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                                'label_on' => __( 'Show', 'uiuxom' ),
                                'label_off' => __( 'Hide', 'uiuxom' ),
                                'return_value' => 'yes',
                                'default' => 'no'
                            ]
                        );
                        $repeater->add_control( 'ps_show_quickview', [
                                'label' => esc_html__( 'Show Quickview BTN', 'uiuxom' ),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                                'label_on' => __( 'Show', 'uiuxom' ),
                                'label_off' => __( 'Hide', 'uiuxom' ),
                                'return_value' => 'yes',
                                'default' => 'yes'
                            ]
                        );
                        $repeater->add_control( 'ps_show_flashlabels', [
                                'label' => esc_html__( 'Show Flash Labels', 'uiuxom' ),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                                'label_on' => esc_html__( 'Show', 'uiuxom' ),
                                'label_off' => esc_html__( 'Hide', 'uiuxom' ),
                                'return_value' => 'yes',
                                'default' => 'no',
                            ]
                        );
                        $repeater->add_control( 'ps_show_review_count', [
                                'label' => esc_html__( 'Show Review Count', 'uiuxom' ),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                                'label_on' => esc_html__( 'Show', 'uiuxom' ),
                                'label_off' => esc_html__( 'Hide', 'uiuxom' ),
                                'return_value' => 'yes',
                                'default' => 'no',
                            ]
                        );
                        $repeater->add_control( 'ps_reviw_suffice', [
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
                $this->add_control('lists', [
                                'label'         => esc_html__( 'Tab Item', 'uiuxom' ),
                                'type'          => Controls_Manager::REPEATER,
                                'fields'        => $repeater->get_controls(),
                                'default'       => [
                                        [
                                                'ps_tab_title'       => esc_html__( 'All Products', 'uiuxom' ),
                                                'ps_proudct_view'       => 1,
                                                'ps_items_gapping'      => 24,
                                                'ps_slide_autoplay'     => 'yes',
                                                'ps_slide_loop'         => 'yes',
                                                'ps_slide_nav'          => 'no',         
                                                'ps_nav_position'          => '2',         
                                                'ps_slide_dots'         => 'no',
                                                'ps_product_types'        => 1,
                                                'ps_category'        => array('0'),
                                                'ps_tag'        => array('0'),
                                                'ps_specific'        => array('0'),
                                                'ps_not_specific'        => array('0'),
                                                'ps_xl_col'        => 4,
                                                'ps_lg_col'        => 4,
                                                'ps_md_col'        => 3,
                                                'ps_sm_col'        => 2,
                                                'ps_post_thumb_width'        => '',
                                                'ps_post_thumb_height'        => '',
                                                'ps_post_item'        => 8,
                                                'ps_offset'        => 0,
                                                'ps_order_by'        => 'date',
                                                'ps_order'        => 'desc',
                                                'ps_show_wishlist'        => 'no',
                                                'ps_show_quickview'        => 'yes',
                                                'ps_show_flashlabels'        => 'no',
                                                'ps_show_review_count'     => 'no',
                                                'ps_reviw_suffice'     => '',

                                        ],
                                ],
                                'title_field' => '{{{ ps_tab_title }}}',
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section(
                'section_tab_1tab', [
                    'label'         => esc_html__('Tab UL Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'prs_tab_box_bg',
                                'label' => esc_html__( 'Tab Background', 'uiuxom' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .productTabsNav',
                        ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                'name' => 'prs_tab_shadow',
                                'label' => esc_html__( 'Tab Shadow', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .productTabsNav',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'prs_tab_border',
                                'label' => esc_html__( 'Tab Border', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .productTabsNav',
                        ]
                );
                $this->add_responsive_control( 'prs_tab_padding', [
                                'label' => esc_html__( 'Tab Paddings', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .productTabsNav' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'prs_tab_margin', [
                                'label' => esc_html__( 'Tab Margins', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .productTabsNav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section(
                'section_tab_1tab_item', [
                    'label'         => esc_html__('Tab Item Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'prs_tabi_typography',
                                'label'     => esc_html__( 'Tab Item Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .productTabsNav li button'
                        ]
                );  
                $this->add_responsive_control( 'prs_tabi_width', [
                                'label' => __( 'Tab Item Width', 'uiuxom' ),
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
                                        '{{WRAPPER}} .productTabsNav li button' => 'width: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .productTabsNav li button' => 'min-width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'prs_tabi_height', [
                                'label' => __( 'Tab Item Height', 'uiuxom' ),
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
                                        '{{WRAPPER}} .productTabsNav li button' => 'height: {{SIZE}}{{UNIT}};'
                                ],
                        ]
                );
                $this->start_controls_tabs( 'style_tabsItem_2' );
                    $this->start_controls_tab('icon_buttonitem_style_normal',['label' => esc_html__( 'Normal', 'uiuxom' ),]);
                        $this->add_responsive_control( 'icon_tabitem_color', [
                                        'label' => esc_html__( 'Color', 'uiuxom' ),
                                        'type' => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .productTabsNav li button'   => 'color: {{VALUE}}',
                                        ],
                                ]
                        );
                        $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'icon_btnitem_bg',
                                        'label' => esc_html__( 'Background', 'uiuxom' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .productTabsNav li button',
                                ]
                        );
                        $this->add_group_control( Group_Control_Border::get_type(), [
                                        'name'      => 'icon_btn_item_border',
                                        'label'     => esc_html__( 'Border', 'uiuxom' ),
                                        'selector'  => '{{WRAPPER}} .productTabsNav li button',
                                ]
                        );
                        $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                        'name' => 'prs_tab_item_shadow',
                                        'label' => esc_html__( 'Shadow', 'uiuxom' ),
                                        'selector' => '{{WRAPPER}} .productTabsNav li button',
                                ]
                        );
                    $this->end_controls_tab();
                    $this->start_controls_tab( 'icon_buttonitem_style_hover',['label' => esc_html__( 'Hover', 'uiuxom' )]);
                        $this->add_responsive_control( 'icon_label_items_hover_color', [
                                        'label'     => esc_html__( 'Color', 'uiuxom' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .productTabsNav li button:hover'   => 'color: {{VALUE}}',
                                        ],
                                ]
                        );
                        $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'icon_1_items_hover_bg',
                                        'label' => esc_html__( 'Background', 'uiuxom' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .productTabsNav li button:hover',
                                ]
                        );
                        $this->add_group_control( Group_Control_Border::get_type(), [
                                        'name'      => 'icon_hover_items_border',
                                        'label'     => esc_html__( 'Border', 'uiuxom' ),
                                        'selector'  => '{{WRAPPER}} .productTabsNav li button:hover',
                                ]
                        );
                        $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                        'name' => 'prs_tab_item_shadow_hover',
                                        'label' => esc_html__( 'Shadow', 'uiuxom' ),
                                        'selector' => '{{WRAPPER}} .productTabsNav li button:hover',
                                ]
                        );
                    $this->end_controls_tab();
                    $this->start_controls_tab( 'icon_buttonitem_style_active',['label' => esc_html__( 'Active', 'uiuxom' )]);
                        $this->add_responsive_control( 'icon_label_items_active_color', [
                                        'label'     => esc_html__( 'Color', 'uiuxom' ),
                                        'type'      => Controls_Manager::COLOR,
                                        'selectors' => [
                                                '{{WRAPPER}} .productTabsNav li button.active'   => 'color: {{VALUE}}',
                                        ],
                                ]
                        );
                        $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'icon_1_items_active_bg',
                                        'label' => esc_html__( 'Background', 'uiuxom' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .productTabsNav li button.active',
                                ]
                        );
                        $this->add_group_control( Group_Control_Border::get_type(), [
                                        'name'      => 'icon_active_items_border',
                                        'label'     => esc_html__( 'Border', 'uiuxom' ),
                                        'selector'  => '{{WRAPPER}} .productTabsNav li button.active',
                                ]
                        );
                        $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                        'name' => 'prs_tab_item_shadow_active',
                                        'label' => esc_html__( 'Shadow', 'uiuxom' ),
                                        'selector' => '{{WRAPPER}} .productTabsNav li button.active',
                                ]
                        );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'prs_tab_item_radius', [
                                'label' => esc_html__( 'Item Radius', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .productTabsNav li button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'prs_tab_item_padding', [
                                'label' => esc_html__( 'Tab Paddings', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .productTabsNav li button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'prs_tab_item_margin', [
                                'label' => esc_html__( 'Tab Item Margins', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .productTabsNav li button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );   
        $this->end_controls_section();

        $this->start_controls_section(
                'section_tab_1tab_content', [
                    'label'         => esc_html__('Tab Content Area Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'tab_content_area_bg',
                                'label' => esc_html__( 'Tab Area Background', 'uiuxom' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .productTabs .tab-content .tab-pane',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name'      => 'tab_content_area_border',
                                'label'     => esc_html__( 'Tab Area Border', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .productTabs .tab-content .tab-pane',
                        ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                'name' => 'tab_content_area_shadow',
                                'label' => esc_html__( 'Tab Area Shadow', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .productTabs .tab-content .tab-pane',
                        ]
                );
                $this->add_responsive_control( 'tab_content_area_padding', [
                                'label' => esc_html__( 'Tab Area Paddings', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .productTabs .tab-content .tab-pane' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'section_tab_nav', [
                    'label'             => esc_html__('Nav Styling', 'uiuxom'),
                    'tab'               => Controls_Manager::TAB_STYLE,
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
                                        '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-nav button' => 'width: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-nav button' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control(
                        Group_Control_Typography::get_type(), [
                                'name'      => 'nav_i_typography',
                                'label'     => esc_html__( 'Icon Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-nav button'
                        ]
                );
                $this->start_controls_tabs( 'nav_styling_tab' );
                    $this->start_controls_tab('nav_styling_tab_normal',['label' => esc_html__( 'Normal', 'uiuxom' ),]);
                            $this->add_responsive_control( 'bl_nav_color', [
                                            'label' => esc_html__( 'Nav Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-nav button' => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'bl_nav_bg',
                                        'label' => esc_html__( 'Nav Background', 'uiuxom' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-nav button',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'bl_nav_bg_shadow',
                                            'label' => esc_html__( 'Boxs Shadow', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-nav button',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'bl_nav_bg_border',
                                            'label' => esc_html__( 'Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-nav button',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('nav_styling_tab_hover',['label' => esc_html__( 'Hover', 'uiuxom' )]);
                            $this->add_responsive_control( 'bl_nav_color_hover', [
                                            'label' => esc_html__( 'Nav Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-nav button:hover' => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'bl_nav_bg_hover',
                                        'label' => esc_html__( 'Nav Background', 'uiuxom' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-nav button:hover',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name' => 'bl_nav_bg_shadow_hover',
                                            'label' => esc_html__( 'Boxs Shadow', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-nav button:hover',
                                    ]
                            );
                            $this->add_group_control(Group_Control_Border::get_type(), [
                                            'name' => 'bl_nav_bg_border_hover',
                                            'label' => esc_html__( 'Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-nav button:hover',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
            $this->add_control( 'bl_nav_radius', [
                            'label' => esc_html__( 'Nav Buttons  Radius', 'uiuxom' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'folioSlider_nav_padding', [
                            'label'      => esc_html__( 'Nav Buttons Padding', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-nav button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'left_nav_margin', [
                            'label'      => esc_html__( 'Prev BTN Margin', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-nav button.owl-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'right_nav_margin', [
                            'label'      => esc_html__( 'Next BTN Margin', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-nav button.owl-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control( 'area_nav_margin', [
                            'label'      => esc_html__( 'Nav Area Margin', 'uiuxom' ),
                            'type'       => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_04', [
                    'label'             => esc_html__('Dots Styling', 'uiuxom'),
                    'tab'               => Controls_Manager::TAB_STYLE,
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
                                        '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-dot' => 'height: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-dot span' => 'width: {{SIZE}}{{UNIT}};',
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
                                        '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-dot span' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->start_controls_tabs( 'dot_styling_tab' );
                    $this->start_controls_tab('dot_styling_tab_normal',['label' => esc_html__( 'Normal', 'uiuxom' )]);
                            $this->add_responsive_control( 'fs_dot_bg_color', [
                                            'label' => esc_html__( 'Outer BG Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-dot' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'fls_dot_bg_inner_color', [
                                            'label' => esc_html__( 'Inner BG Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-dot span' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'fsl_dot_bg_border',
                                            'label' => esc_html__( 'Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-dot',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('dot_styling_tab_hover',['label' => esc_html__( 'Hover', 'uiuxom' )]);
                            $this->add_responsive_control( 'bl_dot_bg_color_hov', [
                                            'label' => esc_html__( 'Outer BG Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-dot:hover' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-dot.active' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_responsive_control( 'bl_dot_bg_inner_color_hov', [
                                            'label' => esc_html__( 'Inner BG Color', 'uiuxom' ),
                                            'type'  => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-dot:hover span' => 'background: {{VALUE}}',
                                                    '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-dot.active span' => 'background: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name' => 'bl_dot_bg_border_hover',
                                            'label' => esc_html__( 'Border', 'uiuxom' ),
                                            'selector' => '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-dot:hover, {{WRAPPER}} .productTabCarousle.owl-carousel .owl-dot.active',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control('bl_dot_radius', [
                                'label' => esc_html__( 'Dots  Radius', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-dot span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'bl_dot_margin', [
                                'label' => esc_html__( 'Dots  Gapping', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'bl_dots_margin', [
                                'label' => esc_html__( 'Dot Area Margins', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .productTabCarousle.owl-carousel .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display(); 
        $ps_nav_alignment           = (isset($settings['ps_nav_alignment']) && !empty($settings['ps_nav_alignment']) ? $settings['ps_nav_alignment'] : 'center'); 
        

        $tabs           = (isset($settings['lists']) && !empty($settings['lists']) ? $settings['lists'] : array()); 

        include dirname(__FILE__).'/style/product_tab/style1.php';
    }
    
    protected function content_template() {
        
    }
}