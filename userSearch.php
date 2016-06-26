<?php 
	include 'loginLibrary/connection.php';
	include 'functions.php';
?>

<!DOCTYPE html>
<html>

	<head>
		<link rel="stylesheet" type="text/css" href="style/style_main.css">
	</head>

	<body>
		<ul>
  			<li><a href="">Hi! <?php
  			session_start();
  			echo $_SESSION['login_user']
  			?></li>
  			<li style="float:right"><a href="main.php">logout</a></li>
		</ul>
		<br><br>
		<form method = "post" action = "">
       		<input type = "text" 	id = "searchBar" name="search" 	placeholder="Search..">
       		<br><br>
        	<input type = "submit" 	id = "dosearch"  value = "search" >
        	<br>
        	<?php
        		 if(isset($_POST['search'])){
        		  search($_POST['search'],$link);
        	   }
        	?>
        </form>

	</body>	
</html>