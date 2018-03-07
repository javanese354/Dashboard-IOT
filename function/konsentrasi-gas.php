<?php
date_default_timezone_set('Asia/Jakarta'); 
/*
header("Content-type: text/json");
$x = time() * 1000;
$y = rand(0, 100);
$ret = array($x, $y);
echo json_encode($ret);
//$jam =  date("h:i:s");
//echo (strtotime($jam)*1000);

*/
	$tahun = date('Y');
 	$bulan = date('m');
 	$tanggal = date('d');
	header("Content-type: text/json");
 	include "../config/config.php";
	$query=	mysqli_query($con,"SELECT * from data_loger where YEAR(waktu)=$tahun and MONTH(waktu)=$bulan and DAY(waktu)=$tanggal order by id desc limit 1");
	$query_tampil_data = mysqli_fetch_array($query);
	$waktu = $query_tampil_data['waktu'];
	$gas = $query_tampil_data['gas'];
	$date = $waktu;
	$date = strtotime($date);
	$waktudata = date('H:i:s', $date);
	//$x = (strtotime($waktudata)*1000);
	$x = time() * 1000;
	$y = $gas;
	echo "[".$x.",".$y."]";
	//$ret = array($x, $y);
	//echo json_encode($ret);

?>
