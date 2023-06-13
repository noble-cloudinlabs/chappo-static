<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	<?php
            $review_title = (metadata_exists('comment', $comment->comment_ID, 'review_title') ? get_comment_meta($comment->comment_ID, 'review_title', true ) : '');
            $avater = get_avatar_url($comment->comment_author_email);
            if ($comment->user_id != '' && $comment->user_id != 0) {
                $userId = $comment->user_id;
                $avID = get_the_author_meta('user_av_ID', $userId);
                if ($avID != '') {
                    $userAvater = ulina_attachment_url($avID, 90, 90);
                } else {
                    $userAvater = $avater;
                }
            } else {
                $userAvater = $avater;
            }
        ?>
        <div class="postReview">
            <img src="<?php echo esc_url($userAvater); ?>" alt="<?php echo esc_attr($comment->comment_author); ?>">
            <?php if(!empty($review_title)): ?>
            <h2><?php echo esc_html($review_title) ?></h2>
            <?php else: ?>
            <h2><?php echo esc_html($comment->comment_author) ?></h2>
            <?php endif; ?>
            <div class="postReviewContent">
                <?php comment_text(); ?>
            </div>
            <div class="productRatingWrap">
                <?php echo woocommerce_review_display_rating(); ?>
            </div>
            <div class="reviewMeta">
                <?php if(!empty($review_title)): ?>
                <h4><?php echo esc_html($comment->comment_author); ?> </h4>
                <?php endif; ?>
                <span><?php echo esc_html__('on ', 'ulina') ?> <?php echo get_comment_time('M d, Y'); ?></span>
            </div>
        </div>
