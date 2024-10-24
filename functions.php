<?php

function acf_demo_enqueue_styles() {
	wp_enqueue_style(
		'ttnineteen_child-parent-style',
		/**
		 * Get the parent theme's stylesheet URI.
		 * @link https://developer.wordpress.org/reference/functions/get_parent_theme_file_uri/
		 */
		get_parent_theme_file_uri( 'style.css' ),
		array(),
		wp_get_theme()->get( 'Version' ),
	);
}
add_action( 'wp_enqueue_scripts', 'acf_demo_enqueue_styles' );

/**
 * Register custom post type and ACF fields.
 */
add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( 
		array(
			'key' => 'group_66c63fba6502c',
			'title' => 'Vehicle details',
			'fields' => array(
				array(
					'key' => 'field_66c63fba7a6fc',
					'label' => 'Price',
					'name' => 'demo_price',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '$',
					'append' => '',
				),
				array(
					'key' => 'field_66c64fbc7a6fd',
					'label' => 'Mileage',
					'name' => 'demo_mileage',
					'aria-label' => '',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'min' => '',
					'max' => '',
					'placeholder' => '',
					'step' => '',
					'prepend' => '',
					'append' => 'miles',
				),
				array(
					'key' => 'field_66c655347a6fe',
					'label' => 'Miles Per Gallon (MPG)',
					'name' => 'demo_miles_per_gallon_mpg',
					'aria-label' => '',
					'type' => 'group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'layout' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_66c655487a6ff',
							'label' => 'City',
							'name' => 'demo_city',
							'aria-label' => '',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'maxlength' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => 'City',
						),
						array(
							'key' => 'field_66c655627a700',
							'label' => 'Highway',
							'name' => 'demo_highway',
							'aria-label' => '',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'maxlength' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => 'Highway',
						),
					),
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'car',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
			'show_in_rest' => 0,
		)
	);
} );

add_action( 'init', function() {
	register_post_type( 
		'car',
		array(
			'labels' => array(
				'name' => 'Cars',
				'singular_name' => 'Car',
				'menu_name' => 'Cars',
				'all_items' => 'All Cars',
				'edit_item' => 'Edit Car',
				'view_item' => 'View Car',
				'view_items' => 'View Cars',
				'add_new_item' => 'Add New Car',
				'add_new' => 'Add New Car',
				'new_item' => 'New Car',
				'parent_item_colon' => 'Parent Car:',
				'search_items' => 'Search Cars',
				'not_found' => 'No cars found',
				'not_found_in_trash' => 'No cars found in Trash',
				'archives' => 'Car Archives',
				'attributes' => 'Car Attributes',
				'insert_into_item' => 'Insert into car',
				'uploaded_to_this_item' => 'Uploaded to this car',
				'filter_items_list' => 'Filter cars list',
				'filter_by_date' => 'Filter cars by date',
				'items_list_navigation' => 'Cars list navigation',
				'items_list' => 'Cars list',
				'item_published' => 'Car published.',
				'item_published_privately' => 'Car published privately.',
				'item_reverted_to_draft' => 'Car reverted to draft.',
				'item_scheduled' => 'Car scheduled.',
				'item_updated' => 'Car updated.',
				'item_link' => 'Car Link',
				'item_link_description' => 'A link to a car.',
			),
			'public' => true,
			'show_in_rest' => true,
			'menu_icon' => 'dashicons-car',
			'supports' => array(
				0 => 'title',
				1 => 'editor',
				2 => 'thumbnail',
				3 => 'custom-fields',
			),
			'delete_with_user' => false,
		)
	);
} );


