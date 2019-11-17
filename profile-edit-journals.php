 <?php 
 	session_start();
 	$session = $_SESSION['email'];
 	if($session==true){

 	}else{
 		header("Location:home.php");
 	}

 ?>
 
<?php include 'includes/profile-edit-journals.inc.php'; ?>

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
			<h3 class="text-center mt-5">Journals</h3>
			<form method="post">
				<?php

			    include 'includes/connect.inc.php';

			    //Get user ID
			    $sql1 = "SELECT id FROM user WHERE email ='".$session."'";
			    $result1 = mysqli_query($con, $sql1) or die('Error Retrieving User Data');
				$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);

				$id = $row1['id'];

				//Get data
				$sql3 = "SELECT * FROM cp_journals WHERE id = " .$id;
			    $result3 = mysqli_query($con, $sql3) or die('Error Retrieving Journal Data');

			    //Get Count         
	          	$journal_count = 0;
        	  	while($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) { $journal_count++; }

        	  	$result3 = mysqli_query($con, $sql3) or die('Error Retrieving Journal Data'); // for displaying the result
			          
				// echo'<h5 class="mt-5">Projects:</h5>';
	          	echo '<input type="hidden" class="form-control" name="journal_count" value="'.$journal_count.'" required >';

				if (mysqli_num_rows($result3)!=0){
		        	$flag = 0;
		            while($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
						echo'<div id="field_journal">';
						echo'	<div class="form-group">';
						echo'		<div class="row">';
						echo'			<div class="form-group col-md-6">';
						echo'				<label for="journal_name">Journal Name:</label> ';
						echo'			</div>';
						echo'			<div class="form-group col-md-6">';
						echo'				<input class="form-control" type="text" name="journal_name[]" value="'.$row3['name'].'">';
						echo'            </div>';
						echo'        </div>';
						echo'        <div class="row">';
						echo'            <div class="form-group col-md-6">';
						echo'            	<label for="journal_link">Journal Link:</label>';
						echo'            </div>				';
						echo'			<div class="form-group col-md-6">';
						echo'				<input class="form-control" type="text" name="journal_link[]" value="'.$row3['link'].'">';
						echo'            </div>';
						echo'		</div>';
						echo'        <div class="row">';
						echo'            <div class="form-group col-md-6">';
						echo'            	<label for="journal_authority">Journal Authority:</label>';
						echo'            </div>				';
						echo'			<div class="form-group col-md-6">';
						echo'				<input class="form-control" type="text" name="journal_authority[]" value="'.$row3['authority'].'">';
						echo'            </div>';
						echo'		</div>';
						echo'        <div class="row">';
						echo'			<div class="form-group col-md-6">';
						echo'				<label for="journal_date">Journal Date:</label> ';
						echo'			</div>';
						echo'			<div class="form-group col-md-6">';
						echo'				<input class="form-control" type="date" name="journal_date[]" value="'.$row3['date'].'">';
						echo'            </div>';
						echo'        </div>';
						echo'        <div class="row">';
						echo'			<div class="form-group col-md-6">';
						echo'				<label for="journal_details">Journal Details:</label> ';
						echo'			</div>';
						echo'			<div class="form-group col-md-6">';
						echo'				<textarea name="journal_details[]" class="form-control" rows="3" placeholder="max 200 characters">'.$row3['details'].'</textarea>';
						echo'            </div>';
						echo'        </div>';
						echo'	</div>';
						
						echo'  <a href="includes/profile-delete-journal.inc.php?id='.$row3['id'].'&journal_id='.$row3['journal_id'].'">Delete</a>';
		              	echo'  <br>';

						if($flag==0){
							echo'	<a href="#" id="add_journal">+Add More</a>';
							$flag++;
						}
						echo'</div>			';
			
					
					}
				}else{
			
					echo'<div id="field_journal">';
					echo'	<div class="form-group">';
					echo'		<div class="row">';
					echo'			<div class="form-group col-md-6">';
					echo'				<label for="journal_name">Journal Name:</label> ';
					echo'			</div>';
					echo'			<div class="form-group col-md-6">';
					echo'				<input class="form-control" type="text" name="journal_name[]">';
					echo'            </div>';
					echo'        </div>';
					echo'        <div class="row">';
					echo'            <div class="form-group col-md-6">';
					echo'            	<label for="journal_link">Journal Link:</label>';
					echo'            </div>				';
					echo'			<div class="form-group col-md-6">';
					echo'				<input class="form-control" type="text" name="journal_link[]">';
					echo'            </div>';
					echo'		</div>';
					echo'        <div class="row">';
					echo'            <div class="form-group col-md-6">';
					echo'            	<label for="journal_authority">Journal Authority:</label>';
					echo'            </div>				';
					echo'			<div class="form-group col-md-6">';
					echo'				<input class="form-control" type="text" name="journal_authority[]">';
					echo'            </div>';
					echo'		</div>';
					echo'        <div class="row">';
					echo'			<div class="form-group col-md-6">';
					echo'				<label for="journal_date">Journal Date:</label> ';
					echo'			</div>';
					echo'			<div class="form-group col-md-6">';
					echo'				<input class="form-control" type="date" name="journal_date[]">';
					echo'            </div>';
					echo'        </div>';
					echo'        <div class="row">';
					echo'			<div class="form-group col-md-6">';
					echo'				<label for="journal_details">Journal Details:</label> ';
					echo'			</div>';
					echo'			<div class="form-group col-md-6">';
					echo'				<textarea name="journal_details[]" class="form-control" rows="3" placeholder="max 200 characters"></textarea>';
					echo'            </div>';
					echo'        </div>';
					echo'	</div>';

					echo'	<a href="#" id="add_journal">+Add More</a>';
					echo'</div>			';

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

<script type="text/javascript" src="js/add_journal.js"></script>

</body>
</html>