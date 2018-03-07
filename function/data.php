<?php
date_default_timezone_set('Asia/Jakarta');
 include "../config/config.php";
 	$tahun = date('Y');
 	$bulan = date('m');
 	$tanggal = date('d');
	$query=	mysqli_query($con,"SELECT * from data_loger where YEAR(waktu)=$tahun and MONTH(waktu)=$bulan and DAY(waktu)=$tanggal order by id desc limit 1");

	//Membuat variabel dataloger dengan jenis Array
	$dataloger = array();
	while($row =mysqli_fetch_assoc($query))
	{
	  $dataloger[] = $row;
	}
	//Menampilkan konversi data pada tabel dataloger ke format JSON
	echo json_encode($dataloger);
 ?>
