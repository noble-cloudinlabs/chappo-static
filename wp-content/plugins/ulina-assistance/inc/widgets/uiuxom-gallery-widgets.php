<?php
/*-----------------------------------------------------------------------------------*/
/*	Gallery  Widget Class
/*-----------------------------------------------------------------------------------*/

class Uiuxom_Gallery_Widgets extends WP_Widget {

	var $defaults;

	function __construct() {
		$widget_ops = array( 'classname' => 'or_gl_widgets', 'description' => esc_html__( 'Gallery Image.', 'uiuxom' ) );
		$control_ops = array( 'id_base'  => 'or_gall_widgets' );
		parent::__construct( 'or_gall_widgets', esc_html__( 'Ulina Gallery', 'uiuxom' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {

		$instance = wp_parse_args( (array) $instance, $this->defaults );
		extract( $args );

		$title      = (isset($instance['title']) && $instance['title'] != '') ? $instance['title'] : esc_html__('Gallery', 'uiuxom');
        $gallery_images = (isset($instance['gallery_images']) && $instance['gallery_images'] != '') ? explode(',', $instance['gallery_images']) : array();

		echo wp_kses_post($before_widget);
		if ( ! empty( $title ) ) {
            echo wp_kses_post($before_title) . esc_html($title) . $after_title;
		}
        ?>
        <div class="galleryWidget clearfix">
            <?php if(!empty($gallery_images)): ?>
                <?php foreach($gallery_images as $gi): ?>
                    <a href="<?php echo ulina_attachment_url($gi, 1200, 800); ?>" class="imgPopup">
                        <img src="<?php echo ulina_attachment_url($gi, 96, 96); ?>" alt="<?php echo esc_attr__('gallery', 'uiuxom'); ?>">
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
            <div class="alert alert-warning">
                <?php echo wp_kses_post('Please Navigate <strong>Appearance -> Widgets</strong> and upload images for gallery.'); ?>
            </div>
            <?php endif; ?>
        </div>
        <?php
		echo wp_kses_post($after_widget);
	}

	function update( $new_instance, $old_instance ) {
                return $new_instance;
	}


	function form( $instance ) {
		$title      = (isset($instance['title']) && $instance['title'] != '') ? $instance['title'] : esc_html__('Gallery', 'uiuxom');
        $gallery_images = (isset($instance['gallery_images']) && $instance['gallery_images'] != '') ? explode(',', $instance['gallery_images']) : array();
    ?>

	<p>
        <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html__( 'Title:', 'uiuxom' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
	<p>
        <div class="gallery_holders <?php echo (!empty($gallery_images) ? 'show' : ''); ?>">
            <?php
                if(!empty($gallery_images)):
                    foreach($gallery_images as $gi):
                        echo '<img src="' . ulina_attachment_url($gi, 96, 96). '" alt="">';
                    endforeach;
                endif;
            ?>
        </div>
        <div class="alert alert-warning">
            <?php echo wp_kses_post('Please upload gallery image. Image size should be 1200x800px.'); ?>
        </div>
        <button type="button" class="button button-default upload_gallery_images"><?php echo esc_html__('Upload Images', 'uiuxom') ?></button>
        <input type="hidden" class="gallery_images" value="<?php echo esc_attr(implode(',', $gallery_images)); ?>" name="<?php echo esc_attr($this->get_field_name( 'gallery_images' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'gallery_images' )); ?>"/>
        <button type="button" class="button button-default clear_gallery_images"><?php echo esc_html__('Clear Images', 'uiuxom') ?></button>
        
	</p>	
	<?php
	}
}
