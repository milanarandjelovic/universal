<?php
/**
 * Initialization Universal class.
 *
 * @package    Universal
 * @subpackage Core
 * @since      1.0.0
 */

namespace Inc;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Initialization class for Universal theme.
 */
final class Init {

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
			Core\Sidebar::class,
			Custom\Extras::class,
			Custom\PageLoader::class,
			Plugins\UniversalJetpack::class,
			Setup\Enqueue::class,
			Setup\Setup::class,
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
}
