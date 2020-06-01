<?php
        if(isset($_GET['login']))
        {
          session_start();
          include_once 'db.php';
          $rollno=$_GET['rollno'];
          $pass=$_GET['pass'];
          $sql = "SELECT * FROM users where rollno = ".$rollno;
          $result = $conn->query($sql);
          if ($result->num_rows > 0)
          {
              $row = $result->fetch_assoc();
              if($row['pass']==$pass)
             {
                echo "hello"; 
                $_SESSION['ulogged']=$row["id"];
				header('Location: ./notification.php');
             }
          }
		  else
		  {
			if(1)
			{
			  ?>
			  <script> alert('Invalid');</script>
			  <?php
			  goto here;
			 }
			 else
			 {
				 here:
				 header('Location: ../index.php');
			 }
			
			  
		  }
          
        }
   ?>