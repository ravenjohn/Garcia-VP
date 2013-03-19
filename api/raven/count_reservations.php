<?php
	defined('AUTH') or die;
	$query = "SELECT count(*) as reservationCount FROM __reservations".(($_SESSION['role']=='admin')?";":" WHERE email = '".$_SESSION['email']."';");
