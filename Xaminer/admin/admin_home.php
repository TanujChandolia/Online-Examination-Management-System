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
	  <a href="manage_student.php"><i class="fas fa-thumbtack fa-xs"></i> Manage Student Records</a>
	  <a href="manage_teacher.php"><i class="fas fa-thumbtack fa-xs"></i> Manage Teacher Records</a>
	  <a href="answer_query.php"><i class="fas fa-thumbtack fa-xs"></i> Answer Queries</a>
	  <a href="faq.php"><i class="fas fa-thumbtack fa-xs"></i> FAQ</a>
	  <a href="" data-toggle="modal" data-target="#feedbackModal"><i class="fas fa-thumbtack fa-xs"></i> Send Feedback</a>
	  

	</div>

	<div id="main">
		<span style="font-size:30px;cursor:pointer;margin-top:0;" onclick="openNav()">&#9776;</span>
	</div>
	<?php
	  	echo"<h2 style='text-align:center; margin-left:10px;'>Welcome, ".$_SESSION['name']."!</h2>";
	?>
	<h4 class="text-center" style="color:green">These are the current statistics of the database</h4>
	<br>
	<?php
		echo"<div class='container-fluid'>
				   		<div class='row'>
				   			<div class='col-sm-8 offset-sm-2 text-center'>
				   				<table class='table table-light'>
								  <thead class='thead-dark'>
								    <tr>
								      <th scope='col'>S.No.</th>
								      <th scope='col'>Value Name</th>
								      <th scope='col'>Quantity</th>
								    </tr>
								  </thead>
								  <tbody>";

		$query = "SELECT count(id) FROM student_acc";
		$res = mysqli_query($con,$query) or die(mysqli_error($con));
		$row = mysqli_fetch_array($res);
		echo"
								    <tr class='table-info'>
								      <th scope='row'>1</th>
								      <td>Number of Students</td>
								      <td>".$row['count(id)']."</td>
								    </tr>
								    ";

		$query = "SELECT count(id) FROM teacher_acc";
		$res = mysqli_query($con,$query) or die(mysqli_error($con));
		$row = mysqli_fetch_array($res);

		echo"
								    <tr class='table-info'>
								      <th scope='row'>2</th>
								      <td>Number of Teachers</td>
								      <td>".$row['count(id)']."</td>
								    </tr>
								    ";

		$query = "SELECT count(id) FROM course";
		$res = mysqli_query($con,$query) or die(mysqli_error($con));
		$row = mysqli_fetch_array($res);						  

		echo"
								    <tr class='table-info'>
								      <th scope='row'>3</th>
								      <td>Number of Subjects</td>
								      <td>".$row['count(id)']."</td>
								    </tr>
								    ";

		$query = "SELECT count(id) FROM exam_db";
		$res = mysqli_query($con,$query) or die(mysqli_error($con));
		$row = mysqli_fetch_array($res);

		echo"
								    <tr class='table-info'>
								      <th scope='row'>4</th>
								      <td>Number of Question Papers</td>
								      <td>".$row['count(id)']."</td>
								    </tr>
								    ";

		$query = "SELECT count(id) FROM questions_db";
		$res = mysqli_query($con,$query) or die(mysqli_error($con));
		$row = mysqli_fetch_array($res);

		echo"
								    <tr class='table-info'>
								      <th scope='row'>5</th>
								      <td>Number of Questions</td>
								      <td>".$row['count(id)']."</td>
								    </tr>
								    ";

		echo "	
									</tbody>
								</table>
					   		</div>
				   		</div>	
				   	</div>";
	?>
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
	<br>
	<br>
	<br>
	<?php
	    include '../includes/footer.php';
	?>
</body>
</html>