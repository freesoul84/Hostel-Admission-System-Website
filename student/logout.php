<!--logout program -->
<html>
<head>
  <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Logout Successfully !</title>
</head>
    <link rel="shortcut icon" href="../favicon.ico" />
    <!-- css and js bootstrap files-->
<link rel="stylesheet" href="../css/bootstrap.min.css"/>
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
<body style="background-color:#ffffff;">
	<?php 
  //session destroy
	session_destroy();
	 ?>
   <!--sweet alert-->
	<script type="text/javascript">
      swal("Successful!", "You are Successfully Logout :)", "success");
	</script>
	<?php 
    header('refresh:1;url=../homepage.php');
    exit;
	?>
</body>
</html>
