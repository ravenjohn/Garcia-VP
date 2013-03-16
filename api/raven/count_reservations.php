<?php
	defined('AUTH') or die;
	$query = "SELECT count(*) as reservationCount FROM __reservations WHERE username = '".$_SESSION['username']."';";
