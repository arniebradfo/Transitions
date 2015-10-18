<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
// shortcode-pagewrapper.php

	function pagewrapper_func( $atts, $content = "" ) {
		$atts = shortcode_atts( array(
			'style' => '',
			'title' => ( is_page(get_the_ID()) ? get_the_title() : '' ),
			'ID' => get_the_ID()
		), $atts, 'pagewrapper' );

		if ($atts['title'] == 'get_the_title') {
			$atts['title'] = get_the_title();
		}
		
		$output = '';
		$classArray = get_post_class( 'post', get_the_ID() );
		$class = '';
		foreach ($classArray as $key => $value) {
			$class .= $value .' ';
		}

		$output .= 		($atts['title'] != '' ? '<h1 class="page-title">'. $atts['title'] .'</h1>' : '');
		$output .='		<article class="'. $class .'"" id="post-'. get_the_ID() .'" '.($atts['style'] != '' ? 'style="'.$atts['style'].'"' : '').'>';
		$output .=			do_shortcode($content);
		$output .=' 	</article>';

		return $output;

	}

	add_shortcode( 'pagewrapper', 'pagewrapper_func');

?>