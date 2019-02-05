<!--php code for login of the user-->
<?php
session_start();
include("config.php");
?>
<!--code for homepage-->
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Malaygiri | Hostel Admission system</title>
    <!--bootstrap cssand js files code-->
    <link rel="shortcut icon" href="favicon.ico" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/grayscale.css" rel="stylesheet">
      <link href="css/homepage.css" rel="stylesheet">
       <link href="css/login.css" rel="stylesheet">
              <link href="css/pro.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
       <link href="font-awesome/css/font-awesome.css">
    <link href="" rel="stylesheet" type="text/css">
    <link href="" rel="stylesheet" type="text/css">
    <!-- Theme CSS -->
    <link href="css/grayscale.min.css" rel="stylesheet">
      <link rel="stylesheet" href="css/sweetalert.css"/>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <!-- Theme JavaScript -->
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/grayscale.min.js"></script>
      <!--css and js bootstrap files-->
      <script src="js/sweetalert.min.js"></script>

</head>
<?php $pageid="1";?>
<?php $pagetext="homepage"; ?>
<!--code for navigation bar-->
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-play-circle"></i> <span class="light">HOSTEL</span> MALAYGIRI
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="active">
                    </li>
                    <li>
                        <a class="page-scroll" href="#login">Login</a>
                    </li>
                     <li>
                        <a class="page-scroll" href="signup.php">Signup</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#notification">Notifications</a>
                    </li>
                     <li>
                        <a class="page-scroll" href="#faculty">Faculty</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="gallery.php">Gallery</a>
                    </li>
                      <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Intro Header -->
    <header class="introduct">
        <!--code for front page carousel-->
        <div class="caro">
<div id="myCarousel" class="carousel fade-carousel slide" data-ride="carousel" data-interval="3500" id="bs-carousel">
  <!-- Overlay -->
  <div class="overlay"></div>
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
    <li data-target="#bs-carousel" data-slide-to="1"></li>
    <li data-target="#bs-carousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="item slides active">
      <div class="slide-1"></div>
      <div class="screen-word">
        <hgroup>
            <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">Hostel Malaygiri</h1>
                        <p class="intro-text">Dr.Babasaheb Ambedkar Technological University,Lonere</p>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
            </div>
        </hgroup>
      </div>
    </div>
      <!--slide two-->
    <div class="item slides">
      <div class="slide-2"></div>
      <div class="screen-word">
        <hgroup>
            <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">Hostel Malaygiri</h1>
                        <p class="intro-text">Dr.Babasaheb Ambedkar Technological University,Lonere</p>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
            </div>
        </hgroup>
      </div>
    </div>
      <!--slide three-->
    <div class="item slides">
      <div class="slide-3"></div>
      <div class="screen-word">
        <hgroup>
            <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">Hostel Malaygiri</h1>
                        <p class="intro-text">Dr.Babasaheb Ambedkar Technological University,Lonere</p>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
            </div>
        </hgroup>
      </div>
    </div>
  <!-- Carousel nav -->
<a class="carousel-control left" href="#myCarousel"
data-slide="prev"></a>
<a class="carousel-control right" href="#myCarousel"
data-slide="next"></a>
         </div>
            </div>
</div>
<!--end of carousel-->
    </header>
    <!-- About Section -->
    <section id="login" class="container login-content">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-8">
                <h2 class="small"><center >Login Here !</center></h2>
            <div class="panel panel-default">
        <div class="form-group">
        <form action="homepage.php" method="post" id="form1">
               <label for="email">email</label/>
          <input type="text" class="form-control" name="email" id="email" placeholder="enter your email" required />
         <label for="password">Password</label/>
          <input type="password" class="form-control" name="password" id="password" placeholder="enter your password" required />
          <input type="submit" style="text-transform:none;" class="btn btn-success btn-lg btn-block small" value="Login" name="login" />
          <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
       </div>
       <center style="margin-bottom:10px;">--------------------------OR---------------------------</center>
     <input type="submit" style="text-transform:none;border-color:red; background-color:white;color:red;" class="btn google-sign btn-md btn-block small" value="Log in with google" name="google" />
      <input type="submit" style="text-transform:none; border-color:blue; background-color:white;color:blue;" class="btn facebook-sign btn-md btn-block small" value="Log in with facebook" name="facebook" />
         <a class="forgot-password" href="student/forgot_password.php" >Forgot Password</a>
         <p class="acc-dont">Don't have account yet?<br>
            <a   href="signup.php" >Sign up</a></p>
        </form>
        </div>
        </div>
        </div>
        </div>
    </section>
    <!-- Contact Section -->
    <section id="notification" class="container contact-content text-center">
                <div class="row">
            <div class="col-lg-12">
                <h2>Notifications</h2>
                <div class="panel panel-notify panel-default" target="_BLANK">
                <form method="post" action="homepage.php">
                <div class="row">
                <div class="col-sm-12">
              <div class="row" style="margin-left: 5px;margin-right: 5px;">
              <div class="col-sm-6"><!--for third year-->
              <center>
              <input type="submit" name="third_year" style="border-radius: 25px;" class="btn btn-success btn-block btn-md button-glow" value="merit list of third year">
              </center>
              </div>
              <div class="col-sm-6"><!--for fourth year-->
              <center>
              <input type="submit" name="fourth_year" style="border-radius: 25px;" class="btn btn-success btn-block btn-md button-glow" value="merit list of fourth year">
              </center>
              </div>
              </div>
              </div></div>
              </form>
                </div>
            </div>
        </div>
    </section>
     <!-- Contact Section -->
    <section id="faculty" class="container contact-content text-center">
                <div class="row">
            <div class="col-lg-12">
                <h2>Hostel Faculty Members</h2>
    <div class="row">
        <div class="col-sm-6">
          <div class="">
          <h3 align="center">RECTOR</h3>
        </div>
         <center><img src="hivare.png" align="center" alt="Prof.Sadhana Hivre" height="125" width="110"><center>
         <br>
        <div class="">
          <label align="center">Prof.Sadhana Ranojirao Hivre</label>
        </div>
        <div class="">
          <label align="center">Information Technology Department</label>
        </div>
        </div>
                <div class="row">
        <div class="col-sm-6">
          <div class="">
          <h3 align="center">ASSISTENT RECTOR</h3>
        </div>
         <center><img src="sheth.png" align="center" alt="Prof.Sheth" height="125" width="110"><center>
         <br>
        <div class="">
          <label align="center">Prof.Sheth</label>
        </div>
        <div class="">
          <label align="center">Electrical Department</label>
        </div>
        </div>
            </div>
        </div>
         </div>
    </section>
        <!-- Download Section -->
    <section id="about" class=" text-center about-content">
        <div class="about-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>About Hostel</h2>
                    <p>Dr.Babasaheb Ambedkar Technological University,Lonere-402103</p>
                    <p> HOSTEL MALAYGIRI</p>
                    <P>Vidyavihar-Lonere,Tal.Mangaon,Dist.Raigad,Maharashtra,India</P>
                      <P>Total Rooms Avilable:140</P>
                </div>
            </div>
        </div>
    </section>
    <!--notification section-->
    <!-- Contact Section -->
    <section id="contact" class="container notify-content text-center">
      <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Contact Us</h2>
                <p>Hostel Malaygiri:</p>
                <p>Dr.Babasaheb Ambedkar Technological University,Lonere</p>
                <p><a href="mailto:hostelmalaygiri@gmail.com">hostelmalaygiri@gmail.com</a>
                </p>
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="#" class="btn btn-default btn-lg"><i class="fa fa-instagram fa-fw"></i> <span class="network-name">Instagram</span></a>
                    </li>
                    <li>
                        <a href="#" class="btn btn-default btn-lg"><i class="fa fa-google fa-fw"></i> <span class="network-name">Google+</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <footer>
        <div class="container text-center">
            <p>Copyright &copy;Malaygiri Hostel Admission System 2017-2018</p>
        </div>
    </footer>
</body>

</html>
<script type="text/javascript">
  $('#form1').validate({
  rules:{}
});
</script>
<?php

if(isset($_POST['login'])){
$email=secure($_POST['email'],$connect);
$password=secure($_POST['password'],$connect);
echo $email;
echo $password;
$query1 ="SELECT * FROM userdetail WHERE email='$email' AND password='$password'";
$q=mysqli_query($connect,$query1);
if (mysqli_num_rows($q)==1) {
//  echo "correct";
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
echo '<script type="text/javascript">';
echo 'swal("Successful!", "You are Successfully login", "success");';
echo '</script>';
echo '<script type="text/javascript">';
echo 'window.location.href="student/studentdashboard.php"';
echo "</script>";
}
   else{
       echo '<script type="text/javascript">';
       echo 'sweetAlert("Oops...", "You are not logged in!", "error");';
       echo '</script>';
       }
}      ?>
<?php
if(isset($_POST['third_year']))
{
echo '<script type="text/javascript">';
echo 'window.open("merit/thirdyear.php","_BLANK")';
echo "</script>";
}

if(isset($_POST['fourth_year']))
{
echo '<script type="text/javascript">';
echo 'window.open("merit/fourthyear.php","_BLANK")';
echo "</script>";
}
if(isset($_POST['google']))
{
  echo '<script type="text/javascript">';
  echo 'sweetAlert("Oops...", "Login With Google does not work !", "error");';
  echo "</script>";
}
if(isset($_POST['facebook']))
{
  echo '<script type="text/javascript">';
  echo 'sweetAlert("Oops...", "Login with Facebook does not work !", "error");';
  echo "</script>";
}
?>
