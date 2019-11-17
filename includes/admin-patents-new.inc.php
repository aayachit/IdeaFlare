<?php
	// session_start();
	include 'connect.inc.php';

	$name = "";
	$authority = "";
	$description = "";
	$app_no = "";

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	if(isset($_POST['add'])){
		
		$name = mysqli_real_escape_string($con, $_POST['name']);
		$authority = mysqli_real_escape_string($con, $_POST['authority']);
		$app_no = mysqli_real_escape_string($con, $_POST['app_no']);
		$description = mysqli_real_escape_string($con, $_POST['description']);
		
		// echo "bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb";

		$sql1 = "INSERT INTO patents (name, authority, app_no, description) 
		VALUES ('$name', '$authority', '$app_no', '$description')";
		
		$check1 = mysqli_query($con, $sql1) or die('Something went wrong');

		if($check1 == true){
			// echo "true!!!!!!!!!!!!!!!!!!!!!!!!!";

			header("Location: admin-patents.php");	
			
		}else{
			// echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
			 echo "<script>
				alert('Something went wrong');
			  </script>";

			header("refresh:0.01; url = admin-patents-new.php");	
		}

	}

?>