<?php
  if(!empty($_GET['Class_ID'])&&!empty($_GET['Name'])&&!empty($_GET['Teachers'])&&!empty($_GET['Domains'])&&!empty($_GET["CourseCode"])){
    $classID = $_GET['Class_ID'];
    $name = $_GET['Name'];
    $teachers = $_GET['Teachers'];
    $domains = $_GET['Domains'];
    $courseCode = $_GET['CourseCode'];
    $servername = "localhost";
    $username = "homestead";
    $password = "secret";
    $dbname = "PSAFE";
    $connection = new MySQLi($servername, $username, $password, $dbname);
    if(!$connection){
      die("Failed to connect to database");
    }
    
  }
?>
