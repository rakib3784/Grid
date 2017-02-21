<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
			
			get_template_part( 'template-parts/single', get_post_format() ); ?>

			<div class="post-bottom">
				<div class="tags pull-left">
					
					<?php the_tags(); ?>
					
				</div>

				<div class="post-social pull-right">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-pinterest"></i></a>
					<a href="#"><i class="fa fa-google-plus-square"></i></a>
				</div><!-- /.post-social -->
			</div><!-- /.post-bottom -->

			<div class="about-author media">
				<div class="author-avatar media-left">
					
					<div class="img-circle">
						<?php echo get_avatar( $comment, 100 ); ?>
					</div> 
				</div><!-- /.author-avatar -->

				<div class="author-details media-body">
					<h5 class="author-name"><?php the_author(); ?></h5>
					<p class="description">
						<?php  the_author_meta('description');  ?>
					</p>
					<div class="author-social">
						
						<?php
							$twitter  = get_the_author_meta('twitter');
							$facebook  = get_the_author_meta('facebook');
							$pinterest  = get_the_author_meta('pinterest');
							if(!empty($twitter)) {
							    echo '<a class="twitter-btn" href="https://www.twitter.com/'.$twitter.'"><i class="fa fa-twitter"></i></a>';
							}
							if(!empty($facebook)) {
							    echo '<a class="facebook-btn" href="https://www.facebook.com/'.$facebook.'"><i class="fa fa-facebook"></i></a>';
							}
							if(!empty($pinterest)) {
							    echo '<a class="google-plus-btn" href="https://www.facebook.com/'.$pinterest.'"><i class="fa fa-pinterest"></i></a>';
							}
						?>

					</div><!-- /.author-social -->
				</div><!-- /.author-details -->
			</div><!-- /.about-author -->

			<?php
			the_post_navigation();

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

		</div><!-- /.container -->
	</section><!-- /.mein-content -->

<?php
get_footer();
