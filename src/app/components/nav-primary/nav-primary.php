<!-- nav-primary.php -->
<button class="nav__button button--icon button--fill button--outline jsTarget-navButton">
	<?php echo trns_icon_component(['name'=>'Menu', 'class'=>'nav__open-icon']) ?>
	<?php // echo trns_icon_component(['name'=>'X', 'class'=>'nav__close-icon']) ?>
</button>

<header class="nav">
		
	<div class="nav__header">
		<div class="nav__logo">		
			<?php get_template_part('logo'); ?>
		</div>
		<a class="button--in-list nav__site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<?php bloginfo( 'name' ); ?>
		</a>
	</div>
	
	<?php wp_nav_menu( array(
		'theme_location'  => 'primary',
		'container_class' => 'nav__menu',
		'container'       => 'nav',
		'menu_class'      => 'menu nav__menu-list'
	)); ?>

	<div class="nav__footer">
		<?php get_search_form(); ?>
	</div>	

</header>

<div class="nav__overlay jsTarget-navOverlay"></div><!--/ nav-primary.php -->
