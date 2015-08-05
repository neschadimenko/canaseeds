!function( $ ){
    "use strict"
    var Typeahead = function ( element, options ) {
        this.$element = $(element)
        this.options = $.extend({}, $.fn.typeahead.defaults, options)
        this.matcher = this.options.matcher || this.matcher
        this.sorter = this.options.sorter || this.sorter
        this.highlighter = this.options.highlighter || this.highlighter
        this.$menu = $(this.options.menu).appendTo('body')
        this.source = this.options.source
        this.onselect = this.options.onselect
        this.strings = true
        this.shown = false
        this.listen()
    }

    Typeahead.prototype = {
        constructor: Typeahead, 
        select: function () {
            var val = JSON.parse(this.$menu.find('.active').attr('data-url'));
            if (typeof this.onselect == "function") {
                this.onselect(val);
            } else {
                this.$element.val(val);
            }
            
            return this.hide()
        }, 
        
        show: function () {
            var pos = $.extend({}, this.$element.offset(), {
                height: this.$element[0].offsetHeight
            });

            this.$menu.css({
                top: pos.top + pos.height,
                left: pos.left
            });

            this.$menu.show();
            this.shown = true;
            return this;
        }, 
        
        hide: function () {
            this.$menu.hide();
            this.shown = false;
            return this;
        }, 
        
        lookup: function (event) {
            var that = this, items, q, value;

            this.query = this.$element.val();

            if (typeof this.source == "function") {
                value = this.source(this, this.query);
                if (value) this.process(value);
            } else {
                this.process(this.source);
            }
        }, 
        
        process: function (results, suggest) {
            var that = this, items, q;
            
            this.processSuggest(suggest);
            
            if (results.length && typeof results[0] != "string")
                this.strings = false;

            this.query = this.$element.val()

            if (!this.query) {
                return this.shown ? this.hide() : this;
            }

            items = $.grep(results, function (item) {
                if (!that.strings)
                    item = item[that.options.property];

                return item;
            });

            if (!items.length) {
                return this.shown ? this.hide() : this;
            };

            return this.render(items.slice(0, this.options.items)).show();
        },

        processSuggest: function(suggest) {
            /*if (suggest.length > 0) {
                this.$element.parent().find('.suggest').val(suggest[0]);
            } else {
                if (this.$element.parent().find('.suggest').val().indexOf(this.query) == -1) {
                    this.$element.parent().find('.suggest').val('');
                }
            }*/
        },
        
        suggest: function() {
            this.$element.val(this.$element.parent().find('.suggest').val());
        },
        
        render: function (items) {
            var that = this

            items = $(items).map(function (i, item) {
                i = $(that.options.item).attr('data-url', JSON.stringify(item.url));
                if (!that.strings)
                    item = item[that.options.property];
                i.html(item);
                return i[0];
            });

            this.$menu.html(items);
            return this;
        }, 
        
        next: function (event) {
            var active = this.$menu.find('.active').removeClass('active'), next = active.next();

            if (!next.length) {
                next = $(this.$menu.find('li')[0]);
            }

            next.addClass('active');
        }, 
        
        prev: function (event) {
            var hasActive = false;
            if (this.$menu.find('.active').length) {
                hasActive = true;
            }
            var active = this.$menu.find('.active').removeClass('active'), prev = active.prev();

            if (!prev.length && !hasActive) {
                prev = this.$menu.find('li').last();
            }

            prev.addClass('active');
        }, 
        
        listen: function () {
            this.$element
                .on('blur', $.proxy(this.blur, this))
                .on('keypress', $.proxy(this.keypress, this))
                .on('keyup', $.proxy(this.keyup, this))

            if ($.browser.webkit || $.browser.msie) {
                this.$element.on('keydown', $.proxy(this.keypress, this))
            }

            this.$menu
                //.on('click', $.proxy(this.click, this))
                .on('mouseenter', 'li', $.proxy(this.mouseenter, this))
        }, 
        
        keyup: function (e) {
            e.stopPropagation();
            e.preventDefault();
            
            switch(e.keyCode) {
                case 40: // down arrow
                case 38: // up arrow
                    break;

                case 27: // escape
                    this.hide();
                    break;
                
                case 13:
                    if (!this.shown) 
                        return;
                    
                    if (this.$menu.find('.active').length > 0)
                        this.select();
                    break;

                default:
                    var q = this.$element.val();
                    var self = this;
                    window.setTimeout(function() {
                        if (q == self.$element.val()
                            && self.$element.val() != self.query) {
                            self.lookup();
                        }
                    }, 333);
            }
        },

        keypress: function (e) {
            e.stopPropagation()
            if (!this.shown) 
                return;

            switch(e.keyCode) {
            case 13: // enter
                return;
            case 9: // tab
            case 27: // escape
                e.preventDefault();
                break;

            case 38: // up arrow
                e.preventDefault();
                this.prev();
                break;
            
            case 39: // right arrow
                e.preventDefault();
                this.suggest();
                break;
                
            case 40: // down arrow
                e.preventDefault();
                this.next();
                break;
            }
        }, 
        
        blur: function (e) {
            var that = this;
             e.stopPropagation();
             e.preventDefault();
             setTimeout(function () { that.hide() }, 150);
        }, 
        
        /*click: function (e) {
            e.stopPropagation();
            e.preventDefault();
            this.select();
        },*/
        
        mouseenter: function (e) {
            this.$menu.find('.active').removeClass('active');
            $(e.currentTarget).addClass('active');
        }
    }

    $.fn.typeahead = function (option) {
        return this.each(function () {
            var $this = $(this), 
            data = $this.data('typeahead'), 
            options = typeof option == 'object' && option
            if (!data) $this.data('typeahead', (data = new Typeahead(this, options)))
            if (typeof option == 'string') data[option]()
        })
    }

    $.fn.typeahead.defaults = {
        source: [], 
        items: 100, 
        menu: '<ul class="typeahead"></ul>', 
        item: '<li></li>',
        onselect: null, 
        property: 'value'
    }

    $.fn.typeahead.Constructor = Typeahead;

    $(function () {
        $('body').on('focus.typeahead.data-api', '[data-provide="typeahead"]', function (e) {
            var $this = $(this)
            if ($this.data('typeahead')) 
                return;
            e.preventDefault();
            $this.typeahead($this.data());
        });
    });
}( window.jQuery );