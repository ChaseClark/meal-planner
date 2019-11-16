(function ($) {
    $(function () {
        $("#dropdown").hide();
        // Date Picker
        $("#btnBreakfast").click(function () {
            $("#btnBreakfast").hide(300, function() {
                $("#dropdown").show();
            });
        });
    }); // end of document ready
})(jQuery); // end of jQuery name space
