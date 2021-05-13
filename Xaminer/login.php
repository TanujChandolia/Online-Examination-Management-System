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
	<title>Login Page</title>
	<?php
		require 'includes/links.php';
	?>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
 	<?php
        include 'includes/header.php';
    ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-xs-offset-2 col-xs-8">
                <div class="card" style="width:100%;">
                	<img src="img/login.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h1 class="card-title text-center" style="font-weight: bold">LOGIN</h1>
                        <form method="POST" action="login_script.php">
                            <div class="form-group">
                                <label for="email">Username: </label>
                                <input type="email" name="email" placeholder="Email" required="true" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Password: </label>
                                <input type="password" name="password" placeholder="Password" required="true" class="form-control">
                            </div>

                            <?php
                            	if(isset($_GET['m1'])){
                            		echo $_GET['m1'];
                            	}
                            ?>
                            <button type="submit" class="btn btn-success btn-block" style="padding:10px;font-size:26px">Submit</button>
                        </form>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
    
    <?php
        include 'includes/footer.php';
    ?>
</body>
</html>