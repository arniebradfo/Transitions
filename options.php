<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'html5reset'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	$options = array();

	$options[] = array(
		'name' => __('Header Meta', 'html5reset'),
		'type' => 'heading');

// ------------------------------------------------------ Standard Meta
	$options[] = array(
		'name' => __('Head ID', 'html5reset'),
		'desc' => __("", 'html5reset'),
		'id' => 'meta_headid',
		'std' => 'www-sitename-com',
		'type' => 'text');
	$options[] = array(
		'name' => __('Google Webmasters', 'html5reset'),
		'desc' => __("Speaking of Google, don't forget to set your site up: <a href='http://google.com/webmasters' target='_blank'>http://google.com/webmasters</a>", 'html5reset'),
		'id' => 'meta_google',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Author Name', 'html5reset'),
		'desc' => __('Populates meta author tag.', 'html5reset'),
		'id' => 'meta_author',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Mobile Viewport', 'html5reset'),
		'desc' => __('Uncomment to use; use thoughtfully!', 'html5reset'),
		'id' => 'meta_viewport',
		'std' => 'width=device-width, initial-scale=1.0',
		'type' => 'text');

// ------------------------------------------------------ Logo - added by ArnieBradfo
	$options[] = array(
		'name' => __('Site Logo', 'html5reset'),
		'desc' => __('select image file for logo', 'html5reset'),
		'id' => 'site_logo',
		'type' => 'upload');
	$options[] = array(
		'name' => __('Inline SVG Site logo', 'html5reset'),
		'desc' => __('add svg to be included inline instead of a logo', 'html5reset'),
		'id' => 'inline_svg_logo',
		'std' => '',
		'type' => 'textarea');

// ------------------------------------------------------ Icons
	$options[] = array(
		'name' => __('Site Favicon', 'html5reset'),
		'desc' => __('1024px x 1024px - transparency is OK', 'html5reset'),
		'id' => 'head_favicon',
		'type' => 'upload');
	$options[] = array(
		'name' => __('Apple Touch Icon', 'html5reset'),
		'desc' => __('180px x 180px - named: "apple-touch-icon-precomposed.png"', 'html5reset'),
		'id' => 'head_apple_touch_icon',
		'type' => 'upload');

// ------------------------------------------------------ App: Windows 8
	$options[] = array(
		'name' => __('App: Windows 8', 'html5reset'),
		'desc' => __('Application Name', 'html5reset'),
		'id' => 'meta_app_win_name',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __('Tile Color', 'html5reset'),
		'id' => 'meta_app_win_color',
		'std' => '',
		'type' => 'color');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __('Tile Image', 'html5reset'),
		'id' => 'meta_app_win_image',
		'std' => '',
		'type' => 'upload');

// ------------------------------------------------------ App: Twitter
	$options[] = array(
		'name' => __('App: Twitter Card', 'html5reset'),
		'desc' => __('twitter:card (summary, photo, gallery, product, app, player)', 'html5reset'),
		'id' => 'meta_app_twt_card',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __('twitter:site (@username of website)', 'html5reset'),
		'id' => 'meta_app_twt_site',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __("twitter:title (the user's Twitter ID)", 'html5reset'),
		'id' => 'meta_app_twt_title',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __('twitter:description (maximum 200 characters)', 'html5reset'),
		'id' => 'meta_app_twt_description',
		'std' => '',
		'type' => 'textarea');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __('twitter:url (url for the content)', 'html5reset'),
		'id' => 'meta_app_twt_url',
		'std' => '',
		'type' => 'text');

// ------------------------------------------------------ App: Facebook
	$options[] = array(
		'name' => __('App: Facebook', 'html5reset'),
		'desc' => __('og:title', 'html5reset'),
		'id' => 'meta_app_fb_title',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __('og:description', 'html5reset'),
		'id' => 'meta_app_fb_description',
		'std' => '',
		'type' => 'textarea');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __('og:url', 'html5reset'),
		'id' => 'meta_app_fb_url',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __('og:image', 'html5reset'),
		'id' => 'meta_app_fb_image',
		'std' => '',
		'type' => 'upload');

// ------------------------------------------------------ Social Media Links
	$options[] = array(
		'name' => __('Social Media Links', 'html5reset'),
		'desc' => __('Facebook', 'html5reset'),
		'id' => 'link_facebook',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __('Twitter', 'html5reset'),
		'id' => 'link_twitter',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __('Instagram', 'html5reset'),
		'id' => 'link_instagram',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __('Git Hub', 'html5reset'),
		'id' => 'link_github',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __('Codepen', 'html5reset'),
		'id' => 'link_codepen',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __('Google+', 'html5reset'),
		'id' => 'link_google',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __('LinkedIn', 'html5reset'),
		'id' => 'link_linkedin',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __('Pinterest', 'html5reset'),
		'id' => 'link_pinterest',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __('Dribbble', 'html5reset'),
		'id' => 'link_dribbble',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __('Behance', 'html5reset'),
		'id' => 'link_behance',
		'std' => '',
		'type' => 'text');


	return $options;

}