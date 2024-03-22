<?php
    session_start();
    require_once 'includes/config.php';

    if (isset($_SESSION['userID'])) 
    {
        $USER_ID = $_SESSION['userID'];
        $sql = "SELECT * FROM `tbl_user` WHERE EMAIL = '$USER_ID'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        $uID = $data['ID'];
?>
<!-- Container zone -->


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>

	<link rel="stylesheet" type="text/css" href="assets/css/cart.css">
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
					<li><a href="#">Company</a></li>
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

	<section class="da-screen">
		<h2>Shopping Cart</h2>
	</section>

	<section class="dcontainer">
		<div class="data-content">
			<?php
				$cart = "SELECT sum(PRICE) FROM `tbl_cart` WHERE USER_ID = '$uID'";
				$scart = mysqli_query($conn, $cart);
				$ecart = mysqli_fetch_assoc($scart);
			?>
			<p>Total: <h2>₹<?php 
			if ($ecart['sum(PRICE)'] == 0) {
				echo " "."0";
			}
			else {
				echo " ".$ecart['sum(PRICE)'];
			}
			
			?></h2></p>
		</div>
		<div class="dinfo">
			<?php
				$c = "SELECT count(ID) FROM `tbl_cart` WHERE USER_ID = '$uID'";
				$e = mysqli_query($conn, $c);
				$r = mysqli_fetch_assoc($e);
			?>
			<p><?php echo $r['count(ID)']; ?> Courses in Cart</p>
		</div>
		<div class="d-table">
			<table>
				<?php
					$rec = "SELECT tbl_cart.ID AS CARTID, tbl_cart.USER_ID AS USERID, tbl_course.ID AS COURSEID, tbl_companies.ID AS COMPYID, tbl_course.TITLE, tbl_team.NAME, tbl_course.COVER_PIC, tbl_course.DIS_PRICE FROM tbl_cart,tbl_course,tbl_team,tbl_companies WHERE tbl_cart.PACK_ID=tbl_course.ID AND tbl_course.EMP_ID=tbl_team.ID AND tbl_course.COMP_ID=tbl_companies.ID AND tbl_cart.USER_ID = '$uID'";
					$exe_rec = mysqli_query($conn, $rec);
					while ($ff = mysqli_fetch_assoc($exe_rec))
					{
				?>
						<tr>
							<td><img src="../team/<?php echo $ff['COVER_PIC'];?>"></td>
							<td><h2><?php echo $ff['TITLE'];?></h2><p>By <?php echo $ff['NAME'];?></p></td>
							<td><a href="remove_cart.php?courseID=<?php echo $ff['COURSEID'];?>" class="link">Remove</a></td>
							<td><p class="cost">₹<?php echo $ff['DIS_PRICE'];?></p></td>
							<td><a href="payment_gateway.php?uzID=<?php echo $ff['USERID'];?>&cozID=<?php echo $ff['COURSEID'];?>&czID=<?php echo $ff['COMPYID'];?>"><button>Checkout</button></a></td>
						</tr>
				<?php
					}
				?>
			</table>
		</div>
	</section>


<script type="text/javascript" src="assets/js/owl.carousel.js"></script>

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

