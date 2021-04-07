<?php
	$link = 'https://' . $_SERVER['HTTP_HOST'];
	// $uri = $_SERVER['REQUEST_URI'];

	switch (isset($_COOKIE['SESSION_ID'])) {
		case false:
			require __DIR__ . '/pages/login.php';
			break;

		case true:
			include_once($_SERVER['DOCUMENT_ROOT']."/functions/admin/checkAdminIdentification.php");
			require __DIR__ . '/pages/board.php';
			break;
		
		default:
			require __DIR__ . '/pages/login.php';
			break;
	}
	
?>
