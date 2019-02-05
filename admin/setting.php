  <?php
//code for connecting mysql database
include("config.php");
session_start();
if (isset($_SESSION['adminname']) && isset($_SESSION['password'])) {
  $adminname=$_SESSION['adminname'];
  $password=$_SESSION['password'];
//php code for saving the edited data
if(isset($_POST['savedata']))
{
  $fullname=$_POST['fullname'];
  $name=$_POST['adminname'];
  $mail=$_POST['email'];
  $num=$_POST['phonenumber'];
  $post=$_POST['position'];
  $updateq="UPDATE admintable set adminname='$name',fullname='$fullname',position='$post', phonenumber='$num',email='$mail' where adminname='$adminname'";
  //image
  $updatedb=mysqli_query($connect,$updateq);
}
 //code for saving changing password
 if(isset($_POST['passsave']))
 {
  $password=$_POST['password']; #current password
   $newpass=$_POST['newpass'];#new password is taken here
   $confirmpass=$_POST['confirmpass'];#password is confirm here it is use for match with new password enter befor confirm password
   $querya="SELECT * FROM admintable WHERE adminname='$adminname' AND password='$password'";
   $chg_pwd=mysqli_query($connect,$querya);
   $chg_pwd1=mysqli_fetch_array($chg_pwd);
   $data_pwd=$chg_pwd1['password'];
   $srno=$chg_pwd1['srno'];
     if($newpass == $confirmpass){
       $queryb="UPDATE admintable set password='$newpass' where adminname='$adminname' and srno='$srno'";
     $passupdate= mysqli_query($connect,$queryb);
  }
   }
 if(isset($_POST['cancel']))
 {
  //code for cancel button
   header('Location:setting.php');
 }
$setquery="SELECT * from admintable where adminname='$adminname' AND password='$password'";
$retvalsett=mysqli_query($connect,$setquery);
$settrow=mysqli_fetch_assoc($retvalsett);
  $fullname=$settrow['fullname'];
  $adminname=$settrow['adminname'];
  $password=$settrow['password'];
  $position=$settrow['position'];
  $phoneno=$settrow['phonenumber'];
  $email=$settrow['email'];
?>
<!--code for setting-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-9">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, admin-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Settings | Malaygiri Hostel</title>
         <link rel="../shortcut icon" href="../favicon.ico" />
      <!--css and js bootstrap files-->
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../css/bootstrap.css"/>
  <link rel="stylesheet" href="../css/admindash.css"/>
    <link rel="stylesheet" href="../css/setting.css"/>
       <link rel="stylesheet" href="../css/bootstrapValidator.css"/>
  <link rel="stylesheet" href="../css/bootstrapValidator.min.css"/>
  <link rel="stylesheet" href="../css/sweetalert.css"/>
  <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/notlogin.js"></script>
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/simple-sidebar.css">
      <script src="../js/sweetalert.min.js"></script>
<!--BootstrapValidator-->
    <script src="../js/bootstrapValidator.js"></script>
   <script src="../js/bootstrapValidator.min.js"></script>
</head>
<body class="">
    <?php $pageid="7"; ?>
  <?php $pagename="setting"; ?>
  <!--php code-->
  <?php
    if($updatedb)
    {
?>
<script type="text/javascript">
      swal("Successful!", "Data is successfully Updated :)", "success");
  </script>
<?php
    }
    if($passupdate)
{
 header('refresh:1;url= signin.php');
  ?>
  <script type="text/javascript">
      swal("Successful!", "Password is successfully changed :)", "success");
  </script>
  <?php

  }
  elseif($newpass != $confirmpass)
  {
  ?>
   <script type="text/javascript">
      swal("SORRY :(", "Password is not changed :)", "error");
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
        <div id="sidebar-wrapper" style="background-color:white;">
            <aside id="sidebar">
                <ul id="sidemenu" class="sidebar-nav" style="background-color:white;">
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
                            <span class="glyphicon glyphicon-chevron-right act-active" style="margin-left:90px;">
                    </li>
                     <li>
                        <a href="adddata.php">
                            <span class="sidebar-icon"><i class="glyphicon glyphicon-cloud"></i></span>
                            <span class="sidebar-title">Add data/Notifications</span>
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
        <main id="page-content-wrapper" role="main" >
      <div class="" style="margin-left:30px;">
      <form class="" for="" action="setting.php" method="post">
              <div class="row">
                <div class="col-sm-10 col-sm-offset-2">
              <div class="panel panel-default" style="padding-right:140px;">
                  <h1>Settings</h1>
                </div>
              </div>
              </div>
              <div class="row">
                <div class="col-sm-10 col-sm-offset-2">
              <div class="panel panel-default ">
                <div class="panel-body" >
                  <div class="row ">
                    <div class="col-sm-3">
                      <img src="ii.png" height="200" width="200" class="image-responsive" />
                  </div>
                  <div class="col-sm-9">
                    <div class="row">
                    <div class="col-sm-9 view" id="form1">
                      <div class="row sett">
                    <div class="col-sm-3">
                      <label for="forfullname">Full name:</label>
                    </div>
                    <div class="col-sm-6 ">
                      <input class="text" type="text" name="fullname" value="<?php echo $fullname;?>" readonly/>
                    </div>
                  </div>
                  <div class="row sett">
                    <div class="col-sm-3">
                      <label for="foradmin">adminname:</label>
                    </div>
                    <div class="col-sm-6">
                      <input class="text" type="text" name="adminname" value="<?php echo $adminname;?>" readonly/>
                    </div>
                  </div>
                  <div class="row sett">
                    <div class="col-sm-3">
                      <label for="foremail">Email:</label>
                    </div>
                    <div class="col-sm-6" >
                      <input class="text" type="text" name="email" value="<?php echo $email;?>" readonly/>
                    </div>
                  </div>
                  <div class="row sett">
                    <div class="col-sm-3">
                      <label for="forpost">Position:</label>
                    </div>
                    <div class="col-sm-6" >
                      <input class="text" type="text" name="position" value="<?php echo $position; ?>" readonly/>
                    </div>
                  </div>
                  <div class="row sett">
                    <div class="col-sm-3">
                      <label for="forphone">Phone number:</label>
                    </div>
                    <div class="col-sm-6 ">
                      <input class="text" type="number" name="phonenumber" value="<?php echo $phoneno; ?>" readonly/>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                <center>
                  <input type="button" class="btn btn-primary btn-md btn-edit" value="edit" name="edit1" id="edit1"></input>&nbsp&nbsp
                 <input type="submit" class="btn btn-primary btn-md btn-save"  name="savedata" value="save" id="save1"></input>
              </center>
              </div>
            </div>
          </div>
          </div>
              <div class="row ">
                  <div class="row sett">
                    <div class="col-sm-3 col-sm-offset-3">
                      <label for="foradmin">Password:</label>
                    </div>
                    <div class="col-sm-3 view" id="form2">
                      <input type="password" name="password" value="<?php echo $password; ?>" placeholder="current password" readonly/>
                    </div>
                    <div class="col-sm-3">
                    <center>
                      <input id="edit2" type="submit" value="cancel" name="cancel" class="btn  btn-sm btn-cancel"></input>
                      <input type="submit" class="btn btn-primary btn-sm btn-pass" value="save" name="passsave" id="edit2"></input>
                    </div>
                  </div>
                  <div class="row sett-pass">
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-5 view" id="form2">
                      <input type="password" name="newpass"  placeholder="new password" />
                    </div>
                    <div class="col-sm-4">
                    </div>
                  </div>
                  <div class="row sett-pass">
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-5 view" id="form2">
                      <input type="password" name="confirmpass"  placeholder="confirm password" />
                    </div>
                    <div class="col-sm-4">
                    </div>
              </form>
                </div>
              </div>
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
<!-- Modal -->
<script type="text/javascript">
window.location.href="notlogin.php";
</script>
<?php
}
?>
<?php
if(isset($_POST['cancel']))
{
  header("Location:setting.php");
}
?>
 <!-- Menu Toggle Script -->
  <script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
  </script>
  <script>
  $('#edit1').click(function(){
    $('#form1').toggleClass('view');
    $('input').each(function(){
      var inp = $(this);
      if (inp.attr('readonly')) {
       inp.removeAttr('readonly');
      }
      else {
        inp.attr('readonly', 'readonly');
      }
    });
  });
  $('#edit2').click(function(){
    $('#form2').toggleClass('view');
    $('input').each(function(){
      var inp = $(this);
      if (inp.attr('readonly')) {
       inp.removeAttr('readonly');
      }
      else {
        inp.attr('readonly', 'readonly');
      }
    });
  });
  </script>
</body>
</html>
