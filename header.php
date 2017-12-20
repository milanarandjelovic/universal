<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
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
$universal_data = get_option( 'universal_data' );
$universal_logo_url = $universal_data['universal__opt-custom-logo']['url'];
$sticky_header = $universal_data['universal__opt-sticky-header'];
$body_classes = '1' === $sticky_header ? ' sticky-header' : '';
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<title>
		<?php
		bloginfo( 'name' );
		wp_title( '|', true );
		?>
	</title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class( $body_classes ); ?>>

<?php do_action( 'universal_before_body_content' ); ?>

<div id="page" class="site">

	<div class="top-wrapper">

		<?php get_template_part( 'template-parts/header/header-top-bar' ); ?>

		<div id="header-wrapper">
			<header id="header" class="header">

				<nav class="navbar navbar-toggleable-md navbar-light">

					<div class="container">
						<button
							class="navbar-toggler navbar-toggler-right"
							type="button" data-toggle="collapse"
							data-target="#main-nav"
							aria-controls="main-nav"
							aria-expanded="false"
							aria-label="Toggle navigation"
						>
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="navbar-header">
							<div class="logo">
								<?php if ( '' !== $universal_logo_url ) : ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand">
										<img src="<?php echo esc_url( $universal_logo_url ); ?>"
											alt="<?php echo esc_attr( get_bloginfo( 'description' ) ); ?>"
										>
									</a>
								<?php else : ?>
									<h1>
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand">
											<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>
										</a>
									</h1>
								<?php endif; ?>
							</div> <!-- /.logo -->
						</div> <!-- /.navbar-header -->

						<div id="main-nav" class="collapse navbar-collapse">
							<?php
							wp_nav_menu( array(
								'theme_location' => 'universal-primary-menu',
								'menu_id'        => 'universal-primary-menu',
								'container'      => '',
								'menu_class'     => 'navbar-nav ml-auto',
								'depth'          => 3,
								'walker'         => new Universal_Menu_Walker(),
								'fallback_cb'    => 'Universal_Menu_Walker::fallback',
							) );
							?>
						</div> <!-- /.collapse navbar-collapse -->
					</div> <!-- /.container -->
				</nav> <!-- /.navbar -->

			</header> <!-- /#header -->
		</div> <!-- /#header-wrapper -->
	</div> <!-- /.top-wrapper -->

	<div id="content" class="site-content">
