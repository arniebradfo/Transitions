<form method="get" id="search-form" action="<?php echo home_url( '/' ); ?>">

	<label for="s" class="screen-reader-text" style="display:none;"><?php _e('Search for:','html5reset'); ?></label>

	<input type="search" class="search-term" id="s" name="s" placeholder="looking for something?" autocomplete="off" />

	<label for="searchsubmit" class="icon-capsule dark search-icon search-button">
		<svg class="icon icon-search" >
			<use xlink:href="#icon-search"></use>
		</svg>
	</label>

	<button type="submit" id="searchsubmit" value="<?php _e('Search','html5reset'); ?>" style="display:none;" ></button>



</form>