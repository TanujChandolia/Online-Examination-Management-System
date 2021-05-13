<?php
	require '../includes/common.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pending Exams</title>
	<?php
		require '../includes/links.php';
		include '../feedback.php';
	?>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<?php
		include 'student_header.php';
	?>

	<div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <a href="student_home.php"><i class="fas fa-thumbtack fa-xs"></i> Back to Home Page</a>
	  <a href="results.php"><i class="fas fa-thumbtack fa-xs"></i> Results</a>
	  <a href="faq.php"><i class="fas fa-thumbtack fa-xs"></i> FAQ</a>
	  <a href="" data-toggle="modal" data-target="#feedbackModal"><i class="fas fa-thumbtack fa-xs"></i> Send Feedback</a>
	  <a href="student_query.php"><i class="fas fa-thumbtack fa-xs"></i> Ask a Query</a>
	</div>

	<div id="main">
		<span style="font-size:30px;cursor:pointer;margin-top:0;" onclick="openNav()">&#9776; </span>
	</div>

	<h2 class="text-center">These are your current ongoing exams</h2>
	<h5 class="text-center" style="color:red">Please keep the given deadline in mind. Nothing can be done once deadline is passed.</h5>
	<br>
	<?php
		$id = $_SESSION['id'];
		$select_query = "SELECT * FROM student_exams se 
						 INNER JOIN exam_db e 
						 ON se.exam_id = e.id 
						 INNER JOIN course c
						 ON e.c_id = c.id
						 WHERE s_id = '$id'";
		$res = mysqli_query($con,$select_query) or die(mysqli_error($con));
		$total = mysqli_num_rows($res);

		if($total == 0){
			echo "<br><h3 class='text-center' style='color:green'>Woohoo! No exams ongoing currently.</h3>";
		}
		else{
			$counter = 1;
			echo"<div class='container-fluid'>
					<div class='col-sm-8 offset-sm-2'>
						<div class='row'>
							<table class='table table-light text-center'>
								<thead class='thead-dark'>
									<tr>
										<th scope='col'>S.No.</th>
										<th scope='col'>Name of the Exam</th>
										<th scope='col'>Subject Name and Code</th>
										<th scope='col'>Deadline</th>
										<th scope='col'>Appear for the exam</th>
									</tr>
								</thead>
							<tbody>";
			while($row = mysqli_fetch_array($res)){
				echo"	<tr class='table-info'>
							<th scope='row'>$counter</th>
							<td>".$row['exam_name']."</td>
							<td>".$row['subject_name']." (".$row['subject_code'].")</td>
							<td style='color:red'>".$row['deadline']."</td>";

						if($row['completed'] == 'no'){
								echo "<td><a href='exam_warning.php?exam_id=".$row['exam_id']."' class='btn btn-danger' style='width:120px'>Give Exam</a></td>
							</tr>";
						}
						else{
							echo "<td><button class='btn btn-success disabled' style='width:120px'>Submitted</button></td>
							</tr>";
						}
				$counter++;
			}

			echo"           </tbody>
						</table>
					</div>
				</div>
			</div>";
		}
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

	<?php
	    include '../includes/footer.php';
	?>
</body>
</html>