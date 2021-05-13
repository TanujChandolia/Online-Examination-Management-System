<?php
	require '../includes/common.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Questions</title>
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
			<h2 class="text-center">Add Questions here</h2>
		</div>
		
		<div class="card">
			<div class="card-body">
			<h3 class="card-title" style="font-weight:bold">Create Questions</h3>
			<br>
				<form method="post" 
				<?php
					echo"action='add_question_to_db.php?exam_id=".$_GET['exam_id']."'";
				?>
				>
					<div class="form-group">
						<label for="questiontype"><strong>Choose the type of question: </strong></label>
						<div class='form-check'>
						  <input class='form-check-input' type='radio' name='questiontype' id='questiontype' value="mcq" checked>
						  <label class='form-check-label' for='questiontype'>
						    	Multiple Choice Question
						  </label>
						</div>
						<div class='form-check'>
						  <input class='form-check-input' type='radio' name='questiontype' id='questiontype' value="subjective">
						  <label class='form-check-label' for='questiontype'>
						    	Subjective
						  </label>
						</div>
					</div>

					<div class="form-group">
				    	<label for="question"><strong>Enter the question: </strong></label>
				    	<textarea class="form-control" name="question" id="question" rows="3"></textarea>
				    </div>

				    <div class="form-group">
				    	<label for="choices"><strong>If this is a MCQ, then fill these else leave it:</strong> </label>
				    	<input type="text" class="form-control" name="choice1" id="choices" placeholder="Choice 1">
				    	<input type="text" class="form-control" name="choice2" id="choices" placeholder="Choice 2">
				    	<input type="text" class="form-control" name="choice3" id="choices" placeholder="Choice 3">
				    	<input type="text" class="form-control" name="choice4" id="choices" placeholder="Choice 4">
				    </div>

				    <div class="form-group">
				    	<label for="correctmcq"><strong>Choose the correct MCQ: </strong></label>
						<div class='form-check form-check-inline'>
						  <input class='form-check-input' type='radio' name='correctmcq' id='correctmcq' value="option1" checked>
						  <label class='form-check-label' for='correctmcq'>
						    	Choice 1
						  </label>
						</div>
						<div class='form-check form-check-inline'>
						  <input class='form-check-input' type='radio' name='correctmcq' id='correctmcq' value="option2" >
						  <label class='form-check-label' for='correctmcq'>
						    	Choice 2
						  </label>
						</div>
						<div class='form-check form-check-inline'>
						  <input class='form-check-input' type='radio' name='correctmcq' id='correctmcq' value="option3" >
						  <label class='form-check-label' for='correctmcq'>
						    	Choice 3
						  </label>
						</div>
						<div class='form-check form-check-inline'>
						  <input class='form-check-input' type='radio' name='correctmcq' id='correctmcq' value="option4" >
						  <label class='form-check-label' for='correctmcq'>
						    	Choice 4	
						  </label>
						</div>
				    </div>

				    <button class="btn btn-info btn-lg btn-block" type="submit">
				    	Enter Question
				    </button>
				</form>
			</div>
		</div>
		<br>
		<div class="jumbotron">
			<h2 class="text-center">Review or Delete here</h2>
		</div>
		<div class="card">
			<div class="card-body">
			<h3 class="card-title" style="font-weight:bold">Created Questions</h3>
			<br>
				<?php
					$exam_id = $_GET['exam_id'];
					$query = "SELECT * FROM questions_db WHERE exam_id = '$exam_id'";
					$res = mysqli_query($con,$query) or die(mysqli_error($con));
					$counter = 1;
					while($row = mysqli_fetch_array($res)){

						if($row['type'] == 'mcq'){
							echo"<div>
									<h4 style='display: inline; margin-right:300px;'>Q$counter. ".$row['question']."</h4>
									<a href ='remove_question.php?exam_id=".$exam_id."&q_id=".$row['id']."' class='remove_item_link btn btn-danger'> Delete Question</a>
									<hr>
									<div class='row card-text'>
										<div class='col-sm-6'>
											<p>A. ".$row['option1']."</p>
										</div>
										<div class='col-sm-6'>
											<p>B. ".$row['option2']."</p>
										</div>
										<div class='col-sm-6'>
											<p>C. ".$row['option3']."</p>
										</div>
										<div class='col-sm-6'>
											<p>D. ".$row['option4']."</p>
										</div>
									</div>
									<p><strong>Correct Answer: ".$row[$row['correct']]."</strong></p>
								</div>
								<hr>";
						}
						else{
							echo"<div>
									<h4 style='display:inline; margin-right:300px;'>Q$counter. ".$row['question']."</h4>
									<a href ='remove_question.php?exam_id=".$exam_id."&q_id=".$row['id']."' class='remove_item_link btn btn-danger'> Delete Question</a>
								</div>
								<hr>";
						}

						$counter++;
					}
				?>
			</div>
		</div>
		<br>
		<div class="card">
			<div class="card-body">
				<h3 class="card-title"><strong>Change Deadline:</strong></h3>
				<br>
				<form method="post" 
					<?php
						echo"action = 'change_deadline.php?exam_id=".$exam_id."'";
					?>
				>
					<div class="form-group">
						<label for="deadlinedate"><strong>Date of deadline: </strong></label>
						<input type="date" name="deadlinedate" required="true">
					</div>

					<div class="form-group">
						<label for="deadlinetime"><strong>Time of deadline: </strong></label>
						<input type="time" name="deadlinetime" required="true">
					</div>

					<button class="btn btn-warning btn-block btn-lg" type="submit">Change Deadline</button>
				</form>
			</div>
		</div>
		<br>
		
		<a 
		<?php
			echo "href='delete_paper.php?exam_id=".$exam_id."'";
		?> class="btn btn-danger btn-lg btn-block" style="padding:1.25rem">Delete Question Paper</a>
		
	</div>
	
	<br><br><br>
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