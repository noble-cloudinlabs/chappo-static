<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Navigation_Widgets extends Widget_Base {

    public function get_name() {
        return 'uiuxom-navigation';
    }

    public function get_title() {
        return esc_html__( 'Navigation Menu', 'uiuxom' );
    }

    public function get_icon() {
        return 'eicon-nav-menu';
    }

    public function get_categories() {
        return ['uiuxom-footer-elements'];
    }

    protected function register_controls() {
        
        $menu = wp_get_nav_menus();
        $menulist = array('0' => esc_html__('None', 'uiuxom'));
        if(!empty($menu)){
            foreach ($menu as $mn){
                $menulist[$mn->term_id] = $mn->name;
            }
        }
        $this->start_controls_section(
            'section_tab_1', [
                'label'     => esc_html__( 'Navigation', 'uiuxom' ),
            ]
        );
        $this->add_control(
                'widget_title', [
                    'label'             => esc_html__('Widget Title', 'uiuxom'),
                    'type'              => Controls_Manager::TEXT,
                    'label_block'       => TRUE,
                    'default'           => '',
                ]
        );
        $this->add_control(
                'navigation_select',
                [
                        'label'     => esc_html__( 'Select Navigation', 'uiuxom' ),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => '0',
                        'options'   => $menulist,
                ]
        );
        $this->add_control( 'two_col', [
                        'label'             => esc_html__( 'Is Two Column?', 'uiuxom' ),
                        'type'              => Controls_Manager::SWITCHER,
                        'label_on'          => esc_html__( 'Yes', 'uiuxom' ),
                        'label_off'         => esc_html__( 'No', 'uiuxom' ),
                        'description'       => esc_html__('Do you want to make this two column item?', 'uiuxom'),
                        'return_value'      => 'yes',
                        'default'           => 'no',
                ]
        );
        $this->add_control( 'is_inline', [
                        'label'             => esc_html__( 'Is Inline?', 'uiuxom' ),
                        'type'              => Controls_Manager::SWITCHER,
                        'label_on'          => esc_html__( 'Yes', 'uiuxom' ),
                        'label_off'         => esc_html__( 'No', 'uiuxom' ),
                        'description'       => esc_html__('Do you want to make this inline item?', 'uiuxom'),
                        'return_value'      => 'yes',
                        'default'           => 'no',
                ]
        );
        $this->add_responsive_control(
            'menu_align', [
                'label'			=> esc_html__( 'Alignment', 'uiuxom' ),
                'type'			=> Controls_Manager::CHOOSE,
                'options'                => [
                        'left'           => [
                                'title'  => esc_html__( 'Left', 'uiuxom' ),
                                'icon'   => 'eicon-text-align-left',
                        ],
                        'center'         => [
                                'title'  => esc_html__( 'Center', 'uiuxom' ),
                                'icon'   => 'eicon-text-align-center',
                        ],
                        'right'          => [
                                'title'  => esc_html__( 'Right', 'uiuxom' ),
                                'icon'   => 'eicon-text-align-right',
                        ]
                ],
                'default'		 => 'left',
                'prefix_class'           => 'menu_nav elementor%s-align-',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_2', [
                'label'         => esc_html__( 'Widget Title Style', 'uiuxom' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
                'st_color', [
                        'label'		 => esc_html__( 'Color', 'uiuxom' ),
                        'type'		 => Controls_Manager::COLOR,
                        'selectors'	 => [
                            '{{WRAPPER}} .widgetTitle' => 'color: {{VALUE}};'
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'st_typography',
                        'label'     => esc_html__( 'Typography', 'uiuxom' ),
                        'selector'  => '{{WRAPPER}} .widgetTitle',
                ]
        );
        $this->add_responsive_control(
                'st_padding',
                [
                        'label' => esc_html__( 'Paddings', 'uiuxom' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .widgetTitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'st_margin',
                [
                        'label' => esc_html__( 'Marigns', 'uiuxom' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} .widgetTitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_3',
            [
                'label'         => esc_html__('Navigation Style', 'uiuxom'),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
                'area_paddings',
                [
                        'label'      => esc_html__( 'Area Paddings', 'uiuxom' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} ul.menu' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'area_magrins',
                [
                        'label'      => esc_html__( 'Area Margins', 'uiuxom' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} ul.menu' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'btn_typography',
                        'label'     => esc_html__( 'Text Typography', 'uiuxom' ),
                        'selector'  => '{{WRAPPER}} ul.menu li a',
                ]
        );
        $this->add_responsive_control(
                'list_paddings',
                [
                        'label'      => esc_html__( 'List Item Paddings', 'uiuxom' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} ul.menu li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'list_hover_paddings',
                [
                        'label'      => esc_html__( 'List Item Hover Paddings Left', 'uiuxom' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} ul.menu li a:hover' => 'padding-left: {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'list_magrins',
                [
                        'label'      => esc_html__( 'List Item Margins', 'uiuxom' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                            '{{WRAPPER}} ul.menu li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                        'name'      => 'nav_item_border_color',
                        'label'     => esc_html__( 'Border', 'uiuxom' ),
                        'selector'  => '{{WRAPPER}} ul.menu li',
                ]
        );
        $this->start_controls_tabs( 'style_tabs_1' );
                $this->start_controls_tab(
                        'btn_1_button_style_normal',
                        [
                                'label' => esc_html__( 'Normal', 'uiuxom' ),
                        ]
                );
                $this->add_responsive_control(
                        'btn_1_label_color',
                        [
                                'label' => esc_html__( 'Text Color', 'uiuxom' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} ul.menu li a' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control(
                        'btn_1_bg_color',
                        [
                                'label' => esc_html__( 'BG Color', 'uiuxom' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} ul.menu li a' => 'background: {{VALUE}}',
                                ],
                        ]
                );
                $this->end_controls_tab();
                $this->start_controls_tab(
                        'btn_1_button_style_hover',
                        [
                                'label' => esc_html__( 'Hover', 'uiuxom' ),
                        ]
                );
                $this->add_responsive_control(
                        'btn_label_hover_color',
                        [
                                'label' => esc_html__( 'Hover Color', 'uiuxom' ),
                                'type'  => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} ul.menu li a:hover'  => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control(
                        'btn_1_bg_hover_color',
                        [
                                'label' => esc_html__( 'Hover BG Color', 'uiuxom' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} ul.menu li a:hover' => 'background: {{VALUE}}',
                                ],
                        ]
                );
                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings               = $this->get_settings_for_display();
        $widget_title           = (isset($settings['widget_title']) && $settings['widget_title'] !='') ? $settings['widget_title'] : '';
        $navigation_select      = (isset($settings['navigation_select']) && $settings['navigation_select'] != '') ? $settings['navigation_select'] : '';
        $two_col                = $settings['two_col'];
        $is_inline              = $settings['is_inline'];
        
        ?>
        <aside class="widget navMenu <?php if($two_col == 'yes'): ?>twoColMenu<?php endif; ?> <?php if($is_inline == 'yes'): ?>inlineMenu<?php endif; ?>">
            <?php if($widget_title != ''): ?>
                <h3 class="widgetTitle fwTitle"><?php echo wp_kses_post($widget_title); ?></h3>
            <?php endif; ?>
            <?php wp_nav_menu(array('menu' => $navigation_select)); ?>
        </aside>
        <?php
        
    }

    protected function content_template() {}    
}