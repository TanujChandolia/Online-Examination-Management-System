<?php
	require '../includes/common.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Teacher Create Exam Page</title>
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
	  <a href="teacher_home.php"><i class="fas fa-thumbtack fa-xs"></i> Back to Home Page</a>
	  <a href="modify_questionpaper.php"><i class="fas fa-thumbtack fa-xs"></i> Modify existing Question Papers</a>
	  <a href="grade_student.php"><i class="fas fa-thumbtack fa-xs"></i> Grade student exams</a>
	  <a href="faq.php"><i class="fas fa-thumbtack fa-xs"></i> FAQ</a>
	  <a href="teacher_query.php"><i class="fas fa-thumbtack fa-xs"></i> Ask a Query</a>
	  <a href="" data-toggle="modal" data-target="#feedbackModal"><i class="fas fa-thumbtack fa-xs"></i> Send Feedback</a>
	</div>

	<div id="main">
		<span style="font-size:30px;cursor:pointer;margin-top:0;" onclick="openNav()">&#9776; </span>
	</div>

	<div class="container">
		<div class="jumbotron">
			<h2 class="text-center">Here you can create a new question paper for the students</h2>
		</div>
		<div class="card">
			<div class="card-body">
				<form method="POST" action="add_exam_to_db.php" style="font-size:20px">
					<h3 class="card-title text-center">Exam Creation Form</h3>
					<br>
					<div class="form-group">
						<label><strong>Choose the subject you want to create the question paper for:</strong></label>
					<?php
						$id = $_SESSION['id'];
						$query = "SELECT * FROM teacher_course_info ti INNER JOIN course c ON ti.c_id = c.id WHERE t_id = '$id' ";
						$res = mysqli_query($con,$query) or die(mysqli_error($con));
						while($row = mysqli_fetch_array($res)){
							$name = $row['subject_name'];
						?>
							<div class='form-check'>
							  <input class='form-check-input' type='radio' name='subject' id='subject' value="<?php echo $name;?>" checked>
							  <label class='form-check-label' for='subject'>
							    	<?php
							    		echo $name;
							    	?>
							  </label>
							</div>
						<?php
						}
					?>
					</div>	
					<br>
					<div class="form-group">
						<label for="examname"><strong>Name of the Exam: </strong></label>
						<input type="text" name="examname" class="form-control" placeholder="<Degree> <Semester> <Mid Sem/End Sem/Quiz>" required="true">
					</div>
					<br>
					<div class="form-group">
						<label for="marks"><strong>Total Marks: </strong></label>
						<input type="text" name="marks" required="true">
					</div>
					<div class="form-group">
						<label for="allotedtime"><strong>Alotted Time: </strong></label>
						<input type="time" name="allotedtime" required="true">
					</div>
					<br>
					<h3>Deadline:</h3>
					<div class="form-group">
						<label for="deadlinedate"><strong>Date of deadline: </strong></label>
						<input type="date" name="deadlinedate" required="true">
					</div>

					<div class="form-group">
						<label for="deadlinetime"><strong>Time of deadline: </strong></label>
						<input type="time" name="deadlinetime" required="true">
					</div>

					<button class="btn btn-warning btn-block btn-lg" type="submit">
						Start adding questions
					</button>
					
				</form>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
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