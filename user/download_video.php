<?php

	require_once 'includes/config.php';

	$courseID = $_GET['cID'];
	$epID = $_GET['epID'];

	$sel = "SELECT VIDEO FROM `tbl_lesson` WHERE ID = '$epID' AND COURSE_ID = '$courseID'";
	$exe = mysqli_query($conn, $sel);
	$file = mysqli_fetch_assoc($exe);

	$filename = basename($file['VIDEO']);
   	$filepath = '../team/video/' . $filename;

   		 if (file_exists($filepath)) 
		    {
		    	header("Cache-Control: public");
				header("Content-Description: FILe Transfer");
				header("Content-Disposition: attachment; filename=$filename");
				header("Content-Type: application/zip");
				header("Content-Transfer-Emcoding: binary");

				readfile($filepath);
				exit;
	        }      
	    else
	       	{
	        	echo "File does not exits.";
	        }

	header('location:video_room.php?courseID='.$courseID.'&epID='.$epID);

?>