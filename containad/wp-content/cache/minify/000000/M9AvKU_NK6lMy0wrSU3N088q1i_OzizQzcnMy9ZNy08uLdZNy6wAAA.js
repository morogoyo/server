
/* skip-link-focus-fix.js */

/* 1  */ /**
/* 2  *|  * Makes "skip to content" link work correctly in IE9, Chrome, and Opera
/* 3  *|  * for better accessibility.
/* 4  *|  *
/* 5  *|  * @link http://www.nczonline.net/blog/2013/01/15/fixing-skip-to-content-links/
/* 6  *|  */
/* 7  */ 
/* 8  */ ( function() {
/* 9  */ 	var ua = navigator.userAgent.toLowerCase();
/* 10 */ 
/* 11 */ 	if ( ( ua.indexOf( 'webkit' ) > -1 || ua.indexOf( 'opera' ) > -1 || ua.indexOf( 'msie' ) > -1 ) &&
/* 12 */ 		document.getElementById && window.addEventListener ) {
/* 13 */ 
/* 14 */ 		window.addEventListener( 'hashchange', function() {
/* 15 */ 			var element = document.getElementById( location.hash.substring( 1 ) );
/* 16 */ 
/* 17 */ 			if ( element ) {
/* 18 */ 				if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.nodeName ) ) {
/* 19 */ 					element.tabIndex = -1;
/* 20 */ 				}
/* 21 */ 
/* 22 */ 				element.focus();
/* 23 */ 			}
/* 24 */ 		}, false );
/* 25 */ 	}
/* 26 */ } )();
/* 27 */ 
