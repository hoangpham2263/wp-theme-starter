<?php
// register post type mau website
function custom_post_type_mau_website()
{
    $labels = array(
        'name'                  => 'Mẫu Website',
        'singular_name'         => 'Mẫu Website',
        'menu_name'             => 'Mẫu Website',
        'name_admin_bar'        => 'Mẫu Website',
        'add_new'               => 'Thêm mới',
        'add_new_item'          => 'Add Mẫu Website',
        'new_item'              => 'Mẫu Website mới',
        'edit_item'             => 'Chỉnh sửa Mẫu Website',
        'view_item'             => 'Xem Mẫu Website',
        'all_items'             => 'Tất cả Mẫu Website',
        'search_items'          => 'Tìm kiếm Mẫu Website',
        'parent_item_colon'     => 'Mẫu Website cha:',
        'not_found'             => 'Không tìm thấy',
        'not_found_in_trash'    => 'Không tìm thấy trong thùng rác'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'mau-website'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon'          => 'dashicons-desktop'
    );

    register_post_type('mau_website', $args);
}
add_action('init', 'custom_post_type_mau_website');

function register_mau_website_category_taxonomy()
{
    $labels = array(
        'name'              => 'Danh mục Website',
        'singular_name'     => 'Danh mục',
        'search_items'      => 'Tìm kiếm Danh mục',
        'all_items'         => 'Tất cả Danh mục',
        'parent_item'       => 'Danh mục cha',
        'parent_item_colon' => 'Danh mục cha:',
        'edit_item'         => 'Chỉnh sửa Danh mục',
        'update_item'       => 'Cập nhật Danh mục',
        'add_new_item'      => 'Thêm Danh mục mới',
        'new_item_name'     => 'Tên Danh mục mới',
        'menu_name'         => 'Danh mục',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'danh-muc-website'),
        'show_in_nav_menus' => true,
    );

    register_taxonomy('website_category', array('mau_website'), $args);
}
add_action('init', 'register_mau_website_category_taxonomy');