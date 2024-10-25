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
        },
        error: function(xhr) {
            console.error('Error fetching dark mode preference:', xhr);
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
                dark_mode: darkModeEnabled ? 1 : 0, 
                _token: window.csrfToken
            },
            success: function(response) {
                console.log(response.message);
            },
            error: function(xhr) {
                console.error('Error toggling dark mode:', xhr.responseJSON);
            }
        });
    });
});
