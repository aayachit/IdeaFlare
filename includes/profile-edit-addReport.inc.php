<?php
	include 'connect.inc.php';

	$id = "";
	$project_id = "";
	$report = "";
	$error = 0;

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	if(isset($_POST['update'])){
		
		$sql = "SELECT id FROM user WHERE email = '".$session."'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$id = $row['id'];

		$project_id = $_POST['project_id'];
		// echo "bbbbbbbbbbbbbbbbbbbbbbbbbbb";

		$dir = "uploads/users/".$id."/";	//folder for user id

		$filename = "";
		$tempname = "";
		$FileType = "";
		$final_name = "";
		$uploadOk = 1;

//Store upload project report
	
		$filename = $_FILES["project_report"]["name"];
		$tempname = $_FILES["project_report"]["tmp_name"];
		$FileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));	//to get the extension

		if($FileType != ""){
			$final_name = $id."_project_report_".$project_id.".".$FileType;	//to store the desired name with given extension

			if($FileType != "pdf"){
				echo "<script>
					alert('Only pdf Files are Supported');
				  </script>";
				$uploadOk = 0;
			}

			if($_FILES["project_report"]["size"] > 5000000){
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
					$report = $dir.$final_name;
				}
			}

		}	


//INSERT DATA

		if($report != "")	//to check if array has values
		{
			// echo "ccccccccccccccccccccccccc";
			$sql2 = "UPDATE cp_projects SET report = '$report' WHERE id = $id && project_id = $project_id";
	
			$check2 = mysqli_query($con, $sql2);
			if(!$check2){
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