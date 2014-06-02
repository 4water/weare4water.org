<?php
/**
 *  Install Add-ons
 *
 *  The following code will include all 4 premium Add-Ons in your theme.
 *  Please do not attempt to include a file which does not exist. This will produce an error.
 *
 *  All fields must be included during the 'acf/register_fields' action.
 *  Other types of Add-ons (like the options page) can be included outside of this action.
 *
 *  The following code assumes you have a folder 'add-ons' inside your theme.
 *
 *  IMPORTANT
 *  Add-ons may be included in a premium theme as outlined in the terms and conditions.
 *  However, they are NOT to be included in a premium / free plugin.
 *  For more information, please read http://www.advancedcustomfields.com/terms-conditions/
 */

// Fields
add_action('acf/register_fields', 'my_register_fields');

function my_register_fields()
{
	//include_once('add-ons/acf-repeater/repeater.php');
	//include_once('add-ons/acf-gallery/gallery.php');
	//include_once('add-ons/acf-flexible-content/flexible-content.php');
}

// Options Page
//include_once( 'add-ons/acf-options-page/acf-options-page.php' );


/**
 *  Register Field Groups
 *
 *  The register_field_group function accepts 1 array which holds the relevant data to register a field group
 *  You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 */

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_facebook-album',
		'title' => 'Facebook Album',
		'fields' => array (
			array (
				'key' => 'field_51b098c207573',
				'label' => 'Album ID',
				'name' => 'album_id',
				'type' => 'text',
				'default_value' => '',
				'formatting' => 'html',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

	register_field_group(array (
		'id' => 'acf_facebook-videos',
		'title' => 'Facebook Videos',
		'fields' => array (
			array (
				'key' => 'field_51b0a113de81c',
				'label' => 'Videos',
				'name' => 'videos',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_51b0a11cde81d',
						'label' => 'Video ID',
						'name' => 'video_id',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Video',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '!=',
					'value' => 'product',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

	register_field_group(array (
		'id' => 'acf_multihero-2',
		'title' => 'Multihero',
		'fields' => array (
			array (
				'key' => 'field_518a53b3a6165',
				'label' => 'Slides',
				'name' => 'slides',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_518a53bfa6166',
						'label' => 'Image',
						'name' => 'image',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
					),
					array (
						'key' => 'field_518a53d654786',
						'label' => 'Title',
						'name' => 'title',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
					),
					array (
						'key' => 'field_518a53db54787',
						'label' => 'Content',
						'name' => 'content',
						'type' => 'wysiwyg',
						'column_width' => '',
						'default_value' => '',
						'toolbar' => 'basic',
						'media_upload' => 'no',
					),
					array (
						'key' => 'field_518a53e654788',
						'label' => 'Links',
						'name' => 'links',
						'type' => 'repeater',
						'column_width' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_518a53fa54789',
								'label' => 'Text',
								'name' => 'text',
								'type' => 'text',
								'column_width' => '',
								'default_value' => '',
								'formatting' => 'html',
							),
							array (
								'key' => 'field_518a53fe5478a',
								'label' => 'URL',
								'name' => 'url',
								'type' => 'text',
								'column_width' => '',
								'default_value' => '',
								'formatting' => 'html',
							),
						),
						'row_min' => 0,
						'row_limit' => '',
						'layout' => 'table',
						'button_label' => 'Add Link',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Slide',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

	register_field_group(array (
		'id' => 'acf_rows-columns',
		'title' => 'Rows / Columns',
		'fields' => array (
			array (
				'key' => 'field_518ce1dffcd51',
				'label' => 'Format',
				'name' => 'format',
				'type' => 'radio',
				'multiple' => 0,
				'allow_null' => 0,
				'choices' => array (
					'Rows' => 'Rows',
					'Columns' => 'Columns',
				),
				'default_value' => 'Columns',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_518a4b2ddc539',
				'label' => 'Items',
				'name' => 'items',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_518a4d43dc540',
						'label' => 'Image',
						'name' => 'image',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
					),
					array (
						'key' => 'field_518a4d52dc541',
						'label' => 'Title',
						'name' => 'title',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
					),
					array (
						'key' => 'field_518a4d59dc542',
						'label' => 'Content',
						'name' => 'content',
						'type' => 'wysiwyg',
						'column_width' => '',
						'default_value' => '',
						'toolbar' => 'basic',
						'media_upload' => 'no',
					),
					array (
						'key' => 'field_518a4d68dc543',
						'label' => 'Links',
						'name' => 'links',
						'type' => 'repeater',
						'column_width' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_518a4d7edc544',
								'label' => 'Text',
								'name' => 'text',
								'type' => 'text',
								'column_width' => '',
								'default_value' => '',
								'formatting' => 'html',
							),
							array (
								'key' => 'field_518a4d8edc545',
								'label' => 'URL',
								'name' => 'url',
								'type' => 'text',
								'column_width' => '',
								'default_value' => '',
								'formatting' => 'html',
							),
						),
						'row_min' => 0,
						'row_limit' => '',
						'layout' => 'table',
						'button_label' => 'Add Link',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Item',
			),
			array (
				'key' => 'field_518ce6fdddb8f',
				'label' => 'Subsequent Content',
				'name' => 'subsequent_content',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

	register_field_group(array (
		'id' => 'acf_world-map',
		'title' => 'World Map',
		'fields' => array (
			array (
				'key' => 'field_518ce49d5b2e0',
				'label' => 'Map',
				'name' => 'map',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
			),
			array (
				'key' => 'field_518ce4b05b2e1',
				'label' => 'Cities',
				'name' => 'cities',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_5196095babca8',
						'label' => 'Name',
						'name' => 'name',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
					),
					array (
						'key' => 'field_518ce4d35b2e2',
						'label' => 'X Axis',
						'name' => 'x_axis',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
					),
					array (
						'key' => 'field_518ce5075b2e3',
						'label' => 'Y Axis',
						'name' => 'y_axis',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
					),
					array (
						'key' => 'field_518ce50d5b2e4',
						'label' => 'Projects',
						'name' => 'projects',
						'type' => 'repeater',
						'column_width' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_518ce51d5b2e5',
								'label' => 'Name',
								'name' => 'name',
								'type' => 'text',
								'column_width' => '',
								'default_value' => '',
								'formatting' => 'html',
							),
							array (
								'key' => 'field_518ce5265b2e6',
								'label' => 'URL',
								'name' => 'url',
								'type' => 'text',
								'column_width' => '',
								'default_value' => '',
								'formatting' => 'html',
							),
						),
						'row_min' => 0,
						'row_limit' => '',
						'layout' => 'table',
						'button_label' => 'Add Project',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add City',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-general',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

	register_field_group(array (
		'id' => 'acf_donations',
		'title' => 'Donations',
		'fields' => array (
			array (
				'key' => 'field_518ce5d1921c4',
				'label' => 'Amount',
				'name' => 'amount',
				'type' => 'text',
				'default_value' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_518ce5dd921c5',
				'label' => 'Caption',
				'name' => 'caption',
				'type' => 'text',
				'default_value' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_518ce62f921c6',
				'label' => 'More Detail',
				'name' => 'more_detail',
				'type' => 'textarea',
				'default_value' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_518ce651921c7',
				'label' => 'Button Text',
				'name' => 'button_text',
				'type' => 'text',
				'default_value' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_518ce65b921c8',
				'label' => 'Button URL',
				'name' => 'button_url',
				'type' => 'text',
				'default_value' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_518ce66d921c9',
				'label' => 'Secondary Call to Action',
				'name' => 'secondary_call_to_action',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'no',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-general',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

	register_field_group(array (
		'id' => 'acf_header',
		'title' => 'Header',
		'fields' => array (
			array (
				'key' => 'field_51a37e925075f',
				'label' => 'Logo',
				'name' => 'logo',
				'type' => 'image',
				'save_format' => 'id',
				'preview_size' => 'thumbnail',
			),
			array (
				'key' => 'field_51a37f58c30e8',
				'label' => 'Banner',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_51a37f84c30ea',
				'label' => 'Link',
				'name' => 'banner_link',
				'type' => 'text',
				'default_value' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_51a37fbdb905a',
				'label' => 'Small',
				'name' => 'small_banner',
				'type' => 'image',
				'save_format' => 'id',
				'preview_size' => 'thumbnail',
			),
			array (
				'key' => 'field_51a37f74c30e9',
				'label' => 'Large',
				'name' => 'large_banner',
				'type' => 'image',
				'save_format' => 'id',
				'preview_size' => 'thumbnail',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-header',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

	register_field_group(array (
		'id' => 'acf_footer',
		'title' => 'Footer',
		'fields' => array (
			array (
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'key' => 'field_51ff7a9bc8cc3',
				'label' => 'Logo',
				'name' => 'footer_logo',
				'type' => 'image',
			),
			array (
				'key' => 'field_519643acc11f1',
				'label' => 'Summary',
				'name' => 'summary',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'no',
			),
			array (
				'key' => 'field_51964426c11f2',
				'label' => 'Sponsors Headline',
				'name' => 'sponsors_headline',
				'type' => 'text',
				'default_value' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_51964437c11f3',
				'label' => 'Sponsors',
				'name' => 'sponsors',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_51964441c11f4',
						'label' => 'Name',
						'name' => 'name',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
					),
					array (
						'key' => 'field_5196444dc11f5',
						'label' => 'Logo',
						'name' => 'logo',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'id',
						'preview_size' => 'thumbnail',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Sponsor',
			),
			array (
				'key' => 'field_5196447fc11f6',
				'label' => 'Mailing List Headline',
				'name' => 'mailing_list_headline',
				'type' => 'text',
				'default_value' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_51964486c11f7',
				'label' => 'Mailing List Content',
				'name' => 'mailing_list_content',
				'type' => 'text',
				'default_value' => '',
				'formatting' => 'html',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-footer',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

	if (is_root_site()) :
		register_field_group(array (
			'id' => 'acf_home',
			'title' => 'Home',
			'fields' => array (
				array (
					'key' => 'field_518ce459de036',
					'label' => 'Mission Headline',
					'name' => 'mission_headline',
					'type' => 'text',
					'default_value' => '',
					'formatting' => 'br',
				),
				array (
					'key' => 'field_5189204d0f94c',
					'label' => 'Mission',
					'name' => 'mission',
					'type' => 'textarea',
					'default_value' => '',
					'formatting' => 'br',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'page',
						'operator' => '==',
						'value' => '2',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'no_box',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));

		register_field_group(array (
			'id' => 'acf_water-aid-multihero',
			'title' => 'Water Aid Multihero',
			'fields' => array (
				array (
					'key' => 'field_518ce77eb1969',
					'label' => 'Slides',
					'name' => 'slides',
					'type' => 'repeater',
					'sub_fields' => array (
						array (
							'key' => 'field_518ce796b196a',
							'label' => 'Image',
							'name' => 'image',
							'type' => 'image',
							'column_width' => '',
							'save_format' => 'object',
							'preview_size' => 'thumbnail',
						),
						array (
							'key' => 'field_518ce7a1b196b',
							'label' => 'Title',
							'name' => 'title',
							'type' => 'text',
							'column_width' => '',
							'default_value' => '',
							'formatting' => 'html',
						),
						array (
							'key' => 'field_518ce7a6b196c',
							'label' => 'Content',
							'name' => 'content',
							'type' => 'wysiwyg',
							'column_width' => '',
							'default_value' => '',
							'toolbar' => 'basic',
							'media_upload' => 'no',
						),
						array (
							'key' => 'field_518ce7ddb196d',
							'label' => 'Links',
							'name' => 'links',
							'type' => 'repeater',
							'column_width' => '',
							'sub_fields' => array (
								array (
									'key' => 'field_518ce7ebb196e',
									'label' => 'Text',
									'name' => 'text',
									'type' => 'text',
									'column_width' => '',
									'default_value' => '',
									'formatting' => 'html',
								),
								array (
									'key' => 'field_518ce7feb1970',
									'label' => 'URL',
									'name' => 'url',
									'type' => 'text',
									'column_width' => '',
									'default_value' => '',
									'formatting' => 'html',
								),
							),
							'row_min' => 0,
							'row_limit' => '',
							'layout' => 'table',
							'button_label' => 'Add Link',
						),
					),
					'row_min' => 0,
					'row_limit' => '',
					'layout' => 'table',
					'button_label' => 'Add Silde',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'acf-options-general',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'default',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));

		register_field_group(array (
			'id' => 'acf_product',
			'title' => 'Product',
			'fields' => array (
				array (
					'key' => 'field_5196029277a34',
					'label' => 'Variations',
					'name' => 'variations',
					'type' => 'repeater',
					'sub_fields' => array (
						array (
							'key' => 'field_519603d7c415a',
							'label' => 'SKU',
							'name' => 'sku',
							'type' => 'text',
							'column_width' => '',
							'default_value' => '',
							'formatting' => 'html',
						),
						array (
							'key' => 'field_519602a777a35',
							'label' => 'Unit Price',
							'name' => 'unit_price',
							'type' => 'text',
							'column_width' => '',
							'default_value' => '',
							'formatting' => 'html',
						),
						array (
							'key' => 'field_519602b277a36',
							'label' => 'Sale Price',
							'name' => 'sale_price',
							'type' => 'text',
							'column_width' => '',
							'default_value' => '',
							'formatting' => 'html',
						),
						array (
							'key' => 'field_519602e677a37',
							'label' => 'Description',
							'name' => 'description',
							'type' => 'text',
							'column_width' => '',
							'default_value' => '',
							'formatting' => 'html',
						),
					),
					'row_min' => 0,
					'row_limit' => '',
					'layout' => 'table',
					'button_label' => 'Add Variation',
				),
				array (
					'key' => 'field_5196036b8ce1c',
					'label' => 'Shipping (one item)',
					'name' => 'shipping_one',
					'type' => 'text',
					'default_value' => '',
					'formatting' => 'html',
				),
				array (
					'key' => 'field_5196037c8ce1d',
					'label' => 'Shipping (additional items)',
					'name' => 'shipping_additional',
					'type' => 'text',
					'default_value' => '',
					'formatting' => 'html',
				),
				array (
					'key' => 'field_51960432cc7e5',
					'label' => 'In stock?',
					'name' => 'in_stock',
					'type' => 'true_false',
					'message' => '',
					'default_value' => 1,
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'product',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'no_box',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));
	endif;

	if (is_city_site()) :
		register_field_group(array (
			'id' => 'acf_class-2',
			'title' => 'Class',
			'fields' => array (
				array (
					'key' => 'field_51ac5ce9d4da2',
					'label' => 'Video',
					'name' => 'video',
					'type' => 'text',
					'default_value' => '',
					'formatting' => 'html',
				),
				array (
					'key' => 'field_51ac5ce2d4da1',
					'label' => 'Post Code',
					'name' => 'post_code',
					'type' => 'text',
					'default_value' => '',
					'formatting' => 'html',
				),
				array (
					'key' => 'field_51ac5ce2d4df2',
					'label' => 'Country',
					'name' => 'country',
					'type' => 'text',
					'default_value' => '',
					'formatting' => 'html',
				),
				array (
					'key' => 'field_51ac5cf4d4da3',
					'label' => 'Student Day Pass Cost',
					'name' => 'student_day_pass_cost',
					'type' => 'text',
					'default_value' => '',
					'formatting' => 'html',
				),
				array (
					'key' => 'field_51ac5e9f04eea',
					'label' => 'Non-Student Day Pass Cost',
					'name' => 'non-student_day_pass_cost',
					'type' => 'text',
					'default_value' => '',
					'formatting' => 'html',
				),
				array (
					'key' => 'field_51ac5e9504ee9',
					'label' => 'Student Month Pass Cost',
					'name' => 'student_month_pass_cost',
					'type' => 'text',
					'default_value' => '',
					'formatting' => 'html',
				),
				array (
					'key' => 'field_51ac5ea804eeb',
					'label' => 'Non-Student Month Pass Cost',
					'name' => 'non-student_month_pass_cost',
					'type' => 'text',
					'default_value' => '',
					'formatting' => 'html',
				),
				array (
					'key' => 'field_51ac5d37d4da5',
					'label' => 'Timetable',
					'name' => 'timetable',
					'type' => 'repeater',
					'sub_fields' => array (
						array (
							'key' => 'field_51ac5e12cb2a4',
							'label' => 'Day',
							'name' => 'day',
							'type' => 'text',
							'column_width' => '',
							'default_value' => '',
							'formatting' => 'html',
						),
						array (
							'key' => 'field_51ac5d50d4da6',
							'label' => 'Types',
							'name' => 'types',
							'type' => 'repeater',
							'column_width' => '',
							'sub_fields' => array (
								array (
									'key' => 'field_51ac5d5ed4da7',
									'label' => 'Name',
									'name' => 'name',
									'type' => 'text',
									'column_width' => '',
									'default_value' => '',
									'formatting' => 'html',
								),
								array (
									'key' => 'field_51ac5d64d4da8',
									'label' => 'Classes',
									'name' => 'classes',
									'type' => 'repeater',
									'column_width' => '',
									'sub_fields' => array (
										array (
											'key' => 'field_51ac5d78d4da9',
											'label' => 'Level',
											'name' => 'level',
											'type' => 'text',
											'column_width' => '',
											'default_value' => '',
											'formatting' => 'html',
										),
										array (
											'key' => 'field_51ac5d80d4daa',
											'label' => 'Time',
											'name' => 'time',
											'type' => 'text',
											'column_width' => '',
											'default_value' => '',
											'formatting' => 'html',
										),
									),
									'row_min' => 0,
									'row_limit' => '',
									'layout' => 'table',
									'button_label' => 'Add Class',
								),
							),
							'row_min' => 0,
							'row_limit' => '',
							'layout' => 'table',
							'button_label' => 'Add Type',
						),
					),
					'row_min' => 0,
					'row_limit' => '',
					'layout' => 'table',
					'button_label' => 'Add Day',
				),
				array (
					'key' => 'field_51ac5daad4dab',
					'label' => 'Contact',
					'name' => 'contact',
					'type' => 'text',
					'default_value' => '',
					'formatting' => 'html',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'page_type',
						'operator' => '==',
						'value' => 'top_level',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'default',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));
	endif;
}
