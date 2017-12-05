<?php
/**
 * Template for display post meta data.
 *
 * @package    Universal
 * @subpackage Templates
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$universal_data = get_option( 'universal_data' );

$sp_post_meta            = $universal_data['universal__opt-blog-sp-show-meta-data'];
$sp_post_meta_author     = $universal_data['universal__opt-blog-sp-publisher'];
$sp_post_meta_date       = $universal_data['universal__opt-blog-sp-date'];
$sp_post_meta_categories = $universal_data['universal__opt-blog-sp-categories'];
$sp_post_meta_tags       = $universal_data['universal__opt-blog-sp-tags'];
$sp_post_meta_comments   = $universal_data['universal__opt-blog-sp-comment-num'];

$inline_separator = '<span class="universal-inline-separator">|</span>';
?>

<div class="universal__post-meta-data">

	<?php if ( '1' === $sp_post_meta ) : ?>

		<?php if ( '1' === $sp_post_meta_author ) : ?>
			<?php
			// Get author of post.
			ob_start(); // Turn on output buffering.
			the_author_posts_link();
			$author_post_link = ob_get_clean(); // Get current buffer contents and delete output buffer.

			$author = sprintf(
				/* translators: 1: user data. */
				esc_html__(
					'By %s',
					'universal'
				),
				$author_post_link
			);
			?>
			<span class="universal__meta-data-author">
				<i class="fa fa-user" aria-hidden="true"></i>
				<?php echo $author; // WPCS: XSS ok. ?>
			</span>
			<?php echo $inline_separator; // WPCS: XSS ok. ?>
		<?php endif; // Check if author of post enable. ?>

		<?php if ( '1' === $sp_post_meta_date ) : ?>
			<span class="universal__meta-data-date">
				<i class="fa fa-clock-o" aria-hidden="true"></i>
				<?php echo get_the_time( 'F jS, Y' ); // WPCS: XSS ok. ?>
			</span>
			<?php echo $inline_separator; // WPCS: XSS ok. ?>
		<?php endif; // Check if post meta date enable. ?>

		<?php if ( '1' === $sp_post_meta_categories ) : ?>
			<?php
			ob_start(); // Turn on output buffering.
			the_category( ', ' );
			$categories = ob_get_clean(); // Get current buffer contents and delete output buffer.
			?>

			<?php if ( $categories ) : ?>
				<?php
				$ctgs = sprintf(
					/* translators: 1: categories. */
					esc_html__(
						'Categories: %s',
						'universal'
					),
					$categories
				);
				?>
				<span class="universal__meta-data-categories">
					<i class="fa fa-sitemap" aria-hidden="true"></i>
					<?php echo $ctgs; // WPCS: XSS ok. ?>
				</span>
				<?php echo $inline_separator; // WPCS: XSS ok. ?>
			<?php endif; ?>
		<?php endif; // Check if post meta categories enable. ?>

		<?php if ( '1' === $sp_post_meta_tags ) : ?>
			<?php
			ob_start(); // Turn on output buffering.
			the_tags( '' );
			$tags = ob_get_clean(); // Get current buffer contents and delete output buffer.
			?>

			<?php if ( $tags ) : ?>
				<?php
				$tgs = sprintf(
					/* translators: 1: categories. */
					esc_html__(
						'Tags: %s',
						'universal'
					),
					$tags
				);
				?>
				<span class="universal__meta-data-tags">
					<i class="fa fa-tags" aria-hidden="true"></i>
					<?php echo $tgs; // WPCS: XSS ok. ?>
				</span>
				<?php echo $inline_separator; // WPCS: XSS ok. ?>
			<?php endif; ?>
		<?php endif; // Check if post meta tags enable. ?>

		<?php if ( '1' === $sp_post_meta_comments ) : ?>
			<?php
			ob_start(); // Turn on output buffering.
			comments_popup_link(
				esc_html__( '0 Comments', 'universal' ),
				esc_html__( '1 Comment', 'universal' ),
				esc_html__( '% Comment', 'universal' )
			);
			$comments = ob_get_clean(); // Get current buffer contents and delete output buffer.
			?>
			<i class="fa fa-comments" aria-hidden="true"></i>
			<span class="universal__meta-data-comment-num"><?php echo $comments; // WPCS: XSS ok. ?></span>
		<?php endif; // Check if post meta comments enable. ?>

	<?php endif; ?>

</div> <!-- /.universal-post-meta-data -->
