<?php


/**
 * Class Uiuxom_Footer_Builder
 */
class Uiuxom_Footer_Builder
{
    /**
     * Uiuxom_Footer_Builder constructor.
     */
    public function __construct()
    {
        add_action('wp', array($this, 'hook'));
    }

    public function hook()
    {

        $footer_style = get_theme_mod('footer_style', 0);
        if (is_page() && defined('FW')) {
            $page_is_settings = fw_get_db_post_option(get_the_ID(), 'page_footer_enabled', 2);
            if ($page_is_settings == 1) {
                $footer_style = fw_get_db_post_option(get_the_ID(), 'page_footer_style', 0);
            }
        }
        if ($footer_style > 0) {
            add_action('get_footer', array($this, 'uiuxom_footer'));
        }
    }

    /**
     * get all header template ids.
     * @return int[]|WP_Post[]
     */
    public static function get_footer_templates()
    {
        return Uiuxom_Builder::get_posts('uiux-footer-builder');
    }

    /**
     *  override theme header
     */
    public function uiuxom_footer()
    {
        require __DIR__ . '/uiuxom-footer.php';
        $templates = [];
        $templates[] = 'footer.php';
        remove_all_actions('wp_footer');
        ob_start();
        locate_template($templates, true);
        ob_get_clean();
    }
}