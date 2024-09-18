import $ from 'jquery';
$(document).ready(function() {
    // Apply the dark mode on page load if the user has dark mode enabled
    if (window.darkModeEnabled) {
        $('body').addClass('dark-mode');
    }

    // Toggle dark mode when the switch is clicked
    $('#dark-mode-toggle').on('change', function() {
        var darkModeEnabled = $(this).is(':checked');
        if (darkModeEnabled) {
            $('body').addClass('dark-mode');
        } else {
            $('body').removeClass('dark-mode');
        }

        // Send the preference to the server via AJAX
        $.ajax({
            url: '/toggle-dark-mode', // Adjusted for absolute path
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
