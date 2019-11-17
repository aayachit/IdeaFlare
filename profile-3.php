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
	<link href="css/header.css" rel="stylesheet">

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



<div class="container">
	<div class="header-content">
		<h1 class="text-center">Profile</h1>
	</div>

	<h2 class="text-center mt-4">Publications</h2>
	
	<div class="jumbotron pt-3 mt-4">
		<h3>Journals</h3>
		<hr class="my-4">


		<?php

	    include 'includes/connect.inc.php';
	
	  	$sql1 = "SELECT * FROM user WHERE email ='".$session."'";
	    $result1 = mysqli_query($con, $sql1) or die('Error Retrieving User Data');

		$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
	    $id = $row1['id'];

	    $sql2 = "SELECT * FROM cp_journals WHERE id = ".$id;
	    $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Journal Data');

		//arrange journal_id in ascending order to avoid errors
	    $i = 1;
	    while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
	      $sql3 = "UPDATE cp_journals SET journal_id = $i WHERE id=$id and link = '". $row2['link'] ."'";
	      $result3 = mysqli_query($con, $sql3) or die('Error Retrieving Journal Data');
	      if($result3 == false){
	        echo "Something Went Wrong";  
	      }
	      $i++;
	    }  

   		$result2 = mysqli_query($con, $sql2) or die('Error Retrieving Journal Data');

	    $journal_count = 1;

	    if (mysqli_num_rows($result2)!=0) {
		
			while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
				echo'<div class="row">';
				echo'	<div class="col-md-12">';
				echo'		<p class="font-weight-bold">Journal';
				echo ' ' . $journal_count++;
				echo'		</p>';
				echo'	</div>	';
				echo'</div>	';

				echo'<div class="row">';
				echo'	<div class="col-md-2 font-weight-bold">';
				echo'		<p>Name:</p>';
				echo'	</div>';
				echo'	<div class="col-md-10">';
				echo'		<p>';
				if($row['name']!=""){
				echo $row['name'];
				}else{
				echo "-";
				}
				echo'		</p>';
				echo'	</div>';
				echo'</div>';

				echo'<div class="row">';
				echo'	<div class="col-md-2 font-weight-bold">';
				echo'		<p>Authority:</p>';
				echo'	</div>';
				echo'	<div class="col-md-10">';
				echo'		<p>';
				if($row['authority']!=""){
				echo $row['authority'];
				}else{
				echo "-";
				}
				echo'		</p>';
				echo'	</div>';
				echo'</div>';
				
				echo'<div class="row">';
				echo'	<div class="col-md-2 font-weight-bold">';
				echo'		<p>Date:</p>';
				echo'	</div>';
				echo'	<div class="col-md-10">';
				echo'		<p>';
				if($row['date']!="0000-00-00"){
				echo $row['date'];
				}else{
				echo "-";
				}
				echo'		</p>';
				echo'	</div>';
				echo'</div>';

				echo'<div class="row">';
				echo'	<div class="col-md-2 font-weight-bold">';
				echo'		<p>Link:</p>';
				echo'	</div>';
				echo'	<div class="col-md-10">';
				echo'		<p>';
				if($row['link']!=""){
				echo $row['link'];
				}else{
				echo "-";
				}
				echo'		</p>';
				echo'	</div>';
				echo'</div>';

				echo'<div class="row">';
				echo'	<div class="col-md-2 font-weight-bold">';
				echo'		<p>Details:</p>';
				echo'	</div>';
				echo'	<div class="col-md-10">';
				echo'		<p>';
				if($row['details']!=""){
				echo $row['details'];
				}else{
				echo "-";
				}
				echo'		</p>';
				echo'	</div>';
				echo'</div>';

				echo'<hr class="my-4">';

	    	}
	    }else {
	      echo "<p>No Journals Available</p>";
	    }

	    ?>

	<div class="text-right"> 
       <a class="btn btn-primary btn-md" href="profile-edit-journals.php" role="button">Edit</a>';
  	</div>

	</div>

	<div class="jumbotron pt-3 mt-4">
		<h3>Patents</h3>
		<hr class="my-4">

		<?php

	    $sql2 = "SELECT * FROM cp_patents WHERE id = ".$id;
	    $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Profile Data');

		//arrange patnet_id in ascending order to avoid errors
	    $i = 1;
	    while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
	      $sql3 = "UPDATE cp_patents SET patent_id = $i WHERE id=$id and number = '". $row2['number'] ."'";
	      $result3 = mysqli_query($con, $sql3) or die('Error Retrieving Patent Data');
	      if($result3 == false){
	        echo "Something Went Wrong";  
	      }
	      $i++;
	    }  
		
		$result2 = mysqli_query($con, $sql2) or die('Error Retrieving Profile Data');
	    
	    $patent_count = 1;

	    if (mysqli_num_rows($result2)!=0) {
			while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
				echo'<div class="row">';
				echo'	<div class="col-md-12">';
				echo'		<p class="font-weight-bold">Patent';
				echo ' '. $patent_count++;
				echo'		</p>';
				echo'	</div>	';
				echo'</div>	';

				echo'<div class="row">';
				echo'	<div class="col-md-2 font-weight-bold">';
				echo'		<p>Title:</p>';
				echo'	</div>';
				echo'	<div class="col-md-10">';
				echo'		<p>';
				if($row['name']!=""){
				echo $row['name'];
				}else{
				echo "-";
				}
				echo'		</p>';
				echo'	</div>';
				echo'</div>';

				echo'<div class="row">';
				echo'	<div class="col-md-2 font-weight-bold">';
				echo'		<p>Authority:</p>';
				echo'	</div>';
				echo'	<div class="col-md-10">';
				echo'		<p>';
				if($row['authority']!=""){
				echo $row['authority'];
				}else{
				echo "-";
				}
				echo'		</p>';
				echo'	</div>';
				echo'</div>';


				echo'<div class="row">';
				echo'	<div class="col-md-2 font-weight-bold">';
				echo'		<p>Certification No:</p>';
				echo'	</div>';
				echo'	<div class="col-md-10">';
				echo'		<p>';
				if($row['number']!=""){
				echo $row['number'];
				}else{
				echo "-";
				}
				echo'		</p>';
				echo'	</div>';
				echo'</div>';

				echo'<div class="row">';
				echo'	<div class="col-md-2 font-weight-bold">';
				echo'		<p>Date:</p>';
				echo'	</div>';
				echo'	<div class="col-md-10">';
				echo'		<p>';
				if($row['date']!="0000-00-00"){
				echo $row['date'];
				}else{
				echo "-";
				}
				echo'		</p>';
				echo'	</div>';
				echo'</div>';

				echo'<div class="row">';
				echo'	<div class="col-md-2 font-weight-bold">';
				echo'		<p>Link:</p>';
				echo'	</div>';
				echo'	<div class="col-md-10">';
				echo'		<p>';
				if($row['link']!=""){
				echo $row['link'];
				}else{
				echo "-";
				}
				echo'		</p>';
				echo'	</div>';
				echo'</div>';

				echo'<div class="row">';
				echo'	<div class="col-md-2 font-weight-bold">';
				echo'		<p>Details:</p>';
				echo'	</div>';
				echo'	<div class="col-md-10">';
				echo'		<p>';
				if($row['details']!=""){
				echo $row['details'];
				}else{
				echo "-";
				}
				echo'		</p>';
				echo'	</div>';
				echo'</div>';

				echo'<hr class="my-4">';			

	    	}

	    }else {
	      echo "<p>No Patents Available</p>";
	    }

	    ?>
	
	<div class="text-right"> 
       <a class="btn btn-primary btn-md" href="profile-edit-patents.php" role="button">Edit</a>';
  	</div>

	</div>

	<div class="jumbotron pt-3 mt-4">
		<h3>Research Articles</h3>
		<hr class="my-4">

		<?php

	    $sql2 = "SELECT * FROM cp_articles WHERE id = ".$id;
	    $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Profile Data');

		//arrange article_id in ascending order to avoid errors
	    $i = 1;
	    while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
	      $sql3 = "UPDATE cp_articles SET article_id = $i WHERE id=$id and number = '". $row2['number'] ."'";
	      $result3 = mysqli_query($con, $sql3) or die('Error Retrieving Article Data');
	      if($result3 == false){
	        echo "Something Went Wrong";  
	      }
	      $i++;
	    }  

		$result2 = mysqli_query($con, $sql2) or die('Error Retrieving Profile Data');

		$article_count = 1;
	    
	    if (mysqli_num_rows($result2)!=0) {
			while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
				echo'<div class="row">';
				echo'	<div class="col-md-12">';
				echo'		<p class="font-weight-bold">Article';
				echo ' '. $article_count++;
				echo'		</p>';
				echo'	</div>	';
				echo'</div>	';

				echo'<div class="row">';
				echo'	<div class="col-md-2 font-weight-bold">';
				echo'		<p>Title:</p>';
				echo'	</div>';
				echo'	<div class="col-md-10">';
				echo'		<p>';
				if($row['name']!=""){
				echo $row['name'];
				}else{
				echo "-";
				}
				echo'		</p>';
				echo'	</div>';
				echo'</div>';

				echo'<div class="row">';
				echo'	<div class="col-md-2 font-weight-bold">';
				echo'		<p>Authority:</p>';
				echo'	</div>';
				echo'	<div class="col-md-10">';
				echo'		<p>';
				if($row['authority']!=""){
				echo $row['authority'];
				}else{
				echo "-";
				}
				echo'		</p>';
				echo'	</div>';
				echo'</div>';


				echo'<div class="row">';
				echo'	<div class="col-md-2 font-weight-bold">';
				echo'		<p>Certification No:</p>';
				echo'	</div>';
				echo'	<div class="col-md-10">';
				echo'		<p>';
				if($row['number']!=""){
				echo $row['number'];
				}else{
				echo "-";
				}
				echo'		</p>';
				echo'	</div>';
				echo'</div>';

				echo'<div class="row">';
				echo'	<div class="col-md-2 font-weight-bold">';
				echo'		<p>Date:</p>';
				echo'	</div>';
				echo'	<div class="col-md-10">';
				echo'		<p>';
				if($row['date']!="0000-00-00"){
				echo $row['date'];
				}else{
				echo "-";
				}
				echo'		</p>';
				echo'	</div>';
				echo'</div>';

				echo'<div class="row">';
				echo'	<div class="col-md-2 font-weight-bold">';
				echo'		<p>Link:</p>';
				echo'	</div>';
				echo'	<div class="col-md-10">';
				echo'		<p>';
				if($row['link']!=""){
				echo $row['link'];
				}else{
				echo "-";
				}
				echo'		</p>';
				echo'	</div>';
				echo'</div>';

				echo'<div class="row">';
				echo'	<div class="col-md-2 font-weight-bold">';
				echo'		<p>Details:</p>';
				echo'	</div>';
				echo'	<div class="col-md-10">';
				echo'		<p>';
				if($row['details']!=""){
				echo $row['details'];
				}else{
				echo "-";
				}
				echo'		</p>';
				echo'	</div>';
				echo'</div>';

				echo'<hr class="my-4">';			

	    	}

	    }else {
	      echo "<p>No Articles Available</p>";
	    }

	    ?>
		
	<div class="text-right"> 
       <a class="btn btn-primary btn-md" href="profile-edit-articles.php" role="button">Edit</a>';
  	</div>

	</div>

	<div class="mb-5"> 
	    <a href="profile-2.php" class="btn btn-danger button btn-md">Back</a>
	</div>

</div>




<!-- <div class="container">
	<div class="header-content">
		<h1 class="text-center">Profile</h1>
	</div>

	<h2 class="text-center mt-4">Publications</h2>
	
	<div class="jumbotron pt-3 mt-4">
		<h3>Journals</h3>
		<hr class="my-4">

		<div class="row">
			<div class="col-md-12">
				<p class="font-weight-bold">Journal# 1</p>
			</div>	
		</div>	

		<div class="row">
			<div class="col-md-2 font-weight-bold">
				<p>Name:</p>
			</div>
			<div class="col-md-10">
				<p>Very cool Book/journal</p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2 font-weight-bold">
				<p>Authority:</p>
			</div>
			<div class="col-md-10">
				<p>School of Certificates</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 font-weight-bold">
				<p>Date:</p>
			</div>
			<div class="col-md-10">
				<p>2/10/2019</p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2 font-weight-bold">
				<p>Link:</p>
			</div>
			<div class="col-md-10">
				<p>something.com</p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2 font-weight-bold">
				<p>Details:</p>
			</div>
			<div class="col-md-10">
				<p>waesghjkmlqg hbnkdbhnjsgfhjghbjnrkjnwkhbnjkflgjkldcg bhnjmk</p>
			</div>
		</div>

		<hr class="my-4">

	</div>

	<div class="jumbotron pt-3 mt-4">
		<h3>Patents</h3>
		<hr class="my-4">

		<div class="row">
			<div class="col-md-12">
				<p class="font-weight-bold">Patent# 1</p>
			</div>	
		</div>	

		<div class="row">
			<div class="col-md-2 font-weight-bold">
				<p>Title:</p>
			</div>
			<div class="col-md-10">
				<p>Very cool Patent</p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2 font-weight-bold">
				<p>Authority:</p>
			</div>
			<div class="col-md-10">
				<p>School of Course</p>
			</div>
		</div>


		<div class="row">
			<div class="col-md-2 font-weight-bold">
				<p>Patent Number:</p>
			</div>
			<div class="col-md-10">
				<p>34567890</p>
			</div>
		</div>


		<div class="row">
			<div class="col-md-2 font-weight-bold">
				<p>Date:</p>
			</div>
			<div class="col-md-10">
				<p>2/10/2019</p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2 font-weight-bold">
				<p>Patent Link:</p>
			</div>
			<div class="col-md-10">
				<p>something.com</p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2 font-weight-bold">
				<p>Details:</p>
			</div>
			<div class="col-md-10">
				<p>waesghjkmlqg hbnkdbhnjsgfhjghbjnrkjnwkhbnjkflgjkldcg bhnjmk</p>
			</div>
		</div>

		<hr class="my-4">

	</div>

	<div class="jumbotron pt-3 mt-4">
		<h3>Research Articles</h3>
		<hr class="my-4">

		<div class="row">
			<div class="col-md-12">
				<p class="font-weight-bold">Article# 1</p>
			</div>	
		</div>	

		<div class="row">
			<div class="col-md-2 font-weight-bold">
				<p>Title:</p>
			</div>
			<div class="col-md-10">
				<p>Very cool Workshop</p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2 font-weight-bold">
				<p>Authority:</p>
			</div>
			<div class="col-md-10">
				<p>School of Workshops</p>
			</div>
		</div>


		<div class="row">
			<div class="col-md-2 font-weight-bold">
				<p>Article Number:</p>
			</div>
			<div class="col-md-10">
				<p>34567890</p>
			</div>
		</div>


		<div class="row">
			<div class="col-md-2 font-weight-bold">
				<p>Date:</p>
			</div>
			<div class="col-md-10">
				<p>2/10/2019</p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2 font-weight-bold">
				<p>Article Link:</p>
			</div>
			<div class="col-md-10">
				<p>something.com</p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-2 font-weight-bold">
				<p>Details:</p>
			</div>
			<div class="col-md-10">
				<p>waesghjkmlqg hbnkdbhnjsgfhjghbjnrkjnwkhbnjkflgjkldcg bhnjmk</p>
			</div>
		</div>

		<hr class="my-4">

	</div>

	<div class="text-right mb-5"> 
	    <a href="profile-3.php" class="btn btn-primary button btn-md">Next</a>
	</div>

</div> -->

</body>
</html>