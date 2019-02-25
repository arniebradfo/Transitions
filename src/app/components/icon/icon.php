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

	$output = '<!-- icon.php -->';
	$output.= '<svg ';
	$atts['class'] = ! empty($atts['class']) ? "icon {$atts['class']}" : 'icon';
	foreach($atts as $att => $val)
		if ($att == 'name') continue;
		$output .= " $att=\"$val\""; // echo all attributes from the shorcode
	$output .= '>';
	$output .= "<use xlink:href=\"#icon_{$atts['name']}\"></use>"; 
	$output .= '</svg>';
	$output .= '<!--/ icon.php -->';
	return $output;
}
// add_shortcode( 'tnst-icon', 'trns_icon_component' );

?>
