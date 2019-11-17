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
	<title>Feedbacks</title>
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

<!-- Navigation -->
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
        <li class="nav-item active">
          <a class="nav-link" href="#">Feedback</a>
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
    <h1 class="text-center">Feedback</h1>
  </div>

   <div class="jumbotron pt-3 pb-3 mt-4">
    <h3>Feedback</h3>
    <hr class="my-4">   
    <!-- ADD Created Workshops -->

    <?php

    include '../includes/connect.inc.php';
    $sql = "SELECT * FROM feedback";
    $result = mysqli_query($con, $sql) or die('Error Retrieving Data');

    if (mysqli_num_rows($result)!=0) {

      echo '<div class="table-responsive-md">';
      echo '<table class="table">';
      echo '  <thead class="thead bg-primary">';
      echo '    <tr class="d-flex"> <!-- d-flex = allow flex to change column widths -->';
      // echo '      <th scope="col" class="col-1">ID</th>';
      echo '      <th scope="col" class="col-2">Name</th>';
      echo '      <th scope="col" class="col-3">Email</th>';
      echo '      <th scope="col" class="col-2">Contact</th>';
      echo '      <th scope="col" class="col-4">Message</th>';
      echo '      <th scope="col" class="col-1">Delete</th>';
      echo '    </tr>';
      echo '  </thead>';
      echo '  <tbody>';

      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      echo '    <tr class="d-flex">';
      // echo '      <th class="col-1" scope="row">';
      // echo $row['id'];
      echo '      </th><td class="col-2">';
      echo $row['name'];
      echo '      </td><td class="col-3">';
      echo $row['email'];
      echo '      </td><td class="col-2">';
      echo $row['contact'];
      echo '      </td><td class="col-4">';
      echo $row['message'];
      echo '      </td><td class="col-1"><a href="../includes/admin-feedback-delete.inc.php?id='.$row['id'].'">Delete</a></td>';
      echo '      </tr>';
      }
      
      echo '</tbody> </table> </div>';
    
    }else {
      echo "<p>No Workshops Available</p>";
    }


    ?>

  </div>  

</div>

</body>
</html>