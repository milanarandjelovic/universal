<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package    Universal
 * @subpackage Templates
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

get_header();

$universal_data = get_option( 'universal_data' );

$blog_title           = $universal_data['universal__opt-blog-title'];
$blog_pagination_type = $universal_data['universal__opt-blog-pagination-type'];

$sidebar_position = $universal_data['universal__opt-blog-sidebar'];
$sidebar_width    = $universal_data['universal__opt-blog-sidebar-width'];

$container_class = 'universal-posts-container ';

if ( '2' === $sidebar_width ) {
	$sidebar_class = '4';
	$content_class = '8';
} else {
	$sidebar_class = '3';
	$content_class = '9';
}

// Right sidebar by default.
$page_layout_content = 'col-md-' . $content_class;
$page_layout_sidebar = 'col-md-' . $sidebar_class;

if ( '2' === $sidebar_position ) {
	// Left sidebar.
	$page_layout_content = 'col-md-' . $content_class . ' push-md-' . $sidebar_class;
	$page_layout_sidebar = 'col-md-' . $sidebar_class . ' pull-md-' . $content_class;
}

if ( 'load_more_button' === $blog_pagination_type ) {
	$container_class .= 'universal-posts-container-infinite-scroll universal-posts-container-load-more ';
} elseif ( 'infinite_scroll' === $blog_pagination_type ) {
	// Add universal-posts-container-infinite to posts container.
	$container_class .= 'universal-posts-container-infinite-scroll ';
} else {
	$container_class .= 'universal-posts-container-pagination ';
}

$number_of_pages = $wp_query->max_num_pages;
?>

	<header class="page__title">
		<div class="section__title-wrapper">
			<div class="container">
				<div class="row">
					<h1 class="section__title">
						<?php
						if ( '' === $blog_title ) {
							esc_html_e( 'Blog', 'universal' );
						} else {
							echo esc_html( $blog_title );
						}
						?>
					</h1>
				</div> <!-- /.row -->
			</div> <!-- /.container -->
		</div> <!-- /.section__title-wrapper -->
	</header> <!-- /.page__title -->

	<div class="page__section">
		<div class="container">
			<div class="row">
				<main id="primary" class="site-main <?php echo esc_attr( $page_layout_content ); ?>">

					<?php
					if ( have_posts() ) :
						?>
						<div
							class="<?php echo esc_attr( $container_class ); ?>"
							data-pages="<?php echo (int) $number_of_pages; ?>"
						>
						<?php

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );

						endwhile;

						?>
						</div> <!-- /.universal-posts-container-infinite-scroll universal-posts-container-load-more -->
						<?php

						universal_pagination();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>

				</main> <!-- /#primary -->

				<aside id="secondary" class="sidebar <?php echo esc_attr( $page_layout_sidebar ); ?>">
					<?php
					if ( is_active_sidebar( 'universal-sidebar' ) ) {
						dynamic_sidebar( 'universal-sidebar' );
					}
					?>
				</aside> <!-- /#secondary -->

			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</div> <!-- /.page__section -->

<?php
get_footer();
