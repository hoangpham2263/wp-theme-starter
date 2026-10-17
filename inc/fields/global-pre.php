<?php
/**
 * Global Pre (thông tin trên footer) – đăng ký 1 field group riêng cho phần pre-footer.
 */

if (!function_exists('acf_add_local_field_group')) {
	return;
}

acf_add_local_field_group(array(
	'key'      => 'group_global_pre_settings',
	'title'    => 'Global Pre (thông tin trên footer)',
	'fields'   => array(
		array(
			'key'       => 'field_pre_general_tab',
			'label'     => 'Chung',
			'name'      => '',
			'type'      => 'tab',
			'placement' => 'top',
		),
		array(
			'key'           => 'field_pre_show',
			'label'         => 'Hiển thị',
			'name'          => 'pre_show',
			'type'          => 'true_false',
			'message'       => 'Hiển thị khối thông tin phía trên footer',
			'default_value' => 0,
			'ui'            => 1,
		),
		array(
			'key'             => 'field_pre_title',
			'label'           => 'Tiêu đề',
			'name'            => 'pre_title',
			'type'            => 'text',
			'placeholder'     => 'Tiêu đề khối pre-footer',
		),
		array(
			'key'             => 'field_pre_content',
			'label'           => 'Nội dung',
			'name'            => 'pre_content',
			'type'            => 'wysiwyg',
			'tabs'            => 'all',
			'toolbar'         => 'full',
			'media_upload'    => 1,
			'delay'           => 0,
		),
		array(
			'key'       => 'field_pre_cta_tab',
			'label'     => 'Nút / CTA',
			'name'      => '',
			'type'      => 'tab',
			'placement' => 'top',
		),
		array(
			'key'        => 'field_pre_cta',
			'label'      => 'Nút kêu gọi',
			'name'       => 'pre_cta',
			'type'       => 'group',
			'sub_fields' => array(
				array(
					'key'           => 'field_pre_cta_label',
					'label'         => 'Nhãn nút',
					'name'          => 'label',
					'type'          => 'text',
					'default_value' => 'Xem thêm',
				),
				array(
					'key'         => 'field_pre_cta_link',
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
	'menu_order' => 1,
));
