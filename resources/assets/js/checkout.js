$(document).ready(function() {
    $('#section-cart-summary').css('display', 'block');

    $('#cart-summary').on('click', function(e) {
        $('#section-cart-summary').css('display', 'block');
        $('#section-customer-info').css('display', 'none');
    });

    $('#customer-info').on('click', function(e) {
        $('#section-cart-summary').css('display', 'none');
        $('#section-customer-info').css('display', 'block');
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': window.Laravel.csrfToken
        }
    });

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

    $('#form-checkout input').keyup(function() {
        var empty = false;

        $('#form-checkout input').not('#special_request').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });

        if (empty) {
            $('.btn-checkout').attr('disabled', 'disabled');
        } else {
            $('.btn-checkout').removeAttr('disabled');
        }
    });

    $('#form-checkout').on('submit', function(e) {
        e.preventDefault();

        var self = $(this);
        var url = window.Laravel.baseUrl + '/api/v1/orders';
        var redirect_url = 'https://www.messenger.com/closeWindow/?image_url=' + window.Laravel.baseUrl + '/img/checkout-success.png&display_text=Thanks for your purchase.'

        $('.form-group').removeClass('has-error');
        $('.help-block').remove();
        $('.btn-checkout').attr('disabled', 'disabled');

        makeApiCall('POST', url, self.serialize(), function(response) {
            if (response.status == 'success') {
                window.location = redirect_url;
            }

            if (response.status == 'error') {
                sweetAlert({
                    'title': 'Ah!',
                    'text': response.message,
                    'type': 'error'
                });
            }
        }, function(response) {
            if (response.status = 422) {
                var errorString = '';

                $.each(response.responseJSON, function(key, error) {
                    errorString = errorString + '<p>' + error + '</p>';
                });

                sweetAlert({
                    'title': 'Error!',
                    'text': errorString,
                    'html': true,
                    'type': 'error'
                });
            }

            $('.btn-checkout').removeAttr('disabled');
        });

        return false;
    });
});