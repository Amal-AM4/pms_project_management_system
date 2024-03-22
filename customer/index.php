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

	<section class="container">
		<div class="con-left">
			<div class="con-info">
				<p>For you</p>
				<hr>
				<h1>Better Solutions For Your Project</h1>
				<p class="info">
					The easiest way to stay ahead. Building independent and creative thinkers, with purpose.
				</p><br>
				<a href="#" class="active">Registration</a>
			</div>
		</div>
		<div class="con-right"></div>
	</section>

	<section class="service">
		<div class="ser-data">
			<h2 class="info">The world's largest selection of projects</h2>
			<p>Choose from 10,000 online video course with new additions published every month.</p>
		</div>
		<div class="box">
			<div class="dis-box">
				<h1>Expand your career opportunities with us</h1>
				<p class="info-box">Project management is the process of leading the work of a team to achieve goals and meet success criteria at a specified time. The primary challenge of project management is to achieve all of the project goals within the given constraints.</p><br>
				<a href="course_list.php">Explore</a>
				<div class="owl-carousel owl-theme">
					<?php
						$sel = "SELECT tbl_course.ID AS courseID, tbl_course.*, tbl_team.* FROM tbl_course, tbl_team WHERE tbl_course.EMP_ID = tbl_team.ID";
						$run = mysqli_query($conn, $sel);
						while ($fetch = mysqli_fetch_assoc($run)) 
						{
					?>
							<div class="item">
								<img src="../team/<?php echo $fetch['COVER_PIC']?>" class="cover">
								<h2><?php echo $fetch['TITLE'];?></h2>
								<small><?php echo $fetch['NAME'];?></small><br>
								<big class="big">₹<?php echo $fetch['ACT_PRICE'];?></big>&nbsp;&nbsp;<big><strike>₹<?php echo $fetch['DIS_PRICE'];?></strike></big><br><br>
									<a href="view_course_data.php?courseID=<?php echo $fetch['courseID'];?>" class="eye"><i class="far fa-eye"></i></a>
									<a href="add_cart.php?uID=<?php echo $data['ID'];?>&cID=<?php echo $fetch['courseID'];?>&n=<?php echo $fetch['TITLE'];?>&p=<?php echo $fetch['DIS_PRICE'];?>" class="cart" name="cart">Add Cart</a>
							</div>
					<?php
						}
					?>
				</div>
			</div>
		</div>
	</section>
	<br><br>

	<section class="small-info">
		<div class="small-intro">
			<div class="small-box">
				<div class="small-left">
					<i class="fas fa-play-circle"></i>
				</div>
				<div class="small-right">
					<h2>Over 100,000 project video course</h2>
				</div>
			</div>
			<div class="small-box">
				<div class="small-left">
					<i class="fas fa-check-circle"></i>
				</div>
				<div class="small-right">
					<h2>Choose from top industry instructors</h2>
				</div>
			</div>
			<div class="small-box">
				<div class="small-left">
					<i class="fab fa-gg-circle"></i>
				</div>
				<div class="small-right">
					<h2>Learn at your own place, with life time access</h2>
				</div>
			</div>
		</div>
	</section>

	<section class="dd-about">
		<div class="dd-container">
			<div class="dd-con-left">
				<h2>About Us</h2>
				<p>By connecting students all over the world to the best instructors, Skydash is helping individuals reach their goals and pursue their dreams. Skydash helps organizations of all kinds prepare for the ever-evolving future of work. Our curated collection of top-rated business and technical courses gives companies, governments, and nonprofits the power to develop in-house expertise and satisfy employees’ hunger for learning and development. Skydash employees live out our values every day as learners and teachers ourselves. Our culture is diverse, inclusive, and committed to personal and professional development. We’re not afraid to take on a new challenge, and we love taking Skydash courses!</p>
				<a href="#"><button>Join our team</button></a>
			</div>
			<div class="dd-con-right">
				<div class="dd-display">
					<h2>To join our team, Please register !</h2>
					<div class="dis-family">
						<div class="disp-box">
							<h2>
								<?php
									require_once 'includes/config.php';
									$SQL = "SELECT * FROM `tbl_user`";
									$s = mysqli_query($conn, $SQL);
									$num = mysqli_num_rows($s);
									echo $num;
								?>
							</h2>
							<h3>Users</h3>
						</div>
						<div class="disp-box">
							<h2>
								<?php
									require_once 'includes/config.php';
									$SQL = "SELECT * FROM `tbl_companies`";
									$s = mysqli_query($conn, $SQL);
									$num = mysqli_num_rows($s);
									echo $num;
								?>
							</h2>
							<h3>Company</h3>
						</div>
						<div class="disp-box">
							<h2>
								<?php
									require_once 'includes/config.php';
									$SQL = "SELECT * FROM `tbl_course`";
									$s = mysqli_query($conn, $SQL);
									$num = mysqli_num_rows($s);
									echo $num;
								?>
							</h2>
							<h3>Course</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

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

