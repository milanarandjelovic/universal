<?php
/**
 * Main class for Universal theme.
 *
 * @package    Universal
 * @subpackage Core
 * @since      1.0.0
 * @author     Milan Arandjelovic
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

class Universal {

	/**
	 * The theme version.
	 *
	 * @static
	 * @access public
	 * @var string
	 */
	public static $version = UNIVERSAL_VERSION;

	/**
	 * Gets the theme version.
	 *
	 * @static
	 * @access public
	 * @since  1.0.0
	 * @return string
	 */
	public static function get_theme_version() {
		return self::$version;
	}
}
