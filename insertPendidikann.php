<?php

	header('Access-Control-Allow-Origin: *');

	include '../yangsigAPI/yangsigAPI.php';

	$data    = file_get_contents("php://input");
	$request = json_decode($data);

	// REQUESTED FORMAT DATA
	$jlh_unit1_sd 	= $request -> unit1_sd;
	$jlh_lokal1_sd 	= $request -> lokal1_sd;
	$jlh_unit2_sd  = $request -> unit2_sd;
	$jlh_lokal2_sd         = $request -> lokal2_sd;
	$jlh_murid_sd          = $request -> jumlah_murid_sd;
	$jlh_unit1_smp 	= $request -> unit_smp;
	$jlh_lokal1_smp 	= $request -> lokal_smp;
	$jlh_unit2_smp  = $request -> unit_smp;
	$jlh_lokal2_smp         = $request -> lokal_smp;
	$jlh_murid_smp          = $request -> jumlah_murid_smp;
	
	$wedpack_id = md5($vendor_id . $detail . $nama_paket);

	// INSERT INTO USERDATA
	$yansig->insertDataRaw("INSERT INTO `gedung_pendidikan` (id_gedung_pendidikan,id_kabsulut, id_upt, id_tahun, unit1_sd, lokal1_sd), unit2_sd, lokal2_sd, jumlah_murid_sd, unit_smp, lokal_smp, jumlah_murid_smp) VALUES ('".$wedpack_id."','".$vendor_id."','".$nama_paket."','".$detail."','".$harga."')");

	// INSERT INTO VENDOR TYPE TABLE
	$i = 0;
	for ($i=0; $i < sizeof($layanan_paket); $i++) { 
		$wedpack->insertDataRaw("INSERT INTO `wedding_package_detail` (wedpackdet_id,wedpack_id,wedpackdet_type) VALUES('".md5($i.$wedpack_id)."','". $wedpack_id ."','".$layanan_paket[$i]."')");
	}
?>