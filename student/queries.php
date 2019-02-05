<?php
 include("config.php");
 session_start();
if (isset($_SESSION['email']) && isset($_SESSION['password']))
{
   $email=$_SESSION['email'];
   $password=$_SESSION['password'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Submit query | Malaygiri Hostel</title>
	   <!--css and js bootstrap files-->
     <link rel="shortcut icon" href="../favicon.ico" />
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../css/bootstrap.css"/>
    <link rel="stylesheet" href="../css/queries.css"/>
       <link rel="stylesheet" href="../css/bootstrapValidator.css"/>
  <link rel="stylesheet" href="../css/bootstrapValidator.min.css"/>
  <link rel="stylesheet" href="../css/sweetalert.css"/>
    <link rel="stylesheet" href="../css/studentdash.css"/>
  <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/font-awesome.min.css">
      <script src="../js/sweetalert.min.js"></script>
            <script src="../js/bootstrapValidator.js"></script>
   <script src="../js/bootstrapValidator.min.js"></script>
<!--BootstrapValidator-->
</head>
<body>
    <?php
  //session start
     $pageid="10";
  $pagename="student queries about Hostel Malaygiri";
$querytbl=" CREATE TABLE IF NOT EXISTS `queries` (
  `sdate` varchar(200) NOT NULL,
  `email` varchar(300) NOT NULL,
   `seatno` bigint NOT NULL,
  `department` varchar(100) NOT NULL,
  `year` varchar(30) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `phone` bigint NOT NULL,
  `query` text(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1
";
mysqli_query($connect,$querytbl);
$qw="ALTER TABLE `queries` ADD PRIMARY KEY (`sdate`)";
mysqli_query($connect,$qw);

$tablemanage=" CREATE TABLE IF NOT EXISTS `tablemanage` (
    `page` varchar(100) NOT NULL,
  `pagename` varchar(100) NOT NULL,
   `tbl` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1
";
mysqli_query($connect,$tablemanage);
$page="queries";
$pagename="Student Queries ";
$tbl="queries";
$inserttable="INSERT INTO tablemanage(page,pagename,tbl)
SELECT * FROM (SELECT '$page','$pagename','$tbl') AS tmp
 WHERE NOT EXISTS (
  SELECT * FROM tablemanage WHERE tbl='$tbl') LIMIT 1;";
mysqli_query($connect,$inserttable);
?>
<?php
//current date
$date=date("Y/m/d");
date_default_timezone_set('Asia/Kolkata');
$timestamp =  date(" H:i:s", time());
$time=$timestamp;
$dt=$date.' '.$time;
//for finding name of this perticular roll number for table name student info
$find="SELECT * FROM hostelform WHERE email='$email'";
$queryfind=mysqli_query($connect,$find);
$row=mysqli_fetch_assoc($queryfind);
$seatno=$row['seatno'];
$firstname=$row['firstname'];
$lastname=$row['lastname'];
$middlename=$row['middlename'];
$full=$lastname.' '.$firstname.' '.$middlename;
$fullname=$full;
$email=$row['email'];
$department=$row['department'];
$year=$row['year'];
$quer=$_POST['query'];
$phone=$row['mobile'];
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
                        <a href="studentdashboard.php" class="active">
                            <span class="sidebar-icon"><i class="glyphicon glyphicon-dashboard"></i></span>
                            <span class="sidebar-title">Dashboard</span>
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
                                <span class="glyphicon glyphicon-chevron-right act-active" style="margin-left:80px;">
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
  <form method="post" action="queries.php" data-toggle="validator" id="query-form">
  <div class="row">
    <div class="form-group">
  <div class="col-sm-8 col-sm-offset-2">
    <label for="query">Enter Your Query Here :</label>
    <textarea class="form-control" type="textarea" id="query" name="query" height="500"></textarea>
    </div>
      <div class="col-sm-8 col-sm-offset-2">
     <input type="submit" class="btn btn-lg btn-default" name="send" value="send"></input>
  </div>
</div>
  </div>
</form>
  </div>
        </main>
    </div>
 <?php
//query submission code
if(isset($_POST['send'])){
$queryin="INSERT INTO queries(sdate,email,seatno,department,year,fullname,phone,query) VALUES('$dt','$email','$seatno','$department','$year','$full','$phone','$quer')";
 $que=mysqli_query($connect,$queryin);
if($que)
{
?>
<script type="text/javascript">
  swal({
  title: "SUCCESSFUL",
  text: "Your Query is successfully submitted",
  timer: 2000,
  showConfirmButton: false
});
  </script>
<?php
}
else
{
?>
<script type="text/javascript">
  swal({
  title: "ERROR",
  text: "Your Query is NOT submitted",
  timer: 2000,
  showConfirmButton: false
});
  </script>
<?php
}
 }
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
