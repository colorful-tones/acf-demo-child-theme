<?php
add_action('acf/include_fields', function () {
	if (! function_exists('acf_add_local_field_group')) {
		return;
	}

	acf_add_local_field_group(array(
		'key' => 'group_65b43b9f0d0e5',
		'title' => 'Vehicle details',
		'fields' => array(
			array(
				'key' => 'field_65b94e3181869',
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
				'allow_in_bindings' => 1,
				'placeholder' => '',
				'prepend' => '$',
				'append' => '',
			),
			array(
				'key' => 'field_65b80dd41b806',
				'label' => 'Mileage',
				'name' => 'demo_mileage',
				'aria-label' => '',
				'type' => 'number',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '50',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'min' => '',
				'max' => '',
				'allow_in_bindings' => 1,
				'placeholder' => '',
				'step' => '',
				'prepend' => '',
				'append' => 'miles',
			),
			array(
				'key' => 'field_65b80e291b807',
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
						'key' => 'field_65b80e561b808',
						'label' => 'City',
						'name' => 'demo_city',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '50',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'allow_in_bindings' => 1,
						'placeholder' => '',
						'prepend' => '',
						'append' => 'City',
					),
					array(
						'key' => 'field_65b80e6d1b809',
						'label' => 'Highway',
						'name' => 'demo_highway',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '50',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'allow_in_bindings' => 1,
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
		'style' => 'seamless',
		'label_placement' => 'top',
		'instruction_placement' => 'field',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	));
});
