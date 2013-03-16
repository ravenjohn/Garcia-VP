<?php
	defined('AUTH') or die;
	$query = "SELECT a.*, b.name as packageName FROM __reservations a, __packages b WHERE a.status LIKE '%pending%' and b.id=a.packageId;";