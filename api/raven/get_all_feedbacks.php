<?php
	defined('AUTH') or die;
	$query = "SELECT a.*, b.fullName FROM __feedbacks a, __users b WHERE ".(($_SESSION['role']=='admin')?"":"a.status != 'PENDING' AND")." b.email = a.email ORDER BY status DESC;";