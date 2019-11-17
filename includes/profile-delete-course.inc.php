<?php
	include 'connect.inc.php';

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";

	$id = $_GET['id'];	
	$course_id = $_GET['course_id'];	

	$sql1 = "DELETE FROM cp_courses WHERE id = $id and course_id= $course_id";

	$check1 = mysqli_query($con, $sql1) or die('Something went wrong');

	if($check1 == true){
		// echo "true!!!!!!!!!!!!!!!!!!!!!!!!!";

		header("Location: ../profile-2.php");	
		
	}else{
		// echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
		 echo "<script>
			alert('Something went wrong');
		  </script>";

		header("refresh:0.01; url = ../profile-2.php");	
	}



?>