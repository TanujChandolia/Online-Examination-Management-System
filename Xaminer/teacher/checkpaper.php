<?php
	require '../includes/common.php';
	$s_id = $_GET['s_id'];
	$exam_id = $_GET['exam_id'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student's Paper Page</title>
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
	  <a href="modify_questionpaper.php"><i class="fas fa-thumbtack fa-xs"></i> Modify existing Question Papers</a>
	  <a href="grade_student.php"><i class="fas fa-thumbtack fa-xs"></i> Grade student exams</a>
	  <a href="faq.php"><i class="fas fa-thumbtack fa-xs"></i> FAQ</a>
	  <a href="teacher_query.php"><i class="fas fa-thumbtack fa-xs"></i> Ask a Query</a>
	  <a href="" data-toggle="modal" data-target="#feedbackModal"><i class="fas fa-thumbtack fa-xs"></i> Send Feedback</a>
	</div>

	<div id="main">
		<span style="font-size:30px;cursor:pointer;margin-top:0;" onclick="openNav()">&#9776; </span>
	</div>

	<div class="container" id='checkpaper'>
		<div class="jumbotron">
			<h1 class="text-center">Mark the student and submit to add to his/her results</h1>
		</div>
		<?php
			$query = "  SELECT count(question_id) FROM answer_db a
						INNER JOIN exam_db e
						ON a.exam_id = e.id
						INNER JOIN course c
						ON e.c_id = c.id
						INNER JOIN teacher_course_info t
						ON t.c_id = c.id
						WHERE s_id = '$s_id' AND exam_id= '$exam_id' ";
			$res = mysqli_query($con,$query) or die(mysqli_error($con));
			$row = mysqli_fetch_array($res);
			$total = $row['count(question_id)'];
			$counter = 1;

			$query = " SELECT * FROM `answer_db` a
					   INNER JOIN questions_db q
					   ON a.question_id = q.id
					   INNER JOIN exam_db e
					   ON e.id = a.exam_id
					   INNER JOIN course c
					   ON c.id = e.c_id
					   WHERE s_id = '$s_id'AND a.exam_id = '$exam_id'";

			$res = mysqli_query($con,$query) or die(mysqli_error($con));
			$row = mysqli_fetch_array($res);
			echo"<div id='paper-heading'>
					<h3 style='display: inline'>".$row['exam_name'].", ".$row['subject_name']."</h3>
					<h3 id='marksh2'>Total Marks: ".$row['total_marks']."</h3></div>";

			echo"<form method='post' action='compute_results.php?s_id=".$s_id."&exam_id=".$exam_id."'>";

			$query = " SELECT * FROM `answer_db` a
					   INNER JOIN questions_db q
					   ON a.question_id = q.id
					   INNER JOIN exam_db e
					   ON e.id = a.exam_id
					   WHERE s_id = '$s_id'AND a.exam_id = '$exam_id'";

			$res = mysqli_query($con,$query) or die(mysqli_error($con));

			while($counter <= $total){
				$row = mysqli_fetch_array($res);
				echo"<h3>Q$counter. ".$row['question']."</h3>";

				echo"<div class='row'>
						<div class='col-sm-9'>";
				if($row['type'] == 'mcq'){
					echo"(MCQ Question) <br>";
					$giv_ans = $row['mcq_ans'];
					$cor_ans = $row[$row['correct']];
					echo"<span style='color:green'>Correct Answer: ".$cor_ans."</span><br>";
					echo"<strong>Given Answer: </strong>".$giv_ans;

					if($giv_ans == $cor_ans){
						echo"<i style='margin-left:5px;background-color:' class='fas fa-check-circle fa-sm'></i>";
					}
					else{
						echo"<i style='margin-left:5px;' class='fas fa-times-circle fa-sm'></i>";
					}
				}
				else{
					echo"(Subjective Question)<br>";
					echo "<strong>Given Answer:</strong> ".$row['subj_ans'];
				}
				echo"</div>";
				echo"<div class='form-group col-sm-3'>
						<input type='number' name='marks$counter' class='form-control' required='true' placeholder='Enter marks for this question'>
					 </div>";

				echo "</div><hr>";

				$counter++;
			}


			echo"<button class='btn btn-warning btn-lg btn-block' type='submit'>Submit Marks for Computation</button>
				</form>";
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

	<br>
	<br>
	<br>
	<?php
	    include '../includes/footer.php';
	?>

</body>
</html>