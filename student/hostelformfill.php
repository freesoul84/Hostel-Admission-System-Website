<?php
//code for connecting mysql database
include("config.php");
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
  $email=$_SESSION['email'];
  $password=$_SESSION['password'];
  $query="SELECT email from hostelform where email='$email'";
  $checkq=mysqli_query($connect,$query);
  $co=mysqli_num_rows($checkq);
  if($co==0)
  {
?>
<html>
<head>
  <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>
		Hostel form Terms and conditions accpetance| Malaygiri Hostel
	</title>
 <!--bootstrap css and js files-->
 <link rel="shortcut icon" href="../favicon.ico" />
	<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="../css/bootstrapValidator.css"/>
  <link rel="stylesheet" href="../css/bootstrapValidator.min.css"/>
  <link rel="stylesheet" href="../css/sweetalert.css"/>
     <link rel="stylesheet" href="../css/bootstrap-select.css">
   <link rel="stylesheet" href="../css/bootstrap-select.min.css">
<link rel="stylesheet" href="../css/hostelform.css">
<link rel="stylesheet" href="../css/studentfill.css">
    <!--bootstrap js files-->
  <script src="../js/jquery.js"></script>
  <script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js" ></script>
<script src="../js/notlogin.js" ></script>
  <script src="../js/bootstrap-select.js"></script>
       <script src="../js/sweetalert.min.js"></script>
    <script src="../js/bootstrapValidator.js"></script>
   <script src="../js/bootstrapValidator.min.js"></script>
</head>
<body>
           <form method="post" action="hostelformfill.php">
        <main id="page-content-wrapper" role="main">
        <!-- Modal -->
    <div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                     <h4 class="modal-title" id="memberModalLabel">Application Status</h4>

                </div>
                <div class="modal-body">
                 Before starting the hostel application ,Please ensure that you have gone through terms and conditions and have a documents required for filling the application
                  <div class="well">
                   <label><input type="checkbox" id="yes" value="yes" name="acceptval[]">&nbsp&nbspI hereby declare that,I have read <a href="terms_conditions.php">Terms and conditions</a>and accept it.I ready to make an application </label>
                  </div>
                </div>
                <div class="modal-footer">
                    <div class="next">
  <input type="submit" class="btn btn-primary btn-lg btn-next" name="accept" value="accept"/>
                   </div>
                </div>
            </div>
        </div>
    </div>
        </main>
         </form>
         <?php
if(isset($_POST['accept']))
{
if(!empty($_POST['acceptval']))
{
  foreach ($_POST['acceptval'] as $acceptval)
  {
    $accept=$acceptval;
  }
  header("Location:hostelform.php");
}
}
?>
<?php
}
else
{
?>
<script type="text/javascript">
window.location.href="hostelform.php";
</script>
<?php
}
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
    </div>
</body>
</html>
