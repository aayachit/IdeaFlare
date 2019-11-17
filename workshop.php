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
  <title>Workshops</title>
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
  <link href="css/workshopDetails.css" rel="stylesheet">

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


<!-- Main Content -->

<div class="container">
  <!-- <h1 class="text-center mt-5 mb-5">Workshops</h1> -->
  <div class="header-content mb-5">
    <h1 class="text-center">Workshops</h1>
  </div>
  <p class="text-justify">
    We are a group of active researchers and have filed 5 patents in a period of 2 years and have participated and won in multiple national level competitions regarding aeronautics, rockets, and robotics. Additionally, we are also in process of publishing research papers on various topics such as mechanical engineering, hydrogen production, AI, and much more!
  </p>
  <p class="text-justify">
    There is an acute dearth of creativity and basic know-how about basic scientific principles. To address this, we are conducting workshops to introduce various topics such as robotics, space exploration, aeromodelling, and so on! 
  </p>

<hr class="my-4">
  
  <p>
    <b>Contact:</b>
    <br>
    Omkar Ashtikar - omkar@ideaflare.in | (+91) 8275013067
    <br>
    Jalaj Shukla - jalajshukla@ideaflare.in | (+91) 

  </p>


</div>


<hr class="my-4">
<div class="container-fluid mt-5">
  <div class="jumbotron pt-3 pb-3 mt-4">
    <h3>Workshops</h3>
    <hr class="my-4">   
    <!-- ADD Created Workshops -->

    <?php

    include 'includes/connect.inc.php';
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
      echo $row['duration'].' Min';
      }else{
        echo "-";
      }
      echo '      </td><td class="col-1"><a href="workshop-details.php?id='. $row['id'] .'">See More</a></td>';
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
    <!-- <hr class="my-4">    -->

    <!-- <a class="btn btn-primary btn-md" href="admin-createWorkshop.php" role="button">Create New Workshop</a> -->
  </div>
</div>



</body>
</html>
