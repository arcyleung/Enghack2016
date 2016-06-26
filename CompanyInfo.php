<?php
	include 'loginLibrary/connection.php';
	include 'functions.php';
	$CompName = $_GET['comName'];
?>
<!DOCTYPE html>
<html>

	<head>
		<link rel="stylesheet" type="text/css" href="style/style_main.css">
	</head>

	<body>
		<ul>
  			<li><a>
  			<?php
  			  	session_start();
          		if(isset($_SESSION['login']) && $_SESSION['login']==1){
           			echo 'Hi!'.$_SESSION['login_user'];
          		}else{
          			echo 'You are not logged in Yet';
          		}
  			?>
  			</a>
  			</li>
  			<li style="float:right"><a href="main.php">logout</a></li>
		</ul>

		<br><br>
		<div class="centering">
			<h2><?php echo $CompName?></h2>

			<h3>Average Rating :<?php echo getAvgRatingByEmployer($CompName, $link)?></h3>

			<h3>Basic Information</h3>
			Location : <?php showCompanyLoc($CompName, $link)?><br>

			<h3>COOP Experience Review:</h3>
			<?php showReview($CompName, $link)?>

		</div>


	</body>	
</html>