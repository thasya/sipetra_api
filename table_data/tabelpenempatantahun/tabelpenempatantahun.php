<?php
	header('Access-Control-Allow-Origin: *');
	$api_url = file_get_contents("tabelinventaris.json");
	echo $api_url;
?>