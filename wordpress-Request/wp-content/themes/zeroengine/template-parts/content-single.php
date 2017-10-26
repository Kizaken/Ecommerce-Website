<div class="me-blog-detail">
	<?php get_template_part('template-parts/blog-item', 'category'); ?>

	<span class="me-blog-time"><?php the_date( get_option('date_format') ); ?></span>

	<h2><?php the_title(); ?></h2>
	<div class="me-blog-img">
		<?php the_post_thumbnail('large'); ?>
	</div>
	<div class="me-blog-description">
		<?php the_content(); ?>
	</div>
</div>