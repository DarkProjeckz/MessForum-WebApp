<?php
   session_start();
   if(!isset($_SESSION['ulogged']) && !isset($_SESSION['logged']))
   {
     header('Location: ../index.php');
   }
   if(isset($_SESSION['ulogged']))
   {
   include_once 'db.php';
   $sql = "SELECT * FROM users where id = ".$_SESSION['ulogged'];
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   }
?>
<?php include_once '../header.php' ?>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item  ">
            <a class="nav-link" href="./dashboard.php">
              <i class="material-icons">dashboard</i>
              <p style="font-weight:500;">Dashboard</p>
            </a>
          </li>
          <li class="nav-item active ">
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
if(isset($_SESSION['ulogged']))
{
?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">User Profile</a>
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
            <div class="col-md-12">
              <div class="card" style="background:#ffccb3;">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Info</h4>
                  
                </div>
            <br>
        <div class="row" style="margin-top: 3%;">
        <div class="col-md-2 col-sm-2 col-xs-1"></div>
        <div class="col-md-8 col-sm-8 col-xs-7">
              <div class="card card-profile" style="background:#09203f !important;">
                <div class="card-avatar">
                  
                    <img class="img" src="../assets/img/host.jpg" />
                  
                </div>
                   <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-md-3"></div>
            <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating" >Register Number: <?php echo $row["rollno"];?></label>
                        </div>
                      </div>
            <div class="col-md-4"></div>
                    </div>
                    <div class="row">
                      <div class="col-md-3"></div>
            <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating" >Name: <?php echo $row["name"];?></label>
                        </div>
                      </div>
            <div class="col-md-4"></div>
                    </div>
          <div class="row">
                      <div class="col-md-3"></div>
            <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating" >Gender: <?php echo $row["gender"];?></label>
                        </div>
                      </div>
            <div class="col-md-4"></div>
                    </div>
                    <div class="row">
                      <div class="col-md-3"></div>
            <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating" >Year: <?php echo $row["batch"];?></label>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                    <div class="row">
                      <div class="col-md-3"></div>
            <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating" >Department: <?php echo $row["dept"];?> </label>
                        </div>
                      </div>
            <div class="col-md-4"></div>
                    </div>
          <div class="row">
                      <div class="col-md-3"></div>
            <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Room no: <?php echo $row["room"];?></label>
                        </div>
                      </div>
            <div class="col-md-4"></div>
                    </div>
                    
                    
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
      <div class="col-md-2 col-sm-2 col-xs-1"></div>
      </div>
        
         <!--div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="../assets/img/faces/marc.jpg" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                  <h4 class="card-title">Alec Thompson</h4>
                  <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p>
                  <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                </div>
              </div>
            </div-->
              </div>
            </div>
            <!--div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="../assets/img/faces/marc.jpg" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                  <h4 class="card-title">Alec Thompson</h4>
                  <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p>
                  <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                </div>
              </div>
            </div-->
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
            <a class="navbar-brand" href="#pablo">User Profile</a>
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
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Details</h4>
                  
                </div>
                <div class="card-body">
          <h4>Display Students</h4>
          <form method="get">
          
           <center><button class="btn btn-md" type="submit" name="sub" style="background:#283cc7;">Display All</button></center>
          </form>
          <form method="post" action="./user2.php">
          <div class="table-responsive">
          <table class="table">
            <tr>
            <th>Register No</th>
            <th>Name</th>
            <th>Year</th>
            <th>Dept</th>
            <th>Room No</th>
            <th></th>
            
            </tr>
           <?php 
           if(isset($_GET['sub']))
           {
                 include_once 'db.php';
                 $sql = "SELECT * from users order by rollno asc";
                 $result = $conn->query($sql);
                 if($result->num_rows > 0)
                 {
                    while ($row = $result->fetch_assoc()) {
                           $name = (string)$row["rollno"];
                    ?>
                                  <tr>
                                  <td><?php echo $row["rollno"] ?></td>
                                  <td><?php echo $row["name"] ?></td>
                                  <td><?php echo $row["batch"] ?></td>
                                  <td><?php echo $row["dept"] ?></td>
                                  <td><?php echo $row["room"] ?></td>
                                  <td><button type='submit' name = "<?php echo $name;?>" class='btn btn-sm btn-primary'>Remove</button></td>
                                  </tr>
                    <?php
                    }
                 }
              }
           ?>
           <?php
                    #if(isset($_GET['715517104011']))
                    #{
                    #    echo "Adsdsd";
                    #}
           ?>
          </table>
          </div>
        </form>
                </div>
              </div>
            </div>
            <!--div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="../assets/img/faces/marc.jpg" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                  <h4 class="card-title">Alec Thompson</h4>
                  <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p>
                  <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                </div>
              </div>
            </div-->
          </div>
    
          <div class="row">
      <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Add Student</h4>
                  
                </div>
        <div class="card-body">
          <form action = "./user1.php">
            <div class="form-group">
              Register No:<input type="text" name ="rollno" class="form-control" id="reg">
            </div>
            <div class="form-group">
              Name<input type="text" name ="name" class="form-control" id="uname" oninput="cname();">
              <h6 style="display: none;color: red" id="msg">No spaces should be given</h6>
            </div>
            <div class="form-group">
              Gender:<input type="text" name = "gender" class="form-control" id="gen">
            </div>
            <div class="form-group">
              Year:<input type="text" name ="year"class="form-control" id="year">
            </div><div class="form-group">
              Department:<input type="text" name ="dep"class="form-control" id="dep">
            </div>
            <div class="form-group">
              Room No:<input type="text" name ="roomno"class="form-control" id="room">
            </div>
            <div class="form-group">
              Password:<input type="password" name ="pass"class="form-control" id="pass">
            </div>
            <center><button  class="btn" type="submit" name="button" style="background:#283cc7;">Add</button></center>
          </form>
        </div>
                      
              </div>
            </div>
      <div class="col-md-3"></div>
            <!--div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="../assets/img/faces/marc.jpg" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                  <h4 class="card-title">Alec Thompson</h4>
                  <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p>
                  <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                </div>
              </div>
            </div-->
          </div>
    </div>
      </div>
      
    </div>
<?php
}
?>  
  </div>
  <script type="text/javascript">
    function cname()
    {
      var str = document.getElementById("uname").value;
      str = str.toString();
      var j=0;
      for (var i = 0; i < str.length; i++) 
      {
        if(str.charAt(i) == " ")
        {
          j=1;
          break;
        }
      }
      if(j==1)
      {
        document.getElementById('msg').style.display = "block";
      }
      else
      {
        document.getElementById('msg').style.display = "none";
      }
    }
  </script>
 
 <?php include_once '../footer.php' ?>