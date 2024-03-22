<?php require_once 'includes/config.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Idea</title>

	<link rel="stylesheet" type="text/css" href="assets/css/all.css">
	<script type="text/javascript" src="assets/js/all.js"></script>

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	<style type="text/css">
		.idea-box {
			width: 85%;
			height: 110px;
			margin: 0 auto;
			margin-top: 20px;
			background-color: #fff;
			border: 2px solid rgba(0,0,0,0.2);
			box-shadow: 0 10px 10px rgba(0,0,0,0.2);
			border-radius: 10px;
		}

		.idea-box h2 {
			margin-left: 20px;
			margin-top: 10px;
			margin-bottom: 10px;
		}

		.idea-box p {
			width: 96%;
			margin-left: 20px;
		}

		.idea-box p a {
			text-decoration: none;
		}


	</style>
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
	<br>
	<?php
		$sel = "SELECT * FROM `tbl_blog` ORDER BY `tbl_blog`.`DT` DESC";
		$query = mysqli_query($conn, $sel);
		$sn = 1;
		while ($row = mysqli_fetch_assoc($query)) 
		{
	?>
		<div class="idea-box">
			<h2># <?php echo $sn.' '.$row['TITLE'];?></h2><hr>
			<p><?php echo substr($row['CONTENT'], 0,350);?>.....<a href="idea_blog.php?id=<?php echo $row['ID'];?>">Read more</a></p>
		</div>
	<?php
		$sn ++;
		}
	?>

</body>
</html>