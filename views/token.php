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
    $sql = "SELECT * FROM token";
    $result = $conn->query($sql);
   
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
		  <li class="nav-item active">
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
            <a class="navbar-brand" href="#pablo">Token</a>
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
              <div class="card"  style="background:#ffffb3;">
                <div class="card-header card-header-success">
                  <h4 class="card-title ">Register Tokens</h4>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
          <form action="tok_reg.php" method="post">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th><th>Name</th><th>No. of tokens</th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td><td>Egg</td><td>
                            <div class="form-group">
                <!--input type="number" class="form-control" min="1" max="2" id="usr" name="egg" placeholder="optional"-->
                            <select class="form-control" name="egg" style="background: none;color:white;text-align: center;" >
                            <option value="" selected>None</option> 
                            <option value="15">15</option>
                            <option value="25">25</option>
                            </select>

                          </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            2
                          </td>
                          <td>
              Chicken
                          </td>
                          <td>
                            <div class="form-group" style="background:#BB0000 !important;">
                <select class="form-control" name="chicken" style="background: none;color:white;text-align: center;" >
                            <option value="" selected>None</option> 
                            <option value="1">1</option>
                            <option value="2">2</option>
                            </select>
              </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            3
                          </td>
                          <td>
              Mutton
                          </td>
                          <td>
                            <div class="form-group">
               <select class="form-control" name="mutton" style="background: none;color:white;text-align: center;" >
                            <option value="" selected>None</option> 
                            <option value="1">1</option>
                            <option value="2">2</option>
                            </select>
              </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            4
                          </td>
                          <td>
              Gobi
                          </td>
                          <td>
                            <div class="form-group" style="background:#BB0000 !important;">
                <select class="form-control" name="gobi" style="background: none;color:white;text-align: center;" >
                            <option value="" selected>None</option> 
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            </select>
              </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            5
                          </td>
                          <td>
              Mushroom
                          </td>
                          <td>
                            <div class="form-group">
                <select class="form-control" name="mushroom" style="background: none;color:white;text-align: center;" >
                            <option value="" selected>None</option> 
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            </select>
              </div>
                          </td>
                        </tr>
                        
                      </tbody>
                    </table>
          <center><button type="submit" class="btn" style="background:#283cc7;" name="tsub">Submit</button></center>
          </form>
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
            <a class="navbar-brand" href="#pablo">Token</a>
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
                  <h4 class="card-title ">Registered Tokens</h4>
                </div>
        <br>
    <div class="card-body">
      <div class="col-12 col-sm-12 col-md-10 col-lg-8" style="margin:auto;">
          <form class="card card-md" method="post">  
              <div style="margin:auto;">
                <div style="margin:auto;display: flex; justify-content: center;">
                  <button class="btn btn-sm" style="background:#283cc7;" name ="all" type="submit">All</button>
                </div>
                <div class="form-group" style="padding: 5%;">
                  <input class="form-control" name="getid" type="search" placeholder="Register no" style="color: white;">
                </div>
                <div style="margin:auto;display: flex; justify-content: center;">
                  <button class="btn btn-sm" style="background:#283cc7;" name="search" type="submit">Search</button>   
                </div>
              </div>
          </form>
      </div>
    </div>
      <div class="card-body">
        <div class="table-responsive">
          <form method="post" action="./token2.php" >
                    <table class="table">
                      <thead class="card-header-success text-primary">
                        <th>ID</th><th>Name</th><th>Token Name</th><th>Token count</th><th>Token Number</th><th>Approve</th>
                      </thead>
                      <tbody>
              <?php   
              if(!isset($_POST['search']))
             {
             
                while($row = $result->fetch_assoc()) 
                {
                ?>
                  <tr>
                  <td><?php echo $row["regno"] ?> </td>
                  <td><?php echo $row["name"]?> </td>
                  <td><?php echo $row["tname"]?> </td>
                  <td><?php echo $row["tnum"]?> </td>
                  <td><?php echo $row["toknum"]?> </td>
                  <td><button type='submit' name="<?php echo $row["id"];?>" class='btn btn-sm btn-primary'>Done</button></td>
                  </tr>
                <?php
                }
                
             }
             if(isset($_POST['search']))
             {
                 $id = $_POST['getid'];
                 $sql2 = "SELECT * FROM token where regno=".$id;
                 $res = $conn->query($sql2);
                 if($id!="")
                 {
                 while($row = $res->fetch_assoc())
                 {
                ?>
                  <tr>
                  <td><?php echo $row["regno"] ?> </td>
                  <td><?php echo $row["name"]?> </td>
                  <td><?php echo $row["tname"]?> </td>
                  <td><?php echo $row["tnum"]?> </td>
                  <td><?php echo $row["toknum"]?> </td>
                  <td><button type='submit' name="<?php echo $row["id"];?>" class='btn btn-sm btn-primary'>Done</button> </td>
                  </tr>
                <?php
                }
               }
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