<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
?>

<div id="adjacent-posts" class="clearfix">
	<?php 

		$adjacent_posts_info = array();

		$currentID =		get_the_ID();

		$previousPost = 	get_previous_post(); 
		$previousID = 		$previousPost->ID;
		$previousThumbID =	get_post_thumbnail_id($previousID);

		$nextPost = 		get_next_post(); 
		$nextID = 			$nextPost->ID;
		$nextThumbID =		get_post_thumbnail_id($nextID);

		$sizesArray = array( 'imgXS', 'imgS', 'imgM', 'imgL', 'imgXL', 'img2XL', 'img3XL', 'img4XL' );

		if( $nextID!='' ) {
			$adjacent_posts_info[] = array(
				'name' 		=> 'newer',
				'side'		=> 'left',
				'id' 		=> $nextID,
				'class' 	=> get_post_class('post-link left-post', $nextID),
				'thumbnail' => get_the_post_thumbnail( $nextID, 'thumbnail' ),
				'thumbID'	=> $nextThumbID,
				'thumbSrc'  => wp_get_attachment_image_src( $nextThumbID, 'full' )[0],
				'thumbWidth'=> wp_get_attachment_image_src( $nextThumbID, 'full' )[1],
				'thumbHeight'=> wp_get_attachment_image_src( $nextThumbID, 'full' )[2],				
				'imgXS' 	=> wp_get_attachment_image_src( $nextThumbID, 'imgXS'  )[0],
				'imgS'  	=> wp_get_attachment_image_src( $nextThumbID, 'imgS'   )[0],
				'imgM'  	=> wp_get_attachment_image_src( $nextThumbID, 'imgM'   )[0],
				'imgL'  	=> wp_get_attachment_image_src( $nextThumbID, 'imgL'   )[0],
				'imgXL' 	=> wp_get_attachment_image_src( $nextThumbID, 'imgXL'  )[0],
				'img2XL'	=> wp_get_attachment_image_src( $nextThumbID, 'img2XL' )[0],
				'imgSsq'	=> wp_get_attachment_image_src( $nextThumbID, 'imgSsq' )[0],
				'imgAlt'	=> get_post_meta($nextThumbID, '_wp_attachment_image_alt', true),			
				'title' 	=> get_the_title( $nextID ),
				'deck' 		=> get_post_custom_values( 'deck', $nextID )[0],
				'author' 	=> get_the_author_meta( 'display_name', $nextPost->post_author ),
				'date' 		=> $nextPost->post_date,
				'category' 	=> get_the_category( $nextID ),
				'tags' 		=> get_the_tags( $nextID ),
				'link' 		=> get_permalink( $nextID ),
			);
		}
		if( $previousID!='' ) {
			$adjacent_posts_info[] = array(
				'name' 		=> 'older',
				'side'		=> 'right',
				'id' 		=> $previousID,
				'class' 	=> get_post_class('post-link right-post', $previousID),
				'thumbnail' => get_the_post_thumbnail( $previousID, 'thumbnail' ),
				'thumbID'	=> $previousThumbID,
				'thumbSrc'  => wp_get_attachment_image_src( $previousThumbID, 'full' )[0],
				'thumbWidth'=> wp_get_attachment_image_src( $previousThumbID, 'full' )[1],
				'thumbHeight'=> wp_get_attachment_image_src( $previousThumbID, 'full' )[2],				
				'imgXS' 	=> wp_get_attachment_image_src( $previousThumbID, 'imgXS'  )[0],
				'imgS'  	=> wp_get_attachment_image_src( $previousThumbID, 'imgS'   )[0],
				'imgM'  	=> wp_get_attachment_image_src( $previousThumbID, 'imgM'   )[0],
				'imgL'  	=> wp_get_attachment_image_src( $previousThumbID, 'imgL'   )[0],
				'imgXL' 	=> wp_get_attachment_image_src( $previousThumbID, 'imgXL'  )[0],
				'img2XL'	=> wp_get_attachment_image_src( $previousThumbID, 'img2XL' )[0],
				'imgSsq'	=> wp_get_attachment_image_src( $previousThumbID, 'imgSsq' )[0],
				'imgAlt'	=> get_post_meta($previousThumbID, '_wp_attachment_image_alt', true),
				'title' 	=> get_the_title( $previousID ),
				'deck' 		=> get_post_custom_values( 'deck', $previousID )[0],
				'author' 	=> get_the_author_meta( 'display_name', $previousPost->post_author ),
				'date' 		=> $previousPost->post_date,
				'category' 	=> get_the_category( $previousID ),
				'tags' 		=> get_the_tags( $previousID ),
				'link' 		=> get_permalink( $previousID ),
			);
		}
		// if( count($adjacent_posts_info) > 1){

		$adjacent_posts = '';
		foreach ($adjacent_posts_info as $post) {

			$adjacent_posts .='<article id="post-'. $post['id'] .'" class=" ';
			if ( $post['class'] ) {
				foreach($post['class'] as $value) {
					$adjacent_posts .= $value . ' '; 
				}
			} 
			if( count($adjacent_posts_info) <= 1){
				$adjacent_posts .='only-post ';
			} 
			$adjacent_posts .='">';

			$adjacent_posts .='<a href="'. $post['link'] .'" class="post-permalink"></a>';

			$adjacent_posts .='
				<h2>
					<span class="prev-next">'. $post['name'] .'</span>
					'. $post['title'] .'
					<span> '. $post['deck'] .' </span>
				</h2>
			';

			if ( count($adjacent_posts_info) > 1) {
				// if there are two post links serve half page image at >750px
				$imgSize = '50vw';
			} else {
				// if there is one post link serve an image that is twice as large.
				$imgSize = '100vw';
			}
			if ( $post['thumbnail']) {
				$adjacent_posts .='
					<img src="'. $post['thumbSrc'] .'" 
					     alt="'. get_post_meta($post['thumbID'], '_wp_attachment_image_alt', true).'" 
					     width="'. $post['thumbWidth'] .'" 
					     height="'. $post['thumbHeight'] .'" 
					     class="" 
					     srcset="';
					            foreach ($sizesArray as $i) {
					            	$currentSrc = wp_get_attachment_image_src( $post['thumbID'], $i );
					            	$adjacent_posts .=  ($currentSrc[3] !== false ?$currentSrc[0].' ' .$currentSrc[1].'w, ':'');
					            }
					            $adjacent_posts .=  $post['thumbSrc'] .' '.$post['thumbWidth'].'w"';
					     $adjacent_posts .='       
					     sizes="(max-width: '. $post['thumbWidth'].'px) '. $imgSize .', '. $post['thumbWidth'].'px"
					/>';
			} else {
				//if there is no image to set
				$adjacent_posts .='<!-- no featured image set -->';
			}

			$adjacent_posts .='<div class="image-overlay"></div>';

			$adjacent_posts .='
				<div class="post-meta-data">
					<p>Posted on:
						<time class="entry-date" datetime="'. get_the_date( 'c' , $post['id'] ) .'" >'
							. get_the_date( 'm/d/Y' , $post['id'] ) .
						'</time>
						by:
						<span class="byline author vcard">'
							. $post['author'] .
						'</span>
					</p>
			';

			$adjacent_posts .='<p>Posted in:';
				foreach($post['category'] as $cat){
					$adjacent_posts .= '<a href ="' . get_category_link( $cat->cat_id ) . '" > ' . $cat->cat_name . '</a> ';
				}
			$adjacent_posts .='</p>'; 

			if ($post['tags']) {
				$adjacent_posts .= '<p>Tags: ';
				foreach($post['tags'] as $tag) {
					$adjacent_posts .= '<a href ="' . get_tag_link( $tag->term_id ) . '" >' . $tag->name . '</a>, ';
				}
				$adjacent_posts .= '</p>';
			}
					
			$adjacent_posts .='</div>';
			
			$adjacent_posts .='
				<div class="icon-capsule info-toggle" >
					<svg class="icon icon-info" >
						<use xlink:href="#icon-info"></use>
					</svg>
					<svg class="icon icon-close" >
						<use xlink:href="#icon-close"></use>
					</svg>
				</div>
			';

			$adjacent_posts .='
				<svg class="nav-arrow-tall nav-arrow-tall-'. $post['side'] .'">
					<use xlink:href="#nav-arrow-tall-'. $post['side'] .'" ></use>
				</svg>
			';

			$adjacent_posts .='</article>';

		} // end of $adjacent_posts foreach		
		

		echo  $adjacent_posts;

	?>

</div> <!-- end "adjacent clearfix" -->