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

<header class="heading">

	<div class="heading__wrapper">
	
		<div class="heading__logo">		
			<?php // TODO: ^^ remove max-width:100px
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
			get_theme_mod( 'custom_logo' );
			?>
		</div>

		<h1 class="heading__title">
			<?php bloginfo( 'name' ); ?>
		</h1>

		<hr class="heading__rule" />

		<p class="heading__description">
			<?php bloginfo( 'description' ); ?>
		</p>

		<?php wp_nav_menu( array(
			'theme_location'  => 'home',
			'container_class' => 'heading__menu',
			'container'       => 'nav',
			'menu_class'      => 'menu heading__menu-list'
		)); ?>

	</div>
	

</header>
