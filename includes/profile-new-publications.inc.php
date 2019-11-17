<?php
	include 'connect.inc.php';
	$id = "";
		
	$journal_name = "";
	$journal_link = "";
	$journal_authority = "";
	$journal_date = "";
	$journal_details = "";

	$patent_name = "";
	$patent_link = "";
	$patent_authority = "";
	$patent_number = "";
	$patent_date = "";
	$patent_details = "";
	// $patent_type = "patent";

	$article_name = "";
	$article_link = "";
	$article_authority = "";
	$article_number = "";
	$article_date = "";
	$article_details = "";
	$article_type = "article";

	$error = 0;

	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	if(isset($_POST['next'])){
		
		$sql = "SELECT * FROM user WHERE email = '".$session."'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$id = $row['id'];
		
		$journal_name = $_POST['journal_name'];
		$journal_link = $_POST['journal_link'];
		$journal_authority = $_POST['journal_authority'];
		$journal_date = $_POST['journal_date'];
		$journal_details = $_POST['journal_details'];

		$patent_name = $_POST['patent_name'];
		$patent_link = $_POST['patent_link'];
		$patent_authority = $_POST['patent_authority'];
		$patent_number = $_POST['patent_number'];
		$patent_date = $_POST['patent_date'];
		$patent_details = $_POST['patent_details'];
		
		$article_name = $_POST['article_name'];
		$article_link = $_POST['article_link'];
		$article_authority = $_POST['article_authority'];
		$article_number = $_POST['article_number'];
		$article_date = $_POST['article_date'];
		$article_details = $_POST['article_details'];
		

		// echo "bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb";
		
		if(!empty(array_filter($journal_name)) || !empty(array_filter($journal_link)) || !empty(array_filter($journal_authority)) || !empty(array_filter($journal_date)) || !empty(array_filter($journal_details))){	//to check if array has values

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


		if(!empty(array_filter($patent_name)) || !empty(array_filter($patent_link)) || !empty(array_filter($patent_authority)) || !empty(array_filter($patent_number)) || !empty(array_filter($patent_date)) || !empty(array_filter($patent_details))){	//to check if array has values

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

		if(!empty(array_filter($article_name)) || !empty(array_filter($article_link)) || !empty(array_filter($article_authority)) || !empty(array_filter($article_number)) || !empty(array_filter($article_date)) || !empty(array_filter($article_details))){	//to check if array has values

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

		if($error == 0){
			// echo "true!!!!!!!!!!!!!!!!!!!!!!!!!";
			header("Location: profile-new-experience.php");	
			
		}else{
			// echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
			 echo "<script>
				alert('Something went wrong');
			  </script>";

			header("refresh:0.01; url = profile-new-publications.php");	
		}

	}

?>