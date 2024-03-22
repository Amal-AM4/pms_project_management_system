<?php

	session_start();
    require_once 'includes/config.php';

	$packID = $_SESSION['pID'];

	$s = "SELECT * FROM tbl_package WHERE ID = '$packID'";
    $r = mysqli_query($conn, $s);

    $file = mysqli_fetch_assoc($r);
    $filepath = '../fpanal/packages/' . $filename;

    if (file_exists($filepath)) 
    {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../fpanal/' . $file['PACK_FILE']));
        readfile('../fpanal/' . $file['PACK_FILE']);
        exit;

        // Now update downloads count
        $newCount = $file['DOWNLOADS'] + 1;
        $updateQuery = "UPDATE tbl_package SET DOWNLOADS=$newCount WHERE ID = '$packID'";
        mysqli_query($conn, $updateQuery);
                
    }

?>
