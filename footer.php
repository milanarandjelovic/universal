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

	<footer class="footer">

			<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>

			<?php get_template_part( 'template-parts/footer/footer-social-links' ); ?>

			<?php get_template_part( 'template-parts/footer/footer-copyright' ); ?>

	</footer> <!-- /.footer -->

</div> <!-- /#page -->

<?php wp_footer(); ?>

</body>
</html>
