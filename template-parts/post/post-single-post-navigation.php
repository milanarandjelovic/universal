<?php
/**
 * Template for display single post navigation.
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
$sp_navigation  = $universal_data['universal__opt-blog-sp-navigation'];

$sp_previous = get_permalink( get_adjacent_post( false, '', true ) );
$sp_next     = get_permalink( get_adjacent_post( false, '', false ) );
?>

<?php if ( '1' === $sp_navigation ) : ?>
	<nav class="universal__single-post-navigation">
		<ul class="universal__pagination pull-right">

			<?php if ( get_permalink() !== $sp_previous ) : ?>
				<li class="universal__pagination-previous">
					<a href="<?php echo esc_url( $sp_previous ); ?>">
						<?php echo esc_attr( get_previous_post()->post_title ); ?>
					</a>
				</li> <!-- /.universal__pagination-previous -->
			<?php endif; ?>

			<?php if ( get_permalink() !== $sp_next ) : ?>
				<li class="universal__pagination-next">
					<a href="<?php echo esc_url( $sp_next ); ?>">
						<?php echo esc_attr( get_next_post()->post_title ); ?>
					</a>
				</li> <!-- /.universal__pagination-next -->
			<?php endif; ?>

		</ul> <!-- /.universal__pagination -->
	</nav> <!-- /.universal__single-post-navigation -->
<?php endif; ?>
