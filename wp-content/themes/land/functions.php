<?php

/*============================================================================
 * 1. INIT THEME
============================================================================*/
if (!class_exists('ReduxFramewrk')) {
    require_once(dirname(__FILE__) . '/ReduxCore/framework.php');
}
if (!isset($redux_demo)) {
    require_once(dirname(__FILE__) . '/ReduxCore/theme-option.php');
}

if (STYLESHEETPATH == TEMPLATEPATH) {
    define('OF_FILEPATH', TEMPLATEPATH);
    define('OF_DIRECTORY', get_template_directory_uri());
} else {
    define('OF_FILEPATH', STYLESHEETPATH);
    define('OF_DIRECTORY', get_stylesheet_directory_uri());
}

include 'inc/shortcode.php';
include 'inc/register_custom_postype.php';

if (function_exists('register_nav_menus')) {
    register_nav_menus(
        array(

            'main-nav' => 'The Main Menu',
            'mobile-nav' => 'The Mobile Menu',
            'footer-nav' => 'Footer Menu',

        )
    );
}
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}


function thumb_img($post_id, $h, $w, $q)
{ //lấy ảnh dùng id

    // echo bloginfo('template_url');
    // echo '/timthumb.php?src='.get_featured_img($post_id).'&amp;h='.$h.'&amp;w='.$w.'&amp;q='.$q;
    $params = array('width' => $w, 'height' => $h, 'crop' => false, 'opacity' => $q);
    echo bfi_thumb(get_featured_img($post_id), $params);
}

if(!is_admin()){
    $jsUrl = get_template_directory_uri() . '/js';
    wp_enqueue_script('script',$jsUrl . '/main.js',array('jquery'),'1.0',true);
}

if ( is_user_logged_in() ) {
    add_filter('show_admin_bar', '__return_false');
}


/*============================================================================
 * 2. INIT WIDGET
============================================================================*/
add_action('widgets_init', 'theme_widgets_init');

function theme_widgets_init()
{



}

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}


function get_youtube_video_ID($youtube_video_url) {
    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_video_url, $match);
    $youtube_id = $match[1];
    return $youtube_id;
}

add_filter('template_include', function($default_template) {

    if (is_post_type_archive('video')) {

        $default_template  = get_template_directory().'/single-video.php';

    } else if ('video' == get_post_type() ) {

        $default_template  = get_template_directory().'/single-video.php';

    }

    // Load new template also fallback if both condition fails load default
    return $default_template;

}, 9999); // set priority, only if not worked with default one



