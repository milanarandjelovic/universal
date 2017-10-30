<?php
/**
 * Register all sidebars for Phoenix theme.
 *
 * @package    Universal
 * @subpackage Inc\Core
 * @since      1.0.0
 */

namespace Inc\Core;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Register all sidebars for Phoenix theme.
 */
class Sidebar {

	/**
	 * Register default hooks and actions for WordPress.
	 *
	 * @access public
	 * @since  1.0.0
	 */
	public function register() {
		add_action( 'widgets_init', array( $this, 'universal_widgets_init' ) );
	}

	/**
	 * Register widget area.
	 *
	 * @access public
	 * @since  1.0.0
	 */
	public function universal_widgets_init() {
		// Main sidebar.
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'universal' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'universal' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		// Register other sidebars here.
	}
}
