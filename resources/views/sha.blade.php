<?php
  if(!empty($_GET['name'])){
    echo hash('sha256',$_GET['name']);
  }
?>
