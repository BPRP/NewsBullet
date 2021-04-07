<?php

	include_once($_SERVER['DOCUMENT_ROOT']."/functions/connexion.php");
	$db = connect();

	$request = "SELECT campaigns.id,
					   campaigns.list_id,
					   lists.name,
					   campaigns.object,
					   campaigns.content,
					   campaigns.date,
					   campaigns.time
				FROM campaigns
				INNER JOIN lists
				ON campaigns.list_id = lists.id
				ORDER BY campaigns.id ASC";

	$result = pg_query($db, $request);
	
	if (!empty($result)) {
		print json_encode(pg_fetch_all($result));
	}else {
        print json_encode("false");
    }

?>
