<?php get_header(); ?>
<div id="marketengine-page">
	<div class="me-container">
		<div class="marketengine-content-wrap">
			<!--marketengine-content-->
			<div class="marketengine-content">
				<div class="me-errors-wrap">
					<img src="<?php echo bloginfo('template_directory'); ?>/images/404.png" alt="">
					<h2><?php _e('Oops!', 'enginethemes'); ?></h2>
					<h4><?php _e('It seems that you went wrong way', 'enginethemes'); ?></h4>
					<p><?php _e('You may go back', 'enginethemes'); ?> <a href="javascript:history.go(-1)"><?php _e('previous', 'enginethemes'); ?></a> <?php _e('page or return to', 'enginethemes'); ?> <a href="<?php echo home_url(); ?>"><?php _e('home', 'enginethemes'); ?></a> <?php _e('page', 'enginethemes'); ?></p>
				</div>
			</div>
			<!--//marketengine-content-->
		</div>
	</div>
</div>
<?php get_footer(); ?>
