<?php
	defined('AUTH') or die;
	$query = "SELECT a.*, UNIX_TIMESTAMP(a.startDate) as startDate, UNIX_TIMESTAMP(a.endDate) as endDate, b.name FROM __reservations a, __packages b WHERE a.packageId = b.id".(($_SESSION['role']==='admin')?";":" AND email = '".$_SESSION['email']."'"." ORDER BY startDate DESC;");
