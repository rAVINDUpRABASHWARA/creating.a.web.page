<?php
session_start();

	include("connection.php");
	include("function.php");

	$user_data = check_login($con);



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="Logout.php">Logout</a>

</body>
</html>