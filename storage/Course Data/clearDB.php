<?php
  $servername = "localhost";
  $username = "homestead";
  $password = "secret";
  $dbname = "PSAFE";
  $connection = new MySQLi($servername, $username, $password, $dbname);
  if(!$connection){
    die("Failed to connect to database");
  }
  
?>
