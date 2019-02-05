<!--code for admin dashbaord-->
 <?php
 session_start();
 include("config.php");
if (isset($_SESSION['adminname']) && isset($_SESSION['password'])) {
 $adminname=$_SESSION['adminname'];
 $password=$_SESSION['password'];
$query=" CREATE TABLE IF NOT EXISTS `tyapprove` (
`seatno` varchar(25) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `department` varchar(250) NOT NULL,
    `year` varchar(50) NOT NULL,
      `cast` varchar(50) NOT NULL,
    `sgpa` decimal(10,2) NOT NULL,
    `cgpa` decimal(10,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1
";
mysqli_query($connect,$query);
$queryf=" CREATE TABLE IF NOT EXISTS `fyapprove` (
`seatno` varchar(25) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `department` varchar(250) NOT NULL,
    `year` varchar(50) NOT NULL,
      `cast` varchar(50) NOT NULL,
    `sgpa` decimal(10,2) NOT NULL,
    `cgpa` decimal(10,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1
";
mysqli_query($connect,$queryf);
$tablemanage=" CREATE TABLE IF NOT EXISTS `tablemanage` (
    `page` varchar(100) NOT NULL,
  `pagename` varchar(100) NOT NULL,
   `tbl` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1
";
mysqli_query($connect,$tablemanage);
$page="approve_list";
$pagename="final year Approve List";
$tbl="fyapprove";
$inserttable="INSERT INTO tablemanage(page,pagename,tbl)
SELECT * FROM (SELECT '$page','$pagename','$tbl') AS tmp
 WHERE NOT EXISTS (
  SELECT * FROM tablemanage WHERE  tbl='$tbl') LIMIT 1;";
mysqli_query($connect,$inserttable);
$page="approve_list";
$pagename="third year Approve List";
$tbl="tyapprove";
$inserttable="INSERT INTO tablemanage(page,pagename,tbl)
SELECT * FROM (SELECT '$page','$pagename','$tbl') AS tmp
 WHERE NOT EXISTS (
  SELECT * FROM tablemanage WHERE tbl='$tbl') LIMIT 1;";
mysqli_query($connect,$inserttable);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Allotment Manage | Malaygiri Hostel</title>
<!--bootstrap css files-->
    <link rel="shortcut icon" href="../favicon.ico" />
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../css/bootstrap.css"/>
  <link rel="stylesheet" href="../css/bootstrap.css"/>
   <link rel="stylesheet" href="../css/studentdash.css"/>
  <link rel="stylesheet" href="../css/bootstrapValidator.css"/>
  <link rel="stylesheet" href="../css/bootstrapValidator.min.css"/>
  <link rel="stylesheet" href="../css/sweetalert.css"/>
   <link rel="stylesheet" href="../css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../css/allotment_manage.css">
     <link rel="stylesheet" href="../css/admindash.css">
    <!--bootstrap js files-->
  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/bootstrap-select.js"></script>
       <script src="../js/sweetalert.min.js"></script>
    <script src="../js/bootstrapValidator.js"></script>
   <script src="../js/bootstrapValidator.min.js"></script>
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
                            <span class="sidebar-title">Add data /Notifications</span>
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
                            <span class="sidebar-title">Approve Students List</span>
                            <span class="glyphicon glyphicon-chevron-right act-active" style="margin-left:10px;">

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
        <main id="page-content-wrapper" class="container-fluid" role="main" >
            <br><br>
          <form method="post" action="allotment_list.php">
          <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
           <input type="checkbox" name="wise[]" value="branchwise" data-toggle="collapse" data-target="#demo">
           BRANCHWISE
         &nbsp&nbsp&nbsp&nbsp
        <input type="checkbox" name="wise[]" value="yearwise" data-toggle="collapse" data-target="#demo2">
          YEARWISE
         </div>
          </div>
          <br>
          <br>
          <div id="demo" class="collapse">
          <div class="row">
              <div align="center">
        <div class="form-group">
          <select class="selectpicker show-menu-arrow show-tick " title="Choose branch..." name="branch">
         <option value="Mechanical Engineering">Mechanical Engineering</option>
         <option value="Electrical Engineering">Electrical Engineering</option>
         <option value="Electronic Engineering A">Electronic Engineering A</option>
             <option value="Electronic Engineering B">Electronic Engineering B</option>
         <option value="Chemical Engineering">Chemical Engineering</option>
         <option value="Petrochemical Engineering">Petrochemical Engineering</option>
         <option value="Computer Engineering">Computer Engineering</option>
         <option value="IT Engineering">IT Engineering</option>
         <option value="Civil Engineering">Civil Engineering</option>
        </select>
        </div><!-- /input-group -->
    </div><!-- /.col-lg-4 -->
        <div align="center">
        <div class="form-group">
          <select class="selectpicker show-menu-arrow show-tick " title="Choose year..." name="year1" >
         <option value="Third Year">Third Year</option>
         <option value="Fourth Year">Fourth Year</option>
        </select>
        </div><!-- /input-group -->
    </div><!-- /.col-lg-4 -->
    <div  align="center">
    <input type="submit" name="show" value="show" class="btn btn-lg btn-default">
    </div>
  </div>

</div>
  <div id="demo2" class="collapse">
<div align="center">
<div class="form-group">
  <select class="selectpicker show-menu-arrow show-tick " title="Choose year..." name="year" >
 <option value="Third Year">Third Year</option>
 <option value="Fourth Year">Fourth Year</option>
</select>
</div><!-- /input-group -->
</div><!-- /.col-lg-4 -->
<div  align="center">
<input type="submit" name="show" value="show" class="btn btn-lg btn-default">
</div>
</div>
<!-- /.row -->
<br>
<br>
</form>
<div class="row" style="margin:10px;background-color:white;">
  <div class="col-sm-12">
      <?php
      if(isset($_POST['show']))
      {
        $tape=$_POST['wise'];
           foreach ($tape as $val){
             $selection=$val;

           }
           if($selection=="branchwise")
           {
           $department=$_POST['branch'];
           $year=$_POST['year1'];

           $Sql = "SELECT * FROM hostelform  WHERE status='approve' AND department='$department' AND year='$year' ORDER BY srno ASC";
          $result = mysqli_query($connect, $Sql);
          $count=0;
        }
        if($selection=='yearwise')
        {
          $year=$_POST['year'];

          $queryyear="SELECT * FROM hostelform WHERE status='approve' AND year='$year' ORDER BY srno ASC";
          $result=mysqli_query($connect,$queryyear);
        }
          if (mysqli_num_rows($result) > 0) {
            ?>
    <div class="table-responsive">
  <table class="table table-bordered table-hover table-responsive">
    <tr>
      <th align="center">Srno.</th>
      <th align="center">Enrollment no.</th>
      <th align="center">Fullname</th>
      <th align="center">Branch</th>
      <th align="center">Year</th>
      <th align="center">Cast</th>
      <th align="center">SGPA</th>
      <th align="center">CGPA</th>
    </tr>
  <?php while($row = mysqli_fetch_assoc($result)) {
       $srno=$count+1;
       $seatno=$row['seatno'];
       $firstname=$row['firstname'];
       $lastname=$row['lastname'];
       $middlename=$row['middlename'];
       $fullname=$lastname.' '.$firstname.' '.$middlename;
       $department=$row['department'];
       $dept=$department;
       $year=$row['year'];
          $ye=$year;
       $cast=$row['cast'];
       $sgpa=$row['sgpa'];
       $cgpa=$row['cgpa'];
       if($year=='Third Year')
       {
         $approvequery="INSERT INTO tyapprove(seatno,fullname,department,year,cast,sgpa,cgpa)
         SELECT * FROM (SELECT '$seatno','$fullname','$department','$year','$cast','$sgpa','$cgpa') AS tmp
          WHERE NOT EXISTS (
           SELECT * FROM tyapprove WHERE seatno='$seatno' AND fullname='$fullname' AND department='$department' AND year='$year' AND cast='$cast' AND sgpa='$sgpa' AND cgpa='$cgpa') LIMIT 1;";
        mysqli_query($connect,$approvequery);
      }
      if($year=='Fourth Year')
      {
        $approvequery="INSERT INTO fyapprove(seatno,fullname,department,year,cast,sgpa,cgpa)
        SELECT * FROM (SELECT '$seatno','$fullname','$department','$year','$cast','$sgpa','$cgpa') AS tmp
         WHERE NOT EXISTS (
          SELECT * FROM fyapprove WHERE seatno='$seatno' AND fullname='$fullname' AND department='$department' AND year='$year' AND cast='$cast' AND sgpa='$sgpa' AND cgpa='$cgpa') LIMIT 1;";
       mysqli_query($connect,$approvequery);
     }
    ?>
    <tr>
      <td><?php echo $srno; ?></td>
      <td><?php echo $seatno;?></td>
      <td><?php echo $fullname;?></td>
      <td><?php echo $department;?></td>
      <td><?php echo $year;?></td>
      <td><?php echo $cast;?></td>
      <td><?php echo $sgpa;?></td>
        <td><?php echo $cgpa;?></td>
    </tr>
    <?php
   $srno++;
  }
  ?>
  </table>
</div>
<?php
}
}
?>
</div>
</div>
<div class="row">
  <!--action="../listaction/export.php"-->
 <form class="form-horizontal" action="../listaction/export.php" method="post" name="upload_excel"
           enctype="multipart/form-data">
              <?php
               session_start();
                   if($selection=='branchwise')
                   {
                     $_SESSION['branchwise']=$selection;
                     $department=$_POST['branch'];
                     $_SESSION['branch']=$department;
                     $year=$_POST['year1'];
                     $_SESSION['year1']=$year;
                    $checksub="SELECT * FROM hostelform  WHERE department='$department' AND year='$year' AND status='approve' ";
                    $retvalsub = mysqli_query($connect,$checksub);
                     $count=mysqli_num_rows($retvalsub);
                   }
                   if($selection=='yearwise')
                   {
                     $_SESSION['yearwise']=$selection;
                       $year=$_POST['year'];
                       $_SESSION['year']=$year;
                     $checksub="SELECT * from hostelform where status='approve' AND year='$year'";
                     $retvalsub = mysqli_query($connect,$checksub);
                      $count=mysqli_num_rows($retvalsub);
                   }
                  if($count > 0 )
                  { ?>
           <center>
            <div class="col-md-12">
       <div class="form-group">
                     <input type="submit" name="export" class="btn btn-primary btn-lg button-loading impo btn-import btn-export" value="export"/>
        </div>
      </div>
      </center>
      <?php } ?>
 </form>
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
