<?php 
	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sample";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
	$sn = $_POST['sn'];
	$fd = $_POST['fd'];
	$sql4 = "UPDATE menu SET food='".$fd."' WHERE sno=".$sn."";
	$conn->query($sql4);
	$conn->close();
	header("Location: dashboard.php");
?>