<?php
/**
 * ACF Fields Definition for Home Page
 * Location: xenangplus/inc/fields/home.php
 */

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_home_page',
        'title' => 'Home Page Settings',
        'fields' => array(
            // TAB: HERO BANNER
            array(
                'key' => 'field_home_tab_hero',
                'label' => 'Hero Banner',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_home_hero_slider',
                'label' => 'Hero Slider',
                'name' => 'home_hero_slider',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Add Slide',
                'sub_fields' => array(
                    array(
                        'key' => 'field_home_hero_desktop',
                        'label' => 'Desktop Image (1920x600)',
                        'name' => 'desktop_image',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                    ),
                    array(
                        'key' => 'field_home_hero_mobile',
                        'label' => 'Mobile Image (390x240)',
                        'name' => 'mobile_image',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                    ),
                    array(
                        'key' => 'field_home_hero_link',
                        'label' => 'Slide Link',
                        'name' => 'link',
                        'type' => 'text',
                    ),
                ),
            ),

            // TAB: INTRODUCTION
            array(
                'key' => 'field_home_tab_intro',
                'label' => 'Introduction',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_home_intro',
                'label' => 'Introduction Settings',
                'name' => 'home_intro',
                'type' => 'group',
                'sub_fields' => array(
                    array(
                        'key' => 'field_home_intro_heading',
                        'label' => 'Heading',
                        'name' => 'heading',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_home_intro_subheading',
                        'label' => 'Subheading',
                        'name' => 'subheading',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_home_intro_content',
                        'label' => 'Content',
                        'name' => 'content',
                        'type' => 'wysiwyg',
                        'media_upload' => 0,
                    ),
                    array(
                        'key' => 'field_home_intro_link',
                        'label' => 'Button Link',
                        'name' => 'link',
                        'type' => 'link',
                    ),
                    array(
                        'key' => 'field_home_intro_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'url',
                    ),
                ),
            ),

            // TAB: FEATURED CATEGORIES
            array(
                'key' => 'field_home_tab_feat_cats',
                'label' => 'Featured Categories',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_home_feat_cats_heading',
                'label' => 'Section Heading',
                'name' => 'home_feat_cats_heading',
                'type' => 'text',
                'default_value' => 'DANH MỤC SẢN PHẨM',
            ),
            array(
                'key' => 'field_home_feat_cats_list',
                'label' => 'Category List',
                'name' => 'home_feat_cats_list',
                'type' => 'repeater',
                'button_label' => 'Add Category',
                'sub_fields' => array(
                    array(
                        'key' => 'field_home_feat_cat_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'url',
                    ),
                    array(
                        'key' => 'field_home_feat_cat_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_home_feat_cat_link',
                        'label' => 'Link',
                        'name' => 'link',
                        'type' => 'text',
                    ),
                ),
            ),

            // TAB: PRODUCT SECTIONS
            array(
                'key' => 'field_home_tab_prod_sections',
                'label' => 'Product Sections',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_home_prod_sections',
                'label' => 'Product Sections List',
                'name' => 'home_prod_sections',
                'type' => 'repeater',
                'layout' => 'row',
                'button_label' => 'Add Section',
                'sub_fields' => array(
                    array(
                        'key' => 'field_home_prod_sec_heading',
                        'label' => 'Heading',
                        'name' => 'heading',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_home_prod_sec_category',
                        'label' => 'Category Source',
                        'name' => 'category',
                        'type' => 'taxonomy',
                        'taxonomy' => 'product_cat',
                        'field_type' => 'select',
                        'allow_null' => 1,
                        'add_term' => 0,
                        'return_format' => 'id',
                    ),
                    array(
                        'key' => 'field_home_prod_sec_products',
                        'label' => 'Specific Products (Override)',
                        'name' => 'products',
                        'type' => 'relationship',
                        'post_type' => array(
                            0 => 'product',
                        ),
                        'taxonomy' => '',
                        'filters' => array(
                            0 => 'search',
                            1 => 'taxonomy',
                        ),
                        'return_format' => 'id',
                    ),
                    array(
                        'key' => 'field_home_prod_sec_link_label',
                        'label' => 'Link Label',
                        'name' => 'link_label',
                        'type' => 'text',
                        'default_value' => 'Xem tất cả',
                    ),
                    array(
                        'key' => 'field_home_prod_sec_link_url',
                        'label' => 'Link URL',
                        'name' => 'link_url',
                        'type' => 'text',
                    ),
                ),
            ),

            // TAB: SERVICES
            array(
                'key' => 'field_home_tab_services',
                'label' => 'Services',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_home_services_heading',
                'label' => 'Section Heading',
                'name' => 'home_services_heading',
                'type' => 'text',
                'default_value' => 'DỊCH VỤ XE NÂNG',
            ),
            array(
                'key' => 'field_home_services_list',
                'label' => 'Services List',
                'name' => 'home_services_list',
                'type' => 'repeater',
                'button_label' => 'Add Service',
                'sub_fields' => array(
                    array(
                        'key' => 'field_home_service_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'url',
                    ),
                    array(
                        'key' => 'field_home_service_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_home_service_link',
                        'label' => 'Link',
                        'name' => 'link',
                        'type' => 'text',
                    ),
                ),
            ),

            // TAB: PARTNERS
            array(
                'key' => 'field_home_tab_partners',
                'label' => 'Partners',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_home_partners_heading',
                'label' => 'Section Heading',
                'name' => 'home_partners_heading',
                'type' => 'text',
                'default_value' => 'ĐỐI TÁC & KHÁCH HÀNG',
            ),
            array(
                'key' => 'field_home_partners_list',
                'label' => 'Partner Logos',
                'name' => 'home_partners_list',
                'type' => 'repeater',
                'button_label' => 'Add Logo',
                'sub_fields' => array(
                    array(
                        'key' => 'field_home_partner_logo',
                        'label' => 'Logo',
                        'name' => 'logo',
                        'type' => 'image',
                        'return_format' => 'url',
                    ),
                ),
            ),

            // TAB: NEWS/PRESS
            array(
                'key' => 'field_home_tab_press',
                'label' => 'News/Press',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_home_press_heading',
                'label' => 'Section Heading',
                'name' => 'home_press_heading',
                'type' => 'text',
                'default_value' => 'BÁO CHÍ NÓI VỀ CHÚNG TÔI',
            ),
            array(
                'key' => 'field_home_press_list',
                'label' => 'Press Logos',
                'name' => 'home_press_list',
                'type' => 'repeater',
                'button_label' => 'Add Press Item',
                'sub_fields' => array(
                    array(
                        'key' => 'field_home_press_logo',
                        'label' => 'Logo',
                        'name' => 'logo',
                        'type' => 'image',
                        'return_format' => 'url',
                    ),
                    array(
                        'key' => 'field_home_press_link',
                        'label' => 'Link',
                        'name' => 'link',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_home_press_rel',
                        'label' => 'Rel Attribute',
                        'name' => 'rel',
                        'type' => 'select',
                        'choices' => array(
                            'nofollow' => 'NoFollow (Default)',
                            '' => 'DoFollow',
                        ),
                        'default_value' => 'nofollow',
                    ),
                ),
            ),

            // TAB: FEATURED POSTS
            array(
                'key' => 'field_home_tab_feat_posts',
                'label' => 'Featured Posts',
                'name' => '',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_home_feat_posts_heading',
                'label' => 'Section Heading',
                'name' => 'home_feat_posts_heading',
                'type' => 'text',
                'default_value' => 'TIN TỨC MỚI NHẤT',
            ),
            array(
                'key' => 'field_home_feat_posts_list',
                'label' => 'Select Posts',
                'name' => 'home_feat_posts_list',
                'type' => 'relationship',
                'post_type' => array(
                    0 => 'post',
                ),
                'filters' => array(
                    0 => 'search',
                    1 => 'taxonomy',
                ),
                'return_format' => 'id',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'templates/home.php',
                ),
            ),
        ),
    ));
    
endif;
