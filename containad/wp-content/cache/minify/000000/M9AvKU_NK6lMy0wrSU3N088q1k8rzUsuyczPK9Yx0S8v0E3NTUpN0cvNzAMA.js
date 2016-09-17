
/* functions.js */

/* 1   */ /* global screenReaderText */
/* 2   */ /**
/* 3   *|  * Theme functions file.
/* 4   *|  *
/* 5   *|  * Contains handlers for navigation and widget area.
/* 6   *|  */
/* 7   */ 
/* 8   */ ( function( $ ) {
/* 9   */ 	var $body, $window, $sidebar, adminbarOffset, top = false,
/* 10  */ 	    bottom = false, windowWidth, windowHeight, lastWindowPos = 0,
/* 11  */ 	    topOffset = 0, bodyHeight, sidebarHeight, resizeTimer,
/* 12  */ 	    secondary, button;
/* 13  */ 
/* 14  */ 	function initMainNavigation( container ) {
/* 15  */ 		// Add dropdown toggle that display child menu items.
/* 16  */ 		container.find( '.menu-item-has-children > a' ).after( '<button class="dropdown-toggle" aria-expanded="false">' + screenReaderText.expand + '</button>' );
/* 17  */ 
/* 18  */ 		// Toggle buttons and submenu items with active children menu items.
/* 19  */ 		container.find( '.current-menu-ancestor > button' ).addClass( 'toggle-on' );
/* 20  */ 		container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );
/* 21  */ 
/* 22  */ 		container.find( '.dropdown-toggle' ).click( function( e ) {
/* 23  */ 			var _this = $( this );
/* 24  */ 			e.preventDefault();
/* 25  */ 			_this.toggleClass( 'toggle-on' );
/* 26  */ 			_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );
/* 27  */ 			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
/* 28  */ 			_this.html( _this.html() === screenReaderText.expand ? screenReaderText.collapse : screenReaderText.expand );
/* 29  */ 		} );
/* 30  */ 	}
/* 31  */ 	initMainNavigation( $( '.main-navigation' ) );
/* 32  */ 
/* 33  */ 	// Re-initialize the main navigation when it is updated, persisting any existing submenu expanded states.
/* 34  */ 	$( document ).on( 'customize-preview-menu-refreshed', function( e, params ) {
/* 35  */ 		if ( 'primary' === params.wpNavMenuArgs.theme_location ) {
/* 36  */ 			initMainNavigation( params.newContainer );
/* 37  */ 
/* 38  */ 			// Re-sync expanded states from oldContainer.
/* 39  */ 			params.oldContainer.find( '.dropdown-toggle.toggle-on' ).each(function() {
/* 40  */ 				var containerId = $( this ).parent().prop( 'id' );
/* 41  */ 				$( params.newContainer ).find( '#' + containerId + ' > .dropdown-toggle' ).triggerHandler( 'click' );
/* 42  */ 			});
/* 43  */ 		}
/* 44  */ 	});
/* 45  */ 
/* 46  */ 	secondary = $( '#secondary' );
/* 47  */ 	button = $( '.site-branding' ).find( '.secondary-toggle' );
/* 48  */ 
/* 49  */ 	// Enable menu toggle for small screens.
/* 50  */ 	( function() {

/* functions.js */

/* 51  */ 		var menu, widgets, social;
/* 52  */ 		if ( ! secondary.length || ! button.length ) {
/* 53  */ 			return;
/* 54  */ 		}
/* 55  */ 
/* 56  */ 		// Hide button if there are no widgets and the menus are missing or empty.
/* 57  */ 		menu    = secondary.find( '.nav-menu' );
/* 58  */ 		widgets = secondary.find( '#widget-area' );
/* 59  */ 		social  = secondary.find( '#social-navigation' );
/* 60  */ 		if ( ! widgets.length && ! social.length && ( ! menu.length || ! menu.children().length ) ) {
/* 61  */ 			button.hide();
/* 62  */ 			return;
/* 63  */ 		}
/* 64  */ 
/* 65  */ 		button.on( 'click.twentyfifteen', function() {
/* 66  */ 			secondary.toggleClass( 'toggled-on' );
/* 67  */ 			secondary.trigger( 'resize' );
/* 68  */ 			$( this ).toggleClass( 'toggled-on' );
/* 69  */ 			if ( $( this, secondary ).hasClass( 'toggled-on' ) ) {
/* 70  */ 				$( this ).attr( 'aria-expanded', 'true' );
/* 71  */ 				secondary.attr( 'aria-expanded', 'true' );
/* 72  */ 			} else {
/* 73  */ 				$( this ).attr( 'aria-expanded', 'false' );
/* 74  */ 				secondary.attr( 'aria-expanded', 'false' );
/* 75  */ 			}
/* 76  */ 		} );
/* 77  */ 	} )();
/* 78  */ 
/* 79  */ 	/**
/* 80  *| 	 * @summary Add or remove ARIA attributes.
/* 81  *| 	 * Uses jQuery's width() function to determine the size of the window and add
/* 82  *| 	 * the default ARIA attributes for the menu toggle if it's visible.
/* 83  *| 	 * @since Twenty Fifteen 1.1
/* 84  *| 	 */
/* 85  */ 	function onResizeARIA() {
/* 86  */ 		if ( 955 > $window.width() ) {
/* 87  */ 			button.attr( 'aria-expanded', 'false' );
/* 88  */ 			secondary.attr( 'aria-expanded', 'false' );
/* 89  */ 			button.attr( 'aria-controls', 'secondary' );
/* 90  */ 		} else {
/* 91  */ 			button.removeAttr( 'aria-expanded' );
/* 92  */ 			secondary.removeAttr( 'aria-expanded' );
/* 93  */ 			button.removeAttr( 'aria-controls' );
/* 94  */ 		}
/* 95  */ 	}
/* 96  */ 
/* 97  */ 	// Sidebar scrolling.
/* 98  */ 	function resize() {
/* 99  */ 		windowWidth = $window.width();
/* 100 */ 

/* functions.js */

/* 101 */ 		if ( 955 > windowWidth ) {
/* 102 */ 			top = bottom = false;
/* 103 */ 			$sidebar.removeAttr( 'style' );
/* 104 */ 		}
/* 105 */ 	}
/* 106 */ 
/* 107 */ 	function scroll() {
/* 108 */ 		var windowPos = $window.scrollTop();
/* 109 */ 
/* 110 */ 		if ( 955 > windowWidth ) {
/* 111 */ 			return;
/* 112 */ 		}
/* 113 */ 
/* 114 */ 		sidebarHeight = $sidebar.height();
/* 115 */ 		windowHeight  = $window.height();
/* 116 */ 		bodyHeight    = $body.height();
/* 117 */ 
/* 118 */ 		if ( sidebarHeight + adminbarOffset > windowHeight ) {
/* 119 */ 			if ( windowPos > lastWindowPos ) {
/* 120 */ 				if ( top ) {
/* 121 */ 					top = false;
/* 122 */ 					topOffset = ( $sidebar.offset().top > 0 ) ? $sidebar.offset().top - adminbarOffset : 0;
/* 123 */ 					$sidebar.attr( 'style', 'top: ' + topOffset + 'px;' );
/* 124 */ 				} else if ( ! bottom && windowPos + windowHeight > sidebarHeight + $sidebar.offset().top && sidebarHeight + adminbarOffset < bodyHeight ) {
/* 125 */ 					bottom = true;
/* 126 */ 					$sidebar.attr( 'style', 'position: fixed; bottom: 0;' );
/* 127 */ 				}
/* 128 */ 			} else if ( windowPos < lastWindowPos ) {
/* 129 */ 				if ( bottom ) {
/* 130 */ 					bottom = false;
/* 131 */ 					topOffset = ( $sidebar.offset().top > 0 ) ? $sidebar.offset().top - adminbarOffset : 0;
/* 132 */ 					$sidebar.attr( 'style', 'top: ' + topOffset + 'px;' );
/* 133 */ 				} else if ( ! top && windowPos + adminbarOffset < $sidebar.offset().top ) {
/* 134 */ 					top = true;
/* 135 */ 					$sidebar.attr( 'style', 'position: fixed;' );
/* 136 */ 				}
/* 137 */ 			} else {
/* 138 */ 				top = bottom = false;
/* 139 */ 				topOffset = ( $sidebar.offset().top > 0 ) ? $sidebar.offset().top - adminbarOffset : 0;
/* 140 */ 				$sidebar.attr( 'style', 'top: ' + topOffset + 'px;' );
/* 141 */ 			}
/* 142 */ 		} else if ( ! top ) {
/* 143 */ 			top = true;
/* 144 */ 			$sidebar.attr( 'style', 'position: fixed;' );
/* 145 */ 		}
/* 146 */ 
/* 147 */ 		lastWindowPos = windowPos;
/* 148 */ 	}
/* 149 */ 
/* 150 */ 	function resizeAndScroll() {

/* functions.js */

/* 151 */ 		resize();
/* 152 */ 		scroll();
/* 153 */ 	}
/* 154 */ 
/* 155 */ 	$( document ).ready( function() {
/* 156 */ 		$body          = $( document.body );
/* 157 */ 		$window        = $( window );
/* 158 */ 		$sidebar       = $( '#sidebar' ).first();
/* 159 */ 		adminbarOffset = $body.is( '.admin-bar' ) ? $( '#wpadminbar' ).height() : 0;
/* 160 */ 
/* 161 */ 		$window
/* 162 */ 			.on( 'scroll.twentyfifteen', scroll )
/* 163 */ 			.on( 'load.twentyfifteen', onResizeARIA )
/* 164 */ 			.on( 'resize.twentyfifteen', function() {
/* 165 */ 				clearTimeout( resizeTimer );
/* 166 */ 				resizeTimer = setTimeout( resizeAndScroll, 500 );
/* 167 */ 				onResizeARIA();
/* 168 */ 			} );
/* 169 */ 		$sidebar.on( 'click.twentyfifteen keydown.twentyfifteen', 'button', resizeAndScroll );
/* 170 */ 
/* 171 */ 		resizeAndScroll();
/* 172 */ 
/* 173 */ 		for ( var i = 1; i < 6; i++ ) {
/* 174 */ 			setTimeout( resizeAndScroll, 100 * i );
/* 175 */ 		}
/* 176 */ 	} );
/* 177 */ 
/* 178 */ } )( jQuery );
/* 179 */ 

;
/* wp-embed.min.js */

/* 1 */ !function(a,b){"use strict";function c(){if(!e){e=!0;var a,c,d,f,g=-1!==navigator.appVersion.indexOf("MSIE 10"),h=!!navigator.userAgent.match(/Trident.*rv:11\./),i=b.querySelectorAll("iframe.wp-embedded-content");for(c=0;c<i.length;c++)if(d=i[c],!d.getAttribute("data-secret")){if(f=Math.random().toString(36).substr(2,10),d.src+="#?secret="+f,d.setAttribute("data-secret",f),g||h)a=d.cloneNode(!0),a.removeAttribute("security"),d.parentNode.replaceChild(a,d)}else;}}var d=!1,e=!1;if(b.querySelector)if(a.addEventListener)d=!0;if(a.wp=a.wp||{},!a.wp.receiveEmbedMessage)if(a.wp.receiveEmbedMessage=function(c){var d=c.data;if(d.secret||d.message||d.value)if(!/[^a-zA-Z0-9]/.test(d.secret)){var e,f,g,h,i,j=b.querySelectorAll('iframe[data-secret="'+d.secret+'"]'),k=b.querySelectorAll('blockquote[data-secret="'+d.secret+'"]');for(e=0;e<k.length;e++)k[e].style.display="none";for(e=0;e<j.length;e++)if(f=j[e],c.source===f.contentWindow){if(f.removeAttribute("style"),"height"===d.message){if(g=parseInt(d.value,10),g>1e3)g=1e3;else if(200>~~g)g=200;f.height=g}if("link"===d.message)if(h=b.createElement("a"),i=b.createElement("a"),h.href=f.getAttribute("src"),i.href=d.value,i.host===h.host)if(b.activeElement===f)a.top.location.href=d.value}else;}},d)a.addEventListener("message",a.wp.receiveEmbedMessage,!1),b.addEventListener("DOMContentLoaded",c,!1),a.addEventListener("load",c,!1)}(window,document);
