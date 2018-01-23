<?php
/**
 * Template for display post meta data.
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
?>

<section class="universal__related-posts">
	<div class="swiper-container">
		<div class="swiper-wrapper">
			<?php if ( $related_posts->have_posts() ) : ?>
				<?php
				while ( $related_posts->have_posts() ) :
					$related_posts->the_post();
					?>
					<div class="swiper-slide">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php
							the_post_thumbnail( '', array(
								'class' => 'universal__related-posts--image',
							) );
							?>
						<?php else : ?>
							<img src="<?php echo esc_url( get_template_directory_uri() . '/dist/images/related-posts-placeholder.png' ); ?>" alt="related posts img">
						<?php endif; ?>
						<div class="overlay">
							<a href="<?php esc_url( get_the_permalink() ); ?>">
								<h1><?php the_title(); ?></h1>
							</a>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div> <!-- ./universal__related-posts--wrapper -->

		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>

	</div> <!-- ./universal__related-posts--container -->
</section> <!-- /.universal__related-posts -->
<?php wp_reset_postdata(); ?>
