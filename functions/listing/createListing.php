<?php

	include_once($_SERVER['DOCUMENT_ROOT']."/functions/connexion.php");
	$db = connect();

	$request = "INSERT INTO lists (name)
				VALUES ($1)";
    
	$result = pg_query_params(
		$db,
		$request,
		array(
			$_POST['list_name']
		)
	);

    if (is_resource($result)) {
        print "true";
    }else {
        print "false";
    }

?>
