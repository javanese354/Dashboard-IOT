<?php
date_default_timezone_set('Asia/Jakarta');
$waktu =  date('Y-m-d H:i:s');

include "../config/config.php";
$gas = $_REQUEST['gas'];
$api = $_REQUEST['api'];
if ($api == 0){
    $api = 'BAHAYA';
}
if ($api == 1){
    $api = 'AMAN';
}

$berat = $_REQUEST['berat'];
$posisi = $_REQUEST['posisi'];
if ($posisi == 0){
    $posisi = 'TERPASANG';
}
if ($posisi == 1){
    $posisi = 'TERLEPAS';
}
$ip = $_SERVER['REMOTE_ADDR'];


if (!empty($gas) && !empty($api) && !empty($berat) && !empty($posisi)) {
  $query = "insert into data_loger set  gas='$gas', api='$api', berat='$berat', posisi='$posisi',  waktu='$waktu'";
  $insert = mysqli_query($con, $query);
  echo "success";
}
else echo "error";
?>