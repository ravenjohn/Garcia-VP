<?php
	defined('AUTH') or die;
	$query = "SELECT a.*, b.* FROM __reservations a, __quotations b WHERE a.status LIKE '%approved%' AND a.id = b.reservationId;";