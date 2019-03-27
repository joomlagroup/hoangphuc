<?php
// Register Custom Post Type

// Creating a Deals Custom Post Type
function create_custom_post_type_video() {
    $labels = array(
        'name'                => __( 'Youtube Video' ),
        'singular_name'       => __( 'Youtube Video'),
        'menu_name'           => __( 'Youtube Video'),
        'parent_item_colon'   => __( 'Parent Youtube Video'),
        'all_items'           => __( 'Tất Cả Youtube Video'),
        'view_item'           => __( 'Xem Youtube Video'),
        'add_new_item'        => __( 'Thêm Mới Youtube Video'),
        'add_new'             => __( 'Thêm Mới'),
        'edit_item'           => __( 'Chỉnh Sửa Youtube Video'),
        'update_item'         => __( 'Cập Nhật Youtube Video'),
        'search_items'        => __( 'Tìm Youtube Video'),
        'not_found'           => __( 'Không Tìm Thấy'),
        'not_found_in_trash'  => __( 'Not found in Trash')
    );
    $args = array(
        'label'               => __( 'Youtube Video'),
        'description'         => __( 'Youtube Video'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'revisions', 'custom-fields'),
        'public'              => true,
        'hierarchical'        => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'has_archive'         => true,
        'can_export'          => true,
        'exclude_from_search' => false,
        'yarpp_support'       => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );
    register_post_type( 'video', $args );
}
add_action( 'init', 'create_custom_post_type_video', 0 );

function create_custom_post_type_album_hinh() {
    $labels = array(
        'name'                => __( 'Album Hình' ),
        'singular_name'       => __( 'Album Hình'),
        'menu_name'           => __( 'Album Hình'),
        'parent_item_colon'   => __( 'Parent Album Hình'),
        'all_items'           => __( 'Tất Cả Album Hình'),
        'view_item'           => __( 'Xem Ý Album Hình'),
        'add_new_item'        => __( 'Thêm Mới Album Hình'),
        'add_new'             => __( 'Thêm Mới'),
        'edit_item'           => __( 'Chỉnh Sửa Album Hình'),
        'update_item'         => __( 'Cập Nhật Album Hình'),
        'search_items'        => __( 'Tìm Album Hình'),
        'not_found'           => __( 'Không Tìm Thấy'),
        'not_found_in_trash'  => __( 'Not found in Trash')
    );
    $args = array(
        'label'               => __( 'Album Hình'),
        'description'         => __( 'Album Hình'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'revisions', 'custom-fields'),
        'public'              => true,
        'hierarchical'        => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'has_archive'         => true,
        'can_export'          => true,
        'exclude_from_search' => false,
        'yarpp_support'       => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );
    register_post_type( 'album-hinh', $args );
}
add_action( 'init', 'create_custom_post_type_album_hinh', 0 );


function category_init() {
    // create a new taxonomy
    $labels = array(
        'name'				=> 'Danh Mục Dự Án',
        'singular' 			=> 'Danh Mục Dự Án',
        'menu_name'			=> 'Danh Mục Dự Án',
        //'all_items'		=> chua xac dinh
        //'view_item'		=> chua xac dinh
        'edit_item'			=> 'Sửa Danh Mục Dự Án',
        'update_item'		=> 'Cập Nhật Danh Mục Dự Án',
        'add_new_item'		=> 'Thêm Mới Danh Mục Dự Án',
        //'new_item_name'	=> chua xac dinh
        //'parent_item'		=> chua xac dinh
        //'parent_item_colon'	=> chua xac dinh
        'search_items'		=> 'Search Danh Mục Dự Án',
        'popular_items'		=> 'Danh Mục Công Việc are using',
        'separate_items_with_commas' => 'Separate tags with commas 123',
        'choose_from_most_used' => 'Choose from the most used tags 123',
        'not_found'			=> 'Không Tìm Thấy Danh Mục Dự Án',

    );
    $args = array(
        'labels' 				=> $labels,
        'public'				=> true,
        //'show_ui'				=> false,
        //'show_in_nav_menus'	=> false,
        'show_tagcloud'			=> true,
        'hierarchical'			=> true,
        'show_admin_column'		=> false,
        'query_var'				=> true,
        'rewrite'				=> array('slug' => 'danh-muc-du-an'),
    );
    register_taxonomy('danh-muc-du-an', array('du-an'),$args);

}
add_action( 'init', 'category_init' );

// Creating a Deals Custom Post Type
function create_custom_post_type_du_an() {
    $labels = array(
        'name'                => __( 'Dự Án' ),
        'singular_name'       => __( 'Dự Án'),
        'menu_name'           => __( 'Dự Án'),
        'parent_item_colon'   => __( 'Parent Dự Án'),
        'all_items'           => __( 'Tất Cả Dự Án'),
        'view_item'           => __( 'Dự Án'),
        'add_new_item'        => __( 'Thêm Mới Dự Án'),
        'add_new'             => __( 'Thêm Mới'),
        'edit_item'           => __( 'Chỉnh Sửa Dự Án'),
        'update_item'         => __( 'Cập Nhật Dự Án'),
        'search_items'        => __( 'Tìm Dự Án'),
        'not_found'           => __( 'Không Tìm Thấy'),
        'not_found_in_trash'  => __( 'Not found in Trash')
    );
    $args = array(
        'label'               => __( 'Dự Án'),
        'description'         => __( 'Dự Án'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields'),
        'public'              => true,
        'hierarchical'        => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'has_archive'         => true,
        'can_export'          => true,
        'exclude_from_search' => false,
        'yarpp_support'       => true,
        'taxonomies' 	      => array('danh-muc-du-an'),
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );
    register_post_type( 'du-an', $args );
}

add_action( 'init', 'create_custom_post_type_du_an', 0 );

