$(document).ready(function(){
  $("#printerinput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#printers tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});