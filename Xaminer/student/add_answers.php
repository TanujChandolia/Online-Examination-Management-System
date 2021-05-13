<?php
	require '../includes/common.php';
	$s_id = $_SESSION['id'];
	$exam_id = $_GET['exam_id'];
	$query = "SELECT count(id) FROM questions_db WHERE exam_id = '$exam_id' ";	
	$res = mysqli_query($con,$query) or die(mysqli_error($con));

	$row = mysqli_fetch_array($res);
	$total = $row['count(id)'];

	$query = "SELECT * FROM questions_db WHERE exam_id = '$exam_id' ";	
	$res = mysqli_query($con,$query) or die(mysqli_error($con));
	$counter = 1;
	while($row = mysqli_fetch_array($res)){
		$question_id = $row['id'];
		if($row['type'] == 'mcq'){
			$answer = $_POST['answer'.$counter];
			echo $answer;
			$query = "INSERT INTO answer_db (exam_id, question_id,s_id, mcq_ans) VALUES ('$exam_id', '$question_id','$s_id', '$answer') ";
			$r = mysqli_query($con,$query) or die(mysqli_error($con));
		}
		else{
			$answer = $_POST['answer'.$counter];
			$query = "INSERT INTO answer_db (exam_id, question_id,s_id, subj_ans) VALUES ('$exam_id', '$question_id',$s_id, '$answer') ";
			$r = mysqli_query($con,$query) or die(mysqli_error($con));
		}
		$counter++;

	}
	
	$query = "UPDATE student_exams SET completed='yes' WHERE exam_id = '$exam_id' AND s_id = '$s_id'";
	$res = mysqli_query($con,$query) or die(mysqli_error($con));
	header('location:ongoing_exams.php')

?>