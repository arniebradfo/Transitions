!function(a){function b(b){masterArray=[],a(b).each(function(){margin=parseFloat(a(this).css("margin-bottom"),10)/a(this).outerWidth(),marginRight=100*margin+"%",usableWidth=1-(a(this).find("img").length-1)*margin,ratios=[],a(this).children("img").each(function(){ratios.push(a(this).attr("width")/a(this).attr("height"))}),ratioSum=0,a.each(ratios,function(){ratioSum+=parseFloat(this)||0}),lineArray=[],a.each(ratios,function(a){obj={width:ratios[a]/ratioSum*usableWidth*100+"%",marginRight:marginRight},lineArray.push(obj)}),lineArray[lineArray.length-1].marginRight="0%",masterArray.push(lineArray)}),a(b).each(function(b){a(this).children("img").each(function(c){a(this).css({width:masterArray[b][c].width,"margin-right":masterArray[b][c].marginRight})})})}function c(){a("#wrapper").hasClass("during-scroll")||a("#wrapper").addClass("during-scroll"),clearTimeout(scrollTimer),scrollTimer=setTimeout(function(){a("#wrapper").removeClass("during-scroll")},250)}function d(){if(a("#google-container").length){var b=41.7313039,c=-111.8189167,d=12,f=41.739,g=-111.8339,h=-20,i=[{elementType:"labels",stylers:[{saturation:h}]},{featureType:"poi",elementType:"labels",stylers:[{visibility:"off"}]},{featureType:"road",elementType:"labels",stylers:[{visibility:"off"}]},{featureType:"transit",elementType:"labels",stylers:[{visibility:"off"}]},{featureType:"road",elementType:"geometry.stroke",stylers:[{visibility:"off"}]}],j={center:new google.maps.LatLng(b,c),zoom:d,draggable:!1,panControl:!1,zoomControl:!1,mapTypeControl:!1,streetViewControl:!1,mapTypeId:google.maps.MapTypeId.ROADMAP,scrollwheel:!1,styles:i},k=new google.maps.Map(document.getElementById("google-container"),j),l=(new google.maps.Marker({position:new google.maps.LatLng(f,g),map:k,visible:!0}),document.createElement("div"));new e(l,k);k.controls[google.maps.ControlPosition.LEFT_TOP].push(l)}}function e(a,b){var c=document.getElementById("cd-zoom-in"),d=document.getElementById("cd-zoom-out");a.appendChild(c),a.appendChild(d),a.style.right="0px",google.maps.event.addDomListener(c,"click",function(){b.setZoom(b.getZoom()+1)}),google.maps.event.addDomListener(d,"click",function(){b.setZoom(b.getZoom()-1)})}function f(){a(".above-the-top").removeClass("above-the-top"),a(".in-viewport").removeClass("in-viewport"),a(".below-the-fold").removeClass("below-the-fold"),a(".image-in-viewport").removeClass("image-in-viewport"),a(".image-below-the-fold").removeClass("image-below-the-fold"),a(".fade").removeClass("fade")}function g(){a("#wrapper-js-warning").remove(),a("#wrapper-home").remove(),z=a("\n		.page-title, \n		.post-link, \n		.entry-title, \n		.entry-title span, \n\n		#post-header .post-meta-data p, \n		#post-header .info-toggle, \n		.scroll-down, \n\n		#post-content h1, \n		#post-content h2, \n		#post-content h3, \n		#post-content h4, \n		#post-content h5, \n		#post-content h6, \n		#post-content p, \n		#post-content span, \n		#post-content picture, \n		#post-content img, \n\n		#bio h2,\n		#bio p,\n\n		#skills h2,\n		#skills h3,\n		.skill,\n		.skillsubset, \n\n		#work-experience h2,\n		#work-experience > ul > li,\n\n		#education h2,\n		#education > ul > li,\n\n		#contact-invitation,\n		.contact-field,\n		.contact-area,\n		.contact-button,\n\n		.scroll-to-top,\n		.post-edit-link,\n\n		#home-nav,\n		#home-nav .menu-item\n	"),h()}function h(){z.addClass("below-the-fold"),a(".perfect-contain").addClass("image-below-the-fold")}function i(b){a("#home-header").length&&a("body, #home-nav").addClass("animate"),a("#wrapper-loading").css({opacity:"0",transition:"opacity "+(b-200)+"ms ease"}),setTimeout(function(){a("#wrapper-loading").css({"z-index":"-99",display:"none"}),a(".perfect-contain, #cd-google-map").removeClass("image-below-the-fold").addClass("image-in-viewport"),setInterval(function(){j(150,800)},500)},b-100)}function j(b,c){var d=z.filter(":inViewport").filter(".below-the-fold"),e=d.length>Math.floor(c/b)?c/d.length:b;d.each(function(c){el=a(this),currentStyles=el.attr("style")?el.attr("style"):"",el.attr("style",currentStyles+"transition-delay: "+Math.round(c*e+b)+"ms;")}),z.filter(":inViewport, :aboveTheTop").removeClass("below-the-fold").addClass("in-viewport"),setTimeout(function(){d.css({"transition-delay":""})},b+c+10)}function k(b){a("#menu-toggle").hasClass("menu-is-active")&&n();var c=20,d=z.filter(":inViewport");d.each(function(b){a(this).css({"transition-delay":""}),currentStyles=a(this).attr("style")?a(this).attr("style"):"",a(this).attr("style",currentStyles+"transition-delay: "+b*c+"ms;")}),d.removeClass("in-viewport").addClass("above-the-top"),a("#home-header").length&&(a("#total-animation").addClass("above-the-top"),a("#home-bg").addClass("fade"),a("#home-nav").removeClass("above-the-top").addClass("fade")),a("#wrapper-loading").css({"z-index":"",display:""});var e=500;setTimeout(function(){a("#wrapper-loading").css({opacity:"1",transition:"all "+e+"ms ease"})},(d.length+1)*c),b&&setTimeout(function(){window.location=b},(d.length+1)*c+e)}function l(){a("a").not(".current a, .current-menu-item a").click(function(b){location.hostname==this.hostname&&a(this).is('a:not([href^="#"])')&&(b.preventDefault(),$href=a(this).attr("href"),k($href))}),a("#search-form").submit(function(b){b.preventDefault(),$href=a(this).attr("action")+"?"+a(this).serialize(),k($href)})}function m(){a("#menu-toggle").click(function(){n()}),a("#blanket").click(function(){n()}),a("#header .current-menu-item a").click(function(a){a.preventDefault(),n()})}function n(){a("#header, #wrapper, #blanket, #menu-toggle").toggleClass("menu-is-active")}function o(){a(".info-toggle").click(function(){a(this).parent().siblings().filter(".info-is-active").removeClass("info-is-active"),a(this).parent().toggleClass("info-is-active")})}function p(){a(".perfect-contain").each(function(b){var c=a(this).outerWidth()/a(this).outerHeight(),d=a(this).find("img").outerWidth()/a(this).find("img").outerHeight();d>=c&&!a(this).find("img").hasClass("height")?a(this).find("img").removeClass("width").addClass("height"):c>d&&!a(this).find("img").hasClass("width")&&a(this).find("img").removeClass("height").addClass("width")})}function q(){a("html, body").bind("scroll mousedown DOMMouseScroll mousewheel keyup",function(){a("html, body").stop()})}function r(){a("html, body").unbind("scroll mousedown DOMMouseScroll mousewheel keyup")}function s(){a(".scroll-down").click(function(){q(),a("html, body").animate({scrollTop:a(".scroll-down").offset().top+a(".scroll-down").outerHeight()},1e3,"easeOutExpo",function(){r()})})}function t(){a(".scroll-to-top").click(function(){q(),a("html, body").animate({scrollTop:a("body").offset().top},2e3,"easeOutExpo",function(){r()})})}function u(){a("#wrapper .current a, #wrapper .current-menu-item a").click(function(b){return b.preventDefault(),q(),a("html, body").animate({scrollTop:a("body").offset().top},2e3,"easeOutExpo",function(){r()}),!1})}function v(a,b){clearTimeout(resizeTimer),resizeTimer=setTimeout(a,b)}function w(){if(a("#post-header").length||a("#page-header").length||a("#about-header").length||a("#contact-header").length){windowHeight=a(window).height(),a("#wpadminbar").length&&(a(window).width()>=783?windowHeight-=32:windowHeight-=46);var b=0;a(".page-title").length&&(b=a(".page-title").outerHeight(!0)),a("#post-header").length?a("#post-header").css({height:windowHeight+"px"}):(a("#page-header").length||a("#about-header").length||a("#contact-header").length)&&a("#page-header, #about-header, #contact-header").css({height:windowHeight-b+"px"})}}function x(){w(),p()}jQuery.fn.reverse=function(){return this.pushStack(this.get().reverse(),arguments)},a.belowthefold=function(b,c){var d=a(window).height()+a(window).scrollTop()+c.threshold;return d<=a(b).offset().top},a.abovethetop=function(b,c){var d=a(window).scrollTop();return d>=a(b).offset().top+a(b).outerHeight()},a.inviewport=function(b,c){return!a.belowthefold(b,c)&&!a.abovethetop(b,c)};var y=50;a.extend(a.expr[":"],{belowTheFold:function(b,c,d){return a.belowthefold(b,{threshold:y})},aboveTheTop:function(b,c,d){return a.abovethetop(b,{threshold:y})},inViewport:function(b,c,d){return a.inviewport(b,{threshold:y})}}),scrollTimer=0;var z;a.extend(jQuery.easing,{easeOutExpo:function(a,b,c,d,e){return b==e?c+d:d*(-Math.pow(2,-10*b/e)+1)+c}}),resizeTimer=0,a(document).ready(function(){b(".img-row"),d(),g(),x(),m(),o(),s(),t(),u()});var A=1e3;a(window).load(function(){p(),i(A),l()}),a(window).bind("pageshow",function(a){a.originalEvent.persisted&&(f(),h(),i(A))}),a(window).resize(function(){v(function(){x()},500)}),a(window).on("scroll",function(){c()})}(window.jQuery);