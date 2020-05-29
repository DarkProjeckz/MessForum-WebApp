<?php
   session_start();
   if(!isset($_SESSION['ulogged']))
   {
     header('Location: ../index.php');
   }
?>
<?php
	include_once 'db.php';
	if(isset($_POST['submitt']))
	{
		$sql1 = "select rollno FROM users where id = ".$_SESSION['ulogged'];
  	  	$result1 = $conn->query($sql1);
    	$row1 = $result1->fetch_assoc();

		$id=$row1['rollno'];
		$text=$_POST['message'];
		$sql="INSERT INTO complaints(rollno,complaint,statusb) VALUES ('$id','$text',0);";
		$conn->query($sql);
		header("Location:./complaints.php?");
		//$conn->query mysqli_query
	}
?>