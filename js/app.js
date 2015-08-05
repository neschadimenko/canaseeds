var app = {
	view : {},
	model : {},
	system: {},

	initialize : function() {
            this.callback();
            this.ajax();
            this._ajax();
	},
        
        callback: function ()
        {
            jQuery("button.callback").click (function () {
                jQuery.fancybox({
                    'transitionIn'  : 'none',
                    'transitionOut' : 'none',
                    'type'          : 'ajax',
                    'href'          : jQuery(this).attr('data-url')
                });
            });
        },
        
        ajax: function ()
        {
            jQuery("button.ajax").click (function () {
                jQuery.fancybox({
                    'transitionIn'  : 'none',
                    'transitionOut' : 'none',
                    'type'          : 'ajax',
                    'href'          : jQuery(this).attr('data-url')
                });
            });
        },
        
        _ajax: function ()
        {
            jQuery(".ajax-ui-link").fancybox({
                    transitionIn  : 'none',
                    transitionOut : 'none',
                    type          : 'ajax',
                    width         : '450',
                    maxHeight        : '500'
                });
        }
};

jQuery(function() {
	app.initialize();
        util.trigger('app@initialized');
});