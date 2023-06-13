<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Info_Widgets extends Widget_Base {
    public function get_name() {
        return 'uiuxom-info';
    }

    public function get_title() {
        return esc_html__('Contact Info', 'uiuxom');
    }

    public function get_icon() {
        return 'eicon-bullet-list';
    }

    public function get_categories() {
        return ['uiuxom-footer-elements'];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label'         => esc_html__( 'Info', 'uiuxom' ),
            ]
        );
        $this->add_control( 'title', 
                [
                        'label'         => esc_html__( 'Widget Title', 'uiuxom' ),
                        'type'          => Controls_Manager::TEXT,
                        'label_block'   => true,
                ]
        );
        $repeaters = new \Elementor\Repeater();
        $repeaters->add_control(
                'icons',
                [
                        'label'         => esc_html__( 'Info Icon', 'uiuxom' ),
                        'type'          => Controls_Manager::ICON,
                        'label_block'   => TRUE,
                ]
        );
        $repeaters->add_control( 'content', 
                [
                        'label'         => esc_html__( 'Info Content', 'uiuxom' ),
                        'type'          => Controls_Manager::TEXTAREA,
                        'label_block'   => true,
                ]
        );
        $this->add_control(
            'info_list',[
                    'label'         => esc_html__( 'Info Item', 'uiuxom' ),
                    'type'          => Controls_Manager::REPEATER,
                    'fields'        => $repeaters->get_controls(),
                    'default'       => [
                            [
                                    'icons'            => '',
                                    'content'          => '',
                            ],
                    ],
                    'title_field' => '{{{ content }}}',
            ]
        );
        $this->add_responsive_control(
                'st_alignment', [
                        'label'                     => esc_html__( 'Alignment', 'uiuxom' ),
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
                        'prefix_class'              => 'atime_align elementor%s-align-',
                ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
                'section_tab__widget', [
                    'label'         => esc_html__( 'Widget Title Style', 'uiuxom' ),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_responsive_control(
                    'mt_widget_color', [
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
                            'name'      => 'mt_widget_typography',
                            'label'     => esc_html__( 'Typography', 'uiuxom' ),
                            'selector'  => '{{WRAPPER}} .widgetTitle',
                    ]
            );
            $this->add_responsive_control(
                    'mt_widget_padding',
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
                    'mt_widget_margin',
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
                'section_tab_icon', [
                    'label'         => esc_html__( 'Info Icon Style', 'uiuxom' ),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_responsive_control(
                    'icon_color', [
                            'label'		 => esc_html__( 'Color', 'uiuxom' ),
                            'type'		 => Controls_Manager::COLOR,
                            'selectors'	 => [
                                '{{WRAPPER}} .singleAddress i' => 'color: {{VALUE}};'
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name'      => 'icon_typography',
                            'label'     => esc_html__( 'Typography', 'uiuxom' ),
                            'selector'  => '{{WRAPPER}} .singleAddress i',
                    ]
            );
            $this->add_responsive_control(
                    'icon_padding',
                    [
                            'label' => esc_html__( 'Paddings', 'uiuxom' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .singleAddress i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_responsive_control(
                    'icon_margin',
                    [
                            'label' => esc_html__( 'Marigns', 'uiuxom' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .singleAddress i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_tab_4', [
                'label'         => esc_html__( 'Content Style', 'uiuxom' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
                'mt_color', [
                        'label'		 => esc_html__( 'Color', 'uiuxom' ),
                        'type'		 => Controls_Manager::COLOR,
                        'selectors'	 => [
                            '{{WRAPPER}} .singleAddress' => 'color: {{VALUE}};'
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name'      => 'mt_typography',
                        'label'     => esc_html__( 'Typography', 'uiuxom' ),
                        'selector'  => '{{WRAPPER}} .singleAddress',
                ]
        );
        $this->add_responsive_control(
                'mt_padding',
                [
                        'label' => esc_html__( 'Paddings', 'uiuxom' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .singleAddress' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'mt_margin',
                [
                        'label' => esc_html__( 'Marigns', 'uiuxom' ),
                        'type'  => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors'  => [
                                '{{WRAPPER}} .singleAddress' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings           = $this->get_settings_for_display();

        $title              = (isset($settings['title']) && !empty($settings['title'])) ? $settings['title'] : '';
        $info_list          = (isset($settings['info_list']) && !empty($settings['info_list'])) ? $settings['info_list'] : array();
        
        
        ?>
        <aside class="widget">
                <?php if($title != ''): ?>
                        <h3 class="widgetTitle fwTitle"><?php echo wp_kses_post($title); ?></h3>
                <?php endif; ?>
                <?php 
                if(!empty($info_list)):
                foreach($info_list as $il):
                        $content    = (isset($il['content']) ? $il['content'] : '');
                        $icons      = (isset($il['icons']) ? $il['icons'] : '');
                        if($content != ''):
                        ?>
                        <div class="singleAddress">
                                <i class="<?php echo esc_attr($icons); ?>"></i>
                                <?php echo wp_kses_post($content); ?>
                        </div>
                        <?php
                        endif;
                endforeach;
                endif;
                ?>
        </aside>
        <?php

    }
    
    protected function content_template() {}
}