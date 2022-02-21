<!-- 
File Name: index.php
Description: Index will display main 
website page with CaMS logo and register 
and login forms that will be utilize by user and admin
-->
<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Title with CaMS logo -->
	<title>Maker Lab | Home</title>
	<link rel="icon" href="images\icon.png" type="image/gif" sizes="16x16">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<!-- Bootstrap file links-->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
	integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
	crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
	integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
	crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
	integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
	crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
	integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
	crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
	integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
	integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
	integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="index.css">
	
	<script src="validate.js"></script>	
		
</head>

<!--------------------------------------------------------------------------------------->

<body>

					<!-- CaMS logo with ink to home-->
	<a href="index.php">
		<img class="responsive" src="images\cams.png"> 
	</a>
	<br><br>
<div>
				<!-----**container for MAIN heading**----->
	<div class ="titleText">
		Reserve a 3D Printer Now !
	</div>
				
	<div id="error";> 
		<h5><?php include('errors.php'); ?></h5>
	</div>	

				<!-----**Accordin for collapse**----->
	<div id="accordion">
		<div class="main-form needs-validation" novalidate>
				<a data-toggle="collapse" data-target="#register"
						aria-expanded="true" aria-controls="register"						
						class="btn btn-primary btn-lg btn-block" href="register.php" 
						role="button"><strong>Create a FREE account</strong>
				</a>
					<!-- Register Form-->
				<div id="register" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
						<div class="container"> 
								<form name="register" method="POST" 
									onsubmit="return validateForm()">

							<div class="container">
								<div class="row">
									<div class="col">
										<div class="form-group">
												<input type="text" name="fname"
													class="form-control" autofocus
													placeholder="First name">
										</div>
									</div>

									<div class="col">
										<div class="form-group">
											<input type="text" name="lname"
												class="form-control"
												placeholder="Last name">
										</div>
									</div>
								</div>
							
								<div class="row">
									<div class="col">
										<div class="form-group">
											<div class="input-group">
												<input type="text" name="lewisID"
													class="form-control"
													placeholder="Enter Lewis ID">
											</div>
										</div>
									</div>
								</div>

										<div class="form-group">
											<input type="email" name="email"
												class="form-control"
												placeholder="Lewis Email Address">
										</div>
							
						
										<div class="form-group">
											<input type="password" name="password_1"
												class="form-control"
												placeholder="Create a strong password">
										</div>
														
										<div class="form-group">
											<input type="password" name="password_2"
												class="form-control"
												placeholder="Re-enter password to confirm it">
										</div>
							
										<div class="form-check">
											<label for="accept-terms" class="form-check-label">
												<input type="checkbox" id="agree" 
													value="" class="form-check-input">
														<a  style="color:white;" href="tnc.html"
															target="popup"
															onclick="window.open('tnc.html','popup','width=600,height=600'); return false;">
															Accept Terms &amp; Conditions
														</a>
											</label>
										</div>
							
										<div class ="d-flex justify-content-center" style="padding-top: 10px;">
											<button type="submit" id="register" 
												class="btn btn-primary btn-block"
												
												name="reg_user"><strong>Create Account</strong>
											</button>
										</div>
									</form>
								</div>
							</div>
						</div> <!-- END of REGISTER collapse -->
				
			<!-------------------- ********** LOGIN ********** -------------------------->
				
			<div class ="d-flex justify-content-center" style="padding-top: 10px;">
				<a data-toggle="collapse" data-target="#login"
					aria-expanded="false" aria-controls="login"
					style="color:white" class="btn btn-outline-primary btn-lg btn-block" 
					href="login.php" role="button"><strong>Already have a Makerlab account? Login here</strong>
				</a>
			</div>

			<div id="login" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
				
				<div class="container">
					<form name="login" method="post">
							
						<div class="form-group">
							<input type="text" name="email" autofocus
								class="form-control" placeholder="Lewis Email Address"
								id="email">
						</div>
					
						<div class="form-group">
							<input type="password" name="password" 
								class="form-control" placeholder="Enter Password">
							<p> Forgot Password? 
								<a style="color:white;" href="newpw.html">reset it here</a>
							</p>
						</div>

							<!--	<button type="submit" class="btn" name="login_user">Login</button> -->
						<div class ="d-flex justify-content-center" style="padding-top: 0px;">
							<button name="login_user" type="submit" 
										class="btn btn-primary btn-block">
										<strong>Log In</strong>
							</button>
						</div>
					</form>	<!-- END of login form -->
				</div> <!-- END of container for login -->
			</div> <!-- END of LOGIN collapse -->
		</div>	<!-- END of class="main-form" -->
	</div> <!-- End of accordion -->
</div>  <!-- End of MAIN div -->

</body>

<footer>

	<div>
		<p>Please email <u>
		<kbd><a style="color:#dbdbdb;" href="mailto:morrowch@lewisu.edu">Christine Morrow</a></u></kbd>
		with any questions and concerns, or Visit <u>
		<kbd><a style="color:#dbdbdb;" href="https://www.lewisu.edu/portals/contactus.htm" target="_blank">
		Lewis</a></u></kbd> for full list of contacts.</br> Lab Hours: 9AM - 8PM </p>
	</div>

</footer>
</html>