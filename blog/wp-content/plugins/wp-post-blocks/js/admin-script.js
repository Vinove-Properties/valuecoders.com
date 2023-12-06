/**
 * Plugin Javascript
 * script.js
 */
;(function( $ ){


	var clean_empty_attr = function(obj) {
		$.each(obj, function(key, value){
	        if (value === "" || value === null){
	            delete obj[key];
	        }
	    });

		return obj;
	}, 
	generateShortcode = function(){

		if( typeof wp.shortcode === 'undefined' || typeof vc.storage === 'undefined' )
			return;

		var $el = $(this),
			modal_id = $el.attr('data-model-id'),
			data = vc.storage.data[modal_id],
			_params = clean_empty_attr( data.params ),
			shortcode_content = wp.shortcode.string( { tag:data.shortcode, attrs:_params, type: 'single' });

		// console.log(_params);
			
		if( shortcode_content ){
			prompt( 'Ctrl/Cmd + C to copy shortcode', shortcode_content );
		}
	};

	
	$( document ).ready( function() {
		// Kickstart responsive filter nav
		$( ".wp-pbs-blocks" ).selectable({
			filter: '.wp-pbs-block',
			selected: function( event, ui ) {
				// console.log( ui);
				if( !$(ui.selected).hasClass('excluded') ){
					$(ui.selected).addClass('excluded');
					$(ui.selected).find('input').prop('checked', true);
				}else{
					$(ui.selected).removeClass('excluded');
					$(ui.selected).find('input').prop('checked', false);
				}
			},
		});

	}).

	on( 'dblclick', '[class*="wpb_post_block_"][data-model-id]', generateShortcode );


// Works with either jQuery
})( window.jQuery );