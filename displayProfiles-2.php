<?php 
  session_start();
  $session = $_SESSION['email'];
  if($session==true){

  }else{
    header("Location:home.php");
  }

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profiles</title>
  <link rel="icon" href="img/logo-invert.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/navbar.css" rel="stylesheet">
  <link href="css/button.css" rel="stylesheet">
  <link href="css/userhome.css" rel="stylesheet">
  <link href="css/header.css" rel="stylesheet">

</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="userhome.php"><img src="img/logo.png" height="30px" width="25px"> IdeaFlare.in</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="userhome.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Blogs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="displayPatents-user.php">Patents</a>
          </li>
           <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Account </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="users-settings.php">Settings</a>
                <a class="dropdown-item" href="#"></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="includes/logout.inc.php">Logout</a>
              </div>
          </li>
      </ul> 

      </div>
</nav>


<div class="container">
  <div class="header-content">
    <h1 class="text-center">Profile</h1>
  </div>

  <h2 class="text-center mt-4">Academic Information</h2>
  
  <div class="jumbotron pt-3 mt-4">
    <h3>Skills</h3>
    <hr class="my-4">
   
      <?php

      include 'includes/connect.inc.php';
  
      $id = $_GET['id'];

      $sql1 = "SELECT * FROM user WHERE id = $id";
      $result1 = mysqli_query($con, $sql1) or die('Error Retrieving User Data');
      $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);

      $sql2 = "SELECT * FROM cp_skills where id = ".$id;
      $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Profile Data');

      //arrange skill_id in ascending order to avoid errors
      $i = 1;
      while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
        $sql3 = "UPDATE cp_skills SET skill_id = $i WHERE name = '". $row2['name'] ."'";
        $result3 = mysqli_query($con, $sql3) or die('Error Retrieving Skill Data');
        if($result3 == false){
          echo "Something Went Wrong";  
        }
        $i++;
      }    

      $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Profile Data');

      if (mysqli_num_rows($result2)!=0) {
    
      while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
        echo'<div class="row mt-3">';
        echo' <div class="col-md-2">';
        echo'   <p>';
        echo $row2['name'];
        echo'   </p>';
        echo' </div>';
        echo' <div class="col-md-2">';
        echo'   <p class="text-center font-weight-bold">:</p>';
        echo' </div>';
        echo' <div class="col-md-2">';
        echo'   <p>';
        echo $row2['rating'];
        echo'   </p>';
        echo' </div>';
        echo'</div>';

        }
      }else {
        echo "<p>No Skills Available</p>";
      }

      ?>
 
  </div>



  <div class="jumbotron pt-3 mt-4">
    <h3>Certifications</h3>
    <hr class="my-4">

    <?php

      $sql2 = "SELECT * FROM cp_certifications WHERE id = ".$id;
      $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Profile Data');

      $certification_count = 1;
  
      //arrange certification_id in ascending order to avoid errors
      $i = 1;
      while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
        $sql3 = "UPDATE cp_certifications SET certification_id = $i WHERE number = '". $row2['number'] ."'";
        $result3 = mysqli_query($con, $sql3) or die('Error Retrieving Certification Data');
        if($result3 == false){
          echo "Something Went Wrong";  
        }
        $i++;
      }    

      $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Profile Data');

      if (mysqli_num_rows($result2)!=0) {
    
      while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {

        echo'<div class="row">';
        echo' <div class="col-md-12">';
        echo'   <p class="font-weight-bold">Certification';
        echo ' '. $certification_count++;
        echo'   </p>';
        echo' </div>  ';
        echo'</div> ';

        echo'<div class="row">';
        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>Title:</p>';
        echo' </div>';
        echo' <div class="col-md-10">';
        echo'   <p>';
        if($row['name']!=""){
        echo $row['name'];
        }else{
        echo "-";
        }
        echo'   </p>';
        echo' </div>';
        echo'</div>';

        echo'<div class="row">';
        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>Authority:</p>';
        echo' </div>';
        echo' <div class="col-md-10">';
        echo'   <p>';
        if($row['authority']!=""){
        echo $row['authority'];
        }else{
        echo "-";
        }
        echo'   </p>';
        echo' </div>';
        echo'</div>';


        echo'<div class="row">';
        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>Certification No:</p>';
        echo' </div>';
        echo' <div class="col-md-10">';
        echo'   <p>';
        if($row['number']!=""){
        echo $row['number'];
        }else{
        echo "-";
        }
        echo'   </p>';
        echo' </div>';
        echo'</div>';

        echo'<div class="row">';
        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>Date:</p>';
        echo' </div>';
        echo' <div class="col-md-10">';
        echo'   <p>';
        if($row['date']!="0000-00-00"){
        echo $row['date'];
        }else{
        echo "-";
        }
        echo'   </p>';
        echo' </div>';
        echo'</div>';

        echo'<div class="row">';
        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>Link:</p>';
        echo' </div>';
        echo' <div class="col-md-10">';
        echo'   <p>';
        if($row['link']!=""){
        echo $row['link'];
        }else{
        echo "-";
        }
        echo'   </p>';
        echo' </div>';
        echo'</div>';

        echo'<div class="row">';
        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>Details:</p>';
        echo' </div>';
        echo' <div class="col-md-10">';
        echo'   <p>';
        if($row['details']!=""){
        echo $row['details'];
        }else{
        echo "-";
        }
        echo'   </p>';
        echo' </div>';
        echo'</div>';

        echo'<hr class="my-4">';
        }
      }else {
        echo "<p>No Certifications Available</p>";
      }

      ?>

  </div>

  <div class="jumbotron pt-3 mt-4">
    <h3>Courses</h3>
    <hr class="my-4">

    <?php

      $sql2 = "SELECT * FROM cp_courses WHERE id = ".$id;
      $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Profile Data');

      $course_count = 1;

      //arrange course_id in ascending order to avoid errors
      $i = 1;
      while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
        $sql3 = "UPDATE cp_courses SET course_id = $i WHERE number = '". $row2['number'] ."'";
        $result3 = mysqli_query($con, $sql3) or die('Error Retrieving Course Data');
        if($result3 == false){
          echo "Something Went Wrong";  
        }
        $i++;
      }    

      $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Profile Data');

      if (mysqli_num_rows($result2)!=0) {
    
      while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {

        echo '<div class="row">';
        echo '  <div class="col-md-12">';
        echo '    <p class="font-weight-bold">Course';
        echo ' ' . $course_count++;
        echo '    </p>';
        echo '  </div>  ';
        echo '</div>  ';

        echo '<div class="row">';
        echo '  <div class="col-md-2 font-weight-bold">';
        echo '    <p>Title:</p>';
        echo '  </div>';
        echo '  <div class="col-md-10">';
        echo '    <p>';
        if($row['name']!=""){
        echo $row['name'];
        }else{
        echo "-";
        }
        echo '    </p>';
        echo '  </div>';
        echo '</div>';

        echo '<div class="row">';
        echo '  <div class="col-md-2 font-weight-bold">';
        echo '    <p>Authority:</p>';
        echo '  </div>';
        echo '  <div class="col-md-10">';
        echo '    <p>';
        if($row['authority']!=""){
        echo $row['authority'];
        }else{
        echo "-";
        }
        echo '    </p>';
        echo '  </div>';
        echo '</div>';


        echo'<div class="row">';
        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>Course Number:</p>';
        echo' </div>';
        echo' <div class="col-md-10">';
        echo'   <p>';
        if($row['number']!=""){
        echo $row['number'];
        }else{
        echo "-";
        }
        echo'   </p>';
        echo' </div>';
        echo'</div>';


        echo'<div class="row">';
        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>Date:</p>';
        echo' </div>';
        echo' <div class="col-md-10">';
        echo'   <p>';
        if($row['date']!="0000-00-00"){
        echo $row['date'];
        }else{
        echo "-";
        }
        echo'   </p>';
        echo' </div>';
        echo'</div>';

        echo'<div class="row">';
        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>Course Link:</p>';
        echo' </div>';
        echo' <div class="col-md-10">';
        echo'   <p>';
        if($row['link']!=""){
        echo $row['link'];
        }else{
        echo "-";
        }
        echo'   </p>';
        echo' </div>';
        echo'</div>';

        echo'<div class="row">';
        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>Details:</p>';
        echo' </div>';
        echo' <div class="col-md-10">';
        echo'   <p>';
        if($row['details']!=""){
        echo $row['details'];
        }else{
        echo "-";
        }
        echo'   </p>';
        echo' </div>';
        echo'</div>';

        echo'<hr class="my-4">';
      
        }
      }else {
        echo "<p>No Courses Available</p>";
      }

      ?>

  </div>


  <div class="jumbotron pt-3 mt-4">
    <h3>Workshops</h3>
    <hr class="my-4">

    <?php

      $sql2 = "SELECT * FROM cp_workshops WHERE id = ".$id;
      $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Profile Data');

      $workshop_count = 1;

      //arrange workshop_id in ascending order to avoid errors
      $i = 1;
      while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
        $sql3 = "UPDATE cp_workshops SET workshop_id = $i WHERE name = '". $row2['name'] ."'";
        $result3 = mysqli_query($con, $sql3) or die('Error Retrieving Workshop Data');
        if($result3 == false){
          echo "Something Went Wrong";  
        }
        $i++;
      }    

      $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Profile Data');

      if (mysqli_num_rows($result2)!=0) {
    
      while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
      
        echo'<div class="row">';
        echo' <div class="col-md-12">';
        echo'   <p class="font-weight-bold">Workshop';
        echo ' ' . $workshop_count++;
        echo'   </p>';
        echo' </div>  ';
        echo'</div> ';

        echo'<div class="row">';
        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>Title:</p>';
        echo' </div>';
        echo' <div class="col-md-10">';
        echo'   <p>';
        if($row['name']!=""){
        echo $row['name'];
        }else{
        echo "-";
        }
        echo'   </p>';
        echo' </div>';
        echo'</div>';

        echo'<div class="row">';
        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>Authority:</p>';
        echo' </div>';
        echo' <div class="col-md-10">';
        echo'   <p>';
        if($row['authority']!=""){
        echo $row['authority'];
        }else{
        echo "-";
        }
        echo'   </p>';
        echo' </div>';
        echo'</div>';


        echo'<div class="row">';
        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>Date:</p>';
        echo' </div>';
        echo' <div class="col-md-10">';
        echo'   <p>';
        if($row['date']!="0000-00-00"){
        echo $row['date'];
        }else{
        echo "-";
        }
        echo'   </p>';
        echo' </div>';
        echo'</div>';

        echo'<div class="row">';
        echo' <div class="col-md-2 font-weight-bold">';
        echo'   <p>Details:</p>';
        echo' </div>';
        echo' <div class="col-md-10">';
        echo'   <p>';
        if($row['details']!=""){
        echo $row['details'];
        }else{
        echo "-";
        }
        echo'   </p>';
        echo' </div>';
        echo'</div>';

        echo'<hr class="my-4">';
                  
        }
      }else {
        echo "<p>No Workshops Available</p>";
      }

      ?>
  
  </div>

  <?php
  echo'<div class="row">';
  echo'  <div class="col-6 mb-5">  ';
  echo'      <a href="displayProfiles-1.php?id='.$id.'" class="btn btn-danger btn-md">Back</a>';
  echo'  </div>';

  echo'  <div class="col-6 text-right mb-5"> ';
  echo'      <a href="displayProfiles-3.php?id='.$id.'" class="btn btn-primary button btn-md">Next</a>';
  echo'  </div>';
  echo'</div>';

  ?>

</div>


</body>
</html>