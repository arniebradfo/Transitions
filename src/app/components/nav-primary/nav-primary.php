<button class="nav__button button--icon">
	<?php echo trns_icon_component(['name'=>'Menu', 'class'=>'nav__open-icon']) ?>
	<?php // echo trns_icon_component(['name'=>'X', 'class'=>'nav__close-icon']) ?>
</button>

<header class="nav">
		
	<div class="nav__header">
		<a class="nav_title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<?php bloginfo( 'name' ); ?>
		</a>
	</div>
	
	<?php wp_nav_menu( array(
		'theme_location'  => 'primary',
		'container_class' => 'nav__menu',
		'container'       => 'nav'
		
	)); ?>

	<div class="nav__footer">
		<?php get_search_form(); ?>
	</div>	

</header>

<div class="nav__overlay"></div>
