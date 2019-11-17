<?php	
	include 'connect.inc.php';
	
	$password = "";
	$npassword = "";
	$cpassword = "";
	
	$error=0;
	
	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	
	if(isset($_POST['update'])){

		$sql = "SELECT id, password FROM user WHERE email = '".$session."'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$id = $row['id'];
		$dbPassword = $row['password'];

		$password = mysqli_real_escape_string($con, $_POST['password']);
		$npassword = mysqli_real_escape_string($con, $_POST['npassword']);
		$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

		$hashed_password = sha1($password);
		
		if($hashed_password == $dbPassword){
		
			if ($npassword == $cpassword) {			
				
				$dbNewPassword = sha1($npassword);
				
				$sql = "UPDATE user SET password='$dbNewPassword' WHERE id=$id";
				$check = mysqli_query($con, $sql);
				
				if($check == false){
					$error++;
				}

			}else{
				echo "<script>
						alert('Passwords dont match.');
					  </script>";

				$error++;
			}	

		}else{
			echo "<script>
						alert('Incorrect Current Password');
					  </script>";

			$error++;
		}

		if($error == 0){
			// echo "true!!!!!!!!!!!!!!!!!!!!!!!!!";
			echo "<script>
				alert('Password Updated!');
			  </script>";
			header("refresh:0.01; url = users-settings.php");	
			
		}else{
			// echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
			// echo "<script>
			// 	alert('Something went wrong');
			//   </script>";

			header("refresh:0.01; url = users-settings-updatePassword.php");	
		}

	}
