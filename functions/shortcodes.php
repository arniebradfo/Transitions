<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */

	// CUSTOM SHORTCODES
	function pagehead_func( $atts, $content = "" ) {
		$atts = shortcode_atts( array(
			'id' =>  (is_page(get_the_ID()) ? 'page-header' : 'post-header' ),
			'class' => ( is_page(get_the_ID()) ? 'page-masthead' : 'post-masthead' ),
			'title' => ( is_page(get_the_ID()) ? '' : get_the_title() ),
			'deck' => '',
			'style' => '',
			'svgdefs' => '',
			'featured_image' => 'true',
			'video' => '',
			'scroll_down' => 'true'
		), $atts, 'pagehead' );

		$ID = get_the_ID();
		$output  = '';

		// add the scroll down button
		$scroll_down = '';
		if ($atts['scroll_down'] == "true" ){
			$scroll_down .= '		<div class="icon-capsule scroll-down">';
			$scroll_down .= '			<svg class="icon icon-arrow-bottom">';
			$scroll_down .= '				<use xlink:href="#icon-arrow-bottom"></use>';
			$scroll_down .= '			</svg>';
			$scroll_down .= '		</div>';
		}

		// add the featured image in a perfect contain
		$heroimage = '';
		if ($atts['featured_image'] == 'true' ){

			$thumbID = get_post_thumbnail_id($ID);
			$thumbSrc = wp_get_attachment_image_src( $thumbID, 'full' )[0];
			$thumbWidth = wp_get_attachment_image_src( $thumbID, 'full' )[1];
			$sizesArray = array( 'imgXS', 'imgS', 'imgM', 'imgL', 'imgXL', 'img2XL', 'img3XL', 'img4XL' );

			$heroimage .='	<div class="perfect-contain"> ';
			$heroimage .='		<img src="'. $thumbSrc .'" '; 
			$heroimage .='		     alt="'. get_post_meta($thumbID, '_wp_attachment_image_alt', true) .'" '; 
			$heroimage .='		     width="'. $thumbWidth.'" '; 
			$heroimage .='		     height="'. wp_get_attachment_image_src( $thumbID, 'full' )[2] .'" '; 
			$heroimage .='		     class=""'; 
			$heroimage .='		     srcset="'; 
								            foreach ($sizesArray as $i) {
								            	$currentSrc = wp_get_attachment_image_src( $thumbID, $i ); 
												$heroimage .= ($currentSrc[3] !== false ?$currentSrc[0].' ' .$currentSrc[1].'w, ':'');
								            } 
			$heroimage .=		            $thumbSrc .' '.$thumbWidth.'w';
			$heroimage .='		            " '; 
			$heroimage .='		     sizes="(max-width: '. $thumbWidth .'px) 100vw, '. $thumbWidth .'px"'; 
			$heroimage .='		/>'; 
			$heroimage .='	</div>'; 
		}

		// add the featured image in a perfect contain
		$footer = '';
		if (!is_page(get_the_ID()) ){

			$footer .= '	<footer class="post-meta-data">';
			$footer .= '		<p> Posted on: '. get_the_date() .' By: <a href="'. get_the_author_link() .'">'. get_the_author() .'</a></p>';
			$footer .= '		<p> Posted in: ' . get_the_category_list(', ') .'</p>';
			$footer .= '		<p> Tags: '. get_the_tag_list('',', ') .'</p>';
			$footer .= '	</footer>';

			$footer .= '	<div class="icon-capsule info-toggle">';
			$footer .= '		<svg class="icon icon-info" >';
			$footer .= '			<use xlink:href="#icon-info"></use>';
			$footer .= '		</svg>';
			$footer .= '		<svg class="icon icon-close" >';
			$footer .= '			<use xlink:href="#icon-close"></use>';
			$footer .= '		</svg>';
			$footer .= '	</div>';
		}

		$output .=		($atts['svgdefs'] !== '' ? file_get_contents($atts['svgdefs']) : '' );
		$output .= '	<header id="'.$atts['id'].'" class="'.$atts['class'].'" '. ($atts['style'] !== '' ? 'style="'.$atts['style'].'"' : '').'>';
		$output .=          $heroimage;
		$output .=			do_shortcode($content);
		$output .= '		<h1 class="entry-title">';
		$output .=  			$atts['title'];
		$output .= '			<span>'. $atts['deck'] .'</span>';
		$output .= '		</h1>';
		$output .=      	$footer;
		$output .=      	$scroll_down;
		$output .= '	</header>';

		return $output;
	}

	function pagewrapper_func( $atts, $content = "" ) {
		$atts = shortcode_atts( array(
			'style' => '',
			'title' => ( is_page(get_the_ID()) ? '<h1 class="page-title">'. get_the_title() .'</h1>' : '' ),
			'ID' => get_the_ID()
		), $atts, 'pagewrapper' );
		
		$output = '';
		$classArray = get_post_class( 'post', get_the_ID() );
		$class = '';
		foreach ($classArray as $key => $value) {
			$class .= $value .' ';
		}

		$output .= 		$atts['title'];
		$output .='		<article class="'. $class .'"" id="post-'. get_the_ID() .'">';
		$output .=			do_shortcode($content);
		$output .=' 	</article>';

		return $output;

	}

	function rule_func( ) {
		return '<p id="post-content-rule"></p>' ;
	}

	function scroll_to_top_func( ) {
		$output .=' 		<div class="icon-capsule scroll-to-top">';
		$output .=' 			<svg class="icon icon-arrow-double-top">';
		$output .=' 				<use xlink:href="#icon-arrow-double-top"></use>';
		$output .=' 			</svg>';
		$output .=' 		</div>';
		return $output;
	}

	// Add all shortcodes
	add_shortcode( 'scroll_to_top', 'scroll_to_top_func' );	
	add_shortcode( 'rule', 'rule_func' );	
	add_shortcode( 'pagehead', 'pagehead_func' );
	add_shortcode( 'pagewrapper', 'pagewrapper_func');

?>