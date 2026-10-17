<?php
/**
 * Global Footer Settings – đăng ký 1 field group riêng cho Footer.
 */

if (!function_exists('acf_add_local_field_group')) {
	return;
}

acf_add_local_field_group(array(
	'key'      => 'group_global_footer_settings',
	'title'    => 'Global Footer Settings',
	'fields'   => array(
		array(
			'key'       => 'field_footer_logo_tab',
			'label'     => 'Logo',
			'name'      => '',
			'type'      => 'tab',
			'placement' => 'top',
		),
		array(
			'key'           => 'field_footer_primary_logo',
			'label'         => 'Logo chính',
			'name'          => 'footer_primary_logo',
			'type'          => 'image',
			'return_format' => 'url',
			'instructions'  => 'Logo hiển thị mặc định ở footer.',
		),
		array(
			'key'           => 'field_footer_secondary_logo',
			'label'         => 'Logo phụ',
			'name'          => 'footer_secondary_logo',
			'type'          => 'image',
			'return_format' => 'url',
			'instructions'  => 'Logo thay thế, vd. khi hover hoặc theme tối.',
		),
		array(
			'key'       => 'field_footer_contact_tab',
			'label'     => 'Liên hệ',
			'name'      => '',
			'type'      => 'tab',
			'placement' => 'top',
		),
		array(
			'key'             => 'field_footer_address',
			'label'           => 'Địa chỉ',
			'name'            => 'footer_address',
			'type'            => 'textarea',
			'rows'            => 2,
			'default_value'   => 'Tầng 8, Pearl Plaza, 561 Điện Biên Phủ, Phường 25, Bình Thạnh, TP.HCM',
		),
		array(
			'key'             => 'field_footer_hotline',
			'label'           => 'Hotline',
			'name'            => 'footer_hotline',
			'type'            => 'text',
			'default_value'   => '0971 955 144',
		),
		array(
			'key'             => 'field_footer_email',
			'label'           => 'Email',
			'name'            => 'footer_email',
			'type'            => 'text',
			'default_value'   => 'hello@example.com',
		),
		array(
			'key'       => 'field_footer_links_other_tab',
			'label'     => 'Liên kết khác',
			'name'      => '',
			'type'      => 'tab',
			'placement' => 'top',
		),
		array(
			'key'             => 'field_footer_links_other_title',
			'label'           => 'Tiêu đề cột',
			'name'            => 'footer_links_other_title',
			'type'            => 'text',
			'default_value'   => 'Liên kết khác',
		),
		array(
			'key'          => 'field_footer_links_other',
			'label'        => 'Danh sách link',
			'name'         => 'footer_links_other',
			'type'         => 'repeater',
			'button_label' => 'Thêm link',
			'sub_fields'   => array(
				array(
					'key'   => 'field_footer_link_other',
					'label' => 'Link',
					'name'  => 'link',
					'type'  => 'link',
				),
			),
		),
		array(
			'key'       => 'field_footer_links_consult_tab',
			'label'     => 'Yêu cầu tư vấn',
			'name'      => '',
			'type'      => 'tab',
			'placement' => 'top',
		),
		array(
			'key'             => 'field_footer_links_consult_title',
			'label'           => 'Tiêu đề cột',
			'name'            => 'footer_links_consult_title',
			'type'            => 'text',
			'default_value'   => 'Yêu cầu tư vấn',
		),
		array(
			'key'          => 'field_footer_links_consult',
			'label'        => 'Danh sách link',
			'name'         => 'footer_links_consult',
			'type'         => 'repeater',
			'button_label' => 'Thêm link',
			'sub_fields'   => array(
				array(
					'key'   => 'field_footer_link_consult',
					'label' => 'Link',
					'name'  => 'link',
					'type'  => 'link',
				),
			),
		),
		array(
			'key'       => 'field_footer_bottom_tab',
			'label'     => 'Footer bottom',
			'name'      => '',
			'type'      => 'tab',
			'placement' => 'top',
		),
		array(
			'key'             => 'field_footer_copyright',
			'label'           => 'Copyright',
			'name'            => 'footer_copyright',
			'type'            => 'text',
			'default_value'   => 'Copyright © 2025 - All rights reserved',
		),
		array(
			'key'   => 'field_footer_policy_privacy',
			'label' => 'Chính sách bảo mật',
			'name'  => 'footer_policy_privacy',
			'type'  => 'url',
		),
		array(
			'key'   => 'field_footer_policy_terms',
			'label' => 'Điều khoản sử dụng',
			'name'  => 'footer_policy_terms',
			'type'  => 'url',
		),
	),
	'location' => array(
		array(
			array(
				'param'    => 'options_page',
				'operator' => '==',
				'value'    => 'global-variable',
			),
		),
	),
	'menu_order' => 2,
));
