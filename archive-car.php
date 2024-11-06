<?php
/**
 * The template for displaying archive car
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">Browse inventory</h1>
			</header><!-- .page-header -->

			<div class="columns">
			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/loop', 'car' );

				// End the loop.
			endwhile;
			?>
			</div><!-- .columns -->

			<?php

			// Previous/next page navigation.
			twentynineteen_the_posts_navigation();

			// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
