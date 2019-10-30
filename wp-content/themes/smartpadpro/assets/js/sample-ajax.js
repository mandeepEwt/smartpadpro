jQuery(document).ready(function($) {
    $.ajax({
        url: ajaxurl,
        type: 'GET',
        dataType: 'json',
        data: {
            action: 'sample'
        },
        success: function(data) {
            console.log(data);
        }
    });
});