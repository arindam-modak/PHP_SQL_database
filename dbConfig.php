<!--
	File Name - dbConfig.ph
	Database configuration file
-->

<?php
	$con = mysqli_connect("localhost", "root", "");
	
	mysqli_select_db($con, "dbuser");
?>

