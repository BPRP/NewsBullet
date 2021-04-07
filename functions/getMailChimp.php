<?php

	include_once($_SERVER['DOCUMENT_ROOT']."/functions/connexion.php");
	$db = connect();

	$request = "SELECT *
				FROM mailchimp
				WHERE id='1'";
				
	$result = pg_query($db, $request);
	$val = pg_fetch_all($result);
	
	foreach ($val as $key => $value) {
		$key = $value['key'];
		$label = $value['label'];
	}

	$server = "https://us19.admin.mailchimp.com/";

	include_once($_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php");

	$mailchimp = new \MailchimpMarketing\ApiClient();

	$mailchimp->setConfig([
		'apiKey' => $key,
		'server' => $server
	]);

	$response = $mailchimp->ping->get();
	print_r($response);

?>