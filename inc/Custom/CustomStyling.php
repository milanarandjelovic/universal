<?php
/**
 * Output Custom Styling from Redux Theme Options.
 *
 * @package    Universal
 * @subpackage Inc\Custom
 * @since      1.0.0
 */

namespace Inc\Custom;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Custom Styling from Redux Theme Options.
 */
class CustomStyling {

	/**
	 * Register default hooks and actions for WordPress.
	 *
	 * @access public
	 * @since  1.0.0
	 */
	public function register() {
		add_action( 'wp_head', array( $this, 'universal_custom_styling' ) );
	}

	/**
	 * Display custom style in header.
	 *
	 * @access public
	 * @since  1.0.0
	 */
	public function universal_custom_styling() {
		$output         = '';
		$universal_data = get_option( 'universal_data' );

		/*********************************************************************************
		 * Blog Styling.
		 ******************************************************************************** */
		$post_styling = $universal_data['universal__option-blog-styling'];
		$post_footer  = $universal_data['universal__option-blog-footer'];

		if ( $post_styling ) {
			$post_border          = $universal_data['universal__option-blog-styling-post-border'];
			$post_title_border    = $universal_data['universal__option-blog-styling-post--title-border'];
			$blog_post_date       = $universal_data['universal__option-blog-post-date'];
			$blog_excerpt_color   = $universal_data['universal__option-blog-post-excerpt-color'];
			$blog_post_categories = $universal_data['universal__option-blog-categories'];
			$blog_link_color      = $universal_data['universal__option-blog-footer-link-color'];

			// Border for post article.
			$output .= ' article.post {';
			$output .= ' background-color: ' . $universal_data['universal__option-blog-styling-post-bg']['background-color'] . ';';
			$output .= ' border-top-width: ' . $post_border['border-top'] . ';';
			$output .= ' border-right-width: ' . $post_border['border-right'] . ';';
			$output .= ' border-bottom-width: ' . $post_border['border-bottom'] . ';';
			$output .= ' border-left-width: ' . $post_border['border-left'] . ';';
			$output .= ' border-style: ' . $post_border['border-style'] . ';';
			$output .= ' border-color: ' . $post_border['border-color'] . ';';
			$output .= ' }';

			// Border bottom for post title.
			$output .= ' article.post .entry-body .entry-header .title-bordered {';
			$output .= ' border-bottom: ' . $post_title_border['border-bottom'] . ';';
			$output .= ' border-bottom-style: ' . $post_title_border['border-style'] . ';';
			$output .= ' border-bottom-color: ' . $post_title_border['border-color'] . ';';
			$output .= ' }';

			// Blog post date color and background color.
			if ( $blog_post_date ) {
				$blog_post_date_bg_color = $universal_data['universal__option-blog-post-date-bg-color']['background-color'];
				$blog_post_date_color    = $universal_data['universal__option-blog-post-date-color'];

				$output .= ' article.post .entry-body .entry-date {';
				$output .= ' background-color: ' . $blog_post_date_bg_color . ';';
				$output .= ' color: ' . $blog_post_date_color . ';';
				$output .= ' }';
			}

			// Blog excerpt color.
			if ( $blog_excerpt_color ) {
				$output .= ' article.post .entry-body .entry-excerpt {';
				$output .= ' color: ' . $blog_excerpt_color . ';';
				$output .= ' }';
			}

			// Blog post categories styling.
			if ( $blog_post_categories ) {
				$blog_post_categories_bg_color = $universal_data['universal__option-blog-categories-bg-color']['background-color'];
				$blog_post_categories_color    = $universal_data['universal__option-blog-categories-color'];

				$output .= ' article.post .entry-body .post-categories li a {';
				$output .= ' background-color: ' . $blog_post_categories_bg_color . ';';
				$output .= ' color: ' . $blog_post_categories_color . ';';
				$output .= ' }';
			}

			// Blog link regular, active and hover.
			if ( $blog_link_color ) {
				// Blog title link.
				$output .= ' article.post .entry-body .entry-header .title-bordered .entry-title > a {';
				$output .= ' color: ' . $blog_link_color['regular'];
				$output .= ' }';
				$output .= ' article.post .entry-body .entry-header .title-bordered .entry-title > a:hover {';
				$output .= ' color: ' . $blog_link_color['hover'];
				$output .= ' }';

				// Blog author link.
				$output .= ' article.post .entry-footer .author-link {';
				$output .= ' color: ' . $blog_link_color['regular'];
				$output .= ' }';
				$output .= ' article.post .entry-footer .author-link:hover {';
				$output .= ' color: ' . $blog_link_color['hover'];
				$output .= ' }';

				// Blog edit link.
				$output .= ' article.post .entry-footer .edit-link .post-edit-link {';
				$output .= ' color: ' . $blog_link_color['regular'];
				$output .= ' }';
				$output .= ' article.post .entry-footer .edit-link .post-edit-link:hover {';
				$output .= ' color: ' . $blog_link_color['hover'];
				$output .= ' }';
			}
		}

		// Blog footer read more link color.
		if ( '1' === $post_footer && '1' === $post_styling ) {
			$post_footer_read_more_link = $universal_data['universal__option-blog-footer-read-more'];
			$post_footer_bg_color       = $universal_data['universal__option-blog-footer-bg']['background-color'];
			$post_footer_color          = $universal_data['universal__option-blog-footer-color'];
			$post_footer_border         = $universal_data['universal__option-blog-footer-border-color'];

			// Post footer color, background color and border.
			$output .= ' article.post .entry-footer {';
			$output .= ' background-color:' . $post_footer_bg_color . ';';
			$output .= ' color:' . $post_footer_color . ';';
			$output .= ' border-top:' . $post_footer_border['border-top'] . ';';
			$output .= ' border-top-style:' . $post_footer_border['border-style'] . ';';
			$output .= ' border-color:' . $post_footer_border['border-color'] . ';';
			$output .= ' }';

			// Regular color.
			$output .= ' article.post .entry-footer .read-more {';
			$output .= ' color: ' . $post_footer_read_more_link['regular'] . ';';
			$output .= ' }';

			// Hover color.
			$output .= ' article.post .entry-footer .read-more:hover {';
			$output .= ' color: ' . $post_footer_read_more_link['hover'] . ';';
			$output .= ' }';

			// Active color.
			$output .= ' article.post .entry-footer .read-more:active {';
			$output .= ' color: ' . $post_footer_read_more_link['active'] . ';';
			$output .= ' }';
		}

		/*********************************************************************************
		 * Custom styling for page pre-loader.
		 ******************************************************************************** */
		if ( '1' === $universal_data['universal__opt-page-pre-loader'] && '1' === $universal_data['universal__opt-custom-page-pre-loader'] ) {
			$page_pre_loader_color  = $universal_data['universal__opt-page-pre-loader-bar-color1'];
			$page_pre_loader_bg     = $universal_data['universal__opt-page-pre-loader-bg']['background-color'];
			$page_pre_loader_size   = str_replace( 'px', '', $universal_data['universal__opt-page-pre-loader-spinner-size']['width'] );
			$page_pre_loader_h_size = $page_pre_loader_size / 2;

			$output .= ' .page-pre-loader {';
			$output .= ' background: ' . $page_pre_loader_bg;
			$output .= ' }';

			$output .= ' .page-pre-loader .loader-inner {';
			$output .= ' background: -moz-linear-gradient(left, ' . $page_pre_loader_color . ' 10%, ' . $page_pre_loader_bg . ' 42%);';
			$output .= ' background: -webkit-linear-gradient(left, ' . $page_pre_loader_color . ' 10%, ' . $page_pre_loader_bg . ' 42%);';
			$output .= ' background: -o-linear-gradient(left, ' . $page_pre_loader_color . ' 10%, ' . $page_pre_loader_bg . ' 42%);';
			$output .= ' background: -ms-linear-gradient(left, ' . $page_pre_loader_color . ' 10%, ' . $page_pre_loader_bg . ' 42%);';
			$output .= ' background: linear-gradient(to right, ' . $page_pre_loader_color . ' 10%, ' . $page_pre_loader_bg . ' 42%);';
			$output .= ' }';

			$output .= ' .page-pre-loader .loader-inner:before {';
			$output .= ' background: ' . $page_pre_loader_color;
			$output .= ' }';

			$output .= ' .page-pre-loader .loader-inner:after {';
			$output .= ' background: ' . $page_pre_loader_bg;
			$output .= ' }';

			$output .= ' .page-pre-loader .loader-inner {';
			$output .= ' height: ' . $page_pre_loader_size . 'px;';
			$output .= ' width: ' . $page_pre_loader_size . 'px;';
			$output .= ' margin: -' . $page_pre_loader_h_size . 'px 0 0 -' . $page_pre_loader_h_size . 'px;';
			$output .= ' }';
		}

		/*********************************************************************************
		 * Custom CSS.
		 ******************************************************************************** */
		$custom_css = $universal_data['universal__opt-custom-css'];
		if ( '' !== $custom_css ) {
			$output .= $custom_css;
		}

		/*********************************************************************************
		 * Display custom CSS in head.
		 ******************************************************************************** */
		if ( '' !== $output ) {
			$output = "<!-- Dynamic CSS -->\n<style type=\"text/css\">\n" . $output . "\n</style>\n";
			echo ! empty( $output ) ? $output : ''; // WPCS: XSS ok.
		}
	}
}
