<?php include '../includes/login.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>IdeaFlare-Admin</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="../css/home.css" rel="stylesheet">
	<link href="../css/button.css" rel="stylesheet">
	<link href="../css/navbar.css" rel="stylesheet">

</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
<div class="container-fluid">
  <a class="navbar-brand" href="home.php">IdeaFlare.in</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
<!--       <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
      </li> -->
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
					<input type="text" name="email" class="form-control" placeholder="Email" required>
				</div>
				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Password" required>
				</div>
			</div>

			<div class="modal-footer">
				<div class="text-right">	
					<button type="submit" name="login" class="btn btn-primary btn-md">Login</button>
				</div>
			</div>
			</form>		
		</div>
	</div>
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
		<div class="card card-size">
			<img class="card-img-top" src="../img/team1.png">
			<div class="card-body">
				<h4 class="card-title">Team member1</h4>
				<p class="card-text">about member1</p>
				<a href="#" class="btn btn-primary button">See Profile</a>
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="card card-size">
			<img class="card-img-top" src="../img/team2.png">
			<div class="card-body">
				<h4 class="card-title">Team member2</h4>
				<p class="card-text">about member2</p>
				<a href="#" class="btn btn-primary button">See Profile</a>
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="card card-size">
			<img class="card-img-top" src="../img/team3.png">
			<div class="card-body">
				<h4 class="card-title">Team member3</h4>
				<p class="card-text">about member3</p>
				<a href="#" class="btn btn-primary button">See Profile</a>
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="card card-size">
			<img class="card-img-top" src="../img/team1.png">
			<div class="card-body">
				<h4 class="card-title">Team member4</h4>
				<p class="card-text">about member4</p>
				<a href="#" class="btn btn-primary button">See Profile</a>
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="card card-size">
			<img class="card-img-top" src="../img/team2.png">
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



</body>
</html>