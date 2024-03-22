<?php require_once('includes/functions.php'); ?>
<?php require_once('includes/sessions.php'); ?>
<?php require_once('includes/config.php'); ?>

<?php

$g_id = $_GET['id'];
$table = "SELECT * FROM `tbl_team` WHERE ID = '$g_id'";
$exe = mysqli_query($conn,$table);
$res = mysqli_fetch_assoc($exe);

if ($res['ACCESS_CONTROL'] == 1) 
{
	$update = "UPDATE `tbl_team` SET `ACCESS_CONTROL` = 0 WHERE `ID` = '$g_id'";
	$exc = mysqli_query($conn,$update);
	Redirect_To('members.php');
}
else 
{
	$update = "UPDATE `tbl_team` SET `ACCESS_CONTROL` = 1 WHERE `ID` = '$g_id'";
	$exc = mysqli_query($conn,$update);
	Redirect_To('members.php');
}

?>