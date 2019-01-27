<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Transitions
 * @since 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<!-- comments.php -->
<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2>
			Comments!
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments();
			?>
		</ol>

		<?php the_comments_pagination(); ?>

	<? endif; // Check for have_comments().
	
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( !comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p>Comments are closed!!</p>
	<?php
	elseif ( comments_open() ) :
		var_dump(comments_open());
		comment_form();
	endif;
	?>

</div><!--/ comments.php -->

