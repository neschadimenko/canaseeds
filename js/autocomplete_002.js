app.model.SearchAutocomplete = Backbone.Model.extend({

	url : '/catalogsearch/result/autocomplete/',

	initialize : function() {
		_.bindAll(this);
	},

	load : function(success, fail) {
		var self = this;

		util.load('/searchautocomplete/result/autocomplete/', {
			q : self.query
		}, function(response) {
			if (response.success) {
				success(response);
			} else {
				fail(response);
			}
		});
	},
});
