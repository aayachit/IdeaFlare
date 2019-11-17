 <?php 
 	session_start();
 	$session = $_SESSION['email'];
 	if($session==true){

 	}else{
 		header("Location:home.php");
 	}

 ?>
 
<?php include 'includes/profile-edit-personal.inc.php'; ?>

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
			<h3 class="text-center mt-5">Personal Information</h3>
			<form method="post" enctype="multipart/form-data">
				<?php

			    include 'includes/connect.inc.php';

			    $sql1 = "SELECT id, firstname, lastname, email FROM user WHERE email ='".$session."'";
			    $result1 = mysqli_query($con, $sql1) or die('Error Retrieving User Data');
				$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);

				$id = $row1['id'];

				$sql2 = "SELECT * FROM cp_personal WHERE id = " .$id;
			    $result2 = mysqli_query($con, $sql2) or die('Error Retrieving User Data');
				$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);

				echo'<div class="row mt-4">';
				echo'	<div class="form-group col-md-6">';
				echo'		<label for="firstname">First Name:</label>';
				echo'		<input type="text" class="form-control" name="cp-firstname" placeholder="First Name" value="'.$row1['firstname'] .'" disabled>';
				echo'	</div>';
				echo'	<div class="form-group col-md-6">';
				echo'		<label for="lastname">Last Name:</label>';
				echo'		<input type="text" class="form-control" name="cp-lastname" placeholder="Last Name" value="'.$row1['lastname'] .'" disabled>';
				echo'	</div>';
				echo'</div>';
				echo'<div class="form-group">';
				echo'	<label for="email">Email:</label>';
				echo'	<input type="email" class="form-control" name="cp-email" placeholder="abc@example.com" value="'.$row1['email'] .'" disabled>';
				echo'</div>';


				echo'<div class="form-group">';
				echo'	<label for="altEmail">Alternate Email:</label>';
				echo'	<input type="email" class="form-control" name="cp-altEmail" placeholder="abc@example.com" value="'.$row2['altEmail'] .'">';
				echo'</div>';
				echo'<div class="row">';
				echo'	<div class="form-group col-md-6">';
				echo'		<label for="contact">Contact No:</label>';
				echo'		<input type="number" class="form-control" name="cp-contact" placeholder="Mobile No" value="'.$row2['contact'] .'">';
				echo'	</div>';
				echo'	<div class="form-group col-md-6">';
				echo'		<label for="industry">Industry:</label>';
				echo'		<input type="text" class="form-control" name="cp-industry" placeholder="Industry" value="'.$row2['industry'] .'">';
				echo'	</div>';
				echo'</div>';
				echo'<div class="form-group">';
				echo'		<label for="summary">About you:</label>';
    			echo'		<textarea class="form-control" rows="3" name="cp-about-you" placeholder="max 200 characters">'.$row2['about'].'</textarea>';
				echo'</div>';
				echo'<div class="form-group">';
				echo'		<label for="cv">Upload CV(PDF):</label>';
				echo'	    <input type="file" name="cp-cv" accept=".pdf" class="form-control form-input Profile-input-file">';
				echo'</div>';
				echo'<div class="form-group">';
				echo'		<label for="profile-picture">Upload Profile Picture:</label>';
				echo'	    <input type="file" name="cp-pp" accept="image/*" class="form-control form-input Profile-input-file" >';
				echo'</div>				';
		        echo'<div class="text-right mb-5"> ';
		        echo'  <button type="submit" name="update" class="btn btn-primary btn-md">Update</button>';
		        echo'</div>';

		        ?>
			</form>
		</div>
		<div class="col-sm-3"></div>
	</div>		
</div>


</body>
</html>