<?php 
	session_start();
	$session = $_SESSION['email'];
	if($session==true){

	}else{
		header("Location:home.php");
	}

?>
 
<?php include 'includes/profile-new-experience.inc.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
	<link rel="icon" href="img/logo-invert.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="css/navbar.css" rel="stylesheet">
	<link href="css/button.css" rel="stylesheet">
	<link href="css/userhome.css" rel="stylesheet">
	<link href="css/createProfile.css" rel="stylesheet">

</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
		<a class="navbar-brand" href="userhome.php"><img src="img/logo.png" height="30px" width="25px"> IdeaFlare.in</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
			  		<a class="nav-link" href="userhome.php">Home</a>
			  	</li>
			  	<li class="nav-item">
			  		<a class="nav-link" href="#">Blogs</a>
			  	</li>
			  	<li class="nav-item">
			  		<a class="nav-link" href="#">Projects</a>
			  	</li>
			  	<li class="nav-item">
			  		<a class="nav-link" href="displayPatents-user.php">Patents</a>
			  	</li>
			  	 <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Account </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="users-settings.php">Settings</a>
			          <a class="dropdown-item" href="#"></a>
			          <div class="dropdown-divider"></div>
			          <a class="dropdown-item" href="includes/logout.inc.php">Logout</a>
			        </div>
			    </li>
			</ul>	

	  	</div>
</nav>


<!-- content -->

<div class="container-fluid add-info">
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<form method="post">
				<h3 class="text-center mt-5">Professional Experience</h3>

				<div id="field_experience">

 					<div class="form-group mt-5">
						<div class="row">
							<div class="form-group col-md-3">
								<label for="duration">Duration:</label>
							</div>
							<div class="form-group col-md-2">
								<input type="number" class="form-control" name="job-duration[]" id="job-duration" placeholder="">
							</div>
							<div class="form-group col-md-2">
								<label for="months">Months</label>
							</div>
							<div class="form-group col-md-2">
								<label for="status">Status:</label>
							</div>
							<div class="form-group col-md-3">
								<!-- <input type="hidden" name="job-ongoing[]" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value"> Ongoing -->
								<select class="form-control" name="job-ongoing[]" id="job-ongoing">
								    <option value="1">Ongoing</option>
								    <option value="0">Completed</option>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="form-group col-md-3">
								<label for="location">Company Name:</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="job-company[]">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="form-group col-md-3">
								<label for="location">Location:</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="job-location[]" id="job-location" placeholder="eg: Mumbai, Pune, Delhi, Bangalore">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="form-group col-md-3">
								<label for="position">Position:</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="job-position[]" id="job-position" placeholder="eg: Manager, Intern">
							</div>
						</div>
					</div>	


					<div class="form-group">
						<div class="row">
							<div class="form-group col-md-3">
								<label for="resposibilities">Job Resposibilities:</label>
							</div>
							<div class="form-group col-md-9">					
								<textarea name="job-responsibilities[]" id="job-resposibilities" class="form-control" rows="3" placeholder="max 200 characters"></textarea>
							</div>
						</div>
					</div>									
					<div class="form-group">
				    	<a href="#" class="black" id="add_experience">+Add More</a>
					</div>
				
				</div>

		      	<div class="text-right mb-5"> 
		          <button type="submit" name="next" class="btn btn-primary btn-md">Submit</button>
		        </div>
			</form>
		</div>

		<div class="col-sm-3"></div>
	</div>		
</div>

<script type="text/javascript" src="js/add_experience.js"></script>

</body>
</html>