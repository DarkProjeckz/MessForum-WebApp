<?php
    if(isset($_GET['button']))
    {     function isgap1(string $s) {
              $i=0;
              while($i<strlen($s))
              {
                  if ($s[$i]==" ") {
                     return 0;
                  }
                 $i++;
              }
              if($s=="")
              {
                  return(0);
              }
             return 1;
        }
        function getSalt($randStringLen) {
                $charset = 'abcdef0123456789';
                $randString = "";
                for ($i = 0; $i < $randStringLen; $i++) {
                       $randString .= $charset[mt_rand(0, strlen($charset) - 1)];
                }
                return $randString;
             }
        function encPass($plainPassword,$salt)
        {
              $enc = hash_hmac('sha512', $plainPassword , $salt);
              return $enc;
        }



            if(isgap1($_GET['rollno']) && isgap1(trim($_GET['name']," ")) && isgap1($_GET['gender']) && isgap1($_GET['year']) && isgap1($_GET['dep']) && isgap1($_GET['roomno']) && isgap1($_GET['pass']))
        {
            $servername = "localhost";
$username = "root";
$password = "";
$dbname = "sample";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
             }
            $r=(int)$_GET['rollno'];
            $p=$_GET['pass'];
            $n=$_GET['name'];
            $g=$_GET['gender'];
            $y=$_GET['year'];
            $d=$_GET['dep'];
            $r1=$_GET['roomno'];
            $salt = getSalt(16);
            $enc =  encPass($p,$salt);
            
            $sql = "INSERT INTO users (rollno,pass,passkey,name,gender,batch,dept,room) VALUES (".$r.",'".$enc."','".$salt."','".$n."','".$g."','".$y."','".$d."','".$r1."')";
            $result=$conn->query($sql);
			date_default_timezone_set('Asia/Kolkata');
			$dat = (String)date("Y-m-d");
			$sql1 = "INSERT INTO stat (roll,statusb, date1) VALUES (".$r.",0,'".$dat."')";
            $res=$conn->query($sql1);
			
            $conn->close();
        }
		
		
        header('Location: ./user.php');
    }
?>