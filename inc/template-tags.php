<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Grid
 */

if ( ! function_exists( 'grid_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function grid_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'grid' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'grid' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'grid_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function grid_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'grid' ) );
		if ( $categories_list && grid_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'grid' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'grid' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'grid' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'grid' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'grid' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function grid_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'grid_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'grid_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so grid_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so grid_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in grid_categorized_blog.
 */
function grid_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'grid_categories' );
}

function grid_post_meta(){ ?>
    <div class="post-meta">
		<time datetime="2016-05-28"><?php the_date('d.m.y') ?></time>
		<a href="<?php the_permalink(); ?>" class="comments"><span class="count"><?php comments_number( '0', '1', '%' ); ?></span><i class="fa fa-comments"></i></a>
	</div><!-- /.post-meta -->
   
<?php }
function grid_pagination(){ ?>
	<nav class="pagination" role="navigation">
		<div class="nav-links">
			<div class="prev pull-left"></i><?php previous_posts_link( 'Previous Post' ); ?></div>
			<a href="#" class="next pull-right" rel="next">
				<span class="meta-nav"><?php next_posts_link( 'Next Post' ); ?></span>
				<i class="fa fa-angle-double-right"></i>
			</a>		
		</div><!-- .nav-links -->
	</nav>
<?php }

//Comment Section
if(!function_exists('grid_comment')):
	function grid_comment($comment, $args, $depth)
	{
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
	case 'pingback' :
	case 'trackback' :
			// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

		<p>Pingback: <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'grid' ), '<span class="edit-link">', '</span>' ); ?></p>
		<?php
		break;
		default :

		global $post; ?>
		
			<ol class="children">
				<li class="comment media">
					<div class="comment-item">
						<div class="author-avatar media-left">
							<?php echo get_avatar( $comment, 100 ); ?>
						</div><!-- /.author-avatar -->
						<div class="comment-body media-body">
							<div class="comment-metadata">
								<span class="author"><?php printf( '<a class="comment-author">%1$s</a>', get_comment_author_link()); ?></span>
								<span class="time"><time datetime="2016-11-20 21:00"><?php comment_date('d M Y ');comment_time(); ?> </time> </span>
							</div><!-- /.comment-metadata -->

							<p class="description">
								<?php comment_text(); ?>
							</p>

							<div class="reply">
								<?php comment_reply_link( array_merge( $args, array( 
								'reply_text' => __( 'Reply', 'grid' ), 
								'after' => '', 'depth' => $depth, 
								'max_depth' => $args['max_depth'] ) ) ); ?> 
								<i class="fa fa-mail-forward"></i>
							</div>
						</div><!--/.comment-body-->
					</div><!-- /.comment-item -->
				</li>
			</ol>


<?php 
	break;
	endswitch;
		}
endif;

add_action( 'edit_category', 'grid_category_transient_flusher' );
add_action( 'save_post',     'grid_category_transient_flusher' );
