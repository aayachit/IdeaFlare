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
	<link href="css/home.css" rel="stylesheet">
	<link href="css/button.css" rel="stylesheet">
	<link href="css/navbar.css" rel="stylesheet">

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
      <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#about">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#team">Team</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#connect">Connect</a>
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

<!--- Welcome Section -->
<div class="container-fluid padding" id="about">
<div class="row welcome text-center">
	<div class="col-12">
		<h2 class="display-4">What is IdeaFlare</h2>
	</div>
	<hr>
	<div class="col-12">
		<p class="lead">IdeaFlare is a platform for users to showcase their achievements along with attend workshops and work in groups on different projects</p>
	</div>
</div>
</div>

<!--- Three Column Section -->

<div class="container-fluid">
<div class="row text-center padding">
	<div class="col-xs-12 col-sm-6 col-md-4">
		<i class="fas fa-user"></i>
		<h3>Profiles</h3>
		<p>Create Profile and showcase your achievements</p>
	</div> 
	<div class="col-xs-12 col-sm-6 col-md-4">
		<i class="fas fa-graduation-cap"></i>
		<h3>Workshops</h3>
		<p>Attened Workshops conducted by professionals</p>
	</div> 
	<div class="col-sm-12 col-md-4">
		<i class="fas fa-file-word"></i>
		<h3>Projects</h3>
		<p>Work on your projects with your team</p>
	</div> 		
</div>
<hr class="my-4">
</div>

<!--- the team -->

<div class="container-fluid padding" id="team">
<div class="row welcome text-center">
	<div class="col-12">
		<h1 class="display-4">The Team</h1>
	</div>
</div>
</div>

<!--- Cards -->
<div class="container-fluid padding">
<div class="row padding">
	
	<div class="col-md-1"></div>
	<div class="col-md-2">
		<div class="card">
			<img class="card-img-top" src="img/team1.png">
			<div class="card-body">
				<h4 class="card-title">Team member1</h4>
				<p class="card-text">about member1</p>
				<a href="#" class="btn btn-primary button">See Profile</a>
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="card">
			<img class="card-img-top" src="img/team2.png">
			<div class="card-body">
				<h4 class="card-title">Team member2</h4>
				<p class="card-text">about member2</p>
				<a href="#" class="btn btn-primary button">See Profile</a>
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="card">
			<img class="card-img-top" src="img/team3.png">
			<div class="card-body">
				<h4 class="card-title">Team member3</h4>
				<p class="card-text">about member3</p>
				<a href="#" class="btn btn-primary button">See Profile</a>
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="card">
			<img class="card-img-top" src="img/team1.png">
			<div class="card-body">
				<h4 class="card-title">Team member4</h4>
				<p class="card-text">about member4</p>
				<a href="#" class="btn btn-primary button">See Profile</a>
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="card">
			<img class="card-img-top" src="img/team2.png">
			<div class="card-body">
				<h4 class="card-title">Team member5</h4>
				<p class="card-text">about member5</p>
				<a href="#" class="btn btn-primary button">See Profile</a>
			</div>
		</div>
	</div>
</div>
<hr class="my-4">
</div>

<!--- Connect -->
<div class="container-fluid padding" id="connect">
<div class="row text-center padding">
	<div class="col-12">
		<h2>Connect</h2>
	</div>
	<div class="col-12 social padding">
		<a href="#"><i class="fab fa-facebook"></i></a>
		<a href="#"><i class="fab fa-twitter"></i></a>
		<a href="#"><i class="fab fa-instagram instagram"></i></a>
		<a href="#"><i class="fab fa-linkedin-in"></i></a>	
	</div>
</div>
</div>

<!--- Footer -->

<footer>
<div class="container-fluid padding">

	<div class="row text-center">
		<div class="col-md-4">
			<img src="img/logo-invert.png" height="55px" width="50px">	
			<hr class="light">
			<p>Phone No</p>
			<p>abc@example.com</p>
			<p>Address</p>
		</div>		

		<div class="col-md-4">
			<hr class="light">
			<h5>Quick Links</h5>			
			<hr class="light">
			<p><a href="#">Home</a></p>
			<p><a href="displayPatents.php">Patents</a></p>
			<p><a href="register.php">Register</a></p>
		</div>

		<div class="col-md-4">
			<hr class="light">
			<h5>Contact</h5>			
			<hr class="light">
			<p><a href="#">About Us</a></p>
			<!-- <p><a href="#">Contact</a></p> -->
			<p><a href="feedback.php">Feedback</a></p>
		</div>

		<div class="col-12">
			<hr class="light-100">
			<h5>&copy; ideaflare.in</h5>
		</div>

	</div>
</div>
</footer>


</body>
</html>






