 <?php 
 	session_start();
 	$session = $_SESSION['email'];
 	if($session==true){

 	}else{
 		header("Location:home.php");
 	}

 ?>

<?php include 'includes/profile-new-publications.inc.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
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
	<link href="css/createProfile.css" rel="stylesheet">

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


<!-- content -->

<div class="container-fluid add-info">
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<h3 class="text-center mt-5">Publications</h3>
			<form method="post">
				
				<h5 class="mt-5">Journals:</h5>
				<div id="field_journal">
					<div class="form-group">
						<div class="row">
							<div class="form-group col-md-6">
								<label for="journal_name">Journal Name:</label> 
							</div>
							<div class="form-group col-md-6">
								<input class="form-control" type="text" name="journal_name[]">
				            </div>
				        </div>
				        <div class="row">
				            <div class="form-group col-md-6">
				            	<label for="journal_link">Journal Link:</label>
				            </div>				
							<div class="form-group col-md-6">
								<input class="form-control" type="text" name="journal_link[]">
				            </div>
						</div>
				        <div class="row">
				            <div class="form-group col-md-6">
				            	<label for="journal_authority">Journal Authority:</label>
				            </div>				
							<div class="form-group col-md-6">
								<input class="form-control" type="text" name="journal_authority[]">
				            </div>
						</div>

				        <div class="row">
							<div class="form-group col-md-6">
								<label for="journal_date">Journal Date:</label> 
							</div>
							<div class="form-group col-md-6">
								<input class="form-control" type="date" name="journal_date[]">
				            </div>
				        </div>

				        <div class="row">
							<div class="form-group col-md-6">
								<label for="journal_details">Journal Details:</label> 
							</div>
							<div class="form-group col-md-6">
								<textarea name="journal_details[]" class="form-control" rows="3" placeholder="max 200 characters"></textarea>
				            </div>
				        </div>

					</div>
					<a href="#" id="add_journal">+Add More</a>
				</div>

				<h5 class="mt-5">Patents:</h5>
				<div id="field_patent">
					<div class="form-group">
						<div class="row">
							<div class="form-group col-md-6">
								<label for="patent_name">Patent Name:</label> 
							</div>
							<div class="form-group col-md-6">
								<input class="form-control" type="text" name="patent_name[]">
				            </div>
				        </div>
				        <div class="row">
				            <div class="form-group col-md-6">
				            	<label for="patent_link">Patent Link:</label>
				            </div>				
							<div class="form-group col-md-6">
								<input class="form-control" type="text" name="patent_link[]">
				            </div>
						</div>
				        <div class="row">
				            <div class="form-group col-md-6">
				            	<label for="patent_authority">Patent Authority:</label>
				            </div>				
							<div class="form-group col-md-6">
								<input class="form-control" type="text" name="patent_authority[]">
				            </div>
						</div>

						<div class="row">
							<div class="form-group col-md-6">
								<label for="patent_number">Patent Number:</label> 
							</div>
							<div class="form-group col-md-6">
								<input class="form-control" type="text" name="patent_number[]">
				            </div>
				        </div>

				        <div class="row">
							<div class="form-group col-md-6">
								<label for="patent_date">Patent Date:</label> 
							</div>
							<div class="form-group col-md-6">
								<input class="form-control" type="date" name="patent_date[]">
				            </div>
				        </div>

				        <div class="row">
							<div class="form-group col-md-6">
								<label for="patent_details">Patent Details:</label> 
							</div>
							<div class="form-group col-md-6">
								<textarea name="patent_details[]" class="form-control" rows="3" placeholder="max 200 characters"></textarea>
				            </div>
				        </div>

					</div>
					<a href="#" id="add_patent">+Add More</a>
				</div>


				<h5 class="mt-5">Research Articles:</h5>
				<div id="field_article">
					<div class="form-group">
						<div class="row">
							<div class="form-group col-md-6">
								<label for="article_name">Article Name:</label> 
							</div>
							<div class="form-group col-md-6">
								<input class="form-control" type="text" name="article_name[]">
				            </div>
				        </div>
				        <div class="row">
				            <div class="form-group col-md-6">
				            	<label for="article_link">Article Link:</label>
				            </div>				
							<div class="form-group col-md-6">
								<input class="form-control" type="text" name="article_link[]">
				            </div>
						</div>
				        <div class="row">
				            <div class="form-group col-md-6">
				            	<label for="article_authority">Article Authority:</label>
				            </div>				
							<div class="form-group col-md-6">
								<input class="form-control" type="text" name="article_authority[]">
				            </div>
						</div>

						<div class="row">
							<div class="form-group col-md-6">
								<label for="article_number">Article Number:</label> 
							</div>
							<div class="form-group col-md-6">
								<input class="form-control" type="text" name="article_number[]">
				            </div>
				        </div>

				        <div class="row">
							<div class="form-group col-md-6">
								<label for="article_date">Article Date:</label> 
							</div>
							<div class="form-group col-md-6">
								<input class="form-control" type="date" name="article_date[]">
				            </div>
				        </div>

				        <div class="row">
							<div class="form-group col-md-6">
								<label for="article_details">Article Details:</label> 
							</div>
							<div class="form-group col-md-6">
								<textarea name="article_details[]" class="form-control" rows="3" placeholder="max 200 characters"></textarea>
				            </div>
				        </div>

					</div>
					<a href="#" id="add_article">+Add More</a>
				</div>

				<div class="text-right mb-5"> 
		          <button type="submit" name="next" class="btn btn-primary button btn-md">Next</button>
		        </div>
			</form>
		</div>
		<div class="col-sm-3"></div>
	</div>		
</div>

<script type="text/javascript" src="js/add_journal.js"></script>
<script type="text/javascript" src="js/add_patent.js"></script>
<script type="text/javascript" src="js/add_article.js"></script>

</body>
</html>