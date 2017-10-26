<div class="me-blog-sidebar-content">
	<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="me-search me-hidden-xs">
			<input type="text" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php _e('Enter keyword...', 'enginethemes'); ?>">
			<i id="search-btn" class="icon-me-search me-search-btn"></i>
		</div>
	</form>
	<form method="get" class="mobile-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="me-search-xs me-visible-xs">
			<input type="text" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php _e('Enter keyword...', 'enginethemes'); ?>">
		</div>
	</form>
</div>
