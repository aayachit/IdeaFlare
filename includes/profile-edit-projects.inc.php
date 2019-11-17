<?php
	include 'connect.inc.php';

	$id = "";

	$title = "";
	$description = "";
	
	$error = 0;

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	if(isset($_POST['update'])){
		
		$sql = "SELECT id FROM user WHERE email = '".$session."'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$id = $row['id'];

		$title = $_POST['project_title'];
		$description =$_POST['project_description'];
		
		$project_count = $_POST['project_count'];

		// echo "bbbbbbbbbbbbbbbbbbbbbbbbbbb";


//INSERT DATA

		if(!empty(array_filter($title)) || !empty(array_filter($description)))	//to check if array has values
		{
			$sql1 = "SELECT id FROM cp_projects WHERE id=$id";
			$result1 = mysqli_query($con, $sql1);

			if(mysqli_num_rows($result1)!=0){
				// echo "ccccccccccccccccccccccccccccccccccccccc";
				$i = 1;
				foreach ($title as $key => $value) {
					if($i<=$project_count){	//update for old projects
						$sql2 = "UPDATE cp_projects SET title = '$value', description = '$description[$key]' WHERE id = $id && project_id = $i";
						$i++;
						
						$check2 = mysqli_query($con, $sql2);
						if(!$check2){
							$error++;
						}
					}else{
						$sql2 = "INSERT INTO cp_projects (id, project_id, title, description)
						VALUES ('"
						. mysqli_real_escape_string($con, $id) .
						"','"
						. mysqli_real_escape_string($con, $i++) .
						"','"
						. mysqli_real_escape_string($con, $value) .
						"','"
						. mysqli_real_escape_string($con, $description[$key]) .
						"')
						";
						$check2 = mysqli_query($con, $sql2);
						if(!$check2){
							$error++;
						}
					}	
				}
			}else{
				// echo "ddddddddddddddddddddddddddddddddddddddddddd";
				$project_id = 1;
				foreach ($title as $key => $value) {
				$sql3 = "INSERT INTO cp_projects (id, project_id, title, description)
				VALUES ('"
				. mysqli_real_escape_string($con, $id) .
				"','"
				. mysqli_real_escape_string($con, $project_id++) .
				"','"
				. mysqli_real_escape_string($con, $value) .
				"','"
				. mysqli_real_escape_string($con, $description[$key]) .
				"')
				";
				$check3 = mysqli_query($con, $sql3);
				if(!$check3){
					$error++;
				}
			}

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