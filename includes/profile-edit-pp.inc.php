<?php
	include 'connect.inc.php';

	$id = "";
	$uploadOk = 1;
	// echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";

	if(isset($_POST['update'])){
		$sql = "SELECT id FROM user WHERE email = '".$session."'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$id = $row['id'];

		$filename = $_FILES["cp-pp"]["name"];	// original name
		$tempname = $_FILES["cp-pp"]["tmp_name"];	//default storage location
		$imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));	//to get the extension

		$dir = "uploads/users/".$id."/";	//folder for user id
		$name = $id."_pp.".$imageFileType;	//to store the desired name with given extension
		
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
			echo "<script>
				alert('Only jpg, jpeg and png Files are Supported');
			  </script>";
			$uploadOk = 0;
		}
		
		if ($_FILES["cp-pp"]["size"] > 5000000) {
			echo "<script>
				alert('Sorry, your file is too large.');
			  </script>";
		    $uploadOk = 0;
		}	

		if($uploadOk == 1){
			if(!is_dir($dir)){	
				mkdir($dir);
			}
			
			$check = move_uploaded_file($tempname, $dir.$name);	//to move from default to desired location
			
			$pp = $dir.$name;
			$sql1 = "UPDATE cp_personal SET image='$pp' WHERE id=$id";
			$check1 = mysqli_query($con, $sql1);
				
			if($check == true && $check1 == true){
				// echo "true!!!!!!!!!!!!!!!!!!!!!!!!!!";

				echo "<script>
					alert('Profile Picture Updated');
				  </script>";
				header("refresh:0.01; url = userhome.php");	
			}else{
				// echo "false!!!!!!!!!!!!!!!!!!!!!!!!!!";
				echo "<script>
					alert('Something went wrong');
				  </script>";

				header("refresh:0.01; url = userhome.php");	
			}

		}
	}

?>