<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$manifest = array();

$manifest[ 'name' ]			 	 = esc_html__( 'Ulina', 'ulina' );
$manifest[ 'uri' ]			 	 = esc_url( 'https://omanthemes.com/ulina/wp/' );
$manifest[ 'description' ]       = esc_html__( 'Ulina - Fashion Ecommerce Responsive WordPress Theme', 'ulina' );
$manifest[ 'version' ]           = '1.0';
$manifest[ 'author' ]			 = 'Orientate';
$manifest[ 'author_uri' ]		 = esc_url( 'https://themeforest.net/user/orientate' );
$manifest[ 'requirements' ]	 	 = array(
	'wordpress'     => array(
	'min_version' 	=> '5.0',
	),
);
$manifest[ 'id' ] = 'scratch';

$manifest[ 'supported_extensions' ] = array(
    'backups'               => array(),
);
