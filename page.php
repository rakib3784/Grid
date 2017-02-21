<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Grid
 */

get_header(); ?>

	<section class="main-content grid-layout">
		<div class="container">
			<div class="row">
				<div class="col-md-9">

					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div>
				<div class="col-md-3">
					<div class="widget-items">
						<?php get_sidebar(); ?>
					</div>
					
				</div>
			</div>
		</div>
		</section>

<?php
get_footer();
