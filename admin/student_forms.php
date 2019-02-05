<!--code for student form-->
<?php
 include("config.php");
 session_start();
if (isset($_SESSION['adminname']) && isset($_SESSION['password'])) {
 $adminname=$_SESSION['adminname'];
 $password=$_SESSION['password'];
$query1="SELECT * FROM hostelform";
$check_query1=mysqli_query($connect,$query1);
$retvaldata=mysqli_fetch_assoc($check_query1);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Student Forms Table Details | Malaygiri Hostel</title>
	   <link rel="shortcut icon" href="../favicon.ico" />
      <!--css and js bootstrap files-->
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../css/bootstrap.css"/>
    <link rel="stylesheet" href="../css/studentsform.css"/>
       <link rel="stylesheet" href="../css/bootstrapValidator.css"/>
  <link rel="stylesheet" href="../css/bootstrapValidator.min.css"/>
  <link rel="stylesheet" href="../css/sweetalert.css"/>
   <link rel="stylesheet" href="../css/admindash.css"/>
  <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/font-awesome.min.css">
     <link rel="stylesheet" href="../css/bootstrap-select.min.css">
 <script src="../js/bootstrap-select.js"></script>
    <!--BootstrapValidator-->
    <script src="../js/bootstrapValidator.js"></script>
   <script src="../js/bootstrapValidator.min.js"></script>
      <script src="../js/sweetalert.min.js"></script>
</head>
<body>
<?php
$pageid="10";
$pagename="studentsform";
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
                            <span class="sidebar-title">Add data/ Notifications</span>
                        </a>
                    </li>
                    <li>
                        <a href="student_forms.php">
                            <span class="sidebar-icon"><i class="glyphicon glyphicon-cloud"></i></span>
                            <span class="sidebar-title">Student Forms</span>
                            <span class="glyphicon glyphicon-chevron-right act-active" style="margin-left:40px;">
                        </a>
                    </li>
                    <li>
                        <a href="allotment_list.php">
                            <span class="sidebar-icon"><i class="glyphicon glyphicon-book"></i></span>
                            <span class="sidebar-title">Approve Students List</span>
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
          <form method="post" action="student_forms.php">
      <div class="container-fluid">
          <br><br>
  <div class="row">
        <div align="center">
        <div class="form-group">
          <select class="selectpicker show-menu-arrow show-tick " title="Choose year..." name="year" required>
         <option value="Third Year">Third Year</option>
         <option value="Fourth Year">Fourth Year</option>
        </select>
        </div><!-- /input-group -->
    </div><!-- /.col-lg-4 -->
  </div>
    <div  align="center">
      <input type="submit" value="show" name="show" class="btn btn-md btn-default "/>
    </div>
</form>
<!-- /.row -->
<br>
<br>
	<div class="row" style="margin-left:15px;">
	<div class="col-sm-12">
	<div class="table-responsive" style="background-color:white;">
	  <?php
           if(isset($_POST['show']))
           {
           $year=$_POST['year'];
          $sql = "SELECT * FROM hostelform WHERE year='$year' ORDER BY srno ASC";
          $result = mysqli_query($connect, $sql);
          if (mysqli_num_rows($result) > 0) {
        ?>
  <table class="table table-bordered table-responsive">
			<thead>
			<h2 align="center">Students Forms</h2>
		</thead>
		<tr>
			<th>Srno.</th>
      <th>email</th>
			<th>Enrollment No.</th>
			<th>Name</th>
			<th>Year</th>
			<th>Branch</th>
			<th></th>
      	<th></th>
			<th>Status</th>
		</tr>
        <tbody>
		 <?php
             $count=1;
            while($row = mysqli_fetch_assoc($result))
            {
              $lastname=$row['lastname'];
              $middlename=$row['middlename'];
              $firstname=$row['firstname'];
                $fullname=$lastname." ".$firstname." ".$middlename;
            $status=$row['status'];
            ?>
             <form method="post" action="individualform.php" target="_BLANK">
        <tr>
			<td><?php echo $row['srno'];?></td>
            <td><?php echo $row['email'];?></td>
			<td><?php echo $row['seatno'];?></td>
			<td><?php echo $fullname;?></td>
			<td><?php echo $row['year'];?></td>
			<td><?php echo $row['department'];?></td>
            <td><input type="checkbox" name="checkbox" value="<?php echo $row['email'] ;?>"/></td>
			<td><input type="submit" name="open" value="open" class="btn btn-sm btn-primary"></td>
			<td style="color:green;"><?php echo $status;?></td>
		</tr>
           </form>
     <?php
       $count++;
         }
     }
       else {
        ?>
<script type="text/javascript">
swal({
  title: "No form submitted",
  text: "There is no form submitted by student",
  imageUrl: "images/thumbs-up.jpg"
});
  </script>
  <?php
   }
 }
   ?>
        </tbody>
	</table>
</tbody>
</div>
</div>
</div>
</div>
        </main>
    </div>
    <?php
    session_start();
    $_SESSION['checkbox']=$_POST['checkbox'];
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
