<?php
	defined('AUTH') or die;
	$query = "SELECT a.*, b.name, b.cost, (SELECT COUNT(c.item) FROM __quotations c WHERE a.id = c.reservationId) > 0 as hasQuotation FROM __reservations a, __packages b WHERE a.packageId = b.id".(($_SESSION['role']=='admin')?" AND status not like '%cancel%'" :" AND email = '".$_SESSION['email']."' AND status not like '%".$_SESSION['email']."%'")." ORDER BY startDate DESC;";
