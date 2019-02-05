<!--code for allotment list manage-->
<?php
 session_start();
 include("config.php");
if (isset($_SESSION['adminname']) && isset($_SESSION['password'])) {
 $adminname=$_SESSION['adminname'];
 $password=$_SESSION['password'];?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Student dashboard | Malaygiri Hostel</title>
<meta charset="utf-8">
<!--Bootstrap css files-->
  <link rel="shortcut icon" href="../favicon.ico" />
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
     <link rel="stylesheet" href="../css/animate.min.css"/>
  <link rel="stylesheet" href="../css/bootstrap.css"/>
      <link rel="stylesheet" href="../css/font-awesome.css"/>
          <link rel="stylesheet" href="../css/font-awesome.min.css"/>
  <link rel="stylesheet" href="../css/admindash.css"/>
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
                            <span class="sidebar-title">Approve Student Forms</span>
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
        </main>
    </div>
<?php
}
else
{
?>
<script type="text/javascript">
window.location.href="notlogin.php";
</script>
<?php
}
?>
</body>
</html>
