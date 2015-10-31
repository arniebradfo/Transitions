<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
?><!doctype html>

<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->

<head id="<?php echo of_get_option('meta_headid'); ?>" data-template-set="html5-reset-wordpress-theme">

	<meta charset="<?php bloginfo('charset'); ?>">

	<!-- Always force latest IE rendering engine (even in intranet) -->
	<!--[if IE ]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->

	<?php
		if (is_search())
			echo '<meta name="robots" content="noindex, nofollow" />';
	?>

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">
	
	<?php
		if (true == of_get_option('meta_author'))
			echo '<meta name="author" content="' . of_get_option("meta_author") . '" />';

		if (true == of_get_option('meta_google'))
			echo '<meta name="google-site-verification" content="' . of_get_option("meta_google") . '" />';
	?>

	<meta name="Copyright" content="Copyright &copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?>. All Rights Reserved.">

	<meta name="p:domain_verify" content="3cfe7461cad9d55314beba0db32f456b"/>
	
	<?php
		/*
			j.mp/mobileviewport & davidbcalhoun.com/2010/viewport-metatag
			 - device-width : Occupy full width of the screen in its current orientation
			 - initial-scale = 1.0 retains dimensions instead of zooming out if page height > device height
			 - maximum-scale = 1.0 retains dimensions instead of zooming in if page width < device width
		*/
		if (true == of_get_option('meta_viewport'))
			echo '<meta name="viewport" content="' . of_get_option("meta_viewport") . '" />';


		/*
			These are for traditional favicons and Android home screens.
			 - sizes: 1024x1024
			 - transparency is OK
			 - see wikipedia for info on browser support: http://mky.be/favicon/
			 - See Google Developer docs for Android options. https://developers.google.com/chrome/mobile/docs/installtohomescreen
		*/
		if (true == of_get_option('head_favicon')) {
			echo '<meta name=”mobile-web-app-capable” content=”yes”>';
			echo '<link rel="shortcut icon" href="' . of_get_option("head_favicon") . '" />';
		}


		/*
			The is the icon for iOS Web Clip.
			 - OLD - size: 57x57 for older iPhones, 72x72 for iPads, 114x114 for iPhone4 retina display (IMHO, just go ahead and use the biggest one)
			 - To prevent iOS from applying its styles to the icon name it thusly: apple-touch-icon-precomposed.png
			 - Transparency is not recommended (iOS will put a black BG behind the icon) -->';
		*/
		if (true == of_get_option('head_apple_touch_icon'))
			echo '<link rel="apple-touch-icon" href="' . of_get_option("head_apple_touch_icon") . '">';
	?>

	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />

	<!-- Application-specific meta tags -->
	<?php
		// Windows 8
		if (true == of_get_option('meta_app_win_name')) {
			echo '<meta name="application-name" content="' . of_get_option("meta_app_win_name") . '" /> ';
			echo '<meta name="msapplication-TileColor" content="' . of_get_option("meta_app_win_color") . '" /> ';
			echo '<meta name="msapplication-TileImage" content="' . of_get_option("meta_app_win_image") . '" />';
		}

		// Twitter
		if (true == of_get_option('meta_app_twt_card')) {
			echo '<meta name="twitter:card" content="' . of_get_option("meta_app_twt_card") . '" />';
			echo '<meta name="twitter:site" content="' . of_get_option("meta_app_twt_site") . '" />';
			echo '<meta name="twitter:title" content="' . of_get_option("meta_app_twt_title") . '">';
			echo '<meta name="twitter:description" content="' . of_get_option("meta_app_twt_description") . '" />';
			echo '<meta name="twitter:url" content="' . of_get_option("meta_app_twt_url") . '" />';
		}

		// Facebook
		if (true == of_get_option('meta_app_fb_title')) {
			echo '<meta property="og:title" content="' . of_get_option("meta_app_fb_title") . '" />';
			echo '<meta property="og:description" content="' . of_get_option("meta_app_fb_description") . '" />';
			echo '<meta property="og:url" content="' . of_get_option("meta_app_fb_url") . '" />';
			echo '<meta property="og:image" content="' . of_get_option("meta_app_fb_image") . '" />';
		}
	?>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>

	<!-- inline style for the initial loading stuff -->
	<style type="text/css">
		#wrapper-loading, #wrapper-js-warning{
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background-color: white;
		}
		#wrapper-loading{
			z-index: 12;
		}
		#wrapper-js-warning{
			z-index: 13;
		}

		#waiting, #js-warning {
			position: absolute;
			left:0;
			right:0;
			bottom:50%;
			text-align: center;
			color:gray;
			opacity: 0;

		}
		#waiting{
			-webkit-animation: opacifier 0.5s 0s infinite alternate-reverse forwards;
			animation: opacifier 0.5s 0s infinite alternate-reverse forwards;
		}
		#js-warning{
			-webkit-animation: opacifier 0.5s 4s 1 reverse forwards;
			animation: opacifier 0.5s 4s 1 reverse forwards;
		}

		@-webkit-keyframes opacifier{
			0%{		opacity: 1;	}
			100%{	opacity: 0;	}
		}
		@keyframes opacifier{
			0%{		opacity: 1;	}
			100%{	opacity: 0;	}
		}		
	</style>

</head>

<body <?php body_class(); ?> >
	<?php 

		echo file_get_contents(get_template_directory_uri() . '/_/svg/build/svg-defs-icons.svg');
		echo file_get_contents(get_template_directory_uri() . '/_/svg/build/svg-defs-nav.svg');

	?>

		<div class="icon-capsule" id="menu-toggle">
			<svg class="icon icon-menu" >
				<use xlink:href="#icon-menu"></use>
			</svg>
			<svg class="icon icon-close" >
				<use xlink:href="#icon-close"></use>
			</svg>
		</div> 
	
	<div id="wrapper-js-warning" style="display: block;" >
		<p id="js-warning"  style="" >
			Please be sure javascript is enabled...
		</p>
	</div> <!-- no js warning wrapper -->
	<div id="wrapper-loading" style="display: block;" >
		<div id="waiting" style="" >
			... please wait ...
		</div>
	</div> <!-- loading wrapper -->

	<?php if ( !is_front_page() ): // NOT THE FRONT PAGE ?>

	<?php echo file_get_contents(get_template_directory_uri() . '/_/svg/build/svg-defs-social.svg'); ?>

	<div id="blanket" ></div>

	<header id="header" ><div id="header-wrapper">

			<a 	id="home-link"
				href="<?php echo esc_url( home_url( '/' ) ); ?>" 
				title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" 
				rel="home">		
				<?php 
					if (of_get_option('site_logo')){
						echo '<img src="' . of_get_option("site_logo") . '" alt="site logo">';
					}else{ echo 
						'<h1>'
							. bloginfo( 'name' ) .
							'<span>' . bloginfo( 'description' ) .
						'</span></h1>'
					;}
				?>
			</a>

			<nav id="nav" class="nav">
				<?php 
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'container' => false,
						'walker' => new description_walker()
					) ); 
				?>
			</nav>

	</div></header>	

	<div id="wrapper">

	<?php endif;  // END IF is not the front page?>