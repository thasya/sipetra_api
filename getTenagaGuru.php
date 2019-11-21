<?php
	
	include '../yangsigAPI/yangsigAPI.php';

	//BUAT DATABASE BARU
	$yangsig = new yangDB();

	// KONEKSI KE DATABASE
	$yangsig->connectDB("transmigrasi","localhost", "root", "");

	// MENGECEK JIKA USERNAME DAN PASSWORD TERSEDIA
	$dataGuru = $yangsig->getDataRaw("SELECT `id_guru`,`jumlah_guru_pns_tk`,`jumlah_guru_honor_tk`,`jumlah_guru_tk`,`jumlah_guru_pns_sd`,`jumlah_guru_pns_sd`,`jumlah_guru_honor_sd`,`jumlah_guru_sd`,`jumlah_guru_pns_smp`,`jumlah_guru_honor_smp`,`jumlah_guru_smp`,b.nama_kabsulut,c.nama_upt,d.nama_tahun FROM `guru` as a INNER JOIN kab_sulut as b ON a.id_kabsulut = b.id_kabsulut INNER JOIN upt as c ON a.id_upt = c.id_upt INNER JOIN tahun as d ON a.id_tahun = d.id_tahun GROUP BY id_guru",0,0);
	
	$dataTahun = $yangsig->getDataRaw("SELECT DISTINCT b.nama_tahun FROM guru as a INNER JOIN tahun as b ON a.id_tahun = b.id_tahun",0,0);

	echo json_encode(array("guru" => $dataGuru,"tahun" => $dataTahun));

?>