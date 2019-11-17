<?php
	
	include 'connect.inc.php';

	$error = array();
	$firstname = "";
	$lastname = "";
	$email = "";
	$password_1 = "";
	$password_2 = "";
	$type = "";
	//echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	if(isset($_POST['register'])){
		$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$password_1 = mysqli_real_escape_string($con, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($con, $_POST['password_2']);
		$type = mysqli_real_escape_string($con, $_POST['type']);
		
		//echo "bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb";

		$sql = "SELECT * FROM user WHERE email = '$email'";
		$result = mysqli_query($con, $sql);
		$resultCheck = mysqli_num_rows($result);

		if ($resultCheck > 0) {
			array_push($error, "");
			echo "<script>
					alert('Email Already Registered.');
				  </script>";
		}

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				array_push($error, "");
				echo "<script>
						alert('Enter valid email.');
					  </script>";
			}				
		

		if ($password_1 != $password_2) {			
				array_push($error, "");
				echo "<script>
						alert('Passwords dont match.');
					  </script>";
		}

		if(count($error) == 0) {
			//echo "cccccccccccccccccccccccccc";
			$password = sha1($password_1);
			$sql = "INSERT INTO user (firstname,lastname, email, password, type, profile) 
			VALUES ('$firstname', '$lastname', '$email', '$password', '$type', '0')";

			$check = mysqli_query($con, $sql);

			if($check ==true){
				//echo "true!!!!!!!!!!!!!!!!!!!!!!!!!";

				echo "<script>
						alert('Registration Successful');
					  </script>";

				if($type == "user"){
					//echo "uuuuuuuuusssssssssssseeeeeeeeeeeeeerrrrrrrrrrrr";
					session_start();
					$_SESSION['email'] = $email;
					array_push($error, "");

					header("Location: userhome.php?login=success");	
				}else if($type == "investor"){
					session_start();
					$_SESSION['email'] = $email;
					array_push($error, "");
					
					header("Location: home.php?login=success");		///////////////////////////////////CHANGE THE PAGE LINK TO INVESTOR PAGE	
				}
			}else{
				//echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
				echo "<script>
					alert('Registration Unsuccessful');
				  </script>";

				header("refresh:0.01; url = register.php");	
			}


		}

	}




?>