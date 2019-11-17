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
	<title>Home</title>
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
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
		<a class="navbar-brand" href="#"><img src="img/logo.png" height="30px" width="25px"> IdeaFlare.in</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
			  		<a class="nav-link" href="#">Home</a>
			  	</li>
			  	<li class="nav-item">
			  		<a class="nav-link" href="underConstruction.php">Blogs</a>
			  	</li>
			  	<li class="nav-item">
			  		<a class="nav-link" href="underConstruction.php">Projects</a>
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
	<div id="carousel" class="carousel slide" data-ride="carousel">
	  <ol class="carousel-indicators">
	    <li data-target="#carousel" data-slide-to="0" class="active"></li>
	    <li data-target="#carousel" data-slide-to="1"></li>
	    <li data-target="#carousel" data-slide-to="2"></li>
	  </ol>
	  <div class="carousel-inner">
	    <div class="carousel-item active">
			<img class="d-block w-100" src="img/profile-background.jpg" height="575px" alt="First slide">
			<div class="carousel-caption d-none d-md-block">
				<h3>Profiles</h3>
			    <p>Explore Profiles</p>
			    <a class="btn btn-primary button btn-md" href="displayProfiles.php">Enter</a>
			</div>
	    </div>
	    <div class="carousel-item">
	      	<img class="d-block w-100" src="img/workshop-background.jpg" height="575px" alt="Second slide">
		   	<div class="carousel-caption d-none d-md-block">
			    <h3>Workshops</h3>
			    <p>Attend Workshops conducted by Professionals</p>
				<button class="btn btn-primary btn-md">Enter</button>
			</div>
		</div>
	    <div class="carousel-item">
	     	<img class="d-block w-100" src="img/background.png" height="575px" alt="Third slide">
		    <div class="carousel-caption d-none d-md-block">
				<h3>Patents</h3>
				<p>Explore the Patents</p>  
				<button class="btn btn-primary btn-md">Enter</button>  
			</div>  
	    </div>
	  </div>
	  <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
</div>


<div class="container">
	<div class="jumbotron pt-3 pb-3 mt-4">
		<h3>Profile</h3>
		<hr class="my-4">
		
		<?php

		    include 'includes/connect.inc.php';

		    $sql1 = "SELECT * FROM user WHERE email ='".$session."'";
		    $result1 = mysqli_query($con, $sql1) or die('Error Retrieving User Data');

			$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
		    $id = $row1['id'];


		    $sql2 = "SELECT * FROM cp_personal where id = ".$id;
		    $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Profile Data');

			$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);	

			if ($row1['profile']==1) {
				
				echo'<div class="row">';
				echo'	<div class="col-md-4">';
				if($row2['image'] != ""){
					echo'		<img src="'.$row2['image'].'" width="250px">';
				}else{
					echo'		<img src="img/user.jpg" width="250px">';
				}
				echo'	</div>';

				echo'	<div class="col-md-8">';
				echo'		<div class="row">';
				echo'			<div class="col-xs-6">';
				echo'				<p>';
				echo $row1['firstname'];
				echo'				</p>';
				echo'			</div>';
				echo'			<div class="col-xs-6">';
				echo'				<p>';
				echo $row1['lastname'];
				echo'				</p>';
				echo'			</div>';
				echo'		</div>';

				echo'		<div class="row">';
				echo'			<div class="col-xs-12">';
				echo'				<p>';
				echo $row2['about'];
				echo'				</p>';
				echo'			</div>';
				echo'		</div>';

				echo'		<div class="row">';
				echo'			<div class="col-xs-12">';
				echo'				<p>';
				echo $row1['email'];
				echo'				</p>';
				echo'			</div>';
				echo'		</div>';

				echo'		<div class="row">';
				echo'			<div class="col-xs-12">';
				echo'				<p>';
				echo $row2['contact'];
				echo'				</p>';
				echo'			</div>';
				echo'		</div>';
				echo'	</div>';
				echo'</div>';

				// echo'<div class="row">';
				// echo'	<div class="col-md-4">';
				// echo'		<a href="profile-edit-pp.php">Update Profile Picture</a>';
				// echo'	</div>';
				// echo'</div>';

				echo'<hr class="my-4">';
				echo'		<div class="row">';
				echo'			<div class="col-md-6">';
				echo'<a class="btn btn-primary btn-md button" href="profile-1.php" role="button">See More</a>';
				echo'			</div>';
				echo'			<div class="col-md-6 text-right">';
				echo'<a href="profile-edit-manageFiles.php" >Manage Uploaded Files</a>';
				echo'			</div>';
				echo'		</div>';
			}else{
				echo'<p>Profile Not Available</p>';
				echo'<hr class="my-4">';
				echo'<a class="btn btn-primary btn-md button" href="profile-new-personal.php" role="button">Create Profile</a>';
			}
		?>
		
	</div>
</div>

<div class="container">
	<div class="jumbotron pt-3 pb-3 mt-4">
		<h3>Workshops</h3>
		<hr class="my-4">

	    <?php

	    include 'includes/connect.inc.php';
	    $sql = "SELECT * FROM workshop";
	    $result = mysqli_query($con, $sql) or die('Error Retrieving Data');

	   	if (mysqli_num_rows($result)!=0) {
		    echo '<div class="table-responsive-md">';
		    echo '<table class="table">';
		    echo '  <thead class="thead bg-primary">';
		    echo '    <tr class="d-flex"> <!-- d-flex = allow flex to change column widths -->';
		    echo '      <th scope="col" class="col-5">Title</th>';
		    echo '      <th scope="col" class="col-3">Organization</th>';
		    echo '      <th scope="col" class="col-3">Date</th>';
		    echo '      <th scope="col" class="col-1">Duration</th>';
		    echo '    </tr>';
		    echo '  </thead>';
		    echo '  <tbody>';

		    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			    echo '    <tr class="d-flex">';
			    echo '      <td class="col-5">';
			   	if($row['title'] != ""){
			    echo $row['title'];
			    }else{
			    echo "-";
			    }
			    echo '      </td><td class="col-3">';
			    if($row['org_name'] != ""){
			    echo $row['org_name'];
			    }else{
			      echo "-";
			    }
			    echo '      </td><td class="col-3">';
			    if($row['date'] != "0000-00-00"){
			    echo $row['date'];
			    }else{
			      echo "-";
			    }
			    echo '      </td><td class="col-1">';
			    if($row['duration'] != ""){
			    echo $row['duration'].' Min';
			    }else{
			      echo "-";
			    }
			    echo '      </td>'; 
			    echo '      </tr>';
		    }
		    echo '</tbody> </table> </div>';
		}else{
			echo "<p>No Workshops Available</p>";
		}

	    ?>

		<hr class="my-4">
		<a class="btn btn-primary btn-md button" href="workshop.php" role="button">See More</a>
	</div>
</div>

</body>
</html>


<!-- <div class="container">
	<div class="jumbotron pt-3 pb-3 mt-4">
		<h3>Profile</h3>
		<hr class="my-4">
		

		<div class="row">
			<div class="col-md-4">
				<img src="img/user.jpg" width="250px" height="250px">
			</div>

			<div class="col-md-8">
				<div class="row">
					<div class="col-xs-6">
						<p>Ghosty</p>
					</div>
					<div class="col-xs-6">
						<p>Ghost</p>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12">
						<p>gsbdhnkj gsbhdnkj gwybhdk vwgebhdjnksa rfgbhnjg wfbhnjsakm gebhskja gbchd</p>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12">
						abc@example.com
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12">
						1234567890
					</div>
				</div>
				<div class="row">
					<a href="#">See More</a>				
				</div>
			</div>
		</div>

		<a class="btn btn-primary btn-md button" href="#" role="button">Update Profile</a>	Add this to Else Statement
	</div>
</div>
 -->