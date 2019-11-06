<?php
	$servername = "localhost";
	$username = "homestead";
	$password = "secret";
	$dbname = "PSAFE";
	$connection = new MySQLi($servername, $username, $password, $dbname);
	if(!$connection){
		die("Failed to connect to database");
	}
	$lds = mysqli_query($connection, "SELECT * FROM `Learning Domains`;");
	if(mysqli_num_rows($lds)>0){
		while($ld = $lds->fetch_assoc()){
			echo "<h2><strong>Learning domain:</srtong> " . $ld["Name"] . "(" . $ld["Abbreviations"] . ")</h2>";
			$survey = mysqli_query($connection, "SELECT * FROM Question WHERE Domain_ID = " . $ld["Domain_ID"] . ";");
			if(mysqli_num_rows($survey)>0){
				while($question = $survey->fetch_assoc()){
					echo("<p>" . $question["Question"] . " <a href='delete.php?qID=" . $question["Question_ID"] . "'><button class='btn btn-danger'>x</button></a>");
				}
			}
			echo "<br>";
		}
	}
?>