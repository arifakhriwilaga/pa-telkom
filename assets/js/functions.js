var APP = APP || {};

(function ($) {
    // USE STRICT
    "use strict";
    
    APP.handleDatePicker = function (e) {
        var element = e ? e : "[data-datepicker=true]";
        $(element).each(function () {
            var options = {
                format: "YYYY-MM-DD",
                icons: {
                    time: 'fa fa-clock-o',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }
            };
            if ($(this).data('max')) {
                options.maxDate = $(this).data('max');
            }
            $(this).datetimepicker(options);
        });
    }

    APP.handleDateTimePicker = function (e) {
        var element = e ? e : "[data-datetimepicker=true]";
        $(element).each(function () {
            var options = {
                format: "YYYY-MM-DD HH:mm:00",
                icons: {
                    time: 'fa fa-clock-o',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }
            };
            if ($(this).data('max')) {
                options.maxDate = $(this).data('max');
            }
            $(this).datetimepicker(options);
        });
    }

    APP.datatables = function (container, options) {
        options.running = null;
        options.perpage = options.perpage || 10;
        options.page = options.page || 1;
        options.search = options.search || "";
        options.sort_by = options.sort_by || "";

        var $container = $(container);
        $container.addClass('datatables');
        $container.append('<div class="row datatables-toolbar">\n\
            <div class="col-md-3">\n\
                <div class="input-group datatables-rows">\n\
                    <span class="input-group-addon">Show</span>\n\
                    <select class="form-control">\n\
                        <option value="10">10</option>\n\
                        <option value="25">25</option>\n\
                        <option value="50">50</option>\n\
                        <option value="100">100</option>\n\
                    </select>\n\
                    <span class="input-group-addon">data</span>\n\
                </div>\n\
            </div>\n\
            <div class="col-md-3 col-md-offset-6">\n\
                <form class="input-group datatables-search">\n\
                    <input type="text" class="form-control" placeholder="Search for...">\n\
                    <span class="input-group-btn">\n\
                        <button class="btn btn-default"><i class="fa fa-search"></i></button>\n\
                    </span>\n\
                </form>\n\
            </div>\n\
        </div>\n\
        <div class="table-responsive"></div>\n\
        <div class="row datatables-pagination">\n\
            <div class="col-md-6">\n\
                <p class="datatables-info"></p>\n\
            </div>\n\
            <div class="col-md-6">\n\
                <nav aria-label="Page navigation">\n\
                    <ul class="pagination pull-right"></ul>\n\
                </nav>\n\
            </div>\n\
        </div>');
        $container
                .on('change', '.datatables-rows select', function () {
                    options.perpage = parseInt($(this).val());
                    options.page = 1;
                    loadData(container, options);
                })
                .on('submit', '.datatables-search', function (e) {
                    e.preventDefault();
                    options.page = 1;
                    options.search = $(this).find('input[type="text"]').val();
                    loadData(container, options);
                })
                .on('click', '.pagination a', function (e) {
                    e.preventDefault();
                    if (!$(this).parent().hasClass('active') && !$(this).parent().hasClass('disabled')) {
                        options.page = parseInt($(this).attr('data-page'));
                        loadData(container, options);
                    }
                })
                .on('click', '.datatables-sort a', function (e) {
                    e.preventDefault();
                    var field = $(this).parent().data('field');
                    var order = 'asc';
                    if ($(this).parent().find('.fa').hasClass('fa-sort-alpha-asc')) {
                        order = 'desc';
                    }
                    options.sort_by = field + " " + order;
                    loadData(container, options);
                });

        function loadData(container, options) {
            if (options.running !== null) {
                options.running.abort();
            }
            var $container = $(container);

            options.running = $.ajax({
                url: options.url,
                type: 'GET',
                data: {
                    perpage: options.perpage,
                    page: options.page,
                    search: options.search,
                    sort_by: options.sort_by
                },
                dataType: 'json',
                beforeSend: function () {
                    $container.find('.table-responsive').empty();
                    $container.find('.datatables-info')
                            .removeClass('text-danger')
                            .text('Loading...');
                    $container.find('.pagination').empty();
                },
                success: function (response) {
                    var msg = "";
                    if (response.count > 0) {
                        var no = ((response.page - 1) * response.perpage) + 1;
                        var start = no;
                        var sortBy = response.sort_by.split(" ");
                        var $table = $('<table/>', {
                            class: 'table table-striped table-hover table-bordered'
                        });

                        var $thead = $('<thead/>');
                        var $tr = $('<tr/>');
                        $('<th/>', {
                            text: 'No',
                            width: '1'
                        }).appendTo($tr);
                        $.each(options.columns, function (k, v) {
                            var $th = $('<th/>', {
                                'data-field': v.field,
                                class: 'datatables-sort'
                            });
                            if (typeof v.sortable !== 'undefined' && v.sortable) {
                                $('<a/>', {
                                    href: '#',
                                    html: v.caption,
                                    title: typeof v.title !== 'undefined' ? v.title : null
                                }).appendTo($th);
                                $('<i/>', {
                                    class: "fa " + (sortBy[0] === v.field ? (sortBy[1] === 'asc' ? 'fa-sort-alpha-asc' : 'fa-sort-alpha-desc') : 'fa-sort')
                                }).appendTo($th);
                            } else {
                                $th.html(v.caption);
                            }
                            $th.appendTo($tr);
                        });
                        if (typeof options.actions !== 'undefined') {
                            $('<th/>', {
                                text: 'Aksi'
                            }).appendTo($tr);
                        }
                        $tr.appendTo($thead);
                        $thead.appendTo($table);

                        var $tbody = $('<tbody/>');
                        $.each(response.data, function (k, v) {
                            $tr = $('<tr/>');
                            $('<td/>', {
                                text: no++
                            }).appendTo($tr);
                            $.each(options.columns, function (key, value) {
                                var content = v[value.field];
                                if (typeof value.formatter === 'function') {
                                    content = value.formatter(content, v);
                                }
                                $('<td/>', {
                                    html: content
                                }).appendTo($tr);
                            });
                            if (typeof options.actions !== 'undefined') {
                                var $btnGroup = $('<div/>', {
                                    class: 'btn-group btn-group-sm'
                                });
                                $.each(options.actions, function (key, value) {
                                    $('<button/>', {
                                        type: 'button',
                                        class: 'btn btn-link',
                                        html: value.caption
                                    })
                                            .appendTo($btnGroup)
                                            .click(function () {
                                                value.action(v);
                                            });
                                });
                                $('<td/>', {
                                    class: 'column-action'
                                })
                                        .append($btnGroup)
                                        .appendTo($tr);
                            }
                            $tr.appendTo($tbody);
                        });
                        $tbody.appendTo($table);

                        var maxPage = Math.ceil(response.count / response.perpage);
                        var startPage = response.page - 2;
                        var endPage = response.page + 2;
                        if (startPage < 1) {
                            startPage = 1;
                            endPage = startPage + 4 > maxPage ? maxPage : startPage + 4;
                        }
                        if (endPage > maxPage) {
                            endPage = maxPage;
                            startPage = endPage - 4 < 1 ? 1 : endPage - 4;
                        }
                        $('<li/>')
                                .append($('<a/>', {
                                    href: '#',
                                    'data-page': 1,
                                    html: '&laquo;'
                                }))
                                .appendTo($container.find('.pagination'));
                        for (var i = startPage; i <= endPage; i++) {
                            $('<li/>', {
                                class: i === response.page ? 'active' : ''
                            })
                                    .append($('<a/>', {
                                        href: '#',
                                        'data-page': i,
                                        text: i
                                    }))
                                    .appendTo($container.find('.pagination'));
                        }
                        $('<li/>')
                                .append($('<a/>', {
                                    href: '#',
                                    'data-page': maxPage,
                                    html: '&raquo;'
                                }))
                                .appendTo($container.find('.pagination'));

                        msg = "Showing <code>" + start.toString() + "</code> to <code>" + (--no).toString() + "</code> of <code>" + response.count.toString() + "</code> data";
                        $table.appendTo($container.find('.table-responsive'));
                    } else {
                        msg = "No Result";
                    }
                    $container.find('.datatables-info')
                            .removeClass('text-danger')
                            .html(msg);
                },
                error: function (jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 404) {
                        msg = 'Request page not found.';
                    } else if (jqXHR.status === 500) {
                        msg = 'Internal Server Error.';
                    } else if (exception === 'parsererror') {
                        msg = 'Request failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Request timeout';
                    } else if (exception === 'abort') {
                        msg = 'Request aborted.';
                    } else {
                        msg = "Error " + jqXHR.status.toString() + ": " + exception;
                    }

                    $container.find('.datatables-info')
                            .addClass('text-danger')
                            .text(msg);
                }
            });
        }

        loadData(container, options);
    };

    APP.isset = function () {
        var a = arguments,
                l = a.length,
                i = 0,
                undef;
        if (l === 0) {
            throw new Error('Empty isset');
        }

        while (i !== l) {
            if (a[i] === undef || a[i] === null) {
                return false;
            }
            i++;
        }
        return true;
    };

    APP.HTML = {
        running: {},
        Loader: function (container, options, callback) {
            var self = this;
            container = container.replace(/^#+/g, '');
            var $container = $("#" + container);

            // abort if widget loader is running
            if (APP.isset(self.running[container])) {
                self.running[container].abort();
            }

            options.data.container = container; // passing containerId to widget

            // run widget loader
            self.running[container] = $.ajax({
                url: site_url(options.url),
                type: 'GET',
                data: options.data,
                dataType: 'json',
                beforeSend: function () {
                    $container.empty();
                    $container.removeClass('text-danger')
                            .text('Loading...');
                    $container.find('.pagination').empty();
                },
                success: function (response) {
                    $('#' + container)
                            .empty()
                            .removeClass('loading');

                    $('#' + container)
                            .html(response.html);

                    if (typeof callback === "function") {
                        callback(response, '#' + container, options);
                    }
                },
                error: function (jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 404) {
                        msg = 'Request page not found.';
                    } else if (jqXHR.status === 500) {
                        msg = 'Internal Server Error.';
                    } else if (exception === 'parsererror') {
                        msg = 'Request failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Request timeout';
                    } else if (exception === 'abort') {
                        msg = 'Request aborted.';
                    } else {
                        msg = "Error " + jqXHR.status.toString() + ": " + exception;
                    }

                    $container.addClass('text-danger')
                            .text(msg);
                }
            });
        }
    };

    APP.WIDGET = {
        running: {},
        Loader: function (widgetName, options, callback) {
            var self = this;
            var container = options.container.replace(/^#+/g, '');
            // abort if widget loader is running
            if (APP.isset(self.running[container])) {
                self.running[container].abort();
            }

            // passing containerId to widget
            options.data.container = container;

            // run widget loader
            self.running[container] = $.ajax({
                url: site_url('widgets/' + widgetName),
                type: 'GET',
                data: options.data,
                dataType: 'json',
                beforeSend: function () {
                    $('#' + container)
                            .empty()
                            .addClass('loading')
                            .append($('<div/>', {class: 'spinner'}));
                },
                success: function (response) {
                    if (response.css) {
                        var url = base_url(response.css);
                        if (!$("link[href*='" + url + "']").length) {
                            $('<link/>', {
                                rel: 'stylesheet',
                                type: 'text/css',
                                href: url
                            }).appendTo('head');
                        }
                    }

                    $('#' + container)
                            .empty()
                            .removeClass('loading')
                            .html(response.html);

                    if (typeof callback === "function") {
                        callback(response, '#' + container, options.data);
                    }
                },
                error: function (jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 404) {
                        msg = 'Requested page not found.';
                    } else if (jqXHR.status === 500) {
                        msg = 'Internal Server Error.';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Request aborted.';
                    }

                    $('#' + container)
                            .empty()
                            .removeClass('loading')
                            .append($('<h4/>', {
                                align: 'center',
                                text: msg
                            }));
                }
            });
        },
        DataLoader: function (widgetName, data, callback) {
            $.ajax({
                url: site_url('widgets/' + widgetName + '/data'),
                type: "GET",
                dataType: "json",
                data: data,
                success: function (response) {
                    if (typeof callback === "function") {
                        callback(response);
                    }
                }
            });
        }
    };

    APP.formvalidation = function (e) {
        "use strict";
        var element = e ? e : "[data-formvalidation=true]";
        $(element).each(function () {
            $(this).bootstrapValidator({
                feedbackIcons: {
                    valid: 'fa fa-check',
                    invalid: 'fa fa-remove',
                    validating: 'fa fa-refresh'
                }
            });
        });
    }

    APP.createModal = function (tag, options) {
        var t = tag || 'div';
        var o = options || {};
        var modal = $('<' + tag + '/>', o)
                .addClass('modal fade')
                .attr('tabindex', '-1')
                .attr('role', 'dialog')
                .append($('<div/>', {
                    class: 'modal-dialog',
                    role: 'document'
                }).append($('<div/>', {
                    class: 'modal-content'
                }).append($('<div/>', {
                    class: 'modal-header',
                    html: '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
                }).append($('<h4/>', {
                    class: 'modal-title',
                    text: 'Modal Title'
                }))).append($('<div/>', {
                    class: 'modal-body'
                }))));
        return modal;
    }

    APP.documentOnReady = {
        init: function () {
            APP.formvalidation();
        }
    };

    var $document = $(document);

    // on document ready
    $document.ready(APP.documentOnReady.init);
})(jQuery);