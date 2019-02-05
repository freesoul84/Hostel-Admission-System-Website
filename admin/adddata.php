<!--tabke management-->
<?php
 include("config.php");
 session_start();
if (isset($_SESSION['adminname']) && isset($_SESSION['password'])) {
 $adminname=$_SESSION['adminname'];
 $password=$_SESSION['password'];?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add allotment files  | Malaygiri Girls Hostel</title>
  <!--bootstrao files-->
  <link rel="shortcut icon" href="../favicon.ico" />
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../css/animate.min.css"/>
  <link rel="stylesheet" href="../css/bootstrap.css"/>
  <link rel="stylesheet" href="../css/font-awesome.css"/>
  <link rel="stylesheet" href="../css/admindash.css"/>
  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/bootstrap.theme.css">
  <script src="../js/jquery.min.js"></script>
   <link rel="stylesheet" href="../css/bootstrapValidator.css"/>
   <link rel="stylesheet" href="../css/bootstrapValidator.min.css"/>
   <link rel="stylesheet" href="../css/sweetalert.css"/>
   <link rel="stylesheet" href="../css/bootstrap-select.min.css">
   <script src="../js/bootstrap-select.js"></script>
   <script src="../js/sweetalert.min.js"></script>
   <script src="../js/bootstrapValidator.js"></script>
   <script src="../js/bootstrapValidator.min.js"></script>
</head>
<!--body of table management-->
<body class="">
<?
$tablemanage=" CREATE TABLE IF NOT EXISTS `tablemanage` (
    `page` varchar(100) NOT NULL,
  `pagename` varchar(100) NOT NULL,
   `tbl` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1
";
mysqli_query($connect,$tablemanage);
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
                            </li>                        </ul>
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
                             <span class="glyphicon glyphicon-chevron-right " style="margin-left:1px;">
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
                            <span class="sidebar-title">Student Approve List</span>
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
          <?php
          $page="merit list file of third year";
          $pagename="adddata";
          $tbl="tymeritlist";
          $insertqu="INSERT INTO tablemanage(page,pagename,tbl)
          SELECT * FROM (SELECT '$page','$pagename','$tbl') AS tmp
           WHERE NOT EXISTS (
            SELECT * FROM tablemanage WHERE  tbl='$tbl') LIMIT 1;";
          $qqq=mysqli_query($connect,$insertqu);
          //code for inserting table of final year
          $page="merit list file of final year";
          $pagename="adddata";
          $tbl="fymeritlist";
          $insert="INSERT INTO tablemanage(page,pagename,tbl)
          SELECT * FROM (SELECT '$page','$pagename','$tbl') AS tmp
           WHERE NOT EXISTS (
            SELECT * FROM tablemanage WHERE  tbl='$tbl') LIMIT 1;";
          mysqli_query($connect,$insert);
           ?>
        <div class="panel panel-default" style="margin-top: 50px;margin-left:60px;margin-right:10px;padding: 20px 20px 20px 20px;padding-bottom: 200px;">
          <form class="form-horizontal content" action="adddata.php" method="post" role="form" name="upload_excel" enctype="multipart/form-data">
          <div class="row" style="margin-bottom: 10px;">
          <div class="col-sm-12">
              <center>
                <!--selection box for branch selection-->
               <div class="form-group">
                  <!--selection of branch name-->
                  <select class="selectpicker show-menu-arrow show-tick" name="year" title="Select year to upload file..." data-width="50%" required>
                  <option value="Third Year">Third Year</option>
                  <option value="Fourth Year">Fourth Year</option>
                </select>
              </div>
                </center>
          </div>
          </div>
          <?php echo $tablename;?>
              <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <div class="input-group" for="fileinput">
            <input class="form-control input-lg" type="file" name="file" id="file" class="inputfile" required="" accept="application/csv"/>
            <span class="input-group-btn">
                <input class="btn btn-default btn-go btn-lg" type="submit" name="upload" value="upload" ></input>
            </span>
        </div><!-- /input-group -->
    </div><!-- /.col-lg-4 -->
</div><!-- /.row -->
      </div>
      </form>
      </div>
        </main>
  </div>
 <?php

    if(isset($_POST['upload']))
{
  $year=$_POST['year'];
if($year=="Third Year")
{
$tablename="tymeritlist";
}
elseif($year='Fourth Year')
{
  $tablename='fymeritlist';
}
else
{

}
    $checkid="SELECT * from $tablename";
    $retvalall = mysqli_query( $connect,$checkid);
    $count=mysqli_num_rows($retvalall);
    $file=$_FILES['file']['tmp_name'];
    $handle=fopen($file,"r");
    while(($fileop=fgetcsv($handle,1000,",")) != false ){
          $meritrank=$fileop[0];
          $rollno=$fileop[1];
          $studentname= $fileop[2];
           $branch= $fileop[3];
            $year= $fileop[4];
             $category= $fileop[5];
            $sgpa=$fileop[6];
            $cgpa=$fileop[7];
           echo $meritrank;
           echo $cgpa;
                    #$stquery="INSERT into $tablename(meritrank,rollno,studentname,branch,year,category,cgpa,sgpa)
                   #values('$meritrank','$rollno','$studentname','$branch','$year','$category','$cgpa','$sgpa')";
            $stquery="INSERT into $tablename(meritrank,rollno,studentname,branch,year,category,cgpa,sgpa)
                    SELECT * FROM (SELECT '$meritrank','$rollno','$studentname','$branch','$year','$category','$cgpa','$sgpa') AS tmp
                    WHERE NOT EXISTS (
                       SELECT * FROM $tablename WHERE meritrank='$meritrank' AND rollno='$rollno' AND studentname='$studentname'
                       AND branch='$branch' AND year='$year' AND category='$category' AND cgpa='$cgpa' AND sgpa='$sgpa'
                      ) LIMIT 1;
                    ";
         $sqlstd=mysqli_query($connect,$stquery);
        }
        if($sqlstd)
{
  echo '<script type="text/javascript">';
echo 'swal("Successful!", "MeritList file is upload Successfully", "success");';
echo '</script>';
}
else
{
   echo '<script type="text/javascript">';
   echo 'sweetAlert("Oops...", "MeritList FIle is not upload!", "error");';
   echo '</script>';
}
      }
  ?>
  <?php
$qw="ALTER TABLE `$tablename`
ADD PRIMARY KEY (`meritrank`)";
mysqli_query($connect,$qw);
$ru="ALTER TABLE `$tablename`
MODIFY `meritrank` int(11) NOT NULL";
mysqli_query($connect,$ru);
$op = "SELECT * FROM $tablename ORDER BY meritrank ASC";
$result = mysqli_query($connect, $op);
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
