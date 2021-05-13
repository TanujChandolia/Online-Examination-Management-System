<?php
	require '../includes/common.php';
	$subject_name = $_POST['subject'];
	$exam_name = $_POST['examname'];
	$marks = $_POST['marks'];
	$alloted_time = $_POST['allotedtime'];
	$deadlinedate = $_POST['deadlinedate'];
	$deadlinetime = $_POST['deadlinetime'];
	$deadline = date('Y-m-d H:i:s', strtotime("$deadlinedate $deadlinetime"));

	echo $deadline;
	$query = "SELECT * FROM course WHERE subject_name = '$subject_name'";
	$res = mysqli_query($con,$query) or die(mysqli_error($con));
	$row = mysqli_fetch_array($res);

	$c_id = $row['id'];
	$query = "INSERT INTO exam_db (c_id,exam_name,total_marks,alloted_time,deadline) VALUES ('$c_id','$exam_name','$marks','$alloted_time', '$deadline')";
	$res = mysqli_query($con,$query) or die(mysqli_error($con));
	$exam_id = mysqli_insert_id($con);
	header('location:add_questions.php?exam_id='.$exam_id);
	
?>