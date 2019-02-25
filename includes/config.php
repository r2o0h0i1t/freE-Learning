<?php
	ob_start();
	session_start();
	$_SESSION['userLoggedInName'] = "yuvraj034c";
	$_SESSION['userLoggedInId'] = 1;

	$timezone = date_default_timezone_set("Indian/Mauritius");

	$con = mysqli_connect("localhost", "root", "", "e-learning");

	if(mysqli_connect_errno()) {
		echo "Failed to connect: " . mysqli_connect_errno();
	}
?>