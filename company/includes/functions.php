<?php

function Redirect_To($new_location)
{
	header('location:'.$new_location);
	exit();
}

?>