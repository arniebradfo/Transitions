<!--heading-archive.php-->
<header class="heading heading--search">

	<div class="heading__wrapper">

		<a class="heading__site-title" 
			href="<?php echo esc_url( home_url( '/' ) ); ?>" 
			rel="home">
			<?php bloginfo( 'name' ); ?>
		</a>

		<div class="heading__featured-media"></div>

		<div class="heading__meta">
			Page #<?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
		</div>

		<h1 class="heading__title">
			<?php echo get_search_query() ?>
		</h1>

		<hr class="heading__rule" />

		<?php echo get_search_form(); ?>
	
	</div>

</header><!--/heading-archive.php-->
