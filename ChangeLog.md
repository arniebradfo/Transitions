# Change Log

- double copyright fix

## 3.2.2
Bug Fixes
- fixing some whitespace output bugs in php files
- fixed content_width bug
- body and html scrollbars css fix

## 3.1.1
Bug Fixes
- password protected post has input in preview
- locked and unlocked labels
- home widget area has padding from the header section and post-list section
- featured image color improvements - rotated gradient so white is at the bottom and text is (somewhat) easier to read.
- removed _'Protected: Post Name'_ Text
- removed tabs from ascii character
- HTML validates if using a minifier like [W3 total cache](https://wordpress.org/plugins/w3-total-cache/)
	- the `type="text/javascript"` and `type="text/css"` attributes are unnecessary
- pagination wrapping issue
- disabled back button animation because the `popstate` event works differently in chrome, safari, and firefox?
- no nav button background when nav is open
- fixed firefox and safari bugs with gradients and input placeholder position

## 3.1.0
Overall wordpress improvements
- made a widget area on main page
- changed tags to categories
- replaced `.alignout` with `.aligncenter`
- replaced `.alignout-section` with `.section-full-width`
- Fixed: password protect post form submit fails animation
- IMAGES - responsive images work
	- they work ok, just need to include the full-size image
	- [link](https://viastudio.com/optimizing-your-theme-for-wordpress-4-4s-responsive-images/)
	- [another link](https://make.wordpress.org/core/2015/11/10/responsive-images-in-wordpress-4-4/)
- menu opens on hover, closes off hover, `mouseenter`
- smoother parallax scroll performance
- parallax doesn't fire if window has scrolled one window height, could be better...
- animation loading handles special keypress+click combo 
- better loading/unloading animations
- CSS
	- rounded corners of `<hr/>`, more intense color
	- wider column - set content-width correctly
	- bigger text - smaller with media queries
	- buttons grow less on hover
	- margins get bigger at different screen widths - added css var `--column_Padding`
	- replaced `@s16` with @button_Padding where appropriate
	- renamed column css classes to include `.x__column`
	- bigger, better search header
	- no outline for image-less posts
	- moved _'Read More'_ button over a little bit
	- better min and max height for post headers
	- menu button bg color is stronger
	- header color improvement - lighter with no image, no gradient, border, no shadow
	- heading photos are more intense now
	- active animations for post clicks
	- pagination stacks at smaller widths
	- other minor changes...
- PAGINATION
	- changed post list name to All Posts
	- added pagination to post headers
	- optional _'Page n of x'_ title
	- added pagination to paginate posts
	- added _'Next Post:'_ and _'Next Page:'_ label
	- bg and styles for header pagination
	- border lines for pagination

## 3.0.2
Image Refinements
- GPU intensive CSS and JS is skipped for mobile
- image alignment in post content
- added `.alignout` & `.alignout-section` css classes
- added image sizes with `add_image_size()`
- "Edit this post" if logged in button
- added `#` to tags

## 3.0.1
Scroll performance improvements
- `will-change: transform;` // forces a new layer? is bad, apparently...
- view height `1vh` unit stuff seems to help, removed `--vh` var and .js
- removing `text-shadow` and `filter: shadow()` helped a lot
- removed parallax listener js
- repositioned `html,body,nav{}` css so we get the address bar moving in chrome android

## 3.0.0
Initial version for bradford.digital

## 2.1.0
Updates and bug fixes for Jared's Portfolio

## 1.1.4
Initial production version

## 0.0.1
Initial Version - more like v3.0.0.1 than v0.0.1
- output style
- output components and views
- output svg
- output template parts
- output combine php functions
- output js
- basic layout
	- reduce .php to just index, no single
	- add site name to heading if not post page
	- single post
		- margins 
		- heading when is singular
		- heading without featured media
		- footer move copyright
		- next-post under footer
	- post list navigation
	- design all headings
	- standardize heading?
		- [links on links](https://www.sarasoueidan.com/blog/nested-links/)
	- heading archive
	- heading search
	- heading adjacent post
	- heading post
	- heading for home page 2+
	- heading page
		- subtitle
		- remove date
- combine header and footer
- style basic elements
	- typography - headings
	- add and uncomment basic elements
	- heading buttons
	- buttons
	- links half-ass
	- headings
		- homepage spacing
		- vh unit js
		- post list spacing
		- .has-featured-image
	- X - you NEED a standard link style! but do i?
		- X - raise and lower underline
		- X - segmented on the nav
	- search input
		- general text input less
- style basic elements
	- pagination
		- layout
	- nav 
		- link styles
		- layout - correct min-width
	- color vars
	- size vars
- proper icons and shadows for them
- password protected? 
- finer css
	- nav animations 
	- proper heights for headings
	- post-link hover and interaction
		- layer image and gradients properly
		- make sure everything animates smoothly
		- undo side effects
	- heading and footer parallax
	- more left-right alignment - col rules
	- screen-size test
- 404
- no posts
- github updater
- add ids for anchor links 
- loading / unloading animations
	- load with critical css class that hides
	- remove the class with js - if we have the external stylesheet
	- what happens without js
- make a release branch and process

