<?php
	error_reporting(0);	//if file not available

	include 'connect.inc.php';

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";


	$workshop_id = $_GET['id'];	

	$sql = "SELECT pdf,image FROM workshop WHERE id =".$workshop_id;
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);	
    
    $file1 = $row['pdf'];
    $file2 = $row['image'];
	unlink(dirname(__FILE__)."/../".$file1);	
	unlink(dirname(__FILE__)."/../".$file2);	
    
    $folder = "uploads/workshops/".$workshop_id;
    rmdir(dirname(__FILE__)."/../".$folder);

	$sql1 = "DELETE FROM workshop WHERE id = $workshop_id";
	$sql2 = "DELETE FROM workshop_instructor WHERE id = $workshop_id";

	$check1 = mysqli_query($con, $sql1) or die('Something went wrong');
	$check2 = mysqli_query($con, $sql2) or die('Something went wrong');	

	if($check1 == true){
		// echo "true!!!!!!!!!!!!!!!!!!!!!!!!!";
 		echo "<script>
			alert('Workshop Deleted!');
		  </script>";

		header("refresh:0.01; url = ../admin/admin-workshop.php");	
		// header("Location: ../admin/admin-workshop.php");	
		
	}else{
		// echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
		 echo "<script>
			alert('Something went wrong');
		  </script>";

		header("refresh:0.01; url = ../admin/admin-workshop.php");	
	}



?>