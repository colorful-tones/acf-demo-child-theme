<?php

function acf_demo_enqueue_styles() {
	wp_enqueue_style(
		'acf_demo_child-parent-style',
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
 * Disable Featured Images in Twenty Nineteen WordPress theme.
 */
add_filter( 'twentynineteen_can_show_post_thumbnail', '__return_false' );

/**
 * Add Vehicle Make to the primary menu.
 *
 * @param string $items The HTML list content for the menu items.
 * @param object $args  An object containing menu arguments.
 * @return string The modified HTML list content for the menu items.
 */
function acf_demo_custom_nav_menu( $items, $args ) {
	if ( $args->theme_location == 'menu-1' ) {
		$terms = get_terms( array(
			'taxonomy'   => 'make',
			'hide_empty' => false,
		) );

		$items .= '<li class="menu-item menu-item-type-post_type_archive menu-item-object-car"><a href="/cars/">All Vehicles</a></li>';

		foreach ( $terms as $term ) {
			$items .= '<li class="menu-item menu-item-type-taxonomy menu-item-object-make"><a href="' . get_term_link( $term ) . '">' . $term->name . '</a></li>';
		}
	}
	return $items;
}
add_filter( 'wp_nav_menu_items', 'acf_demo_custom_nav_menu', 10, 2 );

// Register ACF Fields.
require get_stylesheet_directory() . '/inc/acf-fields.php';
// Register ACF custom post type.
require get_stylesheet_directory() . '/inc/custom-post-type.php';
// Register ACF custom taxonomy.
require get_stylesheet_directory() . '/inc/custom-taxonomy.php';
// Provide a fallback for featured image.
require get_stylesheet_directory() . '/inc/fallback-featured-image.php';
// Breadcrumb navigation for manufacturers.
require get_stylesheet_directory() . '/inc/breadcrumb.php';