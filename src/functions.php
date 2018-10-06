<?php
/**
 * Transitions functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Transitions
 * @since 1.0
 */

function transitions_theme_setup() {

	// load_theme_textdomain( 'transitions', get_template_directory() . '/languages' );

	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-formats', array( 'link', 'video', 'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status' ) );
	add_post_type_support( 'post', 'post-formats' );
	add_post_type_support( 'page', 'post-formats' );

	// Nav Menus
	register_nav_menus( array(
		'primary'   => __( 'Navigation Menu', 'transitions' ),
		'secondary' => __( 'Footer Menu', 'transitions' ),
	) );

	// featured images aka thumbnails
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions: 150px width x 150px height (cropped)
	update_option( 'thumbnail_size_w', 150 ); // don't depend on these 
	update_option( 'thumbnail_size_h', 150 ); // the size of these can be edited by the user

	// add image and manage image sizes
	add_image_size( 'small', 100 );
	update_option( 'medium_size_w', 300 ); // don't depend on these 
	update_option( 'medium_size_h', 300 ); // the size of these can be edited by the user
	update_option( 'medium_large_size_w', 768 );
	update_option( 'medium_large_size_h', 768 );	
	update_option( 'large_size_w', 1024 ); // don't depend on these 
	update_option( 'large_size_h', 1024 ); // the size of these can be edited by the user
	add_image_size( 'extralarge', 1600 );
	// more image sizes is good for page speed now that srcset is in wp core:
	// http://make.wordpress.org/core/2015/11/10/responsive-images-in-wordpress-4-4/

	// change option defaults - https://codex.wordpress.org/Option_Reference
	update_option('image_default_link_type', 'none');
	update_option('image_default_align', 'none');
	update_option('uploads_use_yearmonth_folders', 0); // keep all uploaded images in the same folder
	update_option('use_smilies', 0); // becasue fuck smiling >:( 

}
add_action( 'after_setup_theme', 'transitions_theme_setup' );


 ?>