<?php
	if(!empty($_GET['did'])){
		$did = $_GET['did'];
		
			$servername = "localhost";
			$username = "homestead";
			$password = "secret";
			$dbname = "PSAFE";
			$connection = new MySQLi($servername, $username, $password, $dbname);
			if(!$connection){
				die("Failed to connect to database");
			}	
			$questions = mysqli_query($connection, "SELECT * FROM `Question` WHERE Domain_ID = $did;");
			if(mysqli_num_rows($questions)>0){
				while($question=$questions->fetch_assoc()){
					echo "<h3>" . $question["Text"] . "</h3><br>";
					$responses = mysqli_query($connection, "SELECT * FROM `Response` WHERE Question_ID = " . $question['Question_ID']);
					if(mysqli_num_rows($responses)>0){
						$i = 1;
						echo "<table>";
						while($response=$responses->fetch_assoc()){
							echo "<tr>";
							echo "<td>Class $i</td>";
							echo "<td>" . $response['STR'] ."</td>";
							echo "<td>" . $response['SAT'] ."</td>";
							echo "<td>" . $response['NG'] ."</td>";
							echo "<td>" . $response['UNSAT'] ."</td>";
							echo "<td>" . $response['NA'] ."</td>";
							echo "</tr>";
							$i++;
						}
						echo "</table><br>";
					} else {
						echo "<p>No responses recorded for this question.</p>";
					}
				}
			} else {
				echo "<h3>No questions associated with this ID.</h3>";
			}
	} else {
		echo "No domain selected.";
	}
?>