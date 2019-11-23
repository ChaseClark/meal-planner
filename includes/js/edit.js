(function ($) {
    $(function () {
        // hide drop downs and new sections by default
        $('.meal-selection .initial-hide').toggle();
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
                $(`#new${$(this).parent().parent().parent().attr('id')}`).hide();
            }
            if (this.value == '?'){
                // TODO: implement the form, wait for the database fields
                //$(`#ddl${$(this).parent().parent().parent().attr('id')}`).toggle();
                $(`#new${$(this).parent().parent().parent().attr('id')}`).show();
                //console.log(`#new${$(this).parent().parent().parent().attr('id')}`);
                $(`#name${$(this).parent().parent().parent().attr('id')}`).attr('required');
            }

            //console.log(this.value);
        });
    }); // end of document ready
})(jQuery); // end of jQuery name space