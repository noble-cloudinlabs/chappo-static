<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.3.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div class="productReviewArea" id="reviews">
    <div class="row">
        <?php if ( have_comments() ) : ?>
        <div class="col-lg-6">
            <h3 class="ratingTitle">
                <?php
                    $count = $product->get_review_count();
                    if ( $count && wc_review_ratings_enabled() ) {
                            /* translators: 1: reviews count 2: product name */
                            $reviews_title = sprintf( esc_html( _n( '%1$s Review %2$s', '%1$s Reviews %2$s', $count, 'ulina' ) ), esc_html( $count ), '' );
                            echo apply_filters( 'woocommerce_reviews_title', $reviews_title, $count, $product ); // WPCS: XSS ok.
                    } else {
                            esc_html_e( 'Reviews', 'ulina' );
                    }
                ?>
            </h3>
            <?php if ( have_comments() ) : ?>
                <div class="reviewList">
                    <ol>
                            <?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
                    </ol>

                    <?php
                    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
                            echo '<nav class="woocommerce-pagination shopPagination">';
                            paginate_comments_links(
                                    apply_filters(
                                            'woocommerce_comment_pagination_args',
                                            array(
                                                    'prev_text' => ulina_kses('<i class="ulina-angle-left"></i>'),
                                                    'next_text' => ulina_kses('<i class="ulina-angle-right"></i>'),
                                                    'type'      => 'plain',
                                            )
                                    )
                            );
                            echo '</nav>';
                    endif;
                    ?>
                </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <div class="col-lg-6">
            <?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
			<div id="review_form_wrapper" class="<?php echo esc_attr(( have_comments() ? 'hasReviews' : 'notHasReviews')) ?>">
				<div id="review_form" class="commentFormArea reviewFrom">
					<?php
					$commenter    = wp_get_current_commenter();
					$comment_form = array(
						/* translators: %s is product title */
						'title_reply'         => have_comments() ? esc_html__( 'Add A Review', 'ulina' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'ulina' ), get_the_title() ),
						/* translators: %s is product title */
						'title_reply_to'      => esc_html__( 'Leave A Reply to %s', 'ulina' ),
						'title_reply_before'  => '<h3 id="reply-title">',
						'title_reply_after'   => '</h3>',
						'comment_notes_after' => '',
						'label_submit'        => esc_html__( 'Submit Now', 'ulina' ),
						'logged_in_as'        => '',
						'comment_field'       => '',
						'class_form'		  => 'row',
						'submit_button'       => '<div class="col-lg-12"><button name="%1$s" type="submit" id="%2$s" class="%3$s ulinaBTN" value="%4$s"><span>%4$s</span></button></div>',
                    	'submit_field'        => '%1$s %2$s',
					);

					$name_email_required = (bool) get_option( 'require_name_email', 1 );
					$fields              = array(
						'author' => array(
							'label'    => '',
							'type'     => 'text',
							'placeholder' => esc_html__('Your name', 'ulina'),
							'value'    => $commenter['comment_author'],
							'required' => $name_email_required,
						),
						'email'  => array(
							'label'    => '',
							'placeholder' => esc_html__('Your email', 'ulina'),
							'type'     => 'email',
							'value'    => $commenter['comment_author_email'],
							'required' => $name_email_required,
						),
					);

					$comment_form['fields'] = array();

					foreach ( $fields as $key => $field ) {
						$field_html  = '<div class="col-lg-6">';

						if ( $field['required'] ) {
							$field['placeholder'] .= '*';
						}

						$field_html .= '<input placeholder="'.esc_attr($field['placeholder']).'" id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( $field['required'] ? 'required' : '' ) . ' /></div>';

						$comment_form['fields'][ $key ] = $field_html;
					}

					$account_page_url = wc_get_page_permalink( 'myaccount' );
					if ( $account_page_url ) {
						$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'ulina' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
					}

					if ( wc_review_ratings_enabled() ) {
						$comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'ulina' ) . ( wc_review_ratings_required() ? '&nbsp;<span class="required">*</span>' : '' ) . '</label><select name="rating" id="rating" required>
							<option value="">' . esc_html__( 'Rate&hellip;', 'ulina' ) . '</option>
							<option value="5">' . esc_html__( 'Perfect', 'ulina' ) . '</option>
							<option value="4">' . esc_html__( 'Good', 'ulina' ) . '</option>
							<option value="3">' . esc_html__( 'Average', 'ulina' ) . '</option>
							<option value="2">' . esc_html__( 'Not that bad', 'ulina' ) . '</option>
							<option value="1">' . esc_html__( 'Very poor', 'ulina' ) . '</option>
						</select></div>';
					}
                                        $comment_form['comment_field'] .= '<div class="col-lg-12"><input type="text" name="review_title" required placeholder="'.esc_attr__( 'Review title *', 'ulina' ).'"/></div>';
					$comment_form['comment_field'] .= '<div class="col-lg-12"><textarea placeholder="'.esc_attr__('Write your review*', 'ulina').'" id="comment" name="comment" required></textarea></div>';

					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
					?>
				</div>
			</div>
		<?php else : ?>
			<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'ulina' ); ?></p>
		<?php endif; ?>
        </div>
    </div>
</div>
