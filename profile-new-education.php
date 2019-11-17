 <?php 
 	session_start();
 	$session = $_SESSION['email'];
 	if($session==true){

 	}else{
 		header("Location:home.php");
 	}

 ?>
 
<?php include 'includes/profile-new-education.inc.php'; ?>

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
									<!-- CHECK Number -->
<div class="container-fluid add-info">					
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<h3 class="text-center mt-5">Education Information</h3>
			<form method="post" enctype="multipart/form-data">
				<h5 class="mt-5">Class 10:</h5>
				<div class="row">
					<div class="form-group col-md-3">
						<label for="percentage"> Percentage:</label>
					</div>
					<div class="form-group col-md-9">
						<input type="number" class="form-control" name="10_percentage" placeholder="% (convert cgpa in percentage)">
					</div>
					<!-- <div class="form-group col-md-6">
						<label for="gpa">GPA:</label>
						<input type="number" class="form-control" name="10_gpa" placeholder="GPA">
					</div> -->
				</div>

				<div class="row">
					<div class="form-group col-md-12">
						<label for="10-marksheet">Upload Marksheet(PDF):</label>
						<input type="file" name="10_marksheet" accept=".pdf" class="form-control form-input Profile-input-file">
					</div>
				</div>

				<h5 class="mt-5">Class 12:</h5>
				<div class="row">
					<div class="form-group col-md-3">
						<label for="percentage"> Percentage:</label>
					</div>
					<div class="form-group col-md-9">
						<input type="number" class="form-control" name="12_percentage" placeholder="%">
					</div>
<!-- 					<div class="form-group col-md-6">
						<label for="gpa">GPA:</label>
						<input type="number" class="form-control" name="12_gpa" placeholder="GPA">
					</div>	 -->			
				</div>

				<div class="row">
					<div class="form-group col-md-12">
						<label for="12-marksheet">Upload Marksheet(PDF):</label>
						<input type="file" name="12_marksheet" accept=".pdf" class="form-control form-input Profile-input-file">
					</div>
				</div>

				<h5 class="mt-5">Graduation:</h5>
				<div class="row mt-3">
					<div class="form-group col-md-3">
						<label for="field">Field:</label>
					</div>
					<div class="form-group col-md-9">
						<input type="text" class="form-control" name="ug_field" placeholder="Field">
					</div>	
				</div>
				
				<div class="row">	
					<div class="form-group col-md-3">
						<label for="cgpa">Overall Score:</label>
					</div>
					<div class="form-group col-md-9">
						<input type="number" class="form-control" name="ug_cgpa" placeholder="CGPA">
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-md-12">
						<label for="ug-marksheet">Upload Marksheet(PDF):</label>
						<input type="file" name="ug_marksheet" accept=".pdf" class="form-control form-input Profile-input-file">
					</div>
				</div>
				


				<h5 class="mt-5">Post Graduation:</h5>
				
				<div class="row">
					<div class="form-group col-md-3">
						<label for="field">Field:</label>
					</div>
					<div class="form-group col-md-9">
						<input type="text" class="form-control" name="pg_field" placeholder="Field">
					</div>
				</div>

				<div class="row">						
					<div class="form-group col-md-3">
						<label for="cgpa">Overall Score:</label>
					</div>
					<div class="form-group col-md-9">
						<input type="number" class="form-control" name="pg_cgpa" placeholder="CGPA">
					</div>
				</div>

				<div class="form-group">
					<label for="grad-marksheet">Upload Marksheet(PDF):</label>
					<input type="file" name="pg_marksheet" accept=".pdf" class="form-control form-input Profile-input-file">
				</div>     	

	
				<h5 class="mt-5">Projects:</h5>
				<div id="field">
					<div class="form-group">
						<label for="project-title">Project Title:</label>
						<input type="text" class="form-control" name="project_title[]" id="project_title" placeholder="Title">
					</div>
					<div class="form-group">
						<label for="project-description">Project Description:</label>
						<textarea name="project_description[]" id="project_description" class="form-control" rows="3" placeholder="max 200 characters"></textarea>
					</div>
					<div class="form-group">
						<label for="project-docs">Upload Project Report(PDF):</label>
						<input type="file" accept=".pdf" name="project_report[]" id="project_report" class="form-control form-input Profile-input-file">
					</div>	
					<a href="#" class="black" id="add">+Add More</a>
				</div>


		      	<div class="text-right mb-5"> 
		          <button type="submit" name="next" class="btn btn-primary button btn-md">Next</button>
		        </div>
			</form>
		</div>
		<div class="col-sm-3"></div>
	</div>		
</div>

<script type="text/javascript" src="js/add_project.js"></script>
</body>
</html>