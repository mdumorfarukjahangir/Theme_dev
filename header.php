<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php

    wp_head();
    ?>


</head>

<body id="top" <?php body_class(); ?>>

    <!-- pageheader
    ================================================== -->
    <section class="s-pageheader <?php if(is_home()) echo "s-pageheader--home";  ?> ">

        <header class="header">
            <div class="header__content row">

                <div class="header__logo">
                    <a class="logo" href="<?php echo esc_url(get_site_url()); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images//logo.svg" alt="Homepage">
                    </a>
                </div> <!-- end header__logo -->

                <ul class="header__social">
                <?php 
                 if(is_active_sidebar('header_social')){
                 dynamic_sidebar('header_social');
               }
                ?> 
                </ul> <!-- end header__social -->

                <a class="header__search-trigger" href="#0"></a>

                <div class="header__search">

                    <form role="search" method="get" class="header__search-form" action="#">
                        <label>
                            <span class="hide-content">Search for:</span>
                            <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="Search for:" autocomplete="off">
                        </label>
                        <input type="submit" class="search-submit" value="Search">
                    </form>

                    <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

                </div> <!-- end header__search -->


                <?php
                get_template_part("template-parts/common/navigation");
                ?>

            </div> <!-- header-content -->
        </header> <!-- header -->

        <?php
        if(is_home()){
            get_template_part("template-parts/blog-home/featured");
        }
     ?>


    </section> <!-- end s-pageheader -->