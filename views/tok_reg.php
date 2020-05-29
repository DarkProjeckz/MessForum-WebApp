<?php
   session_start();
   if(!isset($_SESSION['ulogged']))
   {
     header('Location: ../index.php');
   }
?>
<?php
include_once 'db.php';
 $sql1 = "SELECT rollno,name FROM users where id = ".$_SESSION['ulogged'];
 $res = $conn->query($sql1);
 $row1 = $res->fetch_assoc();
if(isset($_POST['tsub']))
{
    
    $egg = $_POST['egg'];
    $chicken = $_POST['chicken'];
    $mutton = $_POST['mutton'];
    $gobi = $_POST['gobi'];
    $mushroom = $_POST['mushroom'];
    $rno = $row1["rollno"];
	$name = $row1["name"];
    if($egg!="")
    {    
        $e_no = '01';
        numgen($e_no);
        $sql = "INSERT INTO token (regno,name,tname,tnum,toknum) VALUES ('".$rno."','".$name."','egg','".$egg."','".numgen($e_no)."')";
        $conn->query($sql);
    }
    else {
        $egg=0;
    }
    if($chicken!="")
    {
        $c_no = '02';
        numgen($c_no);
        $sql = "INSERT INTO token (regno,name,tname,tnum,toknum) VALUES ('".$rno."','".$name."','chicken','".$chicken."','".numgen($c_no)."')";
        $conn->query($sql);
    }
    else{
        $chicken = 0;
    }
        
    if($mutton!="")
    {
        $m_no ='03';
        numgen($m_no);
        $sql = "INSERT INTO token (regno,name,tname,tnum,toknum) VALUES ('".$rno."','".$name."','mutton','".$mutton."','".numgen($m_no)."')";
        $conn->query($sql);
    }
    else {
        $mutton = 0;
    }
    if($mushroom!="")
    {
        $mu_no = '04';
        numgen($mu_no);
        $sql = "INSERT INTO token (regno,name,tname,tnum,toknum) VALUES ('".$rno."','".$name."','mushroom','".$mushroom."','".numgen($mu_no)."')";
        $conn->query($sql);
    }
    else{
        $mushroom = 0;
    }
    if($gobi!="")
    {
        $g_no = '05';
        numgen($g_no);
        $sql = "INSERT INTO token (regno,name,tname,tnum,toknum) VALUES ('".$rno."','".$name."','gobi','".$gobi."','".numgen($g_no)."')";
        $conn->query($sql);
    }
    else{
        $gobi = 0;
    }
    
    
    $sql = "UPDATE tcount SET egg=egg+".$egg.", chicken=chicken+".$chicken.", mushroom=mushroom+".$mushroom.", mutton=mutton+".$mutton.", gobi=gobi+".$gobi." ";
        $conn->query($sql);
    
    $conn->close();
    header("Location: token.php");
}

function numgen($id)
{
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "sample";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $name = array("01"=>"egg", "02"=>"chicken", "03"=>"mutton","04"=>"mushroom","05"=>"gobi");
    $sql = "SELECT ".$name[$id]." FROM tcount";
    $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0)
    {
        // output data of each row
        $row = $result->fetch_assoc();
        $cnt = $row[$name[$id]];  
    } 
    
    $conn->close();
    $dat = date("dmy");
    $dat = $dat.$id.(string)$cnt;
    return $dat;
}

?>