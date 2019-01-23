/*
 * Viewport - jQuery selectors for finding elements in viewport
 *
 * Copyright (c) 2008-2009 Mika Tuupola
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 *  http://www.appelsiini.net/projects/viewport
 *
 */

//  CHANGES:
//  right and left selectors commented out
//  :selectors renamed in camelCase
//  $.abovethetop settings.threshold changed from subtraction to addition
//  var for syncing threshold added
//  ...

// (function($) {
    
    $.belowthefold = function(element, settings) {
        var fold = $(window).height() + $(window).scrollTop() + settings.threshold;
        return fold <= $(element).offset().top ;
    };

    $.abovethetop = function(element, settings) {
        var top = $(window).scrollTop();
        return top >= $(element).offset().top + $(element).outerHeight();
    };
    
    // $.rightofscreen = function(element, settings) {
    //     var fold = $(window).width() + $(window).scrollLeft();
    //     return fold <= $(element).offset().left - settings.threshold;
    // };
    
    // $.leftofscreen = function(element, settings) {
    //     var left = $(window).scrollLeft();
    //     return left >= $(element).offset().left + $(element).width() - settings.threshold;
    // };
    
    $.inviewport = function(element, settings) {
        // first line requres left and right - second line only requires top and bottom...
        // return !$.rightofscreen(element, settings) && !$.leftofscreen(element, settings) && !$.belowthefold(element, settings) && !$.abovethetop(element, settings);
        return !$.belowthefold(element, settings) && !$.abovethetop(element, settings);
    };
    
    var thresholdExpand = 50; // must match the .below-the-fold{transformY:...;}  in "js-loading-animation.scss" 

    $.extend($.expr[':'], {
        "belowTheFold": function(a, i, m) {
            return $.belowthefold(a, {threshold : thresholdExpand});
        },
        "aboveTheTop": function(a, i, m) {
            return $.abovethetop(a, {threshold : thresholdExpand});
        },
        // "leftOfScreen": function(a, i, m) {
        //     return $.leftofscreen(a, {threshold : 0});
        // },
        // "rightOfScreen": function(a, i, m) {
        //     return $.rightofscreen(a, {threshold : 0});
        // },
        "inViewport": function(a, i, m) {
            return $.inviewport(a, {threshold : thresholdExpand});
        }
    });
    
// })(jQuery);