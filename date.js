$(function() {
	  $("input[type='date']").datepicker({
     dateFormat: "yy-mm-dd",yearRange: "-100:+0",changeMonth: true,changeYear: true,defaultDate:"2000-01-01"
    });
    $("input[type='date']").datepicker();
  });


