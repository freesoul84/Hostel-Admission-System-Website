<?php
//code for connecting mysql database
include("config.php");
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
  $email=$_SESSION['email'];
  $password=$_SESSION['password'];
?>
<?php
$query1="SELECT * FROM hostelform where email='$email'";
$retvalemail=mysqli_query($connect,$query1);
$rowno=mysqli_fetch_array($retvalemail);
$rollno=$rowno['seatno'];
$year=$rowno['year'];
if($year="Third Year")
{
  $tablename='tymeritlist';
}
elseif ($year=="Fourth Year")
{
  $tablename='fymeritlist';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">	<title>Allotment | Malaygiri Hostel:Hostel Admission </title>
  <!--bootstrap css files-->

    <link rel="shortcut icon" href="../favicon.ico" />
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../css/bootstrap.css"/>
  <link rel="stylesheet" href="../css/bootstrap.css"/>
   <link rel="stylesheet" href="../css/allotment.css"/>
   <link rel="stylesheet" href="../css/studentdash.css"/>
  <link rel="stylesheet" href="../css/bootstrapValidator.css"/>
  <link rel="stylesheet" href="../css/bootstrapValidator.min.css"/>
  <link rel="stylesheet" href="../css/sweetalert.css"/>
   <link rel="stylesheet" href="../css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../css/.css">
    <!--bootstrap js files-->
  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/bootstrap-select.js"></script>
       <script src="../js/sweetalert.min.js"></script>
    <script src="../js/bootstrapValidator.js"></script>
   <script src="../js/bootstrapValidator.min.js"></script>
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
                            <span class="glyphicon glyphicon-chevron-right act-active" style="margin-left:50px;">
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
    <div class="belowall">
    <!--<div class="row">
    <div align="center">
        <div class="form-group">
          <select class="selectpicker show-menu-arrow show-tick " title="Choose lecture hall..." name="classroom[]" required>
         <option value="home_branch">Merit Rank in Home Branch</option>
         <option value="all_branches">Merit Rank in All Branches</option>
        </select>
        <input type="submit" name="show"  value="SHOW" class="btn btn-default btn-sm btn-show"></input>
        </div>
    </div>
</div>-->
    <div class="row">
      <div class="col-lg-12">
      <?php
       $querycheck="SELECT * FROM $tablename";
       $retvalcheck=mysqli_query($connect,$querycheck);
     if (mysqli_num_rows($retvalcheck) > 0) {
      $query2="SELECT * FROM $tablename where rollno='$rollno'";
$retval=mysqli_query($connect,$query2);
$row1=mysqli_fetch_array($retval);
      ?>
  <div class="table-bordered table-responsive table-hover"  style="background-color:white;">
  <table class="table">
         <?php
         if(mysqli_num_rows($retval) >0)
         {
          while ($row=mysqli_fetch_array($retval)) {
            $meritrank=$row['meritrank'];
            $rollno=$row['rollno'];
            $studentname=$row['studentname'];
            $branch=$row['branch'];
            $year=$row['year'];
            $category=$row['castvalue'];
            $cgpa=$row['cgpa'];
            $sgpa=$row['sgpa'];
         ?>
          <tr>
          <th>Meritrank</th>
          <th>rollno</th>
          <th>student name</th>
           <th>Branch</th>
          <th>year</th>
          <th>category</th>
          <th>CGPA</th>
          <th>SGPA</th>
         </tr>
         <tr>
          <td><?php echo $meritrank;?></td>
          <td><?php echo $rollno;?></td>
          <td><?php echo $studentname;?></td>
          <td><?php echo $branch;?></td>
          <td><?php echo $year;?></td>
          <td><?php echo $category;?></td>
          <td><?php echo $cgpa;?></td>
          <td><?php echo $sgpa;?></td>
         </tr>
         <?php
       }
     }
   else
       {
     ?>
     <div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>!Sorry</strong> Your Name is NOT found in Merit List.
</div>
<?php
}
?>
  </table>
</div>
<?php
}
else
{
?>
<div class="alert alert-info alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>!Sorry</strong> MeritList Of Hostel Malaygiri is not uploaded
</div>
<?php
}
?>
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
