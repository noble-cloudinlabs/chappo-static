<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Tab_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'uiuxom-tab';
    }
    
    public function get_title() {
        return esc_html__( 'Tab', 'uiuxom' );
    }

    public function get_icon() {
        return 'eicon-tabs';
    }

    public function get_categories() {
        return [ 'uiuxom-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
            'section_tab_1', [
                'label'     => esc_html__( 'FAQ Blocks', 'uiuxom' ),
            ]
        );
                $this->add_control( 'tab_style', [
                                'label'     => esc_html__( 'Box Style', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => 1,
                                'options'   => [
                                        1       => esc_html__( 'Vertical', 'uiuxom' ),
                                        2       => esc_html__( 'Horizontal', 'uiuxom' ),
                                ],
                        ]
                );
                $this->add_control( 'tab_menu_alignment', [
                                'label'     => esc_html__( 'Tab Item Alignment', 'uiuxom' ),
                                'type'      => Controls_Manager::SELECT,
                                'default'   => 'start',
                                'options'   => [
                                        'start'       => esc_html__( 'Left', 'uiuxom' ),
                                        'center'       => esc_html__( 'Center', 'uiuxom' ),
                                        'end'       => esc_html__( 'Right', 'uiuxom' ),
                                ],
                                'conditions'    => [
                                    'terms' => [
                                        [
                                                'name'      => 'tab_style',
                                                'operator'  => '==',
                                                'value'     => '2',
                                        ]
                                    ],
                                ],
                        ]
                );
                $repeater = new \Elementor\Repeater();
                        $repeater->add_control( 'tab_title', [
                                        'label'         => esc_html__( 'Tab Title Text', 'uiuxom' ),
                                        'type'          => Controls_Manager::TEXT,
                                        'default'       => '',
                                        'label_block'   => true,
                                        'placeholder'   => esc_html__('Insert tab title', 'uiuxom')
                                ]
                        );
                        $repeater->add_control( 'tab_block', [
                                    'label'         => esc_html__( 'Select Block', 'uiuxom' ),
                                    'type'          => Controls_Manager::SELECT,
                                    'default'       => '0',
                                    'label_block'   => true,
                                    'options'       => ulina_post_array('blocks', esc_html__('All Blocks', 'uiuxom')),
                                    'description'   => esc_html__('create block from blocks post.', 'uiuxom'),
                            ]
                        );
                $this->add_control( 'list', [
                            'label'         => esc_html__( 'Tab Block Item', 'uiuxom' ),
                            'type'          => Controls_Manager::REPEATER,
                            'fields'        => $repeater->get_controls(),
                            'default'       => [
                                    [
                                            'tab_title'       => esc_html__( '', 'uiuxom' ),
                                            'tab_block'       => esc_html__( '0', 'uiuxom' ),

                                    ],
                            ],
                            'title_field' => '{{{ tab_title }}}',
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_2', [
                'label'     => esc_html__('Tab Title Style', 'uiuxom'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name' => 'title_typography',
                                'label' => esc_html__( 'Title Typography', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .ulinaFAQTab li button',
                        ]
                );
                $this->start_controls_tabs( 'style_tabs_3' );
                    $this->start_controls_tab( 'title_style_normal', [ 'label'     => esc_html__( 'Normal', 'uiuxom' ) ] );
                            $this->add_responsive_control( 'title_color', [
                                            'label'     => esc_html__( 'Title Color', 'uiuxom' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .ulinaFAQTab li button' => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'title__bg',
                                        'label' => esc_html__( 'Background', 'uiuxom' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .ulinaFAQTab li button',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name'      => 'title__border',
                                            'label'     => esc_html__( 'Border', 'uiuxom' ),
                                            'selector'  => '{{WRAPPER}} .ulinaFAQTab li button',
                                    ]
                            );
                            $this->add_responsive_control( 'title_border_radius', [
                                        'label' => esc_html__( 'Border Radius', 'uiuxom' ),
                                        'type' => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .ulinaFAQTab li button'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name'      => 'title_shadow',
                                            'label'     => esc_html__( 'Box Shadow', 'uiuxom' ),
                                            'selector'  => '{{WRAPPER}} .ulinaFAQTab li button',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab('title_style_hover',['label' => esc_html__( 'Hover', 'uiuxom' )]);
                            $this->add_responsive_control( 'hover_title_color', [
                                            'label'     => esc_html__( 'Color', 'uiuxom' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .ulinaFAQTab li button:hover' => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'hover_title__bg',
                                        'label' => esc_html__( 'Background', 'uiuxom' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .ulinaFAQTab li button:hover',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name'      => 'hover_title__border',
                                            'label'     => esc_html__( 'Border', 'uiuxom' ),
                                            'selector'  => '{{WRAPPER}} .ulinaFAQTab li button:hover',
                                    ]
                            );
                            $this->add_responsive_control( 'hover_title_border_radius', [
                                        'label' => esc_html__( 'Border Radius', 'uiuxom' ),
                                        'type' => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .ulinaFAQTab li button:hover'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name'      => 'title_hover_shadow',
                                            'label'     => esc_html__( 'Box Shadow', 'uiuxom' ),
                                            'selector'  => '{{WRAPPER}} .ulinaFAQTab li button:hover',
                                    ]
                            );
                    $this->end_controls_tab();
                    $this->start_controls_tab( 'title_style_active', ['label' => esc_html__( 'Active', 'uiuxom' )]);
                            $this->add_responsive_control( 'active_title_color', [
                                            'label'     => esc_html__( 'Color', 'uiuxom' ),
                                            'type'      => Controls_Manager::COLOR,
                                            'selectors' => [
                                                    '{{WRAPPER}} .ulinaFAQTab li button.active' => 'color: {{VALUE}}',
                                            ],
                                    ]
                            );
                            $this->add_group_control( Group_Control_Background::get_type(), [
                                        'name' => 'active_title__bg',
                                        'label' => esc_html__( 'Background', 'uiuxom' ),
                                        'types' => [ 'classic', 'gradient'],
                                        'selector' => '{{WRAPPER}} .ulinaFAQTab li button.active',
                                    ]
                            );
                            $this->add_group_control( Group_Control_Border::get_type(), [
                                            'name'      => 'active_title__border',
                                            'label'     => esc_html__( 'Border', 'uiuxom' ),
                                            'selector'  => '{{WRAPPER}} .ulinaFAQTab li button.active',
                                    ]
                            );
                            $this->add_responsive_control( 'active_title_border_radius', [
                                        'label' => esc_html__( 'Border Radius', 'uiuxom' ),
                                        'type' => Controls_Manager::DIMENSIONS,
                                        'size_units' => [ 'px', '%', 'em' ],
                                        'selectors' => [
                                            '{{WRAPPER}} .ulinaFAQTab li button.active'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        ],
                                ]
                            );
                            $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                            'name'      => 'active_title_shadow',
                                            'label'     => esc_html__( 'Box Shadow', 'uiuxom' ),
                                            'selector'  => '{{WRAPPER}} .ulinaFAQTab li button.active',
                                    ]
                            );
                    $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 't_title_padding', [
                                'label' => esc_html__( 'Paddings', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors'  => [
                                        '{{WRAPPER}} .ulinaFAQTab li button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 't_title_margin', [
                            'label' => esc_html__( 'Margins', 'uiuxom' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .ulinaFAQTab li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_control( 'tab_area_style', [
                        'label'     => esc_html__( 'Tab Area Style', 'uiuxom' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_responsive_control( 'tab_area_margin', [
                            'label' => esc_html__( 'Margins', 'uiuxom' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .ulinaFAQTab' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ],
                    ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section( 'section_tab_3', [
                'label'     => esc_html__('Content Area Style', 'uiuxom'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
                $this->add_responsive_control( 'tab_cont_area_padding', [
                            'label' => esc_html__( 'Padding', 'uiuxom' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .ulinaVerticalTabRow' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .ulinaHorizontalTabRow' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
                $this->add_responsive_control( 'tab_cont_area_margin', [
                            'label' => esc_html__( 'Margins', 'uiuxom' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .ulinaVerticalTabRow' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .ulinaHorizontalTabRow' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
                );
        $this->end_controls_section();

    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        $tab_style     = (isset($settings['tab_style']) && $settings['tab_style'] !='') ? $settings['tab_style'] : 1;
        $tab_menu_alignment     = (isset($settings['tab_menu_alignment']) && $settings['tab_menu_alignment'] !='') ? $settings['tab_menu_alignment'] : 'start';
        $list           = (isset($settings['list']) && !empty($settings['list'])) ? $settings['list'] : array();
        
        include dirname(__FILE__).'/style/tabs/style'.$tab_style.'.php';
    }
    
    protected function content_template() {
        
    }
}