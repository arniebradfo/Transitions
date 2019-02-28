<!--heading-archive.php-->
<header class="heading heading--search heading--lacks-featured-media" id="heading">

	<div class="heading__column">

		<a class="heading__site-title  button--large" 
			href="<?php echo esc_url( home_url( '/' ) ); ?>" 
			rel="home">
			<?php bloginfo( 'name' ); ?>
		</a>

		<div class="heading__flex-splitter"></div>		

		<div class="heading__featured-media heading__featured-media--empty"></div> 

		<div class="heading__meta jsTarget-loadDelay">
			Search results for: 
		</div>

		<!-- <h1 class="heading__title jsTarget-loadDelay">
			<?php echo get_search_query() ?>
		</h1> -->

		<!-- <hr class="heading__rule jsTarget-loadDelay" /> -->
		
		<div class="heading__searchform searchform--title jsTarget-loadDelay" >
			<?php echo get_search_form(); ?>
		</div>
	
	</div>

	<?php trns_pagination_component([ 'class'=>'heading__pagination jsTarget-loadDelay', 'display_paginate_title'=>true ]); ?>

</header><!--/heading-archive.php-->
