
<?php
	
	error_reporting(0);	//if file not available
 	// session_start();
 	// $session = $_SESSION['email'];
 	// if($session==true){

 	// }else{
 	// 	header("Location:home.php");
 	// }

	$error = 0;

	include 'connect.inc.php';

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";

	$id = $_GET['id'];
	$file = $_GET['file'];	

	unlink(dirname(__FILE__)."/../".$file);
	// echo dirname(__FILE__)."/../".$file;
   	$sql1 = "UPDATE workshop SET pdf='' WHERE id=$id";
	$check1 = mysqli_query($con, $sql1) or die('Something went wrong');
	if(!$check1){
		$error++;
	}


    

	if($error == 0){
		// echo "true!!!!!!!!!!!!!!!!!!!!!!!!!";
 		echo "<script>
			alert('File Deleted');
		  </script>";
		header("refresh:0.01; url = ../admin/admin-workshop-details.php?id=$id");	
		
	}else{
		// echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
		 echo "<script>
			alert('Something went wrong');
		  </script>";

		header("refresh:0.01; url = ../admin/admin-workshop-details.php?id=$id");	
	}



?>