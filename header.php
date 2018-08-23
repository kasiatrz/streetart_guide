<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
     <meta charset="<?php bloginfo( 'charset' ); ?>" />
     <meta name="description"
            content="<?php bloginfo(description); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" >
    <?php wp_head(); ?>
</head>

<body id="homepage" onload=set_time() <?php body_class()?>>
    <nav>  
        <!-- wrapper for all navigation -->
        <div>
            <!-- logo -->
            <a href="<?php bloginfo(url); ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/logo.svg" alt="logo"></a>
            <!-- architectural squares -->
            <div class="squares">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <!-- wrapper for menu & search box -->
            <div class="nav_background">
                <!-- hamburger -->
                <div class="hamburger">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                
                <?php 
                    wp_nav_menu(array(
                        'name'=>'Main menu',
                        'container' =>'',
                        'link_before' => '<span>',
                        'link_after' => '</span>'
                    ));
                ?>
                
                
                <!-- MENU ORIGINAL
                <ul>
                    <li><span>Artists</span></li>
                    <li><a href="#"><span>Works</span></a></li>
                    <li><a href="#"><span>Maps</span></a></li>
                </ul>
                -->
                <!-- search box -->
                <div class="search-form-containter">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
         <!--END wrapper for all navigation -->
    </nav> 
    