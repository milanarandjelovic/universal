<?php
/**
 * Template part for displaying posts
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
$post_format    = get_post_format();

$post_date   = $universal_data['universal__opt-blog-post-date'];
$post_footer = $universal_data['universal__opt-blog-footer'];
$post_author = $universal_data['universal__opt-blog-footer-author'];
$post_read_more_txt = $universal_data['universal__opt-blog-read-more-text'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</figure> <!-- /.entry-thumbnail -->
	<?php endif; ?>

	<div class="entry-body">

		<?php if ( '1' === $post_date ) : ?>
			<div class="entry-date">
				<?php universal_posted_on(); ?>
			</div> <!-- /.entry-date -->
		<?php endif; ?>

		<header class="entry-header">
			<?php
			the_title(
				sprintf(
					'<div class="title-bordered"><h4 class="entry-title"><a href="%s" rel="bookmark">',
					esc_url( get_permalink() )
				),
				'</a></h4></div>'
			);
			?>
		</header> <!-- /.entry-header -->

		<div class="entry-excerpt">
			<?php if ( 'audio' === $post_format || 'video' === $post_format || 'link' === $post_format || 'quote' === $post_format || 'chat' === $post_format ) : ?>
				<?php the_content(); ?>
			<?php else : ?>
				<?php the_excerpt(); ?>
			<?php endif; ?>
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'universal' ),
				'after'  => '</div>',
			) );
			?>
		</div> <!-- /.entry-excerpt -->

		<?php universal_entry_categories(); ?>

	</div> <!-- /.entry-body -->

	<?php if ( '1' === $post_footer ) : ?>
		<footer class="entry-footer">

			<?php if ( '1' === $post_author ) : ?>
				<div class="pull-left universal__posted-by">
					<?php universal_entry_footer(); ?>
				</div>
			<?php endif; ?>

			<div class="pull-right universal__read-more">
				<a href="<?php the_permalink(); ?>" class="read-more">
				<span>
					<?php echo esc_html( $post_read_more_txt ); ?>
					<i class="fa fa-long-arrow-right"></i>
				</span>
				</a>
			</div>

		</footer> <!-- /.entry-footer -->
	<?php endif; ?>

</article> <!-- /#post-<?php the_ID(); ?> -->
