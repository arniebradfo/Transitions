<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */

function arniebradfo_img_row ( $content ) {
	$img_replacer = [];

	// find each img row and create array
	preg_match_all(
		'/<div[^<>]*class="[^"<>]*img-row[^"<>]*"[^<>]*>[\s\S]*?<\/div>/', 
		$content, 
		$img_rows, 
		PREG_SET_ORDER
	);

	foreach ($img_rows as $current_row) {

		$margin = 0.95; // retrieve this from the div somehow

		preg_match_all(
			'/<img[^<>]*>/', 
			$current_row[0], 
			$imgs_array, 
			PREG_SET_ORDER
		);

		$total_ratio = 0;
		$imgs = [];

		foreach ($imgs_array as $img_item) {
			preg_replace('/\s\s+/', ' ', $img_item[0]);
			preg_match('/width="([^"]*)"/', $img_item[0], $width_string);
			preg_match('/height="([^"]*)"/', $img_item[0], $height_string);
			$width = intval($width_string[1]);
			$height = intval($height_string[1]);
			$aspect_ratio = $width / $height ;
			$img = [
				'html' => $img_item[0],
				'width' => $width,
				'height' => $height,
				'aspect_ratio' => $aspect_ratio
			];
			$total_ratio += $aspect_ratio;
			$imgs[] = $img;
		}

		$usable_width = 100 - (( count($imgs) - 1 ) * $margin );

		foreach ($imgs as $i => $img) {

			$fractional_width = ( $img['aspect_ratio'] * $usable_width ) / $total_ratio;
			$imgs[$i]['fractional_width'] = $fractional_width;
			$margin_right = ( $i+1 == count($imgs) ? 0 : $margin );
			$img_match = $img['html'];
			$img_replace = $img['html'];
			$style = 'width:'. round($fractional_width, 2) .'%;margin-right:'. round($margin_right, 2) .'%;';

			// if there is a style, pull contents, edit and replace
			if ( preg_match('/style="([^"]*)"/', $img_match, $style_match ) ) {
				// TODO: test this
				$style_match[1] .= $style;
				$img_replace = preg_replace('/style="([^"]*)"/', 'style="'.$style.'"', $img_replace);
			} else { // add a style attribute
				$img_replace = preg_replace('/(\/?>)$/', ' style="'.$style.'" />', $img_replace);
			} 

			if ( preg_match('/sizes="([^"]*)"/', $img_match) ) {
				$img_replace = preg_replace('/sizes="[^"]*"/', 'sizes="'. round($fractional_width, 2) .'vw"', $img_replace );
			}

			$img_replacer[] = [
				'img_match' => $img_match, 
				'img_replace' => $img_replace
			];
		}

		foreach ($img_replacer as $replacement) {
			$content = str_replace($replacement['img_match'], $replacement['img_replace'], $content);
		}

	}

	return $content;
}

add_filter( 'the_content', 'arniebradfo_img_row', 10, 1 );

?>