<?php
date_default_timezone_set('Asia/Jakarta');
 include "../config/config.php";
	$tahun = date('Y');
 	$bulan = date('m');
 	$tanggal = date('d');
	$query=	mysqli_fetch_array(mysqli_query($con,"SELECT MIN(gas) as minimal from data_loger where YEAR(waktu)=$tahun and MONTH(waktu)=$bulan and DAY(waktu)=$tanggal"));
	echo round($query['minimal'], 2);
 ?>