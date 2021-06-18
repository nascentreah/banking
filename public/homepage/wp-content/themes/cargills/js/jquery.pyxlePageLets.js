/*
 Plugin Name: Pyxle page lets
 Plugin URI: http://pyxle.net/
 Author: Dinusha Silva
 */
(function($) {
    $.fn.pyxlePageLets = function(options) {
        // Extend our default options with those provided.
        // Note that the first arg to extend is an empty object -
        // this is to keep from overriding our "defaults" object.
        var opts = $.extend({}, $.fn.pyxlePageLets.defaults, options);

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
                type: 'POST',
                url: pyxlePageLets.ajax_url,
                cache: false,
                async: true,
                data: {page_let_type:opts.pageLetType,page_let_id:opts.pageLetId},
                beforeSend:function(request){
                    if(pyxlePageLets.token){
                        request.setRequestHeader("PYXLE-AUTH-TOKEN", pyxlePageLets.token);
                    }
                    if(pyxlePageLets.nonce){
                        request.setRequestHeader("X-WP-Nonce", pyxlePageLets.nonce);
                    }
                },
                success: function(obj) {
                    var dataItems = obj.data;
                    // get the items
                    if(obj.status){
                        that.fadeOut('slow', function() {
                            that.html('');
                            that.html(dataItems);
                            that.fadeIn('slow');
                        });
                    }
                }
            });
        }
    };

    // plugin defaults - added as a property on our plugin function
    $.fn.pyxlePageLets.defaults = {
        pageLetType: null,
        pageLetId: null
    };
})(jQuery);