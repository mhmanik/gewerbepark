<?php
/**
 * @author  webxpixel
 * @since   1.0
 * @version 1.0
 */
?>

<footer>
    
    <div class="footer-wrp">
        <div class="footer-top-wrp">
            <div class="container">
                <div class="row g-4">
                    <div class="col-xl-3 col-12 footer-about-wrp">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("footer1")): ?>
                        <p class="widget-not">Footer Main Widget Area</p>
                        <?php endif; ?>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("footer2")): ?>
                        <p class="widget-not">Footer Main Widget Area</p>
                        <?php endif; ?>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("footer3")): ?>
                        <p class="widget-not">Footer Main Widget Area</p>
                        <?php endif; ?>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("footer4")): ?>
                        <p class="widget-not">Footer Main Widget Area</p>
                        <?php endif; ?>
                    </div>
                     
                </div>
            </div>
        </div>
        <div class="copyright-wrp">
            <div class="container">
                <div class="copyright-inner-wrp">
                    <div class="gap-3 flex-wrap d-flex align-items-center justify-content-between">
                        <div class="copyright">
                            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("footer-copyright")): ?>
                            <p class="widget-not">Footer Copyright Widget Area</p>
                            <?php endif; ?>
                        </div>
                        <div class="copyright-social">
                            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("footer-menu")): ?>
                            <p class="widget-not">Footer Copyright Widget Area</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>