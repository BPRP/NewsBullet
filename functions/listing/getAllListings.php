<?php

	include_once($_SERVER['DOCUMENT_ROOT']."/functions/connexion.php");
	$db = connect();

	$request = "SELECT *
				FROM lists
				ORDER BY id ASC";

	$result = pg_query($db, $request);
    
	if (!empty($result)) {
		$val = pg_fetch_all($result);
		print json_encode($val);
	}

?>
