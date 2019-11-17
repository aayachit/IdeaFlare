<?php
	include 'connect.inc.php';
	$id = "";
	
	$percentage_10 = "";	
	$marksheet_10 = "";
	
	$percentage_12 = "";
	$marksheet_12 = "";
	
	$ug_field = "";
	$ug_cgpa = "";
	$ug_marksheet = "";

	$pg_field = "";
	$pg_cgpa = "";
	$pg_marksheet = "";


	$error = 0;

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	if(isset($_POST['update'])){
		
		$sql = "SELECT id FROM user WHERE email = '".$session."'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$id = $row['id'];

		$sqlFiles = "SELECT 10_marksheet, 12_marksheet, ug_marksheet, pg_marksheet FROM cp_education WHERE id = $id";
		$resultFiles = mysqli_query($con, $sqlFiles);
		$rowFiles = mysqli_fetch_array($resultFiles);
		$marksheet_10 = $rowFiles['10_marksheet'];		
		$marksheet_12 = $rowFiles['12_marksheet'];
		$ug_marksheet = $rowFiles['ug_marksheet'];
		$pg_marksheet = $rowFiles['pg_marksheet'];


		$percentage_10 = mysqli_real_escape_string($con, $_POST['10_percentage']);
			
		$percentage_12 = mysqli_real_escape_string($con, $_POST['12_percentage']);

		$ug_field = mysqli_real_escape_string($con, $_POST['ug_field']);
		$ug_cgpa = mysqli_real_escape_string($con, $_POST['ug_cgpa']);
	
		$pg_field = mysqli_real_escape_string($con, $_POST['pg_field']);
		$pg_cgpa = mysqli_real_escape_string($con, $_POST['pg_cgpa']);

		// echo "bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb";
		


		$dir = "uploads/users/".$id."/";	//folder for user id

		$filename = "";
		$tempname = "";
		$FileType = "";
		$final_name = "";
		$uploadOk = 1;

//Store 10_marksheet
		
		$filename = $_FILES["10_marksheet"]["name"];
		$tempname = $_FILES["10_marksheet"]["tmp_name"];
		$FileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));	//to get the extension

		if($FileType!=""){
			
			$final_name = $id."_marksheet_10.".$FileType;	//to store the desired name with given extension

			if($FileType != "pdf"){
				echo "<script>
					alert('Only pdf Files are Supported');
				  </script>";
				$uploadOk = 0;
			}

			if($_FILES["10_marksheet"]["size"] > 5000000){
				echo "<script>
					alert('Sorry, your file is too large.');
				  </script>";
			    $uploadOk = 0;
			}


			$check3 = "";
					
			if($uploadOk == 1){
				if(!is_dir($dir)){	
					mkdir($dir);
				}			
				$check3 = move_uploaded_file($tempname, $dir.$final_name);	//to move from default to desired location
				if($check3 == true){
					$marksheet_10 = $dir.$final_name;
				}
			}
		}

		$filename = "";
		$tempname = "";
		$FileType = "";
		$final_name = "";
		$uploadOk = 1;

//Store 12_marksheet
	
		$filename = $_FILES["12_marksheet"]["name"];
		$tempname = $_FILES["12_marksheet"]["tmp_name"];
		$FileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));	//to get the extension

		if($FileType != ""){
			$final_name = $id."_marksheet_12.".$FileType;	//to store the desired name with given extension

			if($FileType != "pdf"){
				echo "<script>
					alert('Only pdf Files are Supported');
				  </script>";
				$uploadOk = 0;
			}

			if($_FILES["12_marksheet"]["size"] > 5000000){
				echo "<script>
					alert('Sorry, your file is too large.');
				  </script>";
			    $uploadOk = 0;
			}

			$check3 = "";
					
			if($uploadOk == 1){
				if(!is_dir($dir)){	
					mkdir($dir);
				}			
				$check3 = move_uploaded_file($tempname, $dir.$final_name);	//to move from default to desired location
				if($check3 == true){
					$marksheet_12 = $dir.$final_name;
				}
			}

		}	

		$filename = "";
		$tempname = "";
		$FileType = "";
		$final_name = "";
		$uploadOk = 1;

//Store ug_marksheet
	
		$filename = $_FILES["ug_marksheet"]["name"];
		$tempname = $_FILES["ug_marksheet"]["tmp_name"];
		$FileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));	//to get the extension

		if($FileType != ""){
			$final_name = $id."_marksheet_ug.".$FileType;	//to store the desired name with given extension

			if($FileType != "pdf"){
				echo "<script>
					alert('Only pdf Files are Supported');
				  </script>";
				$uploadOk = 0;
			}

			if($_FILES["ug_marksheet"]["size"] > 5000000){
				echo "<script>
					alert('Sorry, your file is too large.');
				  </script>";
			    $uploadOk = 0;
			}

			$check3 = "";
					
			if($uploadOk == 1){
				if(!is_dir($dir)){	
					mkdir($dir);
				}			
				$check3 = move_uploaded_file($tempname, $dir.$final_name);	//to move from default to desired location
				if($check3 == true){
					$ug_marksheet = $dir.$final_name;
				}
			}
		}	

		$filename = "";
		$tempname = "";
		$FileType = "";
		$final_name = "";
		$uploadOk = 1;

//Store pg_marksheet
	
		$filename = $_FILES["pg_marksheet"]["name"];
		$tempname = $_FILES["pg_marksheet"]["tmp_name"];
		$FileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));	//to get the extension

		if($FileType != ""){
			$final_name = $id."_marksheet_pg.".$FileType;	//to store the desired name with given extension

			if($FileType != "pdf"){
				echo "<script>
					alert('Only pdf Files are Supported');
				  </script>";
				$uploadOk = 0;
			}

			if($_FILES["pg_marksheet"]["size"] > 5000000){
				echo "<script>
					alert('Sorry, your file is too large.');
				  </script>";
			    $uploadOk = 0;
			}

			$check3 = "";
					
			if($uploadOk == 1){
				if(!is_dir($dir)){	
					mkdir($dir);
				}			
				$check3 = move_uploaded_file($tempname, $dir.$final_name);	//to move from default to desired location
				if($check3 == true){
					$pg_marksheet = $dir.$final_name;
				}
			}

		}


//INSERT DATA
		if($percentage_10!="" || $marksheet_10!="" || $percentage_12!="" || $marksheet_12!="" || $ug_field!="" || $ug_cgpa!="" || $ug_marksheet!="" || $pg_field!="" || $pg_cgpa!="" || $pg_marksheet!=""){
			
			$sql2 = "SELECT id FROM cp_education WHERE id=$id";
			$result2 = mysqli_query($con, $sql2);

			if(mysqli_num_rows($result2)!=0){

				$sql1 = "UPDATE cp_education SET 10_percentage='$percentage_10', 10_marksheet='$marksheet_10' ,12_percentage='$percentage_12', 12_marksheet='$marksheet_12',ug_field='$ug_field', ug_cgpa='$ug_cgpa', ug_marksheet='$ug_marksheet',pg_field='$pg_field', pg_cgpa='$pg_cgpa', pg_marksheet='$pg_marksheet' WHERE id = $id";

				$check1 = mysqli_query($con, $sql1);
			}else{
				$sql1 = "INSERT INTO cp_education (id, 10_percentage, 10_marksheet, 12_percentage, 12_marksheet, ug_field, ug_cgpa, ug_marksheet, pg_field, pg_cgpa, pg_marksheet) 
			VALUES ('$id', '$percentage_10', '$marksheet_10','$percentage_12', '$marksheet_12', '$ug_field', '$ug_cgpa', '$ug_marksheet', '$pg_field', '$pg_cgpa','$pg_marksheet')";

				$check1 = mysqli_query($con, $sql1);

			}
			if($check1 == false){
				$error++;
			}
		}

		if($error == 0){
			//echo "true!!!!!!!!!!!!!!!!!!!!!!!!!";
			header("Location: profile-1.php");	
			
		}else{
			//echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
			 echo "<script>
				alert('Something went wrong');
			  </script>";

			header("refresh:0.01; url = profile-1.php");	
		}

	}

?>