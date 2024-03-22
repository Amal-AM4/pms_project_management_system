<?php require_once('includes/config.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>

	<link rel="stylesheet" type="text/css" href="assets/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/css/aos.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="assets/css/owl.theme.default.css">

	<link rel="stylesheet" type="text/css" href="assets/css/company.css">

	<!--<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">-->
</head>
<body>

	<header>
		<div class="nav-left">
			<a href="index.php">
				<img src="assets/images/logo.svg" class="img-fluid">
			</a>
		</div>
		<div class="nav-right">
			<nav>
				<ul>
					<li><a href="company.php">Company</a></li>
					<li><a href="#">About Us</a></li>
					<li><a href="#">Service</a></li>
					<li><a href="idea.php">Idea's</a></li>
					<li><a href="package.php">Package</a></li>
					<li><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>
					<li><a href="../user/dashboard.php" class="btn-login">Dashboard</a></li>
					<li><a href="sign_out.php" class="btn-signin">Sign out</a></li>
				</ul>
			</nav>
		</div>
	</header>

	
	<div class="tbl-compy">
		<h2>Company list</h2>
		<table>
			<?php
				$com = "SELECT * FROM `tbl_companies`";
				$com_exe = mysqli_query($conn, $com);

				while ($f = mysqli_fetch_assoc($com_exe)) 
				{
			?>
					<tr>
						<td><img width="140" height="80" src="../company/<?php echo substr($f['COMP_LOGO'], 8);?>"></td>
						<td class="content">
							<h1><?php echo $f['COMP_NAME'];?></h1>
							<p><?php echo substr($f['DESCRIPTION'], 0,140);?>....</p>
						</td>
						<td>
							<a href="company_details.php?id=<?php echo $f['ID'];?>"><button>View Details</button></a>
						</td>
					</tr>
			<?php
				}

			?>
		</table>
	</div>






	<footer>
		<div class="foot-container">
			<div class="foot-left">
				
				<div class="map">
					<iframe width="100%" height="310" src="https://maps.google.com/maps?q=8.794885634022751,76.75290231267087&output=embed"></iframe>
				</div>
			</div>
			<div class="foot-right">
				<h2>Contact Us</h2>
				<p>Skydash</p>
				<p>skydash@gmail.com</p>
				<p>+91 9885460132</p>
				<address>Skydash Near by Attingal Post Office</address>
				<p>Service 24x7</p>
				<br>
				<span class="copyright">Copyright ©2020 All rights reserved | Made by S6 CS</span>
			</div>
		</div>
	</footer>





<script type="text/javascript" src="assets/js/all.js"></script>
<script type="text/javascript" src="assets/js/aos.js"></script>

<!--<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>-->

</body>
</html>