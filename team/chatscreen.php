<style type="text/css">
	body {
		font-family: sans-serif;
	}

	.rply-left {
		width: 50%;
		text-align: right;
		margin-left: 280px;
		margin-bottom: 0px;
		margin-top: 0px;
	}

	.rply-left p {
		margin-bottom: 10px;
		margin-top: 2px;
		font-size: 16px;
		display: inline-block;
		padding: 10px 20px 10px 20px;
		background-color: #fff;
		border-radius: 20px 0px 20px 20px;
		box-shadow: 0 10px 10px rgba(0,0,0,0.2);
	}

	.rply-right {
		width: 50%;
		text-align: left;
		margin-left: 10px;
		margin-bottom: 0px;
		margin-top: 0px;
	}

	.rply-right p {
		margin-bottom: 10px;
		margin-top: 2px;
		font-size: 16px;
		display: inline-block;
		padding: 10px 20px 10px 20px;
		background-color: #585555;
		color: #fff;
		border-radius: 0px 20px 20px 20px;
		box-shadow: 0 10px 10px rgba(0,0,0,0.2);
	}

</style>

<body>
	<?php

		require_once 'includes/config.php';

		$roomID = $_GET['rID'];
        $p_one = $_GET['uID'];
        $p_two = $_GET['eID'];

        $n = "SELECT tbl_team.NAME AS ENAME FROM tbl_team WHERE tbl_team.ID='$p_two'";
        $q_exe = mysqli_query($conn, $n);
        $row = mysqli_fetch_assoc($q_exe);

        $NAME = $row['ENAME'];


        $query = "SELECT MESSAGE, SENDER_ID FROM tbl_message WHERE ROOM_ID='$roomID'";
        $query_exe = mysqli_query($conn, $query);
        while ($chat = mysqli_fetch_assoc($query_exe)) 
        {
            if ($chat['SENDER_ID'] == $p_two) 
            {

                echo '<div class="rply-left"><p align="justify">'.$chat['MESSAGE'].'</p></div>';
            }
            else
            {
                echo '<div class="rply-right"><p align="justify">'.$chat['MESSAGE'].'</p></div>';
            }
                      
        }
	?>
</body>