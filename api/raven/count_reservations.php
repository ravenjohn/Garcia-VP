<?php
	defined('AUTH') or die;
	$query = "SELECT COUNT(b.name) as reservationCount FROM __reservations a, __packages b WHERE a.packageId = b.id".(($_SESSION['role']=='admin')?" AND status not like '%cancel%'" :" AND email = '".$_SESSION['email']."' AND status not like '%".$_SESSION['email']."%'")." ORDER BY startDate DESC;";
