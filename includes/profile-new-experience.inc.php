<?php
	
	include 'connect.inc.php';
	$id = "";
	
	$duration = "";
	$company = "";
	$ongoing = "";
	$location = "";
	$postion = "";
	$responsibilities = "";

	$error = 0;
	$flag = 0;
	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	if(isset($_POST['next'])){
		
		$sql = "SELECT * FROM user WHERE email = '".$session."'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$id = $row['id'];

		$duration = $_POST['job-duration'];
		$company = $_POST['job-company'];
		$ongoing = $_POST['job-ongoing'];
		$location = $_POST['job-location'];
		$position = $_POST['job-position'];
		$responsibilities = $_POST['job-responsibilities'];

		// echo "bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb";

		if(!empty(array_filter($duration)) || !empty(array_filter($company)) || !empty(array_filter($location)) || !empty(array_filter($position)) || !empty(array_filter($responsibilities))){	//to check if array has values

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

		if($error == 0){
			// echo "true!!!!!!!!!!!!!!!!!!!!!!!!!";
			$sql = "SELECT id FROM cp_personal WHERE id=$id";
			$result = mysqli_query($con, $sql);
			if (mysqli_num_rows($result)!=0){
				$flag=1;
			}
			$sql = "SELECT id FROM cp_education WHERE id=$id";
			$result = mysqli_query($con, $sql);
			if (mysqli_num_rows($result)!=0){
				$flag=1;
			}
			$sql = "SELECT id FROM cp_projects WHERE id=$id";
			$result = mysqli_query($con, $sql);
			if (mysqli_num_rows($result)!=0){
				$flag=1;
			}
			$sql = "SELECT id FROM cp_skills WHERE id=$id";
			$result = mysqli_query($con, $sql);
			if (mysqli_num_rows($result)!=0){
				$flag=1;
			}
			$sql = "SELECT id FROM cp_certifications WHERE id=$id";
			$result = mysqli_query($con, $sql);
			if (mysqli_num_rows($result)!=0){
				$flag=1;
			}
			$sql = "SELECT id FROM cp_courses WHERE id=$id";
			$result = mysqli_query($con, $sql);
			if (mysqli_num_rows($result)!=0){
				$flag=1;
			}
			$sql = "SELECT id FROM cp_workshops WHERE id=$id";
			$result = mysqli_query($con, $sql);
			if (mysqli_num_rows($result)!=0){
				$flag=1;
			}
			$sql = "SELECT id FROM cp_journals WHERE id=$id";
			$result = mysqli_query($con, $sql);
			if (mysqli_num_rows($result)!=0){
				$flag=1;
			}
			$sql = "SELECT id FROM cp_patents WHERE id=$id";
			$result = mysqli_query($con, $sql);
			if (mysqli_num_rows($result)!=0){
				$flag=1;
			}
			$sql = "SELECT id FROM cp_articles WHERE id=$id";
			$result = mysqli_query($con, $sql);
			if (mysqli_num_rows($result)!=0){
				$flag=1;
			}
			$sql = "SELECT id FROM cp_experience WHERE id=$id";
			$result = mysqli_query($con, $sql);
			if (mysqli_num_rows($result)!=0){
				$flag=1;
			}
			
			if($flag==1){			

				$sql="UPDATE user SET profile=1 WHERE id=$id";
				$result = mysqli_query($con, $sql) or die("Something Went Wrong");

				echo "<script>
					alert('Profile Created!');
				  </script>";

				header("refresh:0.01; url = profile-1.php");	
			}else{
				header("refresh:0.01; url = userhome.php");	
			}
			
		}else{
			// echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
			echo "<script>
				alert('Something went wrong');
			  </script>";

			header("refresh:0.01; url = profile-new-experience.php");	
		}

	}




?>