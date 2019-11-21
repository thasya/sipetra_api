<?php
	header('Access-Control-Allow-Origin: *');
	$api_url = file_get_contents("tabelpemukiman.json");
	echo $api_url;
?>