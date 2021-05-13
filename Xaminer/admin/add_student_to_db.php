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
	$s2 = $_POST['s2'];
	$s3 = $_POST['s3'];
	$s4 = $_POST['s4'];

	$query = "INSERT INTO student_acc (name,username,password,email,dob,phone)
			  VALUES ('$name','$username','$password','$email','$dob','$phone')";
	$res = mysqli_query($con,$query) or die(mysqli_error($con));

	$s_id = mysqli_insert_id($con);
	$query = "INSERT INTO student_course_info (s_id,c_id)
			  VALUES ('$s_id','$s1')";
  	$res = mysqli_query($con,$query) or die(mysqli_error($con));

  	$query = "INSERT INTO student_course_info (s_id,c_id)
			  VALUES ('$s_id','$s2')";
  	$res = mysqli_query($con,$query) or die(mysqli_error($con));

  	$query = "INSERT INTO student_course_info (s_id,c_id)
			  VALUES ('$s_id','$s3')";
  	$res = mysqli_query($con,$query) or die(mysqli_error($con));

  	$query = "INSERT INTO student_course_info (s_id,c_id)
			  VALUES ('$s_id','$s4')";
  	$res = mysqli_query($con,$query) or die(mysqli_error($con));


	header('location:manage_student.php');

?>