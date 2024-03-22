<?php

	session_start();
	require_once 'includes/config.php';

	if (isset($_POST['submit'])) 
	{

		$user = $_POST['email'];
		$pass = md5($_POST['password']);

		if (empty($user) || empty($pass)) 
		{
			header('location:index.php?Empty= Please fill the forms.');
		}
		else
		{
			$sql = "SELECT * FROM `tbl_user` WHERE EMAIL = '$user' AND PASSWORD = '$pass'";
			$result = mysqli_query($conn, $sql);

			if (mysqli_fetch_assoc($result)) 
			{
				$_SESSION['userID'] = $user;
				header('location:../customer/index.php');
			}
			else
			{
				header('location:index.php?Invalid=Check your USER ID and PASSWORD.');
			}
		}
	}

?>