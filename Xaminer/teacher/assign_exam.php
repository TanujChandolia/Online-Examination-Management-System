<?php
	require '../includes/common.php';
	$exam_id = $_GET['exam_id'];

	$query = "SELECT * FROM exam_db e
			  INNER JOIN student_course_info s
			  ON e.c_id = s.c_id
			  INNER JOIN student_acc sa
			  ON sa.id = s.s_id
			  WHERE e.id = '$exam_id'";

	$res = mysqli_query($con,$query) or die(mysqli_error($con));

	while($row = mysqli_fetch_array($res)){
		$s_id = $row['s_id'];
		$query = "INSERT INTO student_exams (s_id,exam_id,completed) VALUES ('$s_id','$exam_id','no')";
		$r = mysqli_query($con,$query) or die(mysqli_error($con));
	}

	header('location:modify_questionpaper.php?m1=Assigned!');
?>