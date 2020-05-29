<?php
   session_start();
   if(!isset($_SESSION['ulogged']) && !isset($_SESSION['logged']))
   {
     header('Location: ../index.php');
   }
?>
<?php include_once '../header.php' ?>
<?php
 include_once 'db.php';  
 if(isset($_SESSION['ulogged']))
  {
    $sql1 = "select rollno FROM users where id = ".$_SESSION['ulogged'];
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
    $sql = "SELECT * FROM complaints where rollno = ".$row1['rollno'];
    $result = $conn->query($sql);
  } 
  if(isset($_SESSION['logged']))
  {
    $sql = "SELECT * FROM complaints where statusb = 0";
    $result = $conn->query($sql);
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
		  <li class="nav-item">
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
          <li class="nav-item active">
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
            <a class="navbar-brand" href="#pablo">Complaints</a>
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
              <h4 class="card-title">Complaints</h4>
              
            </div>
            <div class="card-body">
              <form action="addcomplaint.php" method="POST">
                <div id="typography"> 
          <div class="row">
          <div class="col-md-12">
            <label>Write your complaint</label><br>
            <div class="form-group">
              
              <textarea class="form-control" id="exampleTextarea" name = "message" rows="1" style="color: white;font-size: 1.4em;"></textarea>
            </div>
          </div>
          
          </div>
              <center>
        <button type="Submit" name="submitt" class="btn btn-sm" style="background:#283cc7;">Submit</button>&nbsp;&nbsp;&nbsp;
        
        </center>
        
            </div>
                
              </form>
 
          </div>
        </div>
        <br>
        <div class="card" style="background:#ffffb3;">
                <div class="card-header card-header-success" >
                  <h4 class="card-title ">Your Complaints</h4>
                  
                </div>
        
     
                <div class="card-body">
          <div class="table-responsive">
          <form method="post" action="./removeComplaint2.php" >
                    <table class="table">
                      <thead class="card-header-success text-primary">
                        <th>Complaints</th><th>Action</th>
                      </thead>
                      <tbody>
              <?php
              while($row = $result->fetch_assoc()) 
                {
                ?>
                  <tr>
                  <td style="font-size: 1.4em;"><?php echo $row['complaint'] ?></td>
                  <?php 
                    if($row['statusb']==0)
                    {?>
                        <td><button type='submit' name="<?php echo $row["id"];?>" class='btn btn-sm' data-toggle="tooltip" data-placement="top" title="Click to delete" style="background:#283cc7;">Pending</button></td>
                    <?php
                     }
                    else{
                      ?>
                        <td><button type='submit' name="<?php echo $row["id"];?>" class='btn btn-sm btn-primary' data-toggle="tooltip" data-placement="top" title="Click to delete">Approved</button></td>
                    <?php
                    }
                  ?>
                  </tr>
                <?php
                }
    ?>
                      </tbody>
                    </table>
          <center></center>
          </form>
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
            <a class="navbar-brand" href="#pablo">Complaints</a>
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
      <div class="col-md-1"></div>
            <div class="col-md-10">
              <div class="card" style="background:#ffffb3;">
                <div class="card-header card-header-success" >
                  <h4 class="card-title ">All Complaints</h4>
                  
                </div>
        <br>
    
                <div class="card-body">
          <div class="table-responsive">
          <form method="post" action="./removeComplaint1.php" >
                    <table class="table">
                      <thead class="card-header-success text-primary" style="font-weight:900;font-size: 1.6em;">
                        <th>Register No</th><th>Complaints</th><th>Action</th>
                      </thead>
                      <tbody>
              <?php
              while($row = $result->fetch_assoc()) 
                {
                ?>
                  <tr style="font-size: 1.2em;">
                    <td><?php echo $row['rollno'] ?></td>
                  <td><?php echo $row['complaint'] ?> </td>
                  <td><button type='submit' name="<?php echo $row["id"];?>" class='btn btn-sm btn-primary' data-toggle="tooltip" data-placement="top" title="Click to approve">Done</button></td>
                  </tr>
                <?php
                }
    ?>

                      </tbody>
                    </table>
          <center></center>
          </form>
                  </div>
                </div>
              </div>
            </div>
      <div class="col-md-1"></div>
           
          </div>
        </div>
      </div>
      
    </div>
<?php 
}
?>
    
  </div>
 
 <?php include_once '../footer.php' ?>