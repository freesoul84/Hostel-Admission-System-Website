<!--signup form-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Sign Up |  Hostel Malaygiri</title>
<!--bootstrap css and js files-->
<!-- Latest compiled and minified JavaScript -->
    <link rel="shortcut icon" href="favicon.ico" />
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/signup.css"/>
   <link rel="stylesheet" href="css/bootstrapValidator.css"/>
  <link rel="stylesheet" href="css/bootstrapValidator.min.css"/>
  <link rel="stylesheet" href="css/sweetalert.css"/>
<!-- jQuery and BOOTstrap JS-->
<script src="js/bootstrap.js" type="text/javascript" ></script>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
  <script src="js/sweetalert.min.js"></script>
<!--BootstrapValidator-->
    <script src="js/bootstrapValidator.js"></script>
   <script src="js/bootstrapValidator.min.js"></script>
</head>
<body>
	  <?php $pageid="2"; ?>
  <?php $pagename="signup"; ?>
<?php
include('config.php');
$query1=" CREATE TABLE IF NOT EXISTS `userdetail` (
  `srno` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `firstname` varchar(50) NOT NULL,
    `lastname` varchar(50) NOT NULL,
    `phonenumber` bigint(50) NOT NULL,
    `email` varchar(70) NOT NULL,
    `profile` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1
";
mysqli_query($connect,$query1);
$page="user detail";
$pagename="userdetail table";
$tbl="signup";
$inserttable="INSERT INTO tablemanage(page,pagename,tbl)
SELECT * FROM (SELECT '$page','$pagename','$tbl') AS tmp
 WHERE NOT EXISTS (
  SELECT * FROM tablemanage WHERE  tbl='$tbl') LIMIT 1;";
mysqli_query($connect,$inserttable);
?>
<!--navigation bar code-->
<nav class="navbar navbar-inverse  navbar-fixed-top" data-spy="affix" data-offset-top="40" role="navigation">
<div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand pulse">Hostel Malaygiri</a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav nav-tabs">
                  <li>
                      <a href="homepage.php">HOME</a>
                  </li>
                  <li class="">
                      <a href="homepage.php">SIGN IN</a>
                  </li>
                  <li class="active">
                      <a href="signup.php" class="active">SIGN UP</a>
                  </li>
                  <li >
                      <a href="homepage.php" >CONTACT</a>
                  </li>
                  <li >
                      <a href="homepage.php" >ABOUTUS</a>
                  </li>
                  <li>
                      <a href="homepage.php">NOTIFICATIONS</a>
                  </li>
              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
  </nav>
<!--end of navigation bar-->
 <div class="row">
      <div class="col-sm-offset-2 col-sm-8">
<h2> Sign Up</h2>
<div class="panel panel-default">
  <form class="form" action="signup.php" method="post" data-toggle="validator" id="signup-form" enctype="multipart/form-data">
  <div  class="form-group">
    <div class="row">
      <div class="col-md-6">
        <!--full name field-->
    <label for="firstname">FirstName<span style="color: red;">*</span></label>
    <input class="form-control" type="text" name="firstname" id= "firstname" placeholder="enter your firstname" required/>
    </div>
    <div class="col-md-6">
    <label for="lastname">Lastname<span style="color: red;">*</span></label>
    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="enter your lastname" required>
      </div>
       </div>
    <div class="row">
        <div class="col-sm-12">
    <!--email field-->
    <label for="email">Email id <span style="color: red;">*</span></label>
    <input type="text" class="form-control" name="email" id="email" placeholder="enter your email-id" required>
    </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
    <!--phone number field-->
    <label for="phonenumber">PhoneNumber <span style="color: red;">*</span></label>
    <input type="number" class="form-control" name="phonenumber" id="phonenumber" placeholder="enter your phone number" required>
    </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
    <!--profile picture uploading-->
    <label for="photo">Profile<span style="color: red;">*</span></label><br>
        <input type="file" name="pic_file" id='pic_file' class="form-control" />
        <br>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
    <!--password field-->
    <label for ="password">Password <span style="color: red;">*</span></label>
    <input type="password" class="form-control" name="password" id="password" placeholder="create a password" required>
    </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
    <!--retype a passoword-->
    <label for="retypepass">Retype Password <span style="color: red;">*</span></label>
    <input type="password" class="form-control" name="retypepass" id="retypepass " placeholder="retype your password " required="">
    <!--sign up button field-->
    </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
    <input type="submit"  name="submit" class="btn btn-success btn-lg  btn-block" value="Sign Up">
    </div>
  </div>
</div>
  </form>
</div>
</div>
</div>
<?php
if(isset($_POST['submit'])){
$numq="SELECT * FROM userdetail";
$checknum=mysqli_query($connect,$numq);
$count=mysqli_num_rows($checknum);
$srno=$count+1;
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$password=$_POST['password'];
$retypepass=$_POST['retypepass'];
$email=$_POST['email'];
$phonenumber=$_POST['phonenumber'];
 $msg="";
 $emailcheckq="SELECT * FROM userdetail where email='$email'";
 $retvalemail=mysqli_query($connect,$emailcheckq);
 $rowemail=mysqli_fetch_assoc($retvalemail);
 if($rowemail==0)
 {
//code to save picture photo file indatabase
   if($password == $retypepass)
      {
        $msg = "";
if(!is_dir("uploaddoc/". $email ."/")) {
    mkdir("uploaddoc/".$email ."/");
  }
    $target = "uploaddoc/".basename($_FILES['pic_file']['name']);
    echo $target;

    $photo = $_FILES['pic_file']['name'];
    if (move_uploaded_file($_FILES['pic_file']['tmp_name'], "uploaddoc/". $email ."/". $_FILES["pic_file"]["name"])) {
      $password=$retypepass;
    $query1="INSERT INTO userdetail(srno,email,password,firstname,lastname,phonenumber,profile)
    SELECT * FROM (SELECT '$srno','$email','$password','$firstname','$lastname','$phonenumber','$photo') AS tmp
    WHERE NOT EXISTS (
     SELECT email FROM userdetail WHERE email='$email') LIMIT 1; ";
      $check=mysqli_query($connect,$query1);
    }else{

  }
if($check)
{
echo '<script type="text/javascript">';
echo 'swal("Successful!", "You are signup Successfully", "success");';
echo '</script>';
echo '<script type="text/javascript">';
echo 'window.location.href="homepage.php"';
echo '</script>';
}
else
{
   echo '<script type="text/javascript">';
       echo 'sweetAlert("Oops...Sorry", "Your signup is failed", "error");';
       echo '</script>';
}
}
else
{
       echo '<script type="text/javascript">';
       echo 'sweetAlert("Oops...Sorry", "Your signup failed because password is missmatch", "error");';
       echo '</script>';
}
}
else {
  echo '<script type="text/javascript">';
      echo 'sweetAlert("Oops...Sorry", "Your signup failed because emailid already exist", "error");';
      echo '</script>';
}
}
?>
<!--bootstrap validation code-->
 <!-- Menu Toggle Script -->
  <script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
  </script>
</body>
</html>
<script>
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#pic_image')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


<script>
$(document).ready(function(){
 $(document).on('change', '#sign_file', function(){
  var name = document.getElementById("sign_file").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
  {
   alert("Invalid Image File");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("sign_file").files[0]);
  var f = document.getElementById("sign_file").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 2000000)
  {
   alert("Image File Size is very big");
  }
  else
  {
   form_data.append("sign_file", document.getElementById('sign_file').files[0]);
   $.ajax({
    url:"upload_sign.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_sign').html("<label class='text-success'>Image Uploading...</label>");
    },
    success:function(data)
    {
     $('#uploaded_sign').html(data);
    }
   });
  }
 });
});
</script>
