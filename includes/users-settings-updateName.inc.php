<?php	
	include 'connect.inc.php';
	
	$firstname = "";
	$lastname = "";
	
	$error=0;
	
	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	
	if(isset($_POST['update'])){

		$sql = "SELECT id FROM user WHERE email = '".$session."'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$id = $row['id'];

		$firstname = mysqli_real_escape_string($con, $_POST['fname']);
		$lastname = mysqli_real_escape_string($con, $_POST['lname']);
		
		$sql = "UPDATE user SET firstname='$firstname', lastname='$lastname' WHERE id=$id";
		$check = mysqli_query($con, $sql);

		if($check == false){
			$error++;
		}


		if($error == 0){
			// echo "true!!!!!!!!!!!!!!!!!!!!!!!!!";
			echo "<script>
				alert('Name Updated');
			  </script>";
			header("Location: users-settings.php");	
			
		}else{
			// echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
			echo "<script>
				alert('Something went wrong');
			  </script>";

			header("refresh:0.01; url = users-settings-updateName.php");	
		}

	}

?>