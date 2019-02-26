# TODO List
- FEATURES
	- tune text shadow
	- better min and max height for post header
	- parallax doesn't fire in off screen contexts
		- other parallax bugs, seems slow
	- menu opens on hover, closes off hover
	- photos need to be more intense, css filters?
	- credit meta fields
	- add tags somewhere?
	- img shadow class for content.less - or in custom css, not theme?
	- password protected post has a password input field in preview
- PAGINATION
	- make pagination component more robust
		- optional _page n of x_ title
		- bg and styles
	- add pagination to post headers
	- change post list name to All Posts
	- post pagination
		- add pagination to paginate posts
		- add Next Post: label
		- next should be next page!
- BUTTONS
	- press/touch only?
- ANIMATIONS
	- better loading/unloading animations
	- doesn't animate on first load sometimes
	- critical css?
	- active animations for post clicks
	- logo loading? DO IT LAST!
- TESTING
	- browser test
	- does is validate?
	- accessibility
	- mobile testing
- LATER
	- [favicon](https://stackoverflow.com/a/48969053/5648839) 
	- preview does not work with navigation
- TITLES - better titles for everything
	- remove _PROTECTED_ from post title: [link](https://www.templatemonster.com/help/wordpress-how-to-removechange-protected-prefix-for-password-protected-posts.html)
	- Tagged and Category with description
	- Author with description

## DoneDid 
Move things here off the list, then to the __ChangeLog.md__
- GithubUpdater doesn't work - yes it does apparently
- make a widget area on main page
- change tags to categories
- replacing `.alignout` with `.size-full`
- replacing `.alignout-section` with `.section-size-full`
- password protect post form submit fails animation
- IMAGES - make sure responsive images work
	- they work ok, just need to include the full-size image
	- [link](https://viastudio.com/optimizing-your-theme-for-wordpress-4-4s-responsive-images/)
	- [another link](https://make.wordpress.org/core/2015/11/10/responsive-images-in-wordpress-4-4/)
- CSS
	- round corners of `<hr/>`
	- wider column - set content-width correctly
	- bigger text - smaller with media queries
	- buttons should grow less on hover
	- margins get bigger at different screen widths - added css var --column_Padding
	- replace @s16 with @button_Padding where appropriate
	- rename column css classes to include x__column
	- bigger, better search header




## TODO Later
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
based on angular
outputs an external dist folder that wp uses


## Interaction principles?
- grows when hovered
- shrinks when pressed
- flash animates when when tapped


## cd From `Wordpress` project
`cd wp-content/themes/transitions-dev`


## ReadMe.txt
Plugin test [readme.txt](https://generatewp.com/plugin-readme/?clone=test-plugin-readme-txt-file)
WP Plugin [readme.txt](https://wordpress.org/plugins/readme.txt)
Twentynineteen [readme.txt](https://github.com/WordPress/WordPress/blob/master/wp-content/themes/twentynineteen/readme.txt)
Theme [readme.txt](https://make.wordpress.org/themes/2015/04/29/a-revised-readme/)

