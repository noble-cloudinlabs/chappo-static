<?php
/**
 * Creates widget with recent post thumbnail
 */

class Uiuxom_Recentpost_Widgets extends WP_Widget
{
    function __construct() 
    {
        $widget_opt = array(
            'classname'     => 'widget_blog',
            'description'   => 'Ulina Recent Post.'
        );
        
        parent::__construct('orb-rppwt', esc_html__('Ulina Recent Posts', 'uiuxom'), $widget_opt);
    }
    
    function widget( $args, $instance )
    {
        $title  = (isset($instance['title']) && $instance['title'] != '') ? $instance['title'] : esc_html__( 'Recent Posts', 'uiuxom' );
        $number_of_posts1 = (isset($instance['number_of_posts1']) && $instance['number_of_posts1'] != '') ? $instance['number_of_posts1'] : 3;
        $ord_by  = (isset($instance['ord_by']) && $instance['ord_by'] != '') ? $instance['ord_by'] : 'date';
        $ord    = (isset($instance['ord']) && $instance['ord'] != '') ? $instance['ord'] : 'DESC';
        
        
        $title = apply_filters( 'widget_title', $title );
        echo wp_kses_post($args['before_widget']);
        if ( ! empty( $title ) )
        {
            echo wp_kses_post($args['before_title']) . esc_html($title) . $args['after_title'];
        }
        
        
        $stickies = get_option( 'sticky_posts' );
        if($ord_by == 'view_count'):
            $querys = array(
                'post_type'         => array('post'),
                'post_status'       => array('publish'),
                'orderby'           => 'meta_value_num',
                'order'             => $ord,
                'posts_per_page'    => $number_of_posts1,
                'post__not_in'      => $stickies,
                'meta_key'          => '_ulina_post_view'
            );
        else:
            $querys = array(
                'post_type'         => array('post'),
                'post_status'       => array('publish'),
                'orderby'           => $ord_by,
                'order'             => $ord,
                'posts_per_page'    => $number_of_posts1,
                'post__not_in'      => $stickies
            );
        endif;
        $uiuxom_query = new WP_Query($querys);
        echo '<div class="recentPosts">';
            if($uiuxom_query->have_posts()){
                while($uiuxom_query->have_posts()): $uiuxom_query->the_post();
                $dateFormat = (get_option('date_format') != '' ? get_option('date_format') : 'j M, Y');
                ?>
                <div class="recentPost clearfix">
                    <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo ulina_post_thumbnail(get_the_ID(), 90, 90); ?>" alt="<?php echo get_the_title(); ?>"/></a>
                    <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo substr(wp_strip_all_tags(get_the_title()), 0, 45); ?></a></h4>
                    <span><?php echo get_the_time($dateFormat); ?></span>
                </div>
                <?php
                endwhile;
            }else{
                echo '<div class="recentPost clearfix">';
                echo '<h4><a href="#">No post found to display.</a></h4>';
                echo '</div>';
                echo '<div class="clearfix"></div>';
            }
        echo '</div>';
        wp_reset_postdata();
        echo wp_kses_post($args['after_widget']);
    }
    
    
    function update ( $new_instance, $old_instance ) 
    {
        return $new_instance;
    }
    
    function form($instance)
    {
        $title = (isset($instance['title']) && $instance['title'] != '') ? $instance['title'] : esc_html__( 'Recent Posts', 'uiuxom' );
        $number_of_posts1 = (isset($instance['number_of_posts1']) && $instance['number_of_posts1'] != '') ? $instance['number_of_posts1'] : 3;
        $ord_by = (isset($instance['ord_by']) && $instance['ord_by'] != '') ? $instance['ord_by'] : 'date';
        $ord = (isset($instance['ord']) && $instance['ord'] != '') ? $instance['ord'] : 'DESC';
        ?>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:', 'uiuxom' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'number_of_posts1' )); ?>"><?php _e( 'Number Of Posts:' , 'uiuxom' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number_of_posts1' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number_of_posts1' )); ?>" type="number" value="<?php echo esc_attr( $number_of_posts1 ); ?>" />
	</p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'ord_by' )); ?>"><?php _e( 'Order By:' , 'uiuxom' ); ?></label>
        <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'ord_by' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'ord_by' )); ?>">
            <option value="date" <?php if($ord_by == 'date'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('Date', 'uiuxom'); ?></option>
            <option value="ID" <?php if($ord_by == 'ID'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('ID', 'uiuxom'); ?></option>
            <option value="title" <?php if($ord_by == 'title'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('Title', 'uiuxom'); ?></option>
            <option value="rand" <?php if($ord_by == 'rand'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('Random', 'uiuxom'); ?></option>
            <option value="comment_count" <?php if($ord_by == 'comment_count'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('Comment Count', 'uiuxom'); ?></option>
            <option value="view_count" <?php if($ord_by == 'view_count'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('View Count', 'uiuxom'); ?></option>
        </select>
	</p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'ord' )); ?>"><?php _e( 'Order:' , 'uiuxom' ); ?></label>
        <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'ord' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'ord' )); ?>">
            <option value="ASC" <?php if($ord == 'ASC'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('ASC', 'uiuxom'); ?></option>
            <option value="DESC" <?php if($ord == 'DESC'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('DESC', 'uiuxom'); ?></option>
        </select>
	</p>
    <?php
    }
}