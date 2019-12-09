<?php

require_once(get_theme_file_path('/inc/tgm.php'));
require_once(get_theme_file_path('/inc/attachments.php'));
require_once(get_theme_file_path('/widgets/social-widget.php'));


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
    register_nav_menus( array(
        'topmenu' => __("Top Menu","philosophy"),
        'footer_left' => __( 'footer_left', 'philosophy' ),
        'footer_middle'  => __( 'Footer middle', 'philosophy' ),
        'footer_right'  => __( 'Footer right', 'philosophy' ),
    ) );

    add_image_size("philosophy-home-image", 400, 400, true);
}

add_action('after_setup_theme', 'philosophy_setup');


function philosophy_assets()
{

    wp_enqueue_style('font-awesome', get_theme_file_uri('/assets/css/font-awesome/css/font-awesome.min.css'), null, "1.0");
    wp_enqueue_style('fonts-css', get_theme_file_uri('/assets/css/fonts.css'), null, "1.0");
    wp_enqueue_style('base-css', get_theme_file_uri('/assets/css/base.css'), null, "1.0");
    wp_enqueue_style('vendor-css', get_theme_file_uri('/assets/css/vendor.css'), null, "1.0");
    wp_enqueue_style('main-css', get_theme_file_uri('/assets/css/main.css'), null, "1.0.1");
    wp_enqueue_style('style-css', get_stylesheet_uri(), null, VERSION);

    wp_enqueue_script('modernizr-js', get_theme_file_uri('/assets/js/modernizr.js'), null, "1.0");
    wp_enqueue_script('pace.min-js', get_theme_file_uri('/assets/js/pace.min.js'), null, "1.0");
    wp_enqueue_script('plugins-js', get_theme_file_uri('/assets/js/plugins.js'), array("jquery"), "1.0", true);
    wp_enqueue_script('main-js', get_theme_file_uri('/assets/js/main.js'), array("jquery"), "1.0", true);
}
add_action('wp_enqueue_scripts', 'philosophy_assets');

function philosophy_home_pagination()
{
    global $wp_query;
    $links = paginate_links(array(
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'type' => 'list',
        'mid_size' => 2,

    ));

    $links = str_replace("page-numbers", "pgn__num", $links);
    $links = str_replace("<ul class='pgn__num'>","<ul>",$links);
    $links = str_replace("prev pgn__num", "pgn__prev", $links);
    $links = str_replace("next pgn__num", "pgn__next", $links);

    echo $links;
}



remove_action( "term_description","wpautop");

function philosophy_widget() {
    register_sidebar( array(
        'name'          => __( 'About Us', 'philosophy' ),
        'id'            => 'about-us',
        'description'   => __( 'About us widget', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="col-block %2$s">',
        'after_widget'  => "</div>",
        'before_title'  => '<h3 class="quarter-top-margin">',
        'after_title'   => "</h3>",
    ) );

    register_sidebar( array(
        'name'          => __( 'Contact Us Maps', 'philosophy' ),
        'id'            => 'contact-us-map',
        'description'   => __( 'Contact us maps widget', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => "</div>",
        'before_title'  => ' ',
        'after_title'   => " ",
    ) );
    register_sidebar( array(
        'name'          => __( 'Contact us section', 'philosophy' ),
        'id'            => 'contact-us-section',
        'description'   => __( 'Contact us maps widget', 'philosophy' ),
        'before_widget' => '<div class="col-six tab-full %2$s">',
        'after_widget'  => "</div>",
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Before footer section ', 'philosophy' ),
        'id'            => 'before_footer_section',
        'description'   => __( 'Before footer section ', 'philosophy' ),
        'before_widget' => '<div class="%2$s">',
        'after_widget'  => "</div>",
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer right', 'philosophy' ),
        'id'            => 'footerright',
        'description'   => __( 'Footer right section ', 'philosophy' ),
        'before_widget' => '<div class="%2$s">',
        'after_widget'  => "</div>",
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer bottom', 'philosophy' ),
        'id'            => 'footer_bottom',
        'description'   => __( 'Footer Bottom', 'philosophy' ),
        'before_widget' => '<div class="%2$s">',
        'after_widget'  => "</div>",
        'before_title'  => '<span>',
        'after_title'   => '</span>',
    ) );
}
add_action( 'widgets_init', 'philosophy_widget' );

