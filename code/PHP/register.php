<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "makerlab";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

	if(isset($_POST['lewisID']) 
		&& isset($_POST['fname']) 
		&& isset($_POST['lname']) 
		&& isset($_POST['email'])
		&& isset($_POST['password'])) {
		$lewisID = $_POST['lewisID'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$hashed_password = password_hash("$password", PASSWORD_DEFAULT);

$sql = "INSERT INTO 
		users (lewisID, 
				fname, 
				lname, 
				email, 
				password)
							
		VALUES ('$lewisID', 
				'$fname', 
				'$lname', 
				'$email', 
				'$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo file_get_contents("success.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
		}
$conn->close();


?>
