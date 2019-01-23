<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */

	// Simple Shortcodes

	function rule_func( ) {
		return '<p id="post-content-rule"></p>' ;
	}

	function scroll_to_top_func( ) {
		$output .=' 		<div class="icon-capsule scroll-to-top">';
		$output .=' 			<svg class="icon icon-arrow-double-top">';
		$output .=' 				<use xlink:href="#icon-arrow-double-top"></use>';
		$output .=' 			</svg>';
		$output .=' 		</div>';
		return $output;
	}

	add_shortcode( 'scroll_to_top', 'scroll_to_top_func' );	
	add_shortcode( 'rule', 'rule_func' );	

?>