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
	<?php
		include 'admin_header.php';
	?>
	<br>
	<h2 class="text-center">These are your account details</h2>
	<h5 class="text-center" style="color:red">Please don't share these with anyone.</h5>

	<?php
		$id = $_SESSION['id'];
		$select_query = "SELECT * FROM admin_acc WHERE id = '$id'";
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