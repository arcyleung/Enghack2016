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
		<input type="text" name="search" placeholder="Search..">

	</body>	

</html>