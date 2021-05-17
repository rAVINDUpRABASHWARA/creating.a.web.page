<?php

	require_once("connection.php");

if(isset($_POST['update']))
{

	$id = $_GET['ID'];
	$Admin_id = $_POST['Admin_id'];
	$Admin_username = $_POST['Admin_username'];
	$Admin_password = $_POST['Admin_password'];

	$query = " update adminn set Admin_username = '$Admin_username', Admin_password = '$Admin_password' where id = $id";
	$result = mysqli_query($con,$query);

	if($result)
	{
		header("location: Owner.php");
	}
	else{
		echo 'Please check your query';
	}

}
else{

	header("location: Owner.php");
}

?>
