<?php
/**
 * Template for display footer social links.
 *
 * @package    Universal
 * @subpackage Templates
 * @since      1.0.0
 * @author     Milan Arandjelovic
 */

$universal_option = get_option( 'universal_data' );
$footer_social    = $universal_option['universal__opt-footer-social-in-footer'];

// Social media links array.
$social_media_links = $universal_option['universal__opt-social-media'];
?>

<?php if ( '1' === $footer_social ) : ?>
	<div class="universal__footer-social">
		<div class="container">
			<div class="row">
				<ul class="universal__footer-social-links d-block mx-auto">
					<?php
					foreach ( array_filter( $social_media_links ) as $key => $social_media_link ) {
						switch ( $key ) {
							case esc_html__( 'Facebook URL', 'universal' ): // Facebook URL.
								echo '<li><a href="' . esc_url( $social_media_link )
									. '" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>';
								break;

							case esc_html__( 'Google+ URL', 'universal' ): // Google+ URL.
								echo '<li><a href="' . esc_url( $social_media_link )
									. '" title="Google+" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
								break;

							case esc_html__( 'Twitter URL', 'universal' ): // Twitter URL.
								echo '<li><a href="' . esc_url( $social_media_link )
									. '" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>';
								break;

							case esc_html__( 'Youtube URL', 'universal' ): // Youtube URL.
								echo '<li><a href="' . esc_url( $social_media_link )
									. '" title="Youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>';
								break;

							case esc_html__( 'LinkedIn URL', 'universal' ): // LinkedIn URL.
								echo '<li><a href="' . esc_url( $social_media_link )
									. '" title="LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
								break;

							case esc_html__( 'Github URL', 'universal' ): // Github URL.
								echo '<li><a href="' . esc_url( $social_media_link )
									. '" title="Github" target="_blank"><i class="fa fa-github"></i></a></li>';
								break;

							case esc_html__( 'Bitbucket URL', 'universal' ): // Bitbucket URL.
								echo '<li><a href="' . esc_url( $social_media_link )
									. '" title="Bitbucket" target="_blank"><i class="fa fa-bitbucket"></i></a></li>';
								break;

							case esc_html__( 'Instagram URL', 'universal' ): // Instagram URL.
								echo '<li><a href="' . esc_url( $social_media_link )
									. '" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>';
								break;

							case esc_html__( 'Pinterest URL', 'universal' ): // Pinterest URL.
								echo '<li><a href="' . esc_url( $social_media_link )
									. '" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a></li>';
								break;

							case esc_html__( 'VK URL', 'universal' ): // VK URL.
								echo '<li><a href="' . esc_url( $social_media_link )
									. '" title="VK" target="_blank"><i class="fa fa-vk"></i></a></li>';
								break;

							case esc_html__( 'Tumblr URL', 'universal' ): // Tumblr URL.
								echo '<li><a href="' . esc_url( $social_media_link )
									. '" title="Tumblr" target="_blank"><i class="fa fa-tumblr"></i></a></li>';
								break;

							case esc_html__( 'Vimeo URL', 'universal' ): // Vimeo URL.
								echo '<li><a href="' . esc_url( $social_media_link )
									. '" title="Vimeo" target="_blank"><i class="fa fa-vimeo"></i></a></li>';
								break;

							case esc_html__( 'Dribbble URL', 'universal' ): // Dribbble URL.
								echo '<li><a href="' . esc_url( $social_media_link )
									. '" title="Dribbble" target="_blank"><i class="fa fa-dribbble"></i></a></li>';
								break;

							case esc_html__( 'Flickr URL', 'universal' ): // Flickr URL.
								echo '<li><a href="' . esc_url( $social_media_link )
									. '" title="Flickr" target="_blank"><i class="fa fa-flickr"></i></a></li>';
								break;

							case esc_html__( 'Yelp URL', 'universal' ): // Yelp URL.
								echo '<li><a href="' . esc_url( $social_media_link )
									. '" title="Yelp" target="_blank"><i class="fa fa-yelp"></i></a></li>';
								break;
						} // endswitch.
					} // endforeach.
					?>
				</ul> <!-- /.universal__footer-social-links -->
			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</div> <!-- /.universal__footer-social -->
<?php endif; ?>
