<?php

	include_once($_SERVER['DOCUMENT_ROOT']."/functions/connexion.php");
	$db = connect();

	$request = "SELECT contacts.id,
					   contacts.email,
					   contacts.list_id,
					   lists.name
				FROM contacts
				INNER JOIN lists
				ON contacts.list_id = lists.id
				ORDER BY contacts.id ASC";

	$result = pg_query($db, $request);
	
	if (!empty($result)) {
		print json_encode(pg_fetch_all($result));
	}else {
        print json_encode("false");
    }

?>
