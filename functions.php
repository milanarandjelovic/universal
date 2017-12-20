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

define( 'UNIVERSAL_VERSION', '1.0.0' );
define( 'UNIVERSAL_PATH', wp_normalize_path( get_template_directory() ) );
define( 'UNIVERSAL_URI', get_template_directory_uri() );
define( 'UNIVERSAL_ADMIN_URI', UNIVERSAL_URI . '/inc/Admin/' );
define( 'UNIVERSAL_ADMIN_IMAGES_URI', UNIVERSAL_URI . '/inc/admin/images/' );
define( 'UNIVERSAL_STYLES_URI', UNIVERSAL_URI . '/dist/styles/' );
define( 'UNIVERSAL_SCRIPTS_URI', UNIVERSAL_URI . '/dist/scripts/' );

/**
 * Include Redux Framework.
 */
include_once UNIVERSAL_PATH . '/inc/admin/admin-init.php';

/**
 * Include Universal functions.
 */
include_once UNIVERSAL_PATH . '/inc/universal-functions.php';

/**
 * Include autoloader for Universal theme.
 */
include_once UNIVERSAL_PATH . '/inc/classes/class-universal-autoloader.php';

/**
 * Instantiate Universal autoloader.
 */
new Universal_Autoloader();

/**
 * Instantiate Init class.
 */
new Universal_Init();

/**
 * Instantiate Universal scripts.
 */
new Universal_Scripts();
