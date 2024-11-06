<?php
/**
 * Add a fallback for a car's featured image.
 */
function acf_demo_default_featured_image( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
	// If there's already a thumbnail, return it unchanged
	if ( ! empty( $html ) ) {
		return $html;
	}
	
	// Get the post type
	$post_type = get_post_type( $post_id );
	if ( 'car' === $post_type ) {
		$fallback_image = get_stylesheet_directory_uri() . '/images/fallback-car.jpg';
	}
	
	// Get the default image dimensions for the requested size
	$dimensions = wp_get_additional_image_sizes()[$size] ?? array();
	$width      = $dimensions['width'] ?? '';
	$height     = $dimensions['height'] ?? '';
	
	// Merge default attributes with passed attributes
	$default_attr = array(
		'src'      => $fallback_image,
		'class'    => "attachment-$size size-$size wp-post-image fallback-image",
		'alt'      => get_the_title( $post_id )
	);
	
	// Add dimensions if they exist
	if ( $width ) {
		$default_attr['width'] = $width;
	}
	if ( $height ) {
		$default_attr['height'] = $height;
	}
	
	$attr = wp_parse_args( $attr, $default_attr );
	
	// Build the img tag
	$html = rtrim( "<img" );
	foreach ( $attr as $name => $value ) {
		$html .= " $name=" . '"' . esc_attr( $value ) . '"';
	}
	$html .= ' />';
	
	return $html;
}
add_filter( 'post_thumbnail_html', 'acf_demo_default_featured_image', 10, 5 );