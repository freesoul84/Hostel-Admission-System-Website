<!--code to save picture photo file indatabase-->
<?php
//code for connecting mysql database
//include("config.php");
session_start();

if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
  $email=$_SESSION['email'];
  $password=$_SESSION['password'];
  $page="student_forms";
  $pagename="Students Submitted Forms ";
  $tbl="stddocuments";
  $inserttable="INSERT INTO tablemanage(page,pagename,tbl)
  SELECT * FROM (SELECT '$page','$pagename','$tbl') AS tmp
   WHERE NOT EXISTS (
    SELECT * FROM tablemanage WHERE  tbl='$tbl') LIMIT 1;";
  mysqli_query($connect,$inserttable);
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Student dashboard | Malaygiri Hostel</title>
<meta charset="utf-8">
<!--Bootstrap css files-->
  <link rel="shortcut icon" href="../favicon.ico" />
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../css/animate.min.css"/>
  <link rel="stylesheet" href="../css/bootstrap.css"/>
  <link rel="stylesheet" href="../css/font-awesome.css"/>
  <link rel="stylesheet" href="../css/font-awesome.min.css"/>
   <link rel="stylesheet" href="../css/sweetalert.css"/>
     <link rel="stylesheet" href="../css/bootstrapValidator.css"/>
  <link rel="stylesheet" href="../css/bootstrapValidator.min.css"/>
  <link rel="stylesheet" href="../css/studentdash.css"/>
  <script src="../js/jquery.js"></script>
  <!--bootstrap js files-->
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.min.js"></script>
       <script src="../js/sweetalert.min.js"></script>
  <!--BootstrapValidator-->
    <script src="../js/bootstrapValidator.js"></script>
   <script src="../js/bootstrapValidator.min.js"></script>
</head>
<body>
<?php
//code for connecting mysql database
include("config.php");
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
  $email=$_SESSION['email'];
  $password=$_SESSION['password'];
  $query3="SELECT * FROM userdetail where email='$email'";
$check=mysqli_query($connect,$query3);
$retval=mysqli_fetch_assoc($check);
$img1=$retval['profile'];

  //echo '<iframe src="profilepic/' . $_SESSION['email'] . 'res.pdf"width="500px" height="500px"></iframe>';
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
                        <a href="dashboard.php" class="active">
                            <span class="sidebar-icon"><i class="glyphicon glyphicon-dashboard"></i></span>
                            <span class="sidebar-title">Dashboard</span>
                            <span class="glyphicon glyphicon-chevron-right act-active" style="margin-left:70px;">
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
        <main id="page-content-wrapper" role="main" style="margin-top:40px;">
        <?php
  $connect = mysqli_connect("localhost", "root", "alkesha15", "malaygiri_hostel");
  $msg = "";

  if (isset($_POST['submit'])) {
    //$target = "../upload".basename($_FILES['pic_file']['name']);
if(!is_dir("../uploaddoc/". $email ."/")) {
    mkdir("../uploaddoc/".$email ."/");
}
    $photo = $_FILES['pic_file']['name'];
    $sign = $_FILES['sign_file']['name'];
    $sem5 = $_FILES['sem5_file']['name'];
    $sem6 = $_FILES['sem6_file']['name'];
    $clgfee = $_FILES['clgfee_file']['name'];
     $querycast="SELECT castvalue from hostelform where email='$email'";
      $checkcast=mysqli_query($connect,$querycast);
      $rowcast=mysqli_fetch_assoc($checkcast);
     $check=$rowcast['castvalue'];
      if($check=="yes")
      {
    $castc = $_FILES['castC_file']['name'];
    $castv= $_FILES['castV_file']['name'];
    $nc= $_FILES['nc_file']['name'];
}
    //$sql = "INSERT INTO student_document (photo,sign,sem5,sem6,clgfee,cast_certificate,cast_validity,non_crimiliar) VALUES ('$photo','$sign','$sem5','$sem6','$clgfee','$castc','$castv','$nc')"
      if($check=="yes")
      {
         $sql="INSERT INTO stddocuments(email,photograph,signature,firstmark,secondmark,feereceipt,castcert,castval,noncrim)
             VALUES('$email','$photo','$sign','$sem5','$sem6','$clgfee','$castc','$castv','$nc')";
    $yeah=mysqli_query($connect, $sql);
    if (move_uploaded_file($_FILES['pic_file']['tmp_name'], "../uploaddoc/". $email ."/". $_FILES["pic_file"]["name"])
    && move_uploaded_file($_FILES['sign_file']['tmp_name'], "../uploaddoc/". $email ."/". $_FILES["sign_file"]["name"])
    &&move_uploaded_file($_FILES['sem5_file']['tmp_name'], "../uploaddoc/". $email ."/". $_FILES["sem5_file"]["name"])
     && move_uploaded_file($_FILES['sem6_file']['tmp_name'], "../uploaddoc/". $email ."/". $_FILES["sem6_file"]["name"])
      && move_uploaded_file($_FILES['clgfee_file']['tmp_name'], "../uploaddoc/". $email ."/". $_FILES["clgfee_file"]["name"])
      &&
       move_uploaded_file($_FILES['nc_file']['tmp_name'], "../uploaddoc/". $email ."/". $_FILES["nc_file"]["name"]) &&
      move_uploaded_file($_FILES['castV_file']['tmp_name'], "../uploaddoc/". $email ."/". $_FILES["castV_file"]["name"]) &&
      move_uploaded_file($_FILES['castC_file']['tmp_name'], "../uploaddoc/". $email ."/". $_FILES["castC_file"]["name"])) {
      if($yeah)
      {
      echo '<script type="text/javascript">';
       echo 'sweetAlert("Ok", "your file uoloaded successfully", "success");';
       echo '</script>';
       echo '<script type="text/javascript">';
       echo 'window.location.href="hostelform.php"';
       echo "</script>";
    }else{
      echo '<script type="text/javascript">';
       echo 'sweetAlert("Oops...Sorry", "file uploading failed!", "error");';
       echo '</script>';
    }
  }
}
  elseif($check=="no") {

         $sql="INSERT INTO stddocuments(email,photograph,signature,firstmark,secondmark,feereceipt)
         VALUES('$email','$photo','$sign','$sem5','$sem6','$clgfee')";
          $checkno=mysqli_query($connect, $sql);
    if (move_uploaded_file($_FILES['pic_file']['tmp_name'], "../upload". $email ."/". $_FILES["pic_file"]["name"])
    && move_uploaded_file($_FILES['sign_file']['tmp_name'], "../upload". $email ."/". $_FILES["sign_file"]["name"])
    && move_uploaded_file($_FILES['sem5_file']['tmp_name'], "../upload". $email ."/". $_FILES["sem5_file"]["name"])
     && move_uploaded_file($_FILES['sem6_file']['tmp_name'], "../upload". $email ."/". $_FILES["sem6_file"]["name"])
     && move_uploaded_file($_FILES['clgfee_file']['tmp_name'], "../upload". $email ."/". $_FILES["clgfee_file"]["name"]))
     {
      if($checkno)
      {
       echo '<script type="text/javascript">';
       echo 'sweetAlert("Ok", "your file uoloaded successfully", "success");';
       echo '</script>';
      }
    else{
      echo '<script type="text/javascript">';
       echo 'sweetAlert("Oops...Sorry", "file uploading failed!", "error");';
       echo '</script>';

    }
  }
}
  }
  ?>
<div class="container-fluid">
 <form method="POST" action="upload_doc.php" enctype="multipart/form-data">
  <div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading">
       Upload Documents
      </div>
      <div class="panel-body">
         <div class="row" style="margin-bottom:15px;">
        <div class="col-sm-3">
         <label>Upload Photograph</label>
        </div>
        <div class="col-sm-5 upload">

         <input type="file" name="pic_file" id='pic_file'  class="form-control"  accept="image/*" onchange="readURLpic(this)"; />
        Upload a 3.5cm X 4.5cm (width X height) photograph in JPEG/JPG format with maximum pixel resolution 480 X 640 and minimum pixel resolution 240 X 320  Aspect ratio (width X height) has to be between 0.6603 and 0.8933 ).File size should be between 2KB and 200KB
        </div>
        <div class="col-sm-4">
        <div class="well" align="center"> <img id="pic_image" src="#"  /></div>

        </div>
      </div>
        <div class="row" style="margin-bottom:15px;">
        <div class="col-sm-3">
         <label>Upload Signature </label>
        </div>
        <div class="col-sm-5 upload">
        <input type="file" name='sign_file' id='sign_file'  class="form-control" accept="image/*" onchange="readURLsign(this)" />
        Upload a JPEG/JPG file of your signature of maximum pixel resolution 160 X 560 and minimum pixel resolution 80 X 260.Aspect ratio(height X width) has to be between 3.1586 and 4.0360.File size should be between 2KB and 150KB
        </div>
        <div class="col-sm-4">
          <div class="well" align="center" > <img id="sign_image" src="#" /></div>
         </div>
      </div>
              <div class="row" style="margin-bottom:15px;">
        <div class="col-sm-3">
         <label>Upload 5th sem marksheets </label>
        </div>
        <div class="col-sm-5 upload">

        <input type="file" name="sem5_file" class="form-control" accept="application/pdf"  onchange="readURLsem5(this)"/>
        Upload a PDF file of your marksheet.File size should be between 10KB and 300KB.
        </div>
        <div class="col-sm-4">
          <div class="well" align="center"><img id='sem5_pdf'src="#"  /></div>


      </div>
      </div>
       <div class="row" style="margin-bottom:15px;">
        <div class="col-sm-3">
         <label>Upload 6th sem marksheets </label>
        </div>
        <div class="col-sm-5 upload">

        <input type="file" name="sem6_file" class="form-control"  accept="application/pdf" onchange="readURLsem6(this)" >
        Upload a PDF file of your marksheet.File size should be between 10KB and 300KB.
        </div>
        <div class="col-sm-4">
          <div class="well" align="center"><img id="sem6_pdf" src="#" /> </div>

      </div>
      </div>
        <div class="row" style="margin-bottom:15px;">
        <div class="col-sm-3">

         <label>Upload fee receipt of college admission </label>
        </div>
        <div class="col-sm-5 upload">
        <input type="file" name="clgfee_file" class="form-control" accept="application/pdf" onchange="readURLclg(this)" />
         Upload a PDF file of your college fee receipt.File size should be between 10KB and 300KB.
        </div>
        <div class="col-sm-4">
          <div class="well" align="center"><img id="clgfee_pdf" src="#" /></div>


      </div>
      </div>
      <?php
       $querycast="SELECT castvalue from hostelform where email='$email'";
      $checkcast=mysqli_query($connect,$querycast);
      $rowcast=mysqli_fetch_assoc($checkcast);
     $check=$rowcast['castvalue'];

      if($check=="yes")
      {
      ?>
              <div class="row" style="margin-bottom:15px;">
        <div class="col-sm-3">
         <label>Upload Cast Certificate </label>
        </div>
        <div class="col-sm-5 upload">

        <input type="file" name="castC_file" class="form-control" accept="application/pdf"  onchange="readURLcastc(this)"/>
        Upload a PDF file of your cast certificate.File size should be between 10KB and 300KB.
        </div>
        <div class="col-sm-4">
          <div class="well" align="center"><img id="castC_pdf" src="#" ></div>


      </div>
      </div>
              <div class="row" style="margin-bottom:15px;">
        <div class="col-sm-3">
         <label>Upload Cast Validity </label>
        </div>
        <div class="col-sm-5 upload">

          <input type="file" name="castV_file" class="form-control" accept="application/pdf"  onchange="readURLcastv(this)"/>
         Upload a PDF file of your cast validity.File size should be between 10KB and 300KB.
        </div>
        <div class="col-sm-4">
          <div class="well" align="center"><img id="castV_pdf" src="#">
        </div>


      </div>
      </div>
              <div class="row" style="margin-bottom:15px;">
        <div class="col-sm-3">
         <label>Upload Non-crimilier</label>
        </div>
        <div class="col-sm-5 upload">

       <input type="file" name="nc_file" class="form-control" accept="application/pdf"  onchange="readURLnc(this)"/>
       Upload a PDF file of your non crimiliar.File size should be between 10KB and 300KB.
        </div>
        <div class="col-sm-4">
          <div class="well"  align="center"><img id="nc_pdf" src="#">
        </div>


      </div>
      </div>
      <?php
       }
      ?>
      <?php
       }
      ?>
    </div>
  </div>
</div>
</div>
<div class="row">
<center>
<input type="submit" name="submit" value="confirm and submit" class="btn btn-success btn-lg" />
</center>
<br>
<br>
</div>
</div>
</form>
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
<script >
function readURLpic(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#pic_image')
                    .attr('src', e.target.result)
                    .width(125)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
function readURLsign(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#sign_image')
                    .attr('src', e.target.result)
                    .width(125)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
function readURLsem5(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#sem5_pdf')
                    .attr('src', e.target.result)
                    .width(125)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
function readURLsem6(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#sem6_pdf')
                    .attr('src', e.target.result)
                    .width(125)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
function readURLclg(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#clgfee_pdf')
                    .attr('src', e.target.result)
                    .width(125)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
function readURLcastc(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#castC_pdf')
                    .attr('src', e.target.result)
                    .width(125)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
function readURLcastv(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#castV_pdf')
                    .attr('src', e.target.result)
                    .width(125)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
function readURLnc(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#nc_pdf')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
