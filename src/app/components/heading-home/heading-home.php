<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<div style="max-width:100px;">
<?php // TODO: ^^ remove max-width:100px
	if (has_custom_logo()) {
		$customLogo = get_custom_logo();
		$logoAndTitle = true; // TODO: customizer settings
		if ($logoAndTitle){
			preg_match('/(<img[^>]+>)/', $customLogo, $customLogo);
			$customLogo = $customLogo[0];
		}
		echo $customLogo;
	}
?>
</div>

<h1><?php bloginfo( 'name' ); ?></h1>

<p><em><?php bloginfo( 'description' ); ?></em></p>

<?php wp_nav_menu( array(
	'theme_location' => 'home',
	'menu_id'        => 'home-nav',
)); ?>
