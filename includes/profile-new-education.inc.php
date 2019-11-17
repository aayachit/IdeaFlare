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

	$title = "";
	$description = "";
	$project_report = array();

	$error = 0;
	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	if(isset($_POST['next'])){
		
		$sql = "SELECT * FROM user WHERE email = '".$session."'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$id = $row['id'];

		$percentage_10 = mysqli_real_escape_string($con, $_POST['10_percentage']);
			
		$percentage_12 = mysqli_real_escape_string($con, $_POST['12_percentage']);

		$ug_field = mysqli_real_escape_string($con, $_POST['ug_field']);
		$ug_cgpa = mysqli_real_escape_string($con, $_POST['ug_cgpa']);
	
		$pg_field = mysqli_real_escape_string($con, $_POST['pg_field']);
		$pg_cgpa = mysqli_real_escape_string($con, $_POST['pg_cgpa']);
		
		$title = $_POST['project_title'];
		$description =$_POST['project_description'];

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

		$filename = "";
		$tempname = "";
		$FileType = "";
		$final_name = "";

//Store project report
		

		if(isset($_FILES['project_report'])){

					
			$filename = $_FILES["project_report"]["name"];
			$tempname = $_FILES["project_report"]["tmp_name"];
			$FileSize = $_FILES["project_report"]["size"];

			$final_name = $id."_project_report_";	//to store the desired name with given extension
	
			for($i = 0; $i < count($tempname); $i++){
				
				$uploadOk = 1;
				$check3 = "";
				$FileType = strtolower(pathinfo($filename[$i],PATHINFO_EXTENSION));	//to get the extension	
				
				if($FileType != ""){	//to keep the field empty without errors
					if($FileType != "pdf"){
						echo "<script>
							alert('Project ".($i+1).": Only pdf Files are Supported');
						  </script>";
						$uploadOk = 0;
					}

					if($FileSize[$i] > 5000000){
						echo "<script>
							alert('Project ".($i+1).": Sorry, your file is too large.');
						  </script>";
					    $uploadOk = 0;
					}
					
					if($uploadOk == 1){
						if(!is_dir($dir)){	
							mkdir($dir);
						}		
						$check3 = move_uploaded_file($tempname[$i], $dir.$final_name.($i+1).".pdf");
						if($check3 == true){
							array_push($project_report, $dir.$final_name.($i+1).".pdf");
							// $project_report = $dir.$final_name.($i+1).".pdf";
						}
					}

					if($check3 == false){
						echo "<script>
							alert('Project ".($i+1).": Problem Uploading Report');
						  </script>";
					}
				}
			
			}

		}

//INSERT EDUCATION DATA
		if($percentage_10!="" || $marksheet_10!="" || $percentage_12!="" || $marksheet_12!="" || $ug_field!="" || $ug_cgpa!="" || $ug_marksheet!="" || $pg_field!="" || $pg_cgpa!="" || $pg_marksheet!=""){
			
			$sql1 = "INSERT INTO cp_education (id, 10_percentage, 10_marksheet, 12_percentage, 12_marksheet, ug_field, ug_cgpa, ug_marksheet, pg_field, pg_cgpa, pg_marksheet) 
			VALUES ('$id', '$percentage_10', '$marksheet_10','$percentage_12', '$marksheet_12', '$ug_field', '$ug_cgpa', '$ug_marksheet', '$pg_field', '$pg_cgpa','$pg_marksheet')";

			$check1 = mysqli_query($con, $sql1) or die("Error Inserting Data");

			if($check1 == false){
				$error++;
			}

		}

//INSERT PROJECT DATA


		if(!empty(array_filter($title)) || !empty(array_filter($description)))	//to check if array has values
		{
			$project_id = 1;
			$i = 0;
			foreach ($title as $key => $value) {
				$sql2 = "INSERT INTO cp_projects (id, project_id, title, description, report)
				VALUES ('"
				. mysqli_real_escape_string($con, $id) .
				"','"
				. mysqli_real_escape_string($con, $project_id++) .
				"','"
				. mysqli_real_escape_string($con, $value) .
				"','"
				. mysqli_real_escape_string($con, $description[$key]) .
				"','"
				. mysqli_real_escape_string($con, $project_report[$i++]) .
				"')
				";
				$check2 = mysqli_query($con, $sql2);
				if(!$check2){
					$error++;
				}
			}
		}


		if($error==0){
			// echo "true!!!!!!!!!!!!!!!!!!!!!!!!!";
			header("Location: profile-new-academic.php");	
			
		}else{
			// echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
			 echo "<script>
				alert('Something went wrong');
			  </script>";

			header("refresh:0.01; url = profile-new-education.php");	
		}

	}

?>	