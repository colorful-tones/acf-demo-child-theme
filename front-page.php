<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<header class="page-header">
			<h1 class="page-title">Browse inventory</h1>
		</header><!-- .page-header -->

		<?php
			$paged = ( get_query_var('paged') ) ? get_query_var( 'paged' ) : 1;
			$args = array(
				'post_type'      => 'car',
				'posts_per_page' => 12,
				'paged'          => $paged,
			);
			$custom_query = new WP_Query( $args );
			if ( $custom_query->have_posts() ) {
				?>
				<div class="columns">
					<?php
					// Start the Loop.
					while ( $custom_query->have_posts() ) {
						$custom_query->the_post();

						get_template_part( 'template-parts/content/loop', 'car' );
					}
					wp_reset_postdata();
					?>
				</div><!-- .columns -->

				<?php
				// Display pagination
				$total_pages = $custom_query->max_num_pages;
				if ($total_pages > 1) {
					$current_page = max(1, get_query_var('paged'));
					echo '<nav class="navigation pagination" aria-label="Posts">';
						echo '<h2 class="screen-reader-text">Posts navigation</h2>';
						echo '<div class="nav-links">';
						echo paginate_links(array(
							'base'         => get_pagenum_link(1) . '%_%',
							'format'       => 'page/%#%',
							'current'      => $current_page,
							'total'        => $total_pages,
							'prev_text'    => twentynineteen_get_icon_svg( 'chevron_left', 22 ),
							'next_text'    => twentynineteen_get_icon_svg( 'chevron_right', 22 ),
							'end_size'     => 3,
							'mid_size'     => 3
						));
						echo '</div>';
					echo '</nav>';
				}
				
			} else {
				// If no content, include the "No posts found" template.
				get_template_part( 'template-parts/content/content', 'none' );
			}
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
