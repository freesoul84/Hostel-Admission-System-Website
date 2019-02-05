
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
     <link rel="stylesheet" href="../css/bootstrapValidator.css"/>
  <link rel="stylesheet" href="../css/bootstrapValidator.min.css"/>
  <link rel="stylesheet" href="../css/studentdash.css"/>
    <link rel="stylesheet" href="../css/button.css"/>
  <script src="../js/jquery.js"></script>
  <!--bootstrap js files-->
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/bootstrap.theme.css">
  <script src="../js/jquery.min.js"></script>
  <!--BootstrapValidator-->
    <script src="../js/bootstrapValidator.js"></script>
   <script src="../js/bootstrapValidator.min.js"></script>
   <script type="text/javascript">
.panel-body .btn:not(.btn-block) { width:120px;margin-bottom:10px; }
   </script>
</head>
<body>
<?php
//code for connecting mysql database
include("config.php");
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
  $email=$_SESSION['email'];
  $password=$_SESSION['password'];
  $query3="SELECT * FROM userdetail where email='$email'";
$check=mysqli_query($connect,$query3);
$retval=mysqli_fetch_assoc($check);
$img1=$retval['profile'];

  //echo '<iframe src="profilepic/' . $_SESSION['email'] . 'res.pdf"width="500px" height="500px"></iframe>';
?>
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
                                   <a><?php echo "Welcome !"." ".$email;?></a>
                            </li>
                            <li class="dropdown">
                            <?php
                        $query="SELECT profile from userdetail where email='$email'";
                        $imgval=mysqli_query($connect,$query);
                        $take=mysqli_fetch_assoc($imgval);
                        $file_name=$take['profile'];
                            ?>
                                <a id="user-profile" href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo "<img src=../uploaddoc/".$email ."/" .$file_name."  class='img-responsive img-thumbnail img-circle' height=200 width=300 />" ?></a>
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
                        <a href="dashboard.php" class="active">
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
                        <a href="myallotment.php">
                            <span class="sidebar-icon"><i class="glyphicon glyphicon-list-alt"></i></span>
                            <span class="sidebar-title">My Merit Rank</span>
                        </a>
                    </li>
                    <li>
                        <a href="hostel_payment.php">
                            <span class="sidebar-icon"><i class="glyphicon glyphicon-credit-card"></i></span>
                            <span class="sidebar-title">Hostel Payment</span>
                        </a>
                    </li>
                    <li>
                        <a href="mess_payment.php">
                            <span class="sidebar-icon"><i class="glyphicon glyphicon-credit-card"></i></span>
                            <span class="sidebar-title">Mess Payment</span>
                        </a>
                    </li>
                     <li>
                        <a href="hostelformfill.php">
                            <span  class="sidebar-icon"><i class="glyphicon glyphicon-book"></i></span>
                            <span class="sidebar-title">Hostel form filling</span>
                        </a>
                    </li>
                    <li>
                        <a href="queries.php">
                            <span class="sidebar-icon"><i class="glyphicon glyphicon-comment"></i></span>
                            <span class="sidebar-title">Queries</span>
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
          <div class="container-fluid">
  	<div class="row">
      <div class="col-sm-12">
  		<section class="section_0">
        <div class="col-sm-3">
          <div class="circle circle1">
            <a href="profile.php"><h2>Profile</h2></a>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="circle circle2">
            <a href="setting.php"><h2>Setting</h2></a>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="circle circle3">
            <a href="myallotment.php"><h2>My MeritRank</h2></a>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="circle circle4">
            <a href="hostel_payment.php"><h2>Hostel Payment</h2></a>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="circle circle5">
            <a href="mess_payment.php"><h2><p>Mess Payment</p></h2></a>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="circle circle6">
            <a href="hostelformfill.php" ><h2><p>Hostel Form Filling</p></h2></a>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="circle circle7">
            <a href="queries.php"><h2>Queries</h2></a>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="circle circle8">
            <a href="logout.php"><h2>Log Out</h2></a>
          </div>
        </div>
      </section>
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
