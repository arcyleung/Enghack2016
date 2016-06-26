<?php

function search($search,$link){
	strtolower($search);
	if($search==""){
		echo "error: no searching content";
		return;
	}
	if (preg_match('[\']', $search)){
		echo "error: illeagal character";
		return;
	}
	$query = "SELECT DISTINCT employername FROM employerdata 
    WHERE employername LIKE '%".$search."%'";
	$result = mysqli_query($link, $query);

	if (!$result) {
	    $message  = 'Invalid query: ' . mysqli_error() . "\n";
	    $message .= 'Whole query: ' . $query;
	    die($message);	
	}

	while($row = mysqli_fetch_assoc($result)){
		echo '<a href="CompanyInfo.php?comName='.$row['employername'].'">'.$row['employername'].'</a><br>';
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

function addReview($userid,$employername,$review,$rating, $link){
	
	if(is_null($review)){
		echo "no review made";
	}

	$query = "SELECT * FROM userposts 
    WHERE employername ='".$employername."' AND userid='".$userid."'";
    // echo $query;
	$check = mysqli_query($link,$query);
	$row = mysqli_fetch_assoc($check);

	//echo mysqli_num_rows($check);
	if(mysqli_num_rows($check)!=0){
		echo "review already made";
		exit;
	}

	$query1 = "INSERT INTO userposts (userid,employername,postdata,rating, reviewdate) values ('".$usrid."','".$employername."','".$review."',".$rating.", CURDATE())";
	$result = mysqli_query($link,$query1);
	// echo $query1;
	if($result){
		// echo "review made successfully";
		return 1;
	}else{
		// echo "review failed:".mysqli_error();
		return 2;
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

function showCompanyLoc($employername, $link){
	$query ="SELECT DISTINCT employername,location FROM employerdata WHERE employername='".$employername."'";
	$result = mysqli_query($link, $query);
	if (!$result) {
	    $message  = 'Invalid query: ' . mysqli_error() . "\n";
	    $message .= 'Whole query: ' . $query;
	    die($message);	
	}
	
	while($row = mysqli_fetch_assoc($result)){
		echo $row['location'];
	}
	mysqli_free_result($result);
}

function showReview($employername, $link){
	$query ="SELECT * FROM userposts WHERE employername='".$employername."'";
	$result = mysqli_query($link,$query);
	if(!$result){
		echo "review cannot be displayed";
	}

	while($row = mysqli_fetch_assoc($result)){
		echo "<p class='user_review'>";
		echo '<h4>'.$row['userid']." ";
		// echo "user rating : ".$row['rating'].'</h4><br>';
		for ($i = 0; $i < floor($row['rating']); $i++){
			echo '<img src="images/goose.png" height="30" width="30">';
		}
		for ($i = 0; $i < 10-floor($row['rating']); $i++){
			echo '<img src="images/goose_w.png" height="30" width="30">';
		}
		echo '</br>';
		echo $row['postdata'].'<br>';
		echo "</p>";
	}

	mysqli_free_result($result);
}

function makeRequest($employername){
	$url = 'http://api.glassdoor.com/api/api.htm';
	$data = array('t.p' => '74594', 't.k' => 'h2Ds5BrD9Eq', 'useragent'=> 'chrome', 'userip'=>'129.97.124.198', 'format'=>'json', 'v'=>'1', 'action'=>'employers', 'q'=>$employername );

// use key 'http' even if you send the request to https://...
	$options = array(
    	'http' => array(
        	'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        	'method'  => 'POST',
        	'content' => http_build_query($data)
    	)
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	if ($result === FALSE) { return array('website','logo' ); }
	 
	$json = json_decode($result);
	// echo $json->response->employers[0]->website
	return array(
		'website' => $json->response->employers[0]->website,
		'logo' => $json->response->employers[0]->squareLogo
	);
}

function getAvgRatingByEmployer($emp, $link){
	$sum = 0;
	$counts = 0;
	$link = mysqli_connect("localhost", "root", "root", "uwglass");
	if (!$link) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$result = mysqli_query($link, sprintf("SELECT rating FROM userposts WHERE employername LIKE '%s'", $emp));

	while ($row = mysqli_fetch_assoc($result)) {

		$sum = $sum + $row['rating'];
		$counts = $counts + 1;

	}
	mysqli_free_result($result);

	mysqli_close($link);
	if ($counts != 0){

		return number_format($sum/$counts, 1, '.', '');;
	} else {
		return 0;
	}
}
// echo getAvgRatingByEmployer('University of Waterloo');


?> 