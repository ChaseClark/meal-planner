(function ($) {
    $(function () {
        // hide drop downs by default
        $('.meal-selection .input-field').toggle();
        // toggle both items when button is clicked
        $('.meal-selection .btn').click(function() {
            $(`#btn${$(this).parent().attr('id')}`).toggle();
            $(`#ddl${$(this).parent().attr('id')}`).toggle();
        });
        // toggle both items when 'None' is selected
        $('select').change(function (){
            if (this.value == 0){
                $(`#btn${$(this).parent().parent().parent().attr('id')}`).toggle();
                $(`#ddl${$(this).parent().parent().parent().attr('id')}`).toggle();
            }
            console.log(this.value);
        });
    }); // end of document ready
})(jQuery); // end of jQuery name space