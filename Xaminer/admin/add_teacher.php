<?php
	require '../includes/common.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Teacher to Database</title>
	<?php
		include '../includes/links.php';
		include '../feedback.php';
	?>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<?php
		include 'admin_header.php';
	?>

	<div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <a href="manage_student.php"><i class="fas fa-thumbtack fa-xs"></i> Manage Student Records</a>
	  <a href="manage_teacher.php"><i class="fas fa-thumbtack fa-xs"></i> Manage Teacher Records</a>
	  <a href="#"><i class="fas fa-thumbtack fa-xs"></i> Answer Queries</a>
	  <a href="faq.php"><i class="fas fa-thumbtack fa-xs"></i> FAQ</a>
	  <a href="" data-toggle="modal" data-target="#feedbackModal"><i class="fas fa-thumbtack fa-xs"></i> Send Feedback</a>
	  

	</div>

	<div id="main">
		<span style="font-size:30px;cursor:pointer;margin-top:0;" onclick="openNav()">&#9776;</span>
	</div>

	<div class="container">
		<div class="jumbotron">
			<h2 class="text-center">Enter the Teacher Details and add to Database.</h2>
		</div>
		<form method="post" action="add_teacher_to_db.php">
			<h3>Teacher Details:</h3>
			<div style="border: 1px solid black; border-radius: 5px; padding:10px; margin-bottom: 10px;">
			  <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="firstname">First Name: </label>
				      <input type="text" name="firstname" class="form-control" id="firstname" required="true">
				    </div>
				    <div class="form-group col-md-6">
				      <label for="lastname">Last Name: </label>
				      <input type="text" name="lastname" class="form-control" id="lastname" required="true">
				    </div>
			  </div>
			  <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="email">Email: </label>
				      <input type="email" name="email" class="form-control" id="email" placeholder="Ex - abc@xyz.com" required="true">
				    </div>
				    <div class="form-group col-md-6">
				      <label for="password">Password: </label>
				      <input type="text" name="password" class="form-control" id="password" required="true">
				    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputAddress">Address</label>
			    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
			  </div>

			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="dob">Date of Birth: </label>
			      <input type="date" name="dob" class="form-control" id="dob" required="true">
			    </div>
			    <div class="form-group col-md-6">
			      <label for="phone">Phone Number: </label>
			      <input type="number" name="phone" id="phone" class="form-control" required="true">
			    </div>
			  </div>
		  	</div>
		  	<h3>Subject to be taught: </h3>
		  	<div style="border: 1px solid black; border-radius: 5px; padding:10px">
			  <div class="form-row">
			    <div class="form-group col-md-12">
			    	<label>Choose Subject: </label>
			    	<?php
			    		echo"<select name='s1' class='custom-select custom-select-lg mb-3'>";
			    		$query = "SELECT * FROM course";
			    		$res = mysqli_query($con,$query) or die(msyqli_error($con));
			    		while($row = mysqli_fetch_array($res)){
			    			echo"<option value='".$row['id']."'>".$row['subject_name']."</option>";
			    		}
			    		echo"</select>";
			    	?>
				    
			    </div>
			  </div>
			</div>
			<br>
			<button class="btn btn-warning btn-lg btn-block" type="submit">Add Teacher</button>
		</form>

	</div>

	<script>
	function openNav() {
	  document.getElementById("mySidenav").style.width = "300px";
	  document.getElementById("main").style.marginLeft = "300px";
	}

	function closeNav() {
	  document.getElementById("mySidenav").style.width = "0";
	  document.getElementById("main").style.marginLeft= "0";
	}
	</script>
	<br>
	<br>
	<br>
	<?php
	    include '../includes/footer.php';
	?>
</body>
</html>