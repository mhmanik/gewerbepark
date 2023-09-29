<?php
/**
 * @author  webxpixel
 * @since   1.0
 * @version 1.0
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
    <!-- Google Tag Manager -->

</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php $WPX_offcanvas_menu_args = array( 
            'theme_location' => 'primary',
            'container' => 'nav',
            'container_class' => 'mainmenu-nav',
            'container_id' => '',
            'menu_class' => 'mainmenu', 
            'fallback_cb' => false
        ); ?>

    <!-- Google Tag Manager (noscript) -->
    <div id="main-wrapper" class="main-wrapper"> 

        <div class="header-top">
            <div class="container">
                <div class="header-top-inner-wrp">
                    <div class="gap-3 flex-wrap d-flex align-items-center justify-content-between">
                        <div class="headerTop-list-wrap">
                            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("header-top-left")): ?> 
                                <ul class="headerTop-list">
                                    <li>Haben Sie Fragen? </li>
                                    <li> 
                                        <i class="fa fa-phone"></i> 
                                        <span class="text-style"> 06151 96985222 </span>
                                    </li>
                                    <li>
                                        <a class="no-text-decoration" href="mailto:info@gewerbepark-schwinn.de">
                                            <i class="fa fa-envelope"></i> 
                                            <span class="text-style">info@gewerbepark-schwinn.de</span>
                                        </a>
                                    </li>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <div class="headerTop-list-wrap">
                            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("header-top-right")): ?>
                                <ul class="headerTop-list">
                                    <li> 
                                        <a class="no-text-decoration style" href="https://www.facebook.com/GewerbeparksSchwinn" target="_blank">
                                        <i class="fab fa-facebook"></i>
                                    </a></li>
                                    <li>Finden Sie uns auf Facebook </li>
                                </ul> 
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <header class="header wpx-header header-style-1">
            <div id="wpx-sticky-placeholder"></div>
            <div class="container">
                <div class="wpx-mainmenu">
                    <div class="header-navbar">
                        <div class="header-logo">
                            <a href="<?php echo esc_url( home_url( '/' ) );?>">
                                <img class="light-version-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-1.svg" alt="logo">
                            </a>
                        </div>
                        <div class="header-main-nav">
                            <!-- Start Mainmanu Nav -->
                            <?php if (has_nav_menu('primary')) {
                                wp_nav_menu($WPX_offcanvas_menu_args);
                                
                            } ?>
                            <!-- End Mainmanu Nav -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
</body> 
        
