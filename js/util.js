var util = {
    isDeveloperMode: false,
        
    loaderOpacity: 0.8,
    loaderImage:  '/skin/frontend/cann/v1/images/loader.gif',
    loaderBackground: '#fff',
    loaderImageWidth: 40,
    loaderImageHeight: 40,
    
    demoMessage: 'Функция находится на этапе разработки',
    
    processEnable: true,
    processClass: 'g-loader',
    
    ajaxReqeust: [],
    
    load: function(source, data, callback, args)
    {
        var self = this;
        
        var def = {
            responseType : 'json',
            requestType  : 'POST',
            loader       : false,
            abortAll     : false
        };
        
        var def = jQuery.extend({}, def, args);
        
        if (def.abortAll && util.ajaxReqeust[source] != undefined) {
            _.each(util.ajaxReqeust[source], function(request) {
                request.abort();
            });
        }
        if (typeof(currentHandle) !== undefined) {
            data.current_handle = currentHandle;
        }
        
        var request = jQuery.ajax({
            url      : source,
            data     : data,
            dataType : def.responseType,
            type     : def.requestType,
            success  : function(response, textStatus, jqXHR) {
                if (!jQuery.isPlainObject(response)) {
                    response = {};
                }
                if (response.success == undefined) {
                    response.success = false;
                }
                if (response.messages == undefined) {
                    response.messages = {};
                }

                if (response.messages.success == undefined) {
                    response.messages.success = [];
                }
                if (response.messages.error == undefined) {
                    response.messages.error = [];
                }

                if (typeof callback !== 'undefined') {
                    callback.call(self, response, jqXHR.uniqKey);
                }
                util.trigger('util@afterload', response);
            },
            error : function(jqXHR, error) {
                response = {};
                response.success = false;
                if (typeof callback !== 'undefined') {
                    callback.call(self, response, jqXHR.uniqKey);
                }
            },
            complete : function(jqXHR, textStatus) {
                
                delete util.ajaxReqeust[source][jqXHR.uniqKey];
                
                if (jqXHR.status === 404 || jqXHR.status === 500) {
                    util.process('An error has occured while communicating with server.', jqXHR.uniqKey);
                } else {
                    util.process(null, jqXHR.uniqKey);
                }
                
                if (def.loader) {
                    util.loader(def.loader, false);
                }
            },
            beforeSend : function(jqXHR, settings) {
                if (def.loader) {
                    util.loader(def.loader);
                }
                jqXHR.uniqKey = Math.floor(Math.random() * 100000);
                util.process('Загрузка...', jqXHR.uniqKey);
            }          
        });
        
        if (util.ajaxReqeust[source] == undefined) {
            util.ajaxReqeust[source] = {};
        }
        util.ajaxReqeust[source][request.uniqKey] = request;
    },
    
    process: function(message, key)
    {   
        if (util.processEnable) {
            if (message != null) {
                jQuery(util.processClass).fadeIn(500);
            } else {
                jQuery(util.processClass).fadeOut(100);
            }
        }
    },
    
    loader: function(element, status)
    {
        element = jQuery(element);
        
        if (element.length && (status || status == undefined)) {
            
            if (jQuery('.utilloader', element).length == 1) {
                var loader = jQuery('.utilloader', element);
                loader.attr('data-utilloader', parseInt(loader.attr('data-utilloader')) + 1);
                return;
            }

            // check scrollbar
            if (element.get(0).scrollWidth + 1 >= element.innerWidth()) {
                element.data('overflow-x', element.css('overflow-x'));
                element.css('overflow-x', 'hidden');
            }
            if (element.get(0).scrollHeight + 1>= element.innerHeight()) {
                element.data('overflow-y', element.css('overflow-y'));
                element.css('overflow-y', 'hidden');
            }
            
            var width  = element.outerWidth();
            var height = element.outerHeight();
            var top    = -parseFloat(element.css('border-top'));
            var left   = -parseFloat(element.css('border-left'));

            if (isNaN(top)) {
                top = 0;
            }

            if (isNaN(left)) {
                left = 0;
            }

            if (jQuery.browser.mozilla) {
                top -= 1;
                left -= 1;
            }
            
            var loader = jQuery('<div/>').addClass('utilloader')
                .css('position', 'absolute')
                .css('background', util.loaderBackground)
                .css('width', width)
                .css('height', height)
                .css('top', top)
                .css('left', left)
                .css('z-index', '10000')
                .css('opacity', util.loaderOpacity)
                .css('border-radius', element.css('border-radius'))
                .attr('data-utilloader', 1);
            
            var imgW = util.loaderImageWidth;
            var imgH = util.loaderImageHeight;
            
            if (loader.height() < imgH) {
                imgH = imgW = loader.height();
            }
            
            var img = jQuery('<img/>').attr('src', util.loaderImage)
                .css('position', 'absolute')
                .css('top', loader.height() / 2 - imgH / 2)
                .css('left', loader.width() / 2 - imgW / 2)
                .css('width', imgW)
                .css('height', imgH);
            loader.append(img);
            
            if (element.css('position') != 'relative' && 
                    element.css('position') != 'absolute' && 
                    element.css('position') != 'fixed') {
                element.css('position', 'relative');
            }
            jQuery(element).append(loader);
        } else {
            var loader = jQuery('.utilloader', element);
            element.css('overflow-x', element.data('overflow-x'));
            element.css('overflow-y', element.data('overflow-y'));
            
            if (loader.attr('data-utilloader') == 1) {
                loader.remove();
            } else {
                loader.attr('data-utilloader', parseInt(loader.attr('data-utilloader')) - 1);
            }
        }     
    },

    setMessages: function(messages, placeholder)
    {
        placeholder = jQuery(placeholder);
        util.clearMessages(placeholder);

        if (messages == undefined) {
            return;
        }

        if (messages.error != undefined && messages.error.length > 0) {
            var ul = jQuery('<ul/>').addClass('errors');
            _.each (messages.error, function (error) {
                var li = jQuery('<li/>').text(error);
                ul.append(li);
            });
            placeholder.append(ul);
        }

        if (messages.success != undefined && messages.success.length > 0) {
            var ul = jQuery('<ul/>').addClass('success');
            _.each (messages.success, function (error) {
                var li = jQuery('<li/>').text(error);
                ul.append(li);
            });
            placeholder.append(ul);
        }
    },

    clearMessages: function (placeholder)
    {
        jQuery(placeholder).html('');
    },

    trigger: function(eventType, params)
    {
        jQuery('body').trigger(eventType, params);
    },
    
    on: function(eventType, callback)
    {
        jQuery('body').on(eventType, callback);
    },
    
    backdrop: function(element, callback)
    {
        var method = function(e) {
                if (jQuery(element).find(e.target).length == 0) {
                    callback();
                    jQuery('body').off('click', method);
                }
            };
        setTimeout(function() {
            jQuery('body').click(method);
        }, 10);
    },
    
    focus: function(element)
    {
        jQuery(element).find('input[type=text]').focus();
    },
    
    demo: function()
    {
        alert(util.demoMessage);
    },
    
    pr: function(object)
    {
        alert(JSON.stringify(object));
    },
    
    alert: function(object)
    {
        if (typeof(object) == 'string') {
            alert(object);
        } else {
            alert(object.join(',')); 
        }
    },

    aline: function (selector)
    {
        var max = 0;

        _.each (jQuery(selector), function (item) {
            if (max < jQuery(item).height()) {
                max = jQuery(item).height();
            }
        });

        if (max > 0) {
            jQuery(selector).height(max);
            jQuery(selector).removeAttr('data-aline');
        }

        return max;
    },

    scrollTo: function(element)
    {
        jQuery(window).scrollTop(jQuery(element).offset().top);
    },

    alert: function (title, content)
    {
        var html = "<div class='modal hide'>";
        html += "<div class='modal-header'>";
        html += "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
        html += "<h3>" + title + "</h3>";
        html += "</div>";
        html += "<div class='modal-body'>";
        html += content;
        html += "</div>";
        html += "</div>";

        jQuery(html).modal();
    }
};

window.onerror = function(msg, url, line) {
    if (util.isDeveloperMode) {
        alert('Javascript error: ' + msg + ' : ' + url + ' : ' + line);
    }
};

// aline elements with data-aline="key"
jQuery(function() {
    util.on('area@afterRefresh', aline);

    function aline()
    {
        var aline = {};
        var max   = 0;

        _.each (jQuery('[data-aline]'), function(el) {
            el = jQuery(el);

            var al  = el.attr('data-aline');
            var len = el.parents().length;

            if (aline[len] == undefined) {
                aline[len] = {};
            }

            aline[len][al] = al;

            if (len > max) {
                max = len;
            }
        });

        for (var i = max; i > 0; i--) {
            if (aline[i] != undefined) {
                _.each (aline[i], function(val) {
                    util.aline('[data-aline="' + val + '"]');
                });
            }
        }
    }
});