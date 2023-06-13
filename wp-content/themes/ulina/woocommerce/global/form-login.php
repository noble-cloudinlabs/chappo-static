<?php
/**
 * Login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     7.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( is_user_logged_in() ) {
	return;
}

?>
<form class="woocommerce-form woocommerce-form-login login" method="post" <?php echo esc_attr(( $hidden  ? 'style="display:none;"' : '')); ?>>

	<?php do_action( 'woocommerce_login_form_start' ); ?>

        <?php 
        if ( $message ) { echo ulina_kses(wpautop( wptexturize( $message )) ); }else{ ''; } // @codingStandardsIgnoreLine ?>
        <div class="row">
            <div class="col-lg-6">
                <input type="text" placeholder="<?php esc_attr_e( 'Username or email', 'ulina' ); ?>" class="input-text" name="username" id="username" autocomplete="username" />
            </div>
            <div class="col-lg-6">
                <input class="input-text" placeholder="<?php esc_attr_e( 'Password', 'ulina' ); ?>" type="password" name="password" id="password" autocomplete="current-password" />
            </div>
	</div>
	<?php do_action( 'woocommerce_login_form' ); ?>
        
        <div class="row">
            <div class="col-lg-12">
                    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                            <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'ulina' ); ?></span>
                    </label>
                    <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                    <input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ); ?>" />
                    <button type="submit" class="woocommerce-button button woocommerce-form-login__submit ulinaBTN" name="login" value="<?php esc_attr_e( 'Login', 'ulina' ); ?>"><span><?php esc_html_e( 'Login', 'ulina' ); ?></span></button>
                    
            </div>
            <div class="col-lg-12">
                <p class="lost_password">
                    <a class="ulinaLink" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><i class="ulina-angle-right"></i><?php esc_html_e( 'Lost your password?', 'ulina' ); ?></a>
                </p>
            </div>
        </div>

	<div class="clear"></div>

	<?php do_action( 'woocommerce_login_form_end' ); ?>

</form>
