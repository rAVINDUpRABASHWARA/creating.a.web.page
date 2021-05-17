<?php
session_start();

	include("connection.php");
	include("function.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		//somthing was posted
		$first_name = $_POST['fname'];
		$last_name = $_POST['lname'];
		$Address_line1 = $_POST['line1'];
		$Address_line2 = $_POST['line2'];
		$Address_line3 = $_POST['line3'];
		$Address_line4 = $_POST['line4'];
		$phonenumber = $_POST['phone'];
		$user_name = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !empty($first_name) && !empty($last_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into ragister_users (user_id,first_name,last_name,phonenumber,password,user_name,Address_line1,Address_line2,Address_line3,Address_line4) value ('$user_id','$first_name','$last_name','$phonenumber','$password','$user_name','$Address_line1','$Address_line2','$Address_line3','$Address_line4')";
			mysqli_query($con,$query);

			header("Location: Login.php");
			die;
		}else
		{
			echo "Please enter valid information !";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Frandy Online Music Instrument Store</title>
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" type="text/css" href="Css/Sign in.css">
	<link rel="stylesheet" type="text/css" href="Css/Sign in form.css">
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
			<a href="Sign in.html"><!--<img src="#5" alt="Sign in btn" class="right">-->Register</a>
				</li>
				<li class="right"><a href="Login.php">Login</a></li>
			</ul>
		</div>
	</div>
	<!--Navigation bar end -->
	<br><br>

	<!--Sign in form start -->

	<div class="signin">
		<form method="POST">
			<fieldset class="form">
				<legend><h3>Sign in :</h3></legend>
				<label for="fname" class="lable">First Name :</label>
				<input type="text" id="fname" class="input" name="fname"><br><br>
				<label for="lname" class="lable">Last Name :</label>
				<input type="text" id="lname" class="input" name="lname"><br><br>
				<label class="lable">Address :</label>
				<input type="text" id="line1" class="input" name="line1" placeholder="   line1"><br><br>
				<input type="text" id="line2" class="input" name="line2" placeholder="   line2"><br><br>
				<input type="text" id="line3" class="input" name="line3" placeholder="   line3"><br><br>
				<input type="text" id="line4" class="input" name="line4" placeholder="   line4"><br><br>
				<label for="phone" class="lable">Phone Number :</label>
				<input type="tel" id="phone" class="input" name="phone" pattern="[0-9]{10}"><br><br>
				<label for="email" class="lable">E-mail :</label>
				<input type="email" id="email" class="input" name="email"><br><br>
				<label for="password" class="lable">Password :</label>
				<input type="password" id="password" class="input" name="password"><br><br>
				<label for="comfirmpass" class="lable">Confirm Password :</label>
				<input type="password" id="password" class="input" name="password"><br><br>
				<!--Submit & Clear Btns-->
				<input type="submit" id="submit" class="submit" value="submit">
				<br>
				<input type="reset" id="clear" class="clear" value="clear">
				<!--Hyperlink point to the 'Login.html-->
				<ul>
					<li class="q2">Already have an account ? &nbsp;&nbsp;</li>
					<li class="q2"><a href="Login.php"> Login</a></li>
				</ul>
			</fieldset>
		</form>
	</div>

	<!--Sign in form ends -->

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