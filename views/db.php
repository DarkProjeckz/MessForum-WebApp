<?php
$servername = "us-cdbr-iron-east-01.cleardb.net";
$username = "b001494fc38d85";
$password = "246b1c85";
$dbname = "heroku_5ecc95cd61ddfa7";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>