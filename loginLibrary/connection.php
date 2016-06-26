<?php 
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$database_name = "uwglass";

	// Create connection
	$link = mysqli_connect($servername, $username, $password, $database_name);

	if (!$link) {
	    die('Could not connect: ' . mysqli_error());
	}else{
		
		//echo 'Connected successfully';
	}


	// $id = "lc6chan@uwaterloo.ca";
 // 	$pass = "123456";

	// $dologin = 'SELECT email, password from userinfo where email = "'.$id.'"and password = "'.$pass.'"';
 // 	echo $dologin;

	// $result = mysqli_query($link, $dologin);

	// if($result){
	// 	header("Location: userSearch.php");
	// 	echo "find!!";  
	// 	exit;
	// }
	// else{echo "Wrong Id Or Password";}

	// $row = mysqli_fetch_assoc($result);
	// echo $result;

?>
