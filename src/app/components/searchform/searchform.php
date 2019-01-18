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

<!-- searchform.php -->
<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>
<form 
	class="searchform" 
	role="search" 
	method="get" 
	action="<?php echo esc_url( home_url( '/' ) ); ?>"
	>
	<input 
		class="searchform__input"
		type="search" 
		id="<?php echo $unique_id; ?>" 
		placeholder="Search" 
		value="<?php echo get_search_query(); ?>" 
		name="s" 
		/>
	<button class="searchform__button button--icon" type="submit" >
		<?php echo trns_icon_component(['name'=>'Search', 'class'=>'searchform__button-icon']) ?>
	</button>
</form><!--/ searchform.php -->
