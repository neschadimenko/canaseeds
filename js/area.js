app.view.Area = Backbone.View.extend({
    el:document,

    initialize:function () {
        var self = this;
        util.on('util@afterload', function (e, response) {
            if (response.area != undefined) {
                self.refreshAreas(response);
            }
        });
        util.load('/area/', {}, function () {
        });
    },

    renderAreas:function (areas) {
        for (key in areas) {
            var area = areas[key];

            jQuery(key).each(function (index) {
                
                if (key != 'select') {
                    if (area.is_insert) {
                        jQuery(this).html(area.html);
                    } else {
                        jQuery(this).replaceWith(area.html);
                    }
                }
            });
        }
    },

    refreshAreas:function (response) {
        var self = this;
        
        _.each (response.area, function(value) {
            eval(value);
        });
        
        this.renderAreas(app.areas);

        util.trigger('area@afterRefresh');
    }
});
jQuery(function () {
    app.area = new app.view.Area();
});