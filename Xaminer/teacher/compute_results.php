<?php
	require '../includes/common.php';
	$s_id = $_GET['s_id'];
	$exam_id = $_GET['exam_id'];

	$query = "SELECT count(question_id),exam_name,subject_name,subject_code,total_marks FROM answer_db a
			  INNER JOIN exam_db e
			  ON a.exam_id = e.id
			  INNER JOIN course c
			  ON c.id = e.c_id
			  WHERE s_id = '$s_id' AND exam_id='$exam_id'";
	$res = mysqli_query($con,$query) or die(mysqli_error($con));

	$row = mysqli_fetch_array($res);
	$total = $row['count(question_id)'];
	$counter = 1;

	$total_marks_alloted = 0;

	while($counter <= $total){
		$marks = $_POST['marks'.$counter];
		$total_marks_alloted += $marks;
		$counter++;
	}

	//echo"total marks = ".$total_marks_alloted;
	$exam_name = $row['exam_name'];
	$subject_name = $row['subject_name'];
	$subject_code = $row['subject_code'];
	$total_marks = $row['total_marks'];
	$query = "INSERT INTO student_results (s_id,exam_name,subject_name,subject_code,marks,total_marks) 
			  VALUES ('$s_id', '$exam_name' , '$subject_name', '$subject_code', '$total_marks_alloted', '$total_marks') ";
	$r = mysqli_query($con,$query) or die(mysqli_error($con));


	$query = "DELETE FROM answer_db WHERE exam_id = '$exam_id' AND s_id = '$s_id' ";
	$r = mysqli_query($con,$query) or die(mysqli_error($con));
	header('location:grade_student.php?m1=Graded!');
?>