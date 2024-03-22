<?php
	require_once 'includes/config.php';
	$compID = $_GET['id'];

	$sel = "SELECT * FROM `tbl_companies` WHERE ID = '$compID'";
	$exe = mysqli_query($conn,$sel);
	$rest = mysqli_fetch_assoc($exe);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Company</title>

	<link rel="stylesheet" type="text/css" href="assets/css/company-one.css">

	<link rel="stylesheet" type="text/css" href="assets/css/all.css">
	<script type="text/javascript" src="assets/js/all.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/aos.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="assets/css/owl.theme.default.css">
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

	<section class="phase-one">
		<div class="phase-container">
			<div class="left">
				<h1><?php echo $rest['COMP_NAME']; ?></h1>
				<p>Manager: <?php echo $rest['MANAGER_NAME']; ?></p>
				<p>Email-ID: <?php echo $rest['EMAIL']; ?></p>
				<p>Contact No: <?php echo $rest['PHONE']; ?></p>
				<small><b>Address: <?php echo $rest['ADDRESS']; ?></b></small>
			</div>
			<div class="right">
				<div class="map-preload">
					<iframe width="100%" height="200" src="https://maps.google.com/maps?q=<?php echo $rest['LONGITUDE']; ?>,<?php echo $rest['LATITUDE']; ?>&output=embed"></iframe>
				</div>
			</div>
		</div>
	</section>

	<section class="phase-two">
		<h2>About Us</h2><hr>
		<br>
		<span style="text-align: justify;">
			<?php echo $rest['DESCRIPTION']; ?>
		</span>
	</section>

	<section class="phase-three">
		<h2>Facility</h2><hr><br>
		
		<div class="owl-carousel owl-theme">
			<?php
				$gal = "SELECT * FROM `tbl_gallery` WHERE COMP_ID = '$compID'";
				$exe_gal = mysqli_query($conn,$gal);
				while ($galz = mysqli_fetch_assoc($exe_gal)) 
				{
			?>
				<div class="item" style="margin-right: 10px;">
					<img src="../company/<?php echo $galz['PHOTO']; ?>" width="320" height="180">		
				</div>	
			<?php
				}
			?>
		</div>

	</section>

	<section class="phase-four">
		<div class="alert-msg">
			<h2>Info</h2><hr style="border-color: #0179ad;">
			<p>If you're will to take our internship or offline class. It also embraces what we must aspire to be. It is the indivisible synthesis of the four values. The Spirit is a beacon. It is what gives us direction and a clear sense of purpose. It energizes us and is the touchstone for all that we do. Together, we discover ideas and connect the dots to build a better and a bold new future.</p>
			<p>If you are will to join please contact us by email or phone no. the indivisible synthesis of the four values. The Spirit is a beacon. It is what gives us direction and a clear sense of purpose. It energizes us and is the touchstone for all that we do. Together, we discover ideas and connect the dots to build a better and a bold new future.</p>
		</div>
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


<script type="text/javascript" src="assets/js/owl.carousel.js"></script>

<script type="text/javascript">
	$(".owl-carousel").owlCarousel({
      autoPlay: 3000,
      loop:true,
      nav:false,
      items : 1, // THIS IS IMPORTANT
      responsive : {
            480 : { items : 1  }, // from zero to 480 screen width 4 items
            768 : { items : 3  }, // from 480 screen widthto 768 6 items
            1024 : { items : 4   // from 768 screen width to 1024 8 items
            }
        },
  });
</script>
</body>
</html>