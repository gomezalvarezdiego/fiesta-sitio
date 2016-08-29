<?php
?><!DOCTYPE html>
<!--[if IE 8 ]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if IE 9 ]> <html <?php language_attributes(); ?> class="ie9"> <![endif]-->
<!--[if gt IE 9]> <html <?php language_attributes(); ?>> <![endif]-->
<!--[if !IE]> <!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title( '|', true, 'right' );  bloginfo('name'); ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php oxy_add_apple_icons( 'iphone_icon' ); ?>
        <?php oxy_add_apple_icons( 'iphone_retina_icon', '114x114' ); ?>
        <?php oxy_add_apple_icons( 'ipad_icon', '72x72' ); ?>
        <?php oxy_add_apple_icons( 'ipad_retina_icon', '144x144' ); ?>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:300,700,100,400|Open+Sans:400italic,700italic,400,700,300' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="<?php echo oxy_get_option( 'favicon' ); ?>">
        <!--[if lt IE 9]>
        <script src="<?php echo OXY_THEME_URI .'assets/js/ltIE9.js'; ?>"></script>
        <![endif]-->
        <?php wp_head(); ?>
    </head>
    <body <?php body_class('FD_BOOK'); ?>>
        <?php include_once("analyticstracking.php") ?>
        <div class="header-top-bar">
            <div class="row">
                <div class="col-md-8 no-padding">
                    <nav> <?php wp_nav_menu(array('theme_location' => 'header-bar-menu','menu_class'=> 'header-bar-menu')); ?> </nav>
                </div>        
                <div class="col-md-4 no-padding">
                    <nav class="social">
                        <ul class="no-padding">
                            <li class="social-li">
                                <ul >
                                    <li> 
                                        <a href="https://www.facebook.com/FiestaLibro" target="_blank"><i class="fa fa-facebook"></i></a>
                                    </li>

                                    <li>
                                        <a href="https://twitter.com/FiestaLibro" target="_blank"><i class="fa fa-twitter"></i></a>
                                    </li>

                                    <li>
                                        <a href="https://www.youtube.com/user/FiestadelLibroMed" target="_blank"><i class="fa fa-youtube-play"></i></i></a>
                                    </li>

                                    <li>
                                        <a href="https://www.flickr.com/photos/fiestalibro" target="_blank"><i class="fa fa-flickr"></i></a>
                                    </li>

                                    <li class="line-separator">
                                        <a href="https://instagram.com/fiestalibro/" target="_blank"><i class="fa fa-instagram"></i></a>
                                    </li>
                                </ul>    
                            <li class="li-search">
                                <div class="search-form">
                                    <?php get_search_form() ?>
                                </div>
                            </li>
                        </ul>        
                    </nav>
                </div>
            </div>
        </div>
        <?php oxy_create_nav(); ?>
        <div id="content" class="mde_main libro_main" role="main">