<?php
/**
 * Creates widget megamenu widget
 */

class Uiuxom_Megamenu_Lookbook_Widgets extends WP_Widget
{
    function __construct() 
    {
        $widget_opt = array(
            'classname'     => 'ulina_megamenu_widget',
            'description'   => 'Ulina Megamenu Look Book.'
        );
        
        parent::__construct('ulina-megamenu', esc_html__('Ulina Megamenu Look Book', 'uiuxom'), $widget_opt);
    }
    
    function widget( $args, $instance )
    {
        $lookImg     = (isset($instance['lookImg']) && $instance['lookImg'] != '') ? $instance['lookImg'] : '';
        $lookImgId   = (isset($instance['lookImgId']) && $instance['lookImgId'] != '') ? $instance['lookImgId'] : 0;
        $subTitle    = (isset($instance['subTitle'])) ? $instance['subTitle'] : esc_html__( 'Be Stylish', 'uiuxom' );
        $title       = (isset($instance['title'])) ? $instance['title'] : esc_html__( 'Girl’s Latest Fashion', 'uiuxom' );
        $btnlabel    = (isset($instance['btnlabel'])) ? $instance['btnlabel'] : esc_html__( 'Shop Now', 'uiuxom' );
        $btn_url     = (isset($instance['btn_url'])) ? $instance['btn_url'] : '';
        
        echo $args['before_widget'];
        ?>
        <div class="lookBook01 lb01M2">
            <div class="lbContent">
                <?php if($subTitle != ''): ?><h3><?php echo wp_kses_post($subTitle); ?></h3><?php endif; ?>
                <?php if($title != ''): ?><h2><?php echo wp_kses_post($title); ?></h2><?php endif; ?>
                <?php if($btnlabel != ''): ?>
                <a href="<?php echo esc_url($btn_url); ?>" class="ulinaLink"><i class="ulina-angle-right"></i><?php echo esc_html($btnlabel); ?></a>
                <?php endif; ?>
            </div>
            <?php if($lookImg != ''): ?>
                <img src="<?php echo esc_url($lookImg); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
            <?php endif; ?>
        </div>
        <?php
        echo $args['after_widget'];
    }
    
    
    function update ( $new_instance, $old_instance ) 
    {
        return $new_instance;
    }
    
    function form($instance)
    {
        $lookImg     = (isset($instance['lookImg']) && $instance['lookImg'] != '') ? $instance['lookImg'] : '';
        $lookImgId   = (isset($instance['lookImgId']) && $instance['lookImgId'] != '') ? $instance['lookImgId'] : 0;
        $subTitle    = (isset($instance['subTitle'])) ? $instance['subTitle'] : esc_html__( 'Be Stylish', 'uiuxom' );
        $title       = (isset($instance['title'])) ? $instance['title'] : esc_html__( 'Girl’s Latest Fashion', 'uiuxom' );
        $btnlabel    = (isset($instance['btnlabel'])) ? $instance['btnlabel'] : esc_html__( 'Shop Now', 'uiuxom' );
        $btn_url     = (isset($instance['btn_url'])) ? $instance['btn_url'] : '';
        ?>
        <div>
            <label for="<?php echo esc_attr($this->get_field_id( 'lookImg' )); ?>"><?php _e( 'Look Book Image:' , 'uiuxom' ); ?></label>
            <div class="image_uploader">
                <input class="widefat uploaded_image_url" id="<?php echo esc_attr($this->get_field_id( 'lookImg' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'lookImg' )); ?>" type="text" value="<?php echo esc_attr( $lookImg ); ?>" />
                <input class="uploaded_image_id" id="<?php echo esc_attr($this->get_field_id( 'lookImgId' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'lookImgId' )); ?>" type="hidden" value="<?php echo esc_attr( $lookImgId ); ?>" />
                <a href="#" class="uploder_btn button button-primary"><?php echo esc_html__('Upload', 'uiuxom') ?></a>
            </div>
            <small><?php echo esc_html__('Image size should be 129x3201px.', 'uiuxom'); ?></small>
        </div>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'subTitle' )); ?>"><?php _e( 'Sub Title:', 'uiuxom' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'subTitle' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'subTitle' )); ?>" type="text" value="<?php echo esc_attr( $subTitle ); ?>" />
       </p>
       <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:', 'uiuxom' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
       </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'btnlabel' )); ?>"><?php _e( 'Btn Label:', 'uiuxom' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'btnlabel' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'btnlabel' )); ?>" type="text" value="<?php echo esc_attr( $btnlabel ); ?>" />
       </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'btn_url' )); ?>"><?php _e( 'Btn Url:' , 'uiuxom' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'btn_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'btn_url' )); ?>" type="text" value="<?php echo esc_attr( $btn_url ); ?>" />
       </p>
        <?php
    }
}