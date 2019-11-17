 <?php 
 	session_start();
 	$session = $_SESSION['email'];
 	if($session==true){

 	}else{
 		header("Location:home.php");
 	}

 ?>
 
<?php include 'includes/profile-edit-pp.inc.php'; ?>

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
			<h3 class="text-center mt-5">Profile Picture</h3>
			<form method="post" enctype="multipart/form-data">
				<?php

			    include 'includes/connect.inc.php';

			    $sql1 = "SELECT id FROM user WHERE email ='".$session."'";
			    $result1 = mysqli_query($con, $sql1) or die('Error Retrieving User Data');
				$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);

				$id = $row1['id'];

				echo'<div class="form-group">';
				echo'		<label for="profile-picture">Upload Profile Picture:</label>';
				echo'	    <input type="file" name="cp-pp" accept="image/*" class="form-control form-input Profile-input-file" >';
				echo'</div>		';

		        echo'<div class="form-group text-right mb-5"> ';
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