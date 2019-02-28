# TODO List
- fix `.full-size`?
- TESTING
	- speed test
	- html doc outline
	- browser test
	- does is validate?
	- accessibility
	- mobile testing
- TITLES - better titles for everything
	- remove _PROTECTED_ from post title: [link](https://www.templatemonster.com/help/wordpress-how-to-removechange-protected-prefix-for-password-protected-posts.html)
	- Tagged and Category with description
	- Author with description & links to social
- FEATURES
	- logo loading animation? DO IT LAST!
	- press/touch only?
	- tune text shadow
	- password protected post has a password input field in preview
	- credit meta fields
	- add tags somewhere?
	- img shadow class for content.less - or in custom css, not theme?
- COMMENTS
	- things

## DoneDid 
Move things here off the list, then to the __ChangeLog.md__
- made a widget area on main page
- changed tags to categories
- replacing `.alignout` with `.size-full`
- replacing `.alignout-section` with `.section-size-full`
- Fixed: password protect post form submit fails animation
- IMAGES - make sure responsive images work
	- they work ok, just need to include the full-size image
	- [link](https://viastudio.com/optimizing-your-theme-for-wordpress-4-4s-responsive-images/)
	- [another link](https://make.wordpress.org/core/2015/11/10/responsive-images-in-wordpress-4-4/)
- menu opens on hover, closes off hover, `mouseenter`
- smoother parallax scroll performance
- parallax doesn't fire if window has scrolled one window height, could be better...
- handle special keypress+click combo in animation loading
- better loading/unloading animations
- CSS
	- round corners of `<hr/>`, more intense color
	- wider column - set content-width correctly
	- bigger text - smaller with media queries
	- buttons should grow less on hover
	- margins get bigger at different screen widths - added css var `--column_Padding`
	- replace `@s16` with @button_Padding where appropriate
	- rename column css classes to include `.x__column`
	- bigger, better search header
	- no outline for image-less posts
	- move over _'read more'_ button a little bit
	- better min and max height for post headers
	- menu button bg color is stronger
	- header colors - lighter with no image, no gradient, border, no shadow
	- heading photos are more intense now
	- active animations for post clicks
	- pagination stacks at smaller widths
	- other minor changes...
- PAGINATION
	- change post list name to All Posts
	- add pagination to post headers
	- optional _'Page n of x'_ title
	- add pagination to paginate posts
	- add _'Next Post:'_ and _'Next Page:'_ label
	- bg and styles for header pagination
	- border lines	



## TODO Later
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

