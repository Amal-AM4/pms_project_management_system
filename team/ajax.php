<?php require_once('includes/config.php'); ?>
<?php
	session_start();
	$user = $_GET['user'];

	$s = "SELECT * FROM `tbl_companies` WHERE COMP_NAME = '$user'";
	$e = mysqli_query($conn,$s);
	$data = mysqli_fetch_assoc($e);
	
	$d = $data['ID'];

	$sql = "SELECT * FROM `tbl_team` WHERE COMP_ID = '$d'";
	$exe = mysqli_query($conn,$sql);

	echo "<select class='dropdown' name='Uname'>";
	while ($row = mysqli_fetch_assoc($exe))
	{
		$_SESSION['ACCESS'] = $row['ACCESS_CONTROL'];
?>
		<option value="<?php echo $row['NAME'];?>"><?php echo $row['NAME'];?></option>
<?php
	}
	echo "</select>";
?>