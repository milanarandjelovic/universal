<?php
/**
 * Template part for displaying single posts.
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package    Universal
 * @subpackage Templates
 * @since      1.0.0
 * @author     Milan Arandjelovic
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$universal_data = get_option( 'universal_data' );

$has_single_post_thumbnail = $universal_data['universal__opt-blog-sp-thumbnail'];

$single_post_class = 'universal-single-post';

$sp_show_title              = $universal_data['universal__opt-blog-sp-title'];
$sp_title_position          = $universal_data['universal__opt-blog-sp-title-position'];
$sp_meta_position           = $universal_data['universal__opt-blog-sp-meta-data-position'];
$sp_show_social_sharing_box = $universal_data['universal__opt-blog-sp-social-btn'];
$sp_show_about_author       = $universal_data['universal__opt-blog-sp-author-info'];
$sp_show_related_posts      = $universal_data['universal__opt-blog-sp-related-posts'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $single_post_class ); ?>>

	<?php if ( '1' === $sp_show_title && 'above' === $sp_title_position ) : ?>
		<h2 class="entry-title universal-post-title">
			<?php the_title(); ?>
		</h2>
	<?php endif; ?>

	<?php if ( has_post_thumbnail() && '1' === $has_single_post_thumbnail ) : ?>
		<figure class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</figure> <!-- /.entry-thumbnail -->
	<?php endif; ?>

	<?php if ( '1' === $sp_show_title && 'bellow' === $sp_title_position ) : ?>
		<h2 class="entry-title universal-post-title">
			<?php the_title(); ?>
		</h2>
	<?php endif; ?>

	<?php if ( 'above' === $sp_meta_position ) : ?>
		<?php universal_render_post_meta_data(); ?>
	<?php endif; ?>

	<div class="entry-body">
		<div class="entry-content">
			<?php the_content(); ?>
		</div> <!-- /.entry-content -->
	</div> <!-- /.entry-body -->

	<?php if ( 'bellow' === $sp_meta_position ) : ?>
		<?php universal_render_post_meta_data(); ?>
	<?php endif; ?>

	<?php if ( '1' === $sp_show_social_sharing_box ) : ?>
		<?php universal_render_social_sharing_box(); ?>
	<?php endif; ?>

	<?php if ( '1' === $sp_show_about_author ) : ?>
		<?php universal_render_about_author(); ?>
	<?php endif; ?>

	<?php if ( '1' === $sp_show_related_posts ) : ?>
		<?php universal_render_related_posts(); ?>
	<?php endif; ?>

</article> <!-- /#post-<?php the_ID(); ?> -->
