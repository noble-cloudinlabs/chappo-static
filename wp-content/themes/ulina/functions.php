<?php
/* * ---------------------------------------------------------------
* Theme Directory Define
* -------------------------------------------------------------* */
$theme_info = wp_get_theme();

define('ULINA_THEME_DIR', get_template_directory());
define('ULINA_THEME_URL', get_template_directory_uri());
define('ULINA_STYLESHEET_URL', get_stylesheet_uri());

define('ULINA_INC_DIR', ULINA_THEME_DIR . '/inc');
define('ULINA_INC_URL', ULINA_THEME_URL . '/inc');
define('ULINA_CUSTOMIZER_DIR', ULINA_THEME_DIR . '/framework-customizations/customizer/');

define('ULINA_WD_DIR', ULINA_THEME_DIR . '/widgets');

define('ULINA_ASSETS_DIR', ULINA_THEME_DIR . '/assets');
define('ULINA_ASSETS_URL', ULINA_THEME_URL . '/assets');

define('ULINA_ASSETS_CSS_DIR', ULINA_THEME_DIR . '/assets/css');
define('ULINA_ASSETS_CSS_URL', ULINA_THEME_URL . '/assets/css');

define('ULINA_ASSETS_JS_DIR', ULINA_THEME_DIR . '/assets/js');
define('ULINA_ASSETS_JS_URL', ULINA_THEME_URL . '/assets/js');

define('ULINA_ASSETS_IMAGES_DIR', ULINA_THEME_DIR . '/assets/images');
define('ULINA_ASSETS_IMAGES_URL', ULINA_THEME_URL . '/assets/images');


/* * ---------------------------------------------------------------
* Theme Init
* -------------------------------------------------------------* */
require_once get_parent_theme_file_path('/inc/init.php');


// add field
// add_action( 'woocommerce_register_form', 'noble_add_register_form_field' );
function noble_add_register_form_field(){
	
	woocommerce_form_field(
		'phone_number',
		array(
			'type'        => 'tel',
			'required'    => true, // just adds an "*"
			// 'label'       => 'Phone number'
            'placeholder' => 'Phone Number *'
		),
		( isset( $_POST[ 'phone_number' ] ) ? $_POST[ 'phone_number' ] : '' )
	);
}
add_action( 'woocommerce_register_form_start', 'noble_add_register_form_field' );

// save to database
add_action( 'woocommerce_created_customer', 'noble_save_register_fields' );
function noble_save_register_fields( $customer_id ){
	
	if ( isset( $_POST[ 'phone_number' ] ) ) {
		update_user_meta( $customer_id, 'phone_number', wc_clean( $_POST[ 'phone_number' ] ) );
	}
	
}


/* function wooc_extra_register_fields() {?>
    <p class="form-row form-row-wide">
    <label for="reg_billing_phone"><?php _e( 'Phone', 'woocommerce' ); ?></label>
    <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php esc_attr_e( $_POST['billing_phone'] ); ?>" />
    </p>
    <div class="clear"></div>
    <?php
}
add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' ); */