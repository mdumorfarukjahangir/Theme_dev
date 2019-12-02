<?php

require_once(get_theme_file_path('/inc/tgm.php'));


if (site_url() == "http://philosophy.test/") {
    define("VERSION", time());
} else {
    define("VERSION", wp_get_theme()->get("Version"));
}

function philosophy_setup()
{


    load_theme_textdomain('philosophy');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(825, 510, true);
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));
    add_theme_support('post-formats', array(
        'image', 'video', 'quote', 'link', 'gallery', 'audio'
    ));
    add_editor_style('/assets/css/editor-style.css');
    register_nav_menu("topmenu", __("Top Menu", "philosophy"));

    add_image_size("philosophy-home-image", 400,400,true);
}

add_action('after_setup_theme', 'philosophy_setup');


function philosophy_assets()
{

    wp_enqueue_style('font-awesome', get_theme_file_uri('/assets/css/font-awesome/css/font-awesome.min.css'), null, "1.0");
    wp_enqueue_style('fonts-css', get_theme_file_uri('/assets/css/fonts.css'), null, "1.0");
    wp_enqueue_style('base-css', get_theme_file_uri('/assets/css/base.css'), null, "1.0");
    wp_enqueue_style('vendor-css', get_theme_file_uri('/assets/css/vendor.css'), null, "1.0");
    wp_enqueue_style('main-css', get_theme_file_uri('/assets/css/main.css'), null, "1.0");
    wp_enqueue_style('style-css', get_stylesheet_uri(), null, VERSION);

    wp_enqueue_script('modernizr-js', get_theme_file_uri('/assets/js/modernizr.js'), null, "1.0");
    wp_enqueue_script('pace.min-js', get_theme_file_uri('/assets/js/pace.min.js'), null, "1.0");
    wp_enqueue_script('plugins-js', get_theme_file_uri('/assets/js/plugins.js'), array("jquery"), "1.0", true);
    wp_enqueue_script('main-js', get_theme_file_uri('/assets/js/main.js'), array("jquery"), "1.0", true);
}
add_action('wp_enqueue_scripts', 'philosophy_assets');
