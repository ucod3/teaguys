<?php
/**
 * Tea Guys functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Tea_Guys
 */

if ( ! function_exists( 'tea_guys_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tea_guys_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Tea Guys, use a find and replace
		 * to change 'tea_guys' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tea_guys', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu' => esc_html__( 'Primary', 'tea_guys' ),
			'header-menu' => esc_html__( 'Header', 'tea_guys' ),
			'footer-menu' => esc_html__( 'Footer', 'tea_guys' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'tea_guys_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

			/**
		 * Add theme support
		*/
		add_theme_support('wp-block-styles');

		/**
		 * add theme support for align wide
		*/
		add_theme_support( 'align-wide' );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'tea_guys_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tea_guys_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'tea_guys_content_width', 640 );
}
add_action( 'after_setup_theme', 'tea_guys_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tea_guys_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tea_guys' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'tea_guys' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'tea_guys_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tea_guys_scripts() {
	wp_enqueue_style( 'tea_guys-style', get_stylesheet_uri() );

	wp_enqueue_style( 'tea_guys-foundation', get_template_directory_uri() . '/assets/css/vendor/foundation.min.css', null,'6.5.1' );

	wp_enqueue_script( 'tea_guys-what-input', get_template_directory_uri() . '/assets/js/vendor/what-input.js', array('jquery'), '6.5.1', true);

	wp_enqueue_script( 'tea_guys-foundation', get_template_directory_uri() . '/assets/js/vendor/foundation.min.js', array('jquery', 'tea_guys-what-input'), '6.5.1', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tea_guys_scripts' );

/**
 * Enqueue google fonts
 */

function wpb_add_google_fonts() {
	wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Nunito&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/* Custom Post type start */
function cw_post_type_news() {

	$supports = array(
		'title', // post title
		'editor', // post content
		'author', // post author
		'thumbnail', // featured images
		'excerpt', // post excerpt
		'custom-fields', // custom fields
		'revisions', // post revisions
		'comments', // post comments
		'post-formats', // post formats
);

$labels = array(
	'name' => _x('News', 'plural'),
	'singular_name' => _x('News', 'singular'),
	'menu_name' => _x('News', 'admin menu'),
	'name_admin_bar' => _x('News', 'admin bar'),
	'add_new' => _x('Add New', 'add new'),
	'add_new_item' => __('Add New news'),
	'edit_item' => __('Edit News'),
	'new_item' => __('New News'),
	'view_item' => __('View News'),
	'all_items' => __('All News'),
	'not_found' => __('No News found.'),
	'search_items' => __('Search News'),
);

$args = array(
	'supports' => $supports,
	'labels' => $labels,
	'public' => true,
	'query_var' => true,
	'rewrite' => array('slug' => 'News'),
	'has_archive' => true,
	'hierarchical' => false,
);

register_post_type('news', $args);
}
add_action('init', 'cw_post_type_news');
/*Custom Post type end*/

/* Custom Post Type Start */

function create_posttype() {
	register_post_type( 'news',
	// CPT Options
	