<?php
/**
 * Custom Universal functions.
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
 * Custom Universal Functions
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

if ( ! function_exists( 'universal_pagination' ) ) {
	/**
	 * Prints universal pagination.
	 *
	 * @param string $pages           Maximum number of page.
	 * @param int    $range           Our range.
	 * @param string $current_query   The current query.
	 * @param bool   $infinite_scroll Whether we want infinite scroll or note.
	 */
	function universal_pagination( $pages = '', $range = 2, $current_query = '', $infinite_scroll = false ) {
		$universal_data       = get_option( 'universal_data' );
		$blog_pagination_type = $universal_data['universal__opt-blog-pagination-type'];
		$blog_load_more_txt   = $universal_data['universal__opt-blog-load-more-text'];
		$pagination_position  = $universal_data['universal__opt-blog-pagination-position'];

		global $wp_query;
		$number_of_pages = $wp_query->max_num_pages; // Number of pages for load more button.

		$show_items = ( $range * 2 ) + 1;

		if ( '' === $current_query ) {
			global $paged;

			if ( empty( $paged ) ) {
				$paged = 1;
			}
		} else {
			$paged = $current_query->query_vars['paged'];
		}

		if ( '' === $pages ) {
			if ( '' === $current_query ) {
				global $wp_query;
				$pages = $wp_query->max_num_pages;

				if ( ! $pages ) {
					$pages = 1;
				}
			} else {
				$pages = $current_query->max_num_pages;
			}
		}
		?>

		<?php if ( 1 !== $pages ) : ?>

			<?php if ( $infinite_scroll || ( 'pagination' !== $blog_pagination_type && ( is_home() || is_search() || ( 'post' === get_post_type() && ( is_author() || is_archive() ) ) ) ) ) : ?>
				<div class="universal-infinite-scroll-trigger"></div>
				<div class='pagination infinite-scroll clearfix' style="display:none;">
			<?php else : ?>
				<div class='pagination universal-pagination-holder justify-content-<?php echo esc_attr( $pagination_position ); ?> clearfix'>
			<?php endif; ?>

			<?php if ( 1 < $paged ) : ?>
				<li class="page-item">
					<a class="page-link universal-pagination-previous"
					   href="<?php echo esc_url_raw( get_pagenum_link( $paged - 1 ) ); ?>"
					   aria-label="Previous"
					>
						<span>
							<?php esc_html_e( 'Previous', 'universal' ); ?>
						</span>
					</a>
				</li>
			<?php endif; ?>

			<?php for ( $i = 1; $i <= $pages; $i ++ ) : ?>
				<?php if ( 1 !== $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $show_items ) ) : ?>
					<?php if ( $paged === $i ) : ?>
						<?php // Active pagination. ?>
						<li class="page-item active">
							<a href="#" class="page-link active">
								<?php echo (int) $i; ?>
								<span class="sr-only">(current)</span>
							</a>
						</li>
					<?php else : ?>
						<li class="page-item">
							<a href="<?php echo esc_url_raw( get_pagenum_link( $i ) ); ?>"
							   class="page-link"
							>
								<?php echo (int) $i; ?>
							</a>
						</li>
					<?php endif; ?>
				<?php endif; ?>
			<?php endfor; ?>

			<?php if ( $paged < $pages ) : ?>
				<li class="page-item">
					<a class="page-link universal-pagination-next"
					   href="<?php echo esc_url_raw( get_pagenum_link( $paged + 1 ) ); ?>"
					>
						<span>
							<?php esc_html_e( 'Next', 'universal' ); ?>
						</span>
					</a>
				</li>
			<?php endif; ?>
			</div>
			<?php
			// Needed for Theme check.
			ob_start(); // Turn on output buffering.
			posts_nav_link();
			ob_get_clean();
			?>
		<?php endif; ?>

		<?php if ( 'load_more_button' === $blog_pagination_type && 1 < $number_of_pages ) : ?>
			<button class="btn btn-block universal-load-more-button">
				<?php echo esc_html( $blog_load_more_txt ); ?>
			</button> <!-- /#universal-load-more-button -->
		<?php endif; ?>

		<?php
	}
}

if ( ! function_exists( 'universal_render_post_meta_data' ) ) {
	/**
	 * Render HTML post meta data.
	 */
	function universal_render_post_meta_data() {
		get_template_part( 'template-parts/post/post-meta-data' );
	}
}

if ( ! function_exists( 'universal_render_social_sharing_box' ) ) {
	/**
	 * Render HTML for social sharing box.
	 */
	function universal_render_social_sharing_box() {
		get_template_part( 'template-parts/social-share/social-share-box' );
	}
}

if ( ! function_exists( 'universal_render_about_author' ) ) {
	/**
	 * Render HTML for about author.
	 */
	function universal_render_about_author() {
		get_template_part( 'template-parts/author/author-about' );
	}
}

if ( ! function_exists( 'universal_render_related_posts' ) ) {
	/**
	 * Render HTML for related posts.
	 */
	function universal_render_related_posts() {
		get_template_part( 'template-parts/post/post-related-posts' );
	}
}

if ( ! function_exists( 'universal_render_single_post_navigation' ) ) {
	/**
	 * Render HTML for single post navigation.
	 */
	function universal_render_single_post_navigation() {
		get_template_part( 'template-parts/post/post-single-post-navigation' );
	}
}
