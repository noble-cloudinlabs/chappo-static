<?php
/**
 * The template for displaying product widget entries.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-reviews.php
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

?>
<li>
	<?php do_action( 'woocommerce_widget_product_review_item_start', $args ); ?>

	<?php
	// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
	?>
        <div class="pwItems">
            <img src="<?php echo ulina_post_thumbnail($product->get_id(), 84, 96); ?>" alt="<?php esc_attr(the_title_attribute()); ?>">
            <div class="productRatingWrap">
                    <?php echo wc_get_rating_html( intval( get_comment_meta( $comment->comment_ID, 'rating', true ) ) ); ?>
            </div>
            <h3>
                <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php echo ulina_kses( $product->get_name() ); ?>
		</a>
            </h3>
            <div class="reviewer">
		<?php
		/* translators: %s: Comment author. */
		echo sprintf( esc_html__( 'by %s', 'ulina' ), get_comment_author( $comment->comment_ID ) );
		?>
            </div>
	</div>
	<?php
	// phpcs:enable WordPress.Security.EscapeOutput.OutputNotEscaped
	?>

	<?php do_action( 'woocommerce_widget_product_review_item_end', $args ); ?>
</li>
