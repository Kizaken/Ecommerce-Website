<?php get_header(); ?>

<div id="marketengine-page">
	<div class="me-container">
		<div class="marketengine-content-wrap">
			<div class="marketengine-page-title">
				<h2><?php _e('BLOG', 'enginethemes'); ?></h2>
			</div>
			<div class="marketengine-content">
				<div class="me-blog-wrapper">
					<div class="me-row">
						<div class="me-col-md-9">
							<div class="me-blog-content">
								<?php if ( have_posts() ) : ?>
									<?php
										while( have_posts() ) : the_post();
										get_template_part( 'template-parts/content', 'single' );
									?>

									<!-- code comments -->
									<?php if ( comments_open() || get_comments_number() ) { ?>
									<div class="me-blog-comment">
										<?php comments_template(); ?>

									</div>
									<?php } ?>

									<?php get_template_part('template-parts/blog-item', 'related'); ?>
									<?php
										endwhile;
									?>
								<?php else :
									get_template_part( 'template-parts/content', 'none' );
								endif;
								?>
							</div>
						</div>
							<?php get_sidebar(); ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>