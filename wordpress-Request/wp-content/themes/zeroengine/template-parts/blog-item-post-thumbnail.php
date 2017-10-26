<?php if( has_post_thumbnail() ) : ?>
<a href="<?php the_permalink(); ?>" class="me-blog-item-img">
	<?php the_post_thumbnail('zero_post_thumbnail'); ?>
</a>
<?php endif; ?>