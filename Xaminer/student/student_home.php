<?php
	require '../includes/common.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Home Page</title>
	<?php
		require '../includes/links.php';
		include '../feedback.php';
	?>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<?php
		include 'student_header.php';
	?>

	<div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <a href="ongoing_exams.php"><i class="fas fa-thumbtack fa-xs"></i> Ongoing Exams</a>
	  <a href="results.php"><i class="fas fa-thumbtack fa-xs"></i> Results</a>
	  <a href="faq.php"><i class="fas fa-thumbtack fa-xs"></i> FAQ</a>
	  <a href="" data-toggle="modal" data-target="#feedbackModal"><i class="fas fa-thumbtack fa-xs"></i> Send Feedback</a>
	  <a href="student_query.php"><i class="fas fa-thumbtack fa-xs"></i> Ask a Query</a>

	</div>

	<div id="main">
		<span style="font-size:30px;cursor:pointer;margin-top:0;" onclick="openNav()">&#9776; <span style="font-size:16px; color:red">Please click here to see your exam details.</span> </span>
	</div>
	<?php
	  	echo"<h2 style='text-align:center; margin-left:10px;'>Welcome, ".$_SESSION['name']."!</h2>";
	?>
	<p class="paras">These are your recent results</p>

	<?php
		$id = $_SESSION['id'];
		$select_query = "SELECT * FROM student_results sr WHERE s_id= '$id' ORDER BY date desc";
		$res = mysqli_query($con,$select_query) or die(mysqli_error($con));
		$total = mysqli_num_rows($res);

		if($total == 0){
			echo"<br><h3 class='text-center'><span style='color:red;'> No results to show, you have not given any tests yet! </span></h3>";
		}
		else{
			$counter = 1;
			echo"<div class='container-fluid'>
				   		<div class='row'>
				   			<div class='col-sm-8 offset-sm-2 text-center'>
				   				<table class='table table-light'>
								  <thead class='thead-dark'>
								    <tr>
								      <th scope='col'>S.No.</th>
								      <th scope='col'>Exam Name</th>
								      <th scope='col'>Subject Name</th>
								      <th scope='col'>Subject Code</th>
								      <th scope='col'>Marks</th>
								    </tr>
								  </thead>";
			while($row = mysqli_fetch_array($res) and $counter <= 5){
				echo"
								  <tbody>
								    <tr class='table-warning'>
								      <th scope='row'>".$counter."</th>
								      <td>".$row['exam_name']."</td>
								      <td>".$row['subject_name']."</td>
								      <td>".$row['subject_code']."</td>
								      <td>".$row['marks']."/".$row['total_marks']."</td>
								    </tr>
								    ";
				$counter++;
								  
			}
			echo "	
									</tbody>
								</table>
								<h4 class = 'text-center' style='margin-top:40px;color:green;'>Visit the Results section to view complete results.</h4>
					   		</div>
				   		</div>	
				   	</div>";
		}
	?>

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

	<?php
	    include '../includes/footer.php';
	?>
</body>
</html>