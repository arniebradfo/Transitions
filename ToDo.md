# TODO List
- archives with descriptions are have too much subtitle padding
- FASTER WORDPRESS
	- minify with plugin
	- cache with plugin
	- cloudflare
- TESTING
	- browser test
		- chrome
		- firefox
			- input placeholder is in a weird place - too high
			- input has a dotted outline
			- back button doesn't work...
		- safari
			- input placeholder is in a weird place - too low
			- button gradient is darker?
			- back button doesn't work...
		- edge
		- ie11 ?
	- mobile testing - look at speed and make an exception.
		- iOS safari
		- chrome for android
	- [speed test](https://developers.google.com/speed/pagespeed/insights/?url=https%3A%2F%2Fbradford.digital%2F)
	- accessibility - later
- TITLES - better titles for everything
	- remove _PROTECTED_ from post title: [link](https://www.templatemonster.com/help/wordpress-how-to-removechange-protected-prefix-for-password-protected-posts.html)
	- Tagged and Category with description
	- Author with description & links to social
- FEATURES
	- logo loading animation? DO IT LAST!
	- press/touch only?
	- tune text shadow
	- credit meta fields
	- add tags somewhere?
	- img shadow class for content.less - or in custom css, not theme?
- COMMENTS
	- things

## TADA List
Move things here off the list, then to the __ChangeLog.md__
- back button no animate :(
- renders before animate sometimes when reloading? repro steps
- password protected post has input in preview
- locked and unlocked labels
- home widget area has padding from the header section and post-list section
- featured image color improvements - rotated gradient so white is at the bottom and text is (somewhat) easier to read.
- removed _'Protected: Post Name'_ Text
- removed tabs from ascii character
- HTML validates if using a minifier like [W3 total cache](https://wordpress.org/plugins/w3-total-cache/)
	- the `type="text/javascript"` and `type="text/css"` attributes are unnecessary
- pagination wrapping issue
- disable back button animation because the `popstate` event works differently in chrome, safari, and firefox?
- no nav button background when nav is open


## TODO Later
- html doc outline from https://validator.w3.org/nu/
- theme preview & customize does not work with navigation
- better heights for headers
- current item style on pagination & menus
	- button current style? `.current-menu-item`
		- button current style? 
- featured post 
- what to do about the logo
- rel and aria
- output screenshot
- output readme
- merge all headings
- tables
- comments
- more tag
- paginated post
- img links
- display tags and categories
- last post edge case
- re-implement text-shadow and parallax on mobile
- better titles for the Archives page
- `inline_featured_image` meta field ? the world may never know
- BUTTONS
	- outline
	- focus stuff?
	- press/touch only?
	- buttons should grow even less on hover
	- underline or colorize regular link
	- buttons should have default margins
- STRUCTURAL
	- join heading into a single file?

## Maybe TODO?
- unlock all password protected posts feature
	- make a widget

## Build scheme
based on angular component structure
outputs an external dist folder that wp uses


## cd From `Wordpress` project
`cd wp-content/themes/transitions-dev`


## ReadMe.txt
Plugin test [readme.txt](https://generatewp.com/plugin-readme/?clone=test-plugin-readme-txt-file)
WP Plugin [readme.txt](https://wordpress.org/plugins/readme.txt)
Twentynineteen [readme.txt](https://github.com/WordPress/WordPress/blob/master/wp-content/themes/twentynineteen/readme.txt)
Theme [readme.txt](https://make.wordpress.org/themes/2015/04/29/a-revised-readme/)

