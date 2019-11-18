<?php
	$servername = "localhost";
	$username = "homestead";
	$password = "secret";
	$dbname = "PSAFE";
	$connection = new MySQLi($servername, $username, $password, $dbname);
	if(!$connection){
		die("Failed to connect to database");
	}
	if(!empty($_GET['qID'])){
		$delete = mysqli_query($connection, "DELETE FROM Question WHERE Question_ID = " . $_GET['qID']);
		header("Location: ./?page=survey", true, 303);
	}
?>