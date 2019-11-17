 <?php 
  session_start();
  $session = $_SESSION['email'];
  if($session==true){

  }else{
    header("Location:admin.php");
  }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
  <link rel="icon" href="../img/logo-invert.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link href="../css/userhome.css" rel="stylesheet">
  <link href="../css/button.css" rel="stylesheet">
  <link href="../css/navbar.css" rel="stylesheet">
  <link href="../css/header.css" rel="stylesheet">


</head>
<body>

<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="adminhome.php"><img src="../img/logo.png" height="30px" width="25px"> IdeaFlare.in</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="adminhome.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin-feedback.php">Feedback</a>
        </li>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Account </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Settings</a>
              <a class="dropdown-item" href="#"></a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../includes/logout.inc.php">Logout</a>
            </div>
        </li>
      </ul> 

      </div>
</nav>


<div class="container">
  <div class="header-content">
    <h1 class="text-center">Profile</h1>
  </div>

<!-- PERSONAL INFORMATION -->

  <div class="jumbotron pt-3 mt-4">
    <h3>Personal Information</h3>
    <hr class="my-4">
    
      <?php

      include '../includes/connect.inc.php';
      
      $id = $_GET['id'];

      $sql1 = "SELECT * FROM user WHERE id = $id";
      $result1 = mysqli_query($con, $sql1) or die('Error Retrieving User Data');
      $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
      
      // $id = $row1['id'];

      $sql2 = "SELECT * FROM cp_personal where id =".$id;
      $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Profile Data');
      $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);

      if (mysqli_num_rows($result1)!=0 && mysqli_num_rows($result2)!=0) {

      echo'<div class="row">';
      echo' <div class="col-md-12">';
      echo'   <p class="title-size">';
      echo $row1['firstname'] . ' ' . $row1['lastname'];
      echo'   </p>';
      echo' </div>';
      echo'</div>';
        
      echo '<div class="row">';
      echo '  <div class="col-md-2 font-weight-bold">';
      echo '    <p>About you:</p>';
      echo '  </div>';
      echo '  <div class="col-md-10">';
      echo '    <p>';
      if($row2['about']!= ""){
      echo $row2['about'];
      }else{
      echo '-'; 
      } 
      echo '    </p>';
      echo '  </div>';
      echo '</div>';

      echo'<div class="row">';
      echo' <div class="col-md-2 font-weight-bold">';
      echo'   <p>Industry:</p>';
      echo' </div>';
      echo' <div class="col-md-10">';
      echo'   <p>';
      if($row2['industry']!= ""){
      echo $row2['industry'];
      }else{
      echo '-';
      }
      echo'   </p>';
      echo' </div>';
      echo'</div>';

      echo'<div class="row">';
      echo' <div class="col-md-2 font-weight-bold">';
      echo'   <p>Email:</p>';
      echo' </div>';
      echo' <div class="col-md-10">';
      echo'   <p>';
      echo $row1['email'];
      echo'   </p>';
      echo' </div>';
      echo'</div>';

      echo'<div class="row">';
      echo' <div class="col-md-2 font-weight-bold">';
      echo'   <p>Alternate Email:</p>';
      echo' </div>';
      echo' <div class="col-md-10">';
      echo'   <p>';
      if($row2['altEmail']!= ""){
      echo $row2['altEmail'];
      }{
      echo "-";
      }
      echo'   </p>';
      echo' </div>';
      echo'</div>';

      echo'<div class="row">';
      echo' <div class="col-md-2 font-weight-bold">';
      echo'   <p>Contact:</p>';
      echo' </div>';
      echo' <div class="col-md-10">';
      echo'   <p>';
      if($row2['contact'] != ""){
      echo $row2['contact'];
      }else{
      echo "-";
      }
      echo'   </p>';
      echo' </div>';
      echo'</div>';

      echo'<div class="row">';
      echo' <div class="col-md-2 font-weight-bold">';
      echo'   <p>CV:</p>';
      echo' </div>';
      echo' <div class="col-md-10">';
      echo'   <p>';
      if($row2['cv'] != ""){
      echo'<a href="../'.$row2['cv'].'" target="_blank">Download CV</a>';
      }else{
      echo "-";
      }
      echo'   </p>';
      echo' </div>';
      echo'</div>';

      }else {
        echo "<p>Personal Information Not Available</p>";
      }


      ?>

    <!-- <div class="text-right"> 
       <a class="btn btn-primary btn-md" href="editProfile-personal.php" role="button">Edit</a>';
    </div> -->

  </div>


<!-- EDUCATION INFORMATION -->

  <div class="jumbotron pt-3 mt-4">
    <h3>Education Information</h3>
    <hr class="my-4">


      <?php

      // include 'includes/connect.inc.php';
      
      $sql2 = "SELECT * FROM cp_education where id = ".$id;
      $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Profile Data');
      $row = mysqli_fetch_array($result2, MYSQLI_ASSOC);

      if (mysqli_num_rows($result2)!=0) {
    
      // while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {

        echo'<div class="row">';
        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>Class 10:</p>';
        echo' </div>';
        echo' <div class="col-md-4">';
        echo'   <p>';
        if($row['10_percentage']!= ""){
        echo $row['10_percentage']."%";
        }else{
        echo "-";
        }
        echo'   </p>';
        if($row['10_marksheet']!=""){
        echo'     <a href="../'.$row['10_marksheet'].'" target="_blank">Download 10th Marksheet</a>';
        }
        echo' </div>';

        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>Class 12:</p>';
        echo' </div>';
        echo' <div class="col-md-4">';
        echo'   <p>';
        if($row['12_percentage']!= ""){
        echo $row['12_percentage']."%";
        }else{
        echo "-";
        }
        echo'   </p>';
        if($row['12_marksheet']!=""){
        echo'     <a href="../'.$row['12_marksheet'].'" target="_blank">Download 12th Marksheet</a>';
        }
        echo' </div>';
        echo'</div>';

        echo'<div class="row mt-3">';
        echo' <div class="col-md-12">';
        echo'   <p class="font-weight-bold">Graduation:</p>';
        echo' </div>';
        echo'</div>';

        echo'<div class="row">';
        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>Field:</p>';
        echo' </div>';
        echo' <div class="col-md-4">';
        echo'   <p>';
        if($row['ug_field']!= ""){
        echo $row['ug_field'];
        }else{
        echo "-";
        }
        echo'   </p>';
        echo' </div>';

        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>CGPA:</p>';
        echo' </div>';
        echo' <div class="col-md-4">';
        echo'   <p>';
        if($row['ug_cgpa']!= ""){
        echo $row['ug_cgpa'];
        }else{
        echo "-";
        }
        echo'   </p>';
        if($row['ug_marksheet']!=""){
        echo'     <a href="../'.$row['ug_marksheet'].'" target="_blank">Download Marksheet</a>';
        }
        echo' </div>';
        echo'</div>';

        echo'<div class="row mt-3">';
        echo' <div class="col-md-12">';
        echo'   <p class="font-weight-bold">Post Graduation:</p>';
        echo' </div>';
        echo'</div>';

        echo'<div class="row">';
        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>Field:</p>';
        echo' </div>';
        echo' <div class="col-md-4">';
        echo'   <p>';
        if($row['pg_field']!= ""){
        echo $row['pg_field'];
        }else{
        echo "-";
        }
        echo'   </p>';
        echo' </div>';

        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>CGPA:</p>';
        echo' </div>';
        echo' <div class="col-md-4">';
        echo'   <p>';
        if($row['pg_cgpa']!= ""){
        echo $row['pg_cgpa'];
        }else{
        echo "-";
        }
        echo'   </p>';
        if($row['pg_marksheet']!=""){
        echo'     <a href="../'.$row['pg_marksheet'].'" target="_blank">Download Marksheet</a>';
        }
        echo' </div>';
        echo'</div> ';

        // }
      }else {
        echo "<p>Education Information Not Available</p>";
      }

      ?>

  </div>


<!-- PROJECTS -->

  <div class="jumbotron pt-3 mt-4">
    <h3>Projects</h3>
    <hr class="my-4">

      <?php

      // include 'includes/connect.inc.php';

      $sql2 = "SELECT * FROM cp_projects where id = ".$id;
      $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Profile Data');
    
    //arrange project_id in ascending order to avoid errors
      $i = 1;
      while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
        $sql3 = "UPDATE cp_projects SET project_id = $i WHERE title = '". $row2['title'] ."'";
        $result3 = mysqli_query($con, $sql3) or die('Error Retrieving Project Data');
        if($result3 == false){
          echo "Something Went Wrong";  
        }
        $i++;
      }    

      $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Profile Data');
      $project_count = 1;

      if (mysqli_num_rows($result2)!=0) {
    
      while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {

        echo'<div class="row">';
        echo' <div class="col-md-12">';
        echo'   <p class="font-weight-bold">Project';
        echo ' '.$project_count++;
        echo'   </p>';
        echo' </div>  ';
        echo'</div> ';

        echo'<div class="row">';
        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>Title:</p>';
        echo' </div>';
        echo' <div class="col-md-10">';
        echo'   <p>';
        if($row['title']!=""){
        echo $row['title'];
        }else{
        echo "-";
        }
        echo '    </p>';
        echo' </div>';
        echo'</div>';

        echo '<div class="row">';
        echo '  <div class="col-md-2 font-weight-bold">';
        echo '    <p>Description:</p>';
        echo '  </div>';
        echo '  <div class="col-md-10">';
        echo '    <p>';
        if($row['description']!=""){
        echo $row['description'];
        }else{
        echo "-";
        }
        echo '    </p>';
        echo '  </div>';
        echo '</div>';

        if($row['report']!=""){
        echo '<div class="row">';
        echo '  <div class="col-md-6">';
        echo'     <a href="../'.$row['report'].'" target="_blank">Download Project Report</a>';
        echo '  </div>';
        // echo '  <div class="col-md-6">';
        // echo'     <a href="editProfile-addReport.php?project_id='.$row['project_id'].'">Update Project Report</a>';
        // echo '  </div>';
        echo '</div>';

        }else{
        // echo '<div class="row">';
        // echo '  <div class="col-md-12">';
        // echo'     <a href="editProfile-addReport.php?project_id='.$row['project_id'].'">Add Project Report</a>';
        // echo '  </div>';
        // echo '</div>';
        }

        echo '<hr class="my-4">';

        }
      }else {
        echo "<p>No Projects Available</p>";
      }

      ?>

  </div>


<!-- EXPERIENCE INFORMATION -->

  <div class="jumbotron pt-3 mt-4">
    <h3>Experience Information</h3>
    <hr class="my-4">

      <?php

      // include 'includes/connect.inc.php';

      $sql2 = "SELECT * FROM cp_experience where id = ".$id;
      $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Profile Data');

      //arrange experience_id in ascending order to avoid errors
      $i = 1;
      while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
        $sql3 = "UPDATE cp_experience SET experience_id = $i WHERE company = '". $row2['company'] ."'";
        $result3 = mysqli_query($con, $sql3) or die('Error Retrieving Experience Data');
        if($result3 == false){
          echo "Something Went Wrong";  
        }
        $i++;
      }    

      $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Profile Data');

      $exp_count = 1;

      if (mysqli_num_rows($result2)!=0) {
    
      while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {

        echo'<div class="row">';
        echo' <div class="col-md-12">';
        echo'   <p class="font-weight-bold">Experience';
        echo ' '. $exp_count++;
        echo'   </p>';
        echo' </div>  ';
        echo'</div> ';
        
        echo'<div class="row">';
        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>Duration:</p>';
        echo' </div>';
        echo' <div class="col-md-4">';
        echo'   <p>';
        if($row['duration']!=""){
        echo $row['duration'] . ' ';
        echo'     Months</p>';
        }else{
        echo "-";
        }
        echo' </div>';

        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>Status:</p>';
        echo' </div>';
        echo' <div class="col-md-4">';
        echo'   <p>';
        if($row['ongoing'] == 0){
          echo 'Completed'; 
        }else {
          echo 'Ongoing';
        }
        echo'   </p>';
        echo' </div>';
        echo'</div>';

        echo'<div class="row">';
        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>Position:</p>';
        echo' </div>';
        echo' <div class="col-md-10">';
        echo'   <p>';
        if($row['position']!=""){
        echo $row['position'] . ' ';
        }else{
        echo "-";
        }
        echo'   </p>';
        echo' </div>';
        echo'</div>';

        echo'<div class="row">';
        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>Resposibilities:</p>';
        echo' </div>';
        echo' <div class="col-md-10">';
        echo'   <p>';
        if($row['responsibilities']!=""){
        echo $row['responsibilities'] . ' ';
        }else{
        echo "-";
        }
        echo'   </p>';
        echo' </div>';
        echo'</div>';

        echo'<div class="row">';
        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>Location:</p>';
        echo' </div>';
        echo' <div class="col-md-10">';
        echo'   <p>';
        if($row['location']!=""){
        echo $row['location'] . ' ';
        }else{
        echo "-";
        }
        echo'   </p>';
        echo' </div>';
        echo'</div>';

        echo'<hr class="my-4">';
        
        }
        
      }else {
        echo "<p>Experience Information Not Available</p>";
      }

      ?>


  </div>

  <?php 
  echo "<div class='row'>";
  echo'<div class="col-6 mb-5"> ';
  echo'    <a href="admin-profiles.php" class="btn btn-primary button btn-md">Profiles</a>';
  echo'</div>';

  echo'<div class="col-6 text-right mb-5"> ';
  echo'    <a href="admin-profile-2.php?id='.$id.'" class="btn btn-primary button btn-md">Next</a>';
  echo'</div>';
  echo "</div>";
  ?>

<!--  <div class="jumbotron pt-3 mt-4">
    <h3>Personal Information</h3>
    <hr class="my-4">
    
    <div class="row">
      <div class="col-md-12">
        <p class="title-size">Ghosty Ghost</p>
      </div>
    </div>
      
    <div class="row">
      <div class="col-md-2 font-weight-bold">
        <p>About you:</p>
      </div>
      <div class="col-md-10">
        <p>gsyhbckbshjfhb ghjnrhbxm rgbhnxhbjsdnma</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-2 font-weight-bold">
        <p>Industry:</p>
      </div>
      <div class="col-md-10">
        <p>Inforamtion Tehcnoand</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-2 font-weight-bold">
        <p>Email:</p>
      </div>
      <div class="col-md-10">
        <p>abc@examloc.com</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-2 font-weight-bold">
        <p>Alternate Email:</p>
      </div>
      <div class="col-md-10">
        <p>abc@examloc.com</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-2 font-weight-bold">
        <p>Contact:</p>
      </div>
      <div class="col-md-10">
        <p>99836311</p>
      </div>
    </div>

  </div> -->

  <!-- <div class="jumbotron pt-3 mt-4">
    <h3>Education Information</h3>
    <hr class="my-4">

    <div class="row">
      <div class="col-md-2 font-weight-bold">
        <p>Class 10:</p>
      </div>
      <div class="col-md-4">
        <p>20%</p>
      </div>

      <div class="col-md-2 font-weight-bold">
        <p>Class 12:</p>
      </div>
      <div class="col-md-4">
        <p>80%</p>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-12">
        <p class="font-weight-bold">Graduation:</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-2 font-weight-bold">
        <p>Field:</p>
      </div>
      <div class="col-md-4">
        <p>IT Engg</p>
      </div>

      <div class="col-md-2 font-weight-bold">
        <p>CGPA</p>
      </div>
      <div class="col-md-4">
        <p>9.99</p>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-12">
        <p class="font-weight-bold">Post Graduation:</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-2 font-weight-bold">
        <p>Field:</p>
      </div>
      <div class="col-md-4">
        <p>Bio-Medical</p>
      </div>

      <div class="col-md-2 font-weight-bold">
        <p>CGPA</p>
      </div>
      <div class="col-md-4">
        <p>9.99</p>
      </div>
    </div>
  </div> -->

<!--  <div class="jumbotron pt-3 mt-4">
    <h3>Projects</h3>
    <hr class="my-4">

    <div class="row">
      <div class="col-md-12">
        <p class="font-weight-bold">Project# 1</p>
      </div>  
    </div>  

    <div class="row">
      <div class="col-md-2 font-weight-bold">
        <p>Title:</p>
      </div>
      <div class="col-md-10">
        <p>Very cool Project</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-2 font-weight-bold">
        <p>Description:</p>
      </div>
      <div class="col-md-10">
        <p>My project is very cool....plz select this project...ye project bahut sahi h ji...select kar do ji...</p>
      </div>
    </div>

    <hr class="my-4">

  </div> -->

  <!-- <div class="jumbotron pt-3 mt-4">
    <h3>Experience Information</h3>
    <hr class="my-4">

    <div class="row">
      <div class="col-md-12">
        <p class="font-weight-bold">Experience# 1</p>
      </div>  
    </div>  
    
    <div class="row">
      <div class="col-md-2 font-weight-bold">
        <p>Duration:</p>
      </div>
      <div class="col-md-4">
        <p>10 Months</p>
      </div>

      <div class="col-md-2 font-weight-bold">
        <p>Status:</p>
      </div>
      <div class="col-md-4">
        <p>ongoing/completed</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-2 font-weight-bold">
        <p>Position:</p>
      </div>
      <div class="col-md-10">
        <p>CEO se bhi upar</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-2 font-weight-bold">
        <p>Resposibilities:</p>
      </div>
      <div class="col-md-10">
        <p>Sabko jala dunga main</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-2 font-weight-bold">
        <p>Location:</p>
      </div>
      <div class="col-md-10">
        <p>Hell</p>
      </div>
    </div>

    <hr class="my-4">

  </div> -->


</div>

</body>
</html>