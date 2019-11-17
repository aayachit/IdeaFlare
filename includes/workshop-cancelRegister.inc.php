<?php


	session_start();
		$session = $_SESSION['email'];
		if($session==true){

		}else{
		header("Location:home.php");
	}

	include 'connect.inc.php';
	$user_id = "";
	$workshop_id = "";

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	$sql = "SELECT id FROM user WHERE email = '".$session."'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$user_id = $row['id'];

	$workshop_id = $_GET['workshop_id'];
	
	$sql2 = "DELETE FROM workshop_registration WHERE workshop_id=$workshop_id AND user_id = $user_id"; 
	$check2 = mysqli_query($con, $sql2);
	
	if($check2 == true){
		//echo "true!!!!!!!!!!!!!!!!!!!!!!!!!";
		echo "<script>
			alert('Registration Canceled');
		  </script>";
		header("refresh:0.01; url = ../workshop-details.php?id=$workshop_id");	
		
	}else{
		//echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
		 echo "<script>
			alert('Something went wrong');
		  </script>";

		header("refresh:0.01; url = ../workshop-details.php?id=$workshop_id");	
	}

?>