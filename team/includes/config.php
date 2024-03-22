<?php

    $conn = mysqli_connect("localhost","root","","pms");

    if (!$conn) {
        die("Connection fails" . mysqli_connect_error());
    }


?>