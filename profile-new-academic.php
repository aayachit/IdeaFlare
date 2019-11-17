 <?php 
 	session_start();
 	$session = $_SESSION['email'];
 	if($session==true){

 	}else{
 		header("Location:home.php");
 	}

 ?>

 <?php include 'includes/profile-new-academic.inc.php'; ?>

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
			<h3 class="text-center mt-5">Academic Information</h3>
			<form method="post">
				<h5 class="mt-5">Skills:</h5>
				<div id="field_skill">
					<div class="form-group">
						<div class="row">
							<div class="form-group col-xs-6 col-md-2 ">
								<label for="skill">Skill:</label> 
							</div>
							<div class="form-group col-xs-6 col-md-4">
								<input class="form-control" type="text" name="skill[]" id="skill">
				            </div>
				            <div class="form-group col-xs-6 col-md-2">
				            	<label for="rating">Rating:</label>
				            </div>		
				            <!-- 		
				            <div class="form-group col-xs-4 col-md-2">
								<input type="text" class="form-control" name="rating[]" id="rating">
							</div>
							<div class="form-group col-xs-2 col-md-2">
								<p style="font-size: 25px;">/ 10</p>
							</div>
 -->
							<div class="form-group col-xs-6 col-md-4">
							  <select class="form-control" name="rating[]" id="rating">
							    <option value="Beginner">Beginner</option>
							    <option value="Intermediate">Intermediate</option>
							    <option value="Advanced">Advanced</option>
							  </select>
							</div>

						</div>
					    <a href="#" id="add_skill">+Add More</a>
					</div>
				</div>
	
				<h5 class="mt-5">Certifications:</h5>
				<div id="field_certification">
					<div class="form-group">
						<div class="row">
							<div class="form-group col-md-6">
								<label for="certification-name">Certification Name:</label> 
							</div>
							<div class="form-group col-md-6">
								<input class="form-control" type="text" name="certification_name[]">
				            </div>
				        </div>
				        <div class="row">
				            <div class="form-group col-md-6">
				            	<label for="certification-link">Certification Link:</label>
				            </div>				
							<div class="form-group col-md-6">
								<input class="form-control" type="text" name="certification_link[]">
				            </div>
						</div>
				        <div class="row">
				            <div class="form-group col-md-6">
				            	<label for="certification-authority">Certification Authority:</label>
				            </div>				
							<div class="form-group col-md-6">
								<input class="form-control" type="text" name="certification_authority[]">
				            </div>
						</div>

						<div class="row">
							<div class="form-group col-md-6">
								<label for="certification-number">Certification Number:</label> 
							</div>
							<div class="form-group col-md-6">
								<input class="form-control" type="text" name="certification_number[]">
				            </div>
				        </div>

				        <div class="row">
							<div class="form-group col-md-6">
								<label for="certification-date">Certification Date:</label> 
							</div>
							<div class="form-group col-md-6">
								<input class="form-control" type="date" name="certification_date[]">
				            </div>
				        </div>

				        <div class="row">
							<div class="form-group col-md-6">
								<label for="certification-details">Certification Details:</label> 
							</div>
							<div class="form-group col-md-6">
								<textarea name="certification_details[]" class="form-control" rows="3" placeholder="max 200 characters"></textarea>
				            </div>
				        </div>

					</div>
					<a href="#" id="add_certification">+Add More</a>
				</div>

				<h5 class="mt-5">Courses:</h5>
				<div id="field_course">
					<div class="form-group">
						<div class="row">
							<div class="form-group col-md-6">
								<label for="course-name">Course Name:</label> 
							</div>
							<div class="form-group col-md-6">
								<input class="form-control" type="text" name="course_name[]">
				            </div>
				        </div>
				        <div class="row">
				            <div class="form-group col-md-6">
				            	<label for="course-link">Course Link:</label>
				            </div>				
							<div class="form-group col-md-6">
								<input class="form-control" type="text" name="course_link[]">
				            </div>
						</div>
				        <div class="row">
				            <div class="form-group col-md-6">
				            	<label for="course-authority">Course Authority:</label>
				            </div>				
							<div class="form-group col-md-6">
								<input class="form-control" type="text" name="course_authority[]">
				            </div>
						</div>

						<div class="row">
							<div class="form-group col-md-6">
								<label for="course-number">Course Number:</label> 
							</div>
							<div class="form-group col-md-6">
								<input class="form-control" type="text" name="course_number[]">
				            </div>
				        </div>

				        <div class="row">
							<div class="form-group col-md-6">
								<label for="course-date">Course Date:</label> 
							</div>
							<div class="form-group col-md-6">
								<input class="form-control" type="date" name="course_date[]">
				            </div>
				        </div>

				        <div class="row">
							<div class="form-group col-md-6">
								<label for="course-details">Course Details:</label> 
							</div>
							<div class="form-group col-md-6">
								<textarea name="course_details[]" class="form-control" rows="3" placeholder="max 200 characters"></textarea>
				            </div>
				        </div>

					</div>
					<a href="#" id="add_course">+Add More</a>
				</div>

				<h5 class="mt-5">Workshops:</h5>
				<div id="field_workshop">
					<div class="form-group">
						<div class="row">
							<div class="form-group col-md-6">
								<label for="workshop-name">Workshop Name:</label> 
							</div>
							<div class="form-group col-md-6">
								<input class="form-control" type="text" name="workshop_name[]">
				            </div>
				        </div>
				        <div class="row">
				            <div class="form-group col-md-6">
				            	<label for="workshop-authority">Workshop Authority:</label>
				            </div>				
							<div class="form-group col-md-6">
								<input class="form-control" type="text" name="workshop_authority[]">
				            </div>
						</div>
				        <div class="row">
							<div class="form-group col-md-6">
								<label for="workshop-date">Workshop Date:</label> 
							</div>
							<div class="form-group col-md-6">
								<input class="form-control" type="date" name="workshop_date[]">
				            </div>
				        </div>

				        <div class="row">
							<div class="form-group col-md-6">
								<label for="workshop-details">Workshop Details:</label> 
							</div>
							<div class="form-group col-md-6">
								<textarea name="workshop_details[]" class="form-control" rows="3" placeholder="max 200 characters"></textarea>
				            </div>
				        </div>

					</div>
					<a href="#" id="add_workshop">+Add More</a>
				</div>

				<div class="text-right mb-5"> 
		          <button type="submit" name="next" class="btn btn-primary button btn-md">Next</button>
		        </div>
			</form>
		</div>
		<div class="col-sm-3"></div>
	</div>		
</div>

<script type="text/javascript" src="js/add_skill.js"></script>
<script type="text/javascript" src="js/add_certification.js"></script>
<script type="text/javascript" src="js/add_course.js"></script>
<script type="text/javascript" src="js/add_workshop.js"></script>

</body>
</html>