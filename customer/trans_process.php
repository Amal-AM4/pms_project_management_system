<?php
    session_start();
    require_once 'includes/config.php';

    if (isset($_SESSION['userID'])) 
    {
        $USER_ID = $_SESSION['userID'];
        $sql = "SELECT * FROM `tbl_user` WHERE EMAIL = '$USER_ID'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
?>

<?php

	if (isset($_POST['act'])) 
	{
		$courseID = $_SESSION['courseid'];
    	$uzID = $_SESSION['userrrid'];
    	$czID = $_SESSION['companyid'];

    	$holdername = $_GET['holdername'];
    	$cardno = $_GET['cardno'];
    	$cvcpwd = $_GET['cvcpwd'];
    	$exp_date = $_GET['exp'];
    	$cardno = str_replace( array("-",), '', $cardno);

    	if (($cardno == 1234567824683691) AND ($cvcpwd == 123)) {
    		$trans = "INSERT INTO `tbl_course_order`(`USER_ID`, `COURSE_ID`, `COMPY_ID`, `CARD_HOLDER`, `CARD_NO`, `EXP_DATE`, `LOGS`) VALUES ('$uzID','$courseID','$czID','$holdername','$cardno','$exp_date',now())";
    		$trans_exe = mysqli_query($conn, $trans);

            $sel = "SELECT tbl_course.EMP_ID AS EMP FROM tbl_course WHERE tbl_course.ID='$courseID'";
            $sel_exe = mysqli_query($conn, $sel);
            $re = mysqli_fetch_assoc($sel_exe);
            $empy_id = $re['EMP'];

            $insert_chatroom = "INSERT INTO `tbl_chatroom`(`USER_ONE`, `USER_TWO`, `LOGS`) VALUES ('$uzID','$empy_id',now())";
            $insert_chatroom_exe = mysqli_query($conn, $insert_chatroom);

            $s = "SELECT ID FROM tbl_chatroom WHERE USER_ONE='$uzID' AND USER_TWO='$empy_id'";
            $s_exe = mysqli_query($conn, $s);
            $chat = mysqli_fetch_assoc($s_exe);
            $roomID = $chat['ID'];

            $rply = "Thank you purchase our course. We will guide you to complete the project by providing this channel open.";

            $msg = "INSERT INTO `tbl_message`(`ROOM_ID`, `SENDER_ID`, `MESSAGE`, `DT`) VALUES ('$roomID','$empy_id','$rply',now())";
            $msg_exe = mysqli_query($conn, $msg);

    		$del = "DELETE FROM `tbl_cart` WHERE PACK_ID = '$courseID'";
    		$del_exe = mysqli_query($conn, $del);

    		header("location:success1.php");
    	}
	}

	if (isset($_POST['notact'])) 
	{
		header("location:cart.php");
	}

?>


<!-- Container zone -->

<!DOCTYPE html>
<html>
<head>
	<title>gateway</title>

	<link rel="stylesheet" type="text/css" href="assets/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/css/trans.css">
</head>
<body>

	<div class="container">
		<h2>Bank Demo</h2>
		<p>This is just a demo page.</p>
		<p>You can choose wheather to make this payment successful or not.</p>
		<form action="" method="post">
			<button class="not-active" name="notact"><i class="fas fa-times"></i> Failure</button>&nbsp;&nbsp;
			<button class="active" name="act"><i class="fas fa-check"></i> Successful</button>
		</form>
	</div>






<script type="text/javascript" src="assets/js/all.js"></script>

</body>
</html>


<!-- Container zone ends -->
<?php
    }
    else
    {
        header('location:../index.php');
    }
?>
