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
	'menu_icon'             => UNIVERSAL_ADMIN_IMAGES_URI . 'logo/universal-logo.png',
	'menu_title'            => esc_html__( 'Universal', 'universal' ),
	'allow_sub_menu'        => true,
	'page_parent_post_type' => 'your_post_type',
	'page_priority'         => 3,
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
	// Disable to print dynamic CSS on page head. See CustomStyling class, method universal_custom_styling.
	'output_tag'            => false,
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

/**********************************************************************************
 *
 * START SECTIONS
 *
 * 1. General Settings
 * 2. Header Settings
 *      2.1. Header Top Bar Settings
 * 3. Search Form Settings
 * 4. Footer Settings
 *      4.1. Footer Widgets Settings
 *      4.2. Footer Copyright Settings
 * 5. Blog Options
 *      5.1. Single Post Settings
 *      5.2. Blog Styling
 * 6. Team Options
 * 7. WooCommerce Options
 * 8. Page Pre-Loader Options
 * 9. 404 Page Options
 *      9.1. 404 Page Styling
 * 10. Coming Soon Page Options
 * 11. Under Construction Page Options
 * 12. Social Media Options
 *      12.1. Social Sharing Box
 * 13. Extra Options
 *      13.1. Pagination
 * 14. Custom CSS
 * 15. Theme Information
 ********************************************************************************* */
/***********************************************************************************
 *
 * END ARGUMENTS
 *
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
			'desc'           => esc_html__( 'Logo width can be set in px. Height will automatically calculated.',
				'universal' ),
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
			'desc'           => esc_html__( 'Logo width can be set in px. Height will automatically calculated.',
				'universal' ),
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
 * 2.1. Header Top Bar Settings
 ******************************************************************************** */
Redux::setSection( $opt_name, array(
	'id'         => 'universal__subsection-header-top-bar',
	'title'      => esc_html__( 'Top Bar', 'universal' ),
	'subsection' => true,
	'fields'     => array(

		// Section for layout options.
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
 * 3. Search Form Settings
 ******************************************************************************** */

/*********************************************************************************
 * 4. Footer Settings
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
 * 4.1. Footer Widgets Settings
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
 * 4.2. Footer Copyright Settings
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
 * 5. Blog Options
 ******************************************************************************** */
Redux::setSection( $opt_name, array(
	'id'     => 'universal__section-blog',
	'title'  => esc_html__( 'Blog', 'universal' ),
	'icon'   => 'el el-list',
	'fields' => array(

		// Section for blog page styling.
		array(
			'id'       => 'universal__section-blog-general-section',
			'type'     => 'section',
			'title'    => esc_html__( 'General Blog', 'universal' ),
			'subtitle' => esc_html__( 'General settings for blog page.', 'universal' ),
			'indent'   => true,
		),

		// Blog title.
		array(
			'id'          => 'universal__opt-blog-title',
			'title'       => esc_html__( 'Blog Page Title', 'universal' ),
			'subtitle'    => esc_html__( 'This title used in blog page.', 'universal' ),
			'description' => esc_html__( 'Enter your blog title used on blog page.', 'universal' ),
			'type'        => 'text',
			'default'     => esc_html__( 'Blog', 'universal' ),
		),

		// Blog sidebar position.
		array(
			'id'          => 'universal__opt-blog-sidebar',
			'title'       => esc_html__( 'Sidebar Position', 'universal' ),
			'subtitle'    => esc_html__( 'Blog sidebar position.', 'universal' ),
			'description' => esc_html__( 'Select sidebar position for blog.', 'universal' ),
			'type'        => 'image_select',
			'compiler'    => true,
			'default'     => '1',
			'options'     => array(
				'1' => array(
					'alt' => 'Right sidebar',
					'img' => UNIVERSAL_ADMIN_IMAGES_URI . '2cr.png',
				),
				'2' => array(
					'alt' => 'Left sidebar',
					'img' => UNIVERSAL_ADMIN_IMAGES_URI . '2cl.png',
				),
			),
		),

		// Sidebar width.
		array(
			'id'       => 'universal__opt-blog-sidebar-width',
			'title'    => esc_html__( 'Sidebar Width', 'universal' ),
			'subtitle' => esc_html__( 'Select the width for sidebar.', 'universal' ),
			'type'     => 'select',
			'default'  => '1',
			'options'  => array(
				'1' => '25%',
				'2' => '33%',
			),
		),

		// Read more text.
		array(
			'id'       => 'universal__opt-blog-read-more-text',
			'title'    => esc_html__( 'Read More Text', 'universal' ),
			'desc'     => __( 'Enter text for \'Read More\' post. Example <em>\'Read More\'</em>.', 'universal' ),
			'type'     => 'text',
			'validate' => 'not_empty',
			'msg'      => esc_html__( 'Fill read more button text', 'universal' ),
			'default'  => esc_html__( 'Read More', 'universal' ),
		),

		// Pagination type.
		array(
			'id'       => 'universal__opt-blog-pagination-type',
			'title'    => esc_html__( 'Pagination Type', 'universal' ),
			'subtitle' => esc_html__( 'Controls the pagination type for the assigned blog page in "settings->reading" or blog archive pages.',
				'universal' ),
			'type'     => 'button_set',
			'default'  => 'pagination',
			'options'  => array(
				'pagination'       => esc_html__( 'Pagination', 'universal' ),
				'infinite_scroll'  => esc_html__( 'Infinite Scroll', 'universal' ),
				'load_more_button' => esc_html__( 'Load More Button', 'universal' ),
			),
		),

		// Change pagination position (left|center|right).
		array(
			'id'       => 'universal__opt-blog-pagination-position',
			'title'    => esc_html__( 'Pagination Position', 'universal' ),
			'subtitle' => esc_html__( 'Controls the pagination position.', 'universal' ),
			'type'     => 'select',
			'validate' => 'not_empty',
			'options'  => array(
				'start'  => 'left',
				'center' => 'center',
				'end'    => 'right',
			),
			'default'  => 'center',
			'required' => array( 'universal__opt-blog-pagination-type', '=', 'pagination' ),
		),

		// Load more text.
		array(
			'id'       => 'universal__opt-blog-load-more-text',
			'title'    => esc_html__( 'Read More Text', 'universal' ),
			'desc'     => __( 'Enter text for \'Load More Posts\' post. Example <em>\'Load More Posts\'</em>.',
				'universal' ),
			'type'     => 'text',
			'validate' => 'not_empty',
			'msg'      => esc_html__( 'Fill read more button text', 'universal' ),
			'default'  => esc_html__( 'Load More Posts', 'universal' ),
			'required' => array( 'universal__opt-blog-pagination-type', '=', 'load_more_button' ),
		),
	),
) );

/*********************************************************************************
 * 5.1. Single Post Settings
 ******************************************************************************** */
Redux::setSection( $opt_name, array(
	'id'         => 'universal__subsection-blog-sp',
	'title'      => esc_html__( 'Single Post', 'universal' ),
	'subsection' => true,
	'fields'     => array(

		// Show or hide single post title.
		array(
			'id'       => 'universal__opt-blog-sp-title',
			'title'    => esc_html__( 'Show Single Post Title', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to show single post title.', 'universal' ),
			'desc'     => esc_html__( 'You can find single post title under the feature image.', 'universal' ),
			'type'     => 'switch',
			'default'  => '1',
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
		),

		// Single post title position.
		array(
			'id'       => 'universal__opt-blog-sp-title-position',
			'title'    => esc_html__( 'Position For Single Post Title', 'universal' ),
			'subtitle' => esc_html__( 'Controls position post title.', 'universal' ),
			'desc'     => esc_html__( 'Display post title above or bellow featured image.', 'universal' ),
			'type'     => 'button_set',
			'default'  => 'above',
			'options'  => array(
				'above'  => esc_html__( 'Above', 'universal' ),
				'bellow' => esc_html__( 'Bellow', 'universal' ),
			),
			'required' => array( 'universal__opt-blog-sp-title', '=', '1' ),
		),

		// Show or hide post thumbnail.
		array(
			'id'       => 'universal__opt-blog-sp-thumbnail',
			'title'    => esc_html__( 'Show Featured Image', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to show feature image.', 'universal' ),
			'desc'     => esc_html__( 'This option enable or disable feature image visibility only on single post page.',
				'universal' ),
			'type'     => 'switch',
			'default'  => '1',
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
		),

		// Show or hide post navigation.
		array(
			'id'       => 'universal__opt-blog-sp-navigation',
			'title'    => esc_html__( 'Show Single Post Navigation', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to show previous/next post navigation.', 'universal' ),
			'desc'     => esc_html__( 'Display the previous/next post navigation for single blog post.', 'universal' ),
			'type'     => 'switch',
			'default'  => '1',
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
		),

		// Single post navigation position.
		array(
			'id'       => 'universal__opt-blog-sp-navigation-position',
			'title'    => esc_html__( 'Single Post Navigation Position', 'universal' ),
			'subtitle' => esc_html__( 'Chose where single post navigation is positioned.', 'universal' ),
			'type'     => 'button_set',
			'default'  => 'above',
			'options'  => array(
				'above'  => esc_html__( 'Above article', 'universal' ),
				'bellow' => esc_html__( 'Bellow article', 'universal' ),
			),
			'required' => array( 'universal__opt-blog-sp-navigation', '=', '1' ),
		),

		// Show or hide post social share button.
		array(
			'id'       => 'universal__opt-blog-sp-social-btn',
			'title'    => esc_html__( 'Show Social Sharing Button', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to show social sharing buttons.', 'universal' ),
			'desc'     => esc_html__( 'Social sharing button displayed by default.', 'universal' ),
			'type'     => 'switch',
			'default'  => '1',
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
		),

		// Show or hide meta data.
		array(
			'id'       => 'universal__opt-blog-sp-show-meta-data',
			'title'    => esc_html__( 'Show Meta Data', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to show meta data.', 'universal' ),
			'desc'     => esc_html__( 'Meta data displayed by default.', 'universal' ),
			'type'     => 'switch',
			'default'  => '1',
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
		),

		// Single post title position.
		array(
			'id'       => 'universal__opt-blog-sp-meta-data-position',
			'title'    => esc_html__( 'Meta Data Position', 'universal' ),
			'subtitle' => esc_html__( 'Chose where meta data is positioned.', 'universal' ),
			'type'     => 'button_set',
			'default'  => 'above',
			'options'  => array(
				'above'  => esc_html__( 'Above article', 'universal' ),
				'bellow' => esc_html__( 'Bellow article', 'universal' ),
			),
			'required' => array( 'universal__opt-blog-sp-show-meta-data', '=', '1' ),
		),

		// Show or hide single post publisher.
		array(
			'id'       => 'universal__opt-blog-sp-publisher',
			'title'    => esc_html__( 'Show Post Publisher', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to show single post publisher.', 'universal' ),
			'desc'     => esc_html__( 'Post publisher displayed by default.', 'universal' ),
			'type'     => 'switch',
			'default'  => '1',
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
			'required' => array( 'universal__opt-blog-sp-show-meta-data', '=', '1' ),
		),

		// Show or hide single post date.
		array(
			'id'       => 'universal__opt-blog-sp-date',
			'title'    => esc_html__( 'Show Date', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to show single post date.', 'universal' ),
			'desc'     => esc_html__( 'Single post date displayed by default.', 'universal' ),
			'type'     => 'switch',
			'default'  => '1',
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
			'required' => array( 'universal__opt-blog-sp-show-meta-data', '=', '1' ),
		),

		// Show or hide single post categories.
		array(
			'id'       => 'universal__opt-blog-sp-categories',
			'title'    => esc_html__( 'Show Single Post Categories', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to show single post categories.', 'universal' ),
			'desc'     => esc_html__( 'Single post categories displayed by default.', 'universal' ),
			'type'     => 'switch',
			'default'  => '1',
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
			'required' => array( 'universal__opt-blog-sp-show-meta-data', '=', '1' ),
		),

		// Show or hide single post tags.
		array(
			'id'       => 'universal__opt-blog-sp-tags',
			'title'    => esc_html__( 'Show Single Post Tags', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to show single post tags.', 'universal' ),
			'desc'     => esc_html__( 'Single post tags displayed by default.', 'universal' ),
			'type'     => 'switch',
			'default'  => '1',
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
			'required' => array( 'universal__opt-blog-sp-show-meta-data', '=', '1' ),
		),

		// Show or hide single post comment number.
		array(
			'id'       => 'universal__opt-blog-sp-comment-num',
			'title'    => esc_html__( 'Show Single Post Comment Number', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to show single post comment number.', 'universal' ),
			'desc'     => esc_html__( 'Single post comment number displayed by default.', 'universal' ),
			'type'     => 'switch',
			'default'  => '1',
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
			'required' => array( 'universal__opt-blog-sp-show-meta-data', '=', '1' ),
		),

		// Show or hide author info (bio).
		array(
			'id'       => 'universal__opt-blog-sp-author-info',
			'title'    => esc_html__( 'Show Author Info Box', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to show author info box below post.', 'universal' ),
			'type'     => 'switch',
			'default'  => '1',
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
		),

		// Show or hide related posts.
		array(
			'id'       => 'universal__opt-blog-sp-related-posts',
			'title'    => esc_html__( 'Show Related Posts', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to show related posts.', 'universal' ),
			'desc'     => esc_html__( 'Related posts displayed by default.', 'universal' ),
			'type'     => 'switch',
			'default'  => '1',
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
		),

		// Show or hide single post comments.
		array(
			'id'       => 'universal__opt-blog-sp-comments',
			'title'    => esc_html__( 'Show Single Post Comments', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to show single post comments.', 'universal' ),
			'desc'     => esc_html__( 'Comments displayed by default.', 'universal' ),
			'type'     => 'switch',
			'default'  => '1',
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
		),
	),
) );

/*********************************************************************************
 * 5.2. Blog Styling
 ******************************************************************************** */
Redux::setSection( $opt_name, array(
	'id'         => 'universal__subsection-blog-styling',
	'title'      => esc_html__( 'Styling', 'universal' ),
	'subsection' => true,
	'fields'     => array(

		// Enable or disable advanced post styling.
		array(
			'id'       => 'universal__option-blog-styling',
			'title'    => esc_html__( 'Enable advanced post styling', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to change appearance for post.', 'universal' ),
			'type'     => 'switch',
			'default'  => '0',
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
		),

		// Section for blog page styling.
		array(
			'id'       => 'universal__section-blog-styling-blog-page',
			'type'     => 'section',
			'title'    => esc_html__( 'Blog Page Styling', 'universal' ),
			'subtitle' => esc_html__( 'All styling for blog page.', 'universal' ),
			'indent'   => true,
			'required' => array( 'universal__option-blog-styling', '=', '1' ),
		),

		// Custom color for link regular, hover and active.
		array(
			'id'       => 'universal__option-blog-footer-link-color',
			'title'    => esc_html__( 'Link Color', 'universal' ),
			'subtitle' => esc_html__( 'Color option for link.', 'universal' ),
			'type'     => 'link_color',
			'default'  => array(
				'regular' => '#999',
				'hover'   => '#a0ce4e',
				'active'  => '#a0ce4e',
			),
			'required' => array( 'universal__option-blog-styling', '=', '1' ),
		),

		// Custom background color for post.
		array(
			'id'                    => 'universal__option-blog-styling-post-bg',
			'title'                 => esc_html__( 'Post Background Color', 'universal' ),
			'subtitle'              => esc_html__( 'Background color for post.', 'universal' ),
			'type'                  => 'background',
			'output'                => array( 'article.post' ),
			'preview'               => false,
			'background-size'       => false,
			'background-repeat'     => false,
			'background-attachment' => false,
			'background-position'   => false,
			'background-image'      => false,
			'default'               => array(
				'background-color' => '#f8f9fa',
			),
			'required'              => array( 'universal__option-blog-styling', '=', '1' ),
		),

		// Custom color for blog border.
		array(
			'id'       => 'universal__option-blog-styling-post-border',
			'title'    => esc_html__( 'Post Border', 'universal' ),
			'subtitle' => esc_html__( 'Border options for post.', 'universal' ),
			'type'     => 'border',
			'output'   => array( 'article.post' ),
			'default'  => array(
				'border-color'  => '#d2d2dd',
				'border-style'  => 'solid',
				'border-top'    => '1px',
				'border-left'   => '1px',
				'border-right'  => '1px',
				'border-bottom' => '1px',
			),
			'required' => array( 'universal__option-blog-styling', '=', '1' ),
		),

		// Custom color for blog title border.
		array(
			'id'       => 'universal__option-blog-styling-post--title-border',
			'title'    => esc_html__( 'Post Title Border', 'universal' ),
			'subtitle' => esc_html__( 'Border title options for post.', 'universal' ),
			'desc'     => esc_html__( 'Options for post title pn blog page. Border bottom is set by default 1px.',
				'universal' ),
			'type'     => 'border',
			'output'   => array( '.entry-header .title-bordered' ),
			'all'      => false,
			'top'      => false,
			'left'     => false,
			'right'    => false,
			'default'  => array(
				'border-color'  => '#d9d9d9',
				'border-style'  => 'solid',
				'border-bottom' => '1px',
			),
			'required' => array( 'universal__option-blog-styling', '=', '1' ),
		),

		// Show or hide post date.
		array(
			'id'       => 'universal__option-blog-post-date',
			'title'    => esc_html__( 'Show Post Date', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to show or hide post date.', 'universal' ),
			'desc'     => esc_html__( 'Post date disabled by default.', 'universal' ),
			'type'     => 'switch',
			'default'  => '1',
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
			'required' => array( 'universal__option-blog-styling', '=', '1' ),
		),

		// Custom background color for post date.
		array(
			'id'                    => 'universal__option-blog-post-date-bg-color',
			'title'                 => esc_html__( 'Post Date Background Color', 'universal' ),
			'subtitle'              => esc_html__( 'Background color for post date.', 'universal' ),
			'type'                  => 'background',
			'output'                => array( 'article.post .entry-date' ),
			'preview'               => false,
			'background-size'       => false,
			'background-repeat'     => false,
			'background-attachment' => false,
			'background-position'   => false,
			'background-image'      => false,
			'default'               => array(
				'background-color' => '#a0ce4e',
			),
			'required'              => array(
				array( 'universal__option-blog-styling', '=', '1' ),
				array( 'universal__option-blog-post-date', '=', '1' ),
			),
		),

		// Custom color for post date.
		array(
			'id'          => 'universal__option-blog-post-date-color',
			'title'       => esc_html__( 'Post Date Text Color', 'universal' ),
			'subtitle'    => esc_html__( 'Color for post date (day and month).', 'universal' ),
			'type'        => 'color',
			'output'      => array( 'article.post .entry-date' ),
			'default'     => '#fff',
			'transparent' => false,
			'required'    => array(
				array( 'universal__option-blog-styling', '=', '1' ),
				array( 'universal__option-blog-post-date', '=', '1' ),
			),
		),

		// Custom color excerpt.
		array(
			'id'          => 'universal__option-blog-post-excerpt-color',
			'title'       => esc_html__( 'Excerpt Text Color', 'universal' ),
			'subtitle'    => esc_html__( 'Color for excerpt.', 'universal' ),
			'type'        => 'color',
			'output'      => array( 'article.post .entry-body .entry-excerpt' ),
			'default'     => '#656269',
			'transparent' => false,
			'required'    => array( 'universal__option-blog-styling', '=', '1' ),
		),

		// Show or hide post footer.
		array(
			'id'       => 'universal__option-blog-footer',
			'title'    => esc_html__( 'Show Post Footer', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to show post footer.', 'universal' ),
			'type'     => 'switch',
			'default'  => '1',
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
			'required' => array( 'universal__option-blog-styling', '=', '1' ),
		),

		// Custom background color for post footer.
		array(
			'id'                    => 'universal__option-blog-footer-bg',
			'title'                 => esc_html__( 'Post Footer Background Color', 'universal' ),
			'subtitle'              => esc_html__( 'Background color for post footer.', 'universal' ),
			'type'                  => 'background',
			'output'                => array( 'article.post .entry-footer' ),
			'preview'               => false,
			'background-size'       => false,
			'background-repeat'     => false,
			'background-attachment' => false,
			'background-position'   => false,
			'background-image'      => false,
			'default'               => array(
				'background-color' => '#f1f2f4',
			),
			'required'              => array(
				array( 'universal__option-blog-styling', '=', '1' ),
				array( 'universal__option-blog-footer', '=', '1' ),
			),
		),

		// Custom color for post footer.
		array(
			'id'          => 'universal__option-blog-footer-color',
			'title'       => esc_html__( 'Post Footer Color', 'universal' ),
			'subtitle'    => esc_html__( 'Color for post footer.', 'universal' ),
			'type'        => 'color',
			'transparent' => false,
			'default'     => '#656269',
			'required'    => array(
				array( 'universal__option-blog-styling', '=', '1' ),
				array( 'universal__option-blog-footer', '=', '1' ),
			),
		),

		// Custom top border color for post footer.
		array(
			'id'       => 'universal__option-blog-footer-border-color',
			'title'    => esc_html__( 'Post Footer Top Border Color', 'universal' ),
			'subtitle' => esc_html__( 'Top border options for post footer.', 'universal' ),
			'desc'     => esc_html__( 'Top border is set by default 1px.', 'universal' ),
			'type'     => 'border',
			'all'      => false,
			'bottom'   => false,
			'left'     => false,
			'right'    => false,
			'output'   => array( 'article.post .entry-footer' ),
			'default'  => array(
				'border-color' => '#d2d2dd',
				'border-style' => 'dashed',
				'border-top'   => '1px',
			),
			'required' => array(
				array( 'universal__option-blog-styling', '=', '1' ),
				array( 'universal__option-blog-footer', '=', '1' ),
			),
		),

		// Show or hide author in post footer.
		array(
			'id'       => 'universal__option-blog-footer-author',
			'title'    => esc_html__( 'Show Author Name?', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to show author name.', 'universal' ),
			'desc'     => __( '<em>\'Posted by author\'</em> text displayed by default in post footer.', 'universal' ),
			'type'     => 'switch',
			'default'  => '1',
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
			'required' => array(
				array( 'universal__option-blog-styling', '=', '1' ),
				array( 'universal__option-blog-footer', '=', '1' ),
			),
		),

		// Custom color for read more link.
		array(
			'id'       => 'universal__option-blog-footer-read-more',
			'title'    => esc_html__( 'Read More Color', 'universal' ),
			'subtitle' => esc_html__( 'Color option for read more link.', 'universal' ),
			'type'     => 'link_color',
			'default'  => array(
				'regular' => '#999',
				'hover'   => '#a0ce4e',
				'active'  => '#a0ce4e',
			),
			'required' => array(
				array( 'universal__option-blog-styling', '=', '1' ),
				array( 'universal__option-blog-footer', '=', '1' ),
			),
		),

		// Show or hide post footer.
		array(
			'id'       => 'universal__option-blog-categories',
			'title'    => esc_html__( 'Show Post Categories?', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to show post categories.', 'universal' ),
			'type'     => 'switch',
			'default'  => '1',
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
			'required' => array( 'universal__option-blog-styling', '=', '1' ),
		),

		// Custom background color for categories.
		array(
			'id'                    => 'universal__option-blog-categories-bg-color',
			'title'                 => esc_html__( 'Background Color For Post Categories', 'universal' ),
			'type'                  => 'background',
			'preview'               => false,
			'background-size'       => false,
			'background-repeat'     => false,
			'background-attachment' => false,
			'background-position'   => false,
			'background-image'      => false,
			'default'               => array(
				'background-color' => '#a0ce4e',
			),
			'required'              => array(
				array( 'universal__option-blog-styling', '=', '1' ),
				array( 'universal__option-blog-categories', '=', '1' ),
			),
		),

		// Custom color for categories.
		array(
			'id'          => 'universal__option-blog-categories-color',
			'title'       => esc_html__( 'Color For Post Categories', 'universal' ),
			'subtitle'    => esc_html__( 'Link color for post categories', 'universal' ),
			'type'        => 'color',
			'default'     => '#fff',
			'transparent' => false,
			'required'    => array(
				array( 'universal__option-blog-styling', '=', '1' ),
				array( 'universal__option-blog-categories', '=', '1' ),
			),
		),

		// Custom background color for infinite scroll load more button.
		array(
			'id'          => 'universal__option-blog-load-more-button-bg-color',
			'title'       => esc_html__( 'Background Color For Load More Button', 'universal' ),
			'subtitle'    => esc_html__( 'Background color for infinite scroll load more button.', 'universal' ),
			'type'        => 'color',
			'default'     => '#f1f2f4',
			'transparent' => false,
			'required'    => array(
				array( 'universal__option-blog-styling', '=', '1' ),
				array( 'universal__opt-blog-pagination-type', '=', 'load_more_button' ),
			),
		),

		// Custom color for infinite scroll load more button.
		array(
			'id'          => 'universal__option-blog-load-more-button-color',
			'title'       => esc_html__( 'Color For Load More Button', 'universal' ),
			'subtitle'    => esc_html__( 'Color for infinite scroll load more button.', 'universal' ),
			'type'        => 'color',
			'default'     => '#656269',
			'transparent' => false,
			'required'    => array(
				array( 'universal__option-blog-styling', '=', '1' ),
				array( 'universal__opt-blog-pagination-type', '=', 'load_more_button' ),
			),
		),

		// Section for single post styling.
		array(
			'id'       => 'universal__section-blog-styling-single-post',
			'type'     => 'section',
			'title'    => esc_html__( 'Single Post Styling', 'universal' ),
			'subtitle' => esc_html__( 'All styling for single post.', 'universal' ),
			'indent'   => true,
			'required' => array( 'universal__option-blog-styling', '=', '1' ),
		),
	),
) );

/*********************************************************************************
 * 6. Team Options
 ******************************************************************************** */

/*********************************************************************************
 * 7. WooCommerce Options
 ******************************************************************************** */

/*********************************************************************************
 * 8. Page Pre-Loader Options
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
			'title'    => esc_html__( 'Enable styling for page pre-loader', 'universal' ),
			'subtitle' => esc_html__( 'Turn on to change colors for page pre-loader.', 'universal' ),
			'type'     => 'switch',
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
 * 9. 404 Page Options
 ******************************************************************************** */

/*********************************************************************************
 * 9.1. 404 Page Styling
 ******************************************************************************** */

/*********************************************************************************
 * 10. Coming Soon Page Options
 ******************************************************************************** */

/*********************************************************************************
 * 11. Under Construction Page Options
 ******************************************************************************** */

/*********************************************************************************
 * 12. Social Media Options
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
 * 12.1. Social Sharing Box
 ******************************************************************************** */
Redux::setSection( $opt_name, array(
	'id'         => 'universal__subsection-sharing-box',
	'title'      => esc_html__( 'Social Sharing Box', 'universal' ),
	'subsection' => true,
	'fields'     => array(

		// Sharing box tag line.
		array(
			'id'       => 'universal__opt-sharing-box-tag-line',
			'title'    => esc_html__( 'Sharing Box Tagline', 'universal' ),
			'subtitle' => esc_html__( 'Insert a tagline for the social sharing boxes.', 'universal' ),
			'type'     => 'text',
			'default'  => esc_html__( 'Share Post', 'universal' ),
		),

		// Custom background color for social sharing box.
		array(
			'id'          => 'universal__opt-sharing-box-bg-color',
			'title'       => esc_html__( 'Background Color For Social Sharing Box', 'universal' ),
			'subtitle'    => esc_html__( 'Choose background color for social sharing box.', 'universal' ),
			'type'        => 'color',
			'default'     => '#f1f2f4',
			'transparent' => false,
		),

		// Custom text color for social sharing box.
		array(
			'id'          => 'universal__opt-sharing-box-color',
			'title'       => esc_html__( 'Text Color For Social Sharing Box', 'universal' ),
			'subtitle'    => esc_html__( 'Choose text color for social sharing box.', 'universal' ),
			'type'        => 'color',
			'default'     => '#e8e8e8',
			'transparent' => false,
		),

		// Section for social sharing box styling.
		array(
			'id'     => 'universal__section-sharing-box-styling',
			'type'   => 'section',
			'title'  => esc_html__( 'Social Sharing Box Styling', 'universal' ),
			'indent' => true,
		),

		// Sharing box icon size.
		array(
			'id'       => 'universal__opt-sharing-box-icon-size',
			'title'    => esc_html__( 'Sharing  Box Icon Size', 'universal' ),
			'subtitle' => esc_html__( 'Controls the font size of the social icons in the social sharing boxes.',
				'universal' ),
			'type'     => 'text',
			'default'  => esc_html__( '16px', 'universal' ),
		),

		// Sharing box icon tooltip position.
		array(
			'id'       => 'universal__opt-sharing-box-icon-tooltip-position',
			'title'    => esc_html__( 'Sharing Box Icon Tooltip Position', 'universal' ),
			'subtitle' => esc_html__( 'Chose sharing box icon tooltip position.', 'universal' ),
			'type'     => 'button_set',
			'default'  => 'top',
			'options'  => array(
				'top'    => esc_html__( 'Top', 'universal' ),
				'right'  => esc_html__( 'Right', 'universal' ),
				'bottom' => esc_html__( 'Bottom', 'universal' ),
				'left'   => esc_html__( 'Left', 'universal' ),
				'none'   => esc_html__( 'None', 'universal' ),
			),
		),

		// Sharing box icon and boxes styling.
		array(
			'id'       => 'universal__opt-sharing-box-styling',
			'title'    => esc_html__( 'Enable Sharing Box Styling', 'universal' ),
			'subtitle' => esc_html__( 'Enable custom sharing box icon and boxes styling.', 'universal' ),
			'type'     => 'switch',
			'default'  => 0,
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
		),

		// Custom sharing icon color.
		array(
			'id'          => 'universal__opt-sharing-box-icon-color',
			'title'       => esc_html__( 'Social Box Icon Color', 'universal' ),
			'subtitle'    => esc_html__( 'Controls the color of the social icon in the social sharing box.',
				'universal' ),
			'desc'        => esc_html__( 'This color will be used for all social icon.', 'universal' ),
			'type'        => 'color',
			'default'     => '#656269',
			'transparent' => false,
			'required'    => array( 'universal__opt-sharing-box-styling', '=', '1' ),
		),

		// Custom sharing box icon color.
		array(
			'id'          => 'universal__opt-sharing-box-icon-box-color',
			'title'       => esc_html__( 'Social Box Icon Box Color', 'universal' ),
			'subtitle'    => esc_html__( 'Controls the color of the social icon box.', 'universal' ),
			'type'        => 'color',
			'default'     => '#656269',
			'transparent' => false,
			'required'    => array( 'universal__opt-sharing-box-styling', '=', '1' ),
		),

		// Sharing box icon boxed radius.
		array(
			'id'       => 'universal__opt-sharing-box-icon-boxed-radius',
			'title'    => esc_html__( 'Sharing  Box Icon Boxed Radius', 'universal' ),
			'subtitle' => esc_html__( 'Controls the box radius of the social icon box.', 'universal' ),
			'type'     => 'text',
			'default'  => esc_html__( '4px', 'universal' ),
			'required' => array( 'universal__opt-sharing-box-styling', '=', '1' ),
		),

		// Sharing box icon boxed padding.
		array(
			'id'       => 'universal__opt-sharing-box-icon-boxed-padding',
			'title'    => esc_html__( 'Sharing  Box Icon Boxed Padding', 'universal' ),
			'subtitle' => esc_html__( 'Controls the padding of the social icon box.', 'universal' ),
			'type'     => 'text',
			'default'  => esc_html__( '4px', 'universal' ),
			'required' => array( 'universal__opt-sharing-box-styling', '=', '1' ),
		),

		// Section for social sharing links.
		array(
			'id'     => 'universal__section-sharing-box-links',
			'type'   => 'section',
			'title'  => esc_html__( 'Social Sharing Links', 'universal' ),
			'indent' => true,
		),

		// Sort social share button.
		array(
			'id'       => 'universal__opt-blog-sharing-box-social-sorter',
			'title'    => esc_html__( 'Social Sharing Sorter', 'universal' ),
			'subtitle' => esc_html__( 'Sort social sharing buttons.', 'universal' ),
			'desc'     => esc_html__( 'Drag and drop social sharing button from \'Disable\' to \'Enable\'.',
				'universal' ),
			'type'     => 'sorter',
			'options'  => array(
				'enabled'  => array(
					'social_facebook'    => esc_html__( 'Facebook', 'universal' ),
					'social_twitter'     => esc_html__( 'Twitter', 'universal' ),
					'social_google_plus' => esc_html__( 'Google+', 'universal' ),
					'social_reddit'      => esc_html__( 'Reddit', 'universal' ),
					'social_email'       => esc_html__( 'Email', 'universal' ),

				),
				'disabled' => array(
					'social_linkedin' => esc_html__( 'LinkedIn', 'universal' ),
					'social_vk'       => esc_html__( 'VK', 'universal' ),
				),
			),
		),
	),
) );

/*********************************************************************************
 * 13. Extra Options
 ******************************************************************************** */
Redux::setSection( $opt_name, array(
	'id'     => 'universal__section-extra',
	'title'  => esc_html__( 'Extra Options', 'universal' ),
	'icon'   => 'el el-cogs',
	'fields' => array(),
) );

/*********************************************************************************
 * 13.1. Pagination
 ******************************************************************************** */
Redux::setSection( $opt_name, array(
	'id'         => 'universal__subsection-pagination',
	'title'      => esc_html__( 'Pagination', 'universal' ),
	'subsection' => true,
	'fields'     => array(

		// Pagination styling.
		array(
			'id'       => 'universal__opt-pagination',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Custom Pagination Styling', 'universal' ),
			'subtitle' => esc_html__( 'Enable custom pagination styling (blog, ...).', 'universal' ),
			'default'  => 0,
			'on'       => esc_html__( 'Yes', 'universal' ),
			'off'      => esc_html__( 'No', 'universal' ),
		),

		// Section for pagination styling.
		array(
			'id'       => 'universal__section-extra-pagination',
			'type'     => 'section',
			'title'    => esc_html__( 'Pagination Styling', 'universal' ),
			'subtitle' => esc_html__( 'All styling for pagination.', 'universal' ),
			'indent'   => true,
			'required' => array( 'universal__opt-pagination', '=', '1' ),
		),

		// Custom background color for pagination.
		array(
			'id'          => 'universal__opt-pagination-bg-color',
			'title'       => esc_html__( 'Pagination Background Color', 'universal' ),
			'subtitle'    => esc_html__( 'Background color for pagination.', 'universal' ),
			'type'        => 'color',
			'default'     => '#fff',
			'transparent' => false,
			'required'    => array( 'universal__opt-pagination', '=', '1' ),
		),

		// Custom hover background color for pagination.
		array(
			'id'          => 'universal__opt-pagination-bg-color-hover',
			'title'       => esc_html__( 'Pagination Hover Background Color', 'universal' ),
			'subtitle'    => esc_html__( 'Background color for hover pagination.', 'universal' ),
			'type'        => 'color',
			'default'     => '#99c24d',
			'transparent' => false,
			'required'    => array( 'universal__opt-pagination', '=', '1' ),
		),

		// Custom background color (active) for pagination.
		array(
			'id'          => 'universal__opt-pagination-bg-color-active',
			'title'       => esc_html__( 'Pagination Active Background Color', 'universal' ),
			'subtitle'    => esc_html__( 'Background color for active pagination.', 'universal' ),
			'type'        => 'color',
			'default'     => '#99c24d',
			'transparent' => false,
			'required'    => array( 'universal__opt-pagination', '=', '1' ),
		),

		// Custom border color for pagination.
		array(
			'id'          => 'universal__opt-pagination-border-color',
			'title'       => esc_html__( 'Pagination Border Color', 'universal' ),
			'subtitle'    => esc_html__( 'Border color for pagination.', 'universal' ),
			'type'        => 'color',
			'default'     => '#99c24d',
			'transparent' => false,
			'required'    => array( 'universal__opt-pagination', '=', '1' ),
		),

		// Custom hover border color for pagination.
		array(
			'id'          => 'universal__opt-pagination-border-color-hover',
			'title'       => esc_html__( 'Pagination Hover Border Color', 'universal' ),
			'subtitle'    => esc_html__( 'Border color for hover pagination.', 'universal' ),
			'type'        => 'color',
			'default'     => '#99c24d',
			'transparent' => false,
			'required'    => array( 'universal__opt-pagination', '=', '1' ),
		),

		// Custom border color (active) for pagination.
		array(
			'id'          => 'universal__opt-pagination-border-color-active',
			'title'       => esc_html__( 'Pagination Active Border Color', 'universal' ),
			'subtitle'    => esc_html__( 'Border color for active pagination.', 'universal' ),
			'type'        => 'color',
			'default'     => '#99c24d',
			'transparent' => false,
			'required'    => array( 'universal__opt-pagination', '=', '1' ),
		),

		// Custom color for pagination.
		array(
			'id'          => 'universal__opt-pagination-color',
			'title'       => esc_html__( 'Pagination Text Color', 'universal' ),
			'subtitle'    => esc_html__( 'Text color for pagination.', 'universal' ),
			'type'        => 'color',
			'default'     => '#747474',
			'transparent' => false,
			'required'    => array( 'universal__opt-pagination', '=', '1' ),
		),

		// Custom hover color for pagination.
		array(
			'id'          => 'universal__opt-pagination-color-hover',
			'title'       => esc_html__( 'Pagination Text Hover Color', 'universal' ),
			'subtitle'    => esc_html__( 'Color for hover pagination.', 'universal' ),
			'type'        => 'color',
			'default'     => '#fff',
			'transparent' => false,
			'required'    => array( 'universal__opt-pagination', '=', '1' ),
		),
	),
) );

/*********************************************************************************
 * 14. Custom CSS
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
 * 15. Theme Information
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

