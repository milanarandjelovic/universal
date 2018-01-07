<?php
/**
 * The template for displaying all single posts.
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

get_header();

$universal_data = get_option( 'universal_data' );

$sp_show_navigation     = $universal_data['universal__opt-blog-sp-navigation'];
$sp_pagination_position = $universal_data['universal__opt-blog-sp-navigation-position'];
$sp_show_comments       = $universal_data['universal__opt-blog-sp-comments'];

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
?>

	<div id="primary" class="content-area">
		<div class="container">
			<div class="row">

				<main id="main" class="site-main <?php echo esc_attr( $page_layout_content ); ?>">

					<?php
					while ( have_posts() ) :
						the_post();

						if ( '1' === $sp_show_navigation && ( 'above' === $sp_pagination_position ) ) {
							universal_render_single_post_navigation();
						}

						get_template_part( 'template-parts/content', 'single' );

						if ( '1' === $sp_show_navigation && ( 'bellow' === $sp_pagination_position ) ) {
							universal_render_single_post_navigation();
						}

						if ( '1' === $sp_show_comments ) {
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
						}

					endwhile; // End of the loop.
					?>

				</main> <!-- /#main -->

				<aside id="secondary" class="sidebar <?php echo esc_attr( $page_layout_sidebar ); ?>">
					<?php
					if ( is_active_sidebar( 'universal-sidebar' ) ) {
						dynamic_sidebar( 'universal-sidebar' );
					}
					?>
				</aside> <!-- /#secondary -->

			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</div> <!-- /#primary -->

<?php
get_footer();
