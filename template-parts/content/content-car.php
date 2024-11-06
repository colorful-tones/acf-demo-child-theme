<?php
/**
 * Template part for displaying cars
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

$auto_price       = get_field( 'demo_price' );
$auto_mileage     = get_field( 'demo_mileage' );
$auto_mpg         = get_field( 'demo_miles_per_gallon_mpg' );
$auto_mpg_highway = $auto_mpg['demo_highway'];
$auto_mpg_city    = $auto_mpg['demo_city'];

$terms = get_the_terms( $post->ID, 'make' );
?>

<article id="car-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="car-header">
		<?php the_title( '<h1 class="car-title">', '</h1>' ); ?>
		<p class="car-price"><strong>$<?php echo esc_html( $auto_price ); ?></strong></p>
	</header><!-- .car-header -->

	<figure class="car-thumbnail">
		<?php the_post_thumbnail( 'full' ); ?>
	</figure><!-- .car-thumbnail -->

	<div class="car-content">
		<ul class="car-meta">
			<li class="car-meta__mileage"><strong>Mileage:</strong> <?php echo esc_html( $auto_mileage ); ?></li>
			<li class="car-meta__mpg"><strong>MPG:</strong> <?php echo esc_html( $auto_mpg_city ); ?> highway / <?php echo esc_html( $auto_mpg_highway ); ?> city</li>
			<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
				<li class="car-make">
					<strong>Make:</strong>
					<?php
					$make_links = array();
					foreach ( $terms as $term ) {
						$make_links[] = sprintf( '<a class="car-make__link %1$s" href="%2$s">%3$s</a>',
							esc_attr( 'car-make__link--' . $term->slug ),
							esc_url( get_term_link( $term ) ),
							esc_html( $term->name )
						);
					}
					echo implode( ', ', $make_links );
					?>
				</li>
			<?php endif; ?>
		</ul><!-- .car-meta -->

		<?php get_template_part( 'template-parts/placeholder/car', 'prequalify' ); ?>
	</div><!-- .car-content -->

</article><!-- #car-<?php the_ID(); ?> -->
