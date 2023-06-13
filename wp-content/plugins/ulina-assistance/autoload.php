<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

function Uiuxom_Classes_Autoload($class_name) {

    if (FALSE === strpos($class_name, 'Uiuxom_')) {
        return;
    }

    $file_name = str_replace(
            array('Uiuxom_', '_'),
            array('', '-'),
            strtolower($class_name)
    );

    $file_from = explode('-', $file_name);
    $folder = end($file_from);
    // Compile our path from the current location
    $file = dirname(__FILE__) . '/inc/'.$folder.'/' . $file_name . '.php';
    // If a file is found
    if (file_exists($file)) {
        // Then load it up!
        require( $file );
    }
}
spl_autoload_register('Uiuxom_Classes_Autoload');