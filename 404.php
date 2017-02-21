<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Grid
 */

get_header(); ?>

	<section class="main-content grid-layout">
		<div class="container">
			<div class="row">
				<div class="col-md-9">

					<section class="error-404 not-found">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'grid' ); ?></h1>
						</header><!-- .page-header -->

						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'grid' ); ?></p>

							<?php
								get_search_form();
								
							?>

						</div><!-- .page-content -->
					</section><!-- .error-404 -->
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
