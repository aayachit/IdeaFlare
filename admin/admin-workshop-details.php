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
  <link href="../css/workshopDetails.css" rel="stylesheet">  

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


<div class="container">
  <?php

    include '../includes/connect.inc.php';

    $workshop_id=$_GET['id'];
    
    //Get Workshop Data
    $sql1 = "SELECT * FROM workshop WHERE id =".$workshop_id;
    $result1 = mysqli_query($con, $sql1) or die('Error Retrieving Workshop Data');
    $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
    
    //Get Instructor Data
    $sql2 = "SELECT * FROM workshop_instructor WHERE id=".$workshop_id;
    $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Instructor Data');

    //arrange instructor_id in ascending order to avoid errors
    
    $i = 1;
    while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
      $sql3 = "UPDATE workshop_instructor SET instructor_id = $i WHERE email = '". $row2['email'] ."'";
      $result3 = mysqli_query($con, $sql3) or die('Error Retrieving Instructor Data');
      if($result3 == false){
        echo "Something Went Wrong in Instructor Database";  
      }
      $i++;
    }          

  $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Instructor Data');

    if (mysqli_num_rows($result1)!=0 || mysqli_num_rows($result2)!=0) {

      echo'<div class="heading">';
      if($row1['image'] != ""){
        echo'  <img src="../'.$row1['image'].'" alt="header-image">';
       }else{
        echo'  <img src="../img/workshop-background.jpg" alt="header-image">';  
      }
      echo'  <div class="header-content">';
      echo'    <h1 class="text-center">';
      if($row1['title']!=""){
      echo $row1['title'];
      }else{
        echo "-";
      }
      echo'    </h1>';
      echo'    <h3 class="text-right">By:';
      if($row1['org_name']!=""){
      echo ' '. $row1['org_name'];
      }else{
        echo "-";
      }
      echo'     </h3>';
      echo'  </div>';
      echo'</div>';
      echo'<div class="border">';
      echo'<div class="ml-5 pl-5 mr-5 pr-5 mt-2">';
      echo'  <h3 class="pt-5">Workshop Details:</h3>';
        
      echo'  <div class="mt-3">';
      echo'    <p class="font-weight-bold">Description:</p>';
      echo'    <p>';
      if($row1['description']!=""){
      echo $row1['description'];
      }else{
        echo "-";
      }
      echo'    </p>';
      echo' </div>';
        
      echo' <div class="row mt-3">';
      echo'  <div class="col-md-3">';
      echo'    <p class="d-inline font-weight-bold">Date:</p>';
      echo'    <p class="d-inline">';
      if($row1['date']!="0000-00-00"){
      echo $row1['date'];
      }else{
        echo "-";
      }
      echo'    </p>';
      echo'  </div>';
      echo'  <div class="col-md-3">';
      echo'    <p class="d-inline font-weight-bold mt-3">Time:</p>';
      echo'    <p class="d-inline">';
      if($row1['time']!="00:00:00"){
      echo $row1['time'];
      }else{
        echo "-";
      }
      echo'    </p>';
      echo'  </div>';
      echo'  <div class="col-md-3">';
      echo'    <p class="d-inline font-weight-bold mt-3">Duration:</p>';
      echo'    <p class="d-inline">';
      if($row1['duration']!=""){
      echo $row1['duration'] . ' ';
      echo'     Minutes</p>';
      }else{
        echo "-";
      }
      echo'  </div>    ';
      echo'</div>';

      echo'  <div class="mt-3">';
      echo'    <p class="d-inline font-weight-bold mt-3">Cost:</p>';
      echo'    <p class="d-inline">';
      if($row1['cost']!=""){
      echo 'Rs. ' . $row1['cost'];
      }else{
        echo "-";
      }
      echo'    </p>';
      echo'  </div>';

      echo'  <div class="mt-3">';
      echo'    <p class="font-weight-bold d-inline">Supplies:</p>';
      echo'    <p class="d-inline">';
      if($row1['supplies']!=""){
      echo $row1['supplies'];
      }else{
        echo "-";
      }
      echo'     </p>';
      echo'  </div>';

      echo'  <div class="mt-3">';
      echo'    <p class="font-weight-bold d-inline">Needed From You:</p>';
      echo'    <p class="d-inline">';
      if($row1['expected_supplies']!=""){
      echo $row1['expected_supplies'];
      }else{
        echo "-";
      }
      echo'    </p>';
      echo'   </div>';

      //<!-- Download PDF -->
      echo'  <div class="mt-3">';
      echo'    <p class="font-weight-bold d-inline">PDF:</p>';
      if($row1['pdf']!=""){
      echo'   <a href="../'.$row1['pdf'].'" target="_blank">Download</a>';
      echo' <p></p>';
      echo'   <a href="../includes/admin-workshop-deletePDF.inc.php?id='.$workshop_id.'&file='.$row1['pdf'].'">Delete PDF</a>';
      }else{
        echo "-";
      }
      echo'   </div>';

      echo'  <h3 class="mt-5">Instructor Details:</h3>';
      
      while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {      
        echo'  <div class="mt-3">';
        echo'    <p>';
        if($row2['name']!=""){
        echo $row2['name'];
        }else{
        echo "-";
        }
        echo'    </p>';
        echo'    <p class="d-inline font-weight-bold">Contact:</p>';
        echo'    <p class="d-inline">';
        if($row2['contact']!=""){
        echo $row2['contact'];
        }else{
        echo "-";
        }
        echo'    </p>';
        echo'    <p class="d-inline font-weight-bold ml-5">Email:</p>';
        echo'    <p class="d-inline">';
        if($row2['email']!=""){
        echo $row2['email'];
        }else{
        echo "-";
        }
        echo'    </p>';
        echo'  </div>';
      }

      echo'<p class="font-weight-bold mt-4">Background:</p>';
      echo'<p>';
      if($row1['org_background']!=""){
      echo $row1['org_background'];
      }else{
        echo "-";
      }
      echo'</p>';

      echo'</div>';
      echo'</div>';

      echo'<div class="row mt-3 mb-5">';
      echo'  <div class="col-6">';
      echo'    <a class="btn btn-primary btn-md" href="admin-workshop-edit.php?id='. $workshop_id .'" role="button">Edit</a>';
      echo'  </div>';
      echo'  <div class="col-6 text-right">';
      echo'    <a class="btn btn-danger btn-md" href="../includes/admin-workshop-delete.inc.php?id='. $workshop_id .'" role="button">Delete</a>';
      echo'  </div>';
      echo'</div>';

    }else {
      echo "<p>Workshop Details Not Available</p>";
    }
  ?>
</div>




</body>
</html>


<!-- 
<div class="container">
  <div class="heading">
    <img src="../img/bg-6.jpg" alt="header-image">
    <div class="header-content">
      <h1 class="text-center">Heading</h1>
      <h3 class="text-right">By: Org Name</h3>
    </div>
  </div>
  <div class="border">
  <div class="ml-5 pl-5 mr-5 pr-5 mt-2">
    <h3 class="pt-5">Workshop Details:</h3>
    
    <div class="mt-3">
      <p class="font-weight-bold">Description:</p>
      <p>Spacing utilities that apply to all breakpoints, from xs to xl, have no breakpoint abbreviation in them. This is because those classes are applied from min-width: 0 and up, and thus are not bound by a media query. The remaining breakpoints, however, do include a breakpoint abbreviation.</p>
    </div>
    
    <div class="row mt-3">
      <div class="col-md-3">
      <p class="d-inline font-weight-bold">Date:</p>
      <p class="d-inline">20/11/2019</p>
      </div>
      <div class="col-md-3">
      <p class="d-inline font-weight-bold mt-3">Time:</p>
      <p class="d-inline">10 AM</p>
      </div>
      <div class="col-md-3">
      <p class="d-inline font-weight-bold mt-3">Duration:</p>
      <p class="d-inline">5 Hours</p>
      </div>    
    </div>
    
    <div class="mt-3">
      <p class="d-inline font-weight-bold mt-3">Cost:</p>
      <p class="d-inline">Rs. 200</p>
    </div>

    <div class="mt-3">
      <p class="font-weight-bold d-inline">Supplies:</p>
      <p class="d-inline">Brains</p>
    </div>

    <div class="mt-3">
      <p class="font-weight-bold d-inline">Needed From You:</p>
      <p class="d-inline">Extra Brains</p>
    </div>

    Download PDF 

    <h3 class="mt-5">Instructor Details:</h3>

    <p class="mt-3">Abhishek Ayachit</p>
    <div class="row">
      <div class="col-md-3">
        <p class="d-inline font-weight-bold">Contact:</p>
        <p class="d-inline">99768123912</p>
      </div>
      <div class="col-md-6">
        <p class="d-inline font-weight-bold ml-5">Email:</p>
        <p class="d-inline">abhi.asdhbj@ghkj.hscj</p>
      </div>
    </div>

    <p class="mt-3">Abhishek Ayachit</p>
    <div class="row">
      <div class="col-md-3">
        <p class="d-inline font-weight-bold">Contact:</p>
        <p class="d-inline">99768123912</p>
      </div>
      <div class="col-md-6">
        <p class="d-inline font-weight-bold ml-5">Email:</p>
        <p class="d-inline">abhi.asdhbj@ghkj.hscj</p>
      </div>
    </div>
    
    <p class="font-weight-bold mt-4">Background:</p>
    <p>I am a cool buoy!</p>
  

    <a class="btn btn-primary btn-md mt-3 mb-3 mr-3" href="#" role="button">Edit</a>
    <a class="btn btn-danger btn-md mt-3 mb-3" href="#" role="button">Delete</a>


  </div>
  </div>
</div> -->