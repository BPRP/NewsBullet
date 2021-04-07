<?php

	include_once($_SERVER['DOCUMENT_ROOT']."/functions/connexion.php");
	$db = connect();

	error_log( print_r($_FILES['campaign_body'], TRUE) );
	error_log( print_r($_FILES['campaign_body']["tmp_name"], TRUE) );

	$request = "INSERT INTO campaigns (list_id, object, content, date, time)
				VALUES ($1, $2, $3, $4, $5)";
    
	$result = pg_query_params(
		$db,
		$request,
		array(
			$_POST['campaign_list'],
			$_POST['campaign_object'],
			file_get_contents($_FILES['campaign_body']["tmp_name"]),
			$_POST['campaign_date'],
			$_POST['campaign_time']
		)
	);

    if (is_resource($result)) {
        print "true";
    }else {
        print "false";
    }

?>
