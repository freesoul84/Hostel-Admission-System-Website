<?php
//code for connecting mysql database
include("config.php");
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
  $email=$_SESSION['email'];
  $password=$_SESSION['password'];
//code for table management
$tablemanage=" CREATE TABLE IF NOT EXISTS `tablemanage` (
    `page` varchar(100) NOT NULL,
  `pagename` varchar(100) NOT NULL,
   `tbl` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1
";
mysqli_query($connect,$tablemanage);
$page="hostelform";
$pagename="Students Submitted Forms ";
$tbl="hostelform";
$inserttable="INSERT INTO tablemanage(page,pagename,tbl)
SELECT * FROM (SELECT '$page','$pagename','$tbl') AS tmp
 WHERE NOT EXISTS (
  SELECT * FROM tablemanage WHERE  tbl='$tbl') LIMIT 1;";
mysqli_query($connect,$inserttable);
?>
<?php
//php code for the hostel form
$query1=" CREATE TABLE IF NOT EXISTS `hostelform` (
  `srno` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `firstname` varchar(80) NOT NULL,
    `middlename` varchar(40) NOT NULL,
    `lastname` varchar(50) NOT NULL,
    `gender` varchar(20) NOT NULL,
    `guardian` varchar(70) NOT NULL,
    `address` varchar(90) NOT NULL,
    `pin` int(6) NOT NULL,
      `mobile` bigint(10) NOT NULL,
  `telephone` bigint(10) NOT NULL,
    `department` varchar(50) NOT NULL,
    `year` varchar(50) NOT NULL,
    `sgpa` decimal(10,2) NOT NULL,
    `cgpa` decimal(10,2) NOT NULL,
      `seatno` bigint(20) NOT NULL,
    `castvalue` varchar(30) NOT NULL,
    `cast` varchar(40) NOT NULL,
    `responsibilities` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1
";
//code for connecting query q1
mysqli_query($connect,$query1);
?>
<!--code for hostel form-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Hostel Admission form|Malaygiri Girls Hostel</title>
  <!--bootstrap css and js files-->
  <link rel="shortcut icon" href="../favicon.ico" />
  <link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="../css/bootstrapValidator.css"/>
  <link rel="stylesheet" href="../css/bootstrapValidator.min.css"/>
  <link rel="stylesheet" href="../css/sweetalert.css"/>
      <link rel="stylesheet" href="../css/studentdash.css"/>
     <link rel="stylesheet" href="../css/bootstrap-select.css">
   <link rel="stylesheet" href="../css/bootstrap-select.min.css">
<link rel="stylesheet" href="../css/hostelform.css">
<link rel="stylesheet" href="../css/studentdash.css">
    <!--bootstrap js files-->
  <script src="../js/jquery.js"></script>
  <script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js" ></script>
  <script src="../js/bootstrap-select.js"></script>
       <script src="../js/sweetalert.min.js"></script>
    <script src="../js/bootstrapValidator.js"></script>
   <script src="../js/bootstrapValidator.min.js"></script>
</head>
<body>
  <?php $pageid="3"; ?>
  <?php $pagename="hostel admission form"; ?>
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
                            <span class="sidebar-title">My Meritrank</span>
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
                              <span class="glyphicon glyphicon-chevron-right act-active" style="margin-left:30px;">
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
        <main id="page-content-wrapper" role="main" style="margin-left:50px;margin-right:0px;" >
            <!--start of main code-->
            <?php
            $querycheck="SELECT * from hostelform where email='$email'";
            $retvalcheck=mysqli_query($connect,$querycheck);
            $rowcheck=mysqli_fetch_assoc($retvalcheck);
            $emailcheck=$rowcheck['email'];

            if($email !=$emailcheck)
            {
             ?>
  <div class="row">
    <div class="col-sm-11" >
<div class="panel panel-default">
<div class="row form-adjust">
  <!--dbatu logo-->
<div class="col-sm-1">
  <img src="batulogo.jpg" class="image-responsive" height="100" width="100"/>
</div>
<div class="col-sm-11">
<h2 style="text-align:center;margin-top: 0px;">Dr.Babasaheb Ambedkar Technological University </h2>
<h4 style="text-align:center; margin-top: 0px">Lonere,402103, Tal.:Mangaon Dist.:Raigad</h4>
<h3 style="text-align:center;margin-top: 0px "><strong>HOSTEL ADMISSION FORM</strong></h3>
</div>
</div>
<!--details of hostel and mess fees-->
<div class="row form-adjust">
<div class="col-sm-8 col-sm-offset-1">
<div class="table-responsive">
<table class="table table-bordered ">
    <thead>
      <tr>
        <th>Sr.No</th>
        <th>Details Of Fees</th>
        <th>For OPEN/OBC Students</th>
        <th>SC/SC/VJ/NT1/NT2/NT3 & SBC Students</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>HOSTEL FEES</td>
        <td>Rs. 4,000/-</td>
        <td>Rs. 2,000/-</td>
      </tr>
      <tr>
        <td>2</td>
        <td>WATER CHARGES</td>
        <td>Rs. 1,000/-</td>
        <td>Rs. 1,000/-</td>
      </tr>
      <tr>
        <td>3</td>
        <td>ELECTRICITY CHARGES</td>
        <td>Rs. 3,000/-</td>
        <td>Rs. 3,000/-</td>
      </tr>
        <tr>
    <td colspan="4"><strong>ADVANCE:</strong></td>
    </tr>
        <tr>
        <td>1</td>
      <td>CAUTION MONEY DEPOSITE</td>
      <td>Rs. 1,000/-</td>
      <td>Rs. 1,000/-</td>
    </tr>
    <tr>
      <td></td>
      <td>TOTAL</td>
      <td>Rs. 9,000/-</td>
      <td>Rs. 7,000/-</td>
      </tr>
        <tr>
    <td colspan="4" style="text-align: center;"><strong >MESS Advance=Rs. 20,000/- for all</strong></td>
      </tr>
     </tbody>
  </table>
  </div>
  </div>
  </div>
  <!--payment imprtant notifications-->
<h4 style="text-align: center;"><strong>Payment Of  Fees Through Demand Drafts /Bankers Cheque Only</strong></h4>
<h4 style="border-bottom:10px; text-align:center;"><strong>In Favour Of Registrar,Dr.B.A.T.U Lonere,Payable At SBI Mangaon(0276)</strong></h4>
<hr style="background-color:black; border:1px solid black;">
<form action="hostelform.php" method="post" data-toggle="validator" id="hostel-form">
<div class="form-group">
<div class="row form-adjust">
<div class="col-sm-3">
  <!--code for entering rows-->
<label for="name">01.Name In Full(CAPITAL) :<span style="color: red">*</span></label>
</div>
<div class="col-sm-3">
<label for="lastname"></label>
<input type="text" class="form-control" name="lastname" id="lastname" placeholder="lastname" required>
</div>
<div class="col-sm-3">
  <label for="firstname"></label>
<input type="text"  class="form-control" name="firstname" id="firstname"   placeholder="first name" required>
</div>
<div class="col-sm-3">
  <label for="middlename"></label>
<input type="text"  class="form-control" name="middlename" id="middlename" placeholder="father name" required>
</div>
</div>
<div>
  <!--code for entering gender-->
<div class="row form-adjust">
<div class="col-sm-3">
<label for="gender">02.Gender :<span style="color: red">*</span></label>
</div>
<div class=" col-sm-4">
<div class="radio">
<label for="gender"><input id="gender" type="radio" name="gender" value="male">MALE</label>
<label for="gender"><input id="gender" type="radio" name="gender" value="female">FEMALE</label>
</div>
</div>
</div>
<!--code for entering gurdian name-->
<div class="row form-adjust">
<div class="col-sm-3">
<label for="guardian">03.Guardian's Name :<span style="color: red">*</span></label></div>
<div class="col-sm-9">
<input type="text" class="form-control" name="guardian" id="guardian" placeholder="guardian full name"></div>
</div>
<!--code for entering yours permanent address-->
<div class="row form-adjust">
<div class="col-sm-3">
<label for="address">04.Permenant Address :<span style="color: red">*</span></label>
</div>
<div class="col-sm-9">
  <div class="row form-adjust">
    <div class="col-sm-12">
<input type="text" class="form-control" id="address" name="address" placeholder="enter your address here">
</div>
</div>
<!--code for entering pin-->
<div class="row form-adjust">
<div class="col-sm-6">
<label for="pin">PIN<span style="color: red">*</span></label>
<input type="text" class="form-control" name="pin" id="pin" placeholder="pincode" required>
</div>
<!--code for entering mobile number-->
<div class="col-sm-6">
<label for="mobile">Mobile Number<span style="color: red">*</span></label>
<input type="number" class="form-control" name="mobile" placeholder="your mobile number" required>
</div>
</div>
<!--code for entering telephone numnber-->
<div class="row form-adjust">
<div class="col-sm-6">
<label for="telephone">Telephone-Number<span style="color: red">*</span></label>
<input type="text" class="form-control" name="telephone" id="pin" placeholder="your telephone number" required>
</div>
</div>
</div>
</div>
<br>
<!--code for entering marks of previous examination and selecting yors home branch and year-->
<div class="row form-adjust">
<div class="col-sm-3">
<label for="marks">05.Marks in Previous Examiatiom:<span style="color: red">*</span>
</label>
</div>
<div class="col-sm-9">
<div class="row form-adjust">
<div class="col-sm-6">
<div class="form-group">
 <!--selection of branch name-->
 <label for="department"></label>
                  <select class="selectpicker show-menu-arrow form-adjust show-tick form-control" name="department" title="Select your branch..." data-width="100%" id="department" required>
                  <option value="Mechanical Engineering">Mechanical Engineering</option>
                  <option value="Electrical Engineering">Electrical Engineering</option>
                  <option value="Electronics Engineering ">Electronics Engineering A</option>
                  <option value="Electronics Engineering ">Electronics Engineering B</option>
                  <option value="Petrochemical Engineering">Petrohemical Engineering</option>
                  <option value="Chemical Engineering">Chemical Engineering</option>
                  <option value="computer Engineering">Computer Engineering</option>
                  <option value="I.T Engineering">I.T Engineering</option>
                  <option value="Civil Engineering">Civil Engineering</option>
                </select>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
 <!--selection of branch name-->
  <label for="year"></label>
                  <select class="selectpicker show-menu-arrow form-adjust show-tick form-control" id="year" name="year" title="Select your year..." data-width="100%" required>
                  <option value="Third Year">Third Year</option>
                  <option value="Fourth Year">Fourth Year</option>
                </select>
</div>
</div>
</div>
<div class="row form-adjust">
<div class="col-sm-4">
<label for="sgpapoint">SGPA<span style="color: red">*</span></label><input type="text" class="form-control" name="sgpa" id="sgpapointer" placeholder="enter your SGPA">
</div>
<div class="col-sm-4">
<label for="cgpapoint">CGPA<span style="color: red">*</span></label><input type="text" class="form-control" name="cgpa" id="cgpapointer" placeholder="enter your CGPA">
</div>
<div class="col-sm-4">
<label for="seatno">Seat Number.<span style="color: red">*</span></label><input type="text" class="form-control" name="seatno" id="seatno" placeholder="enter your enrollment number">
</div>
</div>
</div>
</div>
<!--code for selecting your cast if present-->
<div class="row form-adjust">
<div class="col-sm-12">
<label for="cast">06.Whether Belongs To SC/ST/VJ/OBC/NT/SBC/Physically Handicapped?</label>
<div class="radio">
<label data-toggle="collapse" class="check-box1" for="ready" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
<input type="radio" value="yes" id="yes" name="castvalue">
Yes
</label>
<label class="check-box2" for="ready"><input type="radio" value="no" id="no" name="castvalue">No</label>
</div>
<br>
<div id="collapseOne" aria-expanded="true" class="collapse">
<label for="ifyes">If Yes,Select category <span style="color: red">*</span></label>
<div class="radio">
<label for="cast"><input type="radio" id="sc" name="cast" value="SC">SC</label>
<label for="cast"><input type="radio" id="st" name="cast" value="ST">ST</label>
<label for="cast"><input type="radio" id="vj" name="cast" value="VJ">VJ</label>
<label for="cast"><input type="radio" id="OBC" name="cast" value="OBC">OBC</label>
<label for="cast"><input type="radio" id="nt" name="cast" value="NT">NT</label>
<label for="cast"><input type="radio" id="sbc" name="cast" value="SBC">SBC</label>
<label for="cast"><input type="radio" id="handicapped" name="cast" value="HANDICAPPED">HANDICAPPED</label>
</div>
</div>
</div>
</div>
<!--code for question-->
<div class="row form-adjust">
<div class="col-sm-12">
<label for="ready">07.Whether You Are Prepared To Share Responsibilities Of Hostel Activities?<span style="color: red">*</span></label>
<div class="radio">
<label for="ready"><input type="radio" id="yes" value="yes"name="responsibilities">Yes</label>
<label for="ready"><input type="radio" id="no" value="no"name="responsibilities">No</label>
</div>
</div>
</div>
<!--code for button-->
<div class="row" style="margin-top:20px;">
<div class="col-sm-5">
<input type="submit" value="submit and next" name="submit" class="btn btn-lg btn-primary"/>
</div>
</div>
  </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</form>
<?php
}
else
{
  $querydoc="SELECT * FROM stddocuments where email='$email'";
  $checkdoc=mysqli_query($connect,$querydoc);
  if(mysqli_num_rows($checkdoc))
  {
    $querystatus="SELECT status from hostelform where email='$email'";
    $checkstatus=mysqli_query($connect,$querystatus);
    $rowstatus=mysqli_fetch_assoc($checkstatus);
    $status=$rowstatus['status'];
    if($status=="approve")
    {
?>
<div class="alert alert-info alert-dismissable" style="margin:30px;">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>APPROVED</strong> Your Form is approved successfully
</div>
<?php
}
else
{
  ?>
    <div class="alert alert-danger alert-dismissable" style="margin:30px;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>NOT APPROVED&nbsp</strong> Sorry! Your FORM is NOT APPROVED
  </div>
<?php
   }
   $formq="SELECT * FROM hostelform where email='$email'";
   $docq="SELECT * FROM hostelform where email='$email'";
   $checkform=mysqli_query($connect,$formq);
   $checkdoc=mysqli_query($connect,$docq);
   $rowform=mysqli_num_rows($checkform);
   $rowdoc=mysqli_num_rows($checkdoc);
   if($rowform==1 && $rowdoc==1 )
   {
?>
<div class="alert alert-success alert-dismissable" style="margin:30px;">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>SUCCESS!&nbsp</strong>Your Form is uploaded Successfully
</div>
<div class="row">
<div class="col-sm-4">
  <a href="myform.php" target="_BLANK" class="btn btn-lg btn-block btn-primary" style="margin-left:25px;" name="myform" value="myform">MY FORM</a>
</div>
</div>
<?php
 }
 }//end of document upload
  else { //start of document upload
?>
<div class="alert alert-warning alert-dismissable" style="margin:30px;">
 <strong>!Warning</strong>You are not upload your documents . Please Upload Your Documents
</div>
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
<a href="upload_doc.php" class="btn btn-lg btn-block btn-primary" value="">upload documents</a>
</div>
</div>
<?php
  }
}
?>
</main>
</div>
<?php
  //code for data
  if(isset($_POST['submit']))
{
$countq="SELECT * FROM hostelform";
$countnum=mysqli_query($connect,$countq);
$count=mysqli_num_rows($countnum);
echo $count;
$srno=$count+1;
$firstname=$_POST['firstname'];
$middlename=$_POST['middlename'];
$lastname=$_POST['lastname'];
$gender=$_POST['gender'];
$castvalue=$_POST['castvalue'];
$cast=$_POST['cast'];
$guardian=$_POST['guardian'];
$address=$_POST['address'];
$pin=$_POST['pin'];
$mobile=$_POST['mobile'];
$telephone=$_POST['telephone'];
$department=$_POST['department'];
$year=$_POST['year'];
$sgpa=$_POST['sgpa'];
$cgpa=$_POST['cgpa'];
$seatno=$_POST['seatno'];
$responsibilities=$_POST['responsibilities'];
echo $firstname;
echo $middlename;
echo $lastname;
echo $guardian;
echo $address;
echo $pin;
echo $telephone;
echo $cgpa;
echo $seatno;
$query1="INSERT INTO hostelform(srno,email,firstname,middlename,lastname,gender,guardian,address,pin,mobile,telephone,department,year,sgpa,cgpa,seatno,castvalue,cast,responsibilities)
 VALUES('$srno','$email','$firstname','$middlename','$lastname','$genderval','$guardian','$address','$pin','$mobile','$telephone','$department','$year','$sgpa','$cgpa','$seatno','$castvalue','$cast','$responsibilities')";
$hostelform=mysqli_query($connect,$query1);
echo $query1;
if($hostelform)
{
  echo '<script type="text/javascript">';
echo 'window.location.href="upload_doc.php"';
echo '</script>';
}
else {
  echo '<script type="text/javascript">';
echo 'window.location.href="hostelform.php"';
echo '</script>';
echo '<script type="text/javascript">';
echo 'swal("Successful!", "Hostel Form submission Failed", "success");';
echo '</script>';
}
}
?>
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
?><!-- Menu Toggle Script -->
  <script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
  </script>
<!--end of hostel admission form-->
</body>
</html
