<?php

session_start();

	include("connection.php");
	include("function.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		//somthing was posted
		$user_name = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password))
		{

			//read from database
			$query = "select * from ragister_users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con,$query);
			

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)//1
				{ 

					$user_data = mysqli_fetch_assoc($result);

					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: Home.php");
						die;
					}
				}
				// I think if the 1 is not working after input the username password, it will skip to this point.
				$queryadmin = "select * from admin where Admin_username = '$user_name' limit 1";
				$resultadmin = mysqli_query($con,$queryadmin);

				if($resultadmin){ 
					if($resultadmin && mysqli_num_rows($resultadmin) > 0)
					{ 

						$Admin_data = mysqli_fetch_assoc($resultadmin);

						if($Admin_data['Admin_password'] === $password)
						{
							//next time you need to make this for manager and  financial officer
							$_SESSION['Admin_id'] = $Admin_data['Admin_id'];
							header("Location: Owner.php");
							die;
						}
					}
				}
			}
			else
			{
				echo "<script>alert('Wrong Username');window.Location='Login.php' </script>";
			}
		}
		else
		{	
				
			echo "<script>alert('Wrong Username or Password!!');window.Location='Login.php' </script>";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Frandy Online Music Instrument Store</title>
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" type="text/css" href="Css/Login.css">
	<link rel="stylesheet" type="text/css" href="Css/Login form.css">
	<meta charset="utf-8">
	<meata name = "viewport" contact = "width = device - width, intial - scale = 1">
</head>
<body>

	<!--Header start -->

	<div class="header">
		<div class="logo">
			<a href="O.M.I.S.php"><img src="Images/Logo/Logo04.jpg" alt="LOGO of Frandy O.M.I.S" style="width: 200px;"></a>
		</div>
		<div class="S1">
			<div id="slideshuffle" class="Slidingbanner">
				<img src="Images/Sliding Banners/banner 01.jpg" alt="Slidingbanner">
				<img src="Images/Sliding Banners/banner 02.jpg" alt="Slidingbanner">
				<img src="Images/Sliding Banners/banner 03.jpg" alt="Slidingbanner">
				<img src="Images/Sliding Banners/banner 04.jpg" alt="Slidingbanner">
			</div>
			<div class="cycle-control">
				<span id="next"><i class="fas fa-angle-right"></i></span>
				<span id="prev"><i class="fas fa-angle-left"></i></span>
			</div>
		</div>
	</div>

	<!--Header ends -->
<hr class="hr">
	<!--Navigation bar start -->

	<div class="nav">
		<div class = "left">
			<ul>
				<li class="left"><a href="O.M.I.S.php">Home</a></li>
				<li class="left"><a href="#">Products</a></li>
				<!--<li class="left"><a href="Downloads.php">Downloads</a></li> -->
				<li class="left"><a href="#">Contact Us</a></li>
				<li class="left"><a href="#">About Us</a></li>
				<!--<li class="left"><a href="#">Wishlist</a></li>
				<li class="left"><a href="#">Cart</a></li> -->
				<li class="right">
			<a href="Sign in.php"><!--<img src="#5" alt="Sign in btn" class="right">-->Register</a>
				</li>
				<li class="right"><a href="Login.php">Login</a></li>
			</ul>
		</div>
	</div>
	<!--Navigation bar end -->

	<br><br>

	<!-- Login form starts -->
	
	<div class="Login">
		<form action="" method="POST">
			<fieldset class="form">
				<legend><h3>Login :</h3></legend>
				<label for="username" class="lable">Username :</label>
				<input type="text" id="username" class="input" name="username"><br><br>
				<label for="password" class="lable">Password :</label>
				<input type="password" id="password" class="input" name="password"><br><br>
				<!--Submit & Clear Btns-->
				<input type="submit" id="submit" class="submit" value="submit">
				<br>
				<!--Hyperlink point to the 'Login.html-->
				<ul>
					<li class="q2">Already have an account ? &nbsp;&nbsp;</li>
					<li class="q2"><a href="Sign in.php"> Sign in</a></li>
				</ul>
			</fieldset>
		</form>
	</div>

	<!-- Login form ends -->

	<!--Discount/Bonus Ads start -->
	<div class="Discount">
		<img class="discount" src="Images/Sliding Banners/banner 05.jpg" alt="Discount/Bonus Ads">
		<img class="discount" src="Images/Sliding Banners/banner 06.jpg" alt="Discount/Bonus Ads">
	</div>
	<!--Discount/Bonus Ads ends -->

	<!--Footer starts -->
	<div class="footer">
		<div class="fleft">
			<h3>Service</h3>
			<p>qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq<br>qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq<br>
			qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq<br>qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq<br>
			qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq<br>qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq</p>
			<img src="#9" alt="Facebook icon">
			<img src="#10" alt="Twitter icon">
			<img src="#11" alt="Instergram icon">
		</div>
		<div class="fmiddle">
			<div class="fmiddleleft">
				<h3 class="hleft">Category</h3>
				<ul class="listleft">
					<li>Product</li>
					<li>About us</li>
					<li>Price table</li>
					<li>Crew</li>
					<li>Portfolio</li>
				</ul>
			</div>
			<div class="fmiddleright">
				<h3 class="hright">Partners</h3>
				<ul class="listright">
					<li>Partner 01</li>
					<li>Partner 02</li>
					<li>Partner 03</li>
					<li>Partner 04</li>
					<li>Partner 05</li>
				</ul>
			</div>
		</div>
		<div class="fright">
			<img src="#12" alt="Image related to music">
		</div>
	</div>
	<!--Footer ends -->



<!-- javascript starts -->

<script type="text/javascript" src="Java/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="Java/jquery.cycle.js"></script>
<script type="text/javascript" src="Java/JS files/O.M.I.S.sliding.bannder.s.js"></script>

<!-- javascript ends -->

</body>
</html>