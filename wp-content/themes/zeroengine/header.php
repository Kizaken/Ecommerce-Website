<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until marketengine content.
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="marketengine-listing-wrapper" class="marketengine">
		<div class="marketengine-profile-wrap">
			<header id="me-header-wrapper">
				<div class="me-container">
					<div class="marketengine-header-top">
						<a href="<?php echo home_url(); ?>" class="marketengine-logo">
							<span class="text-large"><?php bloginfo('name'); ?></span>
							<span class="text-small"><?php bloginfo('description'); ?></span>
						</a>
						<div class="marketengine-menu-header pull-right">
							<?php
								if( has_nav_menu( 'et_header' ) ) {
									zero_nav_menu( array( 'theme_location' => 'et_header'));
								}
								do_action( 'marketengine_account_menu' );
							?>

							<span class="me-account-humberger me-visible-xs-inline"><i class="icon-me-user"></i></span>
							<span class="me-page-humberger me-visible-sm-inline me-visible-xs-inline"><i class="icon-me-bars"></i></span>
						</div>
						<span class="me-humberger-mobile-btn"><i class="icon-me-bars"></i></span>
						<span class="me-search-mobile-btn"><i class="icon-me-search"></i></span>
					</div>
				</div>
				<div class="marketengine-header-bottom">
					<?php
					if( has_nav_menu( 'et_header') ) {
						zero_nav_menu( array(
							'theme_location'		=> 'et_header',
							'container_class'		=> 'me-menu-page me-visible-sm me-visible-xs',
						) );
					}
					?>

					<?php do_action( 'marketengine_account_menu' ); ?>

					<div class="me-container">
						<div class="marketengine-bar pull-left">
						<?php
							do_action('marketengine_shop_categories');
						?>
						</div>
						<nav class="marketengine-nav pull-right">
							<ul class="marketengine-nav-post">
								<li class="">
									<?php do_action('marketengine_search_form');//marketengine_get_search_form(); ?>
								</li>
								<li><?php do_action('marketengine_post_listing_button'); ?></li>
								<!-- <li><a href=""><i class="icon-me-cart"></i>(0) item</a></li> -->
							</ul>
						</nav>
					</div>
				</div>
				<div class="marketengine-header-mobile">
					<div class="me-header-mobile">
						<ul class="me-menu-mobile">
							<li><?php do_action('marketengine_post_listing_button'); ?></li>

							<?php if ( has_nav_menu( 'category-menu' ) ) : ?>
								<li>
									<span class="me-select-cate-mobile">Shop Categories <i></i></span>
									<span class="me-search-cate-mobile">
										<input class="me-filter-cate-mobile" type="text" placeholder="Search categories">
										<i class="icon-me-search"></i>
									</span>
									<div class="me-menu-category-mobile">
										<?php do_action('marketengine_shop_categories', 'mobile'); ?>
									</div>
								</li>
							<?php endif; ?>

							<li>
								<span class="me-select-account-mobile">My Account</span>
								<?php do_action( 'marketengine_account_menu', 'mobile' ); ?>
							</li>
							<li>
								<?php
									if( has_nav_menu( 'et_header') ) {
										zero_nav_menu( array(
											'theme_location'		=> 'et_header',
											'container_class'		=> 'me-menu-page me-visible-sm me-visible-xs',
										) );
									}
								?>
							</li>
						</ul>
					</div>
				</div>
				<div class="me-search-mobile">
					<?php do_action('marketengine_search_form'); ?>
				</div>
			</header>