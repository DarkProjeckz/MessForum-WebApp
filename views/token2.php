<?php
include_once 'db.php';

$name2="";
foreach($_POST as $name => $content)
{
    $name2 =$name;
    break;
}
$sql = "DELETE FROM TOKEN WHERE id =".$name2;
$result = $conn->query($sql);
header("Location: token.php");

?>