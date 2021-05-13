<?php
	require'../includes/common.php';
	$exam_id = $_GET['exam_id'];
	$q_id = $_GET['q_id'];

	$query = "DELETE FROM questions_db WHERE id='$q_id'";
	$res = mysqli_query($con,$query) or die(mysqli_error($con));

	header('location:add_questions.php?exam_id='.$exam_id);
?>