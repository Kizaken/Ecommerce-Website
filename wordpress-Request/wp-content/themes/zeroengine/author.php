<?php get_header();
$author_id = get_query_var( 'author' );
?>
<div id="marketengine-page">
	<div class="me-container">
		<div class="marketengine-content-wrap">

			<div class="me-authen-wrap me-authen-profile">

				<div class="marketengine-profile-info">

					<div class="marketengine-avatar-user">
						<a class="avatar-user">
							<?php echo get_avatar( get_the_author_meta( 'user_email', $author_id ) ); ?>
						</a>
					</div>

					<div class="me-row">
						<div class="me-col-md-6">
							<div class="marketengine-text-field">
								<label class="text"><?php _e("First name", "enginethemes");?></label>
								<p><?php echo get_the_author_meta('first_name', $author_id ); ?></p>
							</div>
						</div>
						<div class="me-col-md-6">
							<div class="marketengine-text-field">
								<label class="text"><?php _e("Last name", "enginethemes");?></label>
								<p><?php echo get_the_author_meta('last_name', $author_id ); ?></p>
							</div>
						</div>
					</div>

					<div class="marketengine-text-field">
						<label class="text"><?php _e("Display name", "enginethemes");?></label>
						<p><?php echo get_the_author_meta('display_name', $author_id ); ?></p>
					</div>

					<div class="marketengine-text-field">
						<label class="text"><?php _e("Email", "enginethemes");?></label>
						<p><?php echo get_the_author_meta('user_email', $author_id ); ?></p>
					</div>

					<div class="marketengine-text-field me-no-margin-bottom">
						<label class="text"><?php _e("Location", "enginethemes");?></label>
						<p><?php echo get_the_author_meta('location', $author_id ); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
