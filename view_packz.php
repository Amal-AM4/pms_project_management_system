<?php require_once('includes/config.php'); ?>
<?php

if (isset($_POST['download'])) {
	session_start();
	if (!isset($_SESSION['userID']))
	{
		echo "<script>
				alert('Sorry, please kindly sign in to buy or add cart.');
				window.location.assign('http://localhost/startup/user/index.php');
				</script>";
	}
	else
	{
		header('location:customer/index.php');
	}
}

?>
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
					<li><a href="#">Company</a></li>
					<li><a href="index.php">About Us</a></li>
					<li><a href="index.php">Service</a></li>
					<li><a href="idea.php">Idea's</a></li>
					<li><a href="package.php">Package</a></li>
					<li><a href="customer/cart.php"><i class="fas fa-shopping-cart"></i></a></li>
					<li><a href="user/index.php" class="btn-login">Log in</a></li>
					<li><a href="reg_user.php" class="btn-signin">Sign up</a></li>
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
			<img src="fpanal/<?php echo $res['PACK_IMG'];?>" class="img-data">
		</div>
		<div class="box-right">
			<h1><?php echo $res['TITLE'];?></h1>
			<p>Learn <?php echo $res['NAM'];?> like a Professional start from the basic and go all the way to create your own applications and games.</p>
			<p class="author">Created by <b><?php echo $res['AUTHOR'];?></b></p>
			<p class="date">Last update <?php echo $res['LOGS'];?></p>
			<p class="price">Price : ₹ <?php echo $res['DIS_PRICE'];?></p>
			<form method="post">
				<button name="download" class="btn-buy">Buy</button>
			</form>
		</div>
		<hr>
	</section>

	<section class="packz-about">
		<h2>Package content</h2>
		<div class="packz-small-box">
			<span class="ab-data"><?php echo $res['POST_CONT'];?></span>
		</div>
		<form method="post">
				<button name="download" class="btn-buy">Download</button>
		</form>
	</section>



<script type="text/javascript" src="assets/js/all.js"></script>
<script type="text/javascript" src="assets/js/aos.js"></script>

<!--<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>-->


</body>
</html>