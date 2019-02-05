<?php
 //session start
  session_start();
  if (isset($_SESSION['adminname']) && isset($_SESSION['password']))
  {
   include("config.php");
   $adminname=$_SESSION['adminname'];
   $password=$_SESSION['password'];
   $about_query="SELECT * from admintable where adminname='$adminname' AND password='$password'";
   $about=mysqli_query($connect,$about_query) or die(mysqli_error($database));
   $aboutretval=mysqli_fetch_array($about);
   $fullname=$aboutretval['fullname'];
   $email=$aboutretval['email'];
   $phonenumber=$aboutretval['phonenumber'];
   $adminname=$aboutretval['adminname'];
   $position=$aboutretval['position'];
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, admin-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Profile | Malaygiri Hostel</title>
	      <link rel="shortcut icon" href="../favicon.ico" />
      <!--css and js bootstrap files-->
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../css/bootstrap.css"/>
    <link rel="stylesheet" href="../css/profile.css"/>
       <link rel="stylesheet" href="../css/bootstrapValidator.css"/>
  <link rel="stylesheet" href="../css/bootstrapValidator.min.css"/>
  <link rel="stylesheet" href="../css/sweetalert.css"/>
   <link rel="stylesheet" href="../css/font-awesome.min.css">
      <link rel="stylesheet" href="../css/admindash.css">
    <script src="../js/jquery.js"></script>
  <script src="../js/notlogin.js"></script>
    <script src="../js/jquery.min.js"></script>
   <script src="../js/bootstrap.min.js"></script>
      <script src="../js/sweetalert.min.js"></script>
<!--BootstrapValidator-->
    <script src="../js/bootstrapValidator.js"></script>
   <script src="../js/bootstrapValidator.min.js"></script>
</head>
<body>
     <?php $pageid="6"; ?>
  <?php $pagename="admin profile"; ?>
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
                        </a>
                    </li>
                    <li>
                        <a href="profile.php">
                            <span class="sidebar-icon"><i class="glyphicon glyphicon-user"></i></span>
                            <span class="sidebar-title">Profile</span>
                            <span class="glyphicon glyphicon-chevron-right act-active" style="margin-left:90px;">
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
                            <span class="sidebar-title">Add data /notifications</span>
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
                            <span class="sidebar-title">Student List</span>
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
<div class="container">
  <div class="row">
    <div class="col-xs-10 col-xs-offset-1">
      <div class="panel panel-default" style="margin-left:20px;">
        <div class="panel-heading">
          <h2>Profile</h2>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-4">
            <img src="ii.png" class="" height="200" width="200"/>
            </div>
            <div class="col-sm-8">
              <table class="table" style="margin-top:2px;">
                <div class="">
                  <tr>
                    <td>Full Name :</td>
                    <td><?php echo $fullname;?></td>
                  </tr>
                   <tr>
                    <td>Position:</td>
                    <td><?php echo $position;?></td>
                  </tr>
                  <tr>
                    <td>username:</td>
                    <td><?php echo $adminname;?></td>
                  </tr>
                  <tr>
                    <td>emailid:</td>
                    <td><?php echo $email;?></td>
                  </tr>
                  <tr>
                    <td>phonenumber:</td>
                    <td><?php echo $phonenumber;?></td>
                  </tr>
                </div>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</main>
    </div>
 <?php
 }
 else
 {
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
