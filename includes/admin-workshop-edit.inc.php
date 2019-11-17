<?php

	error_reporting(0);	//if file not available while unlinking

	include 'connect.inc.php';

	$name = "";
	$contact = "";
	$email = "";

	$org_name = "";
	$org_background = "";

	$id = "";
	$title = "";
	$duration = "";
	// $date = "";
	// $time = "";
	$cost = "";
	$description = "";
	$supplies = "";
	$expected_supplies = "";
	$image = "";
	$pdf = "";

	$error = 0;

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	if(isset($_POST['update'])){

		// echo "bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb";

		$name = $_POST['instructor_name'];
		$contact = $_POST['instructor_contact'];
		$email = $_POST['instructor_email'];

		$org_name = mysqli_real_escape_string($con, $_POST['org_name']);
		$org_background = mysqli_real_escape_string($con, $_POST['org_background']);
		
		$id = $_POST['id'];
		$title = mysqli_real_escape_string($con, $_POST['workshop_title']);
		$duration = mysqli_real_escape_string($con, $_POST['workshop_duration']);
		$date = $_POST['workshop_date'];
		$time = $_POST['workshop_time'];
		$cost = mysqli_real_escape_string($con, $_POST['workshop_cost']);
		$description = mysqli_real_escape_string($con, $_POST['workshop_description']);
		$supplies = $_POST['workshop_supplies'];
		$expected_supplies = mysqli_real_escape_string($con, $_POST['workshop_expected_supplies']);

		$instructor_count = $_POST['instructor_count'];
		
		$sqlFiles = "SELECT pdf, image FROM workshop WHERE id = $id";
		$resultFiles = mysqli_query($con, $sqlFiles);
		$rowFiles = mysqli_fetch_array($resultFiles);
		$pdf = $rowFiles['pdf'];		
		$image = $rowFiles['image'];			//to give default value to pdf and image

		$dir = "uploads/workshops/".$id."/";	//folder for user id

		$filename1 = "";
		$tempname1 = "";
		$FileType1 = "";
		$uploadOk = 1;
		
		//Store PDF

		$filename1 = $_FILES["workshop_pdf"]["name"];
		$tempname1 = $_FILES["workshop_pdf"]["tmp_name"];
		$FileType1 = strtolower(pathinfo($filename1,PATHINFO_EXTENSION));	//to get the extension

		if($FileType1 != ""){
			// echo"cccccccccccccccccccccccccccccccccccccccccccc";
			$file_name1 = $id."_pdf.".$FileType1;	//to store the desired name with given extension
			if($FileType1 != "pdf"){
				echo "<script>
					alert('Only pdf Files are Supported');
				  </script>";
				$uploadOk = 0;
			}

			if($_FILES["workshop_pdf"]["size"] > 5000000){
				echo "<script>
					alert('Sorry, your file is too large.');
				  </script>";
			    $uploadOk = 0;
			}


			$check1 = "";
					
			if($uploadOk == 1){
				if(!is_dir("../".$dir)){	
					mkdir("../".$dir);
				}			
				// echo "ddddddddddddddddddddddddddddddddddddddd";
				$check1 = move_uploaded_file($tempname1, "../".$dir.$file_name1);	//to move from default to desired location
				if($check1 == true){
					$pdf =  $dir.$file_name1;	//to store path in db
				}
			}
		}

		$filename2 = "";
		$tempname2 = "";
		$FileType2 = "";
		$uploadOk = 1;

		//Store Image
		
		$filename2 = $_FILES["workshop_image"]["name"];	// original name
		$tempname2 = $_FILES["workshop_image"]["tmp_name"];	//default storage location
		$FileType2 = strtolower(pathinfo($filename2,PATHINFO_EXTENSION));	//to get the extension

		if($FileType2 != ""){

			$file_name2 = $id."_image.".$FileType2;	//to store the desired name with given extension
			
			if($FileType2 != "jpg" && $FileType2 != "png" && $FileType2 != "jpeg"){
				echo "<script>
					alert('Only jpg, jpeg and png Files are Supported');
				  </script>";
				$uploadOk = 0;
			}
			
			if ($_FILES["workshop_image"]["size"] > 5000000) {
				echo "<script>
					alert('Sorry, your file is too large.');
				  </script>";
			    $uploadOk = 0;
			}	

			$check2 = "";
			if($uploadOk == 1){
				if(!is_dir('../'.$dir)){	
					mkdir('../'.$dir);
				}
				unlink(dirname(__FILE__)."/../".$image);	//delete old file...if any
				$check2 = move_uploaded_file($tempname2, '../'.$dir.$file_name2);	//to move from default to desired location
				if($check2 == true){
					$image =  $dir.$file_name2;	//to store path in db
				}
			}

		}


		$sql1 = "UPDATE workshop SET org_name='$org_name', org_background='$org_background', title = '$title', duration='$duration', date='$date', time='$time', cost='$cost', description='$description', supplies='$supplies', expected_supplies = '$expected_supplies', image='$image', pdf='$pdf' WHERE id=$id";  
		
		$check1 = mysqli_query($con, $sql1) or die('Something went wrong');



		$i = 1;
		foreach ($name as $key => $value) {	
			if($i<=$instructor_count){	//update for old instructors
				$sql2 = "UPDATE workshop_instructor SET name = '$value', contact = '$contact[$key]', email = '$email[$key]' WHERE id = $id && instructor_id = $i";
				$i++;
				$check2 = mysqli_query($con, $sql2);
				if(!$check2){
					$error++;
				}
			}else{

				$sql3 = "INSERT INTO workshop_instructor (id, instructor_id, name, contact, email)
				VALUES ('"
				. mysqli_real_escape_string($con, $id) .
				"','"
				. mysqli_real_escape_string($con, $i++) .
				"','"
				. mysqli_real_escape_string($con, $value) .
				"','"
				. mysqli_real_escape_string($con, $contact[$key]) .
				"','"
				. mysqli_real_escape_string($con, $email[$key]) .
				"')
				";
				$i++;
				$instructor_count++;
				$check3 = mysqli_query($con, $sql3);
				if(!$check3){
					$error++;
				}
			}
		}

		

		if($error == 0){
			// echo "true!!!!!!!!!!!!!!!!!!!!!!!!!";
			echo "<script>
				alert('Workshop Information Updated');
			  </script>";

			header("refresh:0.01; url = admin-workshop.php");	
			// header("Location: admin-workshop.php");	
			
		}else{
			// echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
			echo "<script>
				alert('Something went wrong');
			  </script>";

			header("refresh:0.01; url = admin-workshop.php");	
		}

	}

?>