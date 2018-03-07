<?php
date_default_timezone_set('Asia/Jakarta');
include "../config/config.php";
    $tahun = date('Y');
    $bulan = date('m');
    $tanggal = date('d');
    $query = mysqli_query($con,"SELECT * FROM data_loger where YEAR(waktu)=$tahun and MONTH(waktu)=$bulan and DAY(waktu)=$tanggal order by id desc limit 1");
    $tmp = mysqli_fetch_array($query); 
    $berat =  round($tmp['berat'] / 1000,2);
    $beratgas = ($berat - 3);
    if ($beratgas < 0){
       $beratgas = 0.00; 
    }
	echo $beratgas;
    
 ?>