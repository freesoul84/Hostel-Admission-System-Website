<?php
 session_start();
 include("config.php");
if (isset($_SESSION['adminname']) && isset($_SESSION['password'])) {
 $adminname=$_SESSION['adminname'];
 $password=$_SESSION['password'];?>
<!--code for admin daashooard-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Admin dashboard | Malaygiri Hostel</title>
<!--Bootstrap css files-->
  <link rel="shortcut icon" href="../favicon.ico" />
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
     <link rel="stylesheet" href="../css/animate.min.css"/>
  <link rel="stylesheet" href="../css/bootstrap.css"/>
      <link rel="stylesheet" href="../css/font-awesome.css"/>
          <link rel="stylesheet" href="../css/font-awesome.min.css"/>
  <link rel="stylesheet" href="../css/admindash.css"/>
  <link rel="stylesheet" href="../css/views.css"/>
  <script src="../js/jquery.js"></script>
  <!--bootstrap js files-->
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/bootstrap.theme.css">
  <script src="../js/jquery.min.js"></script>
</head>
<body>
    <div id="navbar-wrapper">
        <header>
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Hostel Malaygiri</a>
                    </div>
                    <div id="navbar-collapse" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right navbar-tabs">
                            <li class="">
                                <a id="home" href="../homepage.php">
                                Homepage
                                </a>
                            </li>
                            <li class="">
                                   <a><?php echo "Welcome !"." ".$adminname;?></a>
                            </li>
                            <li class="dropdown">
                                <a id="user-profile" href="#" class="dropdown-toggle" data-toggle="dropdown">
                                 <img src="ii.png" class="img-responsive img-circle img-thumbnail" /></a>
                                <ul class="dropdown-menu dropdown-block" role="menu">
                                    <li><a href="profile.php">Profile</a></li>
                                    <li><a href="setting.php">Setting</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    </div>
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <aside id="sidebar">
                <ul id="sidemenu" class="sidebar-nav">
                    <li>
                        <a href="admindashboard.php" class="active">
                            <span class="sidebar-icon"><i class="glyphicon glyphicon-dashboard"></i></span>
                            <span class="sidebar-title">Dashboard</span>
                                  <span class="glyphicon glyphicon-chevron-right act-active" style="margin-left:70px;">
                        </a>
                    </li>
                    <li>
                        <a href="profile.php">
                            <span class="sidebar-icon"><i class="glyphicon glyphicon-user"></i></span>
                            <span class="sidebar-title">Profile</span>
                        </a>
                    </li>
                    <li>
                       <a href="setting.php">
                            <span class="sidebar-icon"><i class="glyphicon glyphicon-cog"></i></span>
                            <span class="sidebar-title">Setting</span>
                    </li>
                     <li>
                        <a href="adddata.php">
                            <span class="sidebar-icon"><i class="glyphicon glyphicon-cloud"></i></span>
                            <span class="sidebar-title">Add data/Notifications</span>
                        </a>
                    </li>
                    <li>
                        <a href="student_forms.php">
                            <span class="sidebar-icon"><i class="glyphicon glyphicon-cloud"></i></span>
                            <span class="sidebar-title">Student Forms</span>
                        </a>
                    </li>
                    <li>
                        <a href="allotment_list.php">
                            <span class="sidebar-icon"><i class="glyphicon glyphicon-book"></i></span>
                            <span class="sidebar-title">Approve Students  List</span>
                        </a>
                    </li>
                    <li>
                        <a href="new_admin.php">
                            <span class="sidebar-icon"><i class="glyphicon glyphicon-plus"></i></span>
                            <span class="sidebar-title">Add new admin</span>
                        </a>
                    </li>
                     <li>
                        <a href="table_management.php">
                            <span class="sidebar-icon"><i class="glyphicon glyphicon-trash"></i></span>
                            <span class="sidebar-title">Table Managements</span>
                        </a>
                    </li>
                    <li>
                       <a href="queries.php">
                           <span class="sidebar-icon"><i class="glyphicon glyphicon-alert"></i></span>
                           <span class="sidebar-title">Queries List</span>
                       </a>
                   </li>
                     <li>
                        <a href="logout.php">
                            <span class="sidebar-icon"><i class="glyphicon glyphicon-off"></i></span>
                            <span class="sidebar-title">Log out</span>
                        </a>
                    </li>
                </ul>
            </aside>
        </div>
        <main id="page-content-wrapper" role="main">
               <center>  <div class="row">
              <div class="col-xs-12">
            <div class="col-md-3">
            <div class="circle2">
              <?php
               $query="SELECT * from hostelform";
               $retval=mysqli_query($connect,$query);
                $views=mysqli_num_rows($retval);
             ?>
            <p class="lab"><?php if($views){echo $views;}else{
              echo "0";
            } ?></p>
            </div>
            <p class="lab">Students Form Number</p>
            </div>
            <div class="col-md-3">
            <div class="circle3">
              <?php
               $queryty="SELECT * from tyapprove";
               $retval=mysqli_query($connect,$queryty);
                $views1=mysqli_num_rows($retval);
                $queryfy="SELECT * from fyapprove";
                $retval=mysqli_query($connect,$queryfy);
                 $views2=mysqli_num_rows($retval);
             ?>
              <p class="lab"><?php echo " ".$views1."+"; echo " ".$views2."";?></p>
              </div>
               <p class="lab">Approve List</p>
            </div>
            <div class="col-md-3">
              <div class="circle4">
                <?php
               $query="SELECT * from tymeritlist";
               $retval=mysqli_query($connect,$query);
                $firstmerit=mysqli_num_rows($retval);
             ?>
                <p class="lab"><?php if($firstmerit) {echo $firstmerit;}else{echo "0";}?></p>
              </div>
                 <p class="lab">1st Merit Numbers Third Year</p>
            </div>
            <div class="col-md-3">
              <div class="circle4">
                <?php
               $query="SELECT * from fymeritlist";
               $retval=mysqli_query($connect,$query);
                $firstmerit=mysqli_num_rows($retval);
             ?>
                <p class="lab"><?php if($firstmerit) {echo $firstmerit;}else{echo "0";}?></p>
              </div>
                 <p class="lab">2st Merit Numbers of Fourth Year</p>
            </div>
          </div>
          </div>
        </center>
        </main>
    </div>
    <?php
    }
    else{
  ?>
   <!-- Modal -->
   <script type="text/javascript">
   window.location.href="notlogin.php";
   </script>
  <?php
     }
     ?>
</body>
</html>
<script type="text/javascript">
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
