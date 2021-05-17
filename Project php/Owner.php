<?php
session_start();

	include("connection.php");
	include("function.php");

	//$Admin_data = check_Adminlogin($con);


?>

<?php

	$query1 = "select * from adminn order by id desc limit 1";
	$result = mysqli_query($con,$query1);
	$row = mysqli_fetch_assoc($result);
	$lastAdmin_id = $row['Admin_id'];

	if($lastAdmin_id == " "){

		$Admi_id = "ADM1";
	}
	else{

		$Admi_id = substr($lastAdmin_id, 3);
		$Admi_id = intval($Admi_id);
		$Admi_id = "ADM" . ($Admi_id + 1);
	}

?>

<?php

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		//somthing was posted
		$Admin_id = $_POST['Admin_id'];
		$Admin_username = $_POST['Admin_username'];
		$Admin_password = $_POST['Admin_password'];
		$A_code = $_POST['A_code'];

		if(!empty($Admin_username) && !empty($Admin_password))
		{

			//save to database
			
			$query = "insert into adminn (Admin_id,Admin_username,Admin_password,A_code) value ('$Admin_id','$Admin_username','$Admin_password','$A_code')";
			mysqli_query($con,$query);

			header("Location: Owner.php");
			die;
		}else
		{
			echo "Please enter valid information !";
		}
	}

?>

<?php

	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$query = " delete from adminn where id = $id";

		mysqli_query($con,$query);
		header("Location: Owner.php");
		die;
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Frandy Online Music Instrument Store</title>
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" type="text/css" href="Css/O.M.I.S.css"> 
	<link rel="stylesheet" type="text/css" href="Css/AddAdmin.css">
	<link rel="stylesheet" type="text/css" href="Css/Downloads_content_table.css">  
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="Java/jquery-3.6.0.min.js"></script>
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
			<input type="checkbox" id="check">
			<label for="check" class="checkbtn">
				<i class="fas fa-bars"></i>
			</label>
			<ul>
				<li class="left"><a href="#">Home</a></li>
				<li class="left"><a href="#">Products</a></li>
				<li class="left"><a href="Downloads.php">Downloads</a></li>
				<li class="left"><a href="#">Contact Us</a></li>
				<li class="left"><a href="#">About Us</a></li>
				<!--<li class="left"><a href="#">Wishlist</a></li>
				<li class="left"><a href="#">Cart</a></li>-->
				<li class="right">
			<!--<a href="Sign in.php"> <img src="#5" alt="Sign in btn" class="right">Register</a>
				</li>
				<li class="right"><a href="Login.php">Login</a></li> -->
				<!--<li class="right"><a href="#">AddAdmins</a></li> -->				
				<li class="right"><a href="Logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
	<!--Navigation bar end -->
	<br><br>

	<!--Middle Area for search bar start
	<div class="middle">
		<form class="searchbar">
			<input type="search" class="search" placeholder="Search for keywords">
			<input type="button" class="searchbtn" value="Search">
			<br><br>
		</form>
	</div>

		Middle Area for search bar end-->

		<!-- Owner page Middle area starts -->
	<div class="OwnerMiddle">
		<div id="Ownerleftnew">
			<?php 
				//include ("connection.php");
				//include ("function.php");


			$query = "select * from adminn";
			$result = mysqli_query($con,$query);
			//pre_r($result);
			//pre_r(mysqli_fetch_assoc($result));

			?>

			<div class="table">
				<table class="content-table">
					<thead>
						<tr>
							<th>Admin ID</th>
							<th>Admin Name</th>
							<th>Admin Password</th>
							<th>Admin Post</th>
							<th colspan="2">Action</th>
						</tr>
					</thead>
					<?php

					if (mysqli_num_rows($result) > 0){
						while($row = mysqli_fetch_assoc($result)): ?>
					
					<tr>
						<td><?php echo $row['Admin_id']; ?></td>
						<td><?php echo $row['Admin_username']; ?></td>
						<td><?php echo $row['Admin_password']; ?></td>
						<td><?php echo $row['A_code']; ?></td>
						<td>
							<a href="AdminUpdate.php?update=<?php echo $row['id']; ?>" class="update">Update</a>
							<a href="Owner.php?delete=<?php echo $row['id']; ?>" class="delete">Delete</a>
						</td>
					</tr>
				<?php endwhile; 
					}
				?>
				</table>
			</div>
			
		
		</div>

		<div id="Ownerright"> 

			<!-- Header name -->	
				<h1 style="text-align: center; color: green;"><u>Add Admin Members</u></h1>

			<!-- AddAdmin form starts -->
				
			<div class="AddAdmin">
				<form action="" method="POST">
					<fieldset class="form">

						<label class="lable">Admin id :</label><br>
						<input type="text" name="Admin_id" id="Admin_id" class="input" value="<?php echo $Admi_id; ?>" readonly><br><br>
						<label class="lable">Admin Name :</label><br>
						<input type="text" name="Admin_username" id="Admin_username" class="input"><br>
						<label class="lable">Admin status :</label><br>
						<input type="radio" name="A_code" id="A_code" value="Owner">Owner
						<input type="radio" name="A_code" id="A_code"value="Manager">Manager
						<input type="radio" name="A_code" id="A_code"value="Financial officer">Financial Officer
						<input type="radio" name="A_code" id="A_code"value="Delivery manager">Delivery Manager
						<input type="radio" name="A_code" id="A_code"value="Driver">Driver<br><br><br>
						<label class="lable">Password :</label><br>
						<input type="Password" name="Admin_password" id="Admin_password" class="input"><br><br>
						<input type="submit" name="submit" class="submit" value="submit">

					</fieldset>
				</form>
			</div>

		<!-- AddAdmin form ends -->

	</div>
</div>
		<!-- Owner page Middle area ends -->

	<div>	
		<!--Discount/Bonus Ads start
		<div class="Discount">
			<img class="discount" src="Images/Sliding Banners/banner 05.jpg" alt="Discount/Bonus Ads">
			<img class="discount" src="Images/Sliding Banners/banner 06.jpg" alt="Discount/Bonus Ads">
		</div>
			Discount/Bonus Ads ends -->

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
	</div>


<!-- javascript starts -->

<script type="text/javascript" src="Java/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="Java/jquery.cycle.js"></script>
<script type="text/javascript" src="Java/JS files/O.M.I.S.sliding.bannder.s.js"></script>

<!-- javascript ends -->

</body>
</html>