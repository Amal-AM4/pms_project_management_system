<?php
	require_once 'includes/config.php';

	$uID = $_GET['uID'];
	$cID = $_GET['cID'];
	$n = $_GET['n'];
	$p = $_GET['p'];

	$sel = "SELECT * FROM `tbl_cart` WHERE PACK_ID = '$cID'";
	$exe = mysqli_query($conn, $sel);
	$res = mysqli_num_rows($exe);

	if ($res == 1) 
	{
		header('location:index.php');
	}
	else
	{
		$sql = "INSERT INTO `tbl_cart`(`USER_ID`, `PACK_ID`, `PACK_NAME`, `PRICE`, `STATUS`, `LOGS`) VALUES ('$uID','$cID','$n','$p',1,now())";
		$execute = mysqli_query($conn, $sql);
		header('location:index.php');
	}

	
?>