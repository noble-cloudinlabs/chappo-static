<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Headings_Widget extends Widget_Base {
    public function get_name() {
        return 'uiuxom-heading';
    }

    public function get_title() {
        return esc_html__('Headings', 'uiuxom');
    }

    public function get_icon() {
        return 'eicon-heading';
    }

    public function get_categories() {
        return ['uiuxom-elements'];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label'         => esc_html__( 'Heading', 'uiuxom' ),
            ]
        );
            $this->add_control('heading_style', [
                            'label' => esc_html__( 'Heading Style', 'uiuxom' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '0',
                            'options' => [
                                    '0'  => esc_html__( 'None', 'uiuxom' ),
                                    '1' => esc_html__( 'Section Sub Title', 'uiuxom' ),
                                    '2' => esc_html__( 'Section Title', 'uiuxom' )
                            ],
                    ]
            );
            $this->add_control( 'heading_tag', [
                            'label' => esc_html__( 'Tag', 'uiuxom' ),
                            'type' => Controls_Manager::SELECT,
                            'description'   => esc_html__('Select HTML tag that you want to use.', 'uiuxom'),
                            'default' => '2',
                            'options' => [
                                    '1' => esc_html__( 'H1', 'uiuxom' ),
                                    '2' => esc_html__( 'H2', 'uiuxom' ),
                                    '3' => esc_html__( 'H3', 'uiuxom' ),
                                    '4' => esc_html__( 'H4', 'uiuxom' ),
                                    '5' => esc_html__( 'H5', 'uiuxom' ),
                                    '6' => esc_html__( 'H6', 'uiuxom' ),
                            ],
                            'conditions'        => [
                                'terms'         => [
                                    [
                                            'name'      => 'heading_style',
                                            'operator'  => '!in',
                                            'value'     => ['1', '2'],
                                    ]
                                ],
                            ],
                    ]
            );
            $this->add_control('heading_text', [
                        'label'             => esc_html__('Heading Text', 'uiuxom'),
                        'type'              => Controls_Manager::TEXTAREA,
                        'label_block'       => TRUE,
                        'default'           => esc_html__('This is Heading', 'uiuxom')
                    ]
            );
            $this->add_responsive_control('heading_alignment', [
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
                            'prefix_class'              => 'uiuxom_headings elementor%s-align-',
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_1', [
                'label'         => esc_html__( 'Heading Style', 'uiuxom' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_responsive_control('heading_color', [
                            'label'		 => esc_html__( 'Color', 'uiuxom' ),
                            'type'		 => Controls_Manager::COLOR,
                            'selectors'	 => [
                                '{{WRAPPER}} .uiuxom_heading' => 'color: {{VALUE}};'
                            ],
                    ]
            );
            $this->add_group_control( Group_Control_Typography::get_type(), [
                            'name'      => 'heading_typography',
                            'label'     => esc_html__( 'Typography', 'uiuxom' ),
                            'selector'  => '{{WRAPPER}} .uiuxom_heading',
                    ]
            );
            $this->add_responsive_control( 'heading_margin', [
                            'label' => esc_html__( 'Marign', 'uiuxom' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors'  => [
                                    '{{WRAPPER}} .uiuxom_heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings           = $this->get_settings_for_display();
        $heading_style        = (isset($settings['heading_style']) && $settings['heading_style'] !='') ? $settings['heading_style'] : 0;
        $heading_tag        = (isset($settings['heading_tag']) && $settings['heading_tag'] !='') ? $settings['heading_tag'] : '2';
        $heading_text       = (isset($settings['heading_text']) && $settings['heading_text'] !='') ? $settings['heading_text'] : esc_html__('Ulina Heading', 'uiuxom');
        
        $headingClass = '';
        if($heading_style == 1):
            $heading_tag = 5;
            $headingClass = 'secSubTitle';
        elseif($heading_style == 2):
            $heading_tag = 2;
            $headingClass = 'secTitle';
        endif;
        
        if($heading_text != ''): ?>
            <h<?php echo $heading_tag; ?> class="uiuxom_heading <?php echo esc_attr($headingClass); ?>"><?php echo wp_kses_post($heading_text); ?></h<?php echo $heading_tag; ?>>
        <?php endif;
    }
    
    protected function content_template() {
        
    }
}