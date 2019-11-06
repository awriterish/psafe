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
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
				if($page=="view2"){
					include("view2.php");
				} else if($page=="survey"){
					include("survey.php");
				} else if($page=="view"){
					include("view.php");
				}
			?>
		</div>
	</body>
</html>