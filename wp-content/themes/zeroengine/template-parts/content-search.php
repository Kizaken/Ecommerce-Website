<div class="me-blog-wrapper">
	<div class="me-row">
		<div class="me-col-md-8">
			<div class="me-blog-content">
				<ul class="me-blog-list me-row">
				<?php
					while( have_posts() ) : the_post();
				?>
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
					<?php
						endwhile;
					?>
				</ul>
				<div class="marketengine-paginations">
					<?php zero_paginate_link(); ?>
				</div>
				<div class="marketengine-loadmore">
					<a href="" class="me-loadmore"><?php _e('Load more', 'enginethemes'); ?></a>
				</div>
			</div>
		</div>
		<div class="me-col-md-4">
			<div class="me-blog-sidebar">
				<div class="me-blog-sidebar-block">
					<div class="me-title-sidebar">
						<h2>Recent Posts</h2>
					</div>
					<div class="me-blog-sidebar-content">
						<ul class="me-blog-recent-post">
							<li>
								<div class="me-recent-post-wrap">
									<a href="" class="me-recent-post-img">
										<img src="../assets/img/blog-pic.jpg" alt="">
									</a>
									<div class="me-recent-post-title">
										<p>
											<a href="">Car insurrance - how you can go getting about it</a>
										</p>
									</div>
								</div>
							</li>
							<li>
								<div class="me-recent-post-wrap">
									<a href="" class="me-recent-post-img">
										<img src="../assets/img/blog-pic.jpg" alt="">
									</a>
									<div class="me-recent-post-title">
										<p>
											<a href="">Car insurrance - how you can go getting about it</a>
										</p>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>

				<div class="me-blog-sidebar-block">
					<div class="me-title-sidebar">
						<h2>Categories</h2>
					</div>
					<div class="me-blog-sidebar-content">
						<ul class="me-blog-categories">
							<li><a href="">Categoy 1 (5)</a></li>
							<li><a href="">Categoy 2 (1)</a></li>
							<li><a href="">Categoy 3 (15)</a></li>
							<li><a href="">Categoy 4 (4)</a></li>
							<li><a href="">Categoy 5 (3)</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>