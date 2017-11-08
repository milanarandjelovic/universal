<?php
/**
 * Template for display footer widgets.
 *
 * @package    Universal
 * @subpackage Templates
 */

$universal_option = get_option( 'universal_data' );

$footer_widgets        = $universal_option['universal__opt-footer-widgets'];
$footer_widgets_layout = $universal_option['universal__opt-footer-widgets-layout'];
$footer_widget_1_class = '';
$footer_widget_2_class = '';
$footer_widget_3_class = '';
$footer_widget_4_class = '';

switch ( $footer_widgets_layout ) {
	case '1': // 4 equals column
		$footer_widget_1_class = 'col-sm-6 col-md-3';
		$footer_widget_2_class = 'col-sm-6 col-md-3';
		$footer_widget_3_class = 'col-sm-6 col-md-3';
		$footer_widget_4_class = 'col-sm-6 col-md-3';
		break;

	case '2': // 3 equals column
		$footer_widget_1_class = 'col-sm-4 col-md-4';
		$footer_widget_2_class = 'col-sm-4 col-md-4';
		$footer_widget_3_class = 'col-sm-4 col-md-4';
		break;

	case '3': // 2 column left wider
		$footer_widget_1_class = 'col-sm-8 col-md-8';
		$footer_widget_2_class = 'col-sm-4 col-md-4';
		break;

	case '4': // 2 column right wider
		$footer_widget_1_class = 'col-sm-4 col-md-4';
		$footer_widget_2_class = 'col-sm-8 col-md-8';
		break;
}
?>
<?php if ( '1' === $footer_widgets ) : ?>
	<div class="footer__widget">
		<div class="container">
			<div class="row">

				<div class="<?php echo esc_attr( $footer_widget_1_class ); ?>">
					<?php dynamic_sidebar( 'universal-footer-sidebar-1' ); ?>
				</div> <!-- /.<?php echo esc_attr( $footer_widget_1_class ); ?> -->

				<div class="<?php echo esc_attr( $footer_widget_2_class ); ?>">
					<?php dynamic_sidebar( 'universal-footer-sidebar-2' ); ?>
				</div> <!-- /.<?php echo esc_attr( $footer_widget_2_class ); ?> -->

				<?php if ( '1' === $footer_widgets_layout || '2' === $footer_widgets_layout ) : ?>
					<div class="<?php echo esc_attr( $footer_widget_3_class ); ?>">
						<?php dynamic_sidebar( 'universal-footer-sidebar-3' ); ?>
					</div> <!-- /.<?php echo esc_attr( $footer_widget_3_class ); ?> -->
				<?php endif; ?>

				<?php if ( '1' === $footer_widgets_layout ) : ?>
					<div class="<?php echo esc_attr( $footer_widget_4_class ); ?>">
						<?php dynamic_sidebar( 'universal-footer-sidebar-4' ); ?>
					</div> <!-- /.<?php echo esc_attr( $footer_widget_4_class ); ?> -->
				<?php endif; ?>

			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</div> <!-- /.footer__widget -->
<?php endif; ?>
