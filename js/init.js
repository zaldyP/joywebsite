(function($){
  $(function(){


 // $('select').material_select('destroy');

    $('.button-collapse').sideNav();

  	 $('#modal1').modal();  
     $('#modal2').modal();
     $('#modal3').modal();
       


  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 100, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    format: 'mmmm-dd-yyyy',
    closeOnSelect: false // Close upon selecting a date,
  });
        
  $('select').material_select();
 
 $('input#input_text, textarea#textarea1').characterCounter();

 $('.dropify').dropify();


   $('#genre').change(function(){
      $('#next').val("Next")
   });

  }); // end of document ready
 

  function finishAjax(id, response) {
  $('#usernameLoading').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
  }


 





})(jQuery); // end of jQuery name space