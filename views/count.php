<?php
   session_start();
   if(!isset($_SESSION['ulogged']) && !isset($_SESSION['logged']))
   {
     header('Location: ../index.php');
   }
   date_default_timezone_set('Asia/Kolkata');
?>
<?php include_once '../header.php' ?>
<?php  include_once 'db.php';
if(isset($_SESSION['ulogged']))
{
	$sql1="Select rollno from users where id=".$_SESSION['ulogged'];
	$res=$conn->query($sql1);
	$row=$res->fetch_assoc();
	$roll=$row['rollno'];
}
if(isset($_SESSION['logged']))
{
	$a="SELECT date1 from stat";
	$r=$conn->query($a);
	$ro=$r->fetch_assoc();
	$date=(String)date('Y-m-d');
	if($date != $ro['date1'])
	{
		$b="UPDATE fcount SET breakfast=500,lunch=500,dinner=500";
		$rb=$conn->query($b);
		
	}
	$cnt = "SELECT * FROM fcount";

	$result = $conn->query($cnt);
	$rows = $result->fetch_assoc();
} 
?>
      <div class="sidebar-wrapper">
                <ul class="nav">
          <li class="nav-item  ">
            <a class="nav-link" href="./dashboard.php">
              <i class="material-icons">dashboard</i>
              <p style="font-weight:500;">Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./user.php">
              <i class="material-icons">person</i>
              <p style="font-weight:500;">User Profile</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./count.php">
              <i class="material-icons">content_paste</i>
              <p style="font-weight:500;">Count</p>
            </a>
          </li>
		  <li class="nav-item ">
            <a class="nav-link" href="./token.php">
              <i class="material-icons">library_books</i>
              <p style="font-weight:500;">Token</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./notification.php">
              <i class="material-icons">notifications</i>
              <p style="font-weight:500;">Notifications</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./complaints.php">
              <i class="material-icons">report_problem</i>
              <p style="font-weight:500;">Complaints</p>
            </a>
          </li>
		  <li class="nav-item ">
            <a class="nav-link" href="../index.php">
              <i class="material-icons">exit_to_app</i>
              <p style="font-weight:500;">Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
<?php
if(isset($_SESSION['ulogged']))
{
?>
	<div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Count</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          
        </div>
      </nav>

      <!-- End Navbar -->
      <div class="content">

        <div class="container-fluid">
          <div class="row justify-content-center"><h2 style="font-size: 1.5em;">Count for <?php $date = new DateTime('+1 day');
              echo $date->format('d-m-Y');?></h2></div>
          <div class="row">
		  <div class="col-md-2"></div>
            <div class="col-md-8">
              <div class="card" style="background: #b3d1ff;">
                <div class="card-header card-header-success">
                  <h4 class="card-title ">Food Count</h4>
                  
                </div>
                <div class="card-body" >
                  <div class="table-responsive">
				  <form method="post" action="count.php">
                    <table class="table">
                      <thead class="card-header-success text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Check
                        </th>
                        
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                           Breakfast
                          </td>
                          <td>
                            <input type="checkbox" name="breakfast" value='1' checked>
                          </td>
                         
                        </tr>
                       <tr>
                          <td>
                            2
                          </td>
                          <td>
                           Lunch
                          </td>
                          <td>
                            <input type="checkbox" name="lunch" value='2' checked>
                          </td>
                         
                        </tr><tr>
                          <td>
                            3
                          </td>
                          <td>
                           Dinner
                          </td>
                          <td>
                            <input type="checkbox" name="dinner" value='3' checked>
                          </td>
                        </tr>
                      </tbody>
                    </table>
					<center><button type="submit" name="csub" class="btn" style="background:#283cc7;">Submit</button></center>
					</form>
					<?php
						if(isset($_POST['csub']))
						{
							$sql = "SELECT * from stat where roll=".$roll;
							$result=$conn->query($sql);
							$row1=$result->fetch_assoc();
							if($row1['statusb'] == 1)
							{
								$date=(String)date("Y-m-d");
								if($row1['date1'] == $date)
								{
									?>
									<script>alert('*****REGISTRATION ENDED*****');</script>
								<?php
								}
								else
								{
									$s="UPDATE fcount SET breakfast=500,lunch=500,dinner=500";
									$r=$conn->query($s);
									$sql2="UPDATE stat SET statusb=0";
									$res1=$conn->query($sql2);
									$da="UPDATE stat SET date1='".$date."'";
									$re=$conn->query($da);
									$sql3="UPDATE stat SET statusb=1 WHERE roll=".$roll;
									$res2=$conn->query($sql3);
									$b=0;
									$l=0;
									$d=0;
									if(empty($_POST['breakfast']))
									{
										$b=1;
									}
									if(empty($_POST['lunch']))
									{
										$l=1;
									}
									if(empty($_POST['dinner']))
									{
										$d=1;
									}
									$sql4="UPDATE fcount SET breakfast=breakfast-".$b;
									$res3=$conn->query($sql4);
									$sql5="UPDATE fcount SET lunch=lunch-".$l;
									$res4=$conn->query($sql5);
									$sql6="UPDATE fcount SET dinner=dinner-".$d;
									$res5=$conn->query($sql6);
									?>
									<script>alert('*****SUCCESSFULLY REGISTERED*****');</script>
								<?php
								}
							}
							else
							{
								$dat=(String)date("Y-m-d");
								if($row1['date1']== $dat)
								{
									$b=0;
									$l=0;
									$d=0;
									if(empty($_POST['breakfast']))
									{
										$b=1;
									}
									if(empty($_POST['lunch']))
									{
										$l=1;	
									}
									if(empty($_POST['dinner']))
									{
										$d=1;
									}
									$sql4="UPDATE fcount SET breakfast=breakfast-".$b;
									$res3=$conn->query($sql4);
									$sql5="UPDATE fcount SET lunch=lunch-".$l;
									$res4=$conn->query($sql5);
									$sql6="UPDATE fcount SET dinner=dinner-".$d;
									$res5=$conn->query($sql6);
									$ss="UPDATE stat SET statusb=1 WHERE roll=".$roll;
									$rr=$conn->query($ss);
									
								}
								else
								{
									$s="UPDATE fcount SET breakfast=500,lunch=500,dinner=500";
									$r=$conn->query($s);
									$sql2="UPDATE stat SET statusb=0";
									$res1=$conn->query($sql2);
									$da="UPDATE stat SET date1='".$dat."'";
									$re=$conn->query($da);
									$sql3="UPDATE stat SET statusb=1 WHERE roll=".$roll;
									$res2=$conn->query($sql3);
									$b=0;
									$l=0;
									$d=0;
									if(empty($_POST['breakfast']))
									{
										$b=1;
									}
									if(empty($_POST['lunch']))
									{
										$l=1;
									}
									if(empty($_POST['dinner']))
									{
										$d=1;
									}
									$sql4="UPDATE fcount SET breakfast=breakfast-".$b;
									$res3=$conn->query($sql4);
									$sql5="UPDATE fcount SET lunch=lunch-".$l;
									$res4=$conn->query($sql5);
									$sql6="UPDATE fcount SET dinner=dinner-".$d;
									$res5=$conn->query($sql6);
									echo $dat;
								}
								?>
									<script>alert('*****SUCCESSFULLY REGISTERED*****');</script>
								<?php
								
							}
						}
					?>
                  </div>
                </div>
              </div>
            </div>
			<div class="col-md-2"></div>
            
          </div>
        </div>
      </div>
    </div>
<?php 
}
?>
<?php
if(isset($_SESSION['logged']))
{
?>
	<div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Count</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
		  <div class="col-md-2"></div>
            <div class="col-md-8">
              <div class="card" style="background: #b3d1ff;">
                <div class="card-header card-header-success">
                  <h4 class="card-title ">Food to be prepared</h4>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
				  <form method="POST" action="count.php">
                    <table class="table">
                      <thead class="card-header-success text-primary">
                        <th>Name</th><th>Count</th><th>Total</th>
                      </thead>
                      <tbody>
                        <tr><td>Breakfast</td><td><?php echo $rows['breakfast']; ?></td><td>500</td></tr>
						<tr><td>Lunch</td><td><?php echo $rows['lunch']; ?></td><td>500</td></tr>
                        <tr><td>Dinner</td><td><?php echo $rows['dinner']; ?></td><td>500</td></tr>
                      </tbody>
                    </table>
					<center><button type="submit" name="but" class="btn" style="background:#283cc7;">End Registration</button></center>
					</form>
					<?php
					if(isset($_POST['but']))
					{
						$sql="UPDATE stat SET statusb=1,date1='".$date."'";
						$res=$conn->query($sql);
					}
					?>
                  </div>
                </div>
              </div>
            </div>
			<div class="col-md-2"></div>
            
          </div>
        </div>
      </div>
     
    </div>
<?php 
}
?>  
    
  </div>
<?php include_once '../footer.php' ?>