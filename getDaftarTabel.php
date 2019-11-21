<?php
	
	include '../yangsigAPI/yangsigAPI.php';

	//BUAT DATABASE BARU
	$yangsig = new yangDB();

	// KONEKSI KE DATABASE
	$yangsig->connectDB("transmigrasi","localhost", "root", "");

	// MENGECEK JIKA USERNAME DAN PASSWORD TERSEDIA
	$data = $yangsig->getDataRaw("SELECT * FROM `daftar_tabel`",0,0);
	
	echo json_encode(array("data" => $data));

?>