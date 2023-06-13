<?php
/**
 * The template for displaying comments
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments">
    <?php if ( have_comments() ) : ?>
    <div class="postCommetnListBox clearfix">
    <h3 class="commentHeading cm01"><?php echo get_comments_number(); ?> <?php echo comments_number( esc_html__('Comments', 'ulina'), esc_html__('Comment', 'ulina'), esc_html__('Comments', 'ulina') ); ?></h3>
        <ol class="sicc_list comment-list">
            <?php wp_list_comments(array('short_ping'  => true, 'style' => 'ol', 'callback'=> 'ulina_comment_listing')); ?>
        </ol>
        <div class="ulina_pagination comentPaginations text-right">
            <?php paginate_comments_links( array('prev_text' => '<i class="ulina-angle-left"></i>', 'next_text' => '<i class="ulina-angle-right"></i>') ) ?>
        </div>
    </div>
    <?php endif; ?>
    <div class="postCommetnFormBox clearfix">
	<?php
        $class = (is_user_logged_in() ? 'loggedIns' : '');
        $fields = array(
                'author' =>'<div class="col-md-6 name clearfix"><input id="author" placeholder="'.esc_attr__('Your name', 'ulina').'" name="author" type="text" value="' .
                            esc_attr( $commenter['comment_author'] ) . '" size="30" /></div>',
                'email'  => '<div class="col-md-6 email clearfix"><input id="email" placeholder="'.esc_attr__('Your email', 'ulina').'" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                            '" size="30" /></div>',
                 'cookies'=> ''
                    
        );
        $fields = apply_filters('comment_form_default_fields', $fields);
        $args = array(
            'fields'               => $fields,
            'comment_field'        => '<div class="col-md-12"><textarea id="comment" class="'.$class.'" name="comment"  placeholder="'.esc_attr__('Write your comment here', 'ulina').'" aria-required="true" required="required"></textarea></div>',
            'logged_in_as'         => '',
            'comment_notes_before' => '',
            'comment_notes_after'  => '',
            'id_form'              => 'comment_form',
            'id_submit'            => 'submit',
            'class_form'           => 'commentForm row '.$class,
            'class_submit'         => 'ulinaBTN',
            'name_submit'          => 'submit',
            'title_reply'          => esc_html__( 'Add A Comment' , 'ulina'),
            'title_reply_to'       => esc_html__( 'Add A Replies to %s', 'ulina'),
            'title_reply_before'   => '<h3 class="commentHeading mb30">',
            'title_reply_after'    => '</h3>',
            'cancel_reply_before'  => '<small class="cancel_reply_btn">',
            'cancel_reply_after'   => '</small>',
            'cancel_reply_link'    => esc_html__( 'Cancel Reply' , 'ulina'),
            'label_submit'         => esc_html__( 'Submit Now' , 'ulina'),
            'submit_button'        => '<div class="col-lg-12"><button type="submit" name="%1$s" id="%2$s" class="%3$s" value="%4$s"><span class="mbText">%4$s</span><span class="mbShape"></span></button></div>',
            'submit_field'         => '%1$s %2$s',
        );
    ?>
    <div class="commentForm clearfix">
        <?php
            comment_form($args);
        ?>
    </div>
    </div>
</div>