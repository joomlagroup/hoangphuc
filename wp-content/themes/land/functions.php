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

if(!is_admin()){
    $jsUrl = get_template_directory_uri() . '/js';
    wp_enqueue_script('script',$jsUrl . '/main.js',array('jquery'),'1.0',true);
    wp_enqueue_script('script_fancybox',$jsUrl . '/fancybox/jquery.fancybox.pack.js','1.0',true);
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


    //for du-an
    if (is_post_type_archive('du-an')) {

        $default_template  = get_template_directory().'/taxonomy-danh-muc-du-an.php';

    } else if (is_tax('danh-muc-du-an')) {

        $default_template  = get_template_directory().'/taxonomy-danh-muc-du-an.php';

    }

    //for tuyen-dung
    if (is_post_type_archive('tuyen-dung')) {

        $default_template  = get_template_directory().'/single-tuyen-dung.php';

    } else if ('tuyen-dung' == get_post_type() ) {

        $default_template  = get_template_directory().'/single-tuyen-dung.php';

    }

    // Load new template also fallback if both condition fails load default
    return $default_template;

}, 9999); // set priority, only if not worked with default one



add_theme_support( 'post-thumbnails');
add_image_size('featuredImageProject', 720, 520, array( 'center', 'center'));

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
        'prev_text'    => __('&nbsp;','devvn'),
        'next_text'    => __('&nbsp;','devvn'),
    ) );
    if($total > 1) echo '</div>';
}

//ajax album hinh


add_action( 'wp_ajax_loadpost', 'loadpost_init' );
add_action( 'wp_ajax_nopriv_loadpost', 'loadpost_init' );
function loadpost_init() {

    if ( !wp_verify_nonce( $_REQUEST['nonce'], "check_security_ajax")) {
        exit("No naughty business please");
    }

    $post_id = (int)$_REQUEST["post_id"];
    if($post_id){

        $album_images = get_field('album_images',$post_id);
        if($album_images):

            foreach ($album_images as $key=>$item):
                $img_url  = $item['img'];

                echo '<a rel="album-'.$post_id.'" href="'.$img_url.'" title=""></a>';
            endforeach;

        endif;
    }

    $result = ob_get_clean(); //cho hết bộ nhớ đệm vào biến $result
    wp_send_json_success($result); // trả về giá trị dạng json

    die();//bắt buộc phải có khi kết thúc
}


//Add Open Graph Meta Info from the actual article data, or customize as necessary
add_action( 'wp_head', 'facebook_open_graph', 5 );

function facebook_open_graph() {
    global $tp_options;

    global $post;
    if ( !is_singular()) //if it is not a post or a page
        return;
    if($excerpt = $post->post_excerpt)
    {
        $excerpt = strip_tags($post->post_excerpt);
        $excerpt = str_replace("", "'", $excerpt);
    }
    else
    {
        $excerpt = get_bloginfo('description');
    }

    $blog_title = get_bloginfo( 'name' );

    //You'll need to find you Facebook profile Id and add it as the admin
    echo '<meta property="og:title" content="' . get_the_title() . '"/>';
    echo '<meta property="og:description" content="' . $excerpt . '"/>';
    echo '<meta property="og:type" content="article"/>';
    echo '<meta property="og:url" content="' . get_permalink() . '"/>';
    //Let's also add some Twitter related meta data
    echo '<meta name="twitter:card" content="summary" />';
    //This is the site Twitter @username to be used at the footer of the card
    echo '<meta name="twitter:site" content="@site_user_name" />';
    //This the Twitter @username which is the creator / author of the article
    echo '<meta name="twitter:creator" content="@username_author" />';

    // Customize the below with the name of your site
    echo '<meta property="og:site_name" content="'.$blog_title.'"/>';
    if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
        //Create a default image on your server or an image in your media library, and insert it's URL here
        $default_image = $tp_options['site_image']['url'];
        echo '<meta property="og:image" content="' . $default_image . '"/>';
    }
    else{
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
        echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
    }

    echo "
	";
}
