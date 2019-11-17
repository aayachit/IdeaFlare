<?php
	include 'connect.inc.php';
	$id = "";
	
	$skill = "";
	$rating = "";
	
	$certification_name = "";
	$certification_link = "";
	$certification_authority = "";
	$certification_number = "";
	$certification_date = "";
	$certification_details = "";
	// $certification_type = "certification";

	$course_name = "";
	$course_link = "";
	$course_authority = "";
	$course_number = "";
	$course_date = "";
	$course_details = "";
	// $course_type = "course";

	$workshop_name = "";
	$workshop_authority = "";
	$workshop_date = "";
	$workshop_details = "";

	$error = 0;

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	if(isset($_POST['next'])){
		
		$sql = "SELECT * FROM user WHERE email = '".$session."'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$id = $row['id'];

		$skill = $_POST['skill'];
		$rating =$_POST['rating'];
		
		$certification_name = $_POST['certification_name'];
		$certification_link = $_POST['certification_link'];
		$certification_authority = $_POST['certification_authority'];
		$certification_number = $_POST['certification_number'];
		$certification_date = $_POST['certification_date'];
		$certification_details = $_POST['certification_details'];

		$course_name = $_POST['course_name'];
		$course_link = $_POST['course_link'];
		$course_authority = $_POST['course_authority'];
		$course_number = $_POST['course_number'];
		$course_date = $_POST['course_date'];
		$course_details = $_POST['course_details'];
		
		$workshop_name = $_POST['workshop_name'];
		$workshop_authority = $_POST['workshop_authority'];
		$workshop_date = $_POST['workshop_date'];
		$workshop_details = $_POST['workshop_details'];


		// echo "bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb";
		
		if(!empty(array_filter($skill))){	//to check if array has values
			$skill_count = 1;
			foreach ($skill as $key => $value) {
				$sql1 = "INSERT INTO cp_skills (id, skill_id, name, rating)
				VALUES ('"
				. mysqli_real_escape_string($con, $id) .
				"','"
				. mysqli_real_escape_string($con, $skill_count++) .
				"','"
				. mysqli_real_escape_string($con, $value) .
				"','"
				. mysqli_real_escape_string($con, $rating[$key]) .
				"')
				";
				$check1 = mysqli_query($con, $sql1);
				if(!$check1){
					$error++;
				}
			}
		}
		// echo "skill ".$flag;

		if(!empty(array_filter($certification_name)) || !empty(array_filter($certification_link)) || !empty(array_filter($certification_authority)) || !empty(array_filter($certification_number)) || !empty(array_filter($certification_date)) || !empty(array_filter($certification_details))){	//to check if array has values
			
			$certification_count = 1;
			foreach ($certification_name as $key => $value) {
				$sql2 = "INSERT INTO cp_certifications (id, certification_id, name, link, authority, number, date, details)
				VALUES ('"
				. mysqli_real_escape_string($con, $id) .
				"','"
				. mysqli_real_escape_string($con, $certification_count++) .
				"','"
				. mysqli_real_escape_string($con, $value) .
				"','"
				. mysqli_real_escape_string($con, $certification_link[$key]) .
				"','"
				. mysqli_real_escape_string($con, $certification_authority[$key]) .
				"','"
				. mysqli_real_escape_string($con, $certification_number[$key]) .
				"','"
				. mysqli_real_escape_string($con, $certification_date[$key]) .
				"','"
				. mysqli_real_escape_string($con, $certification_details[$key]) .
				"')
				";
				$check2 = mysqli_query($con, $sql2);
				if(!$check2){
					$error++;				
				}
			}
		}
		// echo "certification ".$flag;


		if(!empty(array_filter($course_name)) || !empty(array_filter($course_link)) || !empty(array_filter($course_authority)) || !empty(array_filter($course_number)) || !empty(array_filter($course_date)) || !empty(array_filter($course_details))){

			$course_count = 1;
			foreach ($course_name as $key => $value) {
				$sql3 = "INSERT INTO cp_courses (id, course_id, name, link, authority, number, date, details)
				VALUES ('"
				. mysqli_real_escape_string($con, $id) .
				"','"
				. mysqli_real_escape_string($con, $course_count++) .
				"','"
				. mysqli_real_escape_string($con, $value) .
				"','"
				. mysqli_real_escape_string($con, $course_link[$key]) .
				"','"
				. mysqli_real_escape_string($con, $course_authority[$key]) .
				"','"
				. mysqli_real_escape_string($con, $course_number[$key]) .
				"','"
				. mysqli_real_escape_string($con, $course_date[$key]) .
				"','"
				. mysqli_real_escape_string($con, $course_details[$key]) .
				"')
				";
				$check3 = mysqli_query($con, $sql3);
				if(!$check3){
					$error++;
				}
			}
		}
		// echo "course ".$flag;

		if(!empty(array_filter($workshop_name)) || !empty(array_filter($workshop_authority)) || !empty(array_filter($workshop_date)) || !empty(array_filter($workshop_details))){

			$workshop_count = 1;
			foreach ($workshop_name as $key => $value) {
				$sql4 = "INSERT INTO cp_workshops (id, workshop_id, name, authority, date, details)
				VALUES ('"
				. mysqli_real_escape_string($con, $id) .
				"','"
				. mysqli_real_escape_string($con, $workshop_count++) .
				"','"
				. mysqli_real_escape_string($con, $value) .
				"','"
				. mysqli_real_escape_string($con, $workshop_authority[$key]) .
				"','"
				. mysqli_real_escape_string($con, $workshop_date[$key]) .
				"','"
				. mysqli_real_escape_string($con, $workshop_details[$key]) .
				"')
				";
				$check4 = mysqli_query($con, $sql4);
				if(!$check4){
					$error++;
				}
			}
		}
		// echo "workshop ".$flag;

		if($error == 0){
			// echo "true!!!!!!!!!!!!!!!!!!!!!!!!!";
			header("Location: profile-new-publications.php");	
			
		}else{
			// echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
			 echo "<script>
				alert('Something went wrong');
			  </script>";

			header("refresh:0.01; url = profile-new-academic.php");	
		}

	}

?>