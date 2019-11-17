<?php
	// session_start();
	include 'connect.inc.php';

	$name = "";
	$email = "";
	$contact = "";
	$message = "";

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	if(isset($_POST['submit'])){
		
		$name = mysqli_real_escape_string($con, $_POST['name']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$contact = mysqli_real_escape_string($con, $_POST['contact']);
		$message = mysqli_real_escape_string($con, $_POST['message']);
		
		// echo "bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb";

		$sql1 = "INSERT INTO feedback (name, email, contact, message) 
		VALUES ('$name', '$email', '$contact', '$message')";
		
		$check1 = mysqli_query($con, $sql1);

		if($check1 == true){
			// echo "true!!!!!!!!!!!!!!!!!!!!!!!!!";
			 echo "<script>
				alert('Feedback Submitted!');
			  </script>";

			header("refresh:0.01; url = home.php");		
			
		}else{
			// echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
			 echo "<script>
				alert('Something went wrong');
			  </script>";

			header("refresh:0.01; url = feedback.php");	
		}

	}

?>