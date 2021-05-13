<?php
	require '../includes/common.php';
	$t_id = $_SESSION['id'];
	$query = $_POST['query'];
	$answer = "";

	$q = "INSERT INTO teacher_query (t_id,query,answer) VALUES ('$t_id', '$query', '$answer')";
	$r = mysqli_query($con,$q) or die(mysqli_error($con));


	$q = "INSERT INTO admin_query (t_id,designation,query) VALUES ('$t_id','teacher','$query')";
	$r = mysqli_query($con,$q) or die(mysqli_error($con));

	header('location:teacher_query.php');
?>