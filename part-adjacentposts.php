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

		if( $nextID!='' ) {
			$adjacent_posts_info[] = array(
				'name' 		=> 'newer',
				'side'		=> 'left',
				'id' 		=> $nextID,
				'class' 	=> get_post_class('post-link left-post', $nextID),
				'thumbnail' => get_the_post_thumbnail( $nextID, 'thumbnail' ),
				'thumbID'	=> $nextThumbID,
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

			if ( $post['thumbnail'] && count($adjacent_posts_info) > 1) {
				// if there are two post links serve half page image at >750px
				$adjacent_posts .='
					<picture>
						<!--[if IE 9]><video style="display: none;"><![endif]-->
						<source srcset="' . $post['img2XL'] . '" 	media="(min-width: 3000px )">
						<source srcset="' . $post['imgXL'] . '" 	media="(min-width: 2000px )">
						<source srcset="' . $post['imgL'] . '" 		media="(min-width: 1500px )">
						<source srcset="' . $post['imgM'] . '" 		media="(min-width: 1000px )">
						<source srcset="' . $post['imgSsq'] . '" 	media="(min-width: 750px )">
						<source srcset="' . $post['imgM'] . '" 		media="(min-width: 500px )">
						<source srcset="' . $post['imgS'] . '" 		media="(min-width: 250px )">
						<source srcset="' . $post['imgXS'] . '" 	media="(min-width: 0px )">
						<!--[if IE 9]></video><![endif]-->
						<img srcset=" " alt="' . $post['imgAlt'] . '">
						<noscript>' . $post['thumbnail'] . '</noscript>
					</picture>
				';
			} elseif ( $post['thumbnail'] && count($adjacent_posts_info) <= 1) {
				// if there is one post link serve an image that is twice as large.
				$adjacent_posts .='
					<picture>
						<!--[if IE 9]><video style="display: none;"><![endif]-->
						<source srcset="' . $post['img4XL'] . '" 	media="(min-width: 3000px )">
						<source srcset="' . $post['img3XL'] . '" 	media="(min-width: 2000px )">
						<source srcset="' . $post['img2XL'] . '" 	media="(min-width: 1500px )">
						<source srcset="' . $post['imgXL'] . '" 	media="(min-width: 1000px )">
						<source srcset="' . $post['imgL'] . '" 		media="(min-width: 750px )">
						<source srcset="' . $post['imgM'] . '" 		media="(min-width: 500px )">
						<source srcset="' . $post['imgS'] . '" 		media="(min-width: 250px )">
						<source srcset="' . $post['imgXS'] . '" 	media="(min-width: 0px )">
						<!--[if IE 9]></video><![endif]-->
						<img srcset=" " alt="' . $post['imgAlt'] . '">
						<noscript>' . $post['thumbnail'] . '</noscript>
					</picture>
				';			} else {
				//if there is no image to set
				$adjacent_posts .='<img><!-- no featured image set -->';
			}

			$adjacent_posts .='<div class="image-overlay"></div>';

			$adjacent_posts .='
				<footer class="post-meta-data">
					<p>Posted on:
						<time class="entry-date" datetime="'. get_the_date( 'c' , $post['id'] ) .'" pubdate>'
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
					
			$adjacent_posts .='</footer>';
			
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