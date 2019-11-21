<?php
	
	include '../yangsigAPI/yangsigAPI.php';

	//BUAT DATABASE BARU
	$yangsig = new yangDB();

	// KONEKSI KE DATABASE
	$yangsig->connectDB("transmigrasi","localhost", "root", "");

	// MENGECEK JIKA USERNAME DAN PASSWORD TERSEDIA
	$dataGedungPendidikan = $yangsig->getDataRaw("SELECT `id_gedung_pendidikan`,`unit1_sd`,`lokal1_sd`,`unit2_sd`,`lokal2_sd`,`jumlah_murid_sd`,`unit_smp`,`lokal_smp`,`jumlah_murid_smp`,b.nama_kabsulut,c.nama_upt,d.nama_tahun FROM `gedung_pendidikan` as a INNER JOIN kab_sulut as b ON a.id_kabsulut = b.id_kabsulut INNER JOIN upt as c ON a.id_upt = c.id_upt INNER JOIN tahun as d ON a.id_tahun = d.id_tahun GROUP BY id_gedung_pendidikan",0,0);
	
	$dataTahun = $yangsig->getDataRaw("SELECT DISTINCT b.nama_tahun FROM gedung_pendidikan as a INNER JOIN tahun as b ON a.id_tahun = b.id_tahun",0,0);

	echo json_encode(array("gedung_pendidikan" => $dataGedungPendidikan,"tahun" => $dataTahun));

?>