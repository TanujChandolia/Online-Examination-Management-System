<?php
	require '../includes/common.php';
	$exam_id = $_GET['exam_id'];
	$date = $_POST['deadlinedate'];
	$time = $_POST['deadlinetime'];

	$deadline = date('Y-m-d H:i:s', strtotime("$date $time"));
	$query = "UPDATE exam_db SET deadline = '$deadline' WHERE id = '$exam_id'";
	$res = mysqli_query($con,$query) or die(mysqli_error($con));

	header('location:add_questions.php?exam_id='.$exam_id);
?>