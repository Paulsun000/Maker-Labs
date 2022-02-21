<!--- 
File name: active.php
Description: This will display for active users only. it shows calendar and other
tabs for user to work with
 -->

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
	<title>Maker Lab | User panel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="icon" href="images\icon.png" type="image/gif" sizes="16x16">
	<script src="main.js"></script>
	<link rel="stylesheet" href="active.css">
	
	<!-- Calendar files-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
	<script src="cal_Script.js"></script>

</head>
<body>

<div id="head">
		<div class="background_upper">
			<div class="upper">
				<!--CAMS LOGO -->
				<div class="container"> 
					<div class="thumbnail" >
						<img src="images/cams.png" 
						class="img-responsive">
					</div>
				</div>
			</div>	
		</div>
		<div id ="greeting"; class="content">
			<?php  if (isset($_SESSION['email'])) : ?>
			<p><strong>Welcome <?php echo $_SESSION['email']; ?></strong></p>
			<?php endif ?>
		</div>

		<?php  if (isset($_SESSION['email'])) : ?>
			<div id="logout">
						<button style="margin:10px;" type="button" 
								class="btn btn-outline-danger btn-lg" >
								<a id="loglink" href="index.php?logout='1'"><strong>Logout</strong></a>
						</button>
			</div>
		<?php endif ?>				
</div>		
		
<div class="container">

  <!-- Nav tabs -->
  <ul class="nav nav-pills nav-fill">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="pill" href="#Calendar">
	  Calendar</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#MyProfile">
	  My Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#Activity">
	  Activity</a>
    </li>
	<li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#Printers">
	  Printers</a>
    </li>
	<li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#Support">
	  Support</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="Calendar" class="container tab-pane active"> <br>
		<div class="main-form2" style="background-color:white;">
		   <br/>
			<div id="calendar" style="padding: 25px;"></div>
		   <br/>
		</div>
    </div>
	
				<!-- MyProfile Tab panes -->
	<div id="MyProfile" class="container tab-pane"><br>
<?php
$email = "";
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

$sql = "SELECT lewisID, Fname, lname, email FROM users WHERE lewisID='A12345'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
		
		echo "<div class='container'>";
		echo " <center><h1><kbd>My Profile</kbd></center></h1>";
		echo "<table class='table table-borderless'>
		<th colspan='2'> <center> </center> </th>
		<tbody>";
		
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo 
		"<tr> <td> <h4><kbd>Lewis ID: </kbd></h4> </td>
		 <td><h3> <small>" .$row["lewisID"]. "</small></h3></td> </tr>
		 <tr> <td> <h4><kbd>First name: </kbd></h4> </td>
		 <td><h3> <small>" .$row["Fname"]. "</small></h3></td> </tr>
		 <tr> <td> <h4><kbd>Last name: </kbd></h4> </td> 
		 <td><h3> <small>" .$row["lname"] . "</small></h3></td> </tr>
		 <tr> <td> <h4><kbd>Lewis Email: </kbd></h4> </td> 
		 <td><h3> <small>" .$row["email"]. "</small></h3></td> </tr>";
		 
    }
	echo "<tr> <td> <h4><kbd>Password: </kbd></h4> </td>
		  <td>  <h5><kbd> **************</kbd></h5> <p>( Click<a href='newpw.html'>
		  <u>here</u></a> to change password ) </p></tr> 
		  </tbody> </table> </div>";
} else {
    echo "0 results";
}
?> 
    </div>
	
				<!-- Activity Tab panes -->
	<div id="Activity" class="container tab-pane fade"><br>
<?php
$sql = "SELECT reservationID, printerID, lewisID, tdate, ttime FROM reservations";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
		
		echo "<div class='container'>";
		echo "<div class='page-header'>";
		echo " <center><h1><kbd>Activity</kbd></center></h1> 
		</div>";
		echo "<input class='form-control' id='printerinput' type='text'
		placeholder='Search Activity'><br>";
		echo "<div class='table-responsive'>
		<table class='table table-hover'>
		<thead align='center' class='thead-light'>
		<tr>
		<th>Printer reservationID </th>
		<th>Printer printerID </th>
		<th>Printer lewisID </th>
		<th>Printer tdate </th>
		<th>Printer ttime </th>
		</tr>
		</thead>
		<tbody align='center' id='printers'>";
		
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr>";
        echo 
		"<td>" .$row["reservationID"]. "</td>
		 <td>" .$row["printerID"]. "</td>
		 <td>" .$row["lewisID"] . "</td>
		 <td>" .$row["tdate"]. "</td>
		 <td>" .$row["ttime"] . "</td>";
    }echo " </tr></tbody></table> </div></div>";
} else {
    echo "0 results";
}

?> 
	</div>
	
				<!-- Printers Tab panes -->
	<div id="Printers" class="container tab-pane fade"><br>
<?php
$sql = "SELECT printerID, pname, pmodel, pimage, status FROM printers WHERE status='Online'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
		
		echo "<div class='container'>";
		echo "<div class='page-header'>";
		echo " <center><h1><kbd>Available 3D Printers</kbd></center></h1> 
		</div>";
		echo "<input class='form-control' id='printerinput' type='text'
		placeholder='Search Available 3D Printers'><br>";
		echo "<div class='table-responsive'>
		<table class='table table-hover'>
		<thead align='center' class='thead-light'>
		<tr>
		<th>Printer ID </th>
		<th>Printer Name </th>
		<th>Printer Model </th>
		<th>Printer Image </th>
		<th>Printer Status </th>
		</tr>
		</thead>
		<tbody align='center' id='printers'>";
		
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr>";
        echo 
		"<td>" .$row["printerID"]. "</td>
		 <td>" .$row["pname"]. "</td>
		 <td>" .$row["pmodel"] . "</td>
		 <td>" .$row["pimage"]. "</td>
		 <td> <kbd> " .$row["status"] . " </kbd> </td>";
    }echo " </tr></tbody></table> </div> </div>";
} else {
    echo "0 results";
}

$conn->close();
?> 
    </div>

				<!-- Printers Tab panes -->
<div id="Support" class="container tab-pane fade"><br>
		
	<center><h1><kbd>Support</kbd></center></h1><hr>
		<h3><small>Please email 
		<a href="mailto:morrowch@lewisu.edu">Christine Morrow</a>
		( <a style="color:black;" href="mailto:morrowch@lewisu.edu"><u>morrowch@lewisu.edu</a></u> ) with any questions and concerns, or <br> Visit <u>
		<kbd><a style="color:#dbdbdb;" href="https://www.lewisu.edu/portals/contactus.htm" target="_blank">
		Lewis</a></u></kbd> for full list of contacts.<br><br> Lab Hours: 9AM - 8PM <small> </h3>

</div>
  		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?> 

  </div>
</div>

</body>
</html>