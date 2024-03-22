<?php
	require_once 'includes/config.php';

	$courseID = $_GET['courseID'];

	$del = "DELETE FROM `tbl_cart` WHERE PACK_ID = '$courseID'";
    $del_exe = mysqli_query($conn, $del);

    header("location:cart.php");

?>