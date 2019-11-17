<?php
	include 'connect.inc.php';

	$id = "";

	$article_name = "";
	$article_link = "";
	$article_authority = "";
	$article_number = "";
	$article_date = "";
	$article_details = "";

	$error = 0;

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	if(isset($_POST['update'])){
		
		$sql = "SELECT id FROM user WHERE email = '".$session."'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$id = $row['id'];

		$article_name = $_POST['article_name'];
		$article_link = $_POST['article_link'];
		$article_authority = $_POST['article_authority'];
		$article_number = $_POST['article_number'];
		$article_date = $_POST['article_date'];
		$article_details = $_POST['article_details'];

		$article_count = $_POST['article_count'];
		

		if(!empty(array_filter($article_name)) || !empty(array_filter($article_link)) || !empty(array_filter($article_authority)) || !empty(array_filter($article_number)) || !empty(array_filter($article_date)) || !empty(array_filter($article_details))){	//to check if array has values
				
			$sql1 = "SELECT id FROM cp_articles WHERE id=$id";
			$result1 = mysqli_query($con, $sql1);

			if(mysqli_num_rows($result1)!=0){

				$i = 1;
				foreach ($article_name as $key => $value) {
					if($i<=$article_count){	//update for old articles
						$sql2 = "UPDATE cp_articles SET name = '$value', link = '$article_link[$key]', authority = '$article_authority[$key]', number = '$article_number[$key]', date='$article_date[$key]', details='$article_details[$key]' WHERE id = $id && article_id = $i";
						$i++;
						
						$check2 = mysqli_query($con, $sql2);
						if(!$check2){
							$error++;
						}
					}else{
						$sql2 = "INSERT INTO cp_articles (id, article_id, name, link, authority, number, date, details)
						VALUES ('"
						. mysqli_real_escape_string($con, $id) .
						"','"
						. mysqli_real_escape_string($con, $i++) .
						"','"
						. mysqli_real_escape_string($con, $value) .
						"','"
						. mysqli_real_escape_string($con, $article_link[$key]) .
						"','"
						. mysqli_real_escape_string($con, $article_authority[$key]) .
						"','"
						. mysqli_real_escape_string($con, $article_number[$key]) .
						"','"
						. mysqli_real_escape_string($con, $article_date[$key]) .
						"','"
						. mysqli_real_escape_string($con, $article_details[$key]) .
						"')
						";
						$check2 = mysqli_query($con, $sql2);
						if(!$check2){
							$error++;
						}
					}
				}
			}else{
				$article_count = 1;
				foreach ($article_name as $key => $value) {
					$sql3 = "INSERT INTO cp_articles (id, article_id, name, link, authority, number, date, details)
					VALUES ('"
					. mysqli_real_escape_string($con, $id) .
					"','"
					. mysqli_real_escape_string($con, $article_count++) .
					"','"
					. mysqli_real_escape_string($con, $value) .
					"','"
					. mysqli_real_escape_string($con, $article_link[$key]) .
					"','"
					. mysqli_real_escape_string($con, $article_authority[$key]) .
					"','"
					. mysqli_real_escape_string($con, $article_number[$key]) .
					"','"
					. mysqli_real_escape_string($con, $article_date[$key]) .
					"','"
					. mysqli_real_escape_string($con, $article_details[$key]) .
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