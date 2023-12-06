/**
 * WP Social Counter
 * This only run once to reduce page load time.
 *
 * @author wpthms
 * @url wpthms
 */
;(function( $ ){

    'use strict';

    var create_cache = function(){

        $.ajax({
            url: wpSocialCounterVars.ajaxurl,
            type: 'GET',
            async: true,
            cache: false,
            // dataType: 'json',
            data: {
                action: 'wpsc-init-cache',
                security: wpSocialCounterVars.nonce
            }
        }).done( function( response ){

        	if( response && response.data ){
        		for (var key in response.data ) {
        			$('.wpsc-wrapper[data-cached="false"] .' + key + ' .wpsc-service-count' ).text( response.data[key] );
        		}
        	}
        	
        });

    };

    $(document).ready(function(){

    	if( $('.wpsc-wrapper[data-cached="false"]').length ){
    		create_cache();
    	}

    });

// Works with either jQuery
})( window.jQuery );
