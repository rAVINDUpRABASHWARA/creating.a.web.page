<?php 


	require_once("connection.php");
	
	$id = $_GET['update'];
	$query = "select * from adminn where id = '".$id."'";
	$result = mysqli_query($con, $query);


	while($row = mysqli_fetch_assoc($result)){

		$id = $row['id'];
		$Admin_id = $row['Admin_id'];
		$Admin_username = $row['Admin_username'];
		$Admin_password = $row['Admin_password'];  		
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="Css/UpdateAdmin.css">
</head>
<body>

	<div class="OwnerMiddle">
		<div id="Ownerleftnew">
	<!-- Header name -->	
				<h1 style="text-align: center; color: green;"><u>Update Admin Members</u></h1> 

			<!-- AddAdmin form starts-->
				
			<div class="AddAdmin">
				<form action="update.php?ID=<?php echo $id ?>" method="POST">
					<fieldset class="form">

						<label class="lable">Admin id :</label><br>
						<input type="text" name="Admin_id" id="Admin_id" class="input" value="<?php echo $Admin_id ?>"><br>
						<label class="lable">Admin Name :</label><br>
						<input type="text" name="Admin_username" id="Admin_username" class="input" value="<?php echo $Admin_username ?>"><br>
						<label class="lable">Password :</label><br>
						<input type="Password" name="Admin_password" id="Admin_password" class="input" value="<?php echo $Admin_password ?>"><br>
						<input type="submit" name="update" class="update" value="update">

					</fieldset>
				</form>
			</div>

		 <!--AddAdmin form ends -->
		</div>
	</div>

</body>
</html>
