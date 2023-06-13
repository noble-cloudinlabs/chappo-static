<?php

/**
 *
 * Custom Post Type Class
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class Uiuxom_Custom_Post {

  private $textdomain;
  private $uiuxom_posts;

    public function __construct( $textdomain){
        $this->textdomain = $textdomain;
        $this->uiuxom_posts = array();
        add_action('init', array($this, 'register_custom_post'));
    }

    public function uiuxom_inits( $type, $singular_label, $plural_label, $settings = array() ){
        $default_settings = array(
            'labels' => array(
                'name' => __($plural_label, $this->textdomain),
                'singular_name' => __($singular_label, $this->textdomain),
                'add_new_item' => __('Add New '.$singular_label, $this->textdomain),
                'edit_item'=> __('Edit '.$singular_label, $this->textdomain),
                'new_item'=>__('New '.$singular_label, $this->textdomain),
                'view_item'=>__('View '.$singular_label, $this->textdomain),
                'search_items'=>__('Search '.$plural_label, $this->textdomain),
                'not_found'=>__('No '.$plural_label.' found', $this->textdomain),
                'not_found_in_trash'=>__('No '.$plural_label.' found in trash', $this->textdomain),
                'parent_item_colon'=>__('Parent '.$singular_label, $this->textdomain),
                'menu_name' => __($plural_label,$this->textdomain)
            ),
            'public'=>true,
            'has_archive' => true,
            'menu_icon' => '',
            'menu_position'=>20,
            'supports'=>array(
                'title',
                'editor',
                'thumbnail'
            ),
            'rewrite' => array(
                'slug' => sanitize_title_with_dashes($plural_label)
            ),
            'capability_type' => 'post',
        );
        $this->uiuxom_posts[$type] = array_merge($default_settings, $settings);
    }

    public function register_custom_post(){
        foreach($this->uiuxom_posts as $key=>$value) {
            register_post_type($key, $value);
            flush_rewrite_rules( false );
        }
    }
    
}