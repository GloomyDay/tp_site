$(document).ready(function(){
    $.ajax({
        type: 'GET',
        url: '../php_scripts/table_navigate_handler.php',
        success: function(response) {
            window.location.href="http://google.com";
        },
        error: function(response) {
            window.location.href="http://google.com";
        }
    });
});