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
                $(`#name${$(this).parent().parent().parent().attr('id')}`).attr('required', false);
                $(`#ingredients${$(this).parent().parent().parent().attr('id')}`).attr('required', false);
                $(`#calories${$(this).parent().parent().parent().attr('id')}`).attr('required', false);
            }
            if (this.value == -1){
                // TODO: implement the form, wait for the database fields
                //$(`#ddl${$(this).parent().parent().parent().attr('id')}`).toggle();
                $(`#new${$(this).parent().parent().parent().attr('id')}`).show();
                //console.log(`#name${$(this).parent().parent().parent().attr('id')}`);
                $(`#name${$(this).parent().parent().parent().attr('id')}`).attr('required', true);
                $(`#ingredients${$(this).parent().parent().parent().attr('id')}`).attr('required', true);
                $(`#calories${$(this).parent().parent().parent().attr('id')}`).attr('required', true);
            }
            else {
                // one of the drop down items are selected
                $(`#new${$(this).parent().parent().parent().attr('id')}`).hide();
                $(`#name${$(this).parent().parent().parent().attr('id')}`).attr('required', false);
                $(`#ingredients${$(this).parent().parent().parent().attr('id')}`).attr('required', false);
                $(`#calories${$(this).parent().parent().parent().attr('id')}`).attr('required', false);
            }

            //console.log(this.value);
        });
    }); // end of document ready
})(jQuery); // end of jQuery name space