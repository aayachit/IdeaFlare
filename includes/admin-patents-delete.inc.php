<?php
	include 'connect.inc.php';

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";

	$patent_id = $_GET['id'];	

	$sql1 = "DELETE FROM patents WHERE id = $patent_id";
	
	$check1 = mysqli_query($con, $sql1) or die('Something went wrong');

	if($check1 == true){
		// echo "true!!!!!!!!!!!!!!!!!!!!!!!!!";
		echo "<script>
			alert('Patent Deleted!');
		  </script>";

		header("refresh:0.01; url = ../admin/admin-patents.php");	
				
	}else{
		// echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
		echo "<script>
			alert('Something went wrong');
		  </script>";

		header("refresh:0.01; url = ../admin/admin-patents.php");	
	}



?>