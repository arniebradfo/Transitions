<?php
/**
 * icon component
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Transitions
 * @since 1.0
 * @version 1.0
 */


function transitions_component_icon( $atts, $content=null, $tag='' ) {
	$output = '<svg ';
	foreach($atts as $att => $val)
		if ($att == 'name') continue;
		$output .= $att.'="'.$val.'" '; // echo all attributes from the shorcode
	$output .= '>';
	$output .= '<use xlink:href="#icon_'.$atts['name'].'"></use>'; 
	$output .= '</svg>';
	return $output;
}
add_shortcode( 'icon', 'transitions_component_icon' );

?>
