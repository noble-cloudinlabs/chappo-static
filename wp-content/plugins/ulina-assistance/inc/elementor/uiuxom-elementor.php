<?php

if (!defined('ABSPATH')) exit;

final class Uiuxom_Elementor
{

    /**
     * Instance
     * @since 1.0.0
     */

    public static $_instance;


    public $file = __FILE__;

    /**
     * Load Construct
     * @since 1.0.0
     */ 

    public function __construct(){
        
        add_action('elementor/controls/controls_registered', array( $this, 'UIUXOM_icon_pack' ), 11 );
        
        add_action('elementor/elements/categories_registered', array($this, 'UIUXOM_add_widget_categories'));
        add_action('elementor/widgets/widgets_registered', array($this, 'UIUXOM_elements'));

        add_action('elementor/editor/after_enqueue_styles', array($this, 'UIUXOM_editor_enqueue_styles'));
        add_action('elementor/editor/before_enqueue_scripts', array($this, 'UIUXOM_editor_enqueue_scripts'));

        add_action('elementor/frontend/before_enqueue_scripts', array($this, 'UIUXOM_frontend_enqueue_scripts'));
        add_action('elementor/frontend/after_enqueue_styles', array($this, 'UIUXOM_frontend_enqueue_scripts'));

    }

            
    /**
     * Extend Icon pack core controls.
     *
     * @param  object $controls_manager Controls manager instance.
     * @return void 
    */

    public function UIUXOM_icon_pack( $controls_manager ) {

        require_once (dirname($this->file). '/controls/uiuxom-autocomplete.php');
        require_once (dirname($this->file). '/controls/uiuxom-icon.php');
        $controls_manager->register_control( 'uiuxom_autocomplete', new Uiuxom_Autocomplete() );
        $controls = array(
            $controls_manager::ICON => 'Uiuxom_Icon_Controler',
        );

        foreach ( $controls as $control_id => $class_name ) {
            $controls_manager->unregister_control( $control_id );
            $controls_manager->register_control( $control_id, new $class_name() );
        }
    }
    
    /**
     * Category Register
     * @since  1.0.0
     */

    public function UIUXOM_add_widget_categories($elements_manager){
        $elements_manager->add_category(
            'uiuxom-elements',[
                'title' => esc_html__('Ulina', 'uiuxom'),
                'icon'  => 'eicon-kit-plugins',
            ],
            1
        );
        $elements_manager->add_category(
            'uiuxom-footer-elements', [
                'title' => esc_html__('Ulina Footer Widgets', 'uiuxom'),
                'icon'  => 'eicon-footer',
            ],
            2
        );
    }

    /**
     * Elements register
     * @since  1.0.0
     */

    public function UIUXOM_elements($widgets_manager){

    	require_once dirname($this->file) . '/uiuxom-header.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Header_Widgets());
        
        require_once dirname($this->file) . '/uiuxom-headings.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Headings_Widget());
        
        require_once dirname($this->file) . '/uiuxom-text.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Text_Widget());

        require_once dirname($this->file) . '/uiuxom-accordion.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Accordion_Widgets());
        
        require_once dirname($this->file) . '/uiuxom-icon-box.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Icon_Box_Widgets());
        
        require_once dirname($this->file) . '/uiuxom-collection.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Collection_Widgets());
        
        require_once dirname($this->file) . '/uiuxom-deal-product.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Deal_Product_Widgets());
        
        require_once dirname($this->file) . '/uiuxom-product-categories.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Product_Categories_Widgets());
        
        require_once dirname($this->file) . '/uiuxom-testimonial.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Testimonial_Widgets());
        
        require_once dirname($this->file) . '/uiuxom-button.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Button_Widget());
        
        require_once dirname($this->file) . '/uiuxom-link.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Link_Widget());
        
        require_once dirname($this->file) . '/uiuxom-latest-blog.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Latest_Blog_Widgets());
        
        require_once dirname($this->file) . '/uiuxom-insta-gallery.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Insta_Gallery_Widgets());
        
        require_once dirname($this->file) . '/uiuxom-clients-slider.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Clients_Slider_Widgets());

        require_once dirname($this->file) . '/uiuxom-about-image.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_About_Image_Widgets());

        require_once dirname($this->file) . '/uiuxom-circle-skills.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Circle_Skills_Widgets());

        require_once dirname($this->file) . '/uiuxom-funfact.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Funfact_Widgets());

        require_once dirname($this->file) . '/uiuxom-skill-bar.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Skill_Bar_Widgets());
        
        require_once dirname($this->file) . '/uiuxom-team.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Team_Widgets()); 
        
        require_once dirname($this->file) . '/uiuxom-tab.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Tab_Widgets());

        require_once dirname($this->file) . '/uiuxom-contact-info.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Contact_Info_Widgets());
        
        require_once dirname($this->file) . '/uiuxom-contact-form.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Contcat_Form_Widget());
        
        require_once dirname($this->file) . '/uiuxom-google-map.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Google_Map_Widget());
        
        require_once dirname($this->file) . '/uiuxom-product-slider.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Product_Slider_Widgets());
        
        require_once dirname($this->file) . '/uiuxom-product-grid.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Product_Grid_Widgets());
        
        require_once dirname($this->file) . '/uiuxom-product-tab.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Product_Tab_Widgets());
        
        require_once dirname($this->file) . '/uiuxom-image-hotspot.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Image_Hotspot_Widgets());

        require_once dirname($this->file) . '/uiuxom-rev-slider.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Rev_Slider_Widgets());
        
        /*-- Footer Widgets --*/
        require_once dirname($this->file) . '/uiuxom-about.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_About_Widgets());

        require_once dirname($this->file) . '/uiuxom-mailchimp.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Mailchimp_Widgets());

        require_once dirname($this->file) . '/uiuxom-info.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Info_Widgets());

        require_once dirname($this->file) . '/uiuxom-navigation.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Navigation_Widgets());

        require_once dirname($this->file) . '/uiuxom-payment.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Icon_Payment_Widgets());

        require_once dirname($this->file) . '/uiuxom-icon-box-two.php';
        $widgets_manager->register_widget_type(new Elementor\Uiuxom_Icon_Box_Two_Widgets());
    }

    /**
     * Frontend enqueue scripts
     * @since  1.0.0
     */

    public function UIUXOM_frontend_enqueue_scripts()
    {

    }

    /**
     * Editor enqueue scripts
     * @since  1.0.0
     */

    public function UIUXOM_editor_enqueue_scripts()
    {

    }

    /**
     * Editor enqueue styles
     * @since  1.0.0
     */

    public function UIUXOM_editor_enqueue_styles(){
        wp_enqueue_style( 'uiuxom-icon-elementor', plugins_url('ulina-assistance/assets/css/icons.css'), null, '' );
        wp_enqueue_style( 'uiuxom-editor-elementor', plugins_url('ulina-assistance/assets/css/editors.css'), null, '' );
    }

    /**
     * Preview enqueue scripts
     * @since  1.0.0
     */

    public function UIUXOM_preview_enqueue_scripts(){}

    public static function UIUXOM_get_instance(){
        if (!isset(self::$_instance)) {
            self::$_instance = new Uiuxom_Elementor();
        }
        return self::$_instance;
    }

}