<?php
	require '../includes/common.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Answer Query Page</title>
	<?php
		require '../includes/links.php';
	?>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<?php
		include 'admin_header.php';
	?>
	<br>
	<div class="container">
		<div class="jumbotron">
			<h1 class="text-center">Answer queries, from students and teachers, here.</h1>
		</div>
		<br>
		<h2 class="text-center mb-3">Unattended Queries: </h2>
		<?php
			$q = "SELECT * FROM admin_query";
			$r = mysqli_query($con,$q) or die(mysqli_error($con));
			while($row = mysqli_fetch_array($r)){
				$desig = ucfirst($row['designation']);
				if($desig == 'Student'){
					echo"<div class='row mb-3' id='queryrow'>
						<div class='card' style='width:95%''>
							<div class='card-body'>
								<h3 class='card-title'>".$desig." Query: </h3>
								<p class='card-text'>".$row['query']."</p>
								<div class='queryanswer'>
									<form action='add_reply.php?s_id=".$row['s_id']."&query=".$row['query']."' method='post'>
										<div class='form-group'>
											<label for='reply'>Reply to the Query: </label>
											<textarea class='form-control' id='reply' name='reply' rows='6'></textarea>

										</div>
										<button class='btn btn-lg btn-info'>Reply</button>
									</form>
								</div>
							</div>
						</div>
					</div>";
				}
				if($desig == 'Teacher'){
					echo"<div class='row mb-3' id='queryrow'>
						<div class='card' style='width:95%''>
							<div class='card-body'>
								<h3 class='card-title'>".$desig." Query: </h3>
								<p class='card-text'>".$row['query']."</p>
								<div class='queryanswer'>
									<form action='add_reply.php?t_id=".$row['t_id']."&query=".$row['query']."' method='post'>
										<div class='form-group'>
											<label for='reply'>Reply to the Query: </label>
											<textarea class='form-control' id='reply' name='reply' rows='6'></textarea>

										</div>
										<button class='btn btn-lg btn-info'>Reply</button>
									</form>
								</div>
							</div>
						</div>
					</div>";
				}
				
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