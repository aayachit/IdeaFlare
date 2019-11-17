 <?php 
  session_start();
  $session = $_SESSION['email'];
  if($session==true){

  }else{
    header("Location:admin.php");
  }

 ?>

 <?php include '../includes/admin-patents-edit.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Patents</title>
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
      <h3 class="text-center mt-5">Edit Patent</h3>
      <form method="post">    

        <?php
          include '../includes/connect.inc.php';

          $patent_id = $_GET['id'];

          $sql1 = "SELECT * FROM patents WHERE id = ". $patent_id;
          $result1 = mysqli_query($con, $sql1) or die('Error Retrieving Patent Data');

          $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);

          echo '<input type="hidden" class="form-control" name="id" value="'.$patent_id.'" required >';
          
          echo'<div class="row mt-5">';
          echo'  <div class="form-group col-md-3">';
          echo'    <label for="name">Patent Name:</label>';
          echo'  </div>';
          echo'  <div class="form-group col-md-9">';
          echo'     <input type="text" class="form-control" name="name" value="'.$row1['name'].'" required>';
          echo'  </div>';
          echo'</div>';

          echo'<div class="row mt-4">';
          echo'  <div class="form-group col-md-3">';
          echo'    <label for="authority">Authority:</label>';
          echo'  </div>';
          echo'  <div class="form-group col-md-9">';
          echo'    <input type="text" class="form-control" name="authority" value="'.$row1['authority'].'" required>';
          echo'  </div>';
          echo'</div>';

          echo'<div class="row mt-4">';
          echo'  <div class="form-group col-md-3">';
          echo'    <label for="app_no">Application No:</label>';
          echo'  </div>';
          echo'  <div class="form-group col-md-9">';
          echo'    <input type="text" class="form-control" name="app_no" value="'.$row1['app_no'].'" required>';
          echo'  </div>';
          echo'</div>';

          echo'<div class="row mt-4  ">';
          echo'  <div class="form-group col-md-3">';
          echo'    <label for="description">Description:</label>';
          echo'  </div>';
          echo'  <div class="form-group col-md-9">';
          echo'    <textarea name="description" class="form-control" rows="10">'.$row1['description'].'</textarea>';
          echo'  </div>';
          echo'</div>';

 
          echo'<div class="text-right"> ';
          echo'  <button type="submit" name="update" class="btn btn-primary btn-md mb-3">Update</button>';
          echo'</div>';
        ?>
      </form>
    </div>
    <div class="col-sm-3"></div>
  </div>    
</div>

<script type="text/javascript" src="../js/admin/add_instructor.js"></script>
</body>
</html>