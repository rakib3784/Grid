<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Grid
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="comment-section">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php comments_number( '0 Comments', '1 Comment', '% Comments' );?>
		</h2>

		<ol class="comment-list">
			<?php
                wp_list_comments( array(
                    'style'       => 'li',
                    'short_ping'  => true,
                    'callback' => 'grid_comment',
                    'avatar_size' => 100
                ) );
            ?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'grid' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'grid' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'grid' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

			<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

				<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'grid' ); ?></p>
			<?php
			endif;
		

			 if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'grid' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'grid' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'grid' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().
?>

		<div class="respond text-centert">
			<?php
				$commenter = wp_get_current_commenter();
				$req = get_option( 'require_name_email' );
				$aria_req = ( $req ? " aria-required='true'" : '' );
				$fields =  array(
				'author' => '<input id="author" class="form-control" name="author" type="text" placeholder="Name" value="" size="30"' . $aria_req . '/>',
				'email'  => '<input id="email" class="form-control" name="email" type="email" placeholder="Email" value="" size="30"' . $aria_req . '/>',
				'url'  => '<input id="url" class="form-control" name="url" type="url" placeholder="URL" value="">'
				);
				$comments_args = array(
				'fields' =>  $fields,
				'id_form'          			=> 'commentform',
				'title_reply'       		=> __( 'Leave a Comment', 'grid' ),
				'title_reply_to'    		=> __( 'Leave a Comment to %s', 'grid' ),
				'cancel_reply_link' 		=> __( 'Cancel Comment', 'grid' ),
				'label_submit'      		=> __( 'Post Comment', 'grid' ),
				'comment_notes_before'      => '',
				'comment_notes_after' 		=> '',
				'comment_field'             => '<textarea id="comment" class="form-control" name="comment" placeholder="Comment" rows="8" required></textarea>',
				'label_submit'              => 'Post Comment'
				); ?>
				
				
				<div class="btn-container">
				<?php
				ob_start();
				comment_form( $comments_args); 
				
			?>
			</div>
		</div><!-- /.comment-respond -->
	

</div><!-- #comments -->
