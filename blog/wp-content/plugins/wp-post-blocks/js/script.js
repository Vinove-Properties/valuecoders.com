/**
 * Plugin Javascript
 * script.js
 */
;(function( $ ){

	'use strict';
	/**
	 * Cache Ajax requests
	 * See http://stackoverflow.com/a/17104536
	 */
	var localCache = {
	    data: {},
	    remove: function (id) {
	        delete localCache.data[id];
	    },
	    exist: function (id) {
	        return localCache.data.hasOwnProperty(id) && localCache.data[id] !== null;
	    },
	    get: function (id) {
	        // console.log('Getting in cache for id' + id);
	        return localCache.data[id];
	    },
	    set: function (id, cachedData, callback) {
	    	callback = callback || false;
	        localCache.remove(id);
	        localCache.data[id] = cachedData;
	        if ( callback && $.isFunction(callback)) callback(cachedData);
	    }
	};


	var WP_Post_Block = {}, 
		WP_Post_Brick = {}, 
		WP_Post_Slider = {}, 
		WP_Post_Carousel = {};



	WP_Post_Carousel.flexCarousel = {

        activeItemsStart: function ( slider ) {

        	
        	if( typeof slider === 'undefined' )
        		return;

        	this.detectActiveItems(slider);
            
        },
        activeItemsBefore: function(slider){
        	
        	if( typeof slider === 'undefined' )
        		return;

            var activeClass = slider.vars.namespace + 'active-slide';
            
            for (var i = 0; i < slider.slides.length; i++) {
                if( slider.slides.eq(i).hasClass(activeClass) ){
                    slider.slides.eq(i).removeClass(activeClass);
                }
            }
            this.detectActiveItems(slider);

        },
        detectActiveItems: function(slider){
        	
        	if( typeof slider === 'undefined' )
        		return;

            var activeClass = slider.vars.namespace + 'active-slide';

            var startli = (slider.move * (slider.animatingTo));
            var endli = (slider.move * (slider.animatingTo + 1));
            
            // Check if last slide has less items than slide.move
            var shortages = (slider.pagingCount * slider.move) - slider.count;

            if( shortages && slider.animatingTo == ( slider.pagingCount - 1 ) ){
                // console.log(shortages);
                startli = ( (slider.pagingCount-1) * slider.move ) - shortages;
            }

            var count = 0;

            for (var i = startli; i < endli; i++) {
                count++;

                slider.slides.eq(i).addClass( activeClass);

            }
        },
        getGridSize: function( obj, viewport ){
            
            var result = false;

            $.each( obj, function(breakpoint, args) {
                
                if (breakpoint && parseInt( breakpoint ) <= parseInt( viewport ) ) {
                    result = args;
                }

            });

            return result;
        },
        itemsByViewport: function( $slider ) {

        	if( typeof $slider === 'undefined' )
        		return;

            var result = false;
            
            if ($slider.vars.responsive) {
                var viewport = $slider.vars.responsiveTo && 'container' == $slider.vars.responsiveTo ? $slider.width() : $(window).width();

                $.each($slider.vars.responsive, function(breakpoint, args) {
                    if (breakpoint && parseInt( breakpoint ) <= parseInt( viewport ) ) {
                        result = args;
                    }
                });
                
                if( result ){
                    if( result.minItems )
                        $slider.vars.minItems = result.minItems;
                    if( result.maxItems )
                        $slider.vars.maxItems = result.maxItems;
                    if( result.itemMargin )
                        $slider.vars.itemMargin = result.itemMargin;
                    if( result.itemWidth )
                        $slider.vars.itemWidth = result.itemWidth;
                    
                    $slider.doMath();
                }else{
                    $slider.doMath();

                }
            }
        }
    };

	/**
	 * UX
	 */
	WP_Post_Block.ux = {
		/**
		 * Get Post
		 */
		getPosts:function( $el, _append ) {

			_append = typeof _append !== 'undefined' ? _append : true;
			
			
			var $nav = $el.closest('.pbs-nav'),
				targetUID = $nav.data('uid');

			if( !targetUID )
				return false;
			
			var $container 	= $('.pbs[data-role="wrapper"][data-uid="' + targetUID + '"]');
			
			if( !$container.length )
				return false;

			// if block is currently loading, return.
			if( $container.hasClass('loading') )
				return;

			var $inner 		= $('.pbs-inner', $container),
				$content 	= $('[data-role="content"]', $container),
				$spinner 	= $('.pbs-loader', $container),
				$vars		= $('.pbs-vars', $container),
				$args 		= $vars.data('args'),
				$settings 	= $vars.data('settings'),
				$blockID 	= $settings.react,
				$blockUID 	= $settings.uid,
				$counter	= parseInt( $vars.data('current-page') ) ,
				$cacheID	= '',
				$params 	= {
					action: 	'wp_post_blocks/get_block_data',
					security: 	$settings.nonce,
					args: 		$args,
					settings: 	$settings
				};

			if( 1 == $counter && $vars.data('init') == undefined){
				localCache.set( $blockUID + '_1', $content.html() );
				$vars.data('init', true );
			}

			// Loading state
			$container.removeClass('loaded').addClass( 'loading' );
			$container.removeClass('first-page last-page');
			
			// If is prev nav, make sure user can't multiple pressed when current page is 1
			if( $el.is('[data-role="prev"]') ){

				if( $counter > 1 ){
					if( 2 == $counter ){
						$container.addClass('first-page');
					}
					$counter = $counter-1;

				}else{
					$container.removeClass('loading').addClass( 'loaded' );
					$container.addClass('first-page');
					// $el.addClass('disabled');
					return;
				}

			}else{
				// console.log($vars.data('max-page'));
				
				// And if next nav is clicked when current page is the last page, return.
				if( $el.is('[data-role="next"]') && $vars.data('max-page') != undefined && parseInt( $vars.data('max-page') ) == $counter ){
					$container.removeClass('loading').addClass( 'loaded' );
					$container.addClass('last-page');
					// $el.addClass('disabled');
					return;
				}
				// Else, increase the counter
				else{

					$counter = $counter+1;

					if( $vars.data('max-page') != undefined && parseInt( $vars.data('max-page') ) == $counter ){
						$container.addClass('last-page');
					}


				}
			}

			// console.log('aaa');
			// Cache ID for pages
			$cacheID = $blockUID + '_' + $counter;

			// console.log($cacheID);

			// Check if cache exists, return it
			if (localCache.exist( $cacheID )) {
				var cacheContent = localCache.get( $cacheID ); 

				// Adding content
				if( _append ){
					$content.append( cacheContent );
				}else{
					$content.html( cacheContent );
				}
				$container.removeClass('loading').addClass('loaded');

				$(document.body).trigger('post-load', { 
					html: cacheContent, 
					cache: true,
					object: $container
				} );

            // Else do ajax request.
            }else{
		    	$.ajax({
		    		// cache: false,
					type: 'POST',
					url: wp_post_blocks_vars.ajaxurl,
					data: $params,
					success: function(responses){
						// console.log(responses);
						if(responses && !responses.error ){
							// Update query args for excluding listed posts
							if( responses.ids ){
								// console.log( responses.ids );
								$args.post__not_in = WP_Post_Block.helper.arrayUnique( $args.post__not_in.concat( responses.ids ) );
								$vars.data( 'args', $args );
							}
							// Append html to post block content
							if( responses.html ){
								if( _append ){
									$content.append( responses.html );
								}else{
									$content.html( responses.html );
								}
								// Set cache
								localCache.set( $cacheID, responses.html );
							}
							
							// Remove loading state
							$container.removeClass('loading').addClass('loaded');

							// All post retrieved, remove nav and display message
							if( responses.all_loaded ){
								$container.addClass('all-loaded');
								$container.addClass('last-page');
								if( responses.html){
									$counter = $counter;
								}else{
									$counter = $counter-1;
								}
								$vars.data('max-page', $counter);
								$vars.data('current-page', $counter );
								// $el.addClass('disabled');
								// Show last posts message and remove nav after 3000 miliseconds
								if( !($nav.is('[data-nav="prev_next"]') || $nav.is('[data-nav="prev_next_top"]')) ){
									$nav.html( responses.msg );
									setTimeout( function(){ 
										$nav.slideUp(function(){
											$(this).remove();
										}); 
										$spinner.remove();
									}, 3000 );	
								}
							}
						}
						responses.object = $container;
						$(document.body).trigger('post-load', responses);
						
					}
				});
			}

			// Set the data counter
			$vars.data('current-page', $counter );
		},
		/**
		 * loadMore
		 */
		loadMore: function( e ){

			e.preventDefault();

			var $el = $(this);

			WP_Post_Block.ux.getPosts( $el );

		},
		/**
		 * Scroll infinitely
		 */
		infiniteScroll:function() {

			var $el = $(this);

			if( $el.is(':visible')){

				//console.log('is_visible');
				var content_offset = $el.offset();
				if ( window.pageYOffset >= Math.round(content_offset.top - (window.outerHeight + 150) ) ) {
					WP_Post_Block.ux.getPosts( $el );
				}
			}

		},
		/**
		 * Previous/Next
		 */
		prevNext: function( e ){
			e.preventDefault();

			var $el = $(this);

			WP_Post_Block.ux.getPosts( $el, false );

		}
	};
	// Helpers
	WP_Post_Block.helper = {
		/**
		 * Unique an array
		 */
		arrayUnique: function(array) {
		    var a = array.concat();
		    for(var i=0; i<a.length; ++i) {
		        for(var j=i+1; j<a.length; ++j) {
		            if(a[i] === a[j])
		                a.splice(j--, 1);
		        }
		    }

		    return a;
		},
		/**
		 * Encode Query params
		 * See http://stackoverflow.com/a/111545
		 */
		encodeQueryData: function(data){
		   var ret = [];
		   for (var d in data)
		      ret.push(encodeURIComponent(d) + "=" + encodeURIComponent(data[d]));
		   return ret.join("&");
		}
	};

	/**
	 * Responsive nav
	 * @see https://css-tricks.com/diy-priority-plus-nav/
	 */
	// var count=0;
	var priorityNav = function( _wrapper, _inlineMenu, _dropdownMenuItem, $_siblings){
		// count++;
		// console.log(count);

		// Only call when object is visible!
		if( !$(_wrapper).is(':visible'))
				return;

		var nav 		= $( _inlineMenu, _wrapper ),
			navW 		= 0,
			moreW		= _wrapper.find(_dropdownMenuItem).outerWidth(true),
			$parentW 	= _wrapper.parent().outerWidth(),
			// $titleW 	= _wrapper.siblings('.pbs-title').find('span').outerWidth(true),
			extraW 		= $_siblings.length ? ( $_siblings.outerWidth(false) + 30 ) : false,
			pad 		= moreW ? moreW : 0,
			availableSpace = $parentW - extraW - pad;

		// Bail if there's no room
		if( availableSpace < 1 )
			return;

		// Collect li width
		$('> li:not(' + _dropdownMenuItem + ')', nav).each(function() {
			navW += $(this).outerWidth( true );
		});

		// console.log('availableSpace: '+ availableSpace +  ' - navW: '+ navW);
		
		if( $_siblings.length ){
			if( availableSpace > ( moreW + navW) ){
				// $_siblings.css({'margin-right': '' });
			}else{
				// $_siblings.css({'margin-right': moreW + 20 });	
			}
		}
		
		if (navW > availableSpace) {

			var lastItem = $('> li:not(' + _dropdownMenuItem + ')', nav).last();
			// console.log(lastItem.text());
			lastItem.attr('data-width', lastItem.outerWidth(true));
			lastItem.prependTo($( _dropdownMenuItem + ' ul', nav));
			priorityNav( _wrapper, _inlineMenu, _dropdownMenuItem, $_siblings );

		} else {

			var firstMoreElement = $( _dropdownMenuItem + ' li', nav).first();

			if (navW + firstMoreElement.data('width') < availableSpace) {
				firstMoreElement.insertBefore($( _dropdownMenuItem, nav ));
			}
		}

		if ($( _dropdownMenuItem + ' li', nav ).length > 0) {
			$(_dropdownMenuItem, nav).addClass('active');
		} else {
			$(_dropdownMenuItem, nav).removeClass('active');
		}

		setTimeout( function(){
			_wrapper.addClass('ready');
		}, 250);

	}

	var blockFilterNav = function(){

		$('.pbs .pbs-filter').each(function(){
			var $el 				= $(this),
				inlineMenu 			= '.inline-filter',
				dropdownMenuItem 	= '.more',
				siblings			= $el.siblings('.pbs-title').find('span');

			priorityNav( $el, inlineMenu, dropdownMenuItem, siblings);
		});
	}

	var blockFilterNavTop = function(){
		$('.pbs .pbs-nav.prev_next_top').each(function(){
			var $el = $(this),
				w = $el.closest( '.pbs' ),
				header = w.find('.pbs-header');
				// console.log(header);
				if( header.length ){
					$el.detach().appendTo(header);
				}else{
					$el.remove();
				}
		});
	};

	var flexsliderInit = function(){
		$('.flexslider').each(function() {
			var $that = $(this),
				$slider = {},
				args = {},
				custom_args = $that.data('settings');

            // Extend custom settings.
            if( custom_args ){

				if( custom_args.customNav ){
					custom_args.controlsContainer = $(custom_args.controlsContainer);
					custom_args.customDirectionNav = $( custom_args.customDirectionNav );
				}

                $.extend( args, custom_args );

                
            }
            

			if( $that.is('.pbs-carousel') ){
				
	           var carousel_args = {
                    animation: "slide",
                    animationSpeed: 800,
                    animationLoop: false,
                    itemWidth: 1,
                    itemMargin: 0,
                    minItems: 2, // use function to pull in initial value
                    maxItems: 2, // use function to pull in initial value
                    start: function(slider) {

                        $slider = slider;
                        WP_Post_Carousel.flexCarousel.activeItemsStart(slider);
                        // console.log(slider.slides);

                    },
                    before: function(slider){

                        slider.addClass('moving');  
                        WP_Post_Carousel.flexCarousel.activeItemsBefore(slider);

                        slider.removeClass('moving-prev moving-next');
						slider.addClass('moving-' + slider.direction );
                    },
                    after: function(slider){
                        slider.removeClass('moving');
                        
                    }, 

                    // Customized
                    responsive: {},
                    responsiveTo: 'viewport' // container | viewport

                };

	            // Extend Grid size
	            if( args.responsive ){
	            	// console.log(args);
	                var gridSizes = WP_Post_Carousel.flexCarousel.getGridSize( args.responsive, ( args.responsiveTo && 'container' == args.responsiveTo ? $that.width() : $(window).width() ) );

	                if( gridSizes && null != gridSizes ){
	                	// console.log(gridSizes);
	                    $.extend( args, gridSizes );
	                }
	            }

	            // Merge args to carousel args
	            $.extend( carousel_args, args );

	            // console.log(carousel_args);
	            // Init Slider
	            $that.flexslider(carousel_args);

	            // On resize callback
	            var resizeTimer;

	            $(window).on('resize', function(){
	                // Kickstart responsive filter nav
	                
	                clearTimeout(resizeTimer);

	                resizeTimer = setTimeout(function() {
	                    // Run code here, resizing has "stopped"

	                    WP_Post_Carousel.flexCarousel.itemsByViewport($that.data('flexslider'));
	                    WP_Post_Carousel.flexCarousel.detectActiveItems($that.data('flexslider'));
	                    // console.log('aaaa');
	                }, 100);
	            });
	        }else if( $that.is('.pbs-slider') ){
	        	var slider_args = {
	        		start: function(slider) {

                        slider.slides.removeClass('before-active after-active')
						var $current_slide = slider.slides.eq(slider.current_slide);
						$current_slide.prev().addClass('before-active');
						$current_slide.next().addClass('after-active');


                    },
                    before: function(slider){
                        slider.addClass('moving');

						slider.removeClass('moving-prev moving-next');
						slider.addClass('moving-' + slider.direction );
						
                        slider.slides.removeClass('before-active after-active');
						var $current_slide = slider.slides.eq(slider.animatingTo);
						$current_slide.prev().addClass('before-active');
						$current_slide.next().addClass('after-active');
						
                    },
                    after: function(slider){
                        slider.removeClass('moving');
                        
                    }
	        	};
	        	
	            // Merge args to Slider args
	            $.extend( slider_args, args );

	            // Init Slider
	            $that.flexslider(slider_args);
	        }

        });
	}
	
	/**
	 * on load
	 */
	$(window).on('load', function(){
		// Kickstart responsive filter nav
		// blockFilterNav();

	});
	/**
	 * on resize
	 */
	var resizeTimer;

	$(window).on('resize', function(){
		// Kickstart responsive filter nav
		
		clearTimeout(resizeTimer);

		resizeTimer = setTimeout(function() {

			// Run code here, resizing has "stopped"
			blockFilterNav();
		    
		}, 100);
	});

	/**
	 * on scroll
	 */
	var timer = null;

	$(window).on('scroll', function (e) {
		
		if ( timer ) { return; }

	    timer = setTimeout( function() {
	    	/**
	          * Init 
	          */
	        if( $('.pbs:not(.all-loaded) .pbs-nav[data-nav="infinite_scroll"]').length )
				$('.pbs:not(.all-loaded) .pbs-nav[data-nav="infinite_scroll"]').each( WP_Post_Block.ux.infiniteScroll );
	        
			timer = null;
	    } , 250 );
	});
	/**
	 * Responsive Filter nav
	 * @see https://css-tricks.com/diy-priority-plus-nav/
	 */
	$( document ).ready( function() {
		// Kickstart responsive filter nav
		blockFilterNav();

		flexsliderInit();

		blockFilterNavTop();

		// Kick start lazyload
		lazy_load_init();

		// Elementor editing mode
		if ( window.elementorFrontend && elementorFrontend.isEditMode() ) {
			
			elementorFrontend.hooks.addAction( 'frontend/element_ready/widget', function( $scope ) {
				
				flexsliderInit();

				blockFilterNav();

				blockFilterNavTop();

			} );
		}

		// Compat callback for js_composer editing mode
		$(window).on('vc_reload', function(){

			flexsliderInit();

			blockFilterNav();

			blockFilterNavTop();
			
		});

	})
	// Fullscreen Lightbox
	/**
	 * Close modal
	 */
	.on('click', '.pbs-nav[data-nav="load_more"] a', WP_Post_Block.ux.loadMore )
	.on('click', '.pbs-nav[data-nav="prev_next"] a, .pbs-nav[data-nav="prev_next_top"] a', WP_Post_Block.ux.prevNext )
	.on('click', '[data-action="close-modal"]', function(e){

	
	});

	// For Lazy load
	$( 'body' ).on( 'post-load', lazy_load_init ); // Work with infinite scroll
	$( 'body' ).on( 'template-load', lazy_load_init ); // Work with Javascript template

	function lazy_load_init() {
		$( 'div[data-lazy-src]' ).on( 'scrollin', { distance: 200 }, function() {
			lazy_load_image( this );
		});
	}

	function lazy_load_image( el ) {
		var $el = jQuery( el ),
			src = $el.attr( 'data-lazy-src' );
			// console.log( src );

		if ( ! src || 'undefined' === typeof( src ) )
			return;

		$('<img src="' + src + '"/>').on( 'load',function() {
			var image = $(this);
			// console.log(image);

			$el.css( 'background-image', 'url(' + src + ')');
			$el.unbind( 'scrollin' ) // remove event binding
			
			.removeAttr( 'data-lazy-src' )
			.attr( 'data-lazy-loaded', 'true' );

			image.remove();
    	});
		// $el.fadeIn();
	}

// Works with either jQuery
})( window.jQuery );