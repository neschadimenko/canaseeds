app.view.SearchForm = Backbone.View.extend({

	initialize : function() {
		var self = this;
		_.bindAll(self);

		self.el = jQuery('.search-form');
		self.elInput = self.el.find('#search');
		self.baseText = self.el.attr('data-text');

		self.initializeEvents();

		/** set base text */
		self.onBlur();
	},

	initializeEvents : function() {
		var self = this;

		self.elInput.on('blur', self.onBlur);
		self.elInput.on('focus', self.onFocus);
		
		self.el.on('submit', function(e) {
            if (self.elInput.val() == '' || self.elInput.val() == self.baseText) {
                e.preventDefault();
            }
		});

		return this;
	},

	onBlur : function() {
		var self = this;
		if (self.elInput.val() == '') {
			self.elInput.val(self.baseText);
		}
		self.elInput.removeClass('active');
	},

	onFocus : function() {
		var self = this;
		if (self.elInput.val() == self.baseText) {
			self.elInput.val('');
		}
		self.elInput.removeClass('active').addClass('active');
	},
});

jQuery(function() {
	app.searchForm = new app.view.SearchForm();
});
jQuery(document).ready(function(){
/*serch cut*/  
  jQuery('#search').keypress( function() {
        var js = jQuery(this);
        if(js.val().length > 128)
            js.val(js.val().substr(0, 128));          
            
    });
 });   