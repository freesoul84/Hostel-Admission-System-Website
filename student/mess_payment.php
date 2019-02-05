<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mess Payment | Malaygiri hostel</title>
   <link rel="shortcut icon" href="images/favicon.ico" />
      <!--css and js bootstrap files-->
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../css/bootstrap.css"/>
    <link rel="stylesheet" href="../css/mess_payment.css"/>
       <link rel="stylesheet" href="../css/bootstrapValidator.css"/>
  <link rel="stylesheet" href="../css/bootstrapValidator.min.css"/>
  <link rel="stylesheet" href="../css/sweetalert.css"/>
   <link rel="stylesheet" href="../css/studentdash.css"/>
  <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/font-awesome.min.css">
      <script src="../js/sweetalert.min.js"></script>
<!--BootstrapValidator-->
    <script src="../js/bootstrapValidator.js"></script>
   <script src="../js/bootstrapValidator.min.js"></script>
<style type="text/css">
  .img-circle
  {
    height: 200px;
    width: 200px;
  }
</style>
</head>
<body class="">
  <?php
//code for connecting mysql database
include("config.php");
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
  $email=$_SESSION['email'];
  $password=$_SESSION['password'];
?>
<?php
$queryfind="SELECT messpay FROM stddocuments where email='$email'";
$checkfind=mysqli_query($connect,$queryfind);
$fetch=mysqli_fetch_assoc($checkfind);
  $msg = "";
  if (isset($_POST['upload'])) {
if(!is_dir("../uploaddoc/". $email ."/")) {
    mkdir("../uploaddoc/".$email ."/");
}
    //$target = "../uploaddoc/".basename($_FILES['mess_file']['name']);


    $mess_pay = $_FILES['mess_file']['name'];



    $sql="UPDATE stddocuments set messpay='$mess_pay' WHERE email='$email'";
    mysqli_query($connect, $sql);

    if (move_uploaded_file($_FILES['mess_file']['tmp_name'], "../uploaddoc/". $email ."/". $_FILES["mess_file"]["name"])) {
      echo '<script type="text/javascript">';
       echo 'sweetAlert("Ok", "your file uoloaded successfully", "success");';
       echo '</script>';
       echo '<script type="text/javascript">';
       echo 'window.location.href="mess_payment.php";';
       echo '</script>';
    }else{
     echo '<script type="text/javascript">';
       echo 'sweetAlert("Oops...Sorry", "file uploading failed!", "error");';
       echo '</script>';
    }
  }


?>    <?php $pageid=""; ?>
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
                             <span class="glyphicon glyphicon-chevron-right act-active" style="margin-left:40px;">
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
        <main id="page-content-wrapper" role="main" style="margin-left:50px;margin-right:10px;">
          <?php
          $ret=$fetch['messpay'];
          if(empty($ret))
          { ?>
        <div class="container-fluid">
  <div class="row">
  <div class="col-sm-4 col-sm-offset-4">
    <a  href="https://www.onlinesbi.com" target="_BLANK" type="submit" name="hostel_payment" style="margin-top:100px;" value="make hostel payment" class="btn btn-lg btn-block  btn-primary hostel_pay">make hostel payment</a>
  </div>
  </div>
  <br/>
  <br/>
  <form method="POST" action="mess_payment.php" enctype="multipart/form-data">
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2">
      <div class="panel panel-default">
      <div class="panel-heading">
       <h5><label>Upload Mess Payment</label></h5>
      </div>
      <div class="panel-body">
       <div class="row file-up">
        <div class="col-sm-3">
         <label>Upload Mess Payment receipt</label>
        </div>
        <div class="col-sm-5 upload">
        <input type="file" name="mess_file" class="form-control" id="fee_file" accept="application/pdf" />
       Upload a PDF file of your hostel Payment receipt.File size should be between 10KB and 300KB.
        </div>
        <div class="col-sm-4">
          <div class="well">
        </div>
      </div>
      </div>
  </div>
  </div>
</div>
</div>
<center>
<div class="row">
     <input type="submit" name="upload" value="upload"class="btn btn-lg btn-success"></input>
</div>
</center>
</form>
</div>
<?php
}
else
{
 ?>
 <div class="alert alert-success alert-dismissable" style="margin:30px;">
  <strong>!SUCCESS</strong>You Alreay uploaded Mess Payment Receipt Successfully
 </div>
<?php
}
?>
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
<?php
?>
