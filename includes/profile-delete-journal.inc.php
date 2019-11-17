<?php
	include 'connect.inc.php';

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";

	$id = $_GET['id'];	
	$journal_id = $_GET['journal_id'];	

	$sql1 = "DELETE FROM cp_journals WHERE id = $id and journal_id= $journal_id";

	$check1 = mysqli_query($con, $sql1) or die('Something went wrong');

	if($check1 == true){
		// echo "true!!!!!!!!!!!!!!!!!!!!!!!!!";

		header("Location: ../profile-3.php");	
		
	}else{
		// echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
		 echo "<script>
			alert('Something went wrong');
		  </script>";

		header("refresh:0.01; url = ../profile-3.php");	
	}



?>