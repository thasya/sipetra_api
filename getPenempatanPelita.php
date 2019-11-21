<?php
	
	include '../yangsigAPI/yangsigAPI.php';

	//BUAT DATABASE BARU
	$yangsig = new yangDB();

	// KONEKSI KE DATABASE
	$yangsig->connectDB("transmigrasi","localhost", "root", "");

	// MENGECEK JIKA USERNAME DAN PASSWORD TERSEDIA
	$dataKabupaten = $yangsig->getDataRaw("SELECT * FROM `kab_sulut` ",0,0);
	$dataUpt = $yangsig->getDataRaw("SELECT * FROM `upt` ",0,0);
	$dataDaerahAsal = $yangsig->getDataRaw("SELECT * FROM `daerah_asal` ",0,0);
	$dataTahun = $yangsig->getDataRaw("SELECT * FROM `tahun` ",0,0);

	echo json_encode(array("kab" => $dataKabupaten, "upt" => $dataUpt, "daerahasal" => $dataDaerahAsal, "tahun" => $dataTahun));

?>