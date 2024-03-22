<?php

	
	require_once 'includes/config.php';

	if (isset($_POST['submit'])) 
	{
		session_start();

		$user = $_POST['user'];
		$pass = md5($_POST['pass']);
		$comapany = $_POST['comapany'];
		$Uname = $_POST['Uname'];
		$cid = $_SESSION['C_ID'];
		$ACCESS = $_SESSION['ACCESS'];

		if (empty($user) || empty($pass) || empty($comapany)) 
		{
			header('location:index.php?Empty= Please fill the forms.');
		}
		else
		{
			$sql = "SELECT * FROM `tbl_team` WHERE USER_ID = '$user' AND PASSWORD = '$pass' AND COMP_ID = '$cid' AND ACCESS_CONTROL = '$ACCESS' AND NAME = '$Uname'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_num_rows($result);
			if ($row == 1) 
			{
				$_SESSION['T_ID'] = $user;
				$_SESSION['C_ID'] = $cid;
				$_SESSION['U_name'] = $Uname;
				header('location:dashboard.php');
			}
			else
			{
				header('location:index.php?Invalid=Check your USER ID and PASSWORD.');
			}
		}
	}

?>