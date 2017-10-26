<div class="me-col-md-3">
	<div class="me-content-sidebar">
		<form id="me-filter-form" action="">
			<?php
			if( is_active_sidebar( 'me-sidebar' ) ) :
				dynamic_sidebar( 'me-sidebar' );
			endif;
			?>
		</form>
	</div>
</div>