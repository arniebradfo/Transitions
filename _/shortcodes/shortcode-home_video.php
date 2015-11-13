<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
// shortcode-home_video.php

	function home_video_func( $atts, $content = "" ) {
		$atts = shortcode_atts( array(
			'style' => '',
			'src' => '',
			'autoplay' => 'true',
			'loop' => 'true',
			'muted' => 'true',
			'controls' => 'false'
		), $atts, 'home_video' );
		
		$output = '';

		$output .='		<div id="home-video-container" '.($atts['style'] != '' ? 'style="'.$atts['style'].'"' : '').'>';
		
		$output .='			<video class="home-video"  ';
		$output .='				src="'. $atts['src'] .'" ';
		$output .= 				($atts['autoplay'] == 'true' ? 'autoplay ' : '');
		$output .= 				($atts['loop']     == 'true' ? 'loop '     : '');
		$output .= 				($atts['muted']    == 'true' ? 'muted '    : '');
		$output .= 				($atts['controls'] == 'true' ? 'controls ' : '');
		$output .='			>Your browser does not support the video tag.</video>';

		$output .='			<div class="icon-capsule mute-toggle muted" >';
		$output .='				<svg class="icon icon-muted" >';
		$output .='					<use xlink:href="#icon-muted"></use>';
		$output .='				</svg>';
		$output .='				<svg class="icon icon-unmuted" >';
		$output .='					<use xlink:href="#icon-unmuted"></use>';
		$output .='				</svg>';
		$output .='			</div>';

		$output .='		</div>';

		return $output;

	}

	add_shortcode( 'home_video', 'home_video_func' );	

?>