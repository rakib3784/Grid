<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Grid
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	
		<div class="entry-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>

		<header class="entry-header">
			<?php
			grid_post_meta();
			if ( is_single() ) :
				
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) : ?>
			
			<?php
			endif; ?>
		</header><!-- .entry-header -->

		<div class="description">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
	
</article><!-- #post-## -->
