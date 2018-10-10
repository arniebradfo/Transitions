<nav>
	<h2 class="site-title">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<?php bloginfo( 'name' ); ?>
		</a>
	</h2>

	<?php wp_nav_menu( array(
		'theme_location' => 'primary',
		'menu_id'        => 'primary-nav',
	)); ?>

	<?php get_search_form(); ?>

</nav>