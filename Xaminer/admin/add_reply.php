<?php
	require '../includes/common.php';
	$query = $_GET['query'];
	$reply = $_POST['reply'];
	if(isset($_GET['s_id'])){
		$s_id = $_GET['s_id'];
		$q = "UPDATE student_query SET answer='$reply' WHERE s_id='$s_id' AND query='$query' ";
		$r = mysqli_query($con,$q) or die(mysqli_error($con));

		$q = "DELETE FROM admin_query WHERE s_id='$s_id' AND query='$query' ";
		$r = mysqli_query($con,$q) or die(mysqli_error($con));
	}
	else if(isset($_GET['t_id'])){
		$t_id = $_GET['t_id'];
		$q = "UPDATE teacher_query SET answer='$reply' WHERE t_id='$t_id' AND query='$query' ";
		$r = mysqli_query($con,$q) or die(mysqli_error($con));

		$q = "DELETE FROM admin_query WHERE t_id='$t_id' AND query='$query' ";
		$r = mysqli_query($con,$q) or die(mysqli_error($con));
	}

	header('location:answer_query.php');
?>