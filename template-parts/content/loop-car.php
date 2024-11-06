<?php
/**
 * Template part for displaying cars in the loop.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

$auto_price       = get_field( 'demo_price' );
$auto_mileage     = get_field( 'demo_mileage' );
$auto_mpg         = get_field( 'demo_miles_per_gallon_mpg' );
$auto_mpg_highway = $auto_mpg['demo_highway'];
$auto_mpg_city    = $auto_mpg['demo_city'];
?>

<article id="car-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="car-header">
		<figure class="car-thumbnail">
			<?php the_post_thumbnail( 'large' ); ?>
		</figure><!-- .post-thumbnail -->

		<?php
		the_title( sprintf( '<h2 class="car-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		?>
	</header><!-- .entry-header -->

	<div class="car-content">
		<ul class="car-meta">
			<li class="car-meta__price"><strong>Price:</strong> $<?php echo esc_html( $auto_price ); ?></li>
			<li class="car-meta__mileage"><strong>Mileage:</strong> <?php echo esc_html( $auto_mileage ); ?></li>
			<li class="car-meta__mpg"><strong>MPG:</strong> <?php echo esc_html( $auto_mpg_city ); ?> highway / <?php echo esc_html( $auto_mpg_highway ); ?> city</li>
		</ul>
	</div><!-- .car-content -->

</article><!-- #car-<?php the_ID(); ?> -->
