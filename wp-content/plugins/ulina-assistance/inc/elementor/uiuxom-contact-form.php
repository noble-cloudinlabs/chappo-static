<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Contcat_Form_Widget extends Widget_Base {

    public function get_name() {
        return 'uiuxom-contact-form';
    }

    public function get_title() {
        return esc_html__( 'Contact From', 'uiuxom' );
    }

    public function get_icon() {
        return 'eicon-form-vertical';
    }

    public function get_categories() {
        return [ 'uiuxom-elements' ];
    }

    protected function register_controls() {

        global $wpdb;
        $table = $wpdb->prefix.'posts';
        $result = $wpdb->get_results( 'SELECT * FROM '.$table.' WHERE post_type="wpcf7_contact_form" AND post_status="publish"', OBJECT );
        $shortcodes = array('0' => esc_html__('Please Select', 'uiuxom'));
        if(is_array($result) && count($result) > 0){
            foreach($result as $r){
                $shortcodes[$r->ID] = $r->post_title;
            }
        }

        $this->start_controls_section(
            'section_tab', [
                'label'     => esc_html__( 'Contact Form', 'uiuxom' ),
            ]
        );
                        $this->add_control( 'contactForm', [
                                        'label'     => esc_html__( 'Select Form', 'uiuxom' ),
                                        'type'      => Controls_Manager::SELECT,
                                        'default'   => 0,
                                        'options'   => $shortcodes,
                                ]
                        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_1', [
                    'label'         => esc_html__('Form Area Style', 'uiuxom'),
                    'tab'           => Controls_Manager::TAB_STYLE,
                ]
        );
                $this->add_group_control( Group_Control_Background::get_type(), [
                                'name' => 'icon_box_bg',
                                'label' => esc_html__( 'Box Background', 'uiuxom' ),
                                'types' => [ 'classic', 'gradient'],
                                'selector' => '{{WRAPPER}} .contactForm',
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'icon_box_shadow',
                                'label' => esc_html__( 'Box Shadow', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .contactForm',
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'box_border',
                                'label' => esc_html__( 'Border', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .contactForm',
                        ]
                );
                $this->add_responsive_control( 'icon_box_radius', [
                                'label' => esc_html__( 'Radius', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .contactForm' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_padding', [
                                'label' => esc_html__( 'Paddings', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .contactForm' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'icon_box_margin', [
                                'label' => esc_html__( 'Margins', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .contactForm' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        
        $this->start_controls_section(
            'section_tab_2', [
                'label'         => esc_html__( 'Form Field Style', 'uiuxom' ),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name'      => 'cf_field_typo',
                                'label'     => esc_html__( 'Field Typography', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .contactForm input:not([type="submit"]):not([type="radio"]):not([type="checkbox"]), {{WRAPPER}} .contactForm textarea, {{WRAPPER}} .contactForm select',
                        ]
                );
                $this->add_responsive_control( 'cf_text_color', [
                                'label' => esc_html__( 'Text Color', 'uiuxom' ),
                                'type'  => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .contactForm input:not([type="submit"]):not([type="radio"]):not([type="checkbox"])' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .contactForm select' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .contactForm textarea' => 'color: {{VALUE}}',

                                        '{{WRAPPER}} .contactForm textarea::-moz-placeholder' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .contactForm form input::-moz-placeholder' => 'color: {{VALUE}}',

                                        '{{WRAPPER}} .contactForm textarea::-ms-input-placeholder' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .contactForm form input::-ms-input-placeholder' => 'color: {{VALUE}}',

                                        '{{WRAPPER}} .contactForm textarea::-webkit-input-placeholder' => 'color: {{VALUE}}',
                                        '{{WRAPPER}} .contactForm form input::-webkit-input-placeholder' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'cf_bg_color', [
                                'label' => esc_html__( 'Background Color', 'uiuxom' ),
                                'type'  => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .contactForm select' => 'background: {{VALUE}}',
                                        '{{WRAPPER}} .contactForm input:not([type="submit"]):not([type="radio"]):not([type="checkbox"])' => 'background: {{VALUE}}',
                                        '{{WRAPPER}} .contactForm textarea' => 'background: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(), [
                                'name' => 'cf_borders',
                                'label' => esc_html__( 'Field Border', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .contactForm select, {{WRAPPER}} .contactForm input:not([type="submit"]):not([type="radio"]):not([type="checkbox"]), {{WRAPPER}} .contactForm textarea',
                        ]
                );
                $this->add_responsive_control( 'cf_field_radius', [
                                'label' => esc_html__( 'Field Radius', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .contactForm select' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .contactForm input:not([type="submit"]):not([type="radio"]):not([type="checkbox"])' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .contactForm textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                'name' => 'cf_field_shadow',
                                'label' => esc_html__( 'Field Shadow', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .contactForm select, {{WRAPPER}} .contactForm input:not([type="submit"]):not([type="radio"]):not([type="checkbox"]), {{WRAPPER}} .contactForm textarea',
                        ]
                );
                $this->add_responsive_control( 'cf_field_padding', [
                                'label' => esc_html__( 'Field Padding', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .contactForm select' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .contactForm input:not([type="submit"]):not([type="radio"]):not([type="checkbox"])' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'cf_field_margin', [
                                'label' => esc_html__( 'Field Margin', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .contactForm select' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .contactForm textarea' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .contactForm input:not([type="submit"]):not([type="radio"]):not([type="checkbox"])' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'cf_filed_height', [
                                'label' => esc_html__( 'Input/Select Height', 'uiuxom' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px'],
                                'range' => [
                                        'px' => [
                                                'min' => 8,
                                                'max' => 100,
                                                'step' => 1,
                                        ]
                                ],
                                'default' => [
                                        'unit' => 'px',
                                        'size' => '',
                                ],
                                'selectors' => [
                                        '{{WRAPPER}} .contactForm input:not([type="submit"]):not([type="radio"]):not([type="checkbox"])' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .contactForm input[type="text"]' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .contactForm input[type="email"]' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .contactForm input[type="url"]' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .contactForm input[type="tel"]' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .contactForm input[type="number"]' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .contactForm input[type="date"]' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .contactForm select' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'cf_message_height', [
                                'label' => esc_html__( 'Textarea Height', 'uiuxom' ),
                                'type' => Controls_Manager::SLIDER,
                                'size_units' => [ 'px'],
                                'range' => [
                                        'px' => [
                                                'min' => 8,
                                                'max' => 500,
                                                'step' => 1,
                                        ]
                                ],
                                'default' => [
                                        'unit' => 'px',
                                        'size' => '',
                                ],
                                'selectors' => [
                                        '{{WRAPPER}} .contactForm textarea' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'cf_field_textarea_padding', [
                                'label' => esc_html__( 'Textarea Padding', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .contactForm textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'cf_message_margin', [
                                'label' => esc_html__( 'Textarea Margin', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .contactForm textarea' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();

        $this->start_controls_section(
                'section_tab_2666', [
                    'label'         => esc_html__( 'Checkbox And Radio Style', 'uiuxom' ),
                    'tab'           => Controls_Manager::TAB_STYLE
                ]
            );
                $this->add_control( 'mem_info_devider_2', [
                                'label' => esc_html__( 'Checkbox Style', 'uiuxom' ),
                                'type' => \Elementor\Controls_Manager::HEADING,
                                'separator' => 'none',
                        ]
                );
                $this->add_group_control(
                        Group_Control_Typography::get_type(), [
                                'name' => 'btn_crb_typography',
                                'label' => esc_html__( 'Label Typography', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .contactForm .wpcf7-checkbox label span',
                        ]
                );
                $this->add_responsive_control( 'btn_crb_label_color', [
                                'label' => esc_html__( 'Label Color', 'uiuxom' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .contactForm .contactForm .wpcf7-checkbox label span'   => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_responsive_control( 'cf_chkb_padding', [
                                'label' => esc_html__( 'Checkbox Label Padding', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                    '{{WRAPPER}} .contactForm .wpcf7-checkbox label span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'cf_chkb_margin', [
                                'label' => esc_html__( 'Checkbox Item Margin', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .contactForm .wpcf7-checkbox .wpcf7-list-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'cf_chkb_area_margin', [
                                'label' => esc_html__( 'Checkbox Area Margin', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .contactForm .wpcf7-form-control.wpcf7-checkbox' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'btn_chkb_width', [
				'label' => esc_html__( 'Checkbox Width', 'uiuxom' ),
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
					'{{WRAPPER}} .contactForm .wpcf7-checkbox label span:before' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);
                $this->add_responsive_control( 'btn_chkb_height', [
				'label' => esc_html__( 'Checkbox Height', 'uiuxom' ),
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
					'{{WRAPPER}} .contactForm .wpcf7-checkbox label span:before' => 'height: {{SIZE}}{{UNIT}};'
				],
			]
		);
                $this->add_group_control( Group_Control_Border::get_type(),[
                                'name'      => 'btn_chkb_border',
                                'label'     => esc_html__( 'Checkbox Border', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .contactForm .wpcf7-checkbox label span:before',
                        ]
                );
                $this->add_responsive_control( 'btn_chkb_checked_color', [
                                'label' => esc_html__( 'Checked Border Color', 'uiuxom' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .contactForm .wpcf7-checkbox label input[type="checkbox"]:checked + span:before'   => 'border-color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control( 'cf_chkb_bef_margin', [
                                'label' => esc_html__( 'Checkbox Margin', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                '{{WRAPPER}} .{{WRAPPER}} .contactForm .wpcf7-checkbox label span:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name' => 'btn_chkd_con_typography',
                                'label' => esc_html__( 'Checked Icon Typography', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} {{WRAPPER}} .contactForm .wpcf7-checkbox label span:before',
                        ]
                );
                $this->add_responsive_control( 'btn_chkb_checked_i_color', [
                                'label' => esc_html__( 'Checked Icon Color', 'uiuxom' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} {{WRAPPER}} .contactForm .wpcf7-checkbox label span:before'   => 'color: {{VALUE}}'
                                ],
                        ]
                );

                $this->add_control( 'mem_info_devider_3', [
                                'label' => esc_html__( 'Radio Style', 'uiuxom' ),
                                'type' => \Elementor\Controls_Manager::HEADING,
                                'separator' => 'before',
                        ]
                );
                $this->add_group_control(
                        Group_Control_Typography::get_type(), [
                                'name' => 'btn_rads_typography',
                                'label' => esc_html__( 'Label Typography', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .contactForm .wpcf7-radio label span',
                        ]
                );
                $this->add_responsive_control( 'btn_rads_label_color', [
                                'label' => esc_html__( 'Label Color', 'uiuxom' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .contactForm .wpcf7-radio label span'   => 'color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control( 'cf_rads_padding', [
                                'label' => esc_html__( 'Rado Label Padding', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                '{{WRAPPER}} .contactForm .wpcf7-radio label span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'cf_rad_bef_margin', [
                                'label' => esc_html__( 'Radio Item Margin', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .contactForm .wpcf7-radio .wpcf7-list-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'cf_rad_area_margin', [
                                'label' => esc_html__( 'Radio Area Margin', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .contactForm .wpcf7-form-control.wpcf7-radio' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'btn_rad_width', [
                                'label' => esc_html__( 'Radio Width', 'uiuxom' ),
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
                                        '{{WRAPPER}} .contactForm .wpcf7-radio label span:before' => 'width: {{SIZE}}{{UNIT}};'
                                ],
                        ]
                );
                $this->add_responsive_control( 'btn_rad_height', [
                                'label' => esc_html__( 'Radio Height', 'uiuxom' ),
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
                                        '{{WRAPPER}} .contactForm .wpcf7-radio label span:before' => 'height: {{SIZE}}{{UNIT}};'
                                ],
                        ]
                );
                $this->add_group_control( Group_Control_Border::get_type(),[
                                'name'      => 'btn_radio_border',
                                'label'     => esc_html__( 'Radio Border', 'uiuxom' ),
                                'selector'  => '{{WRAPPER}} .contactForm .wpcf7-radio label span:before',
                        ]
                );
                $this->add_responsive_control( 'btn_rad_checked_color', [
                                'label' => esc_html__( 'Checked Border Color', 'uiuxom' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .contactForm .wpcf7-radio input[type="radio"]:checked + span:before'   => 'border-color: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control( 'cf_rad_margin', [
                                'label' => esc_html__( 'Radio Margin', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                '{{WRAPPER}} {{WRAPPER}} .contactForm .wpcf7-radio label span:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'btn_rad_inner_width', [
                                'label' => esc_html__( 'Radio Inner Width', 'uiuxom' ),
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
                                        '{{WRAPPER}} .contactForm .wpcf7-radio input[type="radio"]:checked + span:after' => 'width: {{SIZE}}{{UNIT}};'
                                ],
                        ]
                );
                $this->add_responsive_control( 'btn_rad_inner_height', [
                                'label' => esc_html__( 'Radio Inner Height', 'uiuxom' ),
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
                                        '{{WRAPPER}} .contactForm .wpcf7-radio input[type="radio"]:checked + span:after' => 'height: {{SIZE}}{{UNIT}};'
                                ],
                        ]
                );
                $this->add_responsive_control( 'btn_rad_checked_inner_color', [
                                'label' => esc_html__( 'Checked Inner Color', 'uiuxom' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .contactForm .wpcf7-radio input[type="radio"]:checked + span:after'   => 'background: {{VALUE}}'
                                ],
                        ]
                );
                $this->add_responsive_control( 'cf_rad_inner_margin', [
                                'label' => esc_html__( 'Radio Inner Margin', 'uiuxom' ),
                                'type'  => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                '{{WRAPPER}} .contactForm .wpcf7-radio input[type="radio"]:checked + span:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_4', [
                'label'         => esc_html__('Button Style', 'uiuxom'),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
                $this->start_controls_tabs( 'style_tabs_1' );
                        $this->start_controls_tab('btn_1_button_style_normal',['label' => esc_html__( 'Normal', 'uiuxom' )]);
                                $this->add_responsive_control( 'btn_3_label_color', [
                                                'label' => esc_html__( 'Label Color', 'uiuxom' ),
                                                'type' => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .contactForm input[type="submit"]'   => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .contactForm button.ulinaBTN'   => 'color: {{VALUE}}',
                                                ],
                                        ]
                                );
                                $this->add_group_control( Group_Control_Background::get_type(), [
                                                'name' => 'btn_1_bg',
                                                'label' => esc_html__( 'Background', 'uiuxom' ),
                                                'types' => [ 'classic', 'gradient'],
                                                'selector' => '{{WRAPPER}} .contactForm input[type="submit"], {{WRAPPER}} .contactForm button.ulinaBTN:after',
                                        ]
                                );
                                $this->add_group_control( Group_Control_Border::get_type(), [
                                                'name'      => 'btn_border',
                                                'label'     => esc_html__( 'Border', 'uiuxom' ),
                                                'selector'  => '{{WRAPPER}} .contactForm input[type="submit"], {{WRAPPER}} .contactForm button.ulinaBTN',
                                        ]
                                );
                                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                                'name'      => 'btn_box_shadow',
                                                'label'     => esc_html__( 'Box Shadow', 'uiuxom' ),
                                                'selector'  => '{{WRAPPER}} .contactForm input[type="submit"], {{WRAPPER}} .contactForm button.ulinaBTN',
                                        ]
                                );
                        $this->end_controls_tab();
                        $this->start_controls_tab('btn_1_button_style_hover',['label' => esc_html__( 'Hover', 'uiuxom' )]);
                                $this->add_responsive_control( 'btn_label_hover_color', [
                                                'label'     => esc_html__( 'Label Hover Color', 'uiuxom' ),
                                                'type'      => Controls_Manager::COLOR,
                                                'selectors' => [
                                                        '{{WRAPPER}} .contactForm input[type="submit"]:hover'   => 'color: {{VALUE}}',
                                                        '{{WRAPPER}} .contactForm button.ulinaBTN:hover'   => 'color: {{VALUE}}',
                                                ],
                                        ]
                                );
                                $this->add_group_control( Group_Control_Background::get_type(), [
                                                'name' => 'btn_1_hover_bg',
                                                'label' => esc_html__( 'Background', 'uiuxom' ),
                                                'types' => [ 'classic', 'gradient'],
                                                'selector' => '{{WRAPPER}} .contactForm input[type="submit"]:hover, {{WRAPPER}} .contactForm button.ulinaBTN:before',
                                        ]
                                );
                                $this->add_group_control( Group_Control_Border::get_type(), [
                                                'name'      => 'btn_hover_border',
                                                'label'     => esc_html__( 'Border', 'uiuxom' ),
                                                'selector'  => '{{WRAPPER}} .contactForm input[type="submit"]:hover, {{WRAPPER}} .contactForm button.ulinaBTN:hover',
                                        ]
                                );
                                $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
                                                'name'      => 'btn_hover_box_shadow',
                                                'label'     => esc_html__( 'Box Shadow', 'uiuxom' ),
                                                'selector'  => '{{WRAPPER}} .contactForm input[type="submit"]:hover, {{WRAPPER}} .contactForm button.ulinaBTN:hover',
                                        ]
                                );
                        $this->end_controls_tab();
                $this->end_controls_tabs();
                $this->add_responsive_control( 'btn_1_width', [
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
					'{{WRAPPER}} .contactForm input[type="submit"]' => 'min-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .contactForm button.ulinaBTN' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
                $this->add_responsive_control( 'btn_1_height', [
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
                                        '{{WRAPPER}} .contactForm input[type="submit"]' => 'height: {{SIZE}}{{UNIT}};',
                                        '{{WRAPPER}} .contactForm button.ulinaBTN' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
                $this->add_group_control( Group_Control_Typography::get_type(), [
                                'name' => 'btn_1_typography',
                                'label' => esc_html__( 'Button Typography', 'uiuxom' ),
                                'selector' => '{{WRAPPER}} .contactForm input[type="submit"], {{WRAPPER}} .contactForm button.ulinaBTN',
                        ]
                );
                $this->add_responsive_control( 'border_radius', [
                                'label' => esc_html__( 'Border Radius', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .contactForm input[type="submit"]'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .contactForm button.ulinaBTN'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'btn_1_padding', [
                                'label' => esc_html__( 'Paddings', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .contactForm input[type="submit"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .contactForm button.ulinaBTN' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                        ]
                );
                $this->add_responsive_control( 'btn_1_margin', [
                                'label' => esc_html__( 'Margin', 'uiuxom' ),
                                'type' => Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px', '%', 'em' ],
                                'selectors' => [
                                        '{{WRAPPER}} .contactForm input[type="submit"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                        '{{WRAPPER}} .contactForm button.ulinaBTN' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                                ],
                        ]
                );
        $this->end_controls_section();

    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        $contactForm   = (isset($settings['contactForm']) && $settings['contactForm'] != '') ? $settings['contactForm'] : '';
        
        if($contactForm > 0){
            echo '<div class="contactForm">'; 
                echo do_shortcode('[contact-form-7 id="'.$contactForm.'"]');
            echo '</div>';
        }else{
            ?>
            <div class="alert alert-warning" role="alert">
                <?php echo esc_html__('Please Select Contact From.', 'uiuxom'); ?>
            </div>
            <?php
        }
        
    }

    protected function content_template() {

    }    
}