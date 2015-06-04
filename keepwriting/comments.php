<?php
/**
 * The comments template file
 *
 * @package WordPress
 * @subpackage keepwriting
 * @since keepwriting 1.0
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<h4 class="comments-title page-header hidden-sm hidden-xs">
		<?php
			printf( _n( '1 Comment', '%1$s Comments', get_comments_number(), 'twentyfourteen' ),
				number_format_i18n( get_comments_number() ), get_the_title() );
		?>   
	</h4>
<div id="collapseOne">
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'twentyfourteen' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentyfourteen' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentyfourteen' ) ); ?></div>
	</nav><!-- #comment-nav-above -->
	<?php endif; // Check for comment navigation. ?>
	<ol class="comment-list">
		<?php
			wp_list_comments( array( 'callback' => 'keepwriting_comment' ) );
		?>
	</ol><!-- .comment-list -->
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'twentyfourteen' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentyfourteen' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentyfourteen' ) ); ?></div>
	</nav><!-- #comment-nav-below -->
	<?php endif; // Check for comment navigation. ?>
	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyfourteen' ); ?></p>
	<?php endif; ?>
 </div>
 <div id="collapseTwo">
<?php 
$args = array(
  'id_form'           => 'commentform',
  'id_submit'         => 'submit',
  'title_reply'       => __( 'Leave a Comment', 'keepwriting' ),
  'title_reply_to'    => __( 'Leave a Comment to %s', 'keepwriting' ),
  'cancel_reply_link' => __( 'Cancel Comment', 'keepwriting' ),
  'label_submit'      => __( 'Post Comment', 'keepwriting' ),
'comment_field' => '<p class="comment-form-comment"><label for="comment">Comment</label> <textarea class="form-control" id="comment" name="comment" cols="35" rows="12" aria-required="true" required></textarea></p>',
'fields'        => array(
    'author' => '<p class="comment-form-author"><label for="author">Name <span class="required">*</span></label> <input class="form-control input-comment-author" id="author" name="author" type="text" value="" size="30" aria-required="true" style="width:60%; min-width:200px;" required></p>',
    'email'  => '<p class="comment-form-email"><label for="email">Email <span class="required">*</span></label> <input class="form-control input-comment-email" id="email" name="email" type="email" value="" size="30" aria-required="true" style="width:60%; min-width:200px;" required></p>',
    'url'    => '<p class="comment-form-url"><label for="url">Website</label> <input class="form-control input-comment-url" id="url" name="url" type="text" style="width:60%; min-width:200px;" value="" size="30"></p>',
),
'cancel_reply_link' => '<button class="btn btn-danger btn-xs">Cancel reply</button>',
'comment_notes_after' => '',
'label_submit' => 'Post Comment',);
ob_start();
comment_form( $args );
$form = ob_get_clean(); 
$form = str_replace('class="comment-form"','class="comment-form"', $form);
echo str_replace('id="submit"','class="btn btn-default"', $form); 
?>
</div>
</div><!-- #comments -->
