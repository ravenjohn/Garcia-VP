<?php
	defined('AUTH') or die;
	$query = "SELECT * FROM __reservations WHERE status LIKE '%pending%';";