<?php
    session_start();
    require_once 'includes/config.php';

    if (isset($_SESSION['userID'])) 
    {
        $USER_ID = $_SESSION['userID'];
        $sql = "SELECT * FROM `tbl_user` WHERE EMAIL = '$USER_ID'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        $u = $data['ID'];
?>

<?php

	if (isset($_POST['act'])) 
	{
		$packID = $_SESSION['pID'];
        $_SESSION['pID'] = $packID;
    	
    	$holdername = $_GET['holdername'];
    	$cardno = $_GET['cardno'];
    	$cvcpwd = $_GET['cvcpwd'];
    	$exp_date = $_GET['exp'];
    	$cardno = str_replace( array("-",), '', $cardno);

    	if (($cardno == 1234 5678 1234 5678) AND ($cvcpwd == 123)) 
        {
    		$trans = "INSERT INTO `tbl_package_order`(`USER_ID`, `PACK_ID`, `CARD_HOLDER`, `CARD_NO`, `EXP_DATE`, `LOGS`) VALUES ('$u','$packID','$holdername','$cardno','$exp_date',now())";

    		$trans_exe = mysqli_query($conn, $trans);

    		header("location:success.php");
    	}
	}

	if (isset($_POST['notact'])) 
	{
		header("location:package.php");
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
