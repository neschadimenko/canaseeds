app.view.SearchAutocomplete = Backbone.View.extend({
	initialize : function() {
		var self = this;
		_.bindAll(self);

		self.el = jQuery('.search-form');
		self.elInput = self.el.find('#search');
		self.model = new app.model.SearchAutocomplete();

		self.elInput.typeahead({
			source : self.onSuggest,
			onselect : self.onSuggestSelect
		});
	},

	onSuggest : function(typeahead, query) {
		var self = this;
		self.model.query = query;

		self.model.load(function(response) {
			var items = [];
			var suggest = [];

			_.each(jQuery(response.items).find('li'), function(value) {
				items.push({
					value : jQuery(value).html(),
					url : jQuery(value).attr('data-url'),
				});
			});

			if (response.suggest) {
				suggest = response.suggest;
			}

			typeahead.process(items, suggest);
		}, function(response) {

		});
	},

	onSuggestSelect : function(url) {
		window.location.href = url;
	},
});

jQuery(function() {
	app.searchAutocomplete = new app.view.SearchAutocomplete();
});
