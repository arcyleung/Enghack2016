<?php
	include 'loginLibrary/connection.php';
	include 'functions.php';
	$CompName = $_GET['comName'];
	echo $CompName;

	show_company($CompName, $link);
	showReview($CompName, $link);

?>