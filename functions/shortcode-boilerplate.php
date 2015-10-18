<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */

	// shortcode-boilerplate.php
	// =========================

	// include this file in functions.php with:
	// require_once('functions/shortcode-boilerplate.php');

	// wp-admin editor syntax:
	// [boilerplate id="boilerplate01" class="shortcode" style="color:red"] $content [/boilerplate]
	function boilerplate_func( $atts, $content = "" ) {
		$atts = shortcode_atts( array(
			'id' => 	'',
			'class' =>	'default',
			'style' =>	''
		), $atts, 'boilerplate' );

		$output  = '';

		$output .= '	<div ';
		$output .=          ($atts['id']    != '' ? 'id="'   .$atts['id']   .'" ' : '');
		$output .=          ($atts['class'] != '' ? 'class="'.$atts['class'].'" ' : '');
		$output .=          ($atts['style'] != '' ? 'style="'.$atts['style'].'" ' : '');
		$output .= '	    >';
		$output .=			do_shortcode($content);	
		$output .= '	    This is the boilerplate shortcode!';
		$output .= '	</div>';

		return $output;
	}

	add_shortcode( 'boilerplate', 'boilerplate_func' );

?>