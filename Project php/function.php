<?php

function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from ragister_users where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		} 
	}

	//redirect to login
	header("Location: Login.php");
	die;
}

function check_Adminlogin($con)
{

	if(isset($_SESSION['Admin_id']))
	{

		$id = $_SESSION['Admin_id'];
		$query = "select * from admin where Admin_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$Admin_data = mysqli_fetch_assoc($result);
			return $Admin_data;
		} 
	}

	//redirect to login
	header("Location: Login.php");
	die;
}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4, $length);


	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}

function pre_r($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}
