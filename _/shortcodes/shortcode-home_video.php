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
			'mute_toggle' => 'false',
			'unmute_text' => 'false',
			'controls' => 'false'
		), $atts, 'home_video' );

		$mute_toggle = '';
		$output = '';

		if ($atts['mute_toggle'] == 'true') {
			$mute_toggle .='	<div class="icon-capsule mute-toggle muted " >';
			$mute_toggle .='		<svg class="icon icon-muted" >';
			$mute_toggle .='			<use xlink:href="#icon-muted"></use>';
			$mute_toggle .='		</svg>';
			$mute_toggle .='		<svg class="icon icon-unmuted" >';
			$mute_toggle .='			<use xlink:href="#icon-unmuted"></use>';
			$mute_toggle .='		</svg>';
			$mute_toggle .= 		($atts['unmute_text'] == 'true') ? '<div class="please-unmute-me"></div>' : '' ;
			$mute_toggle .='	</div>';
		}
		
		$output .='		<div id="home-video-container" '.($atts['style'] != '' ? 'style="'.$atts['style'].'"' : '').'>';
		
		$output .='			<video class="home-video"  ';
		$output .='				src="'. $atts['src'] .'" ';
		$output .= 				($atts['autoplay'] == 'true' ? 'autoplay ' : '');
		$output .= 				($atts['loop']     == 'true' ? 'loop '     : '');
		$output .= 				($atts['muted']    == 'true' ? 'muted '    : '');
		$output .= 				($atts['controls'] == 'true' ? 'controls ' : '');
		$output .='			>Your browser does not support the video tag.</video>';

		$output .=			$mute_toggle;

		$output .='		</div>';

		return $output;

	}

	add_shortcode( 'home_video', 'home_video_func' );	

?>