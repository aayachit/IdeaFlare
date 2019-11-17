<?php
	session_start();
	include 'connect.inc.php';

	$name = "";
	$authority = "";
	$description = "";
	$app_no = "";
	$patent_id = "";

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	if(isset($_POST['update'])){
		
		$name = mysqli_real_escape_string($con, $_POST['name']);
		$authority = mysqli_real_escape_string($con, $_POST['authority']);
		$app_no = mysqli_real_escape_string($con, $_POST['app_no']);
		$description = mysqli_real_escape_string($con, $_POST['description']);
		$patent_id = mysqli_real_escape_string($con, $_POST['id']);
		// echo "bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb";

		$sql1 = "UPDATE patents SET name='$name', authority='$authority', app_no='$app_no', description='$description' WHERE id=$patent_id"; 
		
		$check1 = mysqli_query($con, $sql1) or die('Something went wrong');

		if($check1 == true){
			// echo "true!!!!!!!!!!!!!!!!!!!!!!!!!";

			header("Location: admin-patents.php");	
			
		}else{
			// echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
			 echo "<script>
				alert('Something went wrong');
			  </script>";

			header("refresh:0.01; url = admin-patents.php");	
		}

	}

?>