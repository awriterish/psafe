<?php
  if(!empty($_GET['Class_ID'])&&!empty($_GET['Name'])&&!empty($_GET['Teachers'])&&!empty($_GET['Domains'])&&!empty($_GET["CourseCode"])&&!empty($_GET["students"])){
    $classID = $_GET['Class_ID'];
    $className = $_GET['Name'];
    $teachers = $_GET['Teachers'];
    $domains = $_GET['Domains'];
    $courseCode = $_GET['CourseCode'];
    $servername = "localhost";
    $username = "homestead";
    $password = "secret";
    $dbname = "PSAFE";
    $students = $_GET['students'];
    $connection = new MySQLi($servername, $username, $password, $dbname);
    if(!$connection){
      die("Failed to connect to database");
    }
    $teachers = json_decode($teachers);
    $teacher = $teachers->FirstName . " " . $teachers->LastName;
    $name = mysqli_query($connection, "select * from `Teachers` WHERE Name='$teacher' LIMIT 1;");
    $teacherID = 0;
    if(mysqli_num_rows($name) == 0){
      if($result = mysqli_query($connection, "INSERT INTO `Teachers` (Name) VALUES ('$teacher');")){
        $teacherID = mysqli_fetch_row($result)[0];
        echo 0;
      }
    } else {
      $teacherID = mysqli_fetch_row($name)[0];
      echo 2;
    }
    $domains = json_decode($domains);
    $domainIDResults = [];
    foreach($domains as $domain){
      $domainQuery = mysqli_query($connection, "select * from  `Learning Domains` WHERE Abbr='$domain' LIMIT 1");
      if(mysqli_num_rows($domainQuery) == 0){
        if($result = $connection->query("INSERT INTO `Learning Domains` (Abbr, Active) VALUES ('$domain', 1);")){
          echo ",0";
          array_push($domainIDResults, $result->fetch_row()[0]);
        }
      } else {
        array_push($domainIDResults, mysqli_fetch_row($domainQuery)[0]);
        echo ",2";
      }
    }
    $classQuery = mysqli_query($connection, "select * from `Classes` WHERE Class_ID=$classID");
    if(mysqli_num_rows($classQuery)==0){
      $addClassQuery = "INSERT INTO `Classes` (Class_ID, `Course Code`, Name, Teacher_ID,";
      for($i = 1; $i<count($domainIDResults)+1; $i++){
        if($i==1){
          $addClassQuery .= "Domain_ID";
        } else {
          $addClassQuery .= ", Domain_ID$i";
        }
      }
      $addClassQuery .= ",Num_Students) VALUES ($classID, '$courseCode', '$className', $teacherID ";
      for($i = 0; $i<count($domainIDResults); $i++){
        $addClassQuery .= ", " . $domainIDResults[$i];
      }
      $addClassQuery .= ",$students)";
      if($connection->query($addClassQuery)==true){
          echo ",2";
      }
    } else {
      echo ",0";
    }
  }
?>
