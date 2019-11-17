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
	<title>Workshops</title>
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

<div class="container-fluid">
  
  <div class="header-content">
    <h1 class="text-center">Workshops</h1>
  </div>

  <div class="jumbotron pt-3 pb-3 mt-4">
    <h3>Workshops</h3>
    <hr class="my-4">   
    <!-- ADD Created Workshops -->

    <?php

    include '../includes/connect.inc.php';
    $sql = "SELECT * FROM workshop";
    $result = mysqli_query($con, $sql) or die('Error Retrieving Data');

    if (mysqli_num_rows($result)!=0) {

      echo '<div class="table-responsive-md">';
      echo '<table class="table">';
      echo '  <thead class="thead bg-primary">';
      echo '    <tr class="d-flex"> <!-- d-flex = allow flex to change column widths -->';
      echo '      <th scope="col" class="col-1">ID</th>';
      echo '      <th scope="col" class="col-4">Title</th>';
      echo '      <th scope="col" class="col-3">Organization</th>';
      echo '      <th scope="col" class="col-2">Date</th>';
      echo '      <th scope="col" class="col-1">Duration</th>';
      echo '      <th scope="col" class="col-1">More</th>';
      echo '    </tr>';
      echo '  </thead>';
      echo '  <tbody>';

      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      echo '    <tr class="d-flex">';
      echo '      <th class="col-1" scope="row">';
      echo $row['id'];
      echo '      </th><td class="col-4">';
      if($row['title'] != ""){
      echo $row['title'];
      }else{
        echo "-";
      }
      echo '      </td><td class="col-3">';
      if($row['org_name'] != ""){
      echo $row['org_name'];
      }else{
        echo "-";
      }
      echo '      </td><td class="col-2">';
      if($row['date'] != "0000-00-00"){
      echo $row['date'];
      }else{
        echo "-";
      }
      echo '      </td><td class="col-1">';
      if($row['duration'] != ""){
      echo $row['duration'];
      }else{
        echo "-";
      }
      echo '      </td><td class="col-1"><a href="admin-workshop-details.php?id='. $row['id'] .'">See More</a></td>';
      echo '      </tr>';
      }
      
      echo '</tbody> </table> </div>';
    
    }else {
      echo "<p>No Workshops Available</p>";
    }


    ?>


    <!-- <div class="table-responsive-md">
      <table class="table">
        <thead class="thead bg-primary">
          <tr class="d-flex">
            <th scope="col" class="col-1">ID</th> 
            <th scope="col" class="col-4">Title</th>
            <th scope="col" class="col-3">Organization</th>
            <th scope="col" class="col-2">Date</th>
            <th scope="col" class="col-1">Status</th>
            <th scope="col" class="col-1"></th>
          </tr>
        </thead>
        <tbody>
          <tr class="d-flex">
            <th class="col-1" scope="row">123</th>
            <td class="col-4">Mark cumberbatch</td>
            <td class="col-3">Ottoadadad</td>
            <td class="col-2">20-19-22</td>
            <td class="col-1">Ongoing</td>
            <td class="col-1"><a href="#">See More</a></td>
          </tr>
          <tr class="d-flex">
            <th class="col-1" scope="row">123</th>
            <td class="col-4">Mark cumberbatch</td>
            <td class="col-3">Ottoadadad</td>
            <td class="col-2">20-19-22</td>
            <td class="col-1">Ongoing</td>
            <td class="col-1"><a href="#">See More</a></td>
          </tr>
          <tr class="d-flex">
            <th class="col-1" scope="row">123</th>
            <td class="col-4">Mark cumberbatch</td>
            <td class="col-3">Ottoadadad</td>
            <td class="col-2">20-19-22</td>
            <td class="col-1">Ongoing</td>
            <td class="col-1"><a href="#">See More</a></td>
          </tr>
        </tbody>
      </table>
    </div>
     -->
    <hr class="my-4">   

    <a class="btn btn-primary btn-md" href="admin-workshop-new.php" role="button">Create New Workshop</a>
  </div>
</div>

</body>
</html>