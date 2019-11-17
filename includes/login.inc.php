<?php
	
	$error = array();
	$email = "";
	$password = "";
	$type = "";
	include 'connect.inc.php';

	if(isset($_POST["login"])){

		$email = $_POST["email"];
		$password = $_POST["password"];
		$password1 = sha1($password);

		$sql = "SELECT * FROM user WHERE email = '$email' and password = '$password1'";
		$result = mysqli_query($con, $sql);
		$resultCheck = mysqli_num_rows($result);
		
		$sql1 = "SELECT type  FROM user WHERE email = '$email'";
		$result1 = mysqli_query($con, $sql1);
		$row = mysqli_fetch_array($result1);
		$type = $row[0];

		if($resultCheck == 0){
			echo '<script language="javascript">';
			echo 'alert("Email ID and Password dont match.")';
			echo '</script>';
		}else if($type == "user"){
			//echo "uuuuuuuuusssssssssssseeeeeeeeeeeeeerrrrrrrrrrrr";
			session_start();
			$_SESSION['email'] = $email;
			header("Location: userhome.php?login=success");	
		}else if($type == "investor"){
			//echo "iiiinnnnvvvveeeeessssstttttooooorrrrrr";
			session_start();
			$_SESSION['email'] = $email;
			header("Location: home.php?login=success");			///////////////////////////////////CHANGE THE PAGE LINK TO INVESTOR PAGE	
		}else if($type == "admin"){
			//echo "iiiinnnnvvvveeeeessssstttttooooorrrrrr";
			session_start();
			$_SESSION['email'] = $email;
			header("Location: adminhome.php?login=success");	///////////////////////////////////CHANGE THE PAGE LINK TO ADMIN PAGE	
		}

	}

?>