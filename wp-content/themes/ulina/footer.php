<?php
/**
 * The template for displaying the footer
 */
$copy_site_info = get_theme_mod('copy_site_info', date('Y') . ' &copy; ' . get_bloginfo('name') . '. ' . esc_html__(' All Rights Reserved.', 'ulina'));
?>
<section class="defaultFooter">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="siteInfo"><?php echo ulina_kses($copy_site_info); ?></div>
            </div>
        </div>
    </div>
</section>
<!-- Back To Top Start -->
<a href="javascript:void(0);" id="backtotop"><i class="ulina-angles-up"></i></a>
<!-- Back To Top End -->

<!-- BEGIN: QuickView -->
<div class="modal fade productQuickView" id="productQuickView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="quickViewCloser" data-bs-dismiss="modal" aria-label="Close"><span></span></button>
            <div class="modal-body">
                <div class="ulinaModalContent"></div>
                <div class="ulinaModalLoader"></div>
            </div>
        </div>
    </div>
</div>
<!-- END: QuickView -->

<?php
wp_footer(); ?>
</body>
</html>