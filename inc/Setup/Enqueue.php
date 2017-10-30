<?php
/**
 * Adding scripts for Universal theme.
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
 * Enqueue scripts and styles for Universal theme.
 */
class Enqueue {

	/**
	 * Register default hooks and actions for WordPress.
	 *
	 * @access public
	 * @since  1.0.0
	 */
	public function register() {
		add_action( 'customize_register', array( $this, 'universal_customize_register' ) );
		add_action( 'customize_preview_init', array( $this, 'universal_customize_preview_js' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'universal_enqueue_scripts' ) );
	}

	/**
	 * Enqueue scripts and styles.
	 *
	 * @access public
	 * @since  1.0.0
	 */
	public function universal_enqueue_scripts() {
		// Enqueue styles.
		wp_enqueue_style( 'universal-main-style', UNIVERSAL_STYLES_URI . 'main.css', array(), '1.0.0', 'all' );

		// Enqueue scripts.
		wp_enqueue_script( 'universal-main-script', UNIVERSAL_SCRIPTS_URI . 'main.js', array( 'jquery' ), '1.0.0', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @access public
	 * @since  1.0.0
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function universal_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'blogname', array(
				'selector'        => '.site-title a',
				'render_callback' => bloginfo( 'name' ),
			) );
			$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
				'selector'        => '.site-description',
				'render_callback' => bloginfo( 'description' ),
			) );
		}
	}

	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 *
	 * @access public
	 * @since  1.0.0
	 */
	public function universal_customize_preview_js() {
		wp_enqueue_script( 'phoenix-main-customizer', UNIVERSAL_SCRIPTS_URI . 'customizer.js', array( 'customize-preview' ), '1.0.0', true );
	}
}
