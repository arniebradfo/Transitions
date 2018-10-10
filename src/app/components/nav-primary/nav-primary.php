<button class="nav__button">
	<?php echo do_shortcode('[icon name="Menu" /]'); ?>
</button>

<nav class="nav">

	<h2 class="nav_title">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<?php bloginfo( 'name' ); ?>
		</a>
	</h2>

	<?php wp_nav_menu( array(
		'theme_location' => 'primary',
		'menu_class'     => 'nav__menu'
	)); ?>

	<?php get_search_form(); ?>

</nav>
