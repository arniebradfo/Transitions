TRANSITIONS={state:{}},function(){var t,n=document.body,o="jsState-inputMouse",s="jsState-inputTouch";function a(){document.removeEventListener("touchstart",a,!0),document.addEventListener("touchend",d,!0),document.addEventListener("mousemove",i,!0),n.classList.remove(o),n.classList.add(s),TRANSITIONS.state.isInputTouch=!0}function i(e){e&&e.timeStamp-t<10||(document.addEventListener("touchstart",a,!0),document.removeEventListener("touchend",d,!0),document.removeEventListener("mousemove",i,!0),n.classList.add(o),n.classList.remove(s),TRANSITIONS.state.isInputTouch=!1)}function d(e){t=e.timeStamp}TRANSITIONS.state.isInputTouch=!1,666<window.innerWidth?i():a()}(),function(){var e=!1,t=document.head.querySelector('link[href*="/style.css"]'),o="jsState-stylePreload",s="jsState-styleLoaded",a="jsState-styleUnload",i="jsState-unloadTargetElement",d="jsTarget-eligibleTargetElement",r="jsTarget-transitionEnd",c="jsTarget-loadDelay";function n(){(function(){for(var e=document.styleSheets,t=0;t<e.length;t++)if(e[t].href.match(/\/style.css/gi))return!0;return!1})()&&!e&&(e=!0,document.body.classList.add(o),window.requestAnimationFrame(function(){document.body.classList.remove(o,a),document.body.classList.add(s);for(var e=document.getElementsByClassName(c),t=0;t<e.length;t++){var n=e[t];n.classList.add(c+"-"+(t+1))}}))}var l=!1;function u(e){if(!(e.altKey||e.ctrlKey||e.shiftKey||e.metaKey||"popstate"===e.type&&null==e.state||l)){if(e.preventDefault(),console.log("Unload animation starting"),e.target.closest)var t=e.target.closest("."+d);t&&t.classList.add(i),document.body.classList.add(a),document.body.classList.remove(s,o);var n=function(){switch(console.log("Unload animation end. Proceeding to next page"),l=!0,e.type){case"click":e.target.click();break;case"submit":HTMLFormElement.prototype.submit.call(e.target);break;case"popstate":history.go(-2)}};document.getElementsByClassName(r)[0].addEventListener("transitionend",n),window.setTimeout(n,2e3)}}function m(e){}n(),document.addEventListener("DOMContentLoaded",n),window.addEventListener("load",n),t&&t.addEventListener("load",n),document.addEventListener("DOMContentLoaded",function(){for(var e=0;e<document.links.length;e++){var t=document.links[e];"_blank"!=t.target&&(t.pathname==window.location.pathname&&t.hash?t.addEventListener("click",m,!1):t.addEventListener("click",u,!1))}for(e=0;e<document.forms.length;e++)document.forms[e].addEventListener("submit",u,!1)})}(),function(){var e=4;e=.01*window.innerHeight,document.documentElement.style.setProperty("--vh",e+"px")}(),function(){var e=window,o=document.documentElement,s=2,a=document.querySelector(".jsTarget-parallax--top"),i=document.querySelector(".jsTarget-parallax--bottom");function t(){if(TRANSITIONS.state.isInputTouch)a.style="";else{if(a&&window.innerHeight>o.scrollTop){var e=Math.round(o.scrollTop/s);a.style="transform: translate3D(0, "+e+"px, 0)"}var t=o.scrollHeight-o.scrollTop-window.innerHeight;if(i&&window.innerHeight>t){var n=Math.round(t/s);i.style="transform: translate3D(0, -"+n+"px, 0)"}}}(a||i)&&e.addEventListener("scroll",function(e){o=e.target.scrollingElement,window.requestAnimationFrame(t)})}(),function(){var t=document.querySelector(".jsTarget-navButton"),n=document.querySelector(".jsTarget-navOverlay"),o="jsState-navOpen",s="jsState-navClosed",a="button--fill-light",i=!1,d=500;function e(e){TRANSITIONS.state.isNavOpen?c():r()}function r(e){TRANSITIONS.state.isNavOpen=!0,document.body.classList.add(o),document.body.classList.remove(s),n.addEventListener("mouseenter",c,!1),t.removeEventListener("mouseenter",r,!1),t.classList.remove(a),i=!0,window.setTimeout(function(){i=!1},d)}function c(e){i||(TRANSITIONS.state.isNavOpen=!1,document.body.classList.remove(o),document.body.classList.add(s),n.removeEventListener("mouseenter",c,!1),t.addEventListener("mouseenter",r,!1),t.classList.add(a))}TRANSITIONS.state.isNavOpen=!1,t.addEventListener("click",e,!1),n.addEventListener("click",c,!1),c()}();