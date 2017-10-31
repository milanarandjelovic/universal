<?php
/**
 * Page Pre-Loader for theme.
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
 * Adding page Pre-Loader for theme.
 */
class PageLoader {

	/**
	 * Register default hooks and actions for WordPress.
	 *
	 * @access public
	 * @since  1.0.0
	 */
	public function register() {
		add_action( 'universal_before_body_content', array( $this, 'universal_page_pre_loader' ) );
	}

	/**
	 * Page Pre-Loader.
	 *
	 * @access public
	 * @since  1.0.0
	 */
	public function universal_page_pre_loader() {
		$universal_data = get_option( 'universal_data' );

		// Check if Page Pre-Loader enabled.
		if ( $universal_data['universal__opt-page-pre-loader'] ) {
			?>
			<div class="page-pre-loader">
				<div class="loader-inner"></div> <!-- /.page-pre-loader -->
			</div> <!-- /.loader-inner -->
			<?php
		}
	}
}
