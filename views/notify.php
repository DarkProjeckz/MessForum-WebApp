<?php
   session_start();
   if(!isset($_SESSION['logged']))
   {
     header('Location: ../index.php');
   }
?>
<?php
	include_once 'db.php';
	if(isset($_POST['subm']))
	{
		$mid=$_SESSION['logged'];
		$text=$_POST['message'];
		$sql="INSERT INTO notification(m_id,message) VALUES ('$mid','$text');";
		$conn->query($sql);
		header("Location:./notification.php?");
		//$conn->query mysqli_query
	}
	if(isset($_POST['rem']))
	{
		$sql="DELETE FROM notification";
		$conn->query($sql);
		header("Location:./notification.php?");
		//$conn->query mysqli_query
	}
?>