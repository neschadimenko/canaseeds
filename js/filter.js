app.view.CatalogFilter = Backbone.View.extend({

	initEvents : function() {
		var self = this;

		self.el.find('input[type=checkbox]').change(function() {
			self.applyListFilter(this);
		});
		
		self.el.find('.filter-menu li a').click(function(e) {
		    e.preventDefault();
		    var checkbox = jQuery(this).parent().parent().find('input');
            self.applyListFilter(checkbox);
        });
		
		self.el.find('input[type=text].range-left').change(function() {
			self.setPriceRange(true);
		});
		
		self.el.find('input[type=text].range-right').change(function() {
			self.setPriceRange(true);
		});
		
		self.el.find('.show-prices').click(function() {
			self.applyPriceFilter();
			return false;
		});
		
		self.el.find('.clear-filters').click(function() {
			self.applyClearFilters(this);
		});
	},

	initialize : function() {
		var self = this;
		_.bindAll(self);
		self.el = jQuery('.block-catalog-layer-view');

		if (self.el.length == 0) {
			return;
		}

		self.initializePriceTrackbar();
		self.initEvents();
	},

	initializePriceTrackbar : function() {
		var self = this;
		var el = this.el.find('.trackbar-range');

		if (el.length == 0) {
			return;
		}
		self.leftLimit = parseInt(el.attr('min'));
		self.rightLimit = parseInt(el.attr('max'));
		el.trackbar({
			dual : true,
			width : el.width(),
			leftLimit : self.leftLimit,
			leftValue : parseInt(el.attr('from')),
			rightLimit : self.rightLimit,
			rightValue : parseInt(el.attr('to'))
		}, 'price-trackbar');

		self.priceBar = jQuery.trackbar.getObject('price-trackbar');

		self.priceBar.onMove = function() {
			self.onChangePriceRange();
		}
		self.setPriceRange();
	},

	setPriceRange : function(inverse) {
		var self = this;
		if (inverse) {
			var leftVal = parseInt(self.el.find('.range-left').val());
			var rightVal = parseInt(self.el.find('.range-right').val());

			if (leftVal < self.leftLimit || isNaN(leftVal)) {
				leftVal = self.leftLimit;
			}
			if (rightVal > self.rightLimit || isNaN(rightVal)) {
				rightVal = self.rightLimit;
			}

			self.priceBar.updateLeftValue(leftVal);
			self.priceBar.updateRightValue(rightVal);
		}
		

		self.el.find('.range-left').val(self.priceBar.leftValue);
		self.el.find('.range-right').val(self.priceBar.rightValue);
	},

	onChangePriceRange : function() {
		var self = this;
		self.setPriceRange();

		if (!self.priceBar.moveState && !self.priceBar.moveIntervalState) {
			self.applyPriceFilter();
		}
	},

	applyPriceFilter : function() {
		var self = this;

		var url = self.generateUrlWithParams(document.URL, {
			price : self.priceBar.leftValue + '-' + self.priceBar.rightValue
		});
		self.applyFilter(url);
	},

	applyListFilter : function(el) {
		var self = this;
		var url = jQuery(el).attr('data-url');
		self.applyFilter(url);
	},
	
	applyClearFilters : function(el) {
		var self = this;
		var url = jQuery(el).attr('data-url');
		self.applyFilter(url);
	},
        
        replaceBreadCrumbs : function(html) {
            jQuery('.breadcrumb').replaceWith(html);
	},

	applyFilter : function(url) {
		var self = this;
		var params;
                
		util.loader(jQuery('.block-catalog-layer-view'));
                
                
                if (url.search("predefinedfilter"))
                    params = "ajax";
		
		util.load(url, {params: params}, function(response) {
			if (response.success) {
				self.replaceBlockCatalogLayerView(response.layer_view);
				self.replaceBlockCatalogCategoryView(response.category_products);
                                self.replaceBreadCrumbs(response.bread_crumbs);
	
				if (history.replaceState && url) {
					history.replaceState({}, 'current page', url);
				}
				util.loader(jQuery('.block-catalog-layer-view'), false);
			}
		});
	},

	replaceBlockCatalogCategoryView : function(html) {
            
            var _html = document.createElement('div');
            _html.innerHTML = html;
            
		jQuery('.block-catalog-category-view').replaceWith( jQuery(_html).find('.block-catalog-category-view') );
	},

	replaceBlockCatalogLayerView : function(html) {
		var self = this;
		self.el.replaceWith(html);
		self.el = jQuery('.block-catalog-layer-view');
		self.initializePriceTrackbar();
		self.initEvents();
	},
	
	generateUrlWithParams : function(url, params) {
		var query = {}, keys = {}, key = '', glue = '', strQuery = '', i = -1;

		if (url.split('?').length == 2) {
			keys = url.split('?')[1].split('&');
		}

		while (++i < keys.length) {
			key = keys[i].split('=');
			query[key[0]] = key[1];
		}

		for (attrname in query) {
			if (params[attrname] == undefined) {
				params[attrname] = query[attrname];
			}
		}

		for (key in params) {
			strQuery += glue + key + '=' + params[key];
			glue = '&';
		}
		if (strQuery != '') {
			url = url.split('?')[0] + '?' + strQuery;
		}
		return url;
	}
});

jQuery(function() {
	app.catalogFilter = new app.view.CatalogFilter();
});