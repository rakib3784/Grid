<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Grid
 */

get_header(); ?>
	
		<?php
		if ( have_posts() ) : ?>
		<section class="main-content grid-layout">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						
						<?php	if ( is_home() && ! is_front_page() ) : ?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>

							<?php
							endif;

							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called  content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */ ?>
						<div class="col-md-4 col-sm-6">
							<?php get_template_part( 'template-parts/content', get_post_format() );
							?>
						</div>
							<?php endwhile; ?>
							
							<nav class="pagination" role="navigation">
								<div class="nav-links">
									<?php the_posts_navigation(); ?>
								</div>
							</nav>

							<?php else :

								get_template_part( 'template-parts/content', 'none' );

							endif; ?>
					</div>	
					<div class="col-md-3">
						<div class="widget-items">
							<?php get_sidebar(); ?>
						</div>
						
					</div>			
				</div>
				
				

			</div>
		</section>
		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
