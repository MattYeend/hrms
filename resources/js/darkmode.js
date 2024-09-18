import $ from 'jquery';
$(document).ready(function() {
    window.csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: '/get-dark-mode-preference',
        method: 'GET',
        success: function(response) {
            if (response.dark_mode) {
                $('body').addClass('dark-mode');
                $('#dark-mode-toggle').prop('checked', true);
            }
        }
    });

    $('#dark-mode-toggle').on('change', function() {
        var darkModeEnabled = $(this).is(':checked');
        if (darkModeEnabled) {
            $('body').addClass('dark-mode');
        } else {
            $('body').removeClass('dark-mode');
        }

        $.ajax({
            url: '/toggle-dark-mode',
            method: 'POST',
            data: {
                dark_mode: darkModeEnabled,
                _token: window.csrfToken
            },
            success: function(response) {
                console.log(response.message);
            }
        });
    });
});
