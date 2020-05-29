<?php
include_once 'db.php';

$name2="";
foreach($_POST as $name => $content)
{
    $name2 =$name;
    break;
}
$sql = "update complaints set statusb = 1 where id = ".$name2;
$result = $conn->query($sql);
header("Location: complaints.php");

?>