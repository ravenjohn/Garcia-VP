<?php
	defined('AUTH') or die;
	$query = "SELECT a.*, b.fullName FROM __feedbacks a, __users b WHERE ".(isset($_SESSION['role']) && ($_SESSION['role']=='admin')?"":"a.status = '1' AND")." b.email = a.email ORDER BY status DESC;";