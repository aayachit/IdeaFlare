<?php 
	session_start();
	$session = $_SESSION['email'];
	if($session==true){

	}else{
		header("Location:home.php");
	}

?>
 
<?php include 'includes/profile-edit-experience.inc.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Profile</title>
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

				<?php

			    include 'includes/connect.inc.php';

			    //Get user ID
			    $sql1 = "SELECT id FROM user WHERE email ='".$session."'";
			    $result1 = mysqli_query($con, $sql1) or die('Error Retrieving User Data');
				$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);

				$id = $row1['id'];

				//Get experience data
				$sql3 = "SELECT * FROM cp_experience WHERE id = " .$id;
			    $result3 = mysqli_query($con, $sql3) or die('Error Retrieving Experience Data');

			    //Get Experience Count         
	          	$experience_count = 0;
        	  	

        	  	while($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) { $experience_count++; }   	  	

				$result3 = mysqli_query($con, $sql3) or die('Error Retrieving Experience Data'); // for displaying the result

	          	echo '<input type="hidden" class="form-control" name="experience_count" value="'.$experience_count.'" required >';

				if (mysqli_num_rows($result3)!=0){
		        	$flag = 0;
		            while($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
						echo'<div id="field_experience">';

		 				echo'	<div class="form-group mt-5">';
						echo'		<div class="row">';
						echo'			<div class="form-group col-md-3">';
						echo'				<label for="duration">Duration:</label>';
						echo'			</div>';
						echo'			<div class="form-group col-md-2">';
						echo'				<input type="number" class="form-control" name="job-duration[]" value="'.$row3['duration'].'">';
						echo'			</div>';
						echo'			<div class="form-group col-md-2">';
						echo'				<label for="months">Months</label>';
						echo'			</div>';
						echo'			<div class="form-group col-md-2">';
						echo'				<label for="status">Status:</label>';
						echo'			</div>';
						echo'			<div class="form-group col-md-3">';
						
						if($row3['ongoing'] == 1){

						echo'	<select class="form-control" name="job-ongoing[]" id="job-ongoing">';
						echo'	    <option value="1" selected>Ongoing</option>';
						echo'	    <option value="0">Completed</option>';
						echo'	</select>';
						}else{
						
						echo'	<select class="form-control" name="job-ongoing[]" id="job-ongoing">';
						echo'	    <option value="1">Ongoing</option>';
						echo'	    <option value="0" selected>Completed</option>';
						echo'	</select>';
						}
				
						echo'			</div>';
						echo'		</div>';
						echo'	</div>';

						echo'	<div class="form-group">';
						echo'		<div class="row">';
						echo'			<div class="form-group col-md-3">';
						echo'				<label for="location">Company Name:</label>';
						echo'			</div>';
						echo'			<div class="form-group col-md-9">';
						echo'				<input type="text" class="form-control" name="job-company[]"  value="'.$row3['company'].'">';
						echo'			</div>';
						echo'		</div>';
						echo'	</div>';


						echo'	<div class="form-group">';
						echo'		<div class="row">';
						echo'			<div class="form-group col-md-3">';
						echo'				<label for="location">Location:</label>';
						echo'			</div>';
						echo'			<div class="form-group col-md-9">';
						echo'				<input type="text" class="form-control" name="job-location[]" id="job-location" placeholder="eg: Mumbai, Pune, Delhi, Bangalore" value="'.$row3['location'].'">';
						echo'			</div>';
						echo'		</div>';
						echo'	</div>';

						echo'	<div class="form-group">';
						echo'		<div class="row">';
						echo'			<div class="form-group col-md-3">';
						echo'				<label for="position">Position:</label>';
						echo'			</div>';
						echo'			<div class="form-group col-md-9">';
						echo'				<input type="text" class="form-control" name="job-position[]" id="job-position" placeholder="eg: Manager, Intern" value="'.$row3['position'].'">';
						echo'			</div>';
						echo'		</div>';
						echo'	</div>	';


						echo'	<div class="form-group">';
						echo'		<div class="row">';
						echo'			<div class="form-group col-md-3">';
						echo'				<label for="resposibilities">Job Resposibilities:</label>';
						echo'			</div>';
						echo'			<div class="form-group col-md-9">					';
						echo'				<textarea name="job-responsibilities[]" id="job-resposibilities" class="form-control" rows="3" placeholder="max 200 characters">'.$row3['responsibilities'].'</textarea>';
						echo'			</div>';
						echo'		</div>';
						echo'	</div>';
						
						echo'  <a href="includes/profile-delete-experience.inc.php?id='.$row3['id'].'&experience_id='.$row3['experience_id'].'">Delete</a>';
		              	echo'  <br>';


						if($flag==0){
							echo'	<div class="form-group">';
							echo'    	<a href="#" id="add_experience">+Add More</a>';
							echo'	</div>';
							$flag++;
			            }
						
						echo'</div>';
					}
				}else{
						echo'<div id="field_experience">';

		 				echo'	<div class="form-group mt-5">';
						echo'		<div class="row">';
						echo'			<div class="form-group col-md-3">';
						echo'				<label for="duration">Duration:</label>';
						echo'			</div>';
						echo'			<div class="form-group col-md-2">';
						echo'				<input type="number" class="form-control" name="job-duration[]">';
						echo'			</div>';
						echo'			<div class="form-group col-md-3">';
						echo'				<p style="font-size: 20px">Months</p>';
						echo'			</div>';
						echo'			<div class="form-group col-md-4">';
						echo'				<select class="form-control" name="job-ongoing[]" id="job-ongoing">';
						echo'				    <option value="1">Ongoing</option>';
						echo'				    <option value="0">Completed</option>';
						echo'				</select>';
						echo'			</div>';
						echo'		</div>';
						echo'	</div>';

						echo'	<div class="form-group">';
						echo'		<div class="row">';
						echo'			<div class="form-group col-md-3">';
						echo'				<label for="location">Company Name:</label>';
						echo'			</div>';
						echo'			<div class="form-group col-md-9">';
						echo'				<input type="text" class="form-control" name="job-company[]">';
						echo'			</div>';
						echo'		</div>';
						echo'	</div>';


						echo'	<div class="form-group">';
						echo'		<div class="row">';
						echo'			<div class="form-group col-md-3">';
						echo'				<label for="location">Location:</label>';
						echo'			</div>';
						echo'			<div class="form-group col-md-9">';
						echo'				<input type="text" class="form-control" name="job-location[]" id="job-location" placeholder="eg: Mumbai, Pune, Delhi, Bangalore">';
						echo'			</div>';
						echo'		</div>';
						echo'	</div>';

						echo'	<div class="form-group">';
						echo'		<div class="row">';
						echo'			<div class="form-group col-md-3">';
						echo'				<label for="position">Position:</label>';
						echo'			</div>';
						echo'			<div class="form-group col-md-9">';
						echo'				<input type="text" class="form-control" name="job-position[]" id="job-position" placeholder="eg: Manager, Intern">';
						echo'			</div>';
						echo'		</div>';
						echo'	</div>	';


						echo'	<div class="form-group">';
						echo'		<div class="row">';
						echo'			<div class="form-group col-md-3">';
						echo'				<label for="resposibilities">Job Resposibilities:</label>';
						echo'			</div>';
						echo'			<div class="form-group col-md-9">					';
						echo'				<textarea name="job-responsibilities[]" id="job-resposibilities" class="form-control" rows="3" placeholder="max 200 characters"></textarea>';
						echo'			</div>';
						echo'		</div>';
						echo'	</div>';
						
						echo'	<div class="form-group">';
						echo'    	<a href="#" id="add_experience">+Add More</a>';
						echo'	</div>';
					
						
						echo'</div>';
				}
		      	
		      	echo'<div class="text-right mb-5"> ';
		        echo'  <button type="submit" name="update" class="btn btn-primary btn-md">Update</button>';
		        echo'</div>';

		    ?>
			</form>
		</div>

		<div class="col-sm-3"></div>
	</div>		
</div>

<script type="text/javascript" src="js/add_experience.js"></script>

</body>
</html>