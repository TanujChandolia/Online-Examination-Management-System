<?php
	require '../includes/common.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Grading Stdudent Exams</title>
	<?php
		include '../includes/links.php';
		include '../feedback.php';
	?>

	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<?php
		include 'teacher_header.php';
	?>

	<div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <a href="exam_create.php"><i class="fas fa-thumbtack fa-xs"></i> Create a Question Paper</a>
	  <a href="modify_questionpaper.php"><i class="fas fa-thumbtack fa-xs"></i> Modify existing Question Papers</a>
	  <a href="teacher_home.php"><i class="fas fa-thumbtack fa-xs"></i> Back to Home Page</a>
	  <a href="faq.php"><i class="fas fa-thumbtack fa-xs"></i> FAQ</a>
	  <a href="teacher_query.php"><i class="fas fa-thumbtack fa-xs"></i> Ask a Query</a>
	  <a href="" data-toggle="modal" data-target="#feedbackModal"><i class="fas fa-thumbtack fa-xs"></i> Send Feedback</a>
	</div>

	<div id="main">
		<span style="font-size:30px;cursor:pointer;margin-top:0;" onclick="openNav()">&#9776; </span>
	</div>

	<?php
		echo"<h2 style='text-align:center; margin-left:10px;'>These are your current unchecked papers:</h2><br>";
		if(isset($_GET['m1'])){
			echo"<p class='text-center' style='color:green'>".$_GET['m1']."</p>";
		}
		$id = $_SESSION['id'];
		$query = "  SELECT count(DISTINCT(s_id)) FROM answer_db a
					INNER JOIN exam_db e
					ON a.exam_id = e.id
					INNER JOIN course c
					ON e.c_id = c.id
					INNER JOIN teacher_course_info t
					ON t.c_id = c.id
					WHERE t.t_id = '$id'";
		$res = mysqli_query($con,$query) or die(mysqli_error($con));
		$row = mysqli_fetch_array($res);

		$total = $row['count(DISTINCT(s_id))'];

		$counter = 1;
			  	echo"<div class='container-fluid'>
				   		<div class='row'>
				   			<div class='col-sm-8 offset-sm-2 text-center'>
				   				<table class='table table-light text-center'>
								  <thead class='thead-dark'>
								    <tr>
								      <th scope='col'>S.No.</th>
								      <th scope='col'>Student Name</th>
								      <th scope='col'>Test Name</th>
								      <th scope='col'>Action</th>
								    </tr>
								  </thead>
								  <tbody>";

		$query = "  SELECT distinct(s_id),name,exam_name,exam_id FROM answer_db a
						INNER JOIN exam_db e
						ON a.exam_id = e.id
						INNER JOIN course c
						ON e.c_id = c.id
						INNER JOIN teacher_course_info t
						ON t.c_id = c.id
						INNER JOIN student_acc s
						ON s.id = a.s_id
						WHERE t.t_id ='$id' ";
		$res = mysqli_query($con,$query) or die(mysqli_error($con));

		while($counter <= $total){
			
			$row = mysqli_fetch_array($res);
			echo "
								    <tr class='table-info'>
								      <th scope='row'>".$counter."</th>
								      <td>".$row['name']."</td>
								      <td>".$row['exam_name']."</td>
								      <td><a href='checkpaper.php?s_id=".$row['s_id']."&exam_id=".$row['exam_id']."' class='btn btn-warning btn-lg'>Grade</a></td>
								    </tr>";
			$counter++;
		}

		echo "         </tbody>
					</table>
				</div>
			</div>
		</div>";
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
	<br>
	<br>
	<br>
	<?php
		include '../includes/footer.php';
	?>
</body>
</html>