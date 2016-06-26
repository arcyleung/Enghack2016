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
  			<?php
  			  	session_start();
          		if(isset($_SESSION['login']) && $_SESSION['login']==1){
           			echo '<li><a href="userSearch.php">Hi!'.$_SESSION['login_user'].'</a></li>';
           			echo '<li style="float:right"><a href="main.php">logout</a></li>';
          		}else{
          			echo '<li><a>You are not logged in Yet</a></li>';
          			echo '<li style="float:right"><a href="main.php">Main</a></li>';
          		}
  			?>
		</ul>

		<br><br>
		<div class="centering">
			<h2><?php $request = makeRequest($CompName);
			echo "<img src='".$request['logo']."'style='width:100px;height:100px;'>"; 
			if($request['website']){
				echo "<a href='http://".$request['website']."'>".$CompName."</a>";
			}else{
				echo $CompName;
			} 
			?>  </h2>

			<h3>Average Rating :<?php echo getAvgRatingByEmployer($CompName, $link)?></h3>

			<h3>Basic Information</h3>
			Location : <?php showCompanyLoc($CompName, $link)?><br>

			<h3>COOP Experience Review:</h3>
			<?php showReview($CompName, $link)?>

		</div>

<a href='https://www.glassdoor.com/index.htm'>powered by <img src='https://www.glassdoor.com/static/img/api/glassdoor_logo_80.png' title='Job Search' /></a>
	</body>	
</html>