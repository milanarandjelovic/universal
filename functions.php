<?php
/**
 * Universal functions and definitions.
 *
 * @link       https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package    Universal
 * @subpackage Core
 * @since      1.0.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

define( 'UNIVERSAL_VERSION', '1.0.0' );
define( 'UNIVERSAL_STYLES_URI', get_template_directory_uri() . '/dist/styles/' );
define( 'UNIVERSAL_SCRIPTS_URI', get_template_directory_uri() . '/dist/scripts/' );

if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}
