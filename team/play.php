<style type="text/css">
	video {
		border-radius: 10px;
	}
</style>


<?php
	require_once 'includes/config.php';

	if (isset($_GET['courseID']) && isset($_GET['epID'])) 
	{
		$courseID = $_GET['courseID'];
		$epID = $_GET['epID'];

		$sel = "SELECT VIDEO FROM `tbl_lesson` WHERE ID = '$epID' AND COURSE_ID = '$courseID'";
		$exe = mysqli_query($conn, $sel);
		$rowss = mysqli_fetch_assoc($exe);
	?>
		<video width="100%" height="100%" controls autoplay>
		    <source src="../team/<?php echo $rowss['VIDEO'];?>" type="video/mp4">
		</video>

	<?php
	}
?>

