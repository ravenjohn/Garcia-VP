<?php
	defined('AUTH') or die;
	$query = "SELECT count(*) as reservationCount FROM __reservations WHERE email = '".$_SESSION['email']."';";
