// jquery.menuToggle.js

// bind the approprite user inputs to toggle the menu's active state
function menuToggle(){
	$("#menu-toggle").click(function(){
		menuIsActive();
	});
	$("#blanket").click(function(){
		menuIsActive();
	});
	// force links to the current page to close the menu instead of reloading the page
	// NOTE - could have matched the window.location to the a.attr(href) to identify a page reload
	$("#header .current-menu-item a").click(function(e){
		e.preventDefault();
		menuIsActive();
	});
} 

// add or remove the .menu-is-active class from the elements that use it
function menuIsActive(){
	$("#header, #wrapper, #blanket, #menu-toggle").toggleClass("menu-is-active");
}

// opens the info panel to a post-link when the .info-toggle button is clicked
// .info-toggle button only appear in touch designed states
function infoToggle(){
	$(".info-toggle").click(function(){
		// close any other open info panels
		$(this).parent().siblings().filter(".info-is-active").removeClass("info-is-active");
		// open the clicked info panel
		$(this).parent().toggleClass("info-is-active");
	}); 
}