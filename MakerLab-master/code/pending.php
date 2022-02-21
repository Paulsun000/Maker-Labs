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
  <title>Maker Lab | Acoount Pending..</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="icon" href="images\icon.png" type="image/gif" sizes="16x16">
<style>
#logout {
	text-align: right;
	padding-right: 50px;
	color: white;
}

#greeting {
	text-align: right;
	padding-right: 50px;
	padding-top: 30px;
	color: white;
}

#loglink {
	color: white;
}

#head {
	background: url(images/head2.jfif) no-repeat;
	background-size: cover;
	height: 100%;
	overflow: hidden;
}

#nav {
	padding-right: 30px;
}


</style>
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
			<p>Welcome <strong><?php echo $_SESSION['email']; ?></strong></p>
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
  <div class="alert alert-info">
    <center><h2>WELCOME</h2></center> <h5> Account is currently pending.<span class="glyphicon">&#x231b;</span> Please wait for account to be approved
	by an admin. if you have question please see contact information below.</h5>
  </div>
		  <!-- Nav tabs -->
		  <ul class="nav nav-pills nav-fill">
			<li class="nav-item">
			  <a class="nav-link disabled" data-toggle="pill" href="#Calendar">
			  Calendar</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link disabled" data-toggle="pill" href="#MyProfile">
			  My Profile</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link disabled" data-toggle="pill" href="#Activity">
			  Activity</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link disabled" data-toggle="pill" href="#Printers">
			  Printers</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link active" data-toggle="pill" href="#Support">
			  Support</a>
			</li>
		  </ul>
	<div class="tab-content">
		<div id="Support" class="container tab-pane active"><br>
			
			<center><h1><kbd>Support</kbd></center></h1><hr>
				<h3><small>Please email 
				<a href="mailto:morrowch@lewisu.edu">Christine Morrow</a>
				( <a style="color:black;" href="mailto:morrowch@lewisu.edu" ><u>morrowch@lewisu.edu</a></u> ) with any questions and concerns, or <br> Visit <u>
				<kbd><a style="color:#dbdbdb;" href="https://www.lewisu.edu/portals/contactus.htm" target="_blank">
				Lewis</a></u></kbd> for full list of contacts.<br><br> Lab Hours: 9AM - 8PM <small> </h3>
				

		</div>
	</div>
</div>
  <body>
  </html>