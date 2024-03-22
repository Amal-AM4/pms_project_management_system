<?php
    session_start();
    require_once 'includes/config.php';

    if (isset($_SESSION['userID'])) 
    {
        $USER_ID = $_SESSION['userID'];
        $sql = "SELECT * FROM `tbl_user` WHERE EMAIL = '$USER_ID'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
?>


<!-- Container zone -->

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
	<link rel="stylesheet" type="text/css" href="assets/css/view_packz.css">
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

	<section class="pack-box">
		<?php
			$packID = $_GET['packID'];

			$sql = "SELECT tbl_package.*, tbl_category.NAME AS NAM FROM `tbl_package`,tbl_category WHERE tbl_package.CAT_ID=tbl_category.ID AND tbl_package.ID = '$packID'";
			$exe = mysqli_query($conn, $sql);
			$res = mysqli_fetch_assoc($exe);
		?>
		<div class="box-left">
			<img src="../fpanal/<?php echo $res['PACK_IMG'];?>" class="img-data">
		</div>
		<div class="box-right">
			<h1><?php echo $res['TITLE'];?></h1>
			<p>Learn <?php echo $res['NAM'];?> like a Professional start from the basic and go all the way to create your own applications and games.</p>
			<p class="author">Created by <b><?php echo $res['AUTHOR'];?></b></p>
			<p class="date">Last update <?php echo $res['LOGS'];?></p>
			<p class="price">Price : ₹ <?php echo $res['DIS_PRICE'];?></p>
			
				<a href="payment_gateway1.php?id=<?php echo $res['ID'];?>"><button name="download" class="btn-buy">Buy</button></a>
			
		</div>
		<hr>
	</section>

	<section class="packz-about">
		<h2>Package content</h2>
		<div class="packz-small-box">
			<span class="ab-data"><?php echo $res['POST_CONT'];?></span>
		</div>
		
				<a href="payment_gateway1.php?id=<?php echo $res['ID'];?>"><button name="download" class="btn-buy">Download</button></a>
		
	</section>
	<br>
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



<!-- Container zone ends -->
<?php
    }
    else
    {
        header('location:../index.php');
    }
?>
