<?php
/**
 * Autoloader class for Universal theme.
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

class Universal_Autoloader {

	/**
	 * The path to the "includes" folder inside the theme.
	 *
	 * @access protected
	 * @since  1.0.0
	 * @var string
	 */
	protected static $universal_includes_path;

	/**
	 * Universal_Autoloader constructor.
	 *
	 * @access public
	 * @since  1.0.0
	 */
	public function __construct() {
		// Get path for classes.
		self::$universal_includes_path = UNIVERSAL_PATH . '/includes/classes/';

		// Register our autoloader.
		spl_autoload_register( array( $this, 'include_class_file' ) );
	}

	/**
	 * Get the path & include the file for the class.
	 *
	 * @access public
	 * @since  1.0.0
	 *
	 * @param string $class_name The class-name we're looking for.
	 */
	public function include_class_file( $class_name ) {
		$path = $this->get_path( $class_name );

		// If the path was not found, early exit.
		if ( false === $path ) {
			return;
		}

		// Include the path.
		if ( file_exists( $path ) ) {
			include_once wp_normalize_path( $path );

			return;
		}
	}

	/**
	 * Gets the path for a specific class name.
	 *
	 * @access public
	 * @since  1.0.0
	 *
	 * @param string $class_name The class-name we're looking for.
	 *
	 * @return bool|mixed|string The full path to the class, or false if not found.
	 */
	protected function get_path( $class_name ) {
		$paths = array();

		if ( 0 === stripos( $class_name, 'Universal' ) ) {
			$filename = 'class-' . strtolower( str_replace( '_', '-', $class_name ) ) . '.php';

			$paths[] = self::$universal_includes_path . $filename;

			$sub_str       = str_replace( 'Universal_', '', $class_name );
			$exploded      = explode( '_', $sub_str );
			$levels        = count( $exploded );
			$previous_path = '';

			for ( $i = 0; $i < $levels; $i ++ ) {
				$paths[]       = self::$universal_includes_path . $previous_path . strtolower( $exploded[ $i ] ) . '/' . $filename;
				$previous_path .= strtolower( $exploded[ $i ] ) . '/';
			}

			foreach ( $paths as $path ) {
				$path = wp_normalize_path( $path );
				if ( file_exists( $path ) ) {
					return $path;
				}
			}
		}

		return false;
	}
}
