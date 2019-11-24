(function ($) {
    $(function () {
      // Date Picker
      var options = {
        defaultDate: new Date(),
        setDefaultDate: true,
        format: "yyyy-mm-dd"
      };
      var elems = document.querySelector('#date');
      var dpInstance = M.Datepicker.init(elems, options);

      $("#date").change(function () {
        window.location.replace(`edit.php?meals_id=0&date=${dpInstance.toString()}`);
      });
  
    }); // end of document ready
  })(jQuery); // end of jQuery name space
  