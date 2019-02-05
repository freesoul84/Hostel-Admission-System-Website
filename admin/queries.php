<!--queries.php code-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Queries | DBATU Exam Seating Arrangement System</title>
  <!--bootstrao files-->
      <link rel="shortcut icon" href="../favicon.ico" />
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../css/bootstrap.css">
     <link rel="stylesheet" href="../css/bootstrapValidator.css"/>
  <link rel="stylesheet" href="../css/bootstrapValidator.min.css"/>
    <link rel="stylesheet" href="../css/admindash.css"/>
  <link rel="stylesheet" href="../css/sweetalert.css"/>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/notlogin.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/bootstrap.theme.css">
    <link rel="stylesheet" href="../css/table_manage.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
   <script src="../js/sweetalert.min.js"></script>
    <script src="../js/bootstrapValidator.js"></script>
   <script src="../js/bootstrapValidator.min.js"></script>
</head>
<body class="">
  <?php
  include("config.php");
 session_start();
 if (isset($_SESSION['adminname']) && isset($_SESSION['password'])) {
  $adminname=$_SESSION['adminname'];
  $password=$_SESSION['password'];?>
  <?php
  //connection code
  $tablemanage=" CREATE TABLE IF NOT EXISTS `tablemanage` (
  `page` varchar(100) NOT NULL,
   `pagename` varchar(100) NOT NULL,
   `tbl` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1
";
mysqli_query($connect,$tablemanage);
$page="queries";
$pagename="query table";
$tbl="queries";
$inserttable="INSERT INTO tablemanage(page,pagename,tbl)
SELECT * FROM (SELECT '$page','$pagename','$tbl') AS tmp
 WHERE NOT EXISTS (
  SELECT tbl FROM tbl='$tbl'
  ) LIMIT 1;";
$er=mysqli_query($connect,$inserttable);
  ?>
<?php
//code for solve button
if(isset($_POST['solve'])){
  //connection code
  $email=$_POST['email'];
  $query=$_POST['query'];
  //delete query
$delete="DELETE FROM queries WHERE email='$email' AND query='$query'";
$checkdel=mysqli_query($connect,$delete);
}
?>
<?php
//connection code
$query="SELECT * from queries ORDER BY sdate ASC";
$result=mysqli_query($connect,$query);
?>
  <?php
if($checkdel)
{
?>
<script type="text/javascript">
  swal({
  title: "Query Solved :p",
  text: "Query is solved successfully",
  timer: 2000,
  showConfirmButton: true
});
  </script>
<?php
}
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
                          <span class="glyphicon glyphicon-chevron-right act-active" style="margin-left:50px;">
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
        <div class="page-content container-fluid">
          <!--code for diplaying code-->
                        <div class="table-responsive ">
                          <?php if(mysqli_num_rows($result)>0){ ?>
                          <center><h2>Queries</h2></center>
                          <table class="table table-bordered table-hover">
                      <thead>
                        <tr>

                          <th align="center">Sdate</th>
                          <th align="center">Email</th>
                          <th align="center">SeatNo.</th>
                          <th align="center">Department</th>
                          <th align="center">Year</th>
                          <th align="center">Fullname</th>
                          <th align="center">Phone</th>
                          <th align="center">Query</th>
                          <th align="center">Status</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php $i=1; while($row=mysqli_fetch_array($result)){?>
                         <form method="post" action="queries.php">
                        <tr>
                          <td><input type="text"  name="sdate" value="<?php echo $row['sdate'];?>" readonly/></td>
                          <td><input type="text" name="email" value="<?php echo $row['email'];?>"  readonly/></td>
                          <td><input type="text"  name="seatno" value="<?php echo $row['seatno'];?>"  readonly/></td>
                          <td><input type="text" name="department" value="<?php echo $row['department'];?>"  readonly/></td>
                          <td><input type="text" name="year" value="<?php echo $row['year'];?>"  readonly/></td>
                          <td><input type="text" name="fullname" value="<?php echo $row['fullname'];?>"  readonly/></td>
                          <td><input type="text" name="phone" value="<?php echo $row['phone'];?>"  readonly/></td>
                          <td><input type="text" name="query" value="<?php echo $row['query'];?>"  readonly/></td>
                          <td><input type="submit" name="solve" value="solve" class="btn btn-primary btn-sm btn-solve"></input></td>
                        </tr>
                             </form>
                        <?php
                         $i++;
                         $sum=$i;
                       } ?>
                      </tbody>
                    </table>
            </div>
        </div>
    </div>
  </div>
  <?php }
  else {
  ?>
  <script type="text/javascript">
swal({
  title: "NO QUERY",
  text: "There are no queries",
  imageUrl: "images/thumbs-up.jpg"
});
  </script>
  <?php
   }
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
  <script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
  </script>
  <script>
  function resizeInput() {
    $(this).attr('size', $(this).val().length);
}

$('input[type="text"]')
    // event handler
    .keyup(resizeInput)
    // resize on page load
    .each(resizeInput);
  </script>
</body>
</html>
