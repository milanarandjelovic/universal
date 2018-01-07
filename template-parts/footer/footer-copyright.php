<?php
/**
 * Template for display footer copyright.
 *
 * @package    Universal
 * @subpackage Templates
 * @since      1.0.0
 * @author     Milan Arandjelovic
 */

$universal_option = get_option( 'universal_data' );

$footer_copyright            = $universal_option['universal__opt-footer-copyright'];
$footer_copyright_col_num    = $universal_option['universal__opt-footer-copyright-col-num'];
$footer_copyright_class      = '';
$footer_copyright_col_1_text = $universal_option['universal__opt-footer-copyright-col-1-text'];
$footer_copyright_col_2_text = $universal_option['universal__opt-footer-copyright-col-2-text'];
$footer_copyright_col_3_text = $universal_option['universal__opt-footer-copyright-col-3-text'];

if ( '1' === $footer_copyright_col_num ) {
	$footer_copyright_class = 'col-md-12';
} elseif ( '2' === $footer_copyright_col_num ) {
	$footer_copyright_class = 'col-sm-6 col-md-6';
} else {
	$footer_copyright_class = 'col-sm-4 col-md-4';
}
?>

<?php if ( '1' === $footer_copyright ) : ?>
	<div class="universal__footer-copyright">
		<div class="container">
			<div class="row">

				<div class="<?php echo esc_attr( $footer_copyright_class ); ?>">
					<?php echo wp_kses_post( $footer_copyright_col_1_text ); ?>
				</div> <!-- /.<?php echo esc_attr( $footer_copyright_class ); ?> -->

				<?php if ( '2' === $footer_copyright_col_num || '3' === $footer_copyright_col_num ) : ?>
					<div class="<?php echo esc_attr( $footer_copyright_class ); ?>">
						<?php echo wp_kses_post( $footer_copyright_col_2_text ); ?>
					</div> <!-- /.<?php echo esc_attr( $footer_copyright_class ); ?> -->
				<?php endif; ?>

				<?php if ( '3' === $footer_copyright_col_num ) : ?>
					<div class="<?php echo esc_attr( $footer_copyright_class ); ?>">
						<?php echo wp_kses_post( $footer_copyright_col_3_text ); ?>
					</div> <!-- /.<?php echo esc_attr( $footer_copyright_class ); ?> -->
				<?php endif; ?>

			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</div> <!-- /.universal__footer-copyright -->
<?php endif; ?>
