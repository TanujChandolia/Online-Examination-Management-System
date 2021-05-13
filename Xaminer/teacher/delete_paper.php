<?php
	require '../includes/common.php';
	$exam_id = $_GET['exam_id'];

	$query = "DELETE FROM student_exams WHERE exam_id = '$exam_id'";
	$r = mysqli_query($con,$query) or die(mysqli_error($con));
	
	$query = "DELETE FROM questions_db WHERE exam_id = '$exam_id'";
	$res = mysqli_query($con,$query) or die(mysqli_error($con));

	$query = "DELETE FROM exam_db WHERE id = '$exam_id'";
	$res = mysqli_query($con,$query) or die(mysqli_error($con));

	header('location:modify_questionpaper.php');
?>