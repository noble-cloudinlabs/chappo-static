<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_About_Image_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'uiuxom-about-image';
    }
    
    public function get_title() {
        return esc_html__( 'About Image', 'uiuxom' );
    }

    public function get_icon() {
        return 'eicon-image';
    }

    public function get_categories() {
        return [ 'uiuxom-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
                'section_tab_1', ['label'     => esc_html__('About Image', 'uiuxom')]
        );
                $this->add_control( 'abi_image_1', [
                                'label' => esc_html__( 'About Image 01', 'uiuxom' ),
                                'label_block'   => TRUE,
                                'type' => Controls_Manager::MEDIA,
                                'default'       => [],
                                'description' => esc_html__('Image size should be 312x251px.', 'uiuxom')
                        ]
                );
                $this->add_control( 'abi_image_2', [
                                'label'         => esc_html__( 'About Image 02', 'uiuxom' ),
                                'label_block'   => TRUE,
                                'type'          => Controls_Manager::MEDIA,
                                'default'       => [],
                                'description' => esc_html__('312x301px for style 1 and 424x633px for style 2.', 'uiuxom')
                        ]
                );
                $this->add_control( 'abi_image_3', [
                                'label'         => esc_html__( 'About Image 03', 'uiuxom' ),
                                'label_block'   => TRUE,
                                'type'          => Controls_Manager::MEDIA,
                                'description' => esc_html__('179x170px image size.', 'uiuxom'),
                                'default'       => [],
                        ]
                );
                $this->add_control( 'abi_image_4', [
                                'label'         => esc_html__( 'About Image 04', 'uiuxom' ),
                                'label_block'   => TRUE,
                                'type'          => Controls_Manager::MEDIA,
                                'description' => esc_html__('442x301px image size.', 'uiuxom'),
                                'default'       => [],
                        ]
                );
                $this->add_control( 'abi_show_counter', [
                                'label' => esc_html__( 'Show Counter', 'uiuxom' ),
                                'type' => Controls_Manager::SWITCHER,
                                'label_on' => esc_html__( 'Show', 'your-plugin' ),
                                'label_off' => esc_html__( 'Hide', 'your-plugin' ),
                                'return_value' => 'yes',
                                'default' => 'yes',
                        ]
                );
                $this->add_control( 'abi_count_number', [
                                'label' => esc_html__( 'Count Number', 'uiuxom' ),
                                'type' => Controls_Manager::NUMBER,
                                'min' => 0,
                                'step' => 1,
                                'default' => 12,
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'abi_show_counter',
                                                'operator'  => '==',
                                                'value'     => 'yes',
                                        ]
                                    ],
                                ],
                        ]
                );
                $this->add_control( 'abi_count_title_01', [
                                'label' => esc_html__( 'Count Title', 'uiuxom' ),
                                'type' => Controls_Manager::TEXT,
                                'default' => esc_html__( 'Successful Years', 'uiuxom' ),
                                'conditions'    => [
                                    'terms'     => [
                                        [
                                                'name'      => 'abi_show_counter',
                                                'operator'  => '==',
                                                'value'     => 'yes',
                                        ]
                                    ],
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_30', [
                    'label'         => esc_html__('Area & Images Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_responsive_control('abi_area_paddings', [
                                'label' => esc_html__( 'Area Padding', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .aboutImage' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control('abi_area_margin', [
                                'label' => esc_html__( 'Area Margin', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .aboutImage' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_control( 'hr_11', [ 'type' => \Elementor\Controls_Manager::DIVIDER, ] );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'abi_images_border',
                                'label' => esc_html__( 'Images Border', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .aiImgRow img',
                        ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                'name' => 'abi_images_shadow',
                                'label' => esc_html__( 'Image Shadow', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .aiImgRow img',
                        ]
                );
                $this->add_control('abi_images_radius', [
                                'label' => esc_html__( 'Images Radius', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .aiImgRow img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_3', [
                    'label'         => esc_html__('Counter Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_responsive_control( 'abi_counter_box_with', [
                                'label' => esc_html__( 'Counter Box Width', 'uiuxom' ),
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
                                        '{{WRAPPER}} .aiCounter' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'abi_counter_box_height', [
                                'label' => esc_html__( 'Counter Box Height', 'uiuxom' ),
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
                                        '{{WRAPPER}} .aiCounter' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'abi_counter_bg',
                                'label' => esc_html__( 'Counter Background', 'uiuxom' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .aiCounter',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'abi_counter_border',
                                'label' => esc_html__( 'Counter Border', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .aiCounter',
                        ]
                );
                $this->add_group_control(Group_Control_Box_Shadow::get_type(), [
                                'name' => 'abi_counter_shadow',
                                'label' => esc_html__( 'Counter Shadow', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .aiCounter',
                        ]
                );
                $this->add_control('abi_counter_radius', [
                                'label' => esc_html__( 'Counter Border Radius', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .aiCounter' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
                $this->add_responsive_control('abi_counter_paddings', [
                                'label' => esc_html__( 'Counter Padding', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .aiCounter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ]
                        ]
                );
                $this->add_responsive_control('abi_counter_margin', [
                                'label' => esc_html__( 'Counter Margins', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .aiCounter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_4', [
                    'label'         => esc_html__('Counter Number', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'abi_counter_number_type',
                                'label'     => esc_html__( 'Number Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .aiCounter h2',
                        ]
                );
                $this->add_control('abi_counter_number_color',[
                                'label'     => esc_html__( 'Number Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .aiCounter h2' => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control('abi_counter_number_margin', [
                                'label' => esc_html__( 'Number Margins', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .aiCounter h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ]
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_6', [
                    'label'         => esc_html__('Title', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                    'conditions'    => [
                            'terms'     => [
                                    [
                                            'name'      => 'abi_show_counter',
                                            'operator'  => '==',
                                            'value'     => 'yes',
                                    ]
                            ],
                    ],
                ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'abi_counter_title_type',
                                'label'     => esc_html__( 'Title Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .aiCounter h3.aiCounterT',
                        ]
                );
                $this->add_control('abi_counter_title_color',[
                                'label'     => esc_html__( 'Title Color', 'uiuxom' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .aiCounter h3.aiCounterT' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control('abi_counter_title_margin', [
                                'label' => esc_html__( 'Title Margins', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .aiCounter h3.aiCounterT' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                        ]
                );
        $this->end_controls_section();
        
    }
    protected function render() {
        $settings       = $this->get_settings_for_display();
        
        $abi_style      = (isset($settings['abi_style']) && $settings['abi_style'] > 0) ? $settings['abi_style'] : 1;
        $abi_image_1       = (isset($settings['abi_image_1']['url']) && $settings['abi_image_1']['url'] != '') ? $settings['abi_image_1']['url'] : 'https://via.placeholder.com/312x251.png?text=Orbito';
        $abi_image_2       = (isset($settings['abi_image_2']['url']) && $settings['abi_image_2']['url'] != '') ? $settings['abi_image_2']['url'] : 'https://via.placeholder.com/312x301.png?text=Orbito';
        $abi_image_3       = (isset($settings['abi_image_3']['url']) && $settings['abi_image_3']['url'] != '') ? $settings['abi_image_3']['url'] : 'https://via.placeholder.com/179x170.png?text=Orbito';
        $abi_image_4       = (isset($settings['abi_image_4']['url']) && $settings['abi_image_4']['url'] != '') ? $settings['abi_image_4']['url'] : 'https://via.placeholder.com/442x301.png?text=Orbito';


        $abi_show_counter       = (isset($settings['abi_show_counter']) && !empty($settings['abi_show_counter'])) ? $settings['abi_show_counter'] : 'no';
        $abi_count_number  = (isset($settings['abi_count_number']) && $settings['abi_count_number'] != '') ? $settings['abi_count_number'] : '';
        $abi_count_title_01  = (isset($settings['abi_count_title_01']) && $settings['abi_count_title_01'] != '') ? $settings['abi_count_title_01'] : '';

        ?>
        <div class="aboutImage">
            <div class="aiImgRow clearfix">
                <img class="float-start aiImg01" src="<?php echo esc_url($abi_image_1) ?>" alt="<?php echo get_bloginfo('name'); ?>">
                <img class="float-end aiImg02" src="<?php echo esc_url($abi_image_2) ?>" alt="<?php echo get_bloginfo('name'); ?>">
            </div>
            <div class="aiImgRow clearfix">
                <img class="float-start aiImg03" src="<?php echo esc_url($abi_image_3) ?>" alt="<?php echo get_bloginfo('name'); ?>">
                <img class="float-end aiImg04" src="<?php echo esc_url($abi_image_4) ?>" alt="<?php echo get_bloginfo('name'); ?>">
            </div>
            <?php if($abi_show_counter == 'yes'): ?>
            <div class="aiCounter">
                <h2 class="timer" data-count="<?php echo esc_attr($abi_count_number); ?>"><?php echo esc_html($abi_count_number); ?></h2>
                <?php if(!empty($abi_count_title_01)): ?>
                <h3 class="aiCounterT"><?php echo esc_html($abi_count_title_01); ?></h3>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
        <?php
        
    }
    
    protected function content_template() {}
}