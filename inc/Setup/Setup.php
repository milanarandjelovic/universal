<?php
/**
 * Adding theme support for Universal theme.
 *
 * @package    Universal
 * @subpackage Inc\Setup
 * @since      1.0.0
 */

namespace Inc\Setup;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Setup class for adding theme support.
 */
class Setup {

	/**
	 * Register default hooks and actions for WordPress.
	 *
	 * @access public
	 * @since  1.0.0
	 */
	public function register() {
		add_action( 'after_setup_theme', array( $this, 'add_theme_support' ) );
		add_action( 'after_setup_theme', array( $this, 'universal_content_width' ), 0 );
	}

	/**
	 * Sets up theme defaults and register support for various WordPress
	 * features.
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * run before the init hook.
	 *
	 * @access public
	 * @since  1.0.0
	 */
	public function add_theme_support() {
		/**
		 * Add default posts and comments RSS feed links to head.
		 *
		 * @links https://developer.wordpress.org/reference/functions/add_theme_support/#feed-links
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * This theme uses wp_nav_menu() in one location.
		 *
		 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
		 */
		register_nav_menus( array(
			'universal-primary-menu'  => esc_html__( 'Primary Menu', 'universal' ),
			'universal-one-page-menu' => esc_html__( 'One Page', 'universal' ),
		) );

		/**
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/**
		 * Set up the WordPress core custom background feature.
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#custom-background
		 */
		add_theme_support( 'custom-background', apply_filters( 'universal_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		/**
		 * Add theme support for selective refresh for widgets.
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#custom-logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		 * Enable support for Post Formats.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'gallery',
			'link',
			'image',
			'quote',
			'status',
			'video',
			'audio',
			'chat',
		) );

		/**
		 * When you enable Custom Headers in your theme, users can change their header image using the WordPress
		 * theme Customizer. This gives users more control and flexibility over the look of their site.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
		 */
		add_theme_support( 'custom-header' );
	}

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @access public
	 * @since  1.0.0
	 * @global int $content_width
	 */
	public function universal_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'universal_content_width', 640 );
	}
}
