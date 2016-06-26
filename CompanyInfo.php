<?php
	include 'loginLibrary/connection.php';
	include 'functions.php';
	session_start();
	if(isset($_GET['comName'])){
		$CompName = $_GET['comName'];
	}else{
		$CompName = $_SESSION['comName'];
	}
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
           			echo '<li><a href="userSearch.php">Hi!  '.$_SESSION['login_user'].'</a></li>';
           			echo '<li style="float:right"><a href="main.php">logout</a></li>';
          		}else{
          			echo '<li><a>You are not logged in yet</a></li>';
          			echo '<li style="float:right"><a href="main.php">Main</a></li>';
          		}
  			?>
		</ul>
		<div class="centering">
			<h2><?php $request = makeRequest($CompName);
			if($request['logo']){
				echo "<img src='".$request['logo']."'style='width:100px;height:100px;'>"; 
			}else{
				echo "<img src='/Enghack2016/images/goose.png'style='width:100px;height:100px;'>"; 
			}
			if($request['website']){
				echo "<a class = 'compname' href='http://".$request['website']."'>".$CompName."</a>";
			}else{
				echo $CompName;
			} 
			?>  </h2>

			<h3>Average Rating :<?php echo getAvgRatingByEmployer($CompName, $link)?></h3>

			<h3>Basic Information</h3>
			Location : <?php showCompanyLoc($CompName, $link)?><br>

			<?php
  			  	session_start();
  			  	
          		if(isset($_SESSION['login']) && $_SESSION['login']==1){
           			echo '<br>
           				  <a class="centering" href="companyReview.php?comName='.$CompName.'">
      					  <input type = "submit"  id = "newReview"  value = "Click me to post a new review !">
      					  </a>';
          		}
          		
  			?>

			<h3>COOP Experience Review:</h3>
			<?php showReview($CompName, $link)?>

		</div>

<a class='gdlogo' href='https://www.glassdoor.com/index.htm'>
powered by <img class='gdlogo' src='https://www.glassdoor.com/static/img/api/glassdoor_logo_80.png' title='Job Search' /></a>
	</body>	
</html>