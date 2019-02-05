<!--code for new admin addititon-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add New Admin | DBATU Exam Seating Arrangement</title>
      <link rel="shortcut icon" href="../images/favicon.ico" />
      <!--bootstrap css files-->
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
   <link rel="stylesheet" href="../css/newadmin.css"/>
  <link rel="stylesheet" href="../css/sweetalert.css"/>
  <link rel="stylesheet" href="../css/admindash.css"/>
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrapValidator.css"/>
  <link rel="stylesheet" href="../css/bootstrapValidator.min.css"/>
  <!--bootstrap javascript code-->
  <script src="../js/bootstrap.js" type="text/javascript" ></script>
  <script src="../js/jquery.js" type="text/javascript"></script>
  <script src="../js/bootstrap.min.js" type="text/javascript"></script>
  <script src="../js/jquery.min.js"></script>
   <script src="../js/bootstrapValidator.js"></script>
   <script src="../js/bootstrapValidator.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/notlogin.js"></script>
     <script src="../js/sweetalert.min.js"></script>
</head>
<body >
<?php
session_start();
include("config.php");
if (isset($_SESSION['adminname']) && isset($_SESSION['password'])) {
  $adminname=$_SESSION['adminname'];
  $password=$_SESSION['password'];
//php code for adding new admin
$query=" CREATE TABLE IF NOT EXISTS `admintable` (
  `adminname` varchar(70) NOT NULL,
  `password` varchar(70) NOT NULL,
  `fullname` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
    `college` varchar(90) NOT NULL,
    `position` varchar(90) NOT NULL,
    `phonenumber` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1
";
mysqli_query($connect,$query);
$qw="ALTER TABLE `admintable` ADD PRIMARY KEY (`srno`)";
mysqli_query($connect,$qw);
?>
<?php
//for finding name of this perticular roll number for table name student info
 if(isset($_POST['add']))
     {
   $numq="SELECT * FROM admintable";
      $checknum=mysqli_query($connect,$numq);
      $count=mysqli_num_rows($checknum);
      $srno=$count+1;
     $firstname=$_POST['firstname'];
     $lastname=$_POST['lastname'];
     $phone=$_POST['phonenumber'];
     $college=$_POST['collegename'];
     $password=$_POST['password'];
     $email=$_POST['email'];
     $position=$_POST['position'];
     $full=$firstname." ".$lastname;
     $admin=$_POST['username'];
      $confirmpassword=$_POST['confirmpass'];
      if($password == $confirmpassword)
      {
     $query="INSERT INTO admintable(srno,adminname,password,fullname,phonenumber,email,position)
     SELECT * FROM (SELECT '$srno','$admin','$password','$full','$phone','$email','$position') AS tmp
     WHERE NOT EXISTS (
       SELECT adminname FROM admintable WHERE adminname='$admin'
      ) LIMIT 1; ";
$check=mysqli_query($connect,$query);
}
else
{
  ?>
   <script type="text/javascript">
  sweetAlert("Oops...", "A New Admin Adding Failed", "error");
</script>
  <?php
}
}
 ?>  <?php
if($check)
{
  ?>
  <script type="text/javascript">
swal({
  title: "Admin Added",
  text: "New admin is successfully added",
  imageUrl: "images/thumbs-up.jpg"
});
</script>
<?php
}
?>
  </script>
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
                              <span class="glyphicon glyphicon-chevron-right act-active" style="margin-left:36px;">
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
              <form action="new_admin.php" method="post" >
    <div class="container-fluid">
      <div class="row" style="margin-left:50px;">
        <div class="col-lg-8 col-lg-offset-2">
              <h2 align="center">Add New Admin</h2>
       <div class="row">
          <!--first name-->
       <div class="form-group col-lg-6" for="firstname">
          <label for="firstname" class="text"></label>
         <input type="firstname" class="form-control" name="firstname" id="firstname"   placeholder="firstname" required></input>
    </div>
    <!--lastname-->
    <div class="form-group col-lg-6" for="lastname">
       <label for="lastname" class="text"></label>
      <input type="surname" class="form-control" name="lastname"id="lastname" placeholder="lastname" required></input>
    </div>
     </div>
     <!--username-->
     <label for="username" class="text"></label>
     <div class="row">
       <div class="form-group col-lg-12" for="username">
         <input type="username" class="form-control" name="username" id="username" placeholder="username" required></input>
       </div>
     </div>
     <!--email-->
     <label for="email" class="text"></label>
     <div class="row">
       <div class="form-group col-lg-12" for="email">
         <input type="email" class="form-control" name="email" id="email" placeholder="email" required></input>
       </div>
     </div>
     <!--phonenumber-->
     <label for="phonenumber" class="text"></label>
     <div class="row">
       <div class="form-group col-lg-12" for="phonenumber">
         <input type="phonenumber" class="form-control" name="phonenumber" id="phonenumber" placeholder="phonenumber" required></input>
       </div>
     </div>
     <!--position-->
     <label for="position" class="text"></label>
     <div class="row">
       <div class="form-group col-lg-12" for="position">
          <input type="position"class="form-control"  id="position" name="position" placeholder="position" required></input>
       </div>
     </div>
     <!--password-->
     <div class="row">
       <div class="form-group col-lg-6" for="password">
               <label for="password" class="text"></label>
          <input type="password" class="form-control"  name="password" id="password" placeholder="password" required></input>
       </div>
       <!--confirmpasword-->
       <div class="form-group col-lg-6" for="confirmpass">
          <label for="confirmpass" class="text"></label>
          <input type="password" class="form-control" name="confirmpass" id="confirmpass" placeholder="confirm Password" required></input>
       </div>
     </div>
     <center>
      <!--submit button and cancel button-->
     <div class="row">
         <input type="submit" class="btn btn-primary btn-lg" style="margin-bottom:20px;" value="ADD" name="add"></input>
         <input type="submit" class="btn btn-primary btn-lg" style="margin-bottom:20px;" name="cancel" value="CANCEL"></button>
     </div>
     </center>
    </div>
    </div>
    </div>
    </div>
    </div>
 </form>
 </main>
    </div>
 <?php
}
else{
  ?>
  <script type="text/javascript">
  window.location.href="notlogin.php";
  </script>
<?php
}
?>
<!-- jQuery -->
<script src="../js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>
  <script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
  </script>
</body>
</html>
