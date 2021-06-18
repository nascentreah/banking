/*
 Plugin Name: Pyxle interest rates
 Plugin URI: http://pyxle.net/
 Author: Dinusha Silva
 */
(function($) {
    $.fn.interestRates = function(options) {
        // Extend our default options with those provided.
        // Note that the first arg to extend is an empty object -
        // this is to keep from overriding our "defaults" object.
        var opts = $.extend({}, $.fn.interestRates.defaults, options);

        // check that the passed element is actually in the DOM
        if ($(this).length == 0) {
            if (window.console && window.console.log) {
                window.console.log('Element does not exist in DOM!');
            } else {
                alert('Element does not exist in DOM!');
            }
            return false;
        }

        var nt = null;
        var that = $(this);

        fetchFeed();

        function fetchFeed(){
            $.ajax({
                type: 'GET',
                url: interest_rates_ajax.ajax_url,
                cache: false,
                async: true,
				dataType:'json',
                data: {
					action: 'interest_rate_ajax_request',
					rate_type_from: opts.rateTypeFrom,
					rate_type_to: opts.rateTypeTo,
					group_by: opts.groupBy,
					fetch_only:opts.fetchOnly,
					security: interest_rates_ajax.nonce
				},
                beforeSend:function(request){
                    that.loading({message: 'Loading items..'});
                },
                success: function(obj) {
                    var dataItems = obj.data;
                    // get the items
                    if(obj.status){
                        that.html('');
                        that.html(dataItems);
                    }
					that.loading('stop');
                }
            });
        }
    };

    // plugin defaults - added as a property on our plugin function
    $.fn.interestRates.defaults = {
        rateTypeFrom: null,
        rateTypeTo: null,
		groupBy:null,
		fetchOnly:null
    };
})(jQuery);