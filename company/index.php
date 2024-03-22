<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="assets/css/admin_login.css">
	<link rel="stylesheet" type="text/css" href="assets/css/all.css">
</head>
<body>

	<div class="wrapper">
		<div class="container">

			<div class="icon">
				<i class="fas fa-fingerprint"></i>
			</div>
			<h2>MASTER ROOM</h2>
			<p>Hello there! Sign in and start managing your Company</p>

				<?php
					if (@$_GET['Empty']==true)
					{
				?>

					<center>
						<div class="alert">
							<h5><?php echo $_GET['Empty']; ?></h5>
						</div>
					</center>

				<?php
					}
				?>

				<?php
					if (@$_GET['Invalid']==true)
					{
				?>

					<center>
						<div class="alert">
							<h5><?php echo $_GET['Invalid']; ?></h5>
						</div>
					</center>

				<?php
					}
				?>

			<form action="sign_in.php" method="POST">
				<label for="user">USER ID</label><br>
				<input type="text" name="user" id="user"><br>
				<label for="pass">PASSWORD</label><br>
				<input type="password" name="pass" id="pass"><br>
				<center>
					<button name="submit" class="btn-click">SIGN IN NOW</button>
				</center>
				<center>
					<p class="h4">Copyright ©2020 All rights reserved | Made by S6 CS</p>
				</center>
			</form>

		</div>
	</div>



	<script type="text/javascript" src="assets/js/all.js"></script>
</body>
</html>