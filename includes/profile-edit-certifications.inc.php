<?php
	include 'connect.inc.php';

	$id = "";

	$certification_name = "";
	$certification_link = "";
	$certification_authority = "";
	$certification_number = "";
	$certification_date = "";
	$certification_details = "";

	$error = 0;

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	if(isset($_POST['update'])){
		
		$sql = "SELECT id FROM user WHERE email = '".$session."'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$id = $row['id'];

		$certification_name = $_POST['certification_name'];
		$certification_link = $_POST['certification_link'];
		$certification_authority = $_POST['certification_authority'];
		$certification_number = $_POST['certification_number'];
		$certification_date = $_POST['certification_date'];
		$certification_details = $_POST['certification_details'];

		$certification_count = $_POST['certification_count'];
		

		if(!empty(array_filter($certification_name)) || !empty(array_filter($certification_link)) || !empty(array_filter($certification_authority)) || !empty(array_filter($certification_number)) || !empty(array_filter($certification_date)) || !empty(array_filter($certification_details))){	//to check if array has values

			$sql1 = "SELECT id FROM cp_certifications WHERE id=$id";
			$result1 = mysqli_query($con, $sql1);	
			
			if(mysqli_num_rows($result1)!=0){
				$i = 1;
				foreach ($certification_name as $key => $value) {
					if($i<=$certification_count){	//update for old certifications
						$sql2 = "UPDATE cp_certifications SET name = '$value', link = '$certification_link[$key]', authority = '$certification_authority[$key]', number = '$certification_number[$key]', date='$certification_date[$key]', details='$certification_details[$key]' WHERE id = $id && certification_id = $i";
						$i++;
						
						$check2 = mysqli_query($con, $sql2);
						if(!$check2){
							$error++;
						}
					}else{
						$sql2 = "INSERT INTO cp_certifications (id, certification_id, name, link, authority, number, date, details)
						VALUES ('"
						. mysqli_real_escape_string($con, $id) .
						"','"
						. mysqli_real_escape_string($con, $i++) .
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
			}else{
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