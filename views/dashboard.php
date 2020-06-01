<?php
   session_start();
   if(!isset($_SESSION['ulogged']) && !isset($_SESSION['logged']) )
   {
    $_SESSION['login'] = "Please login first";
     header('Location: ../index.php');
   }
?>
<?php 
include_once ('../header.php');
include_once 'db.php';

$sql1="SELECT * FROM menu WHERE sno<10";
$brk=$conn->query($sql1);
$sql2="SELECT * FROM menu WHERE sno>10 AND sno<100";
$lnh=$conn->query($sql2);
$sql3="SELECT * FROM menu WHERE sno>100";
$dnr=$conn->query($sql3); 
?>

      <div class="sidebar-wrapper">
              <ul class="nav">
          <li class="nav-item active ">
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
if(isset($_SESSION['ulogged']) )
{
?>
<div class="main-panel" style="background: #07001d;">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Dashboard</a>
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
            <div class="col-md-4">
              <div class="card" style="background:#d6eebf;">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Breakfast Menu</h4>
                </div>
                <div class="card-body">
                  <table>
					<tr>
						<th>S.No</th>
						<th>Day</th>
						<th>Food</th>
					</tr>
					<?php 
					while($row = $brk->fetch_assoc())
					{
					?>
						<tr>
						<td><?php echo $row['sno']; ?></td>
						<td><?php echo $row['day']; ?></td>
						<td><?php echo $row['food']; ?></td>
						</tr>
					<?php
					}
					?>
				</table>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart" style="background:#f4e39b;">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Lunch Menu</h4>
                </div>
                <div class="card-body">
					<table>
					<tr>
						<th>S.No</th>
						<th>Day</th>
						<th>Food</th>
					</tr>
					<?php 
					while($row = $lnh->fetch_assoc())
					{
					?>
						<tr>
						<td><?php echo $row['sno']; ?></td>
						<td><?php echo $row['day']; ?></td>
						<td><?php echo $row['food']; ?></td>
						</tr>
					<?php
					}
					?>
				</table>
                </div>
                
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart" style="background:#ffcccc;">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Dinner Menu</h4>
                </div>
                <div class="card-body">
					<table>
					<tr>
						<th>S.No</th>
						<th>Day</th>
						<th>Food</th>
					</tr>
					<?php 
					while($row = $dnr->fetch_assoc())
					{
					?>
						<tr>
						<td><?php echo $row['sno']; ?></td>
						<td><?php echo $row['day']; ?></td>
						<td><?php echo $row['food']; ?></td>
						</tr>
					<?php
					}
					?>
				</table>
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
            <a class="navbar-brand" href="#">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar" style="color: white!important;"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
         
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          
          <div class="row">
            <div class="col-md-4">
              <div class="card" style="background:#d6eebf;">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Breakfast Menu</h4>
                </div>
                <div class="card-body">
                  <table>
					<tr>
						<th>S.No</th>
						<th>Day</th>
						<th>Food</th>
					</tr>
					<?php 
					while($row = $brk->fetch_assoc())
					{
					?>
						<tr>
						<td><?php echo $row['sno']; ?></td>
						<td><?php echo $row['day']; ?></td>
						<td><?php echo $row['food']; ?></td>
						</tr>
					<?php
					}
					?>
				</table>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart" style="background:#f4e39b;">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Lunch Menu</h4>
                </div>
                
                <div class="card-body">
					<table>
					<tr>
						<th>S.No</th>
						<th>Day</th>
						<th>Food</th>
					</tr>
					<?php 
					while($row = $lnh->fetch_assoc())
					{
					?>
						<tr>
						<td><?php echo $row['sno']; ?></td>
						<td><?php echo $row['day']; ?></td>
						<td><?php echo $row['food']; ?></td>
						</tr>
					<?php
					}
					?>
				</table>
                </div>
           
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart" style="background:#ffcccc;">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Dinner Menu</h4>
                </div>
                <div class="card-body">
					<table>
					<tr>
						<th>S.No</th>
						<th>Day</th>
						<th>Food</th>
					</tr>
					<?php 
					while($row = $dnr->fetch_assoc())
					{
					?>
						<tr>
						<td><?php echo $row['sno']; ?></td>
						<td><?php echo $row['day']; ?></td>
						<td><?php echo $row['food']; ?></td>
						</tr>
					<?php
					}
					$conn->close();
					?>
				</table>
                </div>
                
              </div>
            </div>
            </div>
			
			<div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <div class="card card-chart" style="background:#ccccff;">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Modify Meals</h4>
                </div>
                <div class="card-body">
                	<form action="modmeal.php" method="post">
					<table>
					<tr>
						<th>S.No</th>
						<th>To change</th>
					</tr>
					<tr>
						<td>
							<div class="form-group">
								<input type="text" name="sn" class="form-control" id="usr" style="color:white;" required>
							</div>

						</td>
						<td>
							<div class="form-group">
								<input type="text" name="fd" class="form-control" id="usr" required>
							</div>
						</td>
					</tr>
					
				</table><center><button type="submit" name="button" class="btn" style="background:#283cc7;">Change</button></center>
			</form>
                </div>
                
              </div>
            </div>
            <div class="col-md-4"></div>
            </div>
			
          </div>
          
        </div>
      </div>
<?php
}
?>
    </div>
  </div>
 
<?php include_once '../footer.php' ?>
