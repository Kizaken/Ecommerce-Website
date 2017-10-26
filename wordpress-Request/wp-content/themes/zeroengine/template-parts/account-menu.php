<?php if( is_user_logged_in() ) : ?>
<nav class="me-menu-account">
	<select name="" id="" onchange="window.location.href=this.value;">
		<option disabled selected><?php echo get_the_author_meta('display_name', get_current_user_id()); ?></option>
		<option value="<?php echo wp_logout_url( get_the_permalink() ); ?>"><?php echo __('Logout', 'enginethemes'); ?></option>
	</select>
</nav>

<?php else: ?>

<nav class="me-menu-account">
	<select name="" id="" onchange="window.location.href=this.value;">
		<option disabled selected><?php echo __('MY ACCOUNT', 'enginethemes'); ?></option>
		<option value="<?php echo wp_login_url(get_the_permalink()); ?>"><?php echo __('Login', 'enginethemes'); ?></option>
		<?php if( get_option('users_can_register') ) : ?>
		<option value="<?php echo wp_registration_url(get_the_permalink()); ?>"><?php echo __('Register', 'enginethemes'); ?></option>
		<?php endif; ?>
	</select>
</nav>
<?php endif; ?>