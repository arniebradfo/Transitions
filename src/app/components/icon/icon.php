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
?>
	<!-- icon.php -->
	<svg <?php
	$atts['class'] = ! empty($atts['class']) ? "icon {$atts['class']}" : 'icon';
	foreach($atts as $att => $val)
		if ($att == 'name') continue;
		echo " $att=\"$val\""; // echo all attributes from the shortcode
	?>>
	<use xlink:href="#icon_<?php echo $atts['name'] ?>"></use>
	</svg>
	<!--/ icon.php -->
<?php
}
// add_shortcode( 'trns-icon', 'trns_icon_component' );

?>
