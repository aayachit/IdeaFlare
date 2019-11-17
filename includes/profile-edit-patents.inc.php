<?php
	include 'connect.inc.php';

	$id = "";

	$patent_name = "";
	$patent_link = "";
	$patent_authority = "";
	$patent_number = "";
	$patent_date = "";
	$patent_details = "";

	$error = 0;

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	if(isset($_POST['update'])){
		
		$sql = "SELECT id FROM user WHERE email = '".$session."'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$id = $row['id'];

		$patent_name = $_POST['patent_name'];
		$patent_link = $_POST['patent_link'];
		$patent_authority = $_POST['patent_authority'];
		$patent_number = $_POST['patent_number'];
		$patent_date = $_POST['patent_date'];
		$patent_details = $_POST['patent_details'];

		$patent_count = $_POST['patent_count'];
		

		if(!empty(array_filter($patent_name)) || !empty(array_filter($patent_link)) || !empty(array_filter($patent_authority)) || !empty(array_filter($patent_number)) || !empty(array_filter($patent_date)) || !empty(array_filter($patent_details))){	//to check if array has values
			
			$sql1 = "SELECT id FROM cp_patents WHERE id=$id";
			$result1 = mysqli_query($con, $sql1);

			if(mysqli_num_rows($result1)!=0){

				$i = 1;
				foreach ($patent_name as $key => $value) {
					if($i<=$patent_count){	//update for old patents
						$sql2 = "UPDATE cp_patents SET name = '$value', link = '$patent_link[$key]', authority = '$patent_authority[$key]', number = '$patent_number[$key]', date='$patent_date[$key]', details='$patent_details[$key]' WHERE id = $id && patent_id = $i";
						$i++;
						
						$check2 = mysqli_query($con, $sql2);
						if(!$check2){
							$error++;
						}
					}else{
						$sql2 = "INSERT INTO cp_patents (id, patent_id, name, link, authority, number, date, details)
						VALUES ('"
						. mysqli_real_escape_string($con, $id) .
						"','"
						. mysqli_real_escape_string($con, $i++) .
						"','"
						. mysqli_real_escape_string($con, $value) .
						"','"
						. mysqli_real_escape_string($con, $patent_link[$key]) .
						"','"
						. mysqli_real_escape_string($con, $patent_authority[$key]) .
						"','"
						. mysqli_real_escape_string($con, $patent_number[$key]) .
						"','"
						. mysqli_real_escape_string($con, $patent_date[$key]) .
						"','"
						. mysqli_real_escape_string($con, $patent_details[$key]) .
						"')
						";
						$check2 = mysqli_query($con, $sql2);
						if(!$check2){
							$error++;
						}
					}	
				}
			}else{

				$patent_count = 1;
				foreach ($patent_name as $key => $value) {
					$sql2 = "INSERT INTO cp_patents (id, patent_id, name, link, authority, number, date, details)
					VALUES ('"
					. mysqli_real_escape_string($con, $id) .
					"','"
					. mysqli_real_escape_string($con, $patent_count++) .
					"','"
					. mysqli_real_escape_string($con, $value) .
					"','"
					. mysqli_real_escape_string($con, $patent_link[$key]) .
					"','"
					. mysqli_real_escape_string($con, $patent_authority[$key]) .
					"','"
					. mysqli_real_escape_string($con, $patent_number[$key]) .
					"','"
					. mysqli_real_escape_string($con, $patent_date[$key]) .
					"','"
					. mysqli_real_escape_string($con, $patent_details[$key]) .
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
			header("Location: profile-3.php");	
			
		}else{
			//echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
			 echo "<script>
				alert('Something went wrong');
			  </script>";

			header("refresh:0.01; url = profile-3.php");	
		}

	}

?>