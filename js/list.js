app.view.ProductList = Backbone.View.extend({
    el: '.catalog-right-side',
   
    events: {
        'click .UI-CATALOG-PRODUCT-IMAGE': 'onImageClick',
    },
    
    initEvents : function() {
        var self = this;

        util.on('util@afterload', function() {
            self.initNameHeight(); 
        });
    },
    
    initialize: function() {
        var self = this;
        _.bindAll(self);

        self.initEvents();
        self.initNameHeight();

        jQuery(document).bind('keydown', this.onKeyDown);
    },
    
    initNameHeight: function() {
        var self = this;
        
        util.aline(jQuery('.cataloglist-item-name', self.jQueryel));
    },

    onImageClick: function (e) {
        e.preventDefault();
        var jQueryel = jQuery(e.currentTarget);
        this.imageIndex = jQuery('.UI-CATALOG-PRODUCT-IMAGE').index(jQueryel);
        this.showImagePopup();
    },

    showImagePopup: function () {
        var total = jQuery('.UI-CATALOG-PRODUCT-IMAGE').length;
        if (total <= this.imageIndex) {
            this.imageIndex = total - 1;
        }
        if (this.imageIndex < 0) {
            this.imageIndex = 0;
        }

        var jQueryimg    = jQuery(jQuery('.UI-CATALOG-PRODUCT-IMAGE').get(this.imageIndex));
        var src     = jQueryimg.attr('data-image');
        var title   = jQueryimg.attr('data-name');
        var content = '<img src="' + src + '" width="1000px" height="500px">';
        
        var html = "<div class='modal img-popup hide'>";
        html += "<div class='modal-header'>";
        html += "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
        html += "<h3>" + title + "</h3>";
        html += "</div>";
        html += "<div class='modal-body'>";
        html += content;
        html += "</div>";
        html += "</div>";

         jQuery('.modal.img-popup').modal('hide');
        jQuery('.modal.img-popup').remove();
        jQuery(html).modal({backdrop: false});
    },

    onKeyDown: function(e) {
        if (this.imageIndex != undefined) {
            if (e.keyCode == 37) { // left
                this.imageIndex--;
                this.showImagePopup();
            } else if (e.keyCode == 39) { // right
                this.imageIndex++;
                this.showImagePopup();
            }
        }
    }
});
jQuery(function() {
    app.productList = new app.view.ProductList();
});
