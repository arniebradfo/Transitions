<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */

	// CUSTOM SHORTCODES
	// require_once( dirname( __FILE__ ) .'/_/shortcodes/shortcode-boilerplate.php');
	require_once( dirname( __FILE__ ) .'/_/shortcodes/shortcodes.php');
	require_once( dirname( __FILE__ ) .'/_/shortcodes/shortcode-home_video.php');
	require_once( dirname( __FILE__ ) .'/_/shortcodes/shortcode-pagehead.php');
	require_once( dirname( __FILE__ ) .'/_/shortcodes/shortcode-pagewrapper.php');
	// require_once( dirname( __FILE__ ) .'/_/shortcodes/shortcode-media_content.php');

	// BAKE PLUGINS INTO THEME: http://alexking.org/blog/2012/07/09/include-plugin-in-wordpress-theme
	// Options Framework (https://github.com/devinsays/options-framework-plugin)
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/_/inc/' );
		require_once dirname( __FILE__ ) .'/_/inc/options-framework.php';
	}
	require_once( dirname( __FILE__ ) .'/_/plugins/save_with_keyboard/save_with_keyboard.php');
	require_once( dirname( __FILE__ ) .'/_/plugins/Disable_wpautop/Disable_wpautop.php');

	// Allow svg uploads - from CSS-tricks (http://css-tricks.com/snippets/wordpress/allow-svg-through-wordpress-media-uploader/)
	function cc_mime_types( $mimes ){
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter( 'upload_mimes', 'cc_mime_types' );

	// Theme Setup (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function html5reset_setup() {
		load_theme_textdomain( 'html5reset', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		// structured post formats are not good practice? need a UI plugin to use them - http://crowdfavorite.com/blog/2013/12/post-formats-admin-ui-v1-3-1/
		// add_theme_support( 'structured-post-formats', array( 'link', 'video' ) );
		// add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status' ) );
		register_nav_menu( 'primary', __( 'Navigation Menu', 'html5reset' ) );
		add_theme_support( 'post-thumbnails' );
	}
	add_action( 'after_setup_theme', 'html5reset_setup' );

	// Scripts & Styles (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function html5reset_scripts_styles() {
		global $wp_styles;

		// Load Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		// Load Stylesheets
//		wp_enqueue_style( 'html5reset-reset', get_template_directory_uri() . '/reset.css' );
//		wp_enqueue_style( 'html5reset-style', get_stylesheet_uri() );

		// Load IE Stylesheet.
//		wp_enqueue_style( 'html5reset-ie', get_template_directory_uri() . '/css/ie.css', array( 'html5reset-style' ), '20130213' );
//		$wp_styles->add_data( 'html5reset-ie', 'conditional', 'lt IE 9' );

		// Modernizr
		// This is an un-minified, complete version of Modernizr. Before you move to production, you should generate a custom build that only has the detects you need.
		// wp_enqueue_script( 'html5reset-modernizr', get_template_directory_uri() . '/_/js/modernizr-2.6.2.dev.js' );

	}
	add_action( 'wp_enqueue_scripts', 'html5reset_scripts_styles' );

	// WP Title (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function html5reset_wp_title( $title, $sep ) {
		global $paged, $page;

		if ( is_feed() )
			return $title;

//		 Add the site name.
		$title .= get_bloginfo( 'name' );

//		 Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";

//		 Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page %s', 'html5reset' ), max( $paged, $page ) );
//FIX
//		if (function_exists('is_tag') && is_tag()) {
//		   single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
//		elseif (is_archive()) {
//		   wp_title(''); echo ' Archive - '; }
//		elseif (is_search()) {
//		   echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
//		elseif (!(is_404()) && (is_single()) || (is_page())) {
//		   wp_title(''); echo ' - '; }
//		elseif (is_404()) {
//		   echo 'Not Found - '; }
//		if (is_home()) {
//		   bloginfo('name'); echo ' - '; bloginfo('description'); }
//		else {
//		    bloginfo('name'); }
//		if ($paged>1) {
//		   echo ' - page '. $paged; }

		return $title;
	}
	add_filter( 'wp_title', 'html5reset_wp_title', 10, 2 );

	// create a custom video post type : ( https://codex.wordpress.org/Post_Types )
	// not exactly what I want to do...
	// function create_video_post_type() {
	// 	register_post_type( 'video_post',
	// 		array(
	// 			'labels' => array(
	// 				'name' => __( 'Videos' ),
	// 				'singular_name' => __( 'Video' )
	// 			),
	// 			'public' => true,
	// 			'has_archive' => true,
	// 			'menu_position' => 5,
	// 		)
	// 	);
	// }
	// add_action( 'init', 'create_video_post_type' );


	// add image sizes to the wp uploader
	// SYNTAX - add_image_size( $name, $width, $height, $crop );
	add_image_size( 'imgXS',  250  );
	add_image_size( 'imgS',   500  );
	add_image_size( 'imgM',   750  );
	add_image_size( 'imgL',   1000 );
	add_image_size( 'imgXL',  1500 );
	add_image_size( 'img2XL', 2000 );
	add_image_size( 'img3XL', 3000 );
	add_image_size( 'img4XL', 4000 );
	add_image_size( 'imgSsq', 550, 550, true );
	// add_image_size( 'imgMsq',  825, 825, true );



//OLD STUFF BELOW


	// Load jQuery
	if ( !function_exists( 'core_mods' ) ) {
		function core_mods() {
			if ( !is_admin() ) {
				wp_deregister_script( 'jquery' );
				wp_register_script( 'jquery', 
					( "http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ), 
					false
				);
				wp_enqueue_script( 'jquery' );
			}
		}
		add_action( 'wp_enqueue_scripts', 'core_mods' );
	}

	// Load Custom jQuery based functions
	function my_custom_script() {
		wp_register_script(
			'my-custom-script',
			get_template_directory_uri() . '/_/js/functions.js',
			array( 'jquery' )
		);
		wp_enqueue_script('my-custom-script');
	}
	add_action( 'wp_enqueue_scripts', 'my_custom_script' );

	// Clean up the <head>, if you so desire.
	//	function removeHeadLinks() {
	//    	remove_action('wp_head', 'rsd_link');
	//    	remove_action('wp_head', 'wlwmanifest_link');
	//    }
	//    add_action('init', 'removeHeadLinks');

	// Custom Menu
	register_nav_menu( 'primary', __( 'Navigation Menu', 'html5reset' ) );
	register_nav_menu( 'secondary', __( 'Footer Menu', 'html5reset' ) );

	// Widgets
	if ( function_exists('register_sidebar' )) {
		function html5reset_widgets_init() {
			register_sidebar( array(
				'name'          => __( 'Sidebar Widgets', 'html5reset' ),
				'id'            => 'sidebar-primary',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );
		}
		add_action( 'widgets_init', 'html5reset_widgets_init' );
	}

	// Navigation - update coming from twentythirteen
	function post_navigation() {


		// OLDER, MORE SIMPLE...
		// echo '<div class="navigation">';
		// echo '	<div class="next-posts">'.get_next_posts_link('Older Entries').'</div>';
		// echo '	<div class="prev-posts">'.get_previous_posts_link('Newer Entries').'</div>';
		// echo '</div>';

		if( is_singular() )
			return;

		global $wp_query;

		/** Stop execution if there's only 1 page */
		if( $wp_query->max_num_pages <= 1 )
			return;

		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
		$max   = intval( $wp_query->max_num_pages );

		/**	Add current page to the array */
		if ( $paged >= 1 )
			$links[] = $paged;

		/**	Add the pages around the current page to the array */
		if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}

		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}

		echo '<ul class="navigation">' . "\n";

		/**	Previous Post Link */
		// if ( get_previous_posts_link() )
			// $class = '';
			printf( '<li class="page-previous" >%s</li>' . "\n", get_previous_posts_link('
					<div class="icon-capsule">
						<svg class="icon icon-arrow-left">
							<use xlink:href="#icon-arrow-left"></use>
						</svg>
					</div>
				') );

		/**	Link to first page, plus ellipses if necessary */
		if ( ! in_array( 1, $links ) ) {
			$class = 1 == $paged ? ' class="current"' : '';

			printf( 
				'<li%s>
					<a href="%s" class="icon-capsule">
						<div class="icon icon-number"> %s </div>
					</a>
				</li>' 
				. "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' 
			);

			if ( ! in_array( 2, $links ) )
				echo '<li>…</li>';
		}

		/**	Link to current page, plus 2 pages in either direction if necessary */
		sort( $links );
		foreach ( (array) $links as $link ) {
			$class = $paged == $link ? ' class="current"' : '';
			printf( 
				'<li%s>
					<a href="%s" class="icon-capsule">
						<div class="icon icon-number"> %s </div>
					</a>
				</li>' 
				. "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
		}

		/**	Link to last page, plus ellipses if necessary */
		if ( ! in_array( $max, $links ) ) {
			if ( ! in_array( $max - 1, $links ) )
				echo '<li>…</li>' . "\n";

			$class = $paged == $max ? ' class="current"' : '';
			printf( 
				'<li%s>
					<a href="%s" class="icon-capsule">
						<div class="icon icon-number"> %s </div>
					</a>
				</li>' 
				. "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
		}

		/**	Next Post Link */
		// if ( get_next_posts_link() )
			// $class = ' class="page-next"';
			printf( '<li class="page-next" >%s</li>' . "\n",  get_next_posts_link('
					<div class="icon-capsule">
						<svg class="icon icon-arrow-right">
							<use xlink:href="#icon-arrow-right"></use>
						</svg>
					</div>
				') );

		echo '</ul>' . "\n";

	}

	// Posted On
	function posted_on() {
		printf('
				Posted on:
					<time class="entry-date" datetime="%2$s" pubdate>%2$s</time>
				by:
				<span class="byline author vcard">%3$s</span>
				',
			esc_attr( get_the_date( 'c' ) ),	// replaces "%1$s" above
			esc_html( get_the_date() ),			// replaces "%2$s" above
			esc_attr( get_the_author() )		// replaces "%3$s" above
		);
	}

	// adds icons to menu based on menu item description meta - (http://www.kriesi.at/archives/improve-your-wordpress-navigation-menu-output)
	class description_walker extends Walker_Nav_Menu {
		function start_el(&$output, $item, $depth, $args) {

			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			$class_names = ' class="'. esc_attr( $class_names ) . '"';

			$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

			// this is the description part ... i think ...
			$prepend = '';	// adds something before the title
			$append = '';	// adds something after the title
			// $description= '';
			$description  = ! empty( $item->description ) ? 
				'<div class="icon-nav dark fill" >
				<svg class="icon">
					<use xlink:href="#' .esc_attr( $item->description ). '">
				</use></svg></div>' 
			: '';

			if($depth != 0) {
			$description = $append = $prepend = "";
			}

			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID ).$append;
			$item_output .= $description.$args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

	// Filter wp_nav_menu() to add additional social media links 
	function add_nav_social_links($items, $args) {
		if ( $args->theme_location == 'primary' ) {

			$social_links = array();
			if ( of_get_option('link_facebook') ) {
				$social_links[] = array( of_get_option(	'link_facebook'		),	'facebook'		);
			}if ( of_get_option('link_twitter') ) {
				$social_links[] = array( of_get_option(	'link_twitter'		),	'twitter'		);
			}if ( of_get_option('link_instagram') ) {
				$social_links[] = array( of_get_option(	'link_instagram'	),	'instagram'		);
			}if ( of_get_option('link_github') ) {
				$social_links[] = array( of_get_option(	'link_github'		),	'github'		);
			}if ( of_get_option('link_codepen') ) {
				$social_links[] = array( of_get_option(	'link_codepen'		),	'codepen'		);
			}if ( of_get_option('link_google') ) {
				$social_links[] = array( of_get_option(	'link_google'		),	'google-plus'	);
			}if ( of_get_option('link_linkedin') ) {
				$social_links[] = array( of_get_option(	'link_linkedin'		),	'linkedin'		);
			}if ( of_get_option('link_pinterest') ) {
				$social_links[] = array( of_get_option(	'link_pinterest'	),	'pinterest'		);
			}if ( of_get_option('link_dribbble') ) {
				$social_links[] = array( of_get_option(	'link_dribbble'		),	'dribbble'		);
			}if ( of_get_option('link_behance') ) {
				$social_links[] = array( of_get_option(	'link_behance'		),	'behance'		);
			}

			$social_list = '';
			if( sizeof($social_links) > 0 ){
				foreach ($social_links as $site) {
					// foreach ($social_links as $site){
						$social_list .= '<li><a href="' . $site[0] . '" target="_blank" class="icon-capsule dark fill social"  id="social-' . $site[1] . '"> 
						<svg class="icon" ><use xlink:href="#social-' . $site[1] . '">
						</use></svg></a></li>';
					// }
				}
			}	

			$items = $items . '<li id="social-list" class="nav-bottom" ><ul>' . $social_list . '</ul></li>';
		}
		return $items;
	}
	// Filter wp_nav_menu() to add seach bar 
	function add_nav_search_bar($items, $args) {
		if ( $args->theme_location == 'primary' ) {
			$search_form = '<li class="nav-bottom">' . get_search_form(false) . '</li>';
			$items .= $search_form ;
		}
		return $items;
	}

	add_filter( 'wp_nav_menu_items', 'add_nav_search_bar' , 10, 2);
	add_filter( 'wp_nav_menu_items', 'add_nav_social_links' , 10, 2);




?>