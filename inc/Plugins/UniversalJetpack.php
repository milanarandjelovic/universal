<?php
/**
 * Jetpack Compatibility File.
 *
 * @package    Universal
 * @subpackage Inc\Plugins
 * @since      1.0.0
 */

namespace Inc\Plugins;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Jetpack Compatibility File.
 */
class UniversalJetpack {

	/**
	 * Register default hooks and actions for WordPress.
	 *
	 * @access public
	 * @since  1.0.0
	 */
	public function register() {
		if ( ! class_exists( 'Jetpack' ) ) {
			return;
		}

		add_action( 'after_setup_theme', array( $this, 'universal_jetpack_setup' ) );
	}

	/**
	 * Jetpack setup function.
	 *
	 * @access public
	 * @since  1.0.0
	 */
	public function universal_jetpack_setup() {
		/**
		 * Add theme support for Infinite Scroll.
		 *
		 * @link https://jetpack.com/support/infinite-scroll/
		 */
		add_theme_support( 'infinite-scroll', array(
			'container' => 'main',
			'render'    => array( $this, 'universal_infinite_scroll_render' ),
			'footer'    => 'page',
		) );

		/**
		 * Add theme support for Responsive Videos.
		 *
		 * @link https://jetpack.com/support/responsive-videos/
		 */
		add_theme_support( 'jetpack-responsive-videos' );

		/**
		 * Add theme support for Content Options.
		 *
		 * @link https://jetpack.com/support/content-options/
		 */
		add_theme_support( 'jetpack-content-options', array(
			'post-details' => array(
				'stylesheet' => 'universal-style',
				'date'       => '.posted-on',
				'categories' => '.cat-links',
				'tags'       => '.tags-links',
				'author'     => '.byline',
				'comment'    => '.comments-link',
			),
		) );
	}

	/**
	 * Custom render function for Infinite Scroll.
	 *
	 * @access publoc
	 * @since  1.0.0
	 */
	public function universal_infinite_scroll_render() {
		while ( have_posts() ) {
			the_post();
			if ( is_search() ) :
				get_template_part( 'template-parts/content', 'search' );
			else :
				get_template_part( 'template-parts/content', get_post_format() );
			endif;
		}
	}
}
