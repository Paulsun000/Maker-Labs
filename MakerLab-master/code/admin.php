<?php 

	session_start(); 
	if (!isset($_SESSION['email'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: index.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['email']);
		header("location: index.php");
	}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Maker Lab | Admin panel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="icon" href="images\icon.png" type="image/gif" sizes="16x16">
	<script src="admin.js"></script>
	<link rel="stylesheet" href="admin.css">
	
</head>
<body>

<div id="head">
<div class="background_upper">
	<div class="upper">
		
		<!--CAMS LOGO -->
		<div class="container"> 
			<div class = "thumbnail" >

				<img src="images/cams.png" class="img-responsive" align="left">

			</div>
		</div>
	</div>	
</div>
		<div id ="greeting"; class="content">
			<?php  if (isset($_SESSION['email'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['email']; ?></strong></p>
			<?php endif ?>
		</div>

		<?php  if (isset($_SESSION['email'])) : ?>
			<div id="logout">
						<button style="margin:10px;" type="button" 
								class="btn btn-danger btn-lg" >
								<a id="loglink" href="index.php?logout='1'"><strong>Logout</strong></a>
						</button>
			</div>
		<?php endif ?>	
		
		</div>
<div class="container">


  <!-- Nav pills -->
  <ul class="nav nav-pills nav-fill" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="pill" href="#users">All Users</a>
    </li>
	    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#pending">Pending Users</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#printers">Printers</a>
    </li>
	<li class="nav-item">
      <a class="nav-link disabled" data-toggle="pill" href="#report">Report (Coming Soon)</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div  class="tab-content">
    <div id="users" class="container tab-pane active"><br>
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

$sql = "SELECT lewisID, Fname, lname, email, status FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
		
		echo "<div class='container'>";
		echo "<div class='page-header'>";
		echo "<center><h1>All Users</center></h1>
		</div>";
		echo "<input class='form-control' id='userinput' type='text'
		placeholder='Search All Users'> <br> <hr>";
		echo "<table class='table'>
		<thead class='thead-dark'>
		<tr>
		<th>Lewis </th>
		<th>First Name </th>
		<th>Last Name </th>
		<th>Email </th>
		<th>Status </th>
		</tr>
		</thead>
		<tbody id='allusers'>";
		
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr>";
        echo "<td>". $row["lewisID"]. "</td> <td>" .$row["Fname"]. "</td> <td>" . $row["lname"] . "</td> <td>" .$row["email"]. "</td> <td>" .$row["status"]. "</td>";
    }echo " </tr></tbody></table> </div>";
} else {
    echo "0 results";
}

$conn->close();
?> 
    </div>
	
	    <div id="pending" class="container tab-pane fade"><br>
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

$sql = "SELECT lewisID, Fname, lname, email, status FROM users WHERE status='Pending'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

		echo "<div class='container'>";
		echo "<div class='page-header'>";
		echo "<center><h1>Pending Users</center></h1>
		</div>";
		echo "<input class='form-control' id='pendinput' type='text'
		placeholder='Search Pending Users'> <br> <hr>";
		echo "<table class='table'>
		<thead class='thead-dark'>
		<tr>
		<th>Lewis </th>
		<th>First Name </th>
		<th>Last Name </th>
		<th>Email </th>
		<th>Status </th>
		<th>Action </th>
		</tr>
		</thead>
		<tbody id='pendusers'>";
		
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr>";
        echo "<td>". $row["lewisID"]. "</td> <td>" .$row["Fname"]. "</td> <td>" . $row["lname"] . "</td> <td>" .$row["email"]. "</td> <td>" .$row["status"]. " 
		   </td> <td>  <div class='container'>
	<button type='button' class='btn btn-outline-primary'>Approve</button>
	<button onclick='confirmreject()' type='button' class='btn btn-outline-danger'>Reject</button>
		</div> </td>";
	}echo " </tr></table> </div>";
echo "<script>
function confirmreject() {
    var txt;
  var r = confirm('Are you sure you want to Reject this user request?');
  if (r == true) {
	txt = alert('Account Deleted!');
} else {
    txt = alert('Operation camcelled');
  }
}
</script>";
} else {
    echo "0 results";
}

$conn->close();
?> 
    </div>
	
    <div id="printers" class="container tab-pane fade"><br>
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

$sql = "SELECT printerID, pname, pmodel, pimage, status FROM printers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
		
		echo "<div class='container'>";
		echo "<div class='page-header'>";
		echo "<center><h1>3D Printers</center></h1>
		</div>";
		echo "<input class='form-control' id='printerinput' type='text'
		placeholder='Search 3D Printers'>
		<br> <hr>";
		echo "<table class='table'>
		<thead class='thead-dark'>
		<tr>
		<th>Printer ID </th>
		<th>Printer Name </th>
		<th>Printer Model </th>
		<th>Printer Image </th>
		<th>Printer Status </th>
		<th>Action</th>
		</tr>
		</thead>
		<tbody id='printers'>";
		
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr text-align:right;'>";
        echo 
		"<td>" .$row["printerID"]. "</td>
		 <td>" .$row["pname"]. "</td>
		 <td>" .$row["pmodel"] . "</td>
		 <td>" .$row["pimage"]. "</td>
		 <td>" .$row["status"] . "</td>
		 <td> <button type='button' class='btn btn-outline-secondary'>Edit Printer</button></td>";
    }echo " </tr></tbody></table> </div>";
} else {
    echo "0 results";
}

$conn->close();
?> 

    <div class="container">
	  <button type="button" class="btn btn-primary btn-lg">Add a 3D Printer</button>
	</div>  
</div>

	    <div id="report" class="container tab-pane fade"><br>
    
		</div>
	
  </div>
</div>

</body>
</html>
