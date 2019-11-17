<?php include 'includes/register.inc.php'; ?>
<?php include 'includes/login.inc.php'; ?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>IdeaFlare - Register</title>
  <link rel="icon" href="img/logo-invert.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="css/home.css" rel="stylesheet">
  <link href="css/navbar.css" rel="stylesheet">
  <link href="css/button.css" rel="stylesheet">
  <link href="css/register.css" rel="stylesheet">

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
        <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
      </li>
    </ul>
  </div>
</div>
</nav>

<!-- Login Modal -->
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
          <input type="text" name="email" class="form-control" placeholder="Email" required>
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
          <button type="submit" name="login" class="btn btn-primary btn-md">Login</button>
        </div>
      </div>
      </form>   
    </div>
  </div>
</div>



<!-- Registration Form -->

<div class="container-fluid register">
  <div class="row">
      <div class="col-md-5 register-left">
          <!-- <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/> -->
          <h1 style="margin-bottom: 50px;">IdeaFlare.in</h1>
          <h3>Welcomes You</h3>
          <p></p>
      </div>
      <div class="col-md-7 register-right">
          <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <form method="post">
                    <div class="row register-form">
                      <div class="col-md-6"></div>
                        <div class="col-md-6">
                           <h3 style="margin-bottom: 30px;">Create an Account</h3>

                            <div class="form-group">
                                <input type="text" class="form-control" name="firstname" placeholder="First Name *" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="lastname" placeholder="Last Name *" required >
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email *" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password_1" placeholder="Password *" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password_2" placeholder="Confirm Password *" required>
                            </div>
                            <label class="radio-inline">
                              <input type="radio" name="type" value="user" id="Radios1" required>User</label>
                            <label class="radio-inline">
                            <input type="radio" name="type" value="investor" id="Radios2">Investor</label> 

                            <input type="submit" class="btn btn-primary button btnRegister center" name="register" value="Register"/>
                        </div>
                      <!-- <div class="col-md-3"></div> -->
                    </div>
                  </form>
              </div>
          </div>
      </div>

  </div>
</div>
</body>
</html>