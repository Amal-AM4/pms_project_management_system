<?php require_once('includes/functions.php'); ?>
<?php require_once('includes/sessions.php'); ?>
<?php require_once 'includes/config.php'; ?>

<?php

if(isset($_POST['submit'])) 
{
	$name = ucwords($_POST['name']);
	$manager = ucwords($_POST['manager']);
	$userid = $_POST['userid'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$img = $_FILES['image']['name'];
    $img = date('mjYHis').$img;
    $img = preg_replace("/\s+/", "_", $img);
    $tmpname = $_FILES['image']['tmp_name'];
    $folder = "company/comp_logo/".$img;
    move_uploaded_file($tmpname,$folder);

    if(empty($name)) {
        $_SESSION['ErrorMessage'] = "All field must be fill out";
        Redirect_To('reg_company.php');
    }
    if(empty($manager)) {
        $_SESSION['ErrorMessage'] = "Missing field manager name";
        Redirect_To('reg_company.php');
    }
    if(empty($userid)) {
        $_SESSION['ErrorMessage'] = "Missing field user id";
        Redirect_To('reg_company.php');
    }
    if(empty($email)) {
        $_SESSION['ErrorMessage'] = "Missing field email";
        Redirect_To('reg_company.php');
    }
    if(empty($password)) {
        $_SESSION['ErrorMessage'] = "Missing field password";
        Redirect_To('reg_company.php');
    }
    if (!empty($email) AND !empty($userid) AND !empty($manager))
    {
    	$check = "SELECT * FROM `tbl_companies` WHERE EMAIL = '$email' AND USER_ID = '$userid'";
		$data = mysqli_query($conn, $check);
		$row = mysqli_num_rows($data);

		if ($row == 1) 
		{
			$_SESSION['ErrorMessage'] = "Email id or user id is aleady taken";
        	Redirect_To('reg_company.php');
		}
		else
		{
			$ins = "INSERT INTO `tbl_companies`(`COMP_NAME`, `COMP_LOGO`, `EMAIL`, `MANAGER_NAME`, `USER_ID`, `ACTIVATION`, `PASSWORD`, `LOGS`, `STATUS`) 
			VALUES ('$name','$folder','$email','$manager','$userid',0,'$password',now(),1)";
			
		
			if (mysqli_query($conn, $ins)) 
			{
				$_SESSION['SuccessMessage'] = "Data is successfully uploaded";
             	Redirect_To('reg_company.php');
			}
			else
			{
				$_SESSION['ErrorMessage'] = "Something went worng try again!";
        		Redirect_To('reg_company.php');
			}
		}
    }

}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>

	<link rel="stylesheet" type="text/css" href="assets/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/css/aos.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="assets/css/owl.theme.default.css">

	<link rel="stylesheet" type="text/css" href="assets/css/reg_user.css">

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
					<li><a href="customer/cart.php"><i class="fas fa-shopping-cart"></i></a></li>
					<li><a href="user/index.php" class="btn-login">Log in</a></li>
					<li><a href="reg_user.php" class="btn-signin">Sign up</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<section class="user_con">
		<p>Sign Up and Start Learning!</p>
		<div style="margin-bottom: 10px;">
			<a href="reg_user.php" class="linkz">User</a>
			<a href="reg_company.php" class="active">Company</a>
			<a href="reg_free.php" class="linkz">Freelancer</a>
		</div>
		<hr><br>
		 	<div style="margin-bottom: 10px; font-weight: bold;">
                <?php 
                    echo Message();
                    echo SuccessMessage();
                ?>
            </div>
		<center>
			<form action="reg_company.php" method="post" enctype="multipart/form-data">
			<table>
			<tr>
				<td>
					<input type="text" name="name" placeholder="Company Name">
				</td>
			</tr>
			<tr>
				<td>
					<input type="file" name="image">
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="manager" placeholder="Manager Name">
				</td>
			</tr>
			
			<tr>
				<td>
					<input type="email" name="email" placeholder="example@gmail.com">
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="userid" placeholder="User ID">
				</td>
			</tr>
			<tr>
				<td>
					<input type="password" name="password" placeholder="Password">
				</td>
			</tr>
			<tr>
				<td>
					<button type="submit" name="submit">Sign Up</button>
				</td>
			</tr>
		</table>
		</form>
		</center>
		<br>
		<p style="font-size: 14px; font-weight: normal;">Already have an account? <b><a href="company/index.php">Log In</a></b></p>

	</section>






<script type="text/javascript" src="assets/js/all.js"></script>
<script type="text/javascript" src="assets/js/aos.js"></script>


</body>
</html>