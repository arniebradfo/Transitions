// jquery.imgRow.js
// turn images into a row
// http://codepen.io/arniebradfo/pen/fwmLq

function imgRow(selector){

	$(selector).each(function(){

		// get "selector" css px value for margin-bottom 
		// - parse out a floating point number 
		// - and divide by the outer width to get a decimal percentage
		margin = (parseFloat($(this).css("margin-bottom"), 10))/($(this).outerWidth());
		// subtract the total child margin from the total width to find the usable width
		usableWidth = (1 - ((($(this).find("img").length) - 1) * margin));


		// define local array for the image ratios
		ratios = [],
		ratioSum = 0;
		// for each child img of "selector" - add a width/height as value in the ratios array
		$(this).children("img").each(function(){
			ratios.push(($(this).width())/($(this).height()));
		});
		// sum all the ratios for later divison
		$.each(ratios,function(){
			ratioSum+=parseFloat(this) || 0;
		});
		$(this).children("img").each(function(i){
			$(this).css({
				// divide each item in the ratios arry by the total array
				// as set that as the css width in percentage
				"width": ((ratios[i]/ratioSum) * usableWidth)*100 +"%",
				// set the margin-right equal to the parent margin-bottom
				"margin-right": margin*100 +"%",
			});
		});
		// reset css of last img in the row to "margin-right":"0%"
		$(this).children(":last-child").css({
			"margin-right":"0%",
		});
	});
}
