$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': window.Laravel.csrfToken
        }
    });

    // Ajax wrapper
    window.makeApiCall = function(type, url, data, callbackSuccess, callbackError) {
        $.ajax({
            url: url,
            type: type,
            data: data,
            dataType: "json",
            success: function(response) {
                callbackSuccess(response);
            },
            error: function(response) {
                callbackError(response);
            }
        });
    }

    window.log = function(value) {
        console.debug(value);
    }

    // Delete the resource
    $(document).on('click', '.btn-delete', function(e) {
        var self = $(this);

        makeApiCall('DELETE', self.data('url'), {}, function(response) {
            if (response.hasOwnProperty('reload')) {
                window.location.reload();
            }
        });
    });

    // iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    });

    // Timepicker
    $(".timepicker").timepicker({
        minuteStep: 1,
        secondStep: 5,
        showInputs: false,
        showSeconds: false,
        showMeridian: false
    });

    // Popover
    $('[data-toggle="popover"]').popover();

    // Date picker
    $('#order-datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    }).on('changeDate', function(e) {
        window.location.href = '/shop/orders?date=' + $('#order-datepicker').val()
    });

    // Report date range picker
    var reportDateRangePicker = $('#report-daterange-picker');
    if (reportDateRangePicker.length > 0) {
        reportDateRangePicker.daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
            opens: 'right',
            dateLimit: {
                days: 30
            }
        });

        reportDateRangePicker.data('daterangepicker').setStartDate(reportDateRangePicker.data('start'));
        reportDateRangePicker.data('daterangepicker').setEndDate(reportDateRangePicker.data('end'));

        reportDateRangePicker.on('apply.daterangepicker', function(ev, picker) {
            var start_date = picker.startDate.format('YYYY-MM-DD');
            var end_date = picker.endDate.format('YYYY-MM-DD')

            window.location.href = '/shop/reports?start_date=' + start_date + '&end_date=' + end_date;
        });
    }

    // Load Ajax Modal
    $('.load-ajax-modal').on('click', function(e) {
        var self = $(this);

        makeApiCall('GET', self.data('url'), {}, function(response) {
            if (response.hasOwnProperty('html')) {
                $('.modal-dialog').html(response.html);

                $('#custom-modal').modal({
                    show: true
                });
            }
        });
    });

    // Update the order
    $(document).on('submit', '#form-update-order', function(event) {
        event.preventDefault();
        var self = $(this);

        makeApiCall('POST', self.attr('action'), self.serialize(), function(response) {
            if (response.status == 'success') {
                window.location.reload();
            }
        });
    });

    var getChartData = function() {
        makeApiCall('GET', '/shop/reports/dailySummary', {}, function(response) {
            renderChart(response);

            $('#index-orders-total').html(response.today_orders);
            $('#index-sales-total').html(response.today_sales);
        })
    }

    var renderChart = function(chartData) {
        var barChartDataOrders = {
            labels: chartData.days,
            datasets: [{
                fillColor: "#00a65a",
                strokeColor: "#00a65a",
                pointColor: "#f56954",
                pointStrokeColor: "#c1c7d1",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: chartData.orders
            }]
        };

        var barChartDataSales = {
            labels: chartData.days,
            datasets: [{
                fillColor: "#00a65a",
                strokeColor: "#00a65a",
                pointColor: "#f56954",
                pointStrokeColor: "#c1c7d1",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: chartData.sales
            }]
        };

        var barChartOptions = {
            scaleBeginAtZero: true,
            scaleShowGridLines: true,
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleGridLineWidth: 1,
            scaleShowHorizontalLines: false,
            scaleShowVerticalLines: false,
            barShowStroke: true,
            barStrokeWidth: 2,
            barValueSpacing: 5,
            barDatasetSpacing: 1,
            responsive: true,
            maintainAspectRatio: true,
            showTooltips: false
        };

        var barChartOrderCanvas = $("#chart-orders").get(0).getContext("2d");
        var barChartOrder = new Chart(barChartOrderCanvas);

        var barChartSalesCanvas = $("#chart-sales").get(0).getContext("2d");
        var barChartSales = new Chart(barChartSalesCanvas);

        barChartOptions.datasetFill = false;
        barChartOrder.Bar(barChartDataOrders, barChartOptions);

        barChartOptions.datasetFill = false;
        barChartSales.Bar(barChartDataSales, barChartOptions);
    }

    if ($('#page-dashboard').length > 0) {
        getChartData();
    }

    if ($('#fileupload-logo').length > 0) {
        $('#fileupload-logo').fileupload({
            dataType: 'json',
            add: function(e, data) {
                $('#progress_upload_logo .bar').show();
                data.context = $('<p/>').text('Uploading...').appendTo('#progress_upload_logo');
                data.submit();
            },
            done: function(e, data) {
                if (data.result.status == 'success') {
                    $('#image-logo-url').attr('src', data.result.logo_url);
                    $('#progress_upload_logo > p').text('Uploading...').remove();
                    $('#progress_upload_logo .bar').hide();
                    $('#progress_upload_logo p').hide();
                }
            },
            progressall: function(e, data) {
                var progress = parseInt((data.loaded / (data.total * 2)) * 100, 20);
                $('#progress_upload_logo .bar').width(progress + '%').height(3);
            },
            error: function(data) {
                alert(data.responseJSON.file[0]);
            }
        });
    }

    if ($('#fileupload-banner').length > 0) {
        $('#fileupload-banner').fileupload({
            dataType: 'json',
            add: function(e, data) {
                $('#progress_upload_banner .bar').show();
                data.context = $('<p/>').text('Uploading...').appendTo('#progress_upload_banner');
                data.submit();
            },
            done: function(e, data) {
                if (data.result.status == 'success') {
                    $('#image-banner-url').attr('src', data.result.banner_url);
                    $('#progress_upload_banner > p').text('Uploading...').remove();
                    $('#progress_upload_banner .bar').hide();
                    $('#progress_upload_banner p').hide();
                }
            },
            progressall: function(e, data) {
                var progress = parseInt((data.loaded / (data.total * 2)) * 100, 20);
                $('#progress_upload_banner .bar').width(progress + '%').height(3);
            },
            error: function(data) {
                alert(data.responseJSON.file[0]);
            }
        });
    }

    if ($('#fileupload').length > 0) {
        $('#fileupload').fileupload({
            dataType: 'json',
            add: function(e, data) {
                $('#progress_upload .bar').show();
                $('#btn-save').attr('disabled', true);
                data.context = $('<p/>').text('Uploading...').appendTo('#progress_upload');
                data.submit();
            },
            done: function(e, data) {
                if (data.result.status == 'success') {
                    $('#image-url').attr('src', data.result.image_url);
                    $('#image').val(data.result.image);
                    $('#progress_upload > p').text('Uploading...').remove();
                    $('#progress_upload .bar').hide();
                    $('#progress_upload p').hide();
                    $('#btn-save').attr('disabled', false);
                }
            },
            progressall: function(e, data) {
                var progress = parseInt((data.loaded / (data.total * 2)) * 100, 20);
                $('#progress_upload .bar').width(progress + '%').height(3);
            },
            error: function(data) {
                alert(data.responseJSON.file[0]);
            }
        });
    }

    $('.select2').select2();

    // Pusher
    var pusher = new Pusher(window.Laravel.pusherAppKey, {
        cluster: 'us2',
        encrypted: true
    });

    // Make sound
    var playSound = function() {
        var audio = new Audio($('#order-beep').html());
        var counter = 0;

        audio.addEventListener('ended', function() {
            counter++;

            if (counter == 5) {
                return false;
            }

            this.currentTime = 0;
            this.play();

        }, false);

        audio.play();
    }

    var channel = pusher.subscribe('shop.' + Laravel.shop_id);

    channel.bind("App\\Events\\OrderWasReceived", function(data) {
        swal("You have received a new order!", '', "info")

        playSound();

        if ($('#page-dashboard').length) {
            getChartData();
        }

        if ($('#page-orders').length) {
            window.location.reload();
        }
    });
});