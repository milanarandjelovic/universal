<?php
/**
 * Custom Universal functions.
 *
 * @package    Universal
 * @subpackage Core
 * @since      1.0.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/*********************************************************************************
 * Template Tags
 ******************************************************************************** */
if ( ! function_exists( 'universal_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 *
	 * @since 1.0.0
	 */
	function universal_posted_on() {
		?>
		<div class="universal__date-box">
			<span class="entry-day"><?php the_time( 'j' ); ?></span>
			<span class="entry-month"><?php the_time( 'M' ); ?></span>
		</div> <!-- /.universal__date-box -->
		<?php
	}
}

if ( ! function_exists( 'universal_entry_categories' ) ) {
	/**
	 * Prints HTML with meta information for the categories.
	 *
	 * @since 1.0.0
	 */
	function universal_entry_categories() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list();

			if ( $categories_list && universal_categorized_blog() ) {
				printf( $categories_list ); // WPCS: XSS OK.
			}
		}
	}
}

if ( ! function_exists( 'universal_entry_footer' ) ) {
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 *
	 * @since 1.0.0
	 */
	function universal_entry_footer() {
		if ( 'post' === get_post_type() ) {
			$author = sprintf(
				/* translators: %s: post author. */
				esc_html_x( 'Posted by %s', 'post_author', 'universal' ),
				'<span class="author"><a href="'
				. esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
				. '" class="author-link">' . esc_html( get_the_author() ) . '</a>'
			);

			echo wp_kses(
				$author,
				array(
					'span' => array(
						'class' => array(),
					),
					'a'    => array(
						'href'  => array(),
						'class' => array(),
					),
				)
			);

			edit_post_link(
				esc_html__( 'Edit', 'universal' ),
				'<span class="edit-link">',
				'</span>'
			);
		}
	}
}

/*********************************************************************************
 * Custom Universal functions
 ******************************************************************************** */
if ( ! function_exists( 'universal_categorized_blog' ) ) {
	/**
	 * Return true if blog has more than 1 category.
	 *
	 * @since 1.0.0
	 * @return bool
	 */
	function universal_categorized_blog() {
		$all_the_col_cats = get_transient( 'universal_categories' );

		if ( false === $all_the_col_cats ) {
			$all_the_col_cats = get_categories( array(
				'fields'     => 'ids',
				'hide_empty' => 1,
				'number'     => 2,
			) );

			$all_the_col_cats = count( $all_the_col_cats );

			set_transient( 'universal_categories', $all_the_col_cats );
		}

		if ( 1 < $all_the_col_cats ) {
			// Post has more than 1 category so universal_categorized_blog() should return true.
			return true;
		} else {
			// Post has only 1 category so universal_categorized_blog() should return false.
			return false;
		}
	}
}

if ( ! function_exists( 'universal_category_transient_flusher' ) ) {
	/**
	 * Flush out the transients used in universal_categorized_blog().
	 *
	 * @since 1.0.0
	 */
	function universal_category_transient_flusher() {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		delete_transient( 'universal_categories' );
	}
}
