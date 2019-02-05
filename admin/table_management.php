<!--tabke management-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Table Management | Malaygiri Girls Hostel</title>
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
<!--body of table management-->
<body class="">
<?php
 session_start();
 include("config.php");
if (isset($_SESSION['adminname']) && isset($_SESSION['password'])) {
 $adminname=$_SESSION['adminname'];
 $password=$_SESSION['password'];
 //code for creating table table management
 $querytbl=" CREATE TABLE IF NOT EXISTS `tablemanage` (
  `page` varchar(200) NOT NULL,
  `pagename` varchar(200) NOT NULL,
   `tbl` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1
";
mysqli_query($connect,$querytbl);
if(isset($_POST['delete'])){
  $checkvalue=$_POST['checkbox'];
  $tablequery="SELECT page,pagename,tbl from tablemanage where tbl='$checkvalue'";
  $retvaltable=mysqli_query($connect,$tablequery);
  $tablename=mysqli_fetch_array($retvaltable);
  $tbl=$tablename['tbl'];
$truncate="TRUNCATE table $tbl";
$delete="DELETE FROM tablemanage WHERE tbl='$tbl'";
$checktrun=mysqli_query($connect,$truncate);
$checkdel=mysqli_query($connect,$delete);
}
$query="SELECT page,pagename,tbl from tablemanage";
$result=mysqli_query($connect,$query);
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
                            <span class="sidebar-title">Add data</span>
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
                            <span class="sidebar-title">Approve Student List</span>
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
                                  <span class="glyphicon glyphicon-chevron-right " style="margin-left:10px;">
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
        <div class="container-fluid">
                        <div class="table-responsive ">
                          <?php if(mysqli_num_rows($result)>0){

                           ?>
                          <center><h2>Table Management</h2></center>
                          <table class="table table-bordered table-hover">
                      <thead>
                        <tr>

                          <th align="center">srno</th>
                          <th align="center">Page name</th>
                          <th align="center">page</th>
                          <th align="center">tablename</th>
                          <th align="center">select table</th>
                          <th align="center">Delete</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php $count=1; while($row=mysqli_fetch_array($result)){?>
                         <form method="post" action="table_management.php">
                        <tr>
                          <td><?php echo $count;?></td>
                           <td><?php echo $row['pagename'];?></td>
                          <td><?php echo $row['page'].".php";?></td>
                           <td><?php echo $row['tbl'];?></td>
                           <td><input type="checkbox" name="checkbox" value="<?php echo $row['tbl'] ;?>"/></td>
                          <td><input type="submit" class="btn btn-danger btn-lg" name="delete" value="delete" /></td>
                        </tr>
                             </form>
                        <?php
                         $count++;
                       } ?>
                         <?php }
  else {
  ?>
  <script type="text/javascript">
swal({
  title: "NO Table",
  text: "There is no table in database",
  imageUrl: "images/thumbs-up.jpg"
});
  </script>
  <?php
   }
   ?>

                      </tbody>
                    </table>
            </div>
        </div>
        </main>
  </div>
   <?php }
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
 <?php
if($checkdel)
{
?>
<script type="text/javascript">
  swal({
  title: "Table Successfully Deleted",
  text: "The table is deleted",
  timer: 2000,
  showConfirmButton: true
});
  </script>
<?php
}
  ?>
