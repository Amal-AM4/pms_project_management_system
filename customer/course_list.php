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
	<title>Course</title>

	<link rel="stylesheet" type="text/css" href="assets/css/all.css">
	<script type="text/javascript" src="assets/js/all.js"></script>

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="assets/css/course.css">

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
				
				$sql = "SELECT tbl_course.TITLE AS TITLE, tbl_course.ID AS PACKID, tbl_course.COVER_PIC AS IMG, tbl_course.ACT_PRICE AS ACT, tbl_course.DIS_PRICE AS DIS, tbl_category.CONTENT AS CONTS, tbl_category.NAME AS NAM, tbl_course.POST_CONTENT AS ABOUT,tbl_team.NAME AS AUTHOR FROM tbl_course,tbl_category,tbl_team WHERE tbl_course.CATEGORY_ID = tbl_category.ID AND tbl_course.EMP_ID=tbl_team.ID AND tbl_course.CATEGORY_ID = '$Key'";
			}
			else
			{
				$sql = "SELECT tbl_course.TITLE AS TITLE, tbl_course.ID AS PACKID, tbl_course.COVER_PIC AS IMG, tbl_course.ACT_PRICE AS ACT, tbl_course.DIS_PRICE AS DIS, tbl_course.POST_CONTENT AS ABOUT,tbl_team.NAME AS AUTHOR FROM tbl_course,tbl_team WHERE tbl_course.EMP_ID=tbl_team.ID AND tbl_course.STATUS = 1";

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
				<td><img src="../team/<?php echo $data['IMG'];?>" width=220 height=110></td>
				<td>
					<span class="h3"><?php echo $data['TITLE'];?></span><br>
					<span class="title"><?php echo substr($data['ABOUT'],0,100);?>......</span>
					<p>By <?php echo $data['AUTHOR'];?></p>
				</td>
				<td>
					<big style="color: #0dab49; margin-right:20px;">
						<?php  
                        	$dis = $data['DIS'];
                        	$org = $data['ACT'];
                        	$per = ($dis/$org) * 100;
                        	echo round($per).'%';
                   		?>
					</big>
				</td>
				<td><h3>₹ <?php echo $data['DIS'];?></h3>
					<small><strike>₹ <?php echo $data['ACT'];?></strike></small>
				</td>
				<td><a href="view_course_data.php?courseID=<?php echo $data['PACKID'];?>"><button>View</button></a></td>
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
				<td><img src="../team/<?php echo $data['IMG'];?>" width=220 height=110></td>
				<td>
					<span class="h3"><?php echo $data['TITLE'];?></span><br>
					<span class="title"><?php echo substr($data['ABOUT'],0,100);?>......</span>
					<p>By <?php echo $data['AUTHOR'];?></p>
				</td>
				<td>
					<big style="color: #0dab49; margin-right:20px;">
						<?php  
                        	$dis = $data['DIS'];
                        	$org = $data['ACT'];
                        	$per = ($dis/$org) * 100;
                        	echo round($per).'%';
                   		?>
					</big>
				</td>
				<td><h3>₹ <?php echo $data['DIS'];?></h3>
					<small><strike>₹ <?php echo $data['ACT'];?></strike></small>
				</td>
				<td><a href="view_course_data.php?courseID=<?php echo $data['PACKID'];?>"><button>View</button></a></td>
			</tr>
		<?php
			}
		?>
	</table>
	<?php
	}
	?>

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

