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
	<title>Home</title>
	<link rel="icon" href="../img/logo-invert.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link href="../css/userhome.css" rel="stylesheet">
  <link href="../css/button.css" rel="stylesheet">
  <link href="../css/navbar.css" rel="stylesheet">


</head>
<body>

<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="#"><img src="../img/logo.png" height="30px" width="25px"> IdeaFlare.in</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
	        <a class="nav-link" href="#">Home</a>
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

<!--- Cards -->
<div class="container mt-5">
  <div class="row">
    <div class="col-md-4">
      <div class="card card-size">
        <img class="card-img-top" src="../img/team1.png">
        <div class="card-body">
          <h4 class="card-title">Profiles</h4>
          <p class="card-text">Manage Profiles</p>
          <a href="admin-profiles.php" class="btn btn-primary button">Enter</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card card-size">
        <img class="card-img-top" src="../img/team2.png">
        <div class="card-body">
          <h4 class="card-title">Workshops</h4>
          <p class="card-text">Manage Workshops</p>
          <a href="admin-workshop.php" class="btn btn-primary button">Enter</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card card-size">
        <img class="card-img-top" src="../img/team3.png">
        <div class="card-body">
          <h4 class="card-title">Patents</h4>
          <p class="card-text">Manage Patents</p>
          <a href="admin-patents.php" class="btn btn-primary button">Enter</a>
        </div>
      </div>
    </div>
  </div>
  

  <div class="jumbotron pt-3 pb-3 mt-4">
    <h3>Users</h3>
    <hr class="my-4">

    <?php

    include '../includes/connect.inc.php';
    $sql = "SELECT * FROM user WHERE type = 'user'";
    $result = mysqli_query($con, $sql) or die('Error Retrieving Data');

    if (mysqli_num_rows($result)!=0) {
      echo '<div class="table-responsive-md">';
      echo '<table class="table">';
      echo '  <thead class="thead bg-primary">';
      echo '    <tr class="d-flex"> <!-- d-flex = allow flex to change column widths -->';
      echo '      <th scope="col" class="text-center col-1">ID</th> ';
      echo '      <th scope="col" class="text-center col-3">First Name</th> ';
      echo '      <th scope="col" class="text-center col-3">Last Name</th>';
      echo '      <th scope="col" class="text-center col-3">Email</th>';
      echo '      <th scope="col" class="text-center col-2">Profile</th>';
      echo '    </tr>';
      echo '  </thead>';
      echo '  <tbody>';

      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          if ($row['profile'] == 0) {
            $profile_status = "Not Created";
          }else{
            $profile_status = "Created";
          }

        echo '    <tr class="d-flex">';
        echo '      <th class="text-center col-1" scope="row">';
        echo $row['id'];
        echo '      </th><td class="text-center col-3">';
        echo $row['firstname'];
        echo '      </td><td class="text-center col-3">';
        echo $row['lastname'];
        echo '      </td><td class="text-center col-3">'; 
        echo $row['email'];
        echo '      </td><td class="text-center col-2">';
        echo '<a href="admin-profile-1.php?id='. $row['id']. '">' .$profile_status .'</a>'; 
        echo '      </td>';
        echo '    </tr>';
      }      
      echo '</tbody> </table> </div>';
    }else{
      echo "<p>No Users Available</p>";
    }

    ?>
    <hr class="my-4">
    
  </div>



  <div class="jumbotron pt-3 pb-3 mt-4">
    <h3>Investors</h3>
    <hr class="my-4">

    <?php

    include '../includes/connect.inc.php';
    $sql = "SELECT * FROM user WHERE type = 'investor'";
    $result = mysqli_query($con, $sql) or die('Error Retrieving Data');

    if (mysqli_num_rows($result)!=0) {
      echo '<div class="table-responsive-md">';
      echo '<table class="table">';
      echo '  <thead class="thead bg-primary">';
      echo '    <tr class="d-flex">';
      echo '      <th scope="col" class="text-center col-2">ID</th> ';
      echo '      <th scope="col" class="text-center col-3">First Name</th> ';
      echo '      <th scope="col" class="text-center col-3">Last Name</th>';
      echo '      <th scope="col" class="text-center col-4">Email</th>';
      echo '    </tr>';
      echo '  </thead>';
      echo '  <tbody>';

      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo '    <tr class="d-flex">';
        echo '      <th class="text-center col-2" scope="row">';
        echo $row['id'];
        echo '      </th><td class="text-center col-3">';
        echo $row['firstname'];
        echo '      </td><td class="text-center col-3">';
        echo $row['lastname'];
        echo '      </td><td class="text-center col-4">';
        echo $row['email'];
        echo '      </td>';
        echo '    </tr>';
      }      
      echo '</tbody> </table> </div>';
    }else{
      echo "<p>No Investors Available</p>";
    }

    ?>
    <hr class="my-4">
    
  </div>

</div>



</body>
</html>



