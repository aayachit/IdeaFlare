 <?php 
 	session_start();
 	$session = $_SESSION['email'];
 	if($session==true){

 	}else{
 		header("Location:home.php");
 	}

 ?>
 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile-Files</title>
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
	<link href="css/profile.css" rel="stylesheet">
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

<div class="container">

	<div class="header-content">
		<h1 class="text-center">Manage Files</h1>
	</div>

	<!-- <h3 class="text-center mt-5">Manage Files</h3> -->
	<div class="jumbotron mt-5">
		<h3>Uploaded Files:</h3>
		<hr class="my-4">

		<?php

		    include 'includes/connect.inc.php';

		    $sql1 = "SELECT id FROM user WHERE email ='".$session."'";
		    $result1 = mysqli_query($con, $sql1) or die('Error Retrieving User Data');
			$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
		    $id = $row1['id'];

		    $cv = "";
		    $pp = "";
		    $marksheet_10 = "";
		    $marksheet_12 = "";
		    $ug_marksheet = "";
		    $pg_marksheet = "";


		    $sql2 = "SELECT cv, image FROM cp_personal where id = ".$id;
		    $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Profile Data');
			$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);	
			if (mysqli_num_rows($result2)!=0) {
				$cv = $row2['cv'];
				$pp = $row2['image'];
			}

		    $sql2 = "SELECT 10_marksheet, 12_marksheet, ug_marksheet, pg_marksheet FROM cp_education where id = ".$id;
		    $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Profile Data');
			$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);	
			if (mysqli_num_rows($result2)!=0) {
 				$marksheet_10 = $row2['10_marksheet'];
				$marksheet_12 = $row2['12_marksheet'];
				$ug_marksheet = $row2['ug_marksheet'];
				$pg_marksheet = $row2['pg_marksheet'];	
			}


			echo "<h5>Personal Information</h5>";
			if ($cv!="" || $pp!="") {
				
				if($cv!=""){
				echo'<div class="row">';
				echo'	<div class="col-md-2">';
				echo'		<p class="font-weight-bold">CV</p>';
				echo'	</div>';
				echo'	<div class="col-md-2">';
				echo'		<a href="'.$cv.'" target="_blank">Download</a>';
				echo'	</div>';
				echo'	<div class="col-md-2">';
				echo'		<a href="includes/profile-edit-deleteFile.inc.php?file='.$cv.'&table=cp_personal&col=cv">Delete</a>';
				echo'	</div>';
				echo'</div>';
				}

				if($pp!=""){
				echo'<div class="row">';
				echo'	<div class="col-md-2">';
				echo'		<p class="font-weight-bold">Profile Picture</p>';
				echo'	</div>';
				echo'	<div class="col-md-2">';
				echo'		<a href="'.$pp.'" target="_blank">Download</a>';
				echo'	</div>';
				echo'	<div class="col-md-2">';
				echo'		<a href="includes/profile-edit-deleteFile.inc.php?file='.$pp.'&table=cp_personal&col=image">Delete</a>';
				echo'	</div>';
				echo'</div>';
				}
			}else{
				echo "<p>Files Not Available</p>";
			}

			echo "<h5>Education Information</h5>";
			if($marksheet_10!="" || $marksheet_12!="" || $ug_marksheet!="" || $pg_marksheet!=""){
				
				if($marksheet_10!=""){
				echo'<div class="row">';
				echo'	<div class="col-md-2">';
				echo'		<p class="font-weight-bold">10th Marksheet</p>';
				echo'	</div>';
				echo'	<div class="col-md-2">';
				echo'		<a href="'.$marksheet_10.'" target="_blank">Download</a>';
				echo'	</div>';
				echo'	<div class="col-md-2">';
				echo'		<a href="includes/profile-edit-deleteFile.inc.php?file='.$marksheet_10.'&table=cp_education&col=10_marksheet">Delete</a>';
				echo'	</div>';
				echo'</div>';
				}

				if($marksheet_12!=""){
				echo'<div class="row">';
				echo'	<div class="col-md-2">';
				echo'		<p class="font-weight-bold">12th Marksheet</p>';
				echo'	</div>';
				echo'	<div class="col-md-2">';
				echo'		<a href="'.$marksheet_12.'" target="_blank">Download</a>';
				echo'	</div>';
				echo'	<div class="col-md-2">';
				echo'		<a href="includes/profile-edit-deleteFile.inc.php?file='.$marksheet_12.'&table=cp_education&col=12_marksheet">Delete</a>';
				echo'	</div>';
				echo'</div>';
				}

				if($ug_marksheet!=""){
				echo'<div class="row">';
				echo'	<div class="col-md-2">';
				echo'		<p class="font-weight-bold">UG Marksheet</p>';
				echo'	</div>';
				echo'	<div class="col-md-2">';
				echo'		<a href="'.$ug_marksheet.'" target="_blank">Download</a>';
				echo'	</div>';
				echo'	<div class="col-md-2">';
				echo'		<a href="includes/profile-edit-deleteFile.inc.php?file='.$ug_marksheet.'&table=cp_education&col=ug_marksheet">Delete</a>';
				echo'	</div>';
				echo'</div>';
				}

				if($pg_marksheet!=""){
				echo'<div class="row">';
				echo'	<div class="col-md-2">';
				echo'		<p class="font-weight-bold">PG Marksheet</p>';
				echo'	</div>';
				echo'	<div class="col-md-2">';
				echo'		<a href="'.$pg_marksheet.'" target="_blank">Download</a>';
				echo'	</div>';
				echo'	<div class="col-md-2">';
				echo'		<a href="includes/profile-edit-deleteFile.inc.php?file='.$pg_marksheet.'&table=cp_education&col=pg_marksheet">Delete</a>';
				echo'	</div>';
				echo'</div>';
				}

			}else{
				echo "<p>Files Not Available</p>";
			}

		    $sql2 = "SELECT project_id, title, report FROM cp_projects where id = ".$id;
		    $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Profile Data');
 			
 			echo "<h5>Projects</h5>";
 			$flag=0;
 			if (mysqli_num_rows($result2)!=0) {
				while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
					if($row2['report']!=""){
						$flag = 1;
						echo'<div class="row">';
						echo'	<div class="col-md-4">';
						echo'		<p class="font-weight-bold">'.$row2['title'].'</p>';
						echo'	</div>';
						echo'	<div class="col-md-2">';
						echo'		<a href="'.$row2['report'].'" target="_blank">Download</a>';
						echo'	</div>';
						echo'	<div class="col-md-2">';
						echo'		<a href="includes/profile-edit-deleteFile.inc.php?file='.$row2['report'].'&table=cp_projects&col=report&col2='.$row2['project_id'].'">Delete</a>';
						echo'	</div>';
						echo'</div>';		
					}
				}
			}
			if($flag == 0){
				echo "<p>Files Not Available</p>";
			}

		?>

	<!-- <hr class="my-4"> -->
	</div>
	<div class="mb-5"> 
       <a class="btn btn-danger btn-md" href="userhome.php" role="button">Back</a>';
  	</div>
</div>


</body>
</html>