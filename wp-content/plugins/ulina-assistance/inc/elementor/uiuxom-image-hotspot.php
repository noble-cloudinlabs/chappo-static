<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Uiuxom_Image_Hotspot_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'uiuxom-image-hotspot';
    }
    
    public function get_title() {
        return esc_html__( 'Hotspot Image', 'uiuxom' );
    }

    public function get_icon() {
        return 'eicon-image-hotspot';
    }

    public function get_categories() {
        return [ 'uiuxom-elements' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
                'section_tab_1', ['label'     => esc_html__('Hotspot Image', 'uiuxom')]
        );
                $this->add_control( 'hps_image', [
                                'label' => esc_html__( 'Hotspto Image', 'uiuxom' ),
                                'label_block'   => TRUE,
                                'type' => Controls_Manager::MEDIA,
                                'default'       => [],
                        ]
                );
                $repeater = new \Elementor\Repeater();
                        $repeater->add_control( 'cord_x', [
                                    'label'         => esc_html__( 'Spot Position X', 'uiuxom' ),
                                    'type'          => Controls_Manager::NUMBER,
                                    'min'           => 0,
                                    'max'           => 2000,
                                    'step'          => 1,
                                    'default'       => ''
                            ]
                        );
                        $repeater->add_control( 'cord_y', [
                                    'label'         => esc_html__( 'Spot Position Y', 'uiuxom' ),
                                    'type'          => Controls_Manager::NUMBER,
                                    'min'           => 0,
                                    'max'           => 2000,
                                    'step'          => 1,
                                    'default'       => ''
                            ]
                        );
                        $repeater->add_control( 'spot_img', [
                                    'label'         => esc_html__( 'Spot Image', 'uiuxom' ),
                                    'type'          => Controls_Manager::MEDIA,
                                    'description'   => esc_html__('Upload your client normal logo.', 'uiuxom'),
                            ]
                        );
                        $repeater->add_control( 'spot_title', [
                                    'label'         => esc_html__( 'Spot Title', 'uiuxom' ),
                                    'type'          => Controls_Manager::TEXT,
                            ]
                        );
                        $repeater->add_control( 'spot_price', [
                                    'label'         => esc_html__( 'Spot Price', 'uiuxom' ),
                                    'type'          => Controls_Manager::TEXT,
                            ]
                        );
                        $repeater->add_control( 'spot_url', [
                                    'label'             => esc_html__( 'URL', 'uiuxom' ),
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
                $this->add_control( 'list', [
                            'label'   => esc_html__( 'Hotspots', 'uiuxom' ),
                            'type'    => Controls_Manager::REPEATER,
                            'fields'  => $repeater->get_controls(),
                            'default' => [],
                            'spot_url' => array(),
                            'title_field' => '{{{ spot_title }}}',
                    ]
                );
        $this->end_controls_section();
        
    }
    protected function render() {
        $settings       = $this->get_settings_for_display();
        
        $hps_image      = (isset($settings['hps_image']['id']) && $settings['hps_image']['id'] > 0) ? $settings['hps_image']['id'] : 0;
        $list = (isset($settings['list']) && !empty($settings['list']) ? $settings['list'] : []);
        
        $dataArray = [];
        if(!empty($list)):
            foreach($list as $lst):
                $cord_x = (isset($lst['cord_x']) && !empty($lst['cord_x']) && $lst['cord_x'] > 0 ? $lst['cord_x'] : '');
                $cord_y = (isset($lst['cord_y']) && !empty($lst['cord_y']) && $lst['cord_y'] > 0 ? $lst['cord_y'] : '');
                $spot_img = (isset($lst['spot_img']['id']) && !empty($lst['spot_img']['id']) ? $lst['spot_img']['id'] : 0);
                $spot_title = (isset($lst['spot_title']) && !empty($lst['spot_title']) ? $lst['spot_title'] : '');
                $spot_price = (isset($lst['spot_price']) && !empty($lst['spot_price']) ? $lst['spot_price'] : '');
                
                $spot_url = (isset($lst['spot_url']) && !empty($lst['spot_url']) ? $lst['spot_url'] : array());
                $target         = isset($spot_url['is_external']) ? ' target="_blank"' : '' ;
                $nofollow       = isset($spot_url['nofollow']) ? ' rel="nofollow"' : '' ;
                $btn_url        = (isset($spot_url['url']) && $spot_url['url'] != '') ? $spot_url['url'] : 'javascript:void(0);';
                
                if($cord_x != '' && $cord_y != '' && $spot_title != '' && $spot_price != '' && $spot_img > 0):
                    $img = '<img decoding="async" src="'.ulina_attachment_url($spot_img, 96, 96).'" alt="'.$spot_title.'">';
                    $dataArray[] = array(
                        "x" => $cord_x,
                        "y" => $cord_y,
                        "Image" => $img,
                        "Title" => '<h3><a '.$target.' '.$nofollow.' href="'.$btn_url.'">'.$spot_title.'</a></h3>',
                        "Price" => '<div class="pi01Price">'.$spot_price.'</div>',
                    );
                endif;
            endforeach;
        endif;
        
        if($hps_image > 0 && !empty($dataArray)):
            ?>
            <div class="ctaImageWrap" data-cords='<?php echo json_encode($dataArray); ?>'>
                <div class="pointerImage">
                    <img src="<?php echo ulina_attachment_url($hps_image, 'full'); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                </div>
            </div>
            <?php
        endif;
    }
    
    protected function content_template() {}
}