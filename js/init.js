(function($){
  $(function(){
    M.AutoInit();

    // Date Picker
    var options = {
      defaultDate: new Date(),
      setDefaultDate: true
    };
    var elems = document.querySelector('#date');
    var instance = M.Datepicker.init(elems, options);
    // current date stored in instance.toString() - need to add event listener for when date changes
    console.log(instance.toString());

  }); // end of document ready
})(jQuery); // end of jQuery name space
