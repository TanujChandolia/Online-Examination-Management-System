<?php
	require '../includes/common.php';
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$dob = $_POST['dob'];
	$phone = $_POST['phone'];
	$name = $firstname.' '.$lastname;
	strtolower($firstname);
	$username = $firstname.'@xyz.com';

	$s1 = $_POST['s1'];

	$query = "INSERT INTO teacher_acc (name,username,password,email,dob,phone)
			  VALUES ('$name','$username','$password','$email','$dob','$phone')";
	$res = mysqli_query($con,$query) or die(mysqli_error($con));

	$t_id = mysqli_insert_id($con);

	$query = "INSERT INTO teacher_course_info (t_id,c_id)
			  VALUES ('$t_id','$s1')";
  	$res = mysqli_query($con,$query) or die(mysqli_error($con));

	header('location:manage_teacher.php');

?>