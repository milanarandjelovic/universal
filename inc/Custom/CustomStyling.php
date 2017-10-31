<?php
/**
 * Output Custom Styling from Redux Theme Options.
 *
 * @package    Universal
 * @subpackage Inc\Custom
 * @since      1.0.0
 */

namespace Inc\Custom;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Custom Styling from Redux Theme Options.
 */
class CustomStyling {

	/**
	 * Register default hooks and actions for WordPress.
	 *
	 * @access public
	 * @since  1.0.0
	 */
	public function register() {
		add_action( 'wp_head', array( $this, 'universal_custom_styling' ) );
	}

	/**
	 * Display custom style in header.
	 *
	 * @access public
	 * @since  1.0.0
	 */
	public function universal_custom_styling() {
		$output         = '';
		$universal_data = get_option( 'universal_data' );
		/*********************************************************************************
		 * Custom styling for page pre-loader.
		 ******************************************************************************** */
		if ( '1' === $universal_data['universal__opt-page-pre-loader'] && '1' === $universal_data['universal__opt-custom-page-pre-loader'] ) {
			$page_pre_loader_color  = $universal_data['universal__opt-page-pre-loader-bar-color1'];
			$page_pre_loader_bg     = $universal_data['universal__opt-page-pre-loader-bg']['background-color'];
			$page_pre_loader_size   = str_replace( 'px', '', $universal_data['universal__opt-page-pre-loader-spinner-size']['width'] );
			$page_pre_loader_h_size = $page_pre_loader_size / 2;


			$output .= '.page-pre-loader {';
			$output .= 'background: ' . $page_pre_loader_bg;
			$output .= '}';

			$output .= '.page-pre-loader .loader-inner {';
			$output .= 'background: -moz-linear-gradient(left, ' . $page_pre_loader_color . ' 10%, ' . $page_pre_loader_bg . ' 42%);';
			$output .= 'background: -webkit-linear-gradient(left, ' . $page_pre_loader_color . ' 10%, ' . $page_pre_loader_bg . ' 42%);';
			$output .= 'background: -o-linear-gradient(left, ' . $page_pre_loader_color . ' 10%, ' . $page_pre_loader_bg . ' 42%);';
			$output .= 'background: -ms-linear-gradient(left, ' . $page_pre_loader_color . ' 10%, ' . $page_pre_loader_bg . ' 42%);';
			$output .= 'background: linear-gradient(to right, ' . $page_pre_loader_color . ' 10%, ' . $page_pre_loader_bg . ' 42%);';
			$output .= '}';

			$output .= '.page-pre-loader .loader-inner:before {';
			$output .= 'background: ' . $page_pre_loader_color;
			$output .= '}';

			$output .= '.page-pre-loader .loader-inner:after {';
			$output .= 'background: ' . $page_pre_loader_bg;
			$output .= '}';

			$output .= '.page-pre-loader .loader-inner {';
			$output .= 'height: ' . $page_pre_loader_size . 'px;';
			$output .= 'width: ' . $page_pre_loader_size . 'px;';
			$output .= 'margin: -' . $page_pre_loader_h_size . 'px 0 0 -' . $page_pre_loader_h_size . 'px;';
			$output .= '}';
		}

		/*********************************************************************************
		 * Display custom CSS in head.
		 ******************************************************************************** */
		if ( '' !== $output ) {
			$output = "<!-- Dynamic CSS -->\n<style type=\"text/css\">\n" . $output . "\n</style>\n";
			echo ! empty( $output ) ? $output : ''; // WPCS: XSS ok.
		}
	}
}
