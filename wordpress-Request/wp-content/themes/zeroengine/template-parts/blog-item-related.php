<?php
	$previous_post = get_previous_post();
	$next_post = get_next_post();
?>
<div class="me-blog-related">

<?php if($previous_post) : ?>
	<span><?php _e('Previous', 'enginethemes'); ?></span>
	<a href="<?php echo get_the_permalink($previous_post->ID) ?>"><?php printf( esc_html( $previous_post->post_title) ); ?></a>
<?php endif; ?>

<?php if($next_post) : ?>
	<span><?php _e('Next', 'enginethemes'); ?></span>
	<a href="<?php echo get_the_permalink($next_post->ID) ?>"><?php printf( esc_html( $next_post->post_title) ); ?></a>
<?php endif; ?>

</div>