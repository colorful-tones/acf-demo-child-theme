<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

$auto_price       = get_field( 'demo_price' );
$auto_mileage     = get_field( 'demo_mileage' );
$auto_mpg         = get_field( 'demo_miles_per_gallon_mpg' );
$auto_mpg_highway = $auto_mpg['demo_highway'];
$auto_mpg_city    = $auto_mpg['demo_city'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! twentynineteen_can_show_post_thumbnail() ) : ?>
	<header class="entry-header">
		<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
	</header>
	<?php endif; ?>

	<div class="entry-content">
		<ul>
			<li>Price: <?php echo esc_html( $auto_price ); ?></li>
			<li>Mileage: <?php echo esc_html( $auto_mileage ); ?></li>
			<li>MPG: <?php echo esc_html( $auto_mpg_city ); ?> highway / <?php echo esc_html( $auto_mpg_highway ); ?> city</li>
		</ul>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php twentynineteen_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php if ( ! is_singular( 'attachment' ) ) : ?>
		<?php get_template_part( 'template-parts/post/author', 'bio' ); ?>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
