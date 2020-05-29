<?php
   session_start();
   if(!isset($_SESSION['ulogged']) && !isset($_SESSION['logged']))
   {
     header('Location: ../index.php');
   }
?>
<?php include_once '../header.php';
if(isset($_SESSION['ulogged']))
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sample";
  $conn = new mysqli($servername,$username,$password,$dbname);
  $sql="SELECT * FROM notification WHERE id=(SELECT max(id) from notification);";
  $result=$conn->query($sql);
  $resultCheck=$result->num_rows;
  $sql1 = "SELECT * FROM users where id = ".$_SESSION['ulogged'];
  $res = $conn->query($sql1);
  $row = $res->fetch_assoc();
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
          <li class="nav-item">
            <a class="nav-link" href="./user.php">
              <i class="material-icons">person</i>
              <p style="font-weight:500;">User Profile</p>
            </a>
          </li>
          <li class="nav-item ">
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
          <li class="nav-item active">
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
            <a class="navbar-brand" href="#pablo">Notification</a>
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
          <div class="card" style="background:#ffe6f0;">
            <div class="card-header card-header-success">
              <h4 class="card-title">Today's Notice</h4>
              
            </div>
            <div class="card-body">
              <div id="typography">
                <div class="card-title" style="padding: 1%;">
                  <h3 style="font-size: 1.7em;font-weight: 900;color: white;">Hii <?php echo $row['name'];?></h3>
                </div>
                <div class="row" style="border: 5px inset #09203f;padding: 3%">
                  <div style="margin:auto;">
                    <h3 style="color: white;text-align: center;font-size: 1.9em"><?php 
                    if($resultCheck >0){
                      while($row=$result->fetch_assoc()){
                        echo $row['message']."<br>";
                      }
                    }
                    else{
                      echo "*****NO NOTIFICATION*****";
                    } ?></h3>
                  </div>
                </div>
              </div>
            </div>
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
            <a class="navbar-brand" href="#pablo">Notification</a>
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
          <div class="card" style="background:#ffe6f0;">
            <div class="card-header card-header-success">
              <h4 class="card-title">Today's Notice</h4>
              
            </div>
            <div class="card-body">
              <form action="notify.php" method="POST">
                <div id="">
                <div class="card-title">
                  <h4 class="display-4 card-title">Hii <?php echo $_SESSION['logged'];?></h4>
                </div>
               
                  <div class="">
          <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="form-group">
              <textarea placeholder="Write notification" class="form-control" id="exampleTextarea" name = "message" rows="3" style="color: white;font-size: 1.3em;"></textarea>
            </div>
          </div>
          <div class="col-md-2"></div>
          </div>
          
                </div>
              <center>
        <button type="Submit" name="subm" class="btn btn-primary">Submit</button>&nbsp;&nbsp;&nbsp;
        <button type="Submit" name="rem" class="btn" style="background:#283cc7;">Remove</button>
        </center>
        
            </div>
                
              </form>
 
          </div>
        </div>
      </div>
     
    </div>
  </div>
<?php 
}
?>
    
  </div>
  
<?php include_once '../footer.php' ?>