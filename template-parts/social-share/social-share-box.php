<?php
/**
 * Template for display social sharing box.
 *
 * @package    Universal
 * @subpackage Templates
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$universal_data          = get_option( 'universal_data' );
$social_share_tag_line   = $universal_data['universal__opt-sharing-box-tag-line'];
$social_share_icons      = $universal_data['universal__opt-blog-sharing-box-social-sorter']['enabled'];
$social_tooltip_position = $universal_data['universal__opt-sharing-box-icon-tooltip-position'];
$single_post_url         = get_the_permalink( get_the_ID() );
$single_post_title       = esc_html( get_the_title() );
?>

<div class="universal-sharing-box">
	<h1 class="universal-sharing-box__title"><?php echo esc_html( $social_share_tag_line ); ?></h1>
	<ul class="universal-sharing-box__wrapper">
	<?php
	foreach ( $social_share_icons as $key => $social_icon ) {
		switch ( $key ) {
			case 'social_facebook':
				echo '<li class="universal-sharing-box__link">
						<a href="https://m.facebook.com/sharer.php?u=' . rawurlencode( $single_post_url ) . '&t=' .
				            rawurlencode( $single_post_title ) . '" target="_blank" data-toggle="tooltip" 
				            title="'. $social_icon . '" data-placement="' . esc_html( $social_tooltip_position ) . '"
				            data-animation="false"
						>
							<span class="fa fa-facebook"></span>
						</a>
					 </li>';
				break;

			case 'social_twitter':
				echo '<li class="universal-sharing-box__link">
						<a href="https://twitter.com/share?text=' .
				            rawurlencode( html_entity_decode( $single_post_title, ENT_COMPAT, 'UTF-8' ) ) .
					        '&t=' . $single_post_url . '" target="_blank"  data-toggle="tooltip" 
							title="'. $social_icon . '" data-placement="' . esc_html( $social_tooltip_position ) . '"
							data-animation="false"
						>
							<span class="fa fa-twitter"></span>
						</a>
					 </li>';
				break;

			case 'social_linkedin':
				echo '<li class="universal-sharing-box__link">
						<a href="https://www.linkedin.com/shareArticle?mini=true&url=' . $single_post_url . '&amp;title=' .
				            rawurldecode( $single_post_title ) . '" target="_blank"  data-toggle="tooltip" 
							title="'. $social_icon . '" data-placement="' . esc_html( $social_tooltip_position ) . '"
							data-animation="false"
						>
							<span class="fa fa-linkedin"></span>
						</a>
					 </li>';
				break;

			case 'social_reddit':
				echo '<li class="universal-sharing-box__link">
						<a href="http://reddit.com/submit?url=' . $single_post_url . '&amp;title=' .
				            rawurldecode( $single_post_title ) . '" target="_blank"  data-toggle="tooltip" 
							title="'. $social_icon . '" data-placement="' . esc_html( $social_tooltip_position ) . '"
							data-animation="false"
						>
							<span class="fa fa-reddit"></span>
						</a>
					 </li>';
				break;

			case 'social_google_plus':
				echo '<li class="universal-sharing-box__link">
						<a href="https://plus.google.com/share?url=' . rawurlencode( $single_post_url ) . '" target="_blank"  data-toggle="tooltip" 
							title="'. $social_icon . '" data-placement="' . esc_html( $social_tooltip_position ) . '"
							data-animation="false"
						>
							<span class="fa fa-google-plus"></span>
						</a>
					 </li>';
				break;

			case 'social_vk':
				echo '<li class="universal-sharing-box__link">
						<a href="http://vkontakte.ru/share.php?url' . rawurlencode( $single_post_url ) . '&amp;title=' .
				            rawurlencode( $single_post_title ) . '" target="_blank"  data-toggle="tooltip" 
							title="'. $social_icon . '" data-placement="' . esc_html( $social_tooltip_position ) . '"
							data-animation="false"
						>
							<span class="fa fa-vk"></span>
						</a>
					 </li>';
				break;

			case 'social_email':
				echo '<li class="universal-sharing-box__link">
						<a href="mailto:?subject=' . $single_post_url . '&body=' .
					        rawurlencode( $single_post_title ) . '" target="_blank"  data-toggle="tooltip" 
							title="'. $social_icon . '" data-placement="' . esc_html( $social_tooltip_position ) . '"
							data-animation="false"
						>
							<span class="fa fa-envelope"></span>
						</a>
					 </li>';
				break;
		}
	}
	?>
	</ul>
</div> <!-- /.universal-sharing-box -->
