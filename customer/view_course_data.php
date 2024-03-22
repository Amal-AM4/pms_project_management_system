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


<?php
	$courseID = $_GET['courseID'];
	$sel = "SELECT tbl_course.TITLE AS TITLE,tbl_course.COVER_PIC AS IMG,tbl_course.POST_CONTENT AS CONTENT,tbl_course.ACT_PRICE AS ACT,tbl_course.DIS_PRICE AS DIC,tbl_team.NAME AS NAME,tbl_team.ABOUT AS ABNAME,tbl_category.NAME AS CATNAME,tbl_course.LOGS AS DT,tbl_companies.COMP_NAME AS COMPNAME,tbl_companies.ID AS COMPID FROM tbl_team,tbl_course,tbl_category,tbl_companies WHERE tbl_course.EMP_ID=tbl_team.ID AND tbl_course.CATEGORY_ID=tbl_category.ID AND tbl_course.COMP_ID = tbl_companies.ID AND tbl_course.ID = '$courseID'";
	$exe = mysqli_query($conn,$sel);
	$row1 = mysqli_fetch_assoc($exe);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Course</title>
	<link rel="stylesheet" type="text/css" href="assets/css/all.css">
	<script type="text/javascript" src="assets/js/all.js"></script>

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="assets/css/course_data.css">
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
		<div class="one-container">
			<div class="left">
				<h2><?php echo $row1['TITLE']; ?></h2>
				<p>Become a full-stack developer with just one course. HTML, CSS, Javascript, Node, React, MongoDB and more!</p>
				<h3>Category <?php echo $row1['CATNAME']; ?></h3>
				<h4>Developed by <a class="link" href="company_details.php?id=<?php echo $row1['COMPID']; ?>"><?php echo $row1['COMPNAME']; ?></a></h4>
				<h4>Created by <?php echo $row1['NAME']; ?></h4>
				<h4>Created date <?php echo substr($row1['DT'], 0,10); ?></h4>
				<h4 style="font-family: sans-serif; font-size: 20px;">Price ₹<?php echo $row1['DIC']; ?>&nbsp;&nbsp;<strike style="font-family: sans-serif; font-size: 14px;">₹<?php echo $row1['ACT']; ?></strike>&nbsp;&nbsp;<big style="font-family: sans-serif; font-size: 25px; color: #f83f3f;">
					<?php  
                        $dis = $row1['DIC'];
                        $org = $row1['ACT'];
                        $per = ($dis/$org) * 100;
                        echo round($per).'% off';
                   	?>
				</big></h4>
				
			</div>
			<div class="right">
				<div class="boxx">
					<img src="../team/<?php echo $row1['IMG']; ?>" width="100%" height="200" style="border-radius: 10px 10px 0px 0px;">
				
						<form method="post" class="flex-box">
							<a href="payment_gateway.php?uzID=<?php echo $uID;?>&cozID=<?php echo $courseID;?>&czID=<?php echo $row1['COMPID']?>" class="buy">
							Buy</a>
							<a href="add_cart.php?uID=<?php echo $uID;?>&cID=<?php echo $courseID;?>&n=<?php echo $row1['TITLE'];?>&p=<?php echo $row1['DIC'];?>"  class="cart">
								<i class="fas fa-shopping-cart"></i> Cart
							</a>
							
						</form>

				</div>
			</div>
		</div>
	</section>

	<section class="phase-two">
		<div class="con-two">
			<h2>Course contant</h2>
			<br>
			<span><?php echo $row1['CONTENT']; ?></span>
		</div>
	</section>

	<section class="phase-three">
		<div class="con-three">
			<h2>Instructor</h2>
			<br>
			<span><?php echo $row1['ABNAME']; ?></span>
		</div>
	</section>

	<section class="comment">
		<div class="comment-box">
			<?php
				$s1 = "SELECT tbl_public_comment.COMMENT AS COMMENTZ,tbl_user.PROFILE AS IMG,tbl_user.FULL_NAME AS NAMES FROM tbl_public_comment,tbl_user WHERE tbl_user.ID=tbl_public_comment.SENDER_ID AND tbl_public_comment.COURSE_ID='$courseID'";
				$q1 = mysqli_query($conn, $s1);
				$no = mysqli_num_rows($q1);
			?>
			<h3>Comments <small>#<?php echo $no;?></small></h3><hr><br>
			<form action="" method="post">
				<textarea placeholder="Type here..." name="text"></textarea><br>
				<button type="submit" name="submit">post</button>
			</form>

			<?php
				if (isset($_POST['submit'])) 
				{
					$text = $_POST['text'];

					$insert = "INSERT INTO `tbl_public_comment`(`SENDER_ID`, `COURSE_ID`, `COMMENT`, `DT`) VALUES ('$uID','$courseID','$text',now())";
					$exe = mysqli_query($conn,$insert);
				}
			?>

			<br>
			<table>
			<?php
				$s = "SELECT tbl_public_comment.COMMENT AS COMMENTZ,tbl_user.PROFILE AS IMG,tbl_user.FULL_NAME AS NAMES FROM tbl_public_comment,tbl_user WHERE tbl_user.ID=tbl_public_comment.SENDER_ID AND tbl_public_comment.COURSE_ID='$courseID'";
				$q = mysqli_query($conn, $s);
				while ($r = mysqli_fetch_assoc($q)) 
				{
			?>
					<tr>
						<td><img src="../user/<?php echo $r['IMG'];?>" width="60" height="60" style="border-radius: 50px; margin-right: 20px;"></td>
						<td>
							<h4><?php echo $r['NAMES'];?></h4>
							<p><?php echo $r['COMMENTZ'];?></p>
						</td>
					</tr>
			<?php
				}
			?>

			</table>
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

