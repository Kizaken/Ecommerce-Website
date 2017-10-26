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
								<ul class="me-blog-list me-row">
								<?php
									while( have_posts() ) : the_post();
									get_template_part( 'template-parts/content', get_post_format() );
									endwhile;
								?>
								</ul>
								<div class="me-paginations">
									<?php zero_paginate_link(); ?>
								</div>
								<div class="marketengine-loadmore">
									<a href="" class="me-loadmore"><?php _e('Load more', 'enginethemes'); ?></a>
								</div>
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