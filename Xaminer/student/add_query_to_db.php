<?php
	require '../includes/common.php';
	$s_id = $_SESSION['id'];
	$query = $_POST['query'];
	$answer = "";

	$q = "INSERT INTO student_query (s_id,query,answer) VALUES ('$s_id', '$query', '$answer')";
	$r = mysqli_query($con,$q) or die(mysqli_error($con));


	$q = "INSERT INTO admin_query (s_id,designation,query) VALUES ('$s_id','student','$query')";
	$r = mysqli_query($con,$q) or die(mysqli_error($con));

	header('location:student_query.php');
?>