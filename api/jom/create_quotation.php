<?php
	defined('AUTH') or die;
	
	$input[] = $_POST['reservationId'];
	$input[] = $_POST['item'];
	$input[] = $_POST['cost'];

	$query[] = "DELETE FROM __quotations WHERE reservationId = '$input[0]'";
	for($i=0;$i<sizeof($input[1]);$i++){
		if(!empty($input[1][$i]) || !empty($input[2][$i])){
			$input[1][$i] = mysqli_escape_string($link,trim($input[1][$i]));
			$input[2][$i] = mysqli_escape_string($link,trim($input[2][$i]));
			$query[] = "INSERT INTO __quotations VALUES('','$input[0]','".$input[1][$i]."','".$input[2][$i]."');";
		}
	}