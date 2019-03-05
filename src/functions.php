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

 // this guy sucks - https://codex.wordpress.org/Content_Width
if ( ! isset( $content_width ) ) { 
	// this must match @content_Width in ./sizes.vars.less
	$content_width = 750; // 8*110 - (32*2)*2 = 750
}

// function var_dump_pre($mixed = null) { // for debug
// 	echo '<pre>';
// 	var_dump($mixed);
// 	echo '</pre>';
// 	return null;
// }

function trns_theme_setup() {

	// TODO: internationalize - i18n
	// load_theme_textdomain( 'trns', get_template_directory() . '/languages' );

	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support('custom-logo');
		
	add_theme_support( 'post-formats', array( 'link', 'video', 'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status' ) );
	add_post_type_support( 'post', 'post-formats' );
	add_post_type_support( 'page', 'post-formats' );

	// Nav Menus
	register_nav_menus( array(
		'primary' => 'Primary Navigation',
		'home'    => 'Home Navigation',
		'footer'  => 'Footer Navigation',
	) );

	// featured images aka thumbnails
	add_theme_support( 'post-thumbnails' );

	set_post_thumbnail_size( 150, 150, true );     // default Post Thumbnail dimensions: 150px width x 150px height (cropped)
	update_option( 'thumbnail_size_w', 150 );      // the size of these can be edited by the user
	update_option( 'thumbnail_size_h', 150 );      // but this overrides the user settings constantly
	update_option( 'medium_size_w', 300 );         // the size of these can be edited by the user
	update_option( 'medium_size_h', 300 );         // but this overrides the user settings constantly
	update_option( 'medium_large_size_w', 768 );   // this exists but can't be user edited
	update_option( 'medium_large_size_h', 768 );   // this exists but can't be user edited
	update_option( 'large_size_w', 1024 );         // the size of these can be edited by the user
	update_option( 'large_size_h', 1024 );         // but this overrides the user settings constantly
	
	// Add additional image sizes
	// we already have: thumbnail~150x150, medium~300x, medium_large=768x, large=1024x, original=x
	// add_image_size( 'small', 100, 100 );
	add_image_size( 'x_large', 1600, 1200 );        // 3:4 aspect ratio
	add_image_size( 'xx_large', 2000, 1500 );       // 3:4 aspect ratio
	add_image_size( 'x_large@2x', 3200, 2400 );     // 3:4 aspect ratio
	add_image_size( 'xx_large@2x', 4000, 3000 );    // 3:4 aspect ratio
	// more image sizes is good for page speed now that srcset is in wp core:
	// http://make.wordpress.org/core/2015/11/10/responsive-images-in-wordpress-4-4/

	// change option defaults - https://codex.wordpress.org/Option_Reference
	update_option('image_default_link_type', 'none');
	update_option('image_default_align', 'none');
	update_option('uploads_use_yearmonth_folders', 0); // keep all uploaded images in the same folder
	update_option('use_smilies', 0); // because fuck smiling >:( 

}
add_action( 'after_setup_theme', 'trns_theme_setup' );


// // https://wpbeaches.com/remove-wordpress-default-image-sizes/
// function prefix_remove_default_images( $sizes ) {
// 	// Remove default image sizes here. 
// 	unset( $sizes['small']);         // 150px
// 	unset( $sizes['medium']);        // 300px
// 	unset( $sizes['large']);         // 1024px
// 	unset( $sizes['medium_large']);  // 768px
// 	unset( $sizes['thumbnail']);     // 768px
// 	return $sizes;
// }
// add_filter( 'intermediate_image_sizes_advanced', 'prefix_remove_default_images' );


// Widgets
// https://codex.wordpress.org/Widgetizing_Themes
function trns_widget_setup() {
	register_sidebar( array(
		'name'          => 'Homepage Widgets',
		'id'            => 'homepage-widgets',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'trns_widget_setup' );


// add custom css to style inside the tinyMCE editor
// function add_editor_styles() {
// 	add_editor_style(); // path defaults to editor-style.css
// }
// add_action( 'admin_init', 'add_editor_styles' );


function load_theme_scripts_and_styles() {
	// Load Custom Styles
	wp_register_style( 'trns-style', get_stylesheet_uri() );
	wp_enqueue_style( 'trns-style' );
	// Remove widget css from head - https://wordpress.org/support/topic/remove-css-from-head

	wp_deregister_script( 'jquery' );

	// add the wp comment-reply.js to manage comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// load livereload if the server and client are the same address: i.e. a development server
	if ( $_SERVER['SERVER_ADDR'] === $_SERVER['REMOTE_ADDR'] ){
		wp_register_script( 'livereload', 'http://localhost:35729/livereload.js', false, false, true );
		wp_enqueue_script( 'livereload' );
	}

	// Load Custom Scripts
	wp_register_script( 'trns-script', get_template_directory_uri()."/script.js", false, false, true );
	wp_enqueue_script( 'trns-script' );

}
add_action( 'wp_enqueue_scripts', 'load_theme_scripts_and_styles' ); 

// DISABLE EMOJIs  -  http://wordpress.stackexchange.com/questions/185577/disable-emojicons-introduced-with-wp-4-2
function disable_wp_emojicons() {
	// all actions related to emojis
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	// filter to remove TinyMCE emojis
	function disable_emojicons_tinymce( $plugins ) {
		if ( is_array( $plugins ) ) {
			return array_diff( $plugins, array( 'wpemoji' ) );
		} else {
			return array();
		}
	}
	add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

// https://css-tricks.com/snippets/wordpress/remove-privateprotected-from-post-titles/#comment-73313
function trns_no_title_formating($content) { return '%s'; }
add_filter('private_title_format',   'trns_no_title_formating');
add_filter('protected_title_format', 'trns_no_title_formating');

function trns_get_page_number() {
	return (get_query_var('paged')) ? get_query_var('paged') : 1;
}
function trns_get_total_pages() {
	global $wp_query;
	return $wp_query->max_num_pages;
}
function trns_is_post_paginated(){
	global $multipage;
	return 0 !== $multipage;
}
function trns_is_last_page_of_post(){
	global $page, $numpages;
	return $page == $numpages;
}

// shortcode component includes
include_once('icon.php');
include_once('password-form.php');
include_once('pagination.php');

// adds $link_class and $first_link_class
function trns_wp_nav_menu( $args = array() ) {

	$link_class = (! empty($args['link_class'])) ? $args['link_class'] : false;
	$first_link_class = (! empty($args['first_link_class'])) ? $args['first_link_class'] : false;

	// have to implement echo.
	$echo = (! empty($args['echo'])) ? $args['echo'] : true;
	$args['echo'] = false;

	$menu = wp_nav_menu( $args );

	if ($link_class)
		$menu = preg_replace( 
			'/<a\s/',
			'<a class="'.$link_class.'" ',
			$menu
		);

	if ($first_link_class)
		$menu = preg_replace( 
			'/<a\sclass="/',
			'<a class="'.$first_link_class.' ',
			$menu, 
			1 
		);

	if ($echo)
		echo $menu;
	else 
		return $menu;
}

// adds $link_class
function trns_the_tags( $before='', $sep='', $after='', $id='', $link_class='' ) {
	echo preg_replace( 
		'/<a\s/',
		'<a class="'.$link_class.'" ', // all links need classes
		get_the_tag_list($before, $sep, $after, $id)
	);
}

// adds $link_class and $ul_class
function trns_the_categories( $separator='', $parents='', $post_id='', $link_class='', $ul_class='' ) {
	echo preg_replace( 
		'/<ul\sclass="/',
		'<ul class="'.$ul_class.' ', // all links need classes
		preg_replace( 
			'/<a\s/',
			'<a class="'.$link_class.'" ', // all links need classes
			get_the_category_list($separator, $parents, $post_id)
		)
	);
}

function trns_ascii_logo() {
	return <<<HTML
<!--

  ◺
  ▢ ▢
  ▢ ▢
  ▢ ▢
  ▢ ▢ ▢ ▢ ▢
  ▢ ▢ ▢ ▢ ▢
        ▢ ▢   ◺
  ▢ ▢ ▢ ▢ ▢   ▢ ▢
  ▢ ▢ ▢ ▢ ▢   ▢ ▢
              ▢ ▢
  ▢ ▢   ▢ ▢ ▢ ▢ ▢
  ▢ ▢   ▢ ▢ ▢ ▢ ▢
        ▢ ▢
        ▢ ▢ ▢ ▢ ▢   bradford
        ▢ ▢ ▢ ▢ ▢   digital

-->
HTML;

// OTHER OPTIONS
/*


  |\
  ||||
  ||||
  ||||
  ||||||||||
  ||||||||||  
        ||||  |\
  ||||||||||  ||||
  ||||||||||  ||||
              ||||
  ||||  ||||||||||
  ||||  ||||||||||
        ||||
        ||||||||||   bradford
        ||||||||||   digital

  ██◣
  ████
  ████
  ████
  ██████████ 
  ██████████
        ████  ██◣
  ██████████  ████
  ██████████  ████
              ████
  ████  ██████████
  ████  ██████████
        ████
	    ██████████  bradford
        ██████████  digital

 */
}

?>