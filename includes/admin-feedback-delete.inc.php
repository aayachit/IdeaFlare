<?php
	include 'connect.inc.php';

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";

	$id = $_GET['id'];	

	$sql1 = "DELETE FROM feedback WHERE id = $id";
	
	$check1 = mysqli_query($con, $sql1);

	if($check1 == true){
		// echo "true!!!!!!!!!!!!!!!!!!!!!!!!!";
		echo "<script>
			alert('Feedback Deleted!');
		  </script>";

		header("refresh:0.01; url = ../admin/admin-feedback.php");	
				
	}else{
		// echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
		 echo "<script>
			alert('Something went wrong');
		  </script>";

		header("refresh:0.01; url = ../admin/admin-feedback.php");	
	}



?>