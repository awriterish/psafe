<br>
<h3>Please select a learning domain.</h3>
<div class="dropdown">
	<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Select a Domain</button>
	<div class="dropdown-menu">
		<?php
			$servername = "localhost";
			$username = "homestead";
			$password = "secret";
			$dbname = "PSAFE";
			$connection = new MySQLi($servername, $username, $password, $dbname);
			if(!$connection){
				die("Failed to connect to database");
			}	
			$domains = mysqli_query($connection, "SELECT Domain_ID, Name FROM `Learning Domains`;");
			if(mysqli_num_rows($domains)>0){
				while($domain=$domains->fetch_assoc()){
					echo "<a href='#' class='dropdown-item' onclick='getData(" . $domain['Domain_ID'] . ")'>" . $domain['Name'] . "</a>";
				}
			}	
		?>
	</div>
</div>
<br>
<div class="container" id="returnContent"></div>