<?php
	require '../includes/common.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Exam Warning</title>
	<?php
		require '../includes/links.php';
	?>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<?php
		include 'student_header.php';
	?>
	<br>
	<div class="container">
		<div class="jumbotron">
			<h1 class="text-center" style="color:red">Attention!</h1>
			<h2 class="text-center">You are about to appear for the following exam:</h2>
			<br>
			<?php
				$exam_id = $_GET['exam_id'];
				$query = "SELECT * FROM exam_db e INNER JOIN course c ON e.c_id = c.id WHERE e.id = '$exam_id'";
				$res = mysqli_query($con,$query) or die(mysqli_error($con));

				while($row = mysqli_fetch_array($res)){
					$time    = explode(':', $row['alloted_time']);
					$minutes = ($time[0] * 60.0 + $time[1] * 1.0 + $time[2] / 60);	
					echo"<ul style='font-size:26px'>
							<li><strong>Subject Name</strong>: ".$row['subject_name']."</li>
							<li><strong>Subject Code</strong>: ".$row['subject_code']."</li>
							<li><strong>Exam Name</strong>: ".$row['exam_name']."</li>
							<li><strong>Total Marks</strong>: ".$row['total_marks']."</li>
							<li><strong>Alloted Time</strong>: ".$minutes." Minutes</li>
						 </ul>";
				}
			?>
			<br>
			<p class="text-center" style="color:red; font-size: 29px">Once you press start exam, you cannot go back. Please complete the exam in one go.</p>
			<p class="text-center" style="color:green;font-size: 29px">A timer will start the moment you click start exam. Be ready and Good luck!</p>
			<a <?php 
				echo"href = 'exam.php?exam_id=".$exam_id."'";
			 ?> 
			 class="btn btn-warning btn-lg btn-block">Start Exam</a>
		</div>
		
	</div>
	<?php
		include '../includes/footer.php';
	?>
</body>
</html>