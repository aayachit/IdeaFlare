 <?php 
  session_start();
  $session = $_SESSION['email'];
  if($session==true){

  }else{
    header("Location:admin.php");
  }

 ?>

 <?php include '../includes/admin-patents-new.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>New Patent</title>
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
      <h3 class="text-center mt-5">New Patent</h3>
      <form method="post">    
          <div class="row mt-5">
            <div class="form-group col-md-3">
              <label for="name">Patent Name:</label>
            </div>
            <div class="form-group col-md-9">
              <input type="text" class="form-control" name="name" required="">
            </div>
          </div>

          <div class="row mt-4">
            <div class="form-group col-md-3">
              <label for="authority">Authority:</label>
            </div>
            <div class="form-group col-md-9">
              <input type="text" class="form-control" name="authority" required>
            </div>
          </div>

          <div class="row mt-4">
            <div class="form-group col-md-3">
              <label for="app_no">Application No:</label>
            </div>
            <div class="form-group col-md-9">
              <input type="text" class="form-control" name="app_no" required>
            </div>
          </div>

          <div class="row mt-4  ">
            <div class="form-group col-md-3">
              <label for="description">Description:</label>
            </div>
            <div class="form-group col-md-9">
              <textarea name="description" class="form-control" rows="10"></textarea>
            </div>
          </div>

 
        <div class="text-right"> 
          <button type="submit" name="add" class="btn btn-primary btn-md mb-3">ADD</button>
        </div>
      </form>
    </div>
    <div class="col-sm-3"></div>
  </div>    
</div>

<script type="text/javascript" src="../js/admin/add_instructor.js"></script>
</body>
</html>