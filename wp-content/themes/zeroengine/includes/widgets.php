<?php

function zero_register_sidebars() {

	register_widget( 'Zero_Social_Widget' );
	register_widget( 'Zero_Contact_Widget' );
    register_widget( 'Zero_Menu_Widget' );
    unregister_widget( 'WP_Widget_Recent_Posts' );
	register_widget( 'Zero_Widget_Recent_Posts' );


    for( $i = 1; $i <= 5; $i++ ){
		register_sidebar( array(
			'name'          => __( 'Footer ' . $i, 'enginethemes' ),
			'id'            => 'footer-' . $i,
			'before_widget' => '<div id="%1$s" class="me-menu-footer-wrap">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="me-title-mf">',
			'after_title'   => '</h2>',
		) );
	}

	register_sidebar( array(
		'name'          => __( 'Zero Sidebar', 'enginethemes' ),
		'id'            => 'zero-sidebar',
		'before_widget' => '<div class="me-blog-sidebar-block">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="me-title-sidebar"><h2>',
		'after_title'   => '</h2></div>',
	) );
}
add_action('widgets_init', 'zero_register_sidebars');

/**
 * new WordPress Widget format
 * Wordpress 2.8 and above
 * @see http://codex.wordpress.org/Widgets_API#Developing_Widgets
 */
class Zero_Social_Widget extends WP_Widget {

    /**
     * Constructor
     *
     * @return void
     **/
    function Zero_Social_Widget() {
        $widget_ops = array( 'classname' => 'me-social', 'description' => __("Zero Social Widget", 'enginethemes') );
        parent::__construct( 'me-social', 'Zero Social', $widget_ops );
    }

    /**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme
     * @param array  An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    function widget( $args, $instance ) {
        extract( $args, EXTR_SKIP );
        echo $before_widget;
        echo $before_title;
        echo $instance['title']; // Can set this with a widget option, or omit altogether
        echo $after_title;
    ?>
        <ul class="me-menu-footer">
            <?php if( get_theme_mod('site_facebook') ) {
                echo '<li><a target="_blank" href="'. get_theme_mod( 'site_facebook' ) .'"><i class="icon-me-facebook"></i>'.__("Facebook", 'enginethemes').'</a></li>';
            } ?>
            <?php if( get_theme_mod('site_twitter') ) {
                echo '<li><a target="_blank" href="'. get_theme_mod( 'site_twitter' ) .'"><i class="icon-me-twitter"></i>'.__("Twitter", 'enginethemes').'</a></li>';
            } ?>
            <?php if( get_theme_mod('site_google_plus') ) {
                echo '<li><a target="_blank" href="'. get_theme_mod( 'site_google_plus' ) .'"><i class="icon-me-google-plus"></i>'.__("Google Plus", 'enginethemes').'</a></li>';
            } ?>
            <?php if( get_theme_mod('site_youtube') ) {
                echo '<li><a target="_blank" href="'. get_theme_mod( 'site_youtube' ) .'"><i class="icon-me-youtube"></i>'.__("Youtube", 'enginethemes').'</a></li>';
            } ?>
        </ul>
    <?php
        echo $after_widget;
    }

    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array  An array of new settings as submitted by the admin
     * @param array  An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    function update( $new_instance, $old_instance ) {

        // update logic goes here
        $updated_instance = $new_instance;
        return $updated_instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     * @return void Echoes it's output
     **/
    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => __("Keep in touch", 'enginethemes') ) );
        extract($instance);
    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:','enginethemes' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
    <?php
    }
}

class Zero_Contact_Widget extends WP_Widget {

    /**
     * Constructor
     *
     * @return void
     **/
    function Zero_Contact_Widget() {
        $widget_ops = array( 'classname' => 'me-contact', 'description' => __("Zero Contact Widget", 'enginethemes') );
        parent::__construct( 'me-contact', 'Zero Contact', $widget_ops );
    }

    /**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme
     * @param array  An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    function widget( $args, $instance ) {
        extract( $args, EXTR_SKIP );
        echo $before_widget;
        echo $before_title;
        echo $instance['title']; // Can set this with a widget option, or omit altogether
        echo $after_title;
    ?>
        <ul class="me-menu-footer">
            <?php if( $instance['email'] ) {
                echo '
                <li>
					<p>
						<b>' .$instance['name']. '</b>
						<a href="mailto:'.$instance['email'].'">'.$instance['email'].'</a>
					</p>
				</li>';
            } ?>
        </ul>
    <?php
        echo $after_widget;
    }

    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array  An array of new settings as submitted by the admin
     * @param array  An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    function update( $new_instance, $old_instance ) {

        // update logic goes here
        $updated_instance = $new_instance;
        return $updated_instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     * @return void Echoes it's output
     **/
    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => __("CONTACT US", 'enginethemes'), 'name' => __("EngineThemes", 'enginethemes'), 'email' => 'contact@enginethemes.com' ) );
        extract($instance);
    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:','enginethemes' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('name'); ?>"><?php _e( 'Name:','enginethemes' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" type="text" value="<?php echo $name; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e( 'Email:','enginethemes' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" />
        </p>
    <?php
    }
}

/**
 * Class used to implement the Custom Menu widget.
 *
 * @since 1.0.0
 *
 * @see WP_Widget
 */
class Zero_Menu_Widget extends WP_Widget {

	/**
     * Constructor
     *
     * @return void
     **/
    function Zero_Menu_Widget() {
        $widget_ops = array( 'classname' => 'me-nav-menu', 'description' => __("Zero Menu Widget", 'enginethemes') );
        parent::__construct( 'me-nav-menu', 'Zero Menu', $widget_ops );
    }

	/**
	 * Outputs the content for the current instance.
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Custom Menu widget instance.
	 */
	public function widget( $args, $instance ) {
		// Get menu
		$nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

		if ( !$nav_menu )
			return;

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		extract( $args, EXTR_SKIP );
		$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo $before_widget;
        echo $before_title;
        echo $instance['title']; // Can set this with a widget option, or omit altogether
        echo $after_title;

		$nav_menu_args = array(
			'fallback_cb' => '',
			'menu'        => $nav_menu,
			'menu_class'			=> 'me-menu-footer',
			'container'				=> 'nav',
			'container_class'		=> 'me-menu-page',
		);

		/**
		 * Filters the arguments for the Custom Menu widget.
		 * @param array    $nav_menu_args {
		 *     An array of arguments passed to wp_nav_menu() to retrieve a custom menu.
		 *
		 *     @type callable|bool $fallback_cb Callback to fire if the menu doesn't exist. Default empty.
		 *     @type mixed         $menu        Menu ID, slug, or name.
		 * }
		 * @param stdClass $nav_menu      Nav menu object for the current menu.
		 * @param array    $args          Display arguments for the current widget.
		 * @param array    $instance      Array of settings for the current widget.
		 */
		wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args, $nav_menu, $args, $instance ) );

		echo $after_widget;
	}

	/**
	 * Handles updating settings for the current Custom Menu widget instance.
	 *
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		if ( ! empty( $new_instance['title'] ) ) {
			$instance['title'] = sanitize_text_field( $new_instance['title'] );
		}
		if ( ! empty( $new_instance['nav_menu'] ) ) {
			$instance['nav_menu'] = (int) $new_instance['nav_menu'];
		}
		return $instance;
	}

	/**
	 * Outputs the settings form for the Custom Menu widget.
	 * @access public
	 *
	 * @param array $instance Current settings.
	 * @global WP_Customize_Manager $wp_customize
	 */
	public function form( $instance ) {
		global $wp_customize;
		$title = isset( $instance['title'] ) ? $instance['title'] : __("Menu title", 'enginethemes');
		$nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';

		// Get menus
		$menus = wp_get_nav_menus();

		// If no menus exists, direct the user to go and create some.
		?>
		<p class="nav-menu-widget-no-menus-message" <?php if ( ! empty( $menus ) ) { echo ' style="display:none" '; } ?>>
			<?php
			if ( $wp_customize instanceof WP_Customize_Manager ) {
				$url = 'javascript: wp.customize.panel( "nav_menus" ).focus();';
			} else {
				$url = admin_url( 'nav-menus.php' );
			}
			?>
			<?php echo sprintf( __( 'No menus have been created yet. <a href="%s">Create some</a>.' ), esc_attr( $url ) ); ?>
		</p>
		<div class="nav-menu-widget-form-controls" <?php if ( empty( $menus ) ) { echo ' style="display:none" '; } ?>>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ) ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>"/>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'nav_menu' ); ?>"><?php _e( 'Select Menu:' ); ?></label>
				<select id="<?php echo $this->get_field_id( 'nav_menu' ); ?>" name="<?php echo $this->get_field_name( 'nav_menu' ); ?>">
					<option value="0"><?php _e( '&mdash; Select &mdash;' ); ?></option>
					<?php foreach ( $menus as $menu ) : ?>
						<option value="<?php echo esc_attr( $menu->term_id ); ?>" <?php selected( $nav_menu, $menu->term_id ); ?>>
							<?php echo esc_html( $menu->name ); ?>
						</option>
					<?php endforeach; ?>
				</select>
			</p>
			<?php if ( $wp_customize instanceof WP_Customize_Manager ) : ?>
				<p class="edit-selected-nav-menu" style="<?php if ( ! $nav_menu ) { echo 'display: none;'; } ?>">
					<button type="button" class="button"><?php _e( 'Edit Menu' ) ?></button>
				</p>
			<?php endif; ?>
		</div>
		<?php
	}
}

/**
 * Widget API: Zero_Widget_Recent_Posts class
 *
 * @since 1.0.0
 */

/**
 * Core class used to implement a Recent Posts widget.
 *
 * @since 1.0.0
 *
 * @see WP_Widget
 */
class Zero_Widget_Recent_Posts extends WP_Widget {

    /**
     * Sets up a new Recent Posts widget instance.
     *
     * @access public
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'widget_recent_entries',
            'description' => __( 'Your site&#8217;s most recent Posts.' ),
            'customize_selective_refresh' => true,
        );
        parent::__construct( 'recent-posts', __( 'Recent Posts', 'enginethemes' ), $widget_ops );
        $this->alt_option_name = 'widget_recent_entries';
    }

    /**
     * Outputs the content for the current Recent Posts widget instance.
     *
     * @since 1.0.0
     * @access public
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Recent Posts widget instance.
     */
    public function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts', 'enginethemes' );

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
        if ( ! $number )
            $number = 5;
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
        $show_thumbnail = isset( $instance['show_thumbnail'] ) ? $instance['show_thumbnail'] : false;

        /**
         * Filters the arguments for the Recent Posts widget.
         *
         * @see WP_Query::get_posts()
         *
         * @param array $args An array of arguments used to retrieve the recent posts.
         */
        $r = new WP_Query( apply_filters( 'widget_posts_args', array(
            'posts_per_page'      => $number,
            'no_found_rows'       => true,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true
        ) ) );

        if ($r->have_posts()) :
        ?>
        <?php echo $args['before_widget']; ?>
        <?php if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        } ?>
        <div class="me-blog-sidebar-content">
            <ul class="me-blog-recent-post">
            <?php while ( $r->have_posts() ) : $r->the_post(); ?>
                <li>
                    <div class="me-recent-post-wrap">
                    <?php if ($show_thumbnail && has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" class="me-recent-post-img">
                            <?php the_post_thumbnail('zero_post_thumbnail'); ?>
                        </a>
                    <?php endif; ?>
                    <div class="me-recent-post-title">
                        <a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
                    </div>
                    <?php if ( $show_date ) : ?>
                        <span class="post-date"><?php echo get_the_date(); ?></span>
                    <?php endif; ?>
                    </div>
                </li>
            <?php endwhile; ?>
            </ul>
        </div>
        <?php echo $args['after_widget']; ?>
        <?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();

        endif;
    }

    /**
     * Handles updating the settings for the current Recent Posts widget instance.
     *
     * @since 1.0.0
     * @access public
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Updated settings to save.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
        $instance['show_thumbnail'] = isset( $new_instance['show_thumbnail'] ) ? (bool) $new_instance['show_thumbnail'] : false;
        return $instance;
    }

    /**
     * Outputs the settings form for the Recent Posts widget.
     *
     * @since 1.0.0
     * @access public
     *
     * @param array $instance Current settings.
     */
    public function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
        $show_thumbnail = isset( $instance['show_thumbnail'] ) ? (bool) $instance['show_thumbnail'] : false;
?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
        <input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>

        <p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
        <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label></p>

        <p><input class="checkbox" type="checkbox"<?php checked( $show_thumbnail ); ?> id="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>" name="<?php echo $this->get_field_name( 'show_thumbnail' ); ?>" />
        <label for="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>"><?php _e( 'Display post thumbnail?' ); ?></label></p>
<?php
    }
}