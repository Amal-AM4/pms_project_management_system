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
	<title>Idea</title>

	<link rel="stylesheet" type="text/css" href="assets/css/all.css">
	<script type="text/javascript" src="assets/js/all.js"></script>

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	<style type="text/css">
		.idea-container {
			width: 85%;
			margin: 0 auto;
			margin-top: 40px;
			margin-bottom: 40px;
		}

		.idea-container .box-box hr {
			margin-bottom: 20px;
			
		}

		.idea-container .box-box small {
			color: #9e9e9e;
		}

		.idea-container .box-box p {
			text-align: justify;
		}

		.comment {
			width: 85%;
			margin: 0 auto;
		}

		.comment .comment-box h3 {
			margin-bottom: 5px;
		}

		.comment .comment-box small {
			color: #9e9e9e;
		}

		.comment-box textarea {
			width: 500px;
			height: 80px;
			border: 1px solid #464649;
			border-radius: 10px;
			padding: 5px;
		}

		.comment-box form button {
			width: 100px;
			height: 40px;
			background-color: #576aff;
			color: #fff;
			border: none;
			border-radius: 10px;
			outline: none;
			cursor: pointer;
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

	<section class="idea-container">
		<?php
			$id = $_GET['id'];
			$sel = "SELECT tbl_blog.TITLE AS TITLE,tbl_blog.CONTENT AS ABOUT,tbl_user.FULL_NAME AS NAME FROM tbl_user,tbl_blog WHERE tbl_blog.USER_ID=tbl_user.ID AND tbl_blog.ID='$id'";
			$query = mysqli_query($conn, $sel);
			$row = mysqli_fetch_assoc($query);
			$post_id = $id;
		?>
		<div class="box-box">
			<h2><?php echo $row['TITLE'];?></h2>
			<small>posted by <?php echo $row['NAME'];?></small><hr>
			<p><?php echo $row['ABOUT'];?></p>
		</div>
	</section>

	<section class="comment">
		<div class="comment-box">
			<?php
				$s1 = "SELECT tbl_blog_comment.COMMENT AS COMMENTZ,tbl_user.PROFILE AS IMG,tbl_user.FULL_NAME AS NAME FROM tbl_blog_comment,tbl_user WHERE tbl_user.ID=tbl_blog_comment.SENDER_ID AND tbl_blog_comment.POST_ID='$id'";
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

					$insert = "INSERT INTO `tbl_blog_comment`(`SENDER_ID`, `POST_ID`, `COMMENT`, `DT`) VALUES ('$uID','$post_id','$text',now())";
					$exe = mysqli_query($conn,$insert);
				}
			?>

			<br>
			<table>
			<?php
				$s = "SELECT tbl_blog_comment.COMMENT AS COMMENTZ,tbl_user.PROFILE AS IMG,tbl_user.FULL_NAME AS NAME FROM tbl_blog_comment,tbl_user WHERE tbl_user.ID=tbl_blog_comment.SENDER_ID AND tbl_blog_comment.POST_ID='$id'";
				$q = mysqli_query($conn, $s);
				while ($r = mysqli_fetch_assoc($q)) 
				{
			?>
					<tr>
						<td><img src="../user/<?php echo $r['IMG'];?>" width="60" height="60" style="border-radius: 50px; margin-right: 20px;"></td>
						<td>
							<h4><?php echo $r['NAME'];?></h4>
							<p><?php echo $r['COMMENTZ'];?></p>
						</td>
					</tr>
			<?php
				}
			?>

			</table>
		</div>
	</section>

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
