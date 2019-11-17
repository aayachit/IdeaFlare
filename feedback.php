<?php include 'includes/feedback.inc.php'; ?>
<?php include 'includes/login.inc.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>IdeaFlare</title>
  <link rel="icon" href="img/logo-invert.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="css/userhome.css" rel="stylesheet">
	<link href="css/button.css" rel="stylesheet">
	<link href="css/navbar.css" rel="stylesheet">
  <link href="css/feedback.css" rel="stylesheet">

</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
<div class="container-fluid">
  <a class="navbar-brand" href="home.php"><img src="img/logo.png" height="30px" width="25px"> IdeaFlare.in</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="home.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="home.php">Team</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="home.php">Connect</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="displayPatents.php">Patents</a>
      </li>      
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Get In!</a>
     </li>
     
    </ul>
  </div>
</div>
</nav>



<!--- Login Modal -->

<div class="modal fade" role="dialog" id="loginModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post">
      <div class="modal-header">
        <h3 class="modal-title">Login</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <div class="form-group">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
      </div>

      <div class="modal-footer">
        <div class="col-md-6">
          <a href="register.php">New User?</a>
        </div>
        <div class="col-md-6 text-right"> 
          <button type="submit" name="login" class="btn btn-primary button btn-md">Login</button>
        </div>
      </div>
      </form>   
    </div>
  </div>
</div>


<!-- Content -->

<div class="jumbotron jumbotron-sm mt-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="text-center">Feedback</h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email" required="required" /></div>
                        <div class="form-group">
                            <label for="name">Contact</label>
                            <input type="text" class="form-control" name="contact" placeholder="Enter Mobile No" required="required" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" name="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" name="submit">Submit Feedback</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
          <legend>Contact Us</legend>
          
          <strong>Email:</strong>
          <p>
            <a href="mailto:#">abc@example.com</a><br>
            <a href="mailto:#">abc@example.com</a>
          </p>
          <strong>Mobile No:</strong><br>
          <p>+91 1234567890<br>
          +91 1234567890<br>
          </p>
        </div>
    </div>
</div>


</body>
</html>
