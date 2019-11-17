 <?php 
  session_start();
  $session = $_SESSION['email'];
  if($session==true){

  }else{
    header("Location:admin.php");
  }

 ?>

<?php include '../includes/admin-workshop-edit.inc.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Workshop</title>
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

<div class="container-fluid add-info">
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
      <h3 class="text-center mt-5">Edit Workshop</h3>
      <form method="post" enctype="multipart/form-data">
        <h5 class="mt-5">Instructor Information:</h5>
       
        <?php
          include '../includes/connect.inc.php';

          $workshop_id = $_GET['id'];

          //Get Workshop Data
          $sql1 = "SELECT * FROM workshop WHERE id = ". $workshop_id;   
          $result1 = mysqli_query($con, $sql1) or die('Error Retrieving Worksop Data');
          $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);

          //Get Instructor Data
          $sql2 = "SELECT * FROM workshop_instructor WHERE id = ". $workshop_id;
          $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Instructor Data');
          
          //Get Instructor Count         
          $instructor_count = 0;
          while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) { $instructor_count++; }  //to get the instructor count
          
          $result2 = mysqli_query($con, $sql2) or die('Error Retrieving Instructor Data');  // for displaying the result


          echo '<input type="hidden" class="form-control" name="id" value="'.$workshop_id.'" required >';
          echo '<input type="hidden" class="form-control" name="instructor_count" value="'.$instructor_count.'" required >';
          
          if (mysqli_num_rows($result2)!=0){
            $flag = 0;
            while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {

            
              echo'<div id="field_instructor">';
              echo'  <div class="row mt-4">';
              echo'    <div class="form-group col-md-3">';
              echo'      <label for="instructor_name">Name:</label>';
              echo'    </div>';
              echo'    <div class="form-group col-md-9">';
              echo'      <input type="text" class="form-control" name="instructor_name[]" value="'.$row2['name'].'">';
              echo'    </div>';
              echo'  </div>';

              echo'  <div class="row">';
              echo'    <div class="form-group col-md-3">';
              echo'      <label for="instructor_contact">Contact No:</label>';
              echo'    </div>';
              echo'    <div class="form-group col-md-9">';
              echo'      <input type="number" class="form-control" name="instructor_contact[]" value="'.$row2['contact'].'">';
              echo'    </div>';
              echo'  </div>';

              echo'  <div class="row">';
              echo'    <div class="form-group col-md-3">';
              echo'      <label for="instructor_email">Email ID:</label>';
              echo'    </div>';
              echo'    <div class="form-group col-md-9">';
              echo'      <input type="email" class="form-control" name="instructor_email[]" value="'.$row2['email'].'">';
              echo'    </div>';
              echo'  </div>';
              echo'  <a href="../includes/admin-workshop-deleteInstructor.inc.php?id='.$row2['id'].'&instructor_id='.$row2['instructor_id'].'">Delete</a>';
              echo'  <br>';
              if($flag == 0){
                echo'  <a href="#" id="add_instructor">+Add More</a>';
                $flag++;
              }
              echo'</div>';
            }
          }else{
              echo'<div id="field_instructor">';
              echo'  <div class="row mt-4">';
              echo'    <div class="form-group col-md-3">';
              echo'      <label for="instructor_name">Name:</label>';
              echo'    </div>';
              echo'    <div class="form-group col-md-9">';
              echo'      <input type="text" class="form-control" name="instructor_name[]">';
              echo'    </div>';
              echo'  </div>';

              echo'  <div class="row">';
              echo'    <div class="form-group col-md-3">';
              echo'      <label for="instructor_contact">Contact No:</label>';
              echo'    </div>';
              echo'    <div class="form-group col-md-9">';
              echo'      <input type="number" class="form-control" name="instructor_contact[]">';
              echo'    </div>';
              echo'  </div>';

              echo'  <div class="row">';
              echo'    <div class="form-group col-md-3">';
              echo'      <label for="instructor_email">Email ID:</label>';
              echo'    </div>';
              echo'    <div class="form-group col-md-9">';
              echo'      <input type="email" class="form-control" name="instructor_email[]">';
              echo'    </div>';
              echo'  </div>';
              echo'  <a href="#" id="add_instructor">+Add More</a>';
              echo'</div>';

          }
          echo'<div class="row mt-4">';
          echo'  <div class="form-group col-md-3">';
          echo'    <label for="org_name">Organization Name:</label>';
          echo'  </div>';
          echo'  <div class="form-group col-md-9">';
          echo'    <input type="text" class="form-control" name="org_name" value="'.$row1['org_name'].'">';
          echo'  </div>';
          echo'</div>';

          echo'<div class="row">';
          echo'  <div class="form-group col-md-3">';
          echo'    <label for="org_background">Background:</label>';
          echo'  </div>';
          echo'  <div class="form-group col-md-9">';
          echo'    <textarea name="org_background" class="form-control" rows="3" placeholder="max 200 characters">'.$row1['org_name'].'</textarea>';
          echo'  </div>';
          echo'</div>';
      
          echo'<h5 class="mt-5">Workshop Information:</h5> ';
          echo'  <div class="row mt-4">';
          echo'    <div class="form-group col-md-3">';
          echo'       <label for="workshop_id">ID:</label>';
          echo'    </div>';
          echo'    <div class="form-group col-md-9">';
          echo'      <input type="number" class="form-control" name="workshop_id" value="'.$row1['id'].'" placeholder="Unique ID for workshop" required disabled>';
          echo'    </div>';
          echo'  </div>';

          echo'  <div class="row">';
          echo'    <div class="form-group col-md-3">';
          echo'      <label for="workshop_title">Title:</label>';
          echo'    </div>';
          echo'    <div class="form-group col-md-9">';
          echo'      <input type="text" class="form-control" name="workshop_title" value="'.$row1['title'].'"required>';
          echo'    </div>';
          echo'  </div>';

          echo'  <div class="row">';
          echo'    <div class="form-group col-md-3">';
          echo'      <label for="workshop_duration">Duration:</label>';
          echo'    </div>';
          echo'    <div class="form-group col-md-9">';
          echo'      <input type="number" class="form-control" name="workshop_duration" value="'.$row1['duration'].'" placeholder="in minutes">';
          echo'    </div>';
          echo'  </div> ';

          echo'  <div class="row">';
          echo'    <div class="form-group col-md-3">';
          echo'      <label for="workshop_date">Date:</label>';
          echo'    </div>';
          echo'    <div class="form-group col-md-9">';
          echo'      <input type="date" class="form-control" name="workshop_date" value="'.$row1['date'].'">';
          echo'    </div>';
          echo'  </div>';

          echo'  <div class="row">';
          echo'    <div class="form-group col-md-3">';
          echo'      <label for="workshop_time">Time:</label>';
          echo'    </div>';
          echo'    <div class="form-group col-md-9">';
          echo'      <input type="time" class="form-control" name="workshop_time" value="'.$row1['time'].'">';
          echo'    </div>';
          echo'  </div>';

          echo'  <div class="row">';
          echo'    <div class="form-group col-md-3">';
          echo'      <label for="workshop_cost">Cost:</label>';
          echo'    </div>';
          echo'    <div class="form-group col-md-9">';
          echo'      <input type="number" class="form-control" name="workshop_cost" placeholder="Rs" value="'.$row1['cost'].'">';
          echo'    </div>';
          echo'  </div>';

          echo'  <div class="row">';
          echo'    <div class="form-group col-md-3">';
          echo'      <label for="workshop_description">Description:</label>';
          echo'    </div>';
          echo'    <div class="form-group col-md-9">';
          echo'      <textarea name="workshop_description" class="form-control" rows="3">'. $row1['description'].'</textarea>';
          echo'    </div>';
          echo'  </div>';

          echo'  <div class="row">';
          echo'    <div class="form-group col-md-3">';
          echo'      <label for="workshop_supplies">Supplies:</label>';
          echo'    </div>';
          echo'    <div class="form-group col-md-9">';
          echo'      <textarea name="workshop_supplies" class="form-control" rows="3">'. $row1['supplies'] .'</textarea>';
          echo'    </div>';
          echo'  </div>';

          echo'  <div class="row">';
          echo'    <div class="form-group col-md-3">';
          echo'      <label for="workshop_expected_supplies">Expected Supplies:</label>';
          echo'    </div>';
          echo'    <div class="form-group col-md-9">';
          echo'      <textarea name="workshop_expected_supplies" class="form-control" rows="3">'. $row1['supplies'] .'</textarea>';
          echo'    </div>';
          echo'  </div>';

          echo'  <div class="row">';
          echo'    <div class="form-group col-md-3">';
          echo'     <label for="workshop_image">Image:</label>';
          echo'    </div>';
          echo'    <div class="form-group col-md-9">';
          echo'      <input type="file" name="workshop_image" accept="image/*" class="form-control form-input Profile-input-file">';
          echo'    </div>  ';
          echo'  </div>';

          echo'  <div class="row">';
          echo'    <div class="form-group col-md-3">';
          echo'      <label for="workshop-pdf">Upload PDF:</label>  ';
          echo'    </div>';
          echo'    <div class="form-group col-md-9">';
          echo'      <input type="file" name="workshop_pdf" accept=".pdf" class="form-control form-input Profile-input-file">';
          echo'    </div> ';
          echo'  </div>      ';

        ?>
         
        <div class="text-right"> 
          <button type="submit" name="update" class="btn btn-primary btn-md mb-3">Update</button>
        </div>
      </form>
    </div>
    <div class="col-sm-3"></div>
  </div>    
</div>

<script type="text/javascript" src="../js/admin/add_instructor.js"></script>


</body>
</html>