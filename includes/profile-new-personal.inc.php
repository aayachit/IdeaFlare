<?php
	
	include 'connect.inc.php';
	
	$id = "";
	$altEmail = "";
	$contact = "";
	$industry = "";
	$about = "";
	$cv = "";
	$pp = "";
	$error = 0;	

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	if(isset($_POST['next'])){

		$sql = "SELECT * FROM user WHERE email = '".$session."'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$id = $row['id'];

		$altEmail = mysqli_real_escape_string($con, $_POST['cp-altEmail']);
		$contact = mysqli_real_escape_string($con, $_POST['cp-contact']);
		$industry = mysqli_real_escape_string($con, $_POST['cp-industry']);
		$about = mysqli_real_escape_string($con, $_POST['cp-about-you']);

		$dir = "uploads/users/".$id."/";	//folder for user id
		
		// echo "bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb";


		$filename1 = "";
		$tempname1 = "";
		$FileType1 = "";
		$uploadOk = 1;
//Store CV

		$filename1 = $_FILES["cp-cv"]["name"];
		$tempname1 = $_FILES["cp-cv"]["tmp_name"];
		$FileType1 = strtolower(pathinfo($filename1,PATHINFO_EXTENSION));	//to get the extension

		if($FileType1 != ""){
			$file_name1 = $id."_cv.".$FileType1;	//to store the desired name with given extension

			if($FileType1 != "pdf"){
				echo "<script>
					alert('Only pdf Files are Supported');
				  </script>";
				$uploadOk = 0;
			}

			if($_FILES["cp-cv"]["size"] > 5000000){
				echo "<script>
					alert('Sorry, your file is too large.');
				  </script>";
			    $uploadOk = 0;
			}


			$check1 = "";
					
			if($uploadOk == 1){
				if(!is_dir($dir)){	
					mkdir($dir);
				}			
				$check1 = move_uploaded_file($tempname1, $dir.$file_name1);	//to move from default to desired location
				if($check1 == true){
					$cv =  $dir.$file_name1;	//to store path in db
				}
			}
		}

		$filename2 = "";
		$tempname2 = "";
		$FileType2 = "";
		$uploadOk = 1;

//Store Image
		
		$filename2 = $_FILES["cp-pp"]["name"];	// original name
		$tempname2 = $_FILES["cp-pp"]["tmp_name"];	//default storage location
		$FileType2 = strtolower(pathinfo($filename2,PATHINFO_EXTENSION));	//to get the extension

		if($FileType2 != ""){

			$file_name2 = $id."_pp.".$FileType2;	//to store the desired name with given extension
			
			if($FileType2 != "jpg" && $FileType2 != "png" && $FileType2 != "jpeg"){
				echo "<script>
					alert('Only jpg, jpeg and png Files are Supported');
				  </script>";
				$uploadOk = 0;
			}
			
			if ($_FILES["cp-pp"]["size"] > 5000000) {
				echo "<script>
					alert('Sorry, your file is too large.');
				  </script>";
			    $uploadOk = 0;
			}	

			$check2 = "";
			if($uploadOk == 1){
				if(!is_dir($dir)){	
					mkdir($dir);
				}
				$check2 = move_uploaded_file($tempname2, $dir.$file_name2);	//to move from default to desired location
				if($check2 == true){
					$pp =  $dir.$file_name2;	//to store path in db
				}
			}

		}


		// Insert DATA
		if($altEmail!="" || $contact!="" || $industry!="" || $about!="" || $cv!="" || $pp!=""){
			// echo "cccccccccccccccccccccc";
			$sql = "INSERT INTO cp_personal (id, altEmail, contact, industry, about, cv, image) 
			VALUES ('$id', '$altEmail', '$contact', '$industry', '$about', '$cv', '$pp')";
		
			$check = mysqli_query($con, $sql) or die('Error Inserting Data');
			
			if($check == false){
				$error++;
			}
		}

		if($error == 0){
			// echo "true!!!!!!!!!!!!!!!!!!!!!!!!!";
			header("Location: profile-new-education.php");	
			
		}else{
			// echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
			echo "<script>
				alert('Something went wrong');
			  </script>";

			header("refresh:0.01; url = profile-new-personal.php");	
		}

	}




?>