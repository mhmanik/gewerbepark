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

                        <h3 class="footer-title">Über uns</h3>
                        <p class="widget-not footer-para">Im  Landkreis Darmstadt-Dieburg sind <br>wir eine der ersten Adressen für <br>Selfstorage. Mit über 11.000 m² <br>Lagerfläche und 2.000 m² Räumen <br>bieten wir vielfältige Lagermöglichkeiten <br>für Privatleute sowie</p>


                        <?php endif; ?>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 footer-about-wrp">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("footer2")): ?>
                            <h3 class="footer-title">Sitemap</h3>
                            <div class="footer-menu-wrp">
                                <ul class="footer-menu">
                                    <li>
                                        <a href="#">Warum Selfstorage</a>
                                    </li>
                                    <li class="spacing">
                                        <a href="#">Lagermöglichkeiten</a>
                                    </li>
                                    <li class="spacing">
                                        <a href="#">Preise</a>
                                    </li>
                                    <li class="spacing">
                                        <a href="#">Galerie</a>
                                    </li>
                                    <li class="spacing">
                                        <a href="#">Kontakt</a>
                                    </li>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 footer-about-wrp">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("footer3")): ?>
                            <h3 class="footer-title">Kontaktieren Sie uns</h3>
                            <h6 class="sub-title">Gewerbeparks Schwinn</h6>
                            <div class="address-detail spacing-2">
                                <ul>
                                    <li>Inh. Adam Schwinn</li>
                                    <li>Rheinstraße 37</li>
                                    <li>64367 Mühltal</li>
                                </ul>
                            </div>
                            <div class="address-detail">
                                <ul>
                                    <li> 
                                        <i class="fa fa-phone"></i> 
                                        <span class="text-style"> 06151 96985222 </span>
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope"></i> 
                                        <a class="no-text-decoration" href="mailto:info@gewerbepark-schwinn.de">
                                            <span class="text-style">info@gewerbepark-schwinn.de</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 footer-about-wrp">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("footer4")): ?>
                            <h3 class="footer-title">Öffnungszeiten</h3>
                            <div class="address-detail spacing-3">
                                <ul>
                                    <li class="li-space">24 Stunden / 365 Tage</li>
                                    <li>Zugang zu den gemieteten Fläche 24/7</li>
                                </ul>
                            </div>
                            <div class="address-detail spacing-3">
                                <h6 class="sub-title">Unsere Bürozeiten</h6>
                                <p class="widget-not address-para">Mo. - Fr. 9.00-17.00 Uhr</p>
                            </div>
                            <div class="address-detail">
                                <h6 class="sub-title">Telefonberatung</h6>
                                <p class="widget-not address-para">Mo. - Fr. 9.00-17.00 Uhr</p>
                            </div>
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
                            <p class="widget-not footer-bottom-text">© 2023 Gewerbeparks Schwinn, Mühltal</p>
                            <?php endif; ?>
                        </div>
                        <div class="copyright-social">
                            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("footer-menu")): ?>
                                <ul>
                                    <li>
                                        <a href="#">Impressum</a>
                                    </li>
                                    <li>
                                        <a href="#">Datenschutz</a>
                                    </li>
                                </ul>
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