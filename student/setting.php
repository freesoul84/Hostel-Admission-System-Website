 <?php
//code for connecting mysql database
include("config.php");
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
  $email=$_SESSION['email'];
  $password=$_SESSION['password'];
//php code for saving the edited data
if(isset($_POST['savedata']))
{
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $name=$_POST['email'];
  $mail=$_POST['email'];
  $num=$_POST['phonenumber'];
  $updateq="UPDATE userdetail set email='$name',firstname='$firstname',lastname='$lastname', phonenumber='$num',email='$mail' where email='$email'";
  //image
  $updatedb=mysqli_query($connect,$updateq);
}
 //code for saving changing password
 if(isset($_POST['passsave']))
 {
  $password=$_POST['password']; #current password
   $newpass=$_POST['newpass'];#new password is taken here
   $confirmpass=$_POST['confirmpass'];#password is confirm here it is use for match with new password enter befor confirm password
   $querya="SELECT * FROM userdetail WHERE email='$email'";
   $chg_pwd=mysqli_query($connect,$querya);
   $chg_pwd1=mysqli_fetch_array($chg_pwd);
   $data_pwd=$chg_pwd1['password'];
   $srno=$chg_pwd1['srno'];
     if($newpass == $confirmpass){
       $queryb="UPDATE userdetail set password='$newpass' where email='$email'";
     $passupdate= mysqli_query($connect,$queryb);
  }
   }
 if(isset($_POST['cancel']))
 {
  //code for cancel button
  echo 'window.location.href="student/studentdashboard.php';
 }
$setquery="SELECT * from userdetail WHERE email='$email'";
$retvalsett=mysqli_query($connect,$setquery);
$settrow=mysqli_fetch_assoc($retvalsett);
 $firstname=$settrow['firstname'];
  $lastname=$settrow['lastname'];
  $email=$settrow['email'];
  $phonenumber=$settrow['phonenumber'];
  $password=$settrow['password'];
?>
<!--code for setting-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, admin-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Settings | Malaygiri Hostel</title>
      <link rel="shortcut icon" href="../favicon.ico" />
      <!--css and js bootstrap files-->
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../css/bootstrap.css"/>
    <link rel="stylesheet" href="../css/setting.css"/>
       <link rel="stylesheet" href="../css/font-awesome.min.css"/>
         <link rel="stylesheet" href="../css/sweetalert.css"/>
       <link rel="stylesheet" href="../css/bootstrapValidator.css"/>
  <link rel="stylesheet" href="../css/bootstrapValidator.min.css"/>
    <link rel="stylesheet" href="../css/studentdash.css"/>
  <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
    <script src="../js/sweetalert.min.js"></script>
<!--BootstrapValidator-->
    <script src="../js/bootstrapValidator.js"></script>
   <script src="../js/bootstrapValidator.min.js"></script>
   <style type="text/css">
     .pro
     {
      height: 200px !important;
      width: 200px !important;
     }
   </style>
</head>
<body class="backg">
    <?php $pageid=""; ?>
  <?php $pagename=""; ?>
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

  echo '<script type="text/javascript">';
     echo 'swal("Successful!", "Password is successfully changed :)", "success");';
  echo '</script>';
echo '<script type="text/javascript">';
 echo 'window.location.href="student/studentdashboard.php';
echo "</script>";
  }
  elseif($newpass != $confirmpass)
  {
  ?>
   <script type="text/javascript">
      swal("SORRY :(", "Password is not changed :)", "error");
  </script>
  <?php
}
else
{

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
                                   <a><?php echo "Welcome !"." ".$email;?></a>
                            </li>
                            <li class="dropdown">
                            <?php
                        $query="SELECT profile from userdetail where email='$email'";
                        $imgval=mysqli_query($connect,$query);
                        $take=mysqli_fetch_assoc($imgval);
                        $file_name=$take['profile'];
                        $path='"../uploaddoc/".$email ."/" .$file_name."';
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
                             <span class="glyphicon glyphicon-chevron-right" style="margin-left:90px;">
                    </li>
                    <li>
                        <a href="myallotment.php">
                            <span class="sidebar-icon"><i class="glyphicon glyphicon-list-alt"></i></span>
                            <span class="sidebar-title">My MeritRank</span>
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
        <main id="page-content-wrapper container-fluid" role="main">
        <div class="setting" style="margin-left:30px;">
      <form class="" for="" action="setting.php" method="post">
              <div class="row">
                <div class="col-sm-11 col-sm-offset-1">
              <div class="panel panel-default" style="padding-right:40px;margin-right:20px;margin-left:60px;">
                  <h1 style="margin-left:20px;">Settings</h1>
                </div>
              </div>
              </div>
              <div class="row">
                <div class="col-sm-11 col-sm-offset-1">
              <div class="panel panel-default " style="padding-right:40px;margin-right:20px;margin-left:60px;">
                <div class="panel-body" >
                  <div class="row ">
                    <div class="col-sm-3">
                    <?php echo "<img src=../uploaddoc/".$email ."/" .$file_name."  class='img-responsive pro' height=200 width=300 />";?>

                  </div>
                  <div class="col-sm-9">
                    <div class="row">
                    <div class="col-sm-9 view" id="form1">
                      <div class="row sett">
                    <div class="col-sm-3">
                      <label for="forfirstname">First name:</label>
                    </div>
                    <div class="col-sm-6 " style="margin-right:10px;">
                       <input class="text" type="text" name="firstname" value="<?php echo $firstname;?>" readonly/>
                    </div>
                  </div>
                  <div class="row sett">
                    <div class="col-sm-3">
                      <label for="lastname">lastname:</label>
                    </div>
                    <div class="col-sm-6" style="margin-right:10px;">
                      <input class="text" type="text" name="lastname" value="<?php echo $lastname;?>" readonly/>
                    </div>
                  </div>
                  <div class="row sett">
                    <div class="col-sm-3">
                      <label for="foremail">Email:</label>
                    </div>
                    <div class="col-sm-6"style="margin-right:10px;" >
                      <input class="text" type="text" name="email" value="<?php echo $email;?>" readonly/>
                    </div>
                  </div>
                  <div class="row sett">
                    <div class="col-sm-3">
                      <label for="forphone">Phone number:</label>
                    </div>
                    <div class="col-sm-6 " style="margin-right:10px;">
                      <input class="text" type="number" name="phonenumber" value="<?php echo $phonenumber; ?>" readonly/>
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
          </form>
          <form method="post" action="setting.php">
              <div class="row ">
                  <div class="row sett">
                    <div class="col-sm-3 col-sm-offset-3">
                      <label for="foruser">Password:</label>
                    </div>
                    <div class="col-sm-3 view" id="form2">
                      <input type="password" name="password" value="<?php echo $password; ?>" placeholder="current password" readonly/>
                    </div>
                    <div class="col-sm-3">
                    <center>
                     <input type="submit" class="btn btn-primary btn-sm btn-pass" value="save" name="passsave" id="edit2"></input>
                      <a id="edit3" type="submit" href="setting.php" value="cancel" name="cancel" class="btn  btn-sm btn-cancel">cancel</a>
                    </div>
                  </div>
                  <div class="row sett-pass">
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-5 view" id="form2">
                      <input type="password" name="newpass"  placeholder="new password" required="" />
                    </div>
                    <div class="col-sm-4">
                    </div>
                  </div>
                  <div class="row sett-pass">
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-5 view" id="form2">
                      <input type="password" name="confirmpass"  placeholder="confirm password" required="" />
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

    <script src="js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>

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
</body>
<?php
if($_POST['cancel'])
{
  header("Location:setting.php");
}
?>
</html>
