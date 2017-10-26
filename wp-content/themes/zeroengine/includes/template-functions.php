<?php

function zero_nav_menu( $args = array() ){
	$default = array(
		'menu_class'			=> 'marketengine-nav-menu',
		'container'				=> 'nav',
		'container_class'		=> 'me-menu-page',
	);

	if( $args != array() ){
		$default = array_merge($default, $args);
	}

	wp_nav_menu( $default );
}

function zero_account_menu_action() {
    $flag = true;
    $flag = apply_filters( 'marketengine_account_menu_flag', $flag );
    if( $flag ) {
        get_template_part( 'template-parts/account-menu' );
    }
}
add_action( 'marketengine_account_menu', 'zero_account_menu_action' );

function zero_paginate_link() {
    $max_num_pages = 0;
    global $wp_query;
    $max_num_pages = $wp_query->max_num_pages;

    $big = 999999999; // need an unlikely integer

    $args = array(
        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'    => '?paged=%#%',
        'total'     => $max_num_pages,
        'current'   => max(1, get_query_var('paged')),
        'show_all'  => false,
        'end_size'  => 1,
        'mid_size'  => 2,
        'prev_next' => true,
        'prev_text' => __("&lt;", "enginethemes"),
        'next_text' => __('&gt;', "enginethemes"),
        'type'      => 'plain',
        'add_args'  => false,
    );

    echo paginate_links($args);
}

function zero_list_comments( $args = array(), $comment = null ) {
    $per_page = get_option('comments_per_page');
    $default = array(
        'walker'      => new Zero_Walker_Comment,
        'style'       => 'ol',
        'short_ping'  => true,
        'avatar_size' => 42,
        'page'        => isset( $args['page'] ) ? $args['page'] : '',
        'per_page'    => $per_page,
    );

    $args = wp_parse_args( $args, $default );

    return wp_list_comments($args, $comment);
}