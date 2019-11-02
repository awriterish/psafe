<!DOCTYPE html>
<html>
	<head>
		<title>
			<?php
				if(empty($_GET['page'])){
					header("Location: ../", true, 303);
				} else {
					$page = $_GET['page'];
				}
				echo $page;
			?>
		</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<style>
			th{
				border: 1px solid black;
				padding: 5px;
			}
			
			td{
				border: 1px solid black;
				padding: 5px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<br>
			<a href="./"><button class="btn btn-primary"><-</button></a>
			<h3>You are viewing example page <?php echo $page; ?></h3>
			<?php
				if($page=="view"){
					include("view.php");
				} else if($page=="survey"){
					include("survey.php");
				}
			?>
		</div>
	</body>
</html>