$(document).ready(function() {
    $('#login-form').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: "do_login",
            type: "post",
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response?.status == "success") {
                    window.location.href = window.location.origin;
                } else {
                    toastr.error(response.message);
                }
            }
        });
    
        return false;
    });
});