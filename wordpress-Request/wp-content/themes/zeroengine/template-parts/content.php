
<li class="me-col-sm-6 me-col-xs-12">

	<div class="me-blog-item-wrap">
		<?php get_template_part('template-parts/blog-item', 'post-thumbnail'); ?>

		<?php get_template_part('template-parts/blog-item', 'category'); ?>

		<span class="me-blog-item-time"><?php the_date( get_option('date_format') ); ?></span>

		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<p class="me-blog-item-desc"><?php echo get_the_excerpt(); ?></p>

		<?php get_template_part('template-parts/blog-item', 'tag'); ?>

		<?php
			$zero = __('No comments', 'enginethemes');
			$one = __('1 comment', 'enginethemes');
			$more = __('% comments', 'enginethemes');
		?>
		<span class="me-blog-item-ccmt"><?php comments_number( $zero, $one, $more ); ?></span>

		<a href="<?php the_permalink(); ?>" class="me-blog-read-more"><?php _e('Continue reading', 'enginethemes'); ?><i class="icon-me-angle-right"></i></a>
	</div>

</li>