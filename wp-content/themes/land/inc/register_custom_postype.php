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
        'view_item'           => __( 'Xem Ý Youtube Video'),
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
