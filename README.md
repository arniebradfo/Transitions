# Transitions
A custom WordPress theme with magical page load and unload transitions.

## cd From `Wordpress` project
$ `cd wp-content/themes/transitions`

## DEV
$ `gulp dev` to build and watch for development

## DoneDid 
TODOs that are done!
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
		- comments
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
	

## TODO List
- finer css
	- screen-size test
	- browser test
	- loading / unloading animations
		- active animations?
- buttons
	- outline
	- focus stuff?
	- press/touch only?


## TODO Later
- current item style on pagination & menus
	- button current style? `.current-menu-item`
		- button current style? 
- featured post 
- what to do about the logo
- document build and release process
- rel and aria
- output screenshot
- output readme
- merge all headings

## Build scheme
based on angular
outputs an external dist folder that wp uses

## Interaction principles?
- grows when hovered
- shrinks when pressed
- flash animates when when tapped
