<?php
	include 'connect.inc.php';

	$id = "";
	
	$skill = "";
	$rating = "";
	
	$error = 0;

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	if(isset($_POST['update'])){
		
		$sql = "SELECT id FROM user WHERE email = '".$session."'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$id = $row['id'];

		$skill = $_POST['skill'];
		$rating =$_POST['rating'];
		$skill_count = $_POST['skill_count'];

		if(!empty(array_filter($skill))){	//to check if array has values
			
			$sql = "SELECT id FROM cp_skills WHERE id = $id";
			$result = mysqli_query($con, $sql);
			
			if(mysqli_num_rows($result)!=0){
				$i = 1;
				foreach ($skill as $key => $value) {
					if($i<=$skill_count){	//update for old skills
						$sql2 = "UPDATE cp_skills SET name = '$value', rating= '$rating[$key]' WHERE id = $id && skill_id = $i";
						$i++;
						
						$check2 = mysqli_query($con, $sql2);
						if(!$check2){
							$error++;
						}
					}else{
						$sql2 = "INSERT INTO cp_skills (id, skill_id, name, rating)
						VALUES ('"
						. mysqli_real_escape_string($con, $id) .
						"','"
						. mysqli_real_escape_string($con, $i++) .
						"','"
						. mysqli_real_escape_string($con, $value) .
						"','"
						. mysqli_real_escape_string($con, $rating[$key]) .
						"')
						";
						$check2 = mysqli_query($con, $sql2);
						if(!$check2){
							$error++;
						}
					}	
				}
			}else{
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