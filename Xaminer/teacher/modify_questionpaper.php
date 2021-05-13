<?php
	require '../includes/common.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Teacher Home Page</title>
	<?php
		require '../includes/links.php';
		include '../feedback.php';
	?>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<?php
		include 'teacher_header.php';
	?>
	<div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <a href="exam_create.php"><i class="fas fa-thumbtack fa-xs"></i> Create a Question Paper</a>
	  <a href="teacher_home.php"><i class="fas fa-thumbtack fa-xs"></i> Back to Home Page</a>
	  <a href="grade_student.php"><i class="fas fa-thumbtack fa-xs"></i> Grade student exams</a>
	  <a href="faq.php"><i class="fas fa-thumbtack fa-xs"></i> FAQ</a>
	  <a href="teacher_query.php"><i class="fas fa-thumbtack fa-xs"></i> Ask a Query</a>
	  <a href="" data-toggle="modal" data-target="#feedbackModal"><i class="fas fa-thumbtack fa-xs"></i> Send Feedback</a>
	</div>

	<div id="main">
		<span style="font-size:30px;cursor:pointer;margin-top:0;" onclick="openNav()">&#9776; </span>
	</div>	

	<h2 class="text-center">These are the current existing question papers: </h2>
	<br>

	<?php
		if(isset($_GET['m1'])){
			echo"<p class='text-center' style='color:green'>".$_GET['m1']."</p>";
		}
		$id = $_SESSION['id'];
		$query="SELECT * FROM teacher_course_info ti 
				INNER JOIN course c 
				ON ti.c_id = c.id
				INNER JOIN exam_db
				ON ti.c_id = exam_db.c_id
				WHERE ti.t_id = '$id' 
				ORDER BY deadline asc";

		$res = mysqli_query($con,$query) or die(mysqli_error($con));
		$counter = 1;
		echo"<div class='container-fluid'>
				   		<div class='row'>
				   			<div class='col-sm-8 offset-sm-2 text-center'>
				   				<table class='table table-light text-center'>
								  <thead class='thead-dark'>
								    <tr>
								      <th scope='col'>S.No.</th>
								      <th scope='col'>Subject Name</th>
								      <th scope='col'>Subject Code</th>
								      <th scope='col'>Test Name</th>
								      <th scope='col'>Deadline</th>
								      <th scope='col'>Action</th>
								    </tr>
								  </thead>
								  <tbody>";
		while($row = mysqli_fetch_array($res)){
			echo "
								    <tr class='table-success'>
								      <th scope='row'>".$counter."</th>
								      <td>".$row['subject_name']."</td>
								      <td>".$row['subject_code']."</td>
								      <td>".$row['exam_name']."</td>
								      <td>".$row['deadline']."</td>
								      <td><a href='add_questions.php?exam_id=".$row['id']."' class='btn btn-info'>Modify</a>
								      	  <a href='assign_exam.php?exam_id=".$row['id']."' class='btn btn-warning'>Assign to Students</a>
								      	  <a href='unassign_exam.php?exam_id=".$row['id']."' class='btn btn-warning'>Unassign </a></td>
								    </tr>";
			$counter++;
		}

		echo "         </tbody>
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

	<?php
	    include '../includes/footer.php';
	?>

</body>
</html>