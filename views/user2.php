<?php
   $name2 = "";
   foreach($_POST as $name => $content) { 
    $name2 = $name;
   break;
  }
  include_once 'db.php';
  $sql = "DELETE FROM users WHERE rollno = ".$name2;
  $result = $conn->query($sql);
  
  $sql1 = "DELETE FROM stat WHERE roll = ".$name2;
  $res = $conn->query($sql1);
  header("LOCATION: ./user.php");
?>