
<html>
<head>
	<title>Terms and Conditions | Malaygiri Girls Hostel</title>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="../favicon.ico" />
	   <link href="../css/bootstrap.min.css" rel="stylesheet">
      <link href="../css/homepage.css" rel="stylesheet">
       <link href="../css/bootstrap.css" rel="stylesheet">
       <link href="../css/terms_conditions.css" rel="stylesheet">
    <script src="../js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
<?php
//code for connecting mysql database
include("config.php");
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
  $email=$_SESSION['email'];
  $password=$_SESSION['password'];
//echo '<iframe src="profilepic/' . $_SESSION['email'] . 'res.pdf"width="500px" height="500px"></iframe>';
?>
    <?php $pageid="13"; ?>
  <?php $pagename="terms and Conditions"; ?>
	<div class="container-fluid">
	<div class="row">
 <div class="col-sm-12">
 	<div class="panel panel-default">
 		<center><h2 class="heading-term">Declaration by candidate</h2></center>
 		<ol style="font-size:30px;">
 			<li>
 				<p>I nearby undertake,if admitted to Hostel to confirm to the rules and regulations as
 			    long as I shall be the student of the University.I will do nothing either inside of the
 			    University that will interfere with its orderly governance and discipline.
 			   </p>
 		   </li>
 			<li>
 				<p>
 				I am aware that Ragging is a Cognizable offence and students resorting to Ragging would be
 				prosecuted by police authorities.
 				</p>
 			</li>
 			<li>
 				<p>
 				If admitted in Hostel,I shall be sincere,punctual,regular and obedient in the Hostel and will
 				take permission for long absence
 				</p>
 			</li>
 			<li>
 				<p>
 				I am aware that I would be eligible for getting Hostel accomodation as per the rules and
 				regulation of this University fo each new academic year on the basis of performance in examination
 				and participation in the other activities
 				</p>
 			</li>
 			<li>
 				<p>
 					I will not use electrical gadgets like Iron,Heating elements etc.If found using this,I am
 					liable for cancellation of hostel accommodation and punishment thereof.
 				</p>
 			</li>
 			<li>
 				<p>
 				Mess deposit Demand draft should be drawn in favour of Respective Hostel Rector(For example-Rector,Hostel Malaygiri) payabke at SBI Mangaon Branch(Code 376)
 				</p>
 			</li>
 		</ol>
 		<br>
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

<?php } ?>
</body>
</html>
