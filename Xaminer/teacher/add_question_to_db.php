<?php
	require '../includes/common.php';
	$exam_id = $_GET['exam_id'];
	$type = $_POST['questiontype'];
	$question = $_POST['question'];
	$option1 = $_POST['choice1'];
	$option2 = $_POST['choice2'];
	$option3 = $_POST['choice3'];
	$option4 = $_POST['choice4'];
	$correct = $_POST['correctmcq'];

	echo $exam_id." ".$type." ".$question." ".$option1." ".$option2." ".$option3." ".$option4." ".$correct;

	$query = "INSERT INTO questions_db (exam_id,type,question,option1,option2,option3,option4,correct) 
	VALUES ('$exam_id','$type','$question','$option1','$option2','$option3','$option4','$correct')";
	$res = mysqli_query($con,$query) or die(mysqli_error($con));

	header('location:add_questions.php?exam_id='.$exam_id);
?>