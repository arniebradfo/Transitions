# Change Log

## 3.0.2
Scroll performance improvements
- GPU intensive CSS and JS is skipped for mobile
- image alignment in post content
- added `.alignout` & `.alignout--block` css classes
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
Initial Version - more like v3.0.0.1 than anything
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

