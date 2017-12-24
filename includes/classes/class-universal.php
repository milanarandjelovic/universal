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
	 * Store all classes inside in array.
	 *
	 * @static
	 * @access public
	 * @since  1.0.0
	 * @return array
	 */
	public static function get_services() {
		return [
			Universal_Init::class,
			Universal_Scripts::class,
			Universal_Page_Loader::class,
			Universal_Custom_Style::class,
		];
	}

	/**
	 * Loop through the classes, initialize them and call the
	 * register() method if it exists.
	 *
	 * @static
	 * @access public
	 * @since  1.0.0
	 */
	public static function register_services() {
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );

			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}

	/**
	 * Initialize the class.
	 *
	 * @static
	 * @access public
	 * @since  1.0.0
	 *
	 * @param string $class Class from services array.
	 *
	 * @return object $service New instance of the class.
	 */
	private static function instantiate( $class ) {
		$service = new $class();

		return $service;
	}

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
