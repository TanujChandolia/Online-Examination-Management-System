<?php
	require '../includes/common.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Query Page</title>
	<?php
		require '../includes/links.php';
	?>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<?php
		include 'student_header.php';
	?>
	<br>
	<div class="container">
		<div class="jumbotron">
			<h1 class="text-center">Ask a new Query</h1>
			<form action="add_query_to_db.php" method="post">
				<div class="form-group">
				    <label for="query">Enter your Query: </label>
				    <textarea class="form-control" name="query" id="query" rows="5"></textarea>
			    </div>
			    <button class="btn btn-info btn-lg">Send query to the admin</button>
			</form>
		</div>

		<h2 style="margin-bottom: 20px">Your Queries: </h2>
		<?php
			$s_id = $_SESSION['id'];
			$query = "SELECT * FROM student_query WHERE s_id = '$s_id'";
			$r = mysqli_query($con,$query) or die(mysqli_error($con));
			$total = mysqli_num_rows($r);
			$counter = 1;
			$rows = $total % 3;

			while($counter <= $rows){
				echo"<div class='row' id='queryrow'>";
				while($row = mysqli_fetch_array($r)){
					echo"<div class='card' style='width:30%''>
							<div class='card-body'>
								<h3 class='card-title'>Query: </h3>
								<p class='card-text'>".$row['query']."</p>
								<div class='queryanswer'>
									<h3 class='card-title'>Answer: </h3>";
					
					if($row['answer'] == ""){
						echo"*No answers yet. Wait for a few minutes for admin to answer.*";
					}	

					else{
						echo"<p class='card-text'>".$row['answer']."</p>";
					}
					echo      "</div>	
							</div>
						</div>";
				}
				echo"</div>";
				$counter++;
			}

		?>
	</div>
	<br>
	<br>
	<br>
	<?php
		include '../includes/footer.php';
	?>
</body>
</html>