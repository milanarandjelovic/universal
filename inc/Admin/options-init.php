<?php
/**
 * For full documentation, please visit:
 *
 * @link http://docs.reduxframework.com/
 *
 * For a more extensive sample-config file, you may look at:
 *
 * @link https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
 */

if ( ! class_exists( 'Redux' ) ) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'universal_data';

/**********************************************************************************
 * SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to:
 *
 * @link https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 ********************************************************************************* */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
	'opt_name'              => 'universal_data',
	'dev_mode'              => false,
	'display_name'          => $theme->get( 'Name' ),
	'display_version'       => $theme->get( 'Version' ),
	'page_slug'             => 'universal',
	'page_title'            => esc_html__( 'Theme Options', 'universal' ),
	'update_notice'         => true,
	'intro_text'            => esc_html__( 'Universal Theme options', 'universal' ),
	'admin_bar'             => true,
	'menu_type'             => 'menu',
	'menu_title'            => esc_html__( 'Universal', 'universal' ),
	'allow_sub_menu'        => true,
	'page_parent_post_type' => 'your_post_type',
	'customizer'            => true,
	'default_mark'          => '*',
	'class'                 => 'universal',
	'hints'                 => array(
		'icon'          => 'el el-dashboard',
		'icon_position' => 'left',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color'   => 'blue',
			'shadow'  => '1',
			'rounded' => '1',
			'style'   => 'bootstrap',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseleave unfocus',
			),
		),
	),
	'output'                => true,
	'output_tag'            => true,
	'settings_api'          => true,
	'cdn_check_time'        => '1440',
	'compiler'              => true,
	'page_permissions'      => 'manage_options',
	'save_defaults'         => true,
	'show_import_export'    => true,
	'disable_save_warn'     => true,
	'database'              => 'options',
	'transient_time'        => '3600',
	'network_sites'         => true,
);

Redux::setArgs( $opt_name, $args );

/***********************************************************************************
 *
 * END ARGUMENTS
 *
 ********************************************************************************* */

/**********************************************************************************
 *
 * START SECTIONS
 *
 * 1. General Settings
 * 2. Header Settings
 * 3. Search Form Settings
 * 4. Footer Settings
 * 5. Footer Widgets Settings
 * 6. Footer Copyright Settings
 * 7. Blog Options
 * 8. Single Post Settings
 * 9. Team Options
 * 10. WooCommerce Options
 * 11. Page Pre-Loader Options
 * 12. 404 Page Options
 * 13. 404 Page Styling
 * 14. Coming Soon Page Options
 * 15. Under Construction Page Options
 * 16. Social Media Options
 * 17. Custom CSS
 ********************************************************************************* */

/*********************************************************************************
 * 1. General Settings
 ******************************************************************************** */

/*********************************************************************************
 * 2. Header Settings
 ******************************************************************************** */

/*********************************************************************************
 * 3. Search Form Settings
 ******************************************************************************** */

/*********************************************************************************
 * 4. Footer Settings
 ******************************************************************************** */

/*********************************************************************************
 * 5. Footer Widgets Settings
 ******************************************************************************** */

/*********************************************************************************
 * 6. Footer Copyright Settings
 ******************************************************************************** */

/*********************************************************************************
 * 7. Blog Options
 ******************************************************************************** */

/*********************************************************************************
 * 8. Single Post Settings
 ******************************************************************************** */

/*********************************************************************************
 * 9. Team Options
 ******************************************************************************** */

/*********************************************************************************
 * 10. WooCommerce Options
 ******************************************************************************** */

/*********************************************************************************
 * 11. Page Pre-Loader Options
 ******************************************************************************** */
Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Page Pre-Loader', 'universal' ),
	'id'     => 'universal__section-page-pre-loader',
	'icon'   => 'el el-repeat',
	'fields' => array(

		// Show or hide page pre-loader.
		array(
			'id'       => 'universal__opt-page-pre-loader',
			'type'     => 'switch',
			'title'    => esc_html__( 'Use Page Pre-Loader', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to use page pre-loader.', 'universal' ),
			'desc'     => esc_html__( 'If turn on you will see spinner before content will be shown.' ),
			'default'  => 1,
			'on'       => esc_html__( 'Yes', 'universal' ),
			'of'       => esc_html__( 'No', 'universal' ),
		),

		// Enable or disable styling for page pre-loader.
		array(
			'id'       => 'universal__opt-custom-page-pre-loader',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable styling for page pre-loader', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to change colors for page pre-loader.', 'universal' ),
			'default'  => false,
			'on'       => esc_html__( 'Yes', 'universal' ),
			'of'       => esc_html__( 'No', 'universal' ),
			'required' => array( 'universal__opt-page-pre-loader', '=', '1' ),
		),

		// Choose background color for page pre-loader.
		array(
			'id'                    => 'universal_opt-page-pre-loader-bg',
			'type'                  => 'background',
			'output'                => array( '.page-pre-loader' ),
			'title'                 => esc_html__( 'Page pre-loader background', 'universal' ),
			'subtitle'              => esc_html__( 'Choose background color for page pre-loader screen.', 'universal' ),
			'preview'               => false,
			'background-size'       => false,
			'background-repeat'     => false,
			'background-attachment' => false,
			'background-position'   => false,
			'background-image'      => false,
			'transparent'           => false,
			'default'               => array(
				'background-color' => '#fefefe',
			),
			'required'              => array(
				array( 'universal__opt-page-pre-loader', '=', 1 ),
				array( 'universal__opt-custom-page-pre-loader', '=', 1 ),
			),
		),

		// Choose color for spinning bar.
		array(
			'id'          => 'universal__opt-page-pre-loader-bar-color1',
			'type'        => 'color',
			'title'       => esc_html__( 'Spinning Bar Color Primary', 'universal' ),
			'subtitle'    => esc_html__( 'Choose color for spinning bar.', 'universal' ),
			'default'     => '#99c24d',
			'transparent' => false,
			'required'    => array(
				array( 'universal__opt-page-pre-loader', '=', 1 ),
				array( 'universal__opt-custom-page-pre-loader', '=', 1 ),
			),
		),

		// Choose dimension for spinning bar.
		array(
			'id'            => 'universal__opt-page-pre-loader-spinner-size',
			'type'          => 'dimensions',
			'units'         => array( 'px' ),
			'output'        => array( '.page-pre-loader .pre-loader' ),
			'unit_extended' => false,
			'title'         => esc_html__( 'Spinner Size', 'universal' ),
			'subtitle'      => esc_html__( 'Setup spinner size.', 'universal' ),
			'desc'          => esc_html__( 'Spinner size can be set in px.', 'universal' ),
			'height'        => false,
			'default'       => array(
				'width' => 60,
			),
			'required'      => array(
				array( 'universal__opt-page-pre-loader', '=', 1 ),
				array( 'universal__opt-custom-page-pre-loader', '=', 1 ),
			),
		),

	),
) );

/*********************************************************************************
 * 12. 404 Page Options
 ******************************************************************************** */

/*********************************************************************************
 * 13. 404 Page Styling
 ******************************************************************************** */

/*********************************************************************************
 * 14. Coming Soon Page Options
 ******************************************************************************** */

/*********************************************************************************
 * 15. Under Construction Page Options
 ******************************************************************************** */

/*********************************************************************************
 * 16. Social Media Options
 ******************************************************************************** */

/*********************************************************************************
 * 17. Custom CSS
 ******************************************************************************** */

/***********************************************************************************
 *
 * END SECTIONS
 *
 ********************************************************************************** */
