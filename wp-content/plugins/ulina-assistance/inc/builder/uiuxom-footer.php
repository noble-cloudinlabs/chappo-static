<?php do_action('uiuxom_before_footer'); ?>
<div class="uiuxom-footer-content">
    <?php
    $footer_style = get_theme_mod('footer_style', 0);
    if (is_page() && defined('FW')) {
        $page_is_settings = fw_get_db_post_option(get_the_ID(), 'page_footer_enabled', 2);
        if ($page_is_settings == 1) {
            $footer_style = fw_get_db_post_option(get_the_ID(), 'page_footer_style', 0);
        }
    }

    if ($footer_style > 0) {
        $footer = Uiuxom_Builder::render_template($footer_style);
    }
    ?>
</div>
<?php do_action('uiuxom_after_footer'); ?>
<!-- Back To Top Start -->
<a href="javascript:void(0);" id="backtotop"><i class="ulina-arrow-up"></i></a>
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

<?php wp_footer(); ?>
</body>
</html>