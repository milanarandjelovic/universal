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
	'intro_text'            => esc_html__( 'Universal Theme Options', 'universal' ),
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
	'output_tag'            => false,
	// Disable to print dynamic CSS on page head. See CustomStyling class, method universal_custom_styling.
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
 * 3. Header Top Bar Settings
 * 4. Search Form Settings
 * 5. Footer Settings
 * 6. Footer Widgets Settings
 * 7. Footer Copyright Settings
 * 8. Blog Options
 * 9. Single Post Settings
 * 10. Team Options
 * 11. WooCommerce Options
 * 12. Page Pre-Loader Options
 * 13. 404 Page Options
 * 14. 404 Page Styling
 * 15. Coming Soon Page Options
 * 16. Under Construction Page Options
 * 17. Social Media Options
 * 18. Custom CSS
 * 19. Theme Information
 ********************************************************************************* */

/*********************************************************************************
 * 1. General Settings
 ******************************************************************************** */
Redux::setSection( $opt_name, array(
	'id'     => 'universal__section-general',
	'title'  => esc_html__( 'General Settings', 'universal' ),
	'icon'   => 'el el-folder-open',
	'fields' => array(

		// Custom logo.
		array(
			'id'       => 'universal__opt-custom-logo',
			'type'     => 'media',
			'title'    => esc_html__( 'Logo Image', 'universal' ),
			'desc'     => esc_html__( 'Upload your image or remove image if you want to use text logo.', 'universal' ),
			'url'      => true,
			'compiler' => true,
			'default'  => array(
				'url' => '',
			),
			'width'    => '',
			'height'   => '',
		),

		// Logo width.
		array(
			'id'             => 'universal__opt-custom-logo-width',
			'title'          => esc_html__( 'Logo With', 'universal' ),
			'subtitle'       => esc_html__( 'Set your logo width.', 'universal' ),
			'desc'           => esc_html__( 'Logo width can be set in px. Height will automatically calculated.', 'universal' ),
			'type'           => 'dimensions',
			'units'          => array( 'px' ),
			'units_extended' => 'false',
			'height'         => false,
			'default'        => array(
				'width' => 100,
			),
		),

		// Logo width on mobile.
		array(
			'id'             => 'universal__opt-custom-logo-width-mobile',
			'title'          => esc_html__( 'Logo With', 'universal' ),
			'subtitle'       => esc_html__( 'Set your logo width on mobile.', 'universal' ),
			'desc'           => esc_html__( 'Logo width can be set in px. Height will automatically calculated.', 'universal' ),
			'type'           => 'dimensions',
			'units'          => array( 'px' ),
			'units_extended' => 'false',
			'height'         => false,
			'default'        => array(
				'width' => 80,
			),
		),
	),
) );

/*********************************************************************************
 * 2. Header Settings
 ******************************************************************************** */
Redux::setSection( $opt_name, array(
	'id'     => 'universal__section-header',
	'title'  => esc_html__( 'Header', 'universal' ),
	'icon'   => 'el el-arrow-up',
	'fields' => array(

		// Sticky Header.
		array(
			'id'       => 'universal__opt-sticky-header',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Sticky header', 'universal' ),
			'subtitle' => esc_html__( 'The header will remain in view at the top.', 'universal' ),
			'default'  => 1,
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
		),
	),
) );

/*********************************************************************************
 * 3. Header Top Bar Settings
 ******************************************************************************** */
Redux::setSection( $opt_name, array(
	'id'         => 'universal__subsection-header-top-bar',
	'title'      => esc_html__( 'Top Bar', 'universal' ),
	'subsection' => true,
	'fields'     => array(

		array(
			'id'       => 'universal__section-header-top-bar-content-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Layout Options', 'universal' ),
			'subtitle' => esc_html__( 'In section you can organize elements in the Header Top Bar.', 'universal' ),
			'indent'   => true,
		),

		// Show or hide header top bar.
		array(
			'id'       => 'universal__opt-header-top-bar',
			'title'    => esc_html__( 'Show Header Top Bar', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to show Top Bar in the top of the Header.', 'universal' ),
			'type'     => 'switch',
			'default'  => 1,
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
		),

		// Show or hide phone number.
		array(
			'id'       => 'universal__opt-header-top-bar-phone',
			'title'    => esc_html__( 'Display phone number', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to display phone number in header top bar.', 'universal' ),
			'type'     => 'switch',
			'default'  => 1,
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
			'required' => array( 'universal__opt-header-top-bar', '=', '1' ),
		),

		// Phone number.
		array(
			'id'       => 'universal__opt-header-top-bar-phone-number',
			'title'    => esc_html__( 'Phone number', 'universal' ),
			'subtitle' => esc_html__( 'Number to display next to the phone icon.', 'universal' ),
			'type'     => 'text',
			'default'  => esc_html__( '+1-325-148-910', 'universal' ),
			'required' => array( 'universal__opt-header-top-bar-phone', '=', '1' ),
		),

		// Show or hide email address.
		array(
			'id'       => 'universal__opt-header-top-bar-email',
			'title'    => esc_html__( 'Display email', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to display the email address in header top bar.', 'universal' ),
			'type'     => 'switch',
			'default'  => 1,
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
			'required' => array( 'universal__opt-header-top-bar', '=', '1' ),
		),

		// Email address.
		array(
			'id'       => 'universal__opt-header-top-bar-email-address',
			'title'    => esc_html__( 'Email address', 'universal' ),
			'subtitle' => esc_html__( 'Email address to display next to the envelope icon.', 'universal' ),
			'type'     => 'text',
			'default'  => esc_html__( 'example@email.com', 'universal' ),
			'required' => array( 'universal__opt-header-top-bar-email', '=', '1' ),
		),

		// Switch for custom text.
		array(
			'id'       => 'universal__opt-header-top-bar-custom-text-switch',
			'title'    => esc_html__( 'Display custom text', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to display custom icon in the top header bar.', 'universal' ),
			'type'     => 'switch',
			'default'  => 0,
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
			'required' => array( 'universal__opt-header-top-bar', '=', '1' ),
		),

		// Custom text in top header bar.
		array(
			'id'       => 'universal__opt-header-top-bar-custom-text',
			'title'    => esc_html__( 'Custom text', 'universal' ),
			'subtitle' => esc_html__( 'Enter your custom text or link.', 'universal' ),
			'desc'     => esc_html__( 'HTML tags are allowed.', 'universal' ),
			'type'     => 'text',
			'default'  => esc_html__( 'Your custom text here', 'universal' ),
			'required' => array( 'universal__opt-header-top-bar-custom-text-switch', '=', '1' ),
		),
	),
) );

/*********************************************************************************
 * 4. Search Form Settings
 ******************************************************************************** */

/*********************************************************************************
 * 5. Footer Settings
 ******************************************************************************** */
Redux::setSection( $opt_name, array(
	'id'     => 'universal__section-footer',
	'title'  => esc_html__( 'Footer', 'universal' ),
	'icon'   => 'el el-arrow-down',
	'fields' => array(

		// Show or hide social links in footer.
		array(
			'id'       => 'universal__opt-footer-social-in-footer',
			'title'    => esc_html__( 'Show Social Media Links', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to show social media links.', 'universal' ),
			'type'     => 'switch',
			'default'  => 1,
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
		),
	),
) );

/*********************************************************************************
 * 6. Footer Widgets Settings
 ******************************************************************************** */
Redux::setSection( $opt_name, array(
	'id'         => 'universal__subsection-footer-widgets',
	'title'      => esc_html__( 'Widgets', 'universal' ),
	'subsection' => true,
	'fields'     => array(

		// Show or hide footer widgets.
		array(
			'id'       => 'universal__opt-footer-widgets',
			'title'    => esc_html__( 'Show Footer Widgets', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to show Footer Widgets.', 'universal' ),
			'type'     => 'switch',
			'default'  => 1,
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
		),

		// Footer widgets layout.
		array(
			'id'       => 'universal__opt-footer-widgets-layout',
			'title'    => esc_html__( 'Footer Widgets Layout', 'universal' ),
			'subtitle' => esc_html__( 'Select footer widgets layout.', 'universal' ),
			'type'     => 'image_select',
			'compiler' => true,
			'default'  => '1',
			'options'  => array(
				'1' => array(
					'alt' => esc_html__( '4 equals column', 'universal' ),
					'img' => UNIVERSAL_ADMIN_IMAGES_URI . 'footer/footer-widgets-4-col-equal.png',
				),
				'2' => array(
					'alt' => esc_html__( '3 equals column', 'universal' ),
					'img' => UNIVERSAL_ADMIN_IMAGES_URI . 'footer/footer-widgets-3-col-equal.png',
				),
				'3' => array(
					'alt' => esc_html__( '2 column left wider', 'universal' ),
					'img' => UNIVERSAL_ADMIN_IMAGES_URI . 'footer/footer-widgets-2-col-left-wider.png',
				),
				'4' => array(
					'alt' => esc_html__( '2 column right wider', 'universal' ),
					'img' => UNIVERSAL_ADMIN_IMAGES_URI . 'footer/footer-widgets-2-col-right-wider.png',
				),
			),
			'required' => array( 'universal__opt-footer-widgets', '=', '1' ),
		),
	),
) );

/*********************************************************************************
 * 7. Footer Copyright Settings
 ******************************************************************************** */
Redux::setSection( $opt_name, array(
	'id'         => 'universal__subsection-footer-copyright',
	'title'      => esc_html__( 'Copyright', 'universal' ),
	'subsection' => true,
	'fields'     => array(

		// Show or hide footer copyright.
		array(
			'id'       => 'universal__opt-footer-copyright',
			'title'    => esc_html__( 'Show Footer Copyright', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to show footer copyright.', 'universal' ),
			'type'     => 'switch',
			'default'  => 1,
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
		),

		// Columns number in footer copyright.
		array(
			'id'       => 'universal__opt-footer-copyright-col-num',
			'title'    => esc_html__( 'Copyright columns number', 'universal' ),
			'subtitle' => esc_html__( 'Select number of column for copyright.', 'universal' ),
			'type'     => 'select',
			'required' => array( 'universal__opt-footer-copyright', '=', 1 ),
			'default'  => '3',
			'options'  => array(
				'1' => esc_html__( '1 column', 'universal' ),
				'2' => esc_html__( '2 columns', 'universal' ),
				'3' => esc_html__( '3 columns', 'universal' ),
			),
		),

		// Copyright text column 1.
		array(
			'id'       => 'universal__opt-footer-copyright-col-1-text',
			'title'    => esc_html__( 'Copyright text column 1', 'universal' ),
			'type'     => 'textarea',
			'default'  => '&copy; Copyright 2016 - ' . date( 'Y' ),
			'required' => array( 'universal__opt-footer-copyright', '=', 1 ),
		),

		// Copyright text column 2.
		array(
			'id'       => 'universal__opt-footer-copyright-col-2-text',
			'title'    => esc_html__( 'Copyright text column 2', 'universal' ),
			'type'     => 'textarea',
			'default'  => 'Universal Theme by <a href="https://github.com/milanarandjelovic">Milan Arandjelovic</a>',
			'required' => array( 'universal__opt-footer-copyright', '=', 1 ),
		),

		// Copyright text column 3.
		array(
			'id'       => 'universal__opt-footer-copyright-col-3-text',
			'title'    => esc_html__( 'Copyright text column 3', 'universal' ),
			'type'     => 'textarea',
			'default'  => 'All Rights Reserved',
			'required' => array( 'universal__opt-footer-copyright', '=', 1 ),
		),
	),
) );

/*********************************************************************************
 * 8. Blog Options
 ******************************************************************************** */

/*********************************************************************************
 * 9. Single Post Settings
 ******************************************************************************** */

/*********************************************************************************
 * 10. Team Options
 ******************************************************************************** */

/*********************************************************************************
 * 11. WooCommerce Options
 ******************************************************************************** */

/*********************************************************************************
 * 12. Page Pre-Loader Options
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
			'id'                    => 'universal__opt-page-pre-loader-bg',
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
 * 13. 404 Page Options
 ******************************************************************************** */

/*********************************************************************************
 * 14. 404 Page Styling
 ******************************************************************************** */

/*********************************************************************************
 * 15. Coming Soon Page Options
 ******************************************************************************** */

/*********************************************************************************
 * 16. Under Construction Page Options
 ******************************************************************************** */

/*********************************************************************************
 * 17. Social Media Options
 ******************************************************************************** */
Redux::setSection( $opt_name, array(
	'id'     => 'universal__section-footer-social-media',
	'title'  => esc_html__( 'Social Media', 'universal' ),
	'icon'   => 'el el-globe',
	'fields' => array(

		// Social media links.
		array(
			'id'       => 'universal__opt-social-media',
			'title'    => esc_html__( 'Social Media Links', 'universal' ),
			'subtitle' => esc_html__( 'Add your social links.', 'universal' ),
			'desc'     => esc_html__( 'Leave empty field if you don\'t want to display particular social media links.' ),
			'type'     => 'sortable',
			'label'    => true,
			'mode'     => 'text',
			'options'  => array(
				esc_html__( 'Facebook URL', 'universal' )  => '',
				esc_html__( 'Google+ URL', 'universal' )   => '',
				esc_html__( 'Twitter URL', 'universal' )   => '',
				esc_html__( 'Youtube URL', 'universal' )   => '',
				esc_html__( 'LinkedIn URL', 'universal' )  => '',
				esc_html__( 'Github URL', 'universal' )    => '',
				esc_html__( 'Bitbucket URL', 'universal' ) => '',
				esc_html__( 'Instagram URL', 'universal' ) => '',
				esc_html__( 'Pinterest URL', 'universal' ) => '',
				esc_html__( 'VK URL', 'universal' )        => '',
				esc_html__( 'Tumblr URL', 'universal' )    => '',
				esc_html__( 'Vimeo URL', 'universal' )     => '',
				esc_html__( 'Dribbble URL', 'universal' )  => '',
				esc_html__( 'Flickr URL', 'universal' )    => '',
				esc_html__( 'Yelp URL', 'universal' )      => '',
			),
			'default'  => array(
				esc_html__( 'Facebook URL', 'universal' )  => '#',
				esc_html__( 'Google+ URL', 'universal' )   => '#',
				esc_html__( 'Twitter URL', 'universal' )   => '#',
				esc_html__( 'Youtube URL', 'universal' )   => '#',
				esc_html__( 'Instagram URL', 'universal' ) => '',
				esc_html__( 'Github URL', 'universal' )    => '#',
				esc_html__( 'Bitbucket URL', 'universal' ) => '',
				esc_html__( 'LinkedIn URL', 'universal' )  => '',
				esc_html__( 'Pinterest URL', 'universal' ) => '',
				esc_html__( 'VK URL', 'universal' )        => '',
				esc_html__( 'Tumblr URL', 'universal' )    => '',
				esc_html__( 'Vimeo URL', 'universal' )     => '',
				esc_html__( 'Dribbble URL', 'universal' )  => '',
				esc_html__( 'Flickr URL', 'universal' )    => '',
				esc_html__( 'Yelp URL', 'universal' )      => '',
			),
		),
	),
) );

/*********************************************************************************
 * 18. Custom CSS
 ******************************************************************************** */
Redux::setSection( $opt_name, array(
	'id'     => 'universal__section-custom-css',
	'title'  => esc_html__( 'Custom CSS', 'universal' ),
	'icon'   => 'el el-css',
	'fields' => array(

		// Custom CSS code.
		array(
			'id'       => 'universal__opt-custom-css',
			'title'    => esc_html__( 'CSS code', 'universal' ),
			'subtitle' => esc_html__( 'Paste your custom CSS code here.', 'universal' ),
			'desc'     => esc_html__( 'Any custom CSS can be added here, it will override the theme CSS.' ),
			'type'     => 'ace_editor',
			'mode'     => 'css',
			'theme'    => 'monokai',
			'default'  => '',
		),
	),
) );

/*********************************************************************************
 * 19. Theme Information
 ******************************************************************************** */
if ( file_exists( get_template_directory() . '/readme.txt' ) ) {
	Redux::setSection( $opt_name, array(
		'id'     => 'universal-readme',
		'icon'   => 'el-icon-list-alt',
		'title'  => esc_html__( 'Theme Information', 'universal' ),
		'fields' => array(
			array(
				'id'       => 'universal-readme-description',
				'type'     => 'raw',
				'markdown' => true,
				'content'  => file_get_contents( get_template_directory() . '/readme.txt' ),
			),
		),
	) );
}

/***********************************************************************************
 *
 * END SECTIONS
 *
 ********************************************************************************** */
