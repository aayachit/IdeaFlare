 <?php 
  session_start();
  $session = $_SESSION['email'];
  if($session==true){

  }else{
    header("Location:home.php");
  }

 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Patents</title>
  <link rel="icon" href="img/logo-invert.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="css/userhome.css" rel="stylesheet">
	<link href="css/button.css" rel="stylesheet">
	<link href="css/navbar.css" rel="stylesheet">
  <link href="css/header.css" rel="stylesheet">  <!-- for header -->

</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="#"><img src="img/logo.png" height="30px" width="25px"> IdeaFlare.in</a>
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
          <li class="nav-item active">
            <a class="nav-link" href="#">Patents</a>
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
    <h1 class="text-center">Patents</h1>
  </div>
  <!-- <h2 class="text-center mt-3">Patents</h2>   -->
      <?php

      include 'includes/connect.inc.php';

      $sql = "SELECT * FROM patents";
      $result = mysqli_query($con, $sql) or die('Error Retrieving Patent Data');

      if (mysqli_num_rows($result)!=0) {
    
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

          echo'<div class="jumbotron pt-3 mt-4">';
      

          echo'<h3 class="title-size text-center mt-3">';
          echo $row['name'];
          echo'</h3>';
          echo'<hr class="my-4">';
              
          echo'<div class="row">';
          echo'  <div class="col-md-6">';
          echo'    <p class="font-weight-bold">Application No.:';
          echo ' ' . $row['app_no'];
          echo'    </p>';
          echo'  </div>';
          echo'  <div class="col-md-6">';
          echo'    <p class="font-weight-bold text-right">Authority:';
          echo $row['authority'];
          echo'    </p>';
          echo'  </div>';
          echo'</div>';

          echo'<div class="row">';
          echo'  <div class="col-md-12">';
          echo'    <p class="mt-3">';
          echo $row['description'];
          echo'    </p>';
          echo'  </div>';
          echo'</div>';
          echo'</div>';
        }
      }else {
        echo "<p>No Patents Available</p>";
      }

      ?>



</div>


</body>
</html>