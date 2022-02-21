//Validate Register form

function validateForm(email) {
  var fname = document.forms["register"]["fname"].value;
  var lname = document.forms["register"]["lname"].value;
  var lewisID = document.forms["register"]["lewisID"].value;
  var email = document.forms["register"]["email"].value;
  var password_1 = document.forms["register"]["password_1"].value;
  var password_2 = document.forms["register"]["password_2"].value;

	if (fname == "") {
    alert("Please enter your first name");
    return false;
  }
    if (lname == "") {
    alert("Please enter your last name");
    return false;
  }
    if (lewisID == "") {
    alert("Please enter your LEWIS ID");
    return false;
  }
	if (email == "") {
	alert("You must use your Lewis email address (@lewisu.edu)");
	return false;
  }	
    if (password_1 == "") {
    alert("Please create a password");
    return false;
  }
    if (password_2 == "") {
    alert("Please re-type the password to confirm it");
    return false;
  }
    if (password_1 !== password_2) {
    alert("Password DO NOT match");
    return false;
  }
	if (document.getElementById('agree').checked) { 
	return true; 
  } else {
	alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy');
	return false; 
  }
} 