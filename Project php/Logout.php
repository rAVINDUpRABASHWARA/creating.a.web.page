<?php

session_start();

if(isset($_SESSION['user_id']))
{

	unset($_SESSION['user_id']);
}

header("Location: O.M.I.S.php");
die;