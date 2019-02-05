<?php
//code for connecting mysql database
session_start();
include("config.php");
if (isset($_SESSION['adminname']) && isset($_SESSION['password'])) {
  $adminname=$_SESSION['adminname'];
  $password=$_SESSION['password'];
  //code for retriving data from database
if(isset($_POST['open'])){
  $checkvalue=$_POST['checkbox'];
  $important=$checkvalue;
$_SESSION['checkbox']=$important;
  $formquery="SELECT * from hostelform where email='$checkvalue'";
  $chkform=mysqli_query($connect,$formquery);
  $_retvalform=mysqli_fetch_assoc($chkform);
  //email
  $email=$_retvalform['email'];
  $_SESSION['email']=$email;
//password
  $password=$_retvalform['password'];
    $_SESSION['password']=$email;
    //firstname
  $firstname=$_retvalform['firstname'];
    $_SESSION['firstname']=$email;
    //lastname
  $lastname=$_retvalform['lastname'];
  $_SESSION['lastname']=$lastname;
  //middlename
  $middlename=$_retvalform['middlename'];
  $_SESSION['middlename']=$middlename;
  //gender
  $gender=$_retvalform['gender'];
  $_SESSION['gender']=$gender;
  //address
  $address=$_retvalform['address'];
  $_SESSION['address']=$address;
  //guardian
  $guardianname=$_retvalform['guardian'];
  $_SESSION['guardian']=$guardianname;
  //pincode
  $pincode=$_retvalform['pin'];
    $_SESSION['pin']=$pincode;
    //phonenumber
  $phonenumber=$_retvalform['mobile'];
    $_SESSION['mobile']=$phonenumber;
    //telephone
  $telephone=$_retvalform['telephone'];
    $_SESSION['telephone']=$telephone;
    //department
  $department=$_retvalform['department'];
   $_SESSION['department']=$department;
   //year
  $year=$_retvalform['year'];
   $_SESSION['year']=$year;
   //seatno
   $seatno=$_retvalform['seatno'];
   $_SESSION['seatno']=$seatno;
   //sgpa
   $sgpa=$_retvalform['sgpa'];
     $_SESSION['sgpa']=$sgpa;
     //cgpa
    $cgpa=$_retvalform['cgpa'];
  $_SESSION['cgpa']=$cgpa;
  //castvalue
   $castvalue=$_retvalform['castvalue'];
  $_SESSION['castvalue']=$castvalue;
  //category
   $category=$_retvalform['cast'];
  $_SESSION['cast']=$category;
  //response
   $responsibilities=$_retvalform['responsibilities'];
  $_SESSION['responsibilities']=$responsibilities;
  //status
   $status=$_retvalform['status'];
  $_SESSION['status']=$status;
   $fullname=$lastname." ".$firstname." ".$middlename;
  $_SESSION['fullname']=$fullname;
//code for retriving documents from student databasr of documents
 }
if(isset($_POST['approve'])){
    session_start();
    $choose=$_SESSION['checkbox'];
    $seatno=$_SESSION['seatno'];
    $fullname=$_SESSION['fullname'];
    $branch=$_SESSION['branch'];
    $year=$_SESSION['year'];
    $category=$_SESSION['cast'];
    $sgpa=$_SESSION['sgpa'];
    $cgpa=$_SESSION['cgpa'];
     $formquery="SELECT * from hostelform where email='$choose'";
     $qq="UPDATE hostelform set status='approve' where email='$choose'";
$checkupdate=mysqli_query($connect,$qq);
//insert into approve table
if($year=='Third Year')
{
$table='tyapprove';
}
if($year=='Fourth Year')
{
$table='fyapprove';
}
$insertinto="INSERT INTO $table(seatno,fullname,branch,year,cast,sgpa,cgpa) VALUES('$seatno','$fullname','$branch','$year','$category','$sgpa','$cgpa')";
$insertcheck=mysqli_query($connect,$insertinto);
}
if(isset($_POST['notapprove']))
{
  session_start();
  $choose=$_SESSION['checkbox'];
 $formquery="SELECT * from hostelform where email='$choose'";
 $qq="UPDATE hostelform set status='notapprove' where email='$choose'";
$checkupdate=mysqli_query($connect,$qq);
$chkform=mysqli_query($connect,$formquery);
$_retvalform=mysqli_fetch_assoc($chkform);
$email=$_retvalform['email'];
  $seatno=$_SESSION['seatno'];
$checkupdate=mysqli_query($connect,"UPDATE hostelform set status='not approve' where email='$choose'");
if($year=='Third Year')
{
$table='tyapprove';
}
if($year=='Fourth Year')
{
$table='fyapprove';
}
$seat=$_SESSION['seatno'];
$querydelete="DELETE FROM $table where seatno='$seat'";
mysqli_query($connect,$querydelete);
}
 ?>
<!--code for hostel form-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Form  <?php echo $email;?> | Malaygiri Girls Hostel</title>
  <!--bootstrap css and js files-->
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
  <?php $pagename="hostel admission form";
  ?>
<?php
if($checkupdate)
{
echo '<script type="text/javascript">';
echo 'swal("Successful!", "form status change Successfully", "success");';
echo '</script>';
echo '<script type="text/javascript">';
 echo 'window.location.href="student_forms.php"';
echo "</script>";
}
else {
  echo '<script type="text/javascript">';
  echo 'swal("Not Update!", "form status is not change", "error");';
  echo '</script>';
}
?>        <!--start of main code-->
        <br>
<div class="container" style="margin-left:80px;margin-right:0px;">
  <div class="row">
    <div class="col-sm-12">
<div class="panel panel-default">
<div class="row form-adjust">
  <!--dbatu logo-->
<div class="col-sm-2">
  <img src="batulogo.jpg" class="image-responsive" height="100" width="100"/>
</div>
<div class="col-sm-8">
<h2 style="text-align:center;margin-top: 0px;">Dr.Babasaheb Ambedkar Technological University</h2>
<h4 style="text-align:center; margin-top: 0px">Lonere,402103, Tal.:Mangaon Dist.:Raigad</h4>
<h3 style="text-align:center;margin-top: 0px "><strong>HOSTEL ADMISSION FORM</strong></h3>
</div>
<div class="col-sm-2">
  <?php
  $queryimg="SELECT * from stddocuments where email='$email'";
  $imgch=mysqli_query($connect,$queryimg);
  $take=mysqli_fetch_assoc($imgch);
  $photograph=$take['photograph'];
   ?>
<?php echo "<img src=../uploaddoc/".$email ."/" .$photograph."  class='img-responsive' style='height:180px;width:400px;'/>" ?>
</div>
</div>
<!--details of hostel and mess fees-->
<div class="row form-adjust">
<div class="col-sm-8 col-sm-offset-2">
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
<input type="text" class="form-control" value="<?php echo $lastname;?>" id="lastname" placeholder="lastname" readonly>
</div>
<div class="col-sm-3">
  <label for="firstname"></label>
<input type="text"  class="form-control" value="<?php echo $firstname;?>" id="firstname"   placeholder="first name" readonly>
</div>
<div class="col-sm-3">
  <label for="middlename"></label>
<input type="text"  class="form-control" value="<?php echo $middlename;?>" id="middlename" placeholder="father name" readonly>
</div>
</div>
<div>
  <!--code for entering gender-->
<div class="row form-adjust">
<div class="col-sm-3">
<label for="gender">02.Gender :<span style="color: red">*</span></label>
</div>
<div class=" col-sm-4">
<div class="checkbox">
<label for="gender"><?php echo $gender;?></label>
</div>
</div>
</div>
<!--code for entering gurdian name-->
<div class="row form-adjust">
<div class="col-sm-3">
<label for="guardian">03.Guardian's Name :<span style="color: red">*</span></label></div>
<div class="col-sm-9">
<input type="text" class="form-control" name="guardian" value="<?php echo $guardianname;?>" id="guardian" placeholder="guardian full name" readonly></div>
</div>
<!--code for entering yours permanent address-->
<div class="row form-adjust">
<div class="col-sm-3">
<label for="address">04.Permenant Address :<span style="color: red">*</span></label>
</div>
<div class="col-sm-9">
  <div class="row form-adjust">
    <div class="col-sm-12">
<input type="text" class="form-control" id="address" name="address" value="<?php echo $address;?>"readonly>
</div>
</div>
<!--code for entering pin-->
<div class="row form-adjust">
<div class="col-sm-6">
<label for="pin">PIN<span style="color: red">*</span></label>
<input type="text" class="form-control" name="pincode" id="pincode" name="pincode" value="<?php echo $pincode;?>" readonly>
</div>
<!--code for entering mobile number-->
<div class="col-sm-6">
<label for="mobile">Mobile Number<span style="color: red">*</span></label>
<input type="number" class="form-control" name="mobile" value="<?php echo $phonenumber;?>" readonly>
</div>
</div>
<!--code for entering telephone numnber-->
<div class="row form-adjust">
<div class="col-sm-6">
<label for="telephone">Telephone-Number<span style="color: red">*</span></label>
<input type="text" class="form-control" name="telephone" id="telephone" value="<?php echo $telephone;?>" readonly>
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
<input type="text" class="form-control" name="department" id="department" value="<?php echo $department;?>" readonly>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
 <!--selection of branch name-->
  <label for="year"></label>
<input type="text" class="form-control" name="year" id="year" value="<?php echo $year;?>" readonly>
</div>
</div>
</div>
<div class="row form-adjust">
<div class="col-sm-4">
<label for="sgpa">SGPA<span style="color: red">*</span></label><input type="number" class="form-control" name="sgpa" id="sgpa" value="<?php echo $sgpa;?>" readonly>
</div>
<div class="col-sm-4">
<label for="cgpa">CGPA<span style="color: red">*</span></label><input type="number" class="form-control" name="cgpa" id="cgpa" value="<?php echo $cgpa;?>" readonly>
</div>
<div class="col-sm-4">
<label for="seatno">Seat Number.<span style="color: red">*</span></label><input type="number" class="form-control" name="seatno" id="seatno" value="<?php echo $seatno;?>" readonly>
</div>
</div>
</div>
</div>
<!--code for selecting your cast if present-->
<div class="row form-adjust">
<div class="col-sm-12">
<label for="cast">06.Whether Belongs To SC/ST/VJ/OBC/NT/SBC/Physically Handicapped?</label>
<div class="row">
  <div class="col-sm-6">
<input type="text" class="form-control" name="castvalue" id="castvalue" value="<?php echo $castvalue;?>" readonly>
</div>
</div>
<br>
<?php
if($checkvalue=='true')
{
?>
<label for="ifyes">If Yes,Select category <span style="color: red">*</span></label>
<div class="row">
  <div class="col-sm-6">
<input type="text" class="form-control" name="category" id="category" value="<?php echo $category;?>"  readonly>
</div>
</div>
<?php } else{?>
<label for="ifyes">If Yes,Select category <span style="color: red">*</span></label>
<div class="row">
  <div class="col-sm-6">
<input type="text" class="form-control" name="category" id="category" value="<?php echo $category;?>" readonly>
</div>
</div>
<?php
}
?>
</div>
</div>
<!--code for question-->
<div class="row form-adjust">
<div class="col-sm-12">
<label for="ready">07.Whether You Are Prepared To Share Responsibilities Of Hostel Activities?<span style="color: red">*</span></label>
<div class="row">
  <div class="col-sm-6">
<input type="text" class="form-control" name="resoponsibilities" id="responsibilities" value="<?php echo $responsibilities;?>" readonly>
</div>
</div>
</div>
</div>
<!--code for button-->
</form>
</div>
<?php
$query="SELECT * from stddocuments where email='$email'";
$imgval=mysqli_query($connect,$query);
$take=mysqli_fetch_assoc($imgval);
$photograph=$take['photograph'];
$signature=$take['signature'];
$firstmark=$take['firstmark'];
$secondmark=$take['secondmark'];
$feereceipt=$take['feereceipt'];
$castcert=$take['castcert'];
$castva=$take['castval'];
$noncrim=$take['noncrim'];
$hostelpay=$take['hostelpay'];
$messpay=$take['messpay'];
$folder="../uploaddoc/".$email."";
 ?>
  <div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading">
       <div class="row">
        <label align="left" style="margin-left:10px;"><h3>Documents</h3></label>
       </div>
      </div>
      <div class="panel-body">
        <div claa="row" >
          <div class="col-sm-6 col-sm-offset-6">
          <center>
          <label>folder:</label>
          <a href="<?php echo $folder;?>" target="_blank" name=""style="margin-bottom:20px;" value=""><?php echo $email;?></a>
        </center>
        </div>
      </div>
         <div class="row">
        <div class="col-sm-3">
         <label>Photograph</label>
        </div>
        <div class="col-sm-4">
          <div class="well">
        <?php
           if($photograph)
           {
            echo '<div class="alert alert-success alert-dismissable" style="margin:30px;">';
            echo  "<strong>photograph is uploaded</strong>";
             echo "</div>";
           }
           else {
             echo '<div class="alert alert-warning alert-dismissable" style="margin:30px;">';
             echo  "<strong>photograph is not uploaded</strong>";
              echo "</div>";
           }
        ?>
        </div>
      </div>
      </div>
        <div class="row">
        <div class="col-sm-3">
         <label>Signature </label>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <?php
               if($signature)
               {
                echo '<div class="alert alert-success alert-dismissable" style="margin:30px;">';
                echo  "<strong>signature is uploaded</strong>";
                 echo "</div>";
               }
               else {
                 echo '<div class="alert alert-warning alert-dismissable" style="margin:30px;">';
                 echo  "<strong>signature is not uploaded</strong>";
                  echo "</div>";
               }
            ?>
        </div>
      </div>
      </div>
              <div class="row">
        <div class="col-sm-3">
         <label>5th sem marksheets </label>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <?php
               if($firstmark)
               {
                echo '<div class="alert alert-success alert-dismissable" style="margin:30px;">';
                echo  "<strong>First Marksheet is uploaded</strong>";
                 echo "</div>";
               }
               else {
                 echo '<div class="alert alert-warning alert-dismissable" style="margin:30px;">';
                 echo  "<strong>First Marksheet is not uploaded</strong>";
                  echo "</div>";
               }
            ?>
        </div>
      </div>
      </div>
       <div class="row">
        <div class="col-sm-3">
         <label>6th sem marksheets </label>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <?php
               if($secondmark)
               {
                echo '<div class="alert alert-success alert-dismissable" style="margin:30px;">';
                echo  "<strong>Second Marksheet is uploaded</strong>";
                 echo "</div>";
               }
               else {
                 echo '<div class="alert alert-warning alert-dismissable" style="margin:30px;">';
                 echo  "<strong>Second Marksheet is not uploaded</strong>";
                  echo "</div>";
               }
            ?>
        </div>
      </div>
      </div>
        <div class="row">
        <div class="col-sm-3">
         <label>Upload fee receipt of college admission </label>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <?php
               if($feereceipt)
               {
                echo '<div class="alert alert-success alert-dismissable" style="margin:30px;">';
                echo  "<strong>Fee Receipt is uploaded</strong>";
                 echo "</div>";
               }
               else {
                 echo '<div class="alert alert-warning alert-dismissable" style="margin:30px;">';
                 echo  "<strong>Fee Receipt is not uploaded</strong>";
                  echo "</div>";
               }
            ?>
        </div>
      </div>
      </div>
      <?php
      if($castvalue=="yes")
      {
      ?>
              <div class="row">
        <div class="col-sm-3">
         <label>Cast Certificate </label>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <?php
               if($castcert)
               {
                echo '<div class="alert alert-success alert-dismissable" style="margin:30px;">';
                echo  "<strong>Cast Certificate is uploaded</strong>";
                 echo "</div>";
               }
               else {
                 echo '<div class="alert alert-warning alert-dismissable" style="margin:30px;">';
                 echo  "<strong>Cast Certificate is not uploaded</strong>";
                  echo "</div>";
               }
            ?>
        </div>
      </div>
      </div>
              <div class="row">
        <div class="col-sm-3">
         <label>Cast Validity </label>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <?php
               if($castva)
               {
                echo '<div class="alert alert-success alert-dismissable" style="margin:30px;">';
                echo  "<strong>Cast Validity is uploaded</strong>";
                 echo "</div>";
               }
               else {
                 echo '<div class="alert alert-warning alert-dismissable" style="margin:30px;">';
                 echo  "<strong>Cast Validity is not uploaded</strong>";
                  echo "</div>";
               }
            ?>
        </div>
      </div>
      </div>
              <div class="row">
        <div class="col-sm-3">
         <label>Non-crimilier</label>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <?php
               if($noncrim)
               {
                echo '<div class="alert alert-success alert-dismissable" style="margin:30px;">';
                echo  "<strong>Non crimilier is uploaded</strong>";
                 echo "</div>";
               }
               else {
                 echo '<div class="alert alert-warning alert-dismissable" style="margin:30px;">';
                 echo  "<strong>Non crimilier is not uploaded</strong>";
                  echo "</div>";
               }
            ?>
        </div>
      </div>
      </div>
      <?php
    }
       ?>
      <?php
      if($status=="approve"){
      if($hostelpay && $messpay)
      { ?>
       <div class="row">
 <div class="col-sm-3">
  <label>Hostel Payment Receipt</label>
 </div>
 <div class="col-sm-4">
   <div class="well">
     <?php
        if($hostelpay)
        {
         echo '<div class="alert alert-success alert-dismissable" style="margin:30px;">';
         echo  "<strong>Hostel Payment Receipt is uploaded</strong>";
          echo "</div>";
        }
        else {
          echo '<div class="alert alert-warning alert-dismissable" style="margin:30px;">';
          echo  "<strong>Hostel Payment Receipt is not uploaded</strong>";
           echo "</div>";
        }
     ?>
 </div>
</div>
</div>
<div class="row">
<div class="col-sm-3">
<label>Mess Payment Receipt</label>
</div>
<div class="col-sm-4">
<div class="well">
<?php
 if($messpay)
 {
  echo '<div class="alert alert-success alert-dismissable" style="margin:30px;">';
  echo  "<strong>Mess Payment Receipt is uploaded</strong>";
   echo "</div>";
 }
 else {
   echo '<div class="alert alert-warning alert-dismissable" style="margin:30px;">';
   echo  "<strong>Mess Payment Receipt is not uploaded</strong>";
    echo "</div>";
 }
?>
</div>
</div>
</div>
<?php
}
}
 ?>
    </div>
  </div>
</div>
</div>
<form method="post" action="individualform.php">
    <div class="row">
<center>
<input type="submit" name="approve" value="approve" style="margin:20px;"class="btn btn-lg btn-warning"></input>
<input type="submit" name="notapprove" value="not approve" style="margin:20px;"class="btn btn-lg btn-warning"></input>
</center>
  </div>
</form>
</div>
</div>
</div>
</div>
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
<!--end of hostel admission form-->
</html>
