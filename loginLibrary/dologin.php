<?php
	include 'connection.php';
	$id = $_POST['uid'];
 	$pass = $_POST['upass'];

 	$dologin = "SELECT email, password from userinfo where email = '".$id."'and password = '".$pass."'";
 	//echo $dologin;

	$result = mysqli_query($link, $dologin);

	// echo mysqli_num_rows($result);

 	if(mysqli_num_rows($result)==1){
 		session_start(); // Starting Session
 		$_SESSION['login_user'] = $id; // Initializing Session
 		// echo $_SESSION['login_user']."test";
		header("Location: userSearch.php");

		exit;
	}
	else{
		// echo "Wrong Id Or Password";
		//need to add a msg to tell 
	}
 
?>
