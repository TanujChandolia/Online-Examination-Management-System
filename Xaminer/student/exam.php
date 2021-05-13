<?php
	require '../includes/common.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Exam Page</title>
	<?php
		require '../includes/links.php';
	?>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		    <div class="container">
		        
		            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		            <a class="navbar-brand" style="font-size:24px">
		            	<img src="../img/navlogocrop.jpeg" width="140px" alt="Xaminer">
		            </a>
		        
		        
		        <div class="collapse navbar-collapse" id="myNavbar">
		            <div class="navbar-nav ml-auto" id="timer">

		            </div>
		        </div>
		    </div>
		</nav>
	</header>

	<div class="container" id="exam-content">
		<h1 class="text-center">Exam</h1>
		
		
		<?php
			$exam_id = $_GET['exam_id'];
			$query = "SELECT * FROM exam_db WHERE id = '$exam_id'";
			$res = mysqli_query($con,$query) or die(mysqli_error($con));
			$row = mysqli_fetch_array($res);

			$time = explode(':',$row['alloted_time']);# get hour, minutes, seconds to be elapsed
			$time = $time[2] + $time[1] * 60 + $time[0] * 3600;

		?>


		<script type="text/javascript">
		    (function(endTime){
			    endTime*=1000; // javascript works with milliseconds
			    endTime+=new Date().getTime();// add the current system time into the equation
			    // your timeSync function

			    (function timerSync() {
			        var diff = new Date(endTime - new Date().getTime());
			        var timer=document.getElementById('timer');
			        if(diff<=0)return timerEnd(timer);
			        timer.innerHTML = 
			            doubleDigits(diff.getUTCHours())
			            + ':' +
			            doubleDigits(diff.getUTCMinutes())
			            + ':' +
			            doubleDigits(diff.getUTCSeconds())
			        ;
			        setTimeout(timerSync,1000);
			    })();// also call it to start the timer
			    // your timer end function
			    function timerEnd(timer) {
			        alert('Time has finished. Your answers will be submitted. You will be redirected to Home.');
			        var val = "<?php echo $exam_id ?>";
			        var s1 = "add_answers.php?exam_id=";
			        var url = s1.concat(val);
			        window.location.replace(url);
			    }
			    // double digit formatting
			    function doubleDigits(number) {
			        return number<10
			            ? '0'+number
			            : number
			        ;
			    } 
			})(
			    <?php 
			    	echo $time;
			    ?>
			);

		</script>

		<?php
			$counter = 1;
			$query = "SELECT * FROM questions_db WHERE exam_id = '$exam_id'";
			$res = mysqli_query($con,$query) or die(mysqli_error($con));

			echo"<div id='exam-page'>
					<form method='post' action='add_answers.php?exam_id=".$exam_id."'>";

			while($row = mysqli_fetch_array($res)){
				echo"<h2>Q$counter. ".$row['question']."</h2><br>";

				if($row['type'] == 'mcq'){
					echo"<div class='form-check'>
						 <input class='form-check-input' type='radio' name='answer$counter' value='".$row['option1']."' checked>	
						 <label class='form-check-label' for='answer$counter'>
						 	".$row['option1']."
						 </div>

						 <div class='form-check'>
						 <input class='form-check-input' type='radio' name='answer$counter' value='".$row['option2']."' checked>	
						 <label class='form-check-label' for='answer$counter'>
						 	".$row['option2']."
						 </div>
						 
						 <div class='form-check'>
						 <input class='form-check-input' type='radio' name='answer$counter' value='".$row['option3']."' checked>	
						 <label class='form-check-label' for='answer$counter'>
						 	".$row['option3']."
						 </div>

						 <div class='form-check'>
						 <input class='form-check-input' type='radio' name='answer$counter' value='".$row['option4']."' checked>	
						 <label class='form-check-label' for='answer$counter'>
						 	".$row['option4']."
						 </div>
						 <hr>";
				}
				else{
					echo"<div class='form-group'>
							<textarea class='form-control' name='answer$counter' rows='6' placeholder='Enter your answer here'></textarea>
						</div>	<hr>";
				}

				$counter++;
			}

			echo"		<button class='btn btn-success btn-lg btn-block'> Submit your answers</button>
					</form>
				</div>";
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