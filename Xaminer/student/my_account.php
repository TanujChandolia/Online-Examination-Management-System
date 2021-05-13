<?php
	require '../includes/common.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Account Details</title>
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
		                <li class="nav-item"><a class="nav-link" href="student_home.php"><i class="fas fa-home"></i> Home </a></li>
		                <li class="nav-item"><a class="nav-link" href="../logout_script.php"><i class="fas fa-sign-in-alt"></i> Logout</a></li>
		                
		            </ul>
		        </div>
		    </div>
		</nav>
	</header>
	<br>
	<h2 class="text-center">These are your account details</h2>
	<h5 class="text-center" style="color:red">Please don't share these with anyone. Contact admin if you have any queries or there is some error in your details.</h5>

	<?php
		$id = $_SESSION['id'];
		$select_query = "SELECT * FROM student_acc WHERE id = '$id'";
		$res = mysqli_query($con,$select_query) or die(mysqli_error($con));
		$row = mysqli_fetch_array($res);

		echo"<div class='container-fluid'>
				   		<div class='row'>
				   			<div class='col-sm-8 offset-sm-2 text-center'>
				   				<table class='table table-light table-bordered'>
								  <thead class='thead-dark'>
								    <tr>
								      <th scope='col'></th>
								      <th scope='col'></th>
								    </tr>
								  </thead>";

		echo"
								  <tbody>
								    <tr>
								      <th scope='row'>Name</th>
								      <td>".$row['name']."</td>
								    </tr>
								    <tr>
								      <th scope='row'>Username</th>
								      <td>".$row['username']."</td>
								    </tr>
								    <tr>
								      <th scope='row'>Password</th>
								      <td>".$row['password']."</td>
								    </tr>
								    <tr>
								      <th scope='row'>Email</th>
								      <td>".$row['email']."</td>
								    </tr>
								    <tr>
								      <th scope='row'>Phone Number</th>
								      <td>".$row['phone']."</td>
								    </tr>
								    <tr>
								      <th scope='row'>Date of Birth</th>
								      <td>".$row['dob']."</td>
								    </tr>
								    ";					  

		echo "					</tbody>
								</table>
					   		</div>
				   		</div>	
				   	</div>";

	?>

	<?php
        include '../includes/footer.php';
    ?>
</body>
</html>