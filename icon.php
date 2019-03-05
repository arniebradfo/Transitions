<?php
/**
 * icon component
 *
 * @link ???
 *
 * @package WordPress
 * @subpackage Transitions
 * @since 1.0
 * @version 1.0
 */

function trns_icon_component( $atts, $content=null, $tag='' ) {

	$atts_list = '';
	$atts['class'] = ! empty($atts['class']) ? "icon {$atts['class']}" : 'icon';
	foreach($atts as $att => $val)
		if ($att == 'name') continue;
		$atts_list .= " $att=\"$val\""; // echo all attributes from the shortcode
	
	$name =	$atts['name'];
	
	$output = <<<HTML
	<!-- icon.php -->
	<svg $atts_list ><use xlink:href="#icon_$name"></use></svg>
	<!--/ icon.php -->
HTML;
	return $output;
}
// add_shortcode( 'trns-icon', 'trns_icon_component' );

?>