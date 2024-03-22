A<?php

	require_once 'includes/config.php';

	$cID = $_GET['cID'];
	$epID = $_GET['epID'];

	header('location:video_room.php?courseID='.$cID.'&epID='.$epID);

?>