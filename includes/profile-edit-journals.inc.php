<?php
	include 'connect.inc.php';

	$id = "";
	
	$journal_name = "";
	$journal_link = "";
	$journal_authority = "";
	$journal_date = "";
	$journal_details = "";

	$error = 0;

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	if(isset($_POST['update'])){
		
		$sql = "SELECT id FROM user WHERE email = '".$session."'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$id = $row['id'];

		$journal_name = $_POST['journal_name'];
		$journal_link = $_POST['journal_link'];
		$journal_authority = $_POST['journal_authority'];
		$journal_date = $_POST['journal_date'];
		$journal_details = $_POST['journal_details'];

		$journal_count = $_POST['journal_count'];

		if(!empty(array_filter($journal_name)) || !empty(array_filter($journal_link)) || !empty(array_filter($journal_authority)) || !empty(array_filter($journal_date)) || !empty(array_filter($journal_details))){	//to check if array has values

			$sql1 = "SELECT id FROM cp_journals WHERE id=$id";
			$result1 = mysqli_query($con, $sql1);

			if(mysqli_num_rows($result1)!=0){

				$i = 1;
				foreach ($journal_name as $key => $value) {
					if($i<=$journal_count){	//update for old
						$sql2 = "UPDATE cp_journals SET name='$value', link='$journal_link[$key]', authority='$journal_authority[$key]', date='$journal_date[$key]', details='$journal_details[$key]' WHERE id = $id && journal_id = $i";
						$i++;
						
						$check2 = mysqli_query($con, $sql2);
						if(!$check2){
							$error++;
						}
					}else{
						$sql3 = "INSERT INTO cp_journals (id, journal_id, name, link, authority, date, details)
						VALUES ('"
						. mysqli_real_escape_string($con, $id) .
						"','"
						. mysqli_real_escape_string($con, $i++) .
						"','"
						. mysqli_real_escape_string($con, $value) .
						"','"
						. mysqli_real_escape_string($con, $journal_link[$key]) .
						"','"
						. mysqli_real_escape_string($con, $journal_authority[$key]) .
						"','"
						. mysqli_real_escape_string($con, $journal_date[$key]) .
						"','"
						. mysqli_real_escape_string($con, $journal_details[$key]) .
						"')
						";
						$check3 = mysqli_query($con, $sql3);
						if(!$check3){
							$error++;
						}
					}
				}
			}else{
				$journal_count = 1;
				foreach ($journal_name as $key => $value) {
					$sql1 = "INSERT INTO cp_journals (id, journal_id, name, link, authority, date, details)
					VALUES ('"
					. mysqli_real_escape_string($con, $id) .
					"','"
					. mysqli_real_escape_string($con, $journal_count++) .
					"','"
					. mysqli_real_escape_string($con, $value) .
					"','"
					. mysqli_real_escape_string($con, $journal_link[$key]) .
					"','"
					. mysqli_real_escape_string($con, $journal_authority[$key]) .
					"','"
					. mysqli_real_escape_string($con, $journal_date[$key]) .
					"','"
					. mysqli_real_escape_string($con, $journal_details[$key]) .
					"')
					";
					$check1 = mysqli_query($con, $sql1);
					if(!$check1){
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