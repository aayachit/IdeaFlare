<?php
	// error_reporting(E_ERROR | E_PARSE);

	include 'connect.inc.php';
	$id = "";
	
	$duration = "";
	$ongoing = "";
	$location = "";
	$postion = "";
	$responsibilities = "";
	$experience_count = "";

	$error = 0;

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	if(isset($_POST['update'])){
		
		$sql = "SELECT * FROM user WHERE email = '".$session."'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$id = $row['id'];

		$experience_count = $_POST['experience_count'];

		$duration = $_POST['job-duration'];
		$ongoing = $_POST['job-ongoing'];
		$company = $_POST['job-company'];
		$location = $_POST['job-location'];
		$position = $_POST['job-position'];
		$responsibilities = $_POST['job-responsibilities'];

		// echo "bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb";

		if(!empty(array_filter($duration)) || !empty(array_filter($company)) || !empty(array_filter($location)) || !empty(array_filter($position)) || !empty(array_filter($responsibilities))){	//to check if array has values
		
			$sql1 = "SELECT id FROM cp_projects WHERE id=$id";
			$result1 = mysqli_query($con, $sql1);

			if(mysqli_num_rows($result1)!=0){
				
				$i=1;
				foreach ($duration as $key => $value) {
					
					if($i<=$experience_count){
						// echo "ccccccccccccccccccccccccccccccccccc";
						$sql2 = "UPDATE cp_experience SET duration= '$value', ongoing = '$ongoing[$key]', company = '$company[$key]', location= '$location[$key]', position= '$position[$key]', responsibilities= '$responsibilities[$key]' WHERE id=$id && experience_id=$i";
						$i++;
					
						$check2 = mysqli_query($con, $sql2);
						if(!$check2){
							$error++;
						}
					}else{
						// echo "ddddddddddddddddddddddddddddddddddddddddddddd";
						$sql2 = "INSERT INTO cp_experience (id, experience_id, duration, ongoing, company, location, position, responsibilities) 
						VALUES ('"
						. mysqli_real_escape_string($con, $id) .
						"','"
						. mysqli_real_escape_string($con, $i++) .
						"','"
						. mysqli_real_escape_string($con, $value) .
						"','"
						. mysqli_real_escape_string($con, $ongoing[$key]) .
						"','"
						. mysqli_real_escape_string($con, $company[$key]) .
						"','"
						. mysqli_real_escape_string($con, $location[$key]) .
						"','"
						. mysqli_real_escape_string($con, $position[$key]) .
						"','"
						. mysqli_real_escape_string($con, $responsibilities[$key]) .
						"')
						";
						$check2 = mysqli_query($con, $sql2);
						if(!$check2){
							$error++;
						}
					}
				}
			}else{

				$experience_id = 1;
				foreach ($duration as $key => $value) {
				$sql = "INSERT INTO cp_experience (id, experience_id, duration, ongoing, company, location, position, responsibilities) 
				VALUES ('"
				. mysqli_real_escape_string($con, $id) .
				"','"
				. mysqli_real_escape_string($con, $experience_id++) .
				"','"
				. mysqli_real_escape_string($con, $value) .
				"','"
				. mysqli_real_escape_string($con, $ongoing[$key]) .
				"','"
				. mysqli_real_escape_string($con, $company[$key]) .
				"','"
				. mysqli_real_escape_string($con, $location[$key]) .
				"','"
				. mysqli_real_escape_string($con, $position[$key]) .
				"','"
				. mysqli_real_escape_string($con, $responsibilities[$key]) .
				"')
				";
				$check = mysqli_query($con, $sql);
				if(!$check){
					$error++;
				}
				}

			}
		}



		if($error == 0){
			// echo "true!!!!!!!!!!!!!!!!!!!!!!!!!";

			header("refresh:0.01; url = profile-1.php");	
			
		}else{
			// echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
			echo "<script>
				alert('Something went wrong');
			  </script>";

			header("refresh:0.01; url = profile-1.php");	
		}

	}




?>