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
  <title>Profiles</title>
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



<!-- Content -->

<div class="container">
  <div class="header-content">
    <h1 class="text-center">Profile</h1>
  </div>

    <?php

      include '../includes/connect.inc.php';

      $sql1 = "SELECT * FROM user WHERE profile =1";
      $result1 = mysqli_query($con, $sql1) or die('Error Retrieving User Data');

      while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {

        echo'<div class="jumbotron pt-3 mt-4">';
        echo'<h3>'.$row1['firstname'].' '.$row1['lastname'].'</h3>';
        echo'  <hr class="my-4">';
          
        $id = $row1['id'];
        $sql2 = "SELECT * FROM cp_personal where id = ".$id;
        $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Profile Data');

        $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC); 

        echo'<div class="row">';
        echo' <div class="col-md-4">';
        if($row2['image'] != ""){
          echo'   <img src="../'.$row2['image'].'" width="250px">';
        }else{
          echo'   <img src="../img/user.jpg" width="250px">';
        }
        echo' </div>';

        echo' <div class="col-md-8">';
        echo'   <div class="row">';
        echo'     <div class="col-xs-6">';
        echo'       <p>';
        echo $row1['firstname'];
        echo'       </p>';
        echo'     </div>';
        echo'     <div class="col-xs-6">';
        echo'       <p>';
        echo $row1['lastname'];
        echo'       </p>';
        echo'     </div>';
        echo'   </div>';

        echo'   <div class="row">';
        echo'     <div class="col-xs-12">';
        echo'       <p>';
        echo $row2['about'];
        echo'       </p>';
        echo'     </div>';
        echo'   </div>';

        echo'   <div class="row">';
        echo'     <div class="col-xs-12">';
        echo'       <p>';
        echo $row1['email'];
        echo'       </p>';
        echo'     </div>';
        echo'   </div>';

        echo'   <div class="row">';
        echo'     <div class="col-xs-12">';
        echo'       <p>';
        echo $row2['contact'];
        echo'       </p>';
        echo'     </div>';
        echo'   </div>';
        echo' </div>';
        echo'</div>';

        echo'<hr class="my-4">';
        echo'   <div class="row">';
        echo'     <div class="col-md-6">';
        echo'       <a class="btn btn-primary btn-md button" href="admin-profile-1.php?id='.$id.'" role="button">See More</a>';
        echo'     </div>';
        echo'   </div>';
        echo'</div>';
      }
    ?>
  


</div>



</body>
</html>