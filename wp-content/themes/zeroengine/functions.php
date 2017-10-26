<?php


define("ET_VERSION", '1.0.1');
define('TEMPLATEURL', get_template_directory_uri() );

require_once TEMPLATEPATH . '/includes/class-tgm-plugin-activation.php';
require_once TEMPLATEPATH . '/includes/class-tgm-handle.php';
require_once TEMPLATEPATH . '/includes/class-zero-base.php';
require_once TEMPLATEPATH . '/includes/class-zero-walker-comment.php';
require_once TEMPLATEPATH . '/includes/template-functions.php';
require_once TEMPLATEPATH . '/includes/widgets.php';

class ET_ZeroEngine extends Zero_Base{
	public static $instance;

	public static function get_instance(){
		if (self::$instance == null) {
            self::$instance = new ET_ZeroEngine();
        }
        return self::$instance;
	}

	function __construct() {
        $this->version = ET_VERSION;

        // init theme setting
        $this->add_action('init', 'zero_init');

        /**
         * enqueue front end scripts
         */
        $this->add_action('wp_enqueue_scripts', 'on_add_scripts');
        $this->add_action('wp_enqueue_scripts', 'on_deregister_script' );
        // /**
        //  * enqueue front end styles
        //  */
        $this->add_action('wp_enqueue_scripts', 'on_add_styles', 10);
		$this->add_action( 'customize_register', 'zero_customize_register' );

    }
    function zero_init() {

        // disable admin bar if user can not manage options
        if ( !current_user_can('manage_options') ) :
            show_admin_bar(false);
        endif;

        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
        add_image_size( 'zero_post_thumbnail', 406, 232, false );

        // register menus
        register_nav_menus( array(
			'et_header' => __( 'Primary Menu', 'enginethemes' ),
			'et_mobile_header'  => __( 'Mobile Header menu', 'enginethemes' ),
			'et_header_top'  => __( 'Header top menu', 'enginethemes' ),
			'et_footer'  => __( 'Footer menu', 'enginethemes' ),
		) );

        global $wp_post_types;
        $wp_post_types['page']->exclude_from_search = true;
    }

    function on_add_scripts(){
    	wp_enqueue_script('jquery');
        wp_enqueue_script('plupload');
        wp_enqueue_script('comment-reply');
        wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/js/jquery-ui.js', array( 'jquery' ) );

		wp_enqueue_script( 'jquery.magnific-popup.min', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'jquery.mCustomScrollbar.min', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.min.js', array( 'jquery' ) );
        wp_enqueue_script( 'me.sliderthumbs', get_template_directory_uri() . '/js/me.sliderthumbs.js', array( 'jquery' ) );
		wp_enqueue_script( 'jQuery.chosen.select', get_template_directory_uri() . '/js/chosen.jquery.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'zero-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ) );
        wp_enqueue_script( 'zero-comment', get_template_directory_uri() . '/js/comment.js', array( 'jquery' ) );

    }

    function on_deregister_script() {
        wp_deregister_script('word-count');
        wp_dequeue_script('admin-bar');
    }

    /**
     * Enqueue styles for the front end.
     *
     * @since Directory Engine 1.0
     *
     * @return void
     */
    function on_add_styles() {
        // Loads the Internet Explorer specific stylesheet.
        $this->add_style( 'bootstrap' );
        $this->add_style( 'me-google-font', 'https://fonts.googleapis.com/css?family=Lato:300,400,700,900' );

        // style.css
        $this->add_style( 'marketengine-style', get_stylesheet_uri() , array(
            'bootstrap'
        ) , ET_VERSION);

		$this->add_style( 'me-font-icon', get_template_directory_uri() . '/css/marketengine-font-icon.css' , array(
            'bootstrap'
        ) , ET_VERSION);
		$this->add_style( 'me-layout-basic', get_template_directory_uri() . '/css/marketengine-layout-basic.css', array(
            'bootstrap'
        ) , ET_VERSION );
		$this->add_style( 'me-magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css', array(
            'bootstrap'
        ) , ET_VERSION );
    }

    function zero_customize_register( $wp_customize ) {
    	// Social Link Section
		$wp_customize->add_section( 'social_links' , array(
		    'title'      => __( 'Social Links', 'enginethemes' ),
		    'priority' => 35,
            'capability' => 'edit_theme_options',
		) );

		$setting_args = array('capability'	=> 'edit_theme_options');

    	$wp_customize->add_setting( 'site_facebook' );
    	$wp_customize->add_setting( 'site_twitter' );
    	$wp_customize->add_setting( 'site_google_plus' );
    	$wp_customize->add_setting( 'site_youtube' );

    	$wp_customize->add_control( 'site_facebook' , array(
			'label'      => __( 'Facebook', 'enginethemes' ),
			'section'    => 'social_links',
			'settings'   => 'site_facebook',
		    'priority'   => 1
		) );
		$wp_customize->add_control( 'site_twitter' , array(
			'label'      => __( 'Twitter', 'enginethemes' ),
			'section'    => 'social_links',
			'settings'   => 'site_twitter',
		    'priority'   => 1
		) );
		$wp_customize->add_control( 'site_google_plus' , array(
			'label'      => __( 'Google Plus', 'enginethemes' ),
			'section'    => 'social_links',
			'settings'   => 'site_google_plus',
		    'priority'   => 1
		) );
		$wp_customize->add_control( 'site_youtube' , array(
			'label'      => __( 'Youtube', 'enginethemes' ),
			'section'    => 'social_links',
			'settings'   => 'site_youtube',
		    'priority'   => 1
		) );
        // End of social link section
	}


}

global $et_zeroengine;
add_action( 'after_setup_theme' , 'zero_setup_theme' );
function zero_setup_theme () {
    global $et_marketengine;
    $et_marketengine = ET_ZeroEngine::get_instance();
}
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
