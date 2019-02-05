<?php
 //session start
    include("config.php");
 session_start();
  if (isset($_SESSION['email']) && isset($_SESSION['password']))
  {
   $email=$_SESSION['email'];
   $password=$_SESSION['password'];
   $about_query="SELECT * from userdetail where email='$email' AND password='$password'";
   $about=mysqli_query($connect,$about_query) or die(mysqli_error($database));
   $aboutretval=mysqli_fetch_array($about);
   $firstname=$aboutretval['firstname'];
    $lastname=$aboutretval['lastname'];
   $phonenumber=$aboutretval['phonenumber'];
   $email=$aboutretval['email'];
   $photo=$_POST[''];

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Profile | Malaygiri Hostel</title>
	      <link rel="shortcut icon" href="../favicon.ico" />
      <!--css and js bootstrap files-->
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../css/bootstrap.css"/>
    <link rel="stylesheet" href="../css/profile.css"/>
     <link rel="stylesheet" href="../css/studentdash.css"/>
       <link rel="stylesheet" href="../css/bootstrapValidator.css"/>
  <link rel="stylesheet" href="../css/bootstrapValidator.min.css"/>
  <link rel="stylesheet" href="../css/sweetalert.css"/>
  <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/notlogin.js"></script>
    <link rel="stylesheet" href="../css/font-awesome.min.css">
      <script src="../js/sweetalert.min.js"></script>
<!--BootstrapValidator-->
    <script src="../js/bootstrapValidator.js"></script>
   <script src="../js/bootstrapValidator.min.js"></script>
   <style type="text/css">
     .pro
     {
      height:150px;
      width: 150px;
     }
   </style>
</head>
<body>
    <?php $pageid=""; ?>
  <?php $pagename=""; ?>
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
                        <a href="studentdashboard.php" class="active">
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
        <div class="row">
    <div class="col-xs-10 col-xs-offset-1">
      <div class="panel panel-default" style="margin-left:20px;">
        <div class="panel-heading">
          Profile
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-4">
         <?php echo "<img src=../uploaddoc/".$email ."/" .$file_name."  class='img-responsive pro' height=150 width=150 />";?>
            </div>
            <div class="col-sm-8">
              <table class="table" style="margin-top:10px;">
                <div class="">
                  <tr>
                    <td>Firstname:</td>
                    <td><?php echo $firstname;?></td>
                  </tr>
                   <tr>
                    <td>Lastname:</td>
                    <td><?php echo $lastname;?></td>
                  </tr>
                  <tr>
                    <td>Profile:</td>
                    <td><?php echo "Student";?></td>
                  </tr>
                  <tr>
                    <td>email id:</td>
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
