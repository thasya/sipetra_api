<?php
	header('Access-Control-Allow-Origin: *');
	$api_url = file_get_contents("tabelguru.json");
	echo $api_url;
?>