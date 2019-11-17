 <?php 
  session_start();
  $session = $_SESSION['email'];
  if($session==true){

  }else{
    header("Location:admin.php");
  }

 ?>

<?php include '../includes/admin-workshop-new.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>New Workshop</title>
  <link rel="icon" href="../img/logo-invert.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="../css/userhome.css" rel="stylesheet">
	<link href="../css/button.css" rel="stylesheet">
	<link href="../css/navbar.css" rel="stylesheet">
  <link href="../css/createProfile.css" rel="stylesheet">

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


<!-- Content -->

<div class="container-fluid add-info">
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
      <h3 class="text-center mt-5">Create Workshop</h3>
      <form method="post" enctype="multipart/form-data">
        
        <h5 class="mt-5">Instructor Information:</h5>
          <div id="field_instructor">
            <div class="row mt-4">
              <div class="form-group col-md-3">
                <label for="instructor_name">Name:</label>
              </div>
              <div class="form-group col-md-9">
                <input type="text" class="form-control" name="instructor_name[]" id="instructor_name">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-3">
                <label for="instructor_contact">Contact No:</label>
              </div>
              <div class="form-group col-md-9">
                <input type="number" class="form-control" name="instructor_contact[]" id="instructor_contact">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-3">
                <label for="instructor_email">Email ID:</label>
              </div>
              <div class="form-group col-md-9">
                <input type="email" class="form-control" name="instructor_email[]" id="instructor_email">
              </div>
            </div>            
              
            <a href="#" class="black" id="add_instructor">+Add More</a>
          </div>

          <div class="row mt-4">
            <div class="form-group col-md-3">
              <label for="org_name">Organization Name:</label>
            </div>
            <div class="form-group col-md-9">
              <input type="text" class="form-control" name="org_name">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-3">
              <label for="org_background">Background:</label>
            </div>
            <div class="form-group col-md-9">
              <textarea name="org_background" class="form-control" rows="3" placeholder="max 200 characters"></textarea>
            </div>
          </div>
        
        <h5 class="mt-5">Workshop Information:</h5> 
          <div class="row mt-4">
            <div class="form-group col-md-3">
              <label for="workshop_id">ID:</label>
            </div>
            <div class="form-group col-md-9">
              <input type="number" class="form-control" name="workshop_id" placeholder="Unique ID for workshop" required>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-3">
              <label for="workshop_title">Title:</label>
            </div>
            <div class="form-group col-md-9">
              <input type="text" class="form-control" name="workshop_title" required>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-3">
              <label for="workshop_duration">Duration:</label>
            </div>
            <div class="form-group col-md-9">
              <input type="number" class="form-control" name="workshop_duration" placeholder="in minutes">
            </div>
          </div> 

          <div class="row">
            <div class="form-group col-md-3">
              <label for="workshop_date">Date:</label>
            </div>
            <div class="form-group col-md-9">
              <input type="date" class="form-control" name="workshop_date">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-3">
              <label for="workshop_time">Time:</label>
            </div>
            <div class="form-group col-md-9">
              <input type="time" class="form-control" name="workshop_time">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-3">
              <label for="workshop_cost">Cost:</label>
            </div>
            <div class="form-group col-md-9">
              <input type="number" class="form-control" name="workshop_cost" placeholder="Rs">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-3">
              <label for="workshop_description">Description:</label>
            </div>
            <div class="form-group col-md-9">
              <textarea name="workshop_description" class="form-control" rows="3"></textarea>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-3">
              <label for="workshop_supplies">Supplies:</label>
            </div>
            <div class="form-group col-md-9">
              <textarea name="workshop_supplies" class="form-control" rows="3"></textarea>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-3">
              <label for="workshop_expected_supplies">Expected Supplies:</label>
            </div>
            <div class="form-group col-md-9">
              <textarea name="workshop_expected_supplies" class="form-control" rows="3"></textarea>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-3">
              <label for="workshop_image">Image:</label>
            </div>
            <div class="form-group col-md-9">
              <input type="file" name="workshop_image" accept="image/*" class="form-control form-input Profile-input-file" >
            </div>  
          </div>

          <div class="row">
            <div class="form-group col-md-3">
              <label for="workshop-pdf">Upload PDF:</label>  
            </div>
            <div class="form-group col-md-9">
              <input type="file" name="workshop_pdf" accept=".pdf" class="form-control form-input Profile-input-file">
            </div> 
          </div>      


        <div class="text-right"> 
          <button type="submit" name="create" class="btn btn-primary btn-md mb-3">Create</button>
        </div>
      </form>
    </div>
    <div class="col-sm-3"></div>
  </div>    
</div>

<script type="text/javascript" src="../js/admin/add_instructor.js"></script>
</body>
</html>