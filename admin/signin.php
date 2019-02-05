<!--Login program for admin -->
<?php
session_start();
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Signin | Malaygiri Hostel</title>
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="shortcut icon" href="../favicon.ico" />
<link rel="stylesheet" href="../css/bootstrap.min.css"/>
<link rel="stylesheet" href="../css/signin.css"/>
   <link rel="stylesheet" href="../css/bootstrapValidator.css"/>
  <link rel="stylesheet" href="../css/bootstrapValidator.min.css"/>
  <link rel="stylesheet" href="../css/sweetalert.css"/>
<!-- jQuery and BOOTstrap JS-->
<script src="../js/bootstrap.js" type="text/javascript" ></script>
<script src="../js/jquery.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.min.js"></script>
  <script src="../js/sweetalert.min.js"></script>
<!--BootstrapValidator-->
    <script src="../js/bootstrapValidator.js"></script>
   <script src="../js/bootstrapValidator.min.js"></script>
</head>
<body>
       <?php $pageid="5"; ?>
  <?php $pagename="admin login"; ?>
	<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title" align="center">Sign in</h1>
            <div class="account-wall">
                <img class="profile-img"  style="height:130px;width:115px;"src="admin.png" alt="admin">
                <form class="form-signin" method="post"action="signin.php" id="admin-form">
                <label for=""></label>
                <input type="text" class="form-control" name="adminname" id="adminname" placeholder="Adminname" required/>
                <label for=""></label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required/>
                <input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="Sign in"/>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Remember me
                </label>
                	<a href="forgotpassword.php" class="pull-right forgot-password" align="right">forgot password?</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php 
if(isset($_POST['submit'])){
$adminname=secure($_POST['adminname'],$connect);
$password=secure($_POST['password'],$connect);
$query ="SELECT * FROM admintable WHERE adminname='$adminname' AND password='$password'";
$q=mysqli_query($connect,$query);
if (mysqli_num_rows($q)==1) {
//  echo "correct";
$_SESSION['adminname'] = $adminname;
$_SESSION['password'] = $password;
$a=$_SESSION['adminname'];
$b=$_SESSION['password'];
   header('refresh:1;url=admindashboard.php');
echo '<script type="text/javascript">';
echo 'swal("Successful!", "You are Successfully login", "success");';
echo '</script>';
}
   else{
       echo '<script type="text/javascript">';
       echo 'sweetAlert("Oops...", "You are not logged in!", "error");';
       echo '</script>';
       }
}      ?>
