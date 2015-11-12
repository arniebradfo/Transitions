// jquery.imgRow.js
// turn images into a row
// http://codepen.io/arniebradfo/pen/fwmLq

function imgRow(selector) {

  masterArray = [];

  // create each lineArray and push it to masterArray 
  $(selector).each(function() {

    // get "selector" css px value for margin-bottom 
    // - parse out a floating point number 
    // - and divide by the outer width to get a decimal percentage
    margin = (parseFloat($(this).css("margin-bottom"), 10)) / ($(this).outerWidth());
    marginRight = margin * 100 + "%";
    // subtract the total child margin from the total width to find the usable width
    usableWidth = (1 - ((($(this).find("img").length) - 1) * margin));

    // for each child img of "selector" - add a width/height as value in the ratios array
    ratios = [];
    $(this).children("img").each(function() {
      ratios.push(($(this).attr('width')) / ($(this).attr('height')));
    });

    // sum all the ratios for later divison
    ratioSum = 0;
    $.each(ratios, function() {
      ratioSum += parseFloat(this) || 0;
    });

    lineArray = [];
    $.each(ratios, function(i) {
      obj = {
        // divide each item in the ratios array by the total array
        // and set that as the css width in percentage
        width: ((ratios[i] / ratioSum) * usableWidth) * 100 + "%",
        // set the margin-right equal to the parent margin-bottom
        marginRight: marginRight
      };
      lineArray.push(obj);
    });
    lineArray[lineArray.length - 1].marginRight = "0%";
    masterArray.push(lineArray);

  });

  // apply the css all at once to prevent "Layout Thrashing"
  $(selector).each(function(i) {
    $(this).children("img").each(function(x) {
      $(this).css({
        "width": masterArray[i][x].width,
        "margin-right": masterArray[i][x].marginRight
      });
    });
  });

}
