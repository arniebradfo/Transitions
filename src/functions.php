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

function trns_theme_setup() {

	// load_theme_textdomain( 'transitions', get_template_directory() . '/languages' );

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
	add_image_size( 'transitions-featured-image', 2000, 1200, true );
	// more image sizes is good for page speed now that srcset is in wp core:
	// http://make.wordpress.org/core/2015/11/10/responsive-images-in-wordpress-4-4/

	// change option defaults - https://codex.wordpress.org/Option_Reference
	update_option('image_default_link_type', 'none');
	update_option('image_default_align', 'none');
	update_option('uploads_use_yearmonth_folders', 0); // keep all uploaded images in the same folder
	update_option('use_smilies', 0); // becasue fuck smiling >:( 

}
add_action( 'after_setup_theme', 'trns_theme_setup' );

	// Widgets
	// function wpajax_widget_setup() {
	// 	register_sidebar( array(
	// 		'name'          => __( 'Sidebar Widgets', 'wpajax' ),
	// 		'id'            => 'sidebar-primary',
	// 		'before_widget' => '<div id="%1$s" class="widget %2$s">',
	// 		'after_widget'  => '</div>',
	// 		'before_title'  => '<h3 class="widget-title">',
	// 		'after_title'   => '</h3>',
	// 	) );
	// }
	// add_action( 'widgets_init', 'wpajax_widget_setup' );

	// add custom css to style inside the tinyMCE editor
	// function add_editor_styles() {
	// 	add_editor_style(); // path defaults to editor-style.css
	// }
	// add_action( 'admin_init', 'add_editor_styles' );

// this guy sucks - https://codex.wordpress.org/Content_Width
if ( ! isset( $content_width ) ) { 
	$content_width = 768;
}

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

function get_page_number(){
	return (get_query_var('paged')) ? get_query_var('paged') : 1;
}

// shortcode component includes
include_once('icon.php');
include_once('password-form.php');

// adds $link_class and $first_link_class
function trns_wp_nav_menu( $args = array() ) {

	$link_class = isset($args['link_class']) ? $args['link_class'] : false;
	$first_link_class = isset($args['first_link_class']) ? $args['first_link_class'] : false;

	// have to implement echo.
	$echo = isset($args['echo']) ? $args['echo'] : true;
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

function trns_ascii_logo() {
	return <<<HTML
<!--
  
  |\
  |||\
  ||||
  ||||
  ||||
  |||||||||||
  |||||||||||  |\
         ||||  |||\
  |||||||||||  ||||
  |||||||||||  ||||
               ||||
  ||||  |||||||||||
  ||||  |||||||||||
        ||||
        |||||||||||   bradford
        |||||||||||   digital

-->
HTML;
}

?>
