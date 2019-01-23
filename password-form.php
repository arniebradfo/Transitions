<?php
/**
 * Template for displaying password protected form in Transitions
 *
 * @package WordPress
 * @subpackage Transitions
 * @since 1.0
 * @version 1.0
 */

?>

<?php
function trns_password_form() {

	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$siteUrl = get_option('siteurl');	
	$icon = trns_icon_component(['name'=>'Unlock', 'class'=>'password-form__button-icon']);

	$output = <<<HTML
	<!-- password-form.php -->
	<h2 class="password-form__title">
		This post is password protected.
	</h2>
	<form 
		class="password-form" 
		action="$siteUrl/wp-login.php?action=postpass" 
		method="post"
		role="login"
		>
		<input 
			class="password-form__input"
			name="post_password" 
			id="$label" 
			type="password" 
			size="20"
			placeholder="Password"
			/>
		<button class="password-form__button button--icon" name="submit" type="submit" >
			$icon
		</button>
	</form><!--/ password-form.php -->

HTML;
	return $output;
}
add_filter( 'the_password_form', 'trns_password_form' );
?>
