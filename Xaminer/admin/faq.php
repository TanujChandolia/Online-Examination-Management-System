<?php
	require '../includes/common.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin FAQ Page</title>
	<?php
		require '../includes/links.php';
	?>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		    <div class="container-fluid">
		        
		            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		            <a href="../index.php" class="navbar-brand" style="font-size:24px">
		            	<img src="../img/navlogocrop.jpeg" width="140px" alt="Xaminer">
		            </a>
		        
		        
		        <div class="collapse navbar-collapse" id="myNavbar">
		            <ul class="navbar-nav ml-auto">
		               
		                <li class="nav-item"><a class="nav-link" href="../about.php"><i class="fas fa-info-circle"></i> About Us</a></li>
		                <li class="nav-item"><a class="nav-link" href="my_account.php"><i class="fas fa-user"></i> My Account</a></li>
		                <li class="nav-item"><a class="nav-link" href="admin_home.php"><i class="fas fa-home"></i> Home</a></li>
		                <li class="nav-item"><a class="nav-link" href="../logout_script.php"><i class="fas fa-sign-in-alt"></i> Logout</a></li>
		                
		            </ul>
		        </div>
		    </div>
		</nav>
	</header>
	<br>
	<div class="container">
		<div class="jumbotron text-center">
		  <h1 class="display-4">Frequently Asked Questions</h1>
		  <p class="lead">This page is dedicated to clear all the common doubts and situations admins face.</p>
		  <hr class="my-4">
		</div>

		<div class="content">
			<h3 >1. What all functions can an admin perform? </h3>
			<p class="lead faqAns">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<hr>
		</div>
	</div>
	<?php
	    include '../includes/footer.php';
	?>
</body>
</html>