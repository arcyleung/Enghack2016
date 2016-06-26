<?php include 'loginLibrary/dologin.php';?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style/style_main.css">
		<link rel="stylesheet" type="text/css" href="loginLibrary/login_style.css">
     	<script type="text/javascript" src="loginLibrary/jquery.js"></script>
     	<script type="text/javascript" src="loginLibrary/login_effect.js"></script>
	</head>

	<body>	

	<ul>
  		<li><a href="">You are not logged in Yet</a></li>
  		<li><a href="">Register</a></li>
	</ul>


	<div class="centering">
		<h1>UWGlass</h1>

		<input type="button" id="show_login" value="Login">

		<div id = "loginform">
		<input type = "image" id = "close_login" src = "images/close.png">
            <form method = "post" action = "">
                <input type = "text" 	 id = "login" 	 placeholder = "Email Id" name = "uid" 	 value = "">
                <input type = "password" id = "password" placeholder = "Password" name = "upass" value = "">
                <input type = "submit" 	 id = "dologin"  value = "Login" name="submit">
            </form>
    </div>

        <br><br>
        <input type="text" name="search" placeholder="Search..">
	</div>
	</body>
</html>
