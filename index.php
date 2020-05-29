<?php
session_start();
$s="";
if(isset($_SESSION['login']))
{
	$s = $_SESSION['login'];
}
session_destroy();
session_start();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<title>Mess Forum</title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="icon" type="image/png" href="assets/img/favicon.png">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,300'>
<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
<link rel="stylesheet" href="assets/css/loginstyle.css">
</head>
<body>
<div class="cotn_principal">
<?php 
if($s!="")
{
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<?php echo $s;?>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<?php
}?>
<br><br><br>  
<h1 style="font-family: algerian;font-weight:750;"><!--<img src="assets/img/favicon.png" style="height:50px;width:auto;">--> PSG iTECH MESS FORUM</h1>
<div class="cont_centrar">
<div class="cont_login">
<div class="cont_info_log_sign_up">
<div class="col_md_login">
<div class="cont_ba_opcitiy">  
<div class="alert alert-danger alert-dismissible fade show" role="alert" id="upass" style="display: none;">
<strong>Invalid Password</strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="alert alert-danger alert-dismissible fade show" role="alert" id="u&pass" style="display: none;">
<strong>Invalid Username and Password</strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<h2>STUDENT</h2>  
<button class="btn_login" onclick="cambiar_login()">LOGIN</button>
</div>
</div>
<div class="col_md_sign_up">
<div class="cont_ba_opcitiy">
<div class="alert alert-danger alert-dismissible fade show" role="alert" id="apass" style="display: none;">
<strong>Invalid Password</strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="alert alert-danger alert-dismissible fade show" role="alert" id="a&pass" style="display: none;">
<strong>Invalid Username and Password</strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<h2>ADMIN</h2>
<button class="btn_sign_up" onclick="cambiar_sign_up()">LOGIN</button>
</div>
</div>
<div class="messagel" id="close_iconl" style="padding:1%;z-index: 35;position: absolute; bottom:0; left:15%">
		<a style="font-weight:900;" href="https://messforum-api.herokuapp.com/student"><b>Download app </b></a>
		 <i style="margin-left:7px;color:white !important" class="close icon"></i>
</div>
<div class="messager" id="close_iconr" style="padding:1%;z-index: 35;position: absolute; bottom:0; right:15%;">
		<a style="font-weight:900;" href="https://messforum-api.herokuapp.com/admin"><b>Download app </b></a>
		 <i style="margin-left:7px;color:white !important" class="close icon"></i>
</div>
</div>
<div class="cont_back_info">
<div class="cont_img_back_">
<img src="assets/img/2.png" alt="" />
</div>
</div>
<div class="cont_forms" >
<div class="cont_img_back_">
<img src="assets/img/2.png" alt="" />
</div>
<div class="cont_form_login">
<a href="#" onclick="ocultar_login_sign_up()" ><i class="material-icons">&#xE5C4;</i></a>
<h2 style="color:white;">LOGIN</h2>
<form action="index.php" method="POST">
<div class="card-body">
<div class="form-group">
<input type="text" class="form-control" id="usrname" name="rollno" placeholder="Username" required style="background:none;color: white;">
</div>
<div class="form-group">
<input type="password" class="form-control" id="upwd" name="pass" placeholder="Password" required style="background:none;color: white;">
<img alt="1" src="assets/img/eye-slash.png" id="spass" style="width:10%;height: auto;float: right;margin-left: -30px;margin-top: -35px;position: relative; z-index: 2;" onclick="eye()">
</div>
<button class="btn_login" type="submit" name="login" style="background:green;">LOGIN</button>
</div>
</form>
<?php
function encPass($plainPassword,$salt)
{
  $enc = hash_hmac('sha512', $plainPassword , $salt);
  return $enc;
}
if(isset($_POST['login']))
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sample";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$rollno=(int)$_POST['rollno'];
$pass=$_POST['pass'];
$sql = "SELECT * FROM users where rollno = ".$rollno;
$result = $conn->query($sql);
$flag=0;
while($row=$result->fetch_assoc())
{
if($row['rollno']==$rollno)
{
$flag=1;
break;
}
}
if ($flag==1)
{
if($row['pass']==encPass($pass,$row['passkey']))
{
$_SESSION['ulogged']=$row["id"];
//header('Location: views/dashboard.php');
$URL="views/dashboard.php";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}
else
{
?>
<script> document.getElementById('upass').style.display = "block";</script>
<?php
}
}
else
{
?>
<script> document.getElementById('u&pass').style.display = "block";</script>
<?php
}          
}
?>
</div>
<div class="cont_form_sign_up">
<a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
<br><br>
<h2 style="color:white;">LOGIN</h2>
<form method="POST">
<div class="card-body">
<div class="form-group">
<input type="text" class="form-control" id="ausrname" name = "ids" placeholder="Username" required style="background:none;color: white;">
</div>
<div class="form-group">
<input type="password" class="form-control" id="apwd" name ="passs" placeholder="Password" required style="background:none;color: white;">
<img alt="1" src="assets/img/eye-slash.png" id="apss" style="width:10%;height: auto;float: right;margin-left: -30px;margin-top: -35px;position: relative; z-index: 2;" onclick="eye1()">
</div>
<button class="btn_login" type="submit" name="submit1" style="background:green;">LOGIN</button>
</div>
<?php
$id1= array("Admin01","Admin02","Admin03");
$pass=array("01pass","02pass","03pass");
if(isset($_POST['submit1']))
{
$id=$_POST['ids'];
$pas=$_POST['passs'];
$flag=0;
if ($id == $id1[0] ) {
if($pas==$pass[0])
{
$_SESSION['logged']=$id;
//header('Location: views/dashboard.php');
$URL="views/dashboard.php";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}
else
{
?>
<script> document.getElementById('apass').style.display = "block";</script>
<?php
}
$flag=1;
}
if ($id == $id1[1] ) {
if($pas==$pass[1])
{
$_SESSION['logged']=$id;
//header('Location: views/dashboard.php');
$URL="views/dashboard.php";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}
else
{
?>
<script> document.getElementById('apass').style.display = "block";</script>
<?php
}
$flag=1;
}
if ($id == $id1[2] )
{
if($pas==$pass[2])
{
$_SESSION['logged']=$id;
//header('Location: views/dashboard.php');
$URL="views/dashboard.php";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}
else
{
?>
<script> document.getElementById('apass').style.display = "block";</script>
<?php
}
$flag=1;
}
if($flag == 0)
{
?>
<script> document.getElementById('a&pass').style.display = "block";</script>
<?php
}
}
?>
</form>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
function eye()
{
var img = document.getElementById('spass');
var obj = document.getElementById('upwd');
if(img.alt == "1")
{
img.src = 'assets/img/eye-open.png'; 
img.alt = "2";
obj.type = "text";
}
else
{
img.src = 'assets/img/eye-slash.png';
img.alt = "1";
obj.type = "password";
}
}
function eye1()
{
var img = document.getElementById('apss');
var obj = document.getElementById('apwd');
console.log(img.alt);
console.log(img.src);
if(img.alt == "1")
{console.log("If");
img.src = 'assets/img/eye-open.png'; 
img.alt = "2";
obj.type = "text";
}
else
{console.log("Else");
img.src = 'assets/img/eye-slash.png';
img.alt = "1";
obj.type = "password";
}
}
</script>
<script  src="assets/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
		$("#close_iconl").on('click', function() {
			$(".messagel" ).remove();
			  });
		$("#close_iconr").on('click', function() {
			$(".messager" ).remove();
			  });
		
</script>
</body>
</html>