<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link       https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package    Universal
 * @subpackage Templates
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>

	</div> <!-- /#content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'universal' ) ); ?>">
				<?php
				printf(
					/* translators: %s: CMS name, i.e. WordPress. */
					esc_html__( 'Proudly powered by %s', 'universal' ),
					'WordPress'
				);
				?>
			</a>
			<span class="sep"> | </span>
			<?php
				printf(
					/* translators: 1: Theme name, 2: Theme author. */
					esc_html__(
						'Theme: %1$s by %2$s.', 'universal'
					),
					'universal', '<a href="https://github.com/milanarandjelovic">Milan Arandjelovic</a>'
				);
			?>
		</div> <!-- /.site-info -->
	</footer> <!-- /#colophon -->
</div> <!-- /#page -->

<?php wp_footer(); ?>

</body>
</html>
