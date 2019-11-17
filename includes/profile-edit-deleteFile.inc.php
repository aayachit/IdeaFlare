
<?php
	
	error_reporting(0);	//if file not available
 	session_start();
 	$session = $_SESSION['email'];
 	if($session==true){

 	}else{
 		header("Location:home.php");
 	}

	$error = 0;

	include 'connect.inc.php';

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	$sql = "SELECT id FROM user WHERE email ='".$session."'";
    $result = mysqli_query($con, $sql) or die('Error Retrieving User Data');
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $id = $row['id'];

	$file = $_GET['file'];	
	$table= $_GET['table'];
	$col = $_GET['col'];
	if($table == "cp_projects"){
		$col2 = $_GET['col2'];
		
		unlink(dirname(__FILE__)."/../".$file);
	   	$sql1 = "UPDATE $table SET $col='' WHERE id=$id and project_id=$col2";
		$check1 = mysqli_query($con, $sql1) or die('Something went wrong');
		if(!$check1){
			$error++;
		}
	}else{
		unlink(dirname(__FILE__)."/../".$file);
	   	$sql1 = "UPDATE $table SET $col='' WHERE id=$id";
		$check1 = mysqli_query($con, $sql1) or die('Something went wrong');
		if(!$check1){
			$error++;
		}

	}


	if($error == 0){
		// echo "true!!!!!!!!!!!!!!!!!!!!!!!!!";
 		echo "<script>
			alert('File Deleted');
		  </script>";
		header("refresh:0.01; url = ../profile-edit-manageFiles.php");	
		
	}else{
		// echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
		 echo "<script>
			alert('Something went wrong');
		  </script>";

		header("refresh:0.01; url = ../profile-edit-manageFiles.php");	
	}



?>