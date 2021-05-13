<?php
	require 'includes/common.php';
	if(isset($_SESSION['id'])){
		if($_SESSION['designation'] == 'student')
			header('location:student/student_home.php');
		if($_SESSION['designation'] == 'teacher')
			header('location:teacher/teacher_home.php');
		if($_SESSION['designation'] == 'admin')
			header('location:admin/admin_home.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Xaminer Home Page</title>
	<?php
		require 'includes/links.php';
	?>
	<link rel="stylesheet" href="css/style.css">
</head>
<body class="banner-image">

		<?php
	        include 'includes/header.php';
	    ?>
	    <br>
	    <div class="container">
	        <div class="banner-content">
	            <h1>Welcome to your Online Exam Handler</h1>
	            <br>
	            <a href="login.php" class="btn btn-success">Manage Your Exams</a>
	        </div>
	    </div>
	    
	    <?php
	        include 'includes/footer.php';
	    ?>
	
</body>
</html>