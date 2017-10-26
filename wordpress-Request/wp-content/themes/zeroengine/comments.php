<?php if ( have_comments() ) : ?>
	<h2 class="comments-title">
		<?php
			$comments_number = get_comments_number();
			if ( 1 === (int)$comments_number ) {
				printf( __( 'Comment (%d)', 'enginethemes' ), $comments_number );
			} else {
				printf( __( 'Comments (%d)', 'enginethemes' ), $comments_number );
			}
		?>
	</h2>

	<div id="comment-container">

		<ol class="comment-list">
			<?php zero_list_comments(); ?>
		</ol><!-- .comment-list -->

	</div>
	<?php the_comments_navigation( array(
		'prev_text'          => __( 'Older comments', 'enginethemes' ),
        'next_text'          => __( 'Newer comments', 'enginethemes' ),
        'screen_reader_text' => __( ' ' ),
	)); ?>

<?php endif; // Check for have_comments(). ?>

<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'enginethemes' ); ?></p>
<?php endif; ?>

<?php
	comment_form( array(
		'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
		'title_reply_after'  => '</h2>',
	) );

?>