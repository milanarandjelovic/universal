<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
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

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$universal_data      = get_option( 'universal_data' );
$sp_display_comments = $universal_data['universal__opt-blog-sp-comments'];
?>

<?php if ( '1' === $sp_display_comments ) : ?>
	<div id="comments" class="universal-comments__container">

		<?php
		// You can start editing here -- including this comment!
		if ( have_comments() ) :
			?>
			<h2 class="universal-comments__title">
				<?php
				$comment_count = get_comments_number();
				if ( 1 === $comment_count ) {
					printf(
						/* translators: 1: title. */
						esc_html_e( 'One thought on &ldquo;%1$s&rdquo;', 'universal' ),
						'<span>' . get_the_title() . '</span>'
					);
				} else {
					printf( // WPCS: XSS OK.
						/* translators: 1: comment count number, 2: title. */
						esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'universal' ) ),
						number_format_i18n( $comment_count ),
						'<span>' . get_the_title() . '</span>'
					);
				}
				?>
			</h2> <!-- /.comments-title -->

			<?php the_comments_navigation(); ?>

			<ol class="universal-comments__list">
				<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
				?>
			</ol> <!-- /.comment-list -->

			<?php
			the_comments_navigation();

			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() ) :
				?>
				<p class="universal-comments__no-comments">
					<?php esc_html_e( 'Comments are closed.', 'universal' ); ?>
				</p>
				<?php
			endif;

		endif; // Check for have_comments().

		// Comment form.
		if ( comments_open() ) :
			$commenter = wp_get_current_commenter();
			$req       = get_option( 'require_name_email' );
			$aria_req  = ( $req ) ? " aria-required='true'" : '';
			$html_req  = ( $req ) ? " required='required'" : '';
			$html5     = ( 'html5' === current_theme_supports( 'html5', 'comment-form' ) ) ? 'html5' : 'xhtml';

			$comment_field = '<div class="universal-comments__form-comment form-group">
							  		<div class="input-group">
							  			<div class="input-group-addon">
							  				<i class="fa fa-pencil"></i>
							  			</div> <!-- /.input-group-addon -->
							  			<textarea id="comment" name="comment" cols="30" rows="7" class="form-control" 
							  				placeholder="' . esc_attr__('Your Comment', 'universal') . '" 
							  				aria-required="true"
							  			></textarea>
							  		</div> <!-- /.input-group -->
							  </div> <!-- /.universal-comments__form-comment -->';

			$fields = array();

			$fields['author'] = '<div class="row">
									<div class="col-md-6">
										<div class="comment-form-author form-group">
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-user"></i>
												</div>
												<input id="author" name="author" type="text" class="form-control" 
													placeholder=" ' . esc_attr__( 'Your Name', 'universal' ) . ' " 
													value=" ' . esc_attr( $commenter['comment_author'] ) . ' " 
													size="30" ' . esc_attr( $aria_req ) . '
												/>
											</div> <!-- /.input-group -->
										</div> <!-- /.form-group -->
									</div ><!-- /.col-md-6 -->';

			$fields['email'] = '<div class="col-md-6">
									<div class="comment-form-email form-group">
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-envelope"></i>
											</div>
											<input id="email" name="email" type="email" class="form-control" 
												placeholder=" ' . esc_attr__( 'Email Address', 'universal' ) . ' " 
												value=" ' . esc_attr( $commenter['comment_author_email'] ) . ' " 
												size="30" ' . esc_attr( $aria_req ) . '
											/>
										</div> <!-- /.input-group -->
									</div> <!-- /.form-group -->
								</div> <!-- /.col-md-6 -->
								</div> <!-- /.row -->';

			$must_log_in = '<div class="alert alert-warning">' .
								sprintf(
									wp_kses(
										__( 'You must be <a href="%s">logged in</a> to post a comment.', 'universal' ),
										array(
											'a' => array(
												'href' => array(),
											),
										)
									),
									wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
								) .
								'</div>';

			$comments_args = array(
				'id_form'              => 'comment-form',
				'id_submit'            => 'submit',
				'class_form'           => '',
				'class_submit'         => 'btn btn-primary btn-block',
				'title_reply'          => esc_html__( 'Leave a Reply', 'universal' ),
				'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'universal' ),
				'cancel_reply_link'    => esc_html__( 'Cancel Reply', 'universal' ),
				'label_submit'         => esc_html__( 'Post Comment', 'universal' ),
				'comment_field'        => $comment_field,
				'comment_notes_before' => '',
				'comment_notes_after'  => '',
				'must_log_in'          => $must_log_in,
				'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
			);

			comment_form( $comments_args );
		endif;
		?>

	</div> <!-- /#comments -->
<?php endif; ?>
