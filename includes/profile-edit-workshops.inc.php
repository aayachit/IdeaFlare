<?php
	include 'connect.inc.php';

	$id = "";

	$workshop_name = "";
	$workshop_authority = "";
	$workshop_date = "";
	$workshop_details = "";

	$error = 0;

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	if(isset($_POST['update'])){
		
		$sql = "SELECT id FROM user WHERE email = '".$session."'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$id = $row['id'];

		$workshop_name = $_POST['workshop_name'];
		$workshop_authority = $_POST['workshop_authority'];
		$workshop_date = $_POST['workshop_date'];
		$workshop_details = $_POST['workshop_details'];

		$workshop_count = $_POST['workshop_count'];
		

		if(!empty(array_filter($workshop_name)) || !empty(array_filter($workshop_authority)) || !empty(array_filter($workshop_date)) || !empty(array_filter($workshop_details))){

			$sql1 = "SELECT id FROM cp_workshops WHERE id=$id";
			$result1 = mysqli_query($con, $sql1);

			if(mysqli_num_rows($result1)!=0){

				$i = 1;
				foreach ($workshop_name as $key => $value) {
					if($i<=$workshop_count){	//update for old
						$sql2 = "UPDATE cp_workshops SET name='$value', authority='$workshop_authority[$key]', date='$workshop_date[$key]', details='$workshop_details[$key]' WHERE id = $id && workshop_id = $i";
						$i++;
						
						$check2 = mysqli_query($con, $sql2);
						if(!$check2){
							$error++;
						}
					}else{
						$sql3 = "INSERT INTO cp_workshops (id, workshop_id, name, authority, date, details)
						VALUES ('"
						. mysqli_real_escape_string($con, $id) .
						"','"
						. mysqli_real_escape_string($con, $i++) .
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
						$check3 = mysqli_query($con, $sql3);
						if(!$check3){
							$error++;
						}
					}	
				}

			}else{

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