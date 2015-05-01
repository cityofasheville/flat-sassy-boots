<?php
/**
 * Flat Sassy Boots functions and definitions
 *
 * @package Flat Sassy Boots
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'flat_sassy_boots_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function flat_sassy_boots_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Flat Sassy Boots, use a find and replace
	 * to change 'flat-sassy-boots' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'flat-sassy-boots', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('large-thumb', 1060, 650, true);
	add_image_size('index-thumb', 780, 250, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'flat-sassy-boots' ),
		'front-page-menu' => __('Front Page Menu', 'flat-sassy-boots'),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',  'buddypress',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	// add_theme_support( 'custom-background', apply_filters( 'flat_sassy_boots_custom_background_args', array(
	// 	'default-color' => 'ffffff',
	// 	'default-image' => '',
	// ) ) );
}
endif; // flat_sassy_boots_setup
add_action( 'after_setup_theme', 'flat_sassy_boots_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function flat_sassy_boots_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'flat-sassy-boots' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widgets', 'flat-sassy-boots' ),
		'id'            => 'sidebar-2',
		'description'   => 'Footer widgets area that appears in the footer of the site',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Front Page Widget Area', 'flat-sassy-boots' ),
		'id'            => 'front-page-widget-area',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'flat_sassy_boots_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function flat_sassy_boots_scripts() {
	wp_enqueue_style( 'flat-sassy-boots-style', get_stylesheet_uri() );
	wp_enqueue_style( 'flat-sassy-boots-style', get_template_directory_uri() . '/csds_marquee.css' );

	wp_enqueue_style( 'flat-sassy-boots-style-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );

	wp_enqueue_script( 'flat-sassy-boots-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'flat-sassy-boots-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'flat-sassy-boots-navbar-adminbar-offset', get_template_directory_uri() . '/js/navbar-adminbar-offset.js', array('jquery'), '20150212', true );

	wp_enqueue_script( 'flat-sassy-boots-superfish', get_template_directory_uri() . '/js/superfish.min.js', array('jquery'), '20150212', true );

	wp_enqueue_script( 'flat-sassy-boots-superfish-settings', get_template_directory_uri() . '/js/superfish-settings.js', array('flat-sassy-boots-superfish'), '20140328', true );

	wp_enqueue_script( 'flat-sassy-boots-smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll.js', array('jquery'), '20150212', true );

	wp_enqueue_script( 'flat-sassy-boots-bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js', array(), '20150213', true );

	wp_enqueue_script( 'flat-sassy-boots-masonry-settings-js', get_template_directory_uri() . '/js/masonry-settings.js', array('masonry'), '20150213', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'flat_sassy_boots_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load a custom nav walker for building menus using Bootstrap syntax
 */
// require_once('wp_bootstrap_navwalker.php');
function replace_howdy( $wp_admin_bar ) {
	$my_account=$wp_admin_bar->get_node('my-account');
	$newtitle = str_replace( 'Howdy,', 'Hello, ', $my_account->title );
	$wp_admin_bar->add_node( array(
	'id' => 'my-account',
	'title' => $newtitle,
	) );
}
add_filter( 'admin_bar_menu', 'replace_howdy', 25 );
