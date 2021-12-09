<?php

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}


function load_runo_assets()
{
    wp_enqueue_style('runo_blog_styles', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('runo_blog_styles', 'rtl', 'replace');

    wp_enqueue_style('globaCssStyles', get_template_directory_uri() . "/assets/dist/globalCssFiles.css", array(), _S_VERSION);
    wp_enqueue_style('main_styles', get_template_directory_uri() . "/assets/dist/mainStyle.css", array(), _S_VERSION);
    wp_enqueue_script("runo_script", get_template_directory_uri() . "/assets/dist/js/index.js", NULL, NULL, true);

    if (is_front_page()) {
        wp_enqueue_style('frontPage', get_template_directory_uri() . "/assets/dist/frontpage.css", array(), _S_VERSION);
    } elseif (is_page("about")) {
        wp_enqueue_style('aboutPage', get_template_directory_uri() . "/assets/dist/aboutpage.css", array(), _S_VERSION);
    } elseif (is_page("contact")) {
        wp_enqueue_style('contactPage', get_template_directory_uri() . "/assets/dist/contact.css", array(), _S_VERSION);
    }
}

add_action('wp_enqueue_scripts', 'load_runo_assets');
