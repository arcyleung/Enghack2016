<?php 
$servername = "localhost";
$username = "root";
$password = "root";
$database_name = "uwglass";
// Create connection


// // Check connection
function getAvgRatingByEmployer($emp){
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
		return $sum/$counts;
	} else {
		return 0;
	}
}
echo getAvgRatingByEmployer('University of Waterloo');
?>