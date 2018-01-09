<?php
/**
 * Universal functions and definitions.
 *
 * @link       https://developer.wordpress.org/themes/basics/theme-functions/
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

define( 'UNIVERSAL_VERSION', '1.0.0' );
define( 'UNIVERSAL_PATH', wp_normalize_path( get_template_directory() ) );
define( 'UNIVERSAL_URI', get_template_directory_uri() );
define( 'UNIVERSAL_ADMIN_URI', UNIVERSAL_URI . '/includes/admin/' );
define( 'UNIVERSAL_ADMIN_IMAGES_URI', UNIVERSAL_URI . '/includes/admin/images/' );
define( 'UNIVERSAL_STYLES_URI', UNIVERSAL_URI . '/dist/styles/' );
define( 'UNIVERSAL_SCRIPTS_URI', UNIVERSAL_URI . '/dist/scripts/' );

/**
 * Include Redux Framework.
 */
include_once UNIVERSAL_PATH . '/includes/admin/options-init.php';

/**
 * Include Universal functions.
 */
include_once UNIVERSAL_PATH . '/includes/universal-functions.php';

/**
 * Include autoloader for Universal theme.
 */
include_once UNIVERSAL_PATH . '/includes/classes/class-universal-autoloader.php';

/**
 * Include main class fo Universal theme.
 */
include_once UNIVERSAL_PATH . '/includes/classes/class-universal.php';

/**
 * Instantiate Universal autoloader.
 */
new Universal_Autoloader();

/**
 * Register class for Universal theme.
 */
Universal::register_services();
