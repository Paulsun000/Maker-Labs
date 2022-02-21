$(document).ready(function(){
  $("#userinput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#allusers tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(document).ready(function(){
  $("#pendinput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#pendusers tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(document).ready(function(){
  $("#printerinput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#printers tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
