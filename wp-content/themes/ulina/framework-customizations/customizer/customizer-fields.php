<?php
/**
 *	Customizer General Settings
 *	styles for logo/title - sizing, spacing ...
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class Ulina_Fields{

	/**
     * Holds the class object.
     *
     * @since 1.0.0
     *
     */
    
	public static $_instance;

	/**
     * Load Construct
     * 
     * @since 1.0.0
     */

	public function __construct(){
		$this->ulina_customizer_init();
	}

	/**
     * Customizer field Initialization
     *
     * @since 1.0.0
     *
     */

	public function ulina_customizer_init(){
		add_filter( 'kirki/fields', array($this,'ulina_general_setting') );
	}

	public function ulina_general_setting( $fields ){

		require ULINA_CUSTOMIZER_DIR . 'general-settings.php';
		require ULINA_CUSTOMIZER_DIR . 'font-settings.php';
		require ULINA_CUSTOMIZER_DIR . 'colorpreset-settings.php';
		require ULINA_CUSTOMIZER_DIR . 'header-settings.php';
		require ULINA_CUSTOMIZER_DIR . 'header-styling.php';
		require ULINA_CUSTOMIZER_DIR . 'shop-settings.php';
		require ULINA_CUSTOMIZER_DIR . 'quickview-settings.php';
		require ULINA_CUSTOMIZER_DIR . 'shop-category-settings.php';
		require ULINA_CUSTOMIZER_DIR . 'shop-tag-settings.php';
		require ULINA_CUSTOMIZER_DIR . 'shop-brand-settings.php';
		require ULINA_CUSTOMIZER_DIR . 'shop-collection-settings.php';
		require ULINA_CUSTOMIZER_DIR . 'shop-search-settings.php';
		require ULINA_CUSTOMIZER_DIR . 'shop-product-settings.php';
		require ULINA_CUSTOMIZER_DIR . 'blog-settings.php';
		require ULINA_CUSTOMIZER_DIR . 'blog-details-settings.php';
		require ULINA_CUSTOMIZER_DIR . 'blog-others-settings.php';
		require ULINA_CUSTOMIZER_DIR . 'page-settings.php';
		require ULINA_CUSTOMIZER_DIR . 'footer-settings.php';
		require ULINA_CUSTOMIZER_DIR . '404-settings.php';

		return $fields;
	}

	public static function ulina_get_instance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new Ulina_Fields();
        }
        return self::$_instance;
    }
}
$Ulina_Fields = Ulina_Fields::ulina_get_instance();