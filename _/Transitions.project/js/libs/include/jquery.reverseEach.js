	//	John Resig (jQuery developer) .reverse() function jQuery plugin.
	//	revereses the indexing of an array.
	//	an create a backwards .each(function(i)) if using the "i" argument.
	jQuery.fn.reverse = function() {
	    return this.pushStack(this.get().reverse(), arguments);
	};