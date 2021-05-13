<?php
	require 'includes/common.php';
	$username = $_POST['email'];
	$password = $_POST['password'];

	$select_query = "SELECT * FROM student_acc WHERE username = '$username' AND password = '$password'";
	$query_result = mysqli_query($con,$select_query) or die(mysqli_error($con));
	$total = mysqli_num_rows($query_result);

	if($total == 1){
		$row = mysqli_fetch_array($query_result);
		$_SESSION['username'] = $row['username'];
		$_SESSION['name'] = $row['name'];
		$_SESSION['designation'] = "student";
		$_SESSION['id'] = $row['id'];
		header('location:student/student_home.php');
	}

	else if($total == 0){
		$select_query = "SELECT * FROM teacher_acc WHERE username = '$username' AND password = '$password'";
		$query_result = mysqli_query($con,$select_query) or die(mysqli_error($con));
		$total = mysqli_num_rows($query_result);

		if($total == 1){
		$row = mysqli_fetch_array($query_result);
		$_SESSION['username'] = $row['username'];
		$_SESSION['name'] = $row['name'];
		$_SESSION['designation'] = "teacher";
		$_SESSION['id'] = $row['id'];
		header('location:teacher/teacher_home.php');
		}

		else if($total == 0){
		$select_query = "SELECT * FROM admin_acc WHERE username = '$username' AND password = '$password'";
		$query_result = mysqli_query($con,$select_query) or die(mysqli_error($con));
		$total = mysqli_num_rows($query_result);

			if($total == 1){
			$row = mysqli_fetch_array($query_result);
			$_SESSION['username'] = $row['username'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['designation'] = "admin";
			$_SESSION['id'] = $row['id'];
			header('location:admin/admin_home.php');
			}

			else{
				$error = "<span style ='color:red'>Invalid Credentials. Please fill again.</span>";
	 	        header("location:login.php?m1=".$error);
			}
		}
	}
?>