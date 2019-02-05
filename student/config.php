<!--config.php-->
<?php

 $connect=mysqli_connect('localhost','root','alkesha15','malaygiri_hostel');
	function secure($str,$sqlHandle)
	{
		$secured = strip_tags($str);
		$secured = htmlspecialchars($secured);
		$secured = mysqli_real_escape_string($sqlHandle,$secured);
		return $secured;
	}
?>