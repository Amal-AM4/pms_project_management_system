
<link rel="stylesheet" type="text/css" href="assets/css/all.css">
<style type="text/css">
	@font-face{
	font-family: my_PTSans;
	src: url('assets/font/PTSans-Regular.ttf');
	}

	*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: my_PTSans;
	}
	body{
		background-color: #FFF;
		color: #1C2833;
	}
	.container{
		display: block;
		height: 100vh;
		position: relative;
	}
	.wrapper{
		width: 650px;
		height: 350px;
		background: #fff;
		color: #263238;
		border-radius: 30px;
		box-shadow: 0 10px 10px rgba(0,0,0,0.09);
		position: absolute;
		left: 0; right: 0; top: 0; bottom: 0;
		margin: auto;
	}
	.wrapper .hearder{
		display: block;
		height: 100px;
		background: rgba(178, 223, 219,0.3);
		border-radius: 30px 30px 0px 0px;
	}
	.wrapper .hearder h2{
		padding-top: 30px;
		padding-left: 40px;
		font-size: 2em;
	}
	.wrapper .title{
		display: block;
		height: 130px;
	}
	.wrapper .title .fa-check-circle{
		font-size: 8em;
		color: #80d9ff;
		padding-top: 10px;
		padding-left: 40px;
	}
	.wrapper .title .h2{
		font-size: 1.5em;
		color: #80d9ff;
		position: relative;
		bottom: 60px; left: 20px;
	}
	.wrapper .title .h3{
		position: relative;
		bottom: 10px; right: 230px;
		font-size: 3em;
		font-weight: bold;
	}
	.wrapper .about{
		display: block;
		height: 180px;
	}
	.wrapper .about button{
		margin-top: 20px;
		margin-left: 40px;
		width: 150px; height: 50px;
		border: none;
		outline: none;
		border-radius: 30px;
		cursor: pointer;
		font-size: 20px;
		background: #80d9ff;
		color: #fff;
	}
	.wrapper .about button:hover{
		box-shadow: 0 5px 12px rgba(0,0,0,0.3);
	}
</style>

<body>
	<div class="container">
		<div class="wrapper">
			<div class="hearder">
				<h2>Conformation</h2>
			</div>
			<div class="title">
				<i class="far fa-check-circle"></i>
				<span class="h2">Transaction Successful!</span>
				<span class="h3">Thank You!</span>
			</div>
			<div class="about">
				<form action="" method="post">
					<button name="download"><i class="fas fa-download"></i> Download</button>
					<button name="home"><i class="fas fa-home"></i> Home</button>
				</form>
			</div>
		</div>
	</div>

		<script type="text/javascript" src="assets/js/all.js"></script>
</body>

<?php
	session_start();
	require_once 'includes/config.php';

	if (isset($_POST['download'])) 
	{
		$packID = $_SESSION['pID'];
	    
	    $sql = "SELECT * FROM tbl_package WHERE ID = '$packID'";
	    $result = mysqli_query($conn, $sql);

	    $file = mysqli_fetch_assoc($result);

		$filename = basename($file['PACK_FILE']);
   		$filepath = '../fpanal/packages/' . $filename;

   		 if (file_exists($filepath)) 
		    {
		    	header("Cache-Control: public");
				header("Content-Description: FILe Transfer");
				header("Content-Disposition: attachment; filename=$filename");
				header("Content-Type: application/zip");
				header("Content-Transfer-Emcoding: binary");

				$newCount = $file['DOWNLOADS'] + 1;
		        $updateQuery = "UPDATE tbl_package SET DOWNLOADS=$newCount WHERE ID = '$packID'";
		        mysqli_query($conn, $updateQuery);

				readfile($filepath);
				exit;
	        }      
	    else
	       	{
	        	echo "File does not exits.";
	        }
	     
	}
	if (isset($_POST['home'])) 
	{
	    header('location:index.php');
	}

?>












