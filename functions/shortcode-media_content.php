<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */

	// shortcode-media_content.php
	// =========================

	// include this file in functions.php with:
	// require_once('functions/shortcode-media_content.php');

	// wp-admin editor syntax:
	// [media_content id="boilerplate01" class="shortcode" style="color:red"] $content [/boilerplate]
	function media_content_func( $atts, $content = "" ) {
		$atts = shortcode_atts( array(
			'id' => 		'',
			'class' =>		'',
			'style' =>		'',
			'img' =>    	'',
			'img_height' => '',
			'img_width' => 	'',
			'img_alt' => 	'',
			'img_style' => 	''			
		), $atts, 'media_content' );

		$output  = '';

		$output .= '	<section ';
		$output .=          ($atts['id']    != '' ? 'id="'   .$atts['id']   .'" ' : '');
		$output .= '        class="media-content '. ($atts['class'] != '' ? $atts['class'] : '').'"';
		$output .=          ($atts['style'] != '' ? 'style="'.$atts['style'].'" ' : '');
		$output .= '	    >';
		$output .= '	<section ';
		$output .=          ($atts['id']    != '' ? 'id="'   .$atts['id']   .'" ' : '');
		$output .= '        class="media-content '. ($atts['class'] != '' ? $atts['class'] : '').'"';
		$output .=          ($atts['style'] != '' ? 'style="'.$atts['style'].'" ' : '');
		$output .= '	    >';

		$output .= '	    <div class="media-content__text">';
		$output .=			do_shortcode($content);	
		$output .= '	    This is the boilerplate shortcode!';
		$output .= '	</div></section';

		return $output;
	}

	add_shortcode( 'media_content', 'media_content_func' );

?>