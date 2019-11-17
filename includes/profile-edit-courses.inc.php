<?php
	include 'connect.inc.php';

	$id = "";

	$course_name = "";
	$course_link = "";
	$course_authority = "";
	$course_number = "";
	$course_date = "";
	$course_details = "";
	
	$error = 0;

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	if(isset($_POST['update'])){
		
		$sql = "SELECT id FROM user WHERE email = '".$session."'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$id = $row['id'];
		
		$course_name = $_POST['course_name'];
		$course_link = $_POST['course_link'];
		$course_authority = $_POST['course_authority'];
		$course_number = $_POST['course_number'];
		$course_date = $_POST['course_date'];
		$course_details = $_POST['course_details'];
		
		$course_count = $_POST['course_count'];
		

		if(!empty(array_filter($course_name)) || !empty(array_filter($course_link)) || !empty(array_filter($course_authority)) || !empty(array_filter($course_number)) || !empty(array_filter($course_date)) || !empty(array_filter($course_details))){

			$sql1 = "SELECT id FROM cp_courses WHERE id=$id";
			$result1 = mysqli_query($con, $sql1);

			if(mysqli_num_rows($result1)!=0){

				$i = 1;
				foreach ($course_name as $key => $value) {
					if($i<=$course_count){	//update for old
						$sql2 = "UPDATE cp_courses SET name = '$value', link = '$course_link[$key]', authority = '$course_authority[$key]', number = '$course_number[$key]', date='$course_date[$key]', details='$course_details[$key]' WHERE id = $id && course_id = $i";
						$i++;
						
						$check2 = mysqli_query($con, $sql2);
						if(!$check2){
							$error++;
						}
					}else{
						$sql3 = "INSERT INTO cp_courses (id, course_id, name, link, authority, number, date, details)
						VALUES ('"
						. mysqli_real_escape_string($con, $id) .
						"','"
						. mysqli_real_escape_string($con, $i++) .
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
			}else{
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

		}


		if($error == 0){
			//echo "true!!!!!!!!!!!!!!!!!!!!!!!!!";
			header("Location: profile-2.php");	
			
		}else{
			//echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
			 echo "<script>
				alert('Something went wrong');
			  </script>";

			header("refresh:0.01; url = profile-2.php");	
		}

	}

?>