<?php
/**
 * Template for displaying search forms in Transitions
 *
 * @package WordPress
 * @subpackage Transitions
 * @since 1.0
 * @version 1.0
 */

?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo $unique_id; ?>">
		<span class="screen-reader-text">Search!!</span>
	</label>
	<input 
		type="search" 
		id="<?php echo $unique_id; ?>" 
		placeholder="SEARCH PLACEHOLDER!!" 
		value="<?php echo get_search_query(); ?>" 
		name="s" 
		/>
	<button type="submit" >
		DO THE SEARCH!!
	</button>
</form>
