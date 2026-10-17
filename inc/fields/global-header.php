<?php
/**
 * Global Header Settings – đăng ký 1 field group riêng cho Header.
 */

if (!function_exists('acf_add_local_field_group')) {
	return;
}

acf_add_local_field_group(array(
	'key'      => 'group_global_header_settings',
	'title'    => 'Global Header Settings',
	'fields'   => array(
		array(
			'key'       => 'field_header_logo_tab',
			'label'     => 'Logo',
			'name'      => '',
			'type'      => 'tab',
			'placement' => 'top',
		),
		array(
			'key'           => 'field_header_primary_logo',
			'label'         => 'Logo chính',
			'name'          => 'primary_logo',
			'type'          => 'image',
			'return_format' => 'url',
			'instructions'  => 'Dùng khi chưa scroll.',
		),
		array(
			'key'           => 'field_header_secondary_logo',
			'label'         => 'Logo phụ',
			'name'          => 'secondary_logo',
			'type'          => 'image',
			'return_format' => 'url',
			'instructions'  => 'Dùng khi đã scroll.',
		),
		array(
			'key'       => 'field_header_contact_tab',
			'label'     => 'Nút liên hệ',
			'name'      => '',
			'type'      => 'tab',
			'placement' => 'top',
		),
		array(
			'key'        => 'field_header_contact',
			'label'      => 'Nút liên hệ',
			'name'       => 'header_contact',
			'type'       => 'group',
			'sub_fields' => array(
				array(
					'key'             => 'field_header_contact_label',
					'label'           => 'Nhãn nút',
					'name'            => 'label',
					'type'            => 'text',
					'default_value'   => 'Liên hệ',
				),
				array(
					'key'             => 'field_header_contact_phone',
					'label'           => 'Số điện thoại',
					'name'            => 'phone',
					'type'            => 'text',
					'default_value'   => '0971 955 144',
				),
				array(
					'key'         => 'field_header_contact_link',
					'label'       => 'Link',
					'name'        => 'link',
					'type'        => 'url',
					'placeholder' => '/lien-he',
				),
			),
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
	'menu_order' => 0,
));
