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
	<link rel="stylesheet" type="text/css" href="assets/css/package.css">
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

	<section class="small-con">
		<form action="" method="post">
			<select name="group" class="box-sel">
				<option>Filter</option>
				<?php
					$sql = "SELECT * FROM `tbl_category`";
					$exe = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_assoc($exe)) 
					{
				?>
					<option value="<?php echo $row['ID'];?>"><?php echo $row['NAME'];?></option>
				<?php
					}
				?>
			</select>
			<button type="submit" name="submit">Search</button>
		</form>
		<hr>
	</section>

	<?php
		if (isset($_POST['submit'])) 
			{
				$Key = $_POST['group'];
				
				$sql = "SELECT tbl_package.TITLE AS TITLE, tbl_package.ID AS PACKID, tbl_package.AUTHOR AS AUTHOR, tbl_package.PACK_IMG AS IMG, tbl_package.ACT_PRICE AS ACT, tbl_package.DIS_PRICE AS DIS, tbl_category.CONTENT AS CONTS, tbl_category.NAME AS NAM, tbl_package.POST_CONT AS ABOUT FROM tbl_package,tbl_category WHERE tbl_package.CAT_ID = tbl_category.ID AND tbl_package.CAT_ID = '$Key'";
			}
			else
			{
				$sql = "SELECT tbl_package.TITLE AS TITLE, tbl_package.ID AS PACKID, tbl_package.AUTHOR AS AUTHOR, tbl_package.PACK_IMG AS IMG, tbl_package.ACT_PRICE AS ACT, tbl_package.DIS_PRICE AS DIS, tbl_package.POST_CONT AS ABOUT FROM tbl_package WHERE STATUS = 1";

				$searchKey = "";
			}
				
			$result = mysqli_query($conn,$sql);
	?>


	<?php
	if (isset($_POST['submit'])) 
	{
	?>
	<table>
		<?php
			while ($data = mysqli_fetch_assoc($result)) 
			{
		?>
			<tr>
				<td><img src="fpanal/<?php echo $data['IMG'];?>" width=250 height=140></td>
				<td>
					<span class="h3"><?php echo $data['TITLE'];?></span><br>
					<span class="title"><?php echo substr($data['ABOUT'],0,100);?>......</span>
					<p>By <?php echo $data['AUTHOR'];?></p>
				</td>
				<td><h3>₹ <?php echo $data['DIS'];?></h3>
					<small><strike>₹ <?php echo $data['ACT'];?></strike></small>
				</td>
				<td><a href="view_packz.php?packID=<?php echo $data['PACKID'];?>"><button>View</button></a></td>
			</tr>
	</table>
			<section class="about">
				<h1>More about <?php echo $data['NAM'];?></h1>
				<p><?php echo $data['CONTS'];?></p>
			</section>
		<?php
			}
		?>
	<?php
	}
	else
	{
	?>
	<table>
		<?php
			while ($data = mysqli_fetch_assoc($result)) 
			{
		?>
			<tr>
				<td><img src="fpanal/<?php echo $data['IMG'];?>" width=250 height=140></td>
				<td>
					<span class="h3"><?php echo $data['TITLE'];?></span><br>
					<span class="title"><?php echo substr($data['ABOUT'],0,100);?>......</span>
					<p>By <?php echo $data['AUTHOR'];?></p>
				</td>
				<td><h3>₹ <?php echo $data['DIS'];?></h3>
					<small><strike>₹ <?php echo $data['ACT'];?></strike></small>
				</td>
				<td><a href="view_packz.php?packID=<?php echo $data['PACKID'];?>"><button>View</button></a></td>
			</tr>
		<?php
			}
		?>
	</table>
	<?php
	}
	?>
	

	
<script type="text/javascript" src="assets/js/all.js"></script>
<script type="text/javascript" src="assets/js/aos.js"></script>

<!--<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>-->

</body>
</html>