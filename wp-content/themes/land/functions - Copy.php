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

    if (is_post_type_archive('video' or is_paged())) {

        $default_template  = get_template_directory().'/single-video.php';

    } else if ('video' == get_post_type() ) {

        $default_template  = get_template_directory().'/single-video.php';

    }


    //for du-an
    if (is_post_type_archive('du-an')) {

        $default_template  = get_template_directory().'/taxonomy-danh-muc-du-an.php';

    } else if (is_tax('danh-muc-du-an')) {

        $default_template  = get_template_directory().'/taxonomy-danh-muc-du-an.php';

    }

    // Load new template also fallback if both condition fails load default
    return $default_template;

}, 9999); // set priority, only if not worked with default one



add_theme_support( 'post-thumbnails');
add_image_size('featuredImageProject', 520, 520, array( 'center', 'center'));

function devvn_wp_corenavi($custom_query = null, $paged = null) {
    global $wp_query;
    if($custom_query) $main_query = $custom_query;
    else $main_query = $wp_query;
    $paged = ($paged) ? $paged : get_query_var('paged');
    $big = 999999999;
    $total = isset($main_query->max_num_pages)?$main_query->max_num_pages:'';
    if($total > 1) echo '<div class="pagenavi">';
    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, $paged ),
        'total' => $total,
        'mid_size' => '10', // Số trang hiển thị khi có nhiều trang trước khi hiển thị ...
        'prev_text'    => __('Prev','devvn'),
        'next_text'    => __('Next','devvn'),
    ) );
    if($total > 1) echo '</div>';
}


function my_custom_posts_per_page( $query ) {
    if (!is_admin() && post_type_exists('du-an') )
        $query->set( 'posts_per_page', 30 );
}
add_filter('parse_query', 'my_custom_posts_per_page');
