<div class="dropdown">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    Dropdown button
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Link 1</a>
    <a class="dropdown-item" href="#">Link 2</a>
    <a class="dropdown-item" href="#">Link 3</a>
  </div>
</div>
<?php
	$servername = "localhost";
	$username = "homestead";
	$password = "secret";
	$dbname = "PSAFE";
	$connection = new MySQLi($servername, $username, $password, $dbname);
	if(!$connection){
		die("Failed to connect to database");
	}
	$domains = mysqli_query($connection, "SELECT Domain_ID, Name FROM `Learning Domains`");
	if(mysqli_num_rows($domains)>0){
		while($row = $domains->fetch_assoc()){
			echo "<h2><strong>Learning Domain:</strong> " . $row['Name'] . "<h2>";
			echo "<div class='container'>";
				$query = "SELECT * FROM `Class` WHERE Domain_ID = " . $row["Domain_ID"] . ";";
				$responses = mysqli_query($connection, $query);
				if(mysqli_num_rows($responses)>0){
					while($resp = $responses->fetch_assoc()){
						echo "<h5>Class: " . $resp["Name"] . "</h5>";
						echo "<div class='container'>";
							echo "<table>";
								echo "<tr>";
									echo "<th>Teacher</th>";
									echo "<th>STR</th>";
									echo "<th>SAT</th>";
									echo "<th>NG</th>";
									echo "<th>UNSAT</th>";
									echo "<th>N/A</th>";
									echo "<th>Delete</th></tr>";
									$submission = mysqli_query($connection, "SELECT * FROM Submission s JOIN Response r JOIN Teacher t JOIN Question q WHERE q.Domain_ID = " . $row["Domain_ID"] . " AND s.Class_ID = " . $resp['Class_ID'] . " AND q.Question_ID = r.Question_ID AND r.Submission_ID = s.Submission_ID AND s.Teacher_ID = t.Teacher_ID;");
									if(mysqli_num_rows($submission)>0){
										while($sub = $submission->fetch_assoc()){
											echo "<tr><td colspan='6'>" . $sub["Question"] . "</td></tr>";
											echo "<tr>
													<td>" . $sub["Name"] . "</td>
													<td>" . $sub["STR"] . "</td>
													<td>" . $sub["SAT"] . "</td>
													<td>" . $sub["NG"] . "</td>
													<td>" . $sub["UNSAT"] . "</td>
													<td>" . $sub["N/A"] . "</td>
											</tr>";
										}
									}
							echo "</table>";
						echo "</div>";
						
					}
				}
			echo "</div>";
		}
	}
?>