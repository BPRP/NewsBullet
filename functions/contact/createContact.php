<?php

	include_once($_SERVER['DOCUMENT_ROOT']."/functions/connexion.php");
	$db = connect();

	$request = "INSERT INTO contacts (email, list_id)
				VALUES ($1, $2)";
    
	$result = pg_query_params(
		$db,
		$request,
		array(
			$_POST['email'],
			$_POST['list_id']
		)
	);

    if (is_resource($result)) {
        print "true";
    }else {
        print "false";
    }

?>
