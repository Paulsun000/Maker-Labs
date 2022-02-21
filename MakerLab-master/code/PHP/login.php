<?php  
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "makerlab";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (isset($_POST['email']) and isset($_POST['password'])){

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM `users` WHERE email='$email' and password='$password'";
 
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);

if ($count == 1){
$_SESSION['email'] = $email;
}else{

$fmsg = "Invalid Login Credentials.";
}
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['email'])){
$email = $_SESSION['email'];
echo "Hey " . $email . "
";
echo "! Connect Account main home page here";
 
}else{
echo "Hello";
}
?>