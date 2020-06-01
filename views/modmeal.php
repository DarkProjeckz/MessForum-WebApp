<?php 
	include_once 'db.php';
	$sn = $_POST['sn'];
	$fd = $_POST['fd'];
	$sql4 = "UPDATE menu SET food='".$fd."' WHERE sno=".$sn."";
	$conn->query($sql4);
	$conn->close();
	header("Location: dashboard.php");
?>