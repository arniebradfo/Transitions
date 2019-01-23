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

<!-- logo.php -->
<?php
if (has_custom_logo()) {
	$customLogo = get_custom_logo();
	$logoAndTitle = true; // TODO: customizer settings
	if ($logoAndTitle){
		preg_match('/(<img)([^>]+>)/', $customLogo, $customLogo);
		$customLogo = $customLogo[0];
		// $customLogo = preg_replace('/class="[^]"/')

	}
	echo $customLogo;
}
// get_theme_mod( 'custom_logo' );
?>
<!--/ logo.php -->

