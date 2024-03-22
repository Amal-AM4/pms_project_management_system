<?php

	require_once 'includes/config.php';

	$message = $_POST['message'];
	$senderID = $_GET['ID'];
	$roomID = $_GET['ROOMID'];
	$ptwo = $_GET['p'];

	$sql = "INSERT INTO `tbl_message`(`ROOM_ID`, `SENDER_ID`, `MESSAGE`, `DT`) VALUES ('$roomID','$ptwo','$message',now())";
	$exe = mysqli_query($conn, $sql);

	header('location:message.php?rid='.$roomID.'&uid='.$senderID.'&emid='.$ptwo);

?>