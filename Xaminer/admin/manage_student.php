<?php
	require '../includes/common.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Home Page</title>
	<?php
		require '../includes/links.php';
		include '../feedback.php';
	?>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<?php
		include 'admin_header.php';
	?>

	<div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <a href="admin_home.php"><i class="fas fa-thumbtack fa-xs"></i> Back to Home Page</a>
	  <a href="manage_teacher.php"><i class="fas fa-thumbtack fa-xs"></i> Manage Teacher Records</a>
	  <a href="#"><i class="fas fa-thumbtack fa-xs"></i> Answer Queries</a>
	  <a href="faq.php"><i class="fas fa-thumbtack fa-xs"></i> FAQ</a>
	  <a href="" data-toggle="modal" data-target="#feedbackModal"><i class="fas fa-thumbtack fa-xs"></i> Send Feedback</a>
	  

	</div>

	<div id="main">
		<span style="font-size:30px;cursor:pointer;margin-top:0;" onclick="openNav()">&#9776;</span>
	</div>

	<div class="container">
		<div class="jumbotron">
			<h2 class="text-center">Manage the data of all the enrolled students</h2>
			<br>
			<a href="add_student.php" class="btn btn-success btn-lg btn-block"> Add a new Student</a>
		</div>

		<?php
			echo"
				   
				   				<table class='table table-light text-center table-bordered'>
								  <thead class='thead-dark'>
								    <tr>
								      <th scope='col'>S.No.</th>
								      <th scope='col'>Student Name</th>
								      <th scope='col'>Username</th>
								      <th scope='col'>Password</th>
								      <th scope='col'>Email</th>
								      <th scope='col'>Phone Number</th>
								      <th scope='col'>Date of Birth</th>
								    </tr>
								  </thead>
								  <tbody>";

			$query = "SELECT * FROM student_acc ORDER BY name asc";
			$res = mysqli_query($con,$query);
			$counter = 1;
			while($row = mysqli_fetch_array($res)){
				echo"
								    <tr class='table-warning'>
								      <th scope='row'>".$counter."</th>
								      <td>".$row['name']."</td>
								      <td>".$row['username']."</td>
								      <td>".$row['password']."</td>
								      <td>".$row['email']."</td>
								      <td>".$row['phone']."</td>
								      <td>".$row['dob']."</td>
								    </tr>
								    ";

				$counter++;
			}

			echo "	
									</tbody>
								</table>
					   				   	";
		?>
	</div>


	<script>
	function openNav() {
	  document.getElementById("mySidenav").style.width = "300px";
	  document.getElementById("main").style.marginLeft = "300px";
	}

	function closeNav() {
	  document.getElementById("mySidenav").style.width = "0";
	  document.getElementById("main").style.marginLeft= "0";
	}
	</script>

	<?php
	    include '../includes/footer.php';
	?>
</body>
</html>