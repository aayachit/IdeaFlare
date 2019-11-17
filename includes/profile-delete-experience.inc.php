<?php
	include 'connect.inc.php';

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";

	$id = $_GET['id'];	
	$experience_id = $_GET['experience_id'];	

	$sql1 = "DELETE FROM cp_experience WHERE id = $id and experience_id= $experience_id";

	$check1 = mysqli_query($con, $sql1) or die('Something went wrong');

	if($check1 == true){
		// echo "true!!!!!!!!!!!!!!!!!!!!!!!!!";

		header("Location: ../profile-1.php");	
		
	}else{
		// echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
		 echo "<script>
			alert('Something went wrong');
		  </script>";

		header("refresh:0.01; url = ../profile-1.php");	
	}



?>