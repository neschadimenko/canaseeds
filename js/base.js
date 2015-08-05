app.view.CatalogCompareBase = Backbone.View.extend({
    
    initEvents : function() {
        var self = this;
        
        self.el.on('click', '.catalogcompare-add', function(e) {
            e.preventDefault();
            self.addToCompare(jQuery(this).attr('href'), jQuery(this));
        });
        
        self.el.on('click', '.catalogcompare-remove', function(e) {
            e.preventDefault();
            self.removeFromCompare(jQuery(this).attr('href'));
        });
    },
    
    initialize: function() {
        var self = this;
        _.bindAll(self);
        self.el = jQuery('body');
        self.initEvents();
    },
    
    addToCompare: function(url, el) {
        var self = this;
        
        util.loader(el);
        
        util.load(url, {refresh_areas: 1, area_group:'compare'},
            function (response) {
                
                //console.log(response);
                
            util.loader(el, false);
            }
        );
    }, 
    
    removeFromCompare: function(url) {
        var self = this;
        util.loader(jQuery('.catalog-compare-load'));
        util.load(url, {refresh_areas: 1, area_group:'compare'},
            function (response) {
                if (response.success) {
                }
            }
        );
    }, 
});
jQuery(function() {
    app.catalogCompareBase = new app.view.CatalogCompareBase();
});