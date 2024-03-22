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


<!-- Container zone -->

<!DOCTYPE html>
<html>
<head>
	<title>Gateway</title>

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/css/gateway.css">

</head>
<body>
<br>
<br>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-11">
            <div class="card card0 rounded-0">
                <div class="row">
                    <div class="col-md-5 d-md-block d-none p-0 box">
                        <div class="card rounded-0 border-0 card1" id="bill">
                            <h3 id="heading1">Payment Summary</h3>
                            <?php
                            	$packID = $_GET['id'];
            
                            	$sel = "SELECT tbl_package.TITLE AS NAME, tbl_package.DIS_PRICE AS PRICE, tbl_package.AUTHOR AS AUTHOR, tbl_category.NAME AS CAT, tbl_package.ID AS ID FROM tbl_package, tbl_category WHERE tbl_package.CAT_ID = tbl_category.ID AND tbl_package.ID = '$packID'";
                            	$exe_sel = mysqli_query($conn, $sel);
                            	$ff = mysqli_fetch_assoc($exe_sel);
                                $_SESSION['pID'] = $ff['ID'];
                            ?>
                            <div class="row">
                                <div class="col-lg-7 col-8 mt-4 line pl-4">
                                    <h2 class="bill-head">Package</h2> <small class="bill-date"><?php echo $ff['NAME'];?></small>
                                </div>
                                <div class="col-lg-5 col-4 mt-4">
                                    <h2 class="bill-head px-xl-5 px-lg-4">CAF</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-7 col-8 mt-4 line pl-4">
                                    <h2 class="bill-head">Category</h2> <small class="bill-date"><?php echo $ff['CAT'];?></small>
                                </div>
                                <div class="col-lg-5 col-4 mt-4">
                                    <h2 class="bill-head px-xl-5 px-lg-4">JFK</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-7 col-8 mt-4 line pl-4">
                                    <h2 class="bill-head">Author</h2> <small class="bill-date"><?php echo $ff['AUTHOR'];?></small>
                                </div>
                                <div class="col-lg-5 col-4 mt-4">
                                    <h2 class="bill-head px-xl-5 px-lg-4">LHR</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-7 col-8 mt-4 line pl-4">
                                    <h2 class="bill-head">Date</h2> <small class="bill-date"><?php echo date("l jS \of F Y h:i:s A");?></small>
                                </div>
                                <div class="col-lg-5 col-4 mt-4">
                                    <h2 class="bill-head px-xl-5 px-lg-4">JFK</h2>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-12 red-bg">
                                    <p class="bill-date" id="total-label">Total Price</p>
                                    <h2 class="bill-head" id="total">₹ <?php echo $ff['PRICE'];?></h2> <small class="bill-date" id="total-label">Price includes all taxes</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 p-0 box">
                        <div class="card rounded-0 border-0 card2" id="paypage">
                            <div class="form-card">
                                <h2 id="heading2" class="text-danger">Payment Method</h2>
                                <div class="radio-group">
                                    <div class='radio' data-value="credit"><img src="assets/images/28akQFX.jpg" width="200px" height="60px"></div> <br>

                                </div>
                 				<form action="trans_process1.php">
                 					
                                 <label class="pay">Name on Card</label> <input type="text" name="holdername" placeholder="Holder Name">
                                <div class="row">
                                    <div class="col-8 col-md-6"> <label class="pay">Card Number</label> <input type="text" name="cardno" id="cr_no" placeholder="0000-0000-0000-0000" minlength="19" maxlength="19"> </div>
                                    <div class="col-4 col-md-6"> <label class="pay">CVV</label> <input type="password" name="cvcpwd" placeholder="&#9679;&#9679;&#9679;" class="placeicon" minlength="3" maxlength="3"> </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"> <label class="pay">Expiration Date</label> </div>
                                    <div class="col-md-12"> <input type="text" name="exp" id="exp" placeholder="MM/YY" minlength="5" maxlength="5"> </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"> <input type="submit" value="MAKE A PAYMENT" class="btn btn-info"> </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/gateway.js"></script>

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
