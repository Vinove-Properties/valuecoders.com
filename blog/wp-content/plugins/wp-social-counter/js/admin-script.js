/*!
 * WP Social Counter admin script
 *
 * admin-script.js
 */

;(function($) {
    
    "use strict";
    /**
     * Begin wpSocialCounter object
     */
    var wpSocialCounter = {
        
        /**
         * Action
         */
        init: function(){
            
            this._eventRunning = false;
            this._vars = typeof wpSocialCounterVars !== 'undefined' ? wpSocialCounterVars : {};
            
            var self = this;
            
            $(document)
                .on('click', '#wpsc-generate-data', self.generateCache );


            
        },
        generateCache: function( e ){

            e.preventDefault();

            var self = wpSocialCounter,
                $el = $(this),
                nonce = $el.data('nonce'),
                spinner = $('.spinner', $el ),
                msg = self._vars.confirmGenerateMsg,
                workingMsg = self._vars.workingMsg;

            if( self._eventRunning ){
                alert( workingMsg );
                return;
            }

            if( confirm( msg ) ){

                self._eventRunning = true;
                spinner.addClass('is-active');
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    async: true,
                    cache: false,
                    // dataType: 'json',
                    data: {
                        action: 'wp-social-counter-generate-cache',
                        security: nonce
                    }
                }).done(function(response){
                    self._eventRunning = false;
                    spinner.removeClass('is-active');
                });

            }
        }

        
    }
    
    /**
     * Kickstart it
     */
    wpSocialCounter.init();
    
})(jQuery);