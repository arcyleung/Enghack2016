<?php
function search($search,$link){
	strtolower($search);
	$query = "SELECT DISTINCT employername FROM employerdata 
    WHERE employername LIKE '%".$search."%'";
	$result = mysqli_query($link, $query);

	if (!$result) {
	    $message  = 'Invalid query: ' . mysqli_error() . "\n";
	    $message .= 'Whole query: ' . $query;
	    die($message);	
	}

	while($row = mysqli_fetch_assoc($result)){
		echo $row['employername'].'<br>';
	}

	mysqli_free_result($result);
}

function register($usrname, $password, $id, $link){
	if(!strlen($id)==8){
		echo "id wrong digits";
	}

	$check = mysqli_query($link, "SELECT * FROM userinfo WHERE userid='".$id."' OR email='".$userid."'");
	if($check){
		echo "userid or email already registered";
	}

	$result = mysqli_query($link,"INSERT INTO userinfo (userid,email,password) values ('".$id."','".$usrname."','".$password."')");
	if($result){
		echo "register successfully";
	}else{
		echo "error: cannot register";
	}
}

function review($userid,$employername,$review,$rating, $link){
	
	if(is_null($review)){
		echo "no review made";
	}

	$query = "SELECT * FROM userposts 
    WHERE employername='".$employername."' AND userid='".$userid."'";
	$check = mysqli_query($link,$query);
	if($check){
		echo "review already made";
		return;
	}

	$result = mysqli_query($link,"INSERT INTO userposts (userid,employername,postdata,rating) values ('".$usrid."','".$employername."','".$review."',".$rating.")");

	if($result){
		echo "review made successfully";
	}else{
		echo "review failed:".mysqli_error();
	}
}

function deleteReview($usrname, $employername, $link){

	$result = mysqli_query($link,"DELETE FROM userposts WHERE username='".$usrname."' AND employername='".$employername."'");
    if($result){
    	echo "delete successfully";
    }else{
    	echo "delete failed";
    }
}

function setSession(){

}

function showCompany($employername, $link){
	$query ="SELECT DISTINCT * FROM employerdata WHERE employername='".$employername."'";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);
	echo $employername."  ".$row['location'];
	mysqli_free_result($result);
}

function showReview($employername, $link){
	$query ="SELECT * FROM userposts WHERE employername='".$employername."'";
	$result = mysqli_query($link,$query);
	if(!$result){
		echo "review cannot be displayed";
	}
	while($row = mysqli_fetch_assoc($result)){
		echo "<p>";
		echo $row['username'.' '];
		echo $row['rating'].'<br>';
		echo $row['postdata'].'<br>';
		echo "</p>";
	}

	mysqli_free_result($result);

}

?> 