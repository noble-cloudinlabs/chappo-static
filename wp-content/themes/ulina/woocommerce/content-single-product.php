<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */
defined('ABSPATH') || exit;

global $product;

$productID = $product->get_id();
$shop_product_is_cat = get_theme_mod('shop_product_is_cat', true);
$shop_product_is_review = get_theme_mod('shop_product_is_review', true);
$shop_product_is_stock = get_theme_mod('shop_product_is_stock', false);
$shop_product_stock_label = get_theme_mod('shop_product_stock_label', '');
$shop_product_desc_lingth = get_theme_mod('shop_product_desc_lingth', 224);
$shop_product_is_wishlist = get_theme_mod('shop_product_is_wishlist', false);
$shop_product_is_sku = get_theme_mod('shop_product_is_sku', true);
$shop_product_is_tag = get_theme_mod('shop_product_is_tag', true);
$shop_product_is_social = get_theme_mod('shop_product_is_social', false);
$shop_product_social = get_theme_mod('shop_product_social', array('1', '2', '4', '5'));
$shop_product_is_related = get_theme_mod('shop_product_is_related', true);
$shop_product_variation_alignment = get_theme_mod('shop_product_variation_alignment', 1);


if (defined('FW')):
    
    $shop_products_enable_content_setting = fw_get_db_post_option($productID, 'shop_products_enable_content_setting', 2);
    if ($shop_products_enable_content_setting == 1):
        $shop_products_is_cat = fw_get_db_post_option($productID, 'shop_producst_is_cat', 1);
        $shop_products_is_review = fw_get_db_post_option($productID, 'shop_products_is_review', 1);
        $shop_products_is_stock = fw_get_db_post_option($productID, 'shop_products_is_stock', 2);
        $shop_products_stock_label = fw_get_db_post_option($productID, 'shop_products_stock_label', '');
        $shop_products_desc_lingth = fw_get_db_post_option($productID, 'shop_products_desc_lingth', '');
        $shop_products_is_wishlist = fw_get_db_post_option($productID, 'shop_products_is_wishlist', 2);
        $shop_products_is_sku = fw_get_db_post_option($productID, 'shop_products_is_sku', 1);
        $shop_products_is_tag = fw_get_db_post_option($productID, 'shop_products_is_tag', 1);
        $shop_products_is_social = fw_get_db_post_option($productID, 'shop_products_is_social', 2);
        $shop_products_social = fw_get_db_post_option($productID, 'shop_products_social', array());
        $shop_products_socials = array();
        if (!empty($shop_products_social)):
            foreach ($shop_products_social as $key => $val):
                if ($val == 1):
                    $shop_products_socials[] = $key;
                endif;
            endforeach;
        endif;
        $shop_products_is_related = fw_get_db_post_option($productID, 'shop_products_is_related', 2);
        $shop_products_variation_alignment = fw_get_db_post_option($productID, 'shop_products_variation_alignment', 1);

        $shop_product_is_cat = ( $shop_products_is_cat > 0 ? ($shop_products_is_cat == 1 ? true : false) : $shop_product_is_cat);
        $shop_product_is_review = ( $shop_products_is_review > 0 ? ($shop_products_is_review == 1 ? true : false) : $shop_product_is_review);
        $shop_product_is_stock = ( $shop_products_is_stock > 0 ? ($shop_products_is_stock == 1 ? true : false) : $shop_product_is_stock);
        $shop_product_stock_label = ( $shop_products_stock_label != '' ? $shop_products_stock_label : $shop_product_stock_label);
        $shop_product_desc_lingth = ( $shop_products_desc_lingth > 0 ? $shop_products_desc_lingth : $shop_product_desc_lingth);
        $shop_product_is_wishlist = ( $shop_products_is_wishlist > 0 ? ($shop_products_is_wishlist == 1 ? true : false) : $shop_product_is_wishlist);
        $shop_product_is_sku = ( $shop_products_is_sku > 0 ? ($shop_products_is_sku == 1 ? true : false) : $shop_product_is_sku);
        $shop_product_is_tag = ( $shop_products_is_tag > 0 ? ($shop_products_is_tag == 1 ? true : false) : $shop_product_is_tag);
        $shop_product_is_social = ( $shop_products_is_social > 0 ? ($shop_products_is_social == 1 ? true : false) : $shop_product_is_social);
        $shop_product_social = (!empty($shop_products_socials) ? $shop_products_socials : $shop_product_social);
        $shop_product_is_related = ( $shop_products_is_related > 0 ? ($shop_products_is_related == 1 ? true : false) : $shop_product_is_related);
        
        $shop_product_variation_alignment = ( $shop_products_variation_alignment > 0 ? $shop_products_variation_alignment : $shop_product_variation_alignment);
        
    endif;
endif;
$theExcerptContent = '';
if(has_excerpt() && $shop_product_desc_lingth > 0):
    $theExcerpt = wp_strip_all_tags(get_the_excerpt());
    $theCutExcerpt = $theExcerpt;
    if (preg_match('/^.{1,'.$shop_product_desc_lingth.'}\b/s', $theExcerpt, $myMatch)):
        $theCutExcerpt = $myMatch[0].'...';
    endif;
    $theExcerptContent = $theCutExcerpt;
endif;
?>
<!-- BEGIN: Product Details Section -->
<section class="shopDetailsPageSection">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php woocommerce_output_all_notices(); ?>
            </div>
        </div>
        <?php if (post_password_required()): ?>
        <div class="row">
            <div class="col-lg-12">
                <?php
                echo get_the_password_form();
                ?>
            </div>
        </div>
        <?php endif; ?>
    </div> 
<?php if (post_password_required()): ?></section><?php return; endif; ?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('productContainerWrap', $product); ?>>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <?php echo woocommerce_show_product_images(); ?>
            </div>
            <div class="col-lg-6">
                <div class="productContent variationAlignment_<?php echo esc_attr($shop_product_variation_alignment); ?>">
                    <?php if ($shop_product_is_cat && !empty($product->get_category_ids())): ?>
                        <div class="pcCategory">
                            <?php
                            $categories = $product->get_category_ids();
                            $i = 1;
                            foreach ($categories as $cid):
                                $cTerm = get_term_by('id', $cid, 'product_cat');
                                echo '<a href="' . get_term_link($cTerm->term_id, 'product_cat') . '">' . $cTerm->name . '</a>' . ($i != count($categories) ? ', ' : '');
                                $i++;
                            endforeach;
                            ?>
                        </div>
                    <?php endif; ?>
                    <h2><?php echo get_the_title(); ?></h2>
                    <div class="pi01Price"><?php echo woocommerce_template_single_price(); ?></div>
                    <?php if($shop_product_is_review || $shop_product_is_stock): ?>
                    <div class="productRadingsStock clearfix">
                        <?php if($shop_product_is_review): ?>
                        <div class="productRatings float-start">
                            <div class="productRatingWrap">
                                <?php if (get_option('woocommerce_enable_review_rating') === 'yes' && $product->get_review_count() > 0) : ?>
                                    <?php if (function_exists('woocommerce_template_single_rating')): ?>
                                        <?php echo woocommerce_template_single_rating(); ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if($shop_product_is_stock): ?>
                        <div class="productStock float-<?php echo esc_html(($shop_product_is_review && (get_option('woocommerce_enable_review_rating') === 'yes' && $product->get_review_count() > 0) ? 'end' : 'start')); ?>">
                            <?php echo (!empty($shop_product_stock_label) ? '<span>'.$shop_product_stock_label.'</span>' : ''); ?>
                            <?php if ($product->managing_stock() > 0): ?>
                                <?php echo ' '.wp_strip_all_tags(wc_get_stock_html($product)); ?>
                            <?php else: ?>
                                <?php echo esc_html__(' In Stock', 'ulina'); ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <?php if($shop_product_desc_lingth > 0): ?>
                    <div class="pcExcerpt">
                        <?php echo ulina_kses($theExcerptContent); ?>
                    </div>
                    <?php endif; ?>
                    <div class="pcBtns">
                        <?php echo woocommerce_template_single_add_to_cart(); ?>
                    </div>
                    <?php if($shop_product_is_sku || $shop_product_is_tag || $shop_product_is_social): ?>
                    <div class="pcMeta">
                        <?php if($shop_product_is_sku && !empty($product->get_sku())): ?>
                        <p>
                            <span><?php echo esc_html__('Sku:', 'ulina') ?></span>
                            <a href="javascript:void(0);"><?php echo ulina_kses($product->get_sku()) ?></a>
                        </p>
                        <?php endif; ?>
                        <?php if ($shop_product_is_tag && !empty($product->get_tag_ids())): ?>
                            <p class="pcmTags">
                                <span><?php echo esc_html__('Tags:', 'ulina') ?></span>
                                <?php
                                $tags = $product->get_tag_ids();
                                $i = 1;
                                foreach ($tags as $tid):
                                    $cTerm = get_term_by('id', $tid, 'product_tag');
                                    echo '<a href="' . get_term_link($cTerm->term_id, 'product_tag') . '">' . $cTerm->name . '</a>' . ($i != count($tags) ? ', ' : '');
                                    $i++;
                                endforeach;
                                ?>
                            </p>
                        <?php endif; ?>
                        <?php if ($shop_product_is_social && !empty($shop_product_social)): ?>
                            <p class="pcmSocial">
                                <span><?php echo esc_html__('Share:', 'ulina') ?></span>
                                <?php
                                if (in_array(1, $shop_product_social)) {
                                    echo '<a class="fac" target="_blank" href="https://www.facebook.com/sharer.php?u=' . get_the_permalink() . '&title=' . esc_url(get_the_title()) . '"><i class="ulina-facebook"></i></a>';
                                }
                                if (in_array(2, $shop_product_social)) {
                                    echo '<a  class="twi" target="_blank" href="https://twitter.com/intent/tweet?url=' . get_the_permalink() . '&text=' . esc_url(get_the_title()) . '"><i class="ulina-twitter"></i></a>';
                                }
                                if (in_array(4, $shop_product_social)) {
                                    echo '<a class="lin" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink() . '&title=' . esc_url(get_the_title()) . '"><i class="ulina-linkedin-in"></i></a>';
                                }
                                if (in_array(5, $shop_product_social)) {
                                    echo '<a  class="pin"target="_blank" href="https://pinterest.com/pin/create/bookmarklet/?media=' . get_the_post_thumbnail_url(get_the_ID(), 'full') . '&url=' . get_the_permalink() . '&is_video=false&description=' . esc_url(get_the_title()) . '"><i class="ulina-pinterest-p"></i></a>';
                                }
                                if (in_array(6, $shop_product_social)) {
                                    echo '<a class="wtp" target="_blank" href="https://api.whatsapp.com/send?text=' . get_the_permalink() . '"><i class="ulina-whatsapp"></i></a>';
                                }
                                if (in_array(7, $shop_product_social)) {
                                    echo '<a class="dig" target="_blank" href="https://digg.com/submit?url=' . get_the_permalink() . '&title=' . esc_url(get_the_title()) . '"><i class="ulina-digg"></i></a>';
                                }
                                if (in_array(8, $shop_product_social)) {
                                    echo '<a class="tmb" target="_blank" href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=' . get_the_permalink() . '&title=' . esc_url(get_the_title()) . '"><i class="ulina-tumblr"></i></a>';
                                }
                                if (in_array(9, $shop_product_social)) {
                                    echo '<a class="red" target="_blank" href="https://reddit.com/submit?url=' . get_the_permalink() . '&title=' . esc_url(get_the_title()) . '"><i class="ulina-reddit-alien"></i></a>';
                                }
                                if (in_array(3, $shop_product_social)) {
                                    echo '<a class="mil" target="_blank" href="mailto:?subject=' . get_the_permalink() . '"><i class="ulina-envelope"></i></a>';
                                }
                                ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- BEGIN: Desc AddInfo Rev Section -->
        <?php echo (function_exists('woocommerce_output_product_data_tabs') ? woocommerce_output_product_data_tabs() : ''); ?>
        <!-- END: Desc AddInfo Rev Section -->
        <?php if ($shop_product_is_related): ?>
            <!-- BEGIN: Trending Product Section -->
            <?php echo (function_exists('woocommerce_output_related_products') ? woocommerce_output_related_products() : ''); ?>
            <!-- END: Trending Product Section -->
        <?php endif; ?> 
    </div>
</div>
</section>
<!-- END: Product Details Section -->
<div class="clearfix"></div>
