<?php
date_default_timezone_set('Asia/Jakarta');
$tahun = date('Y');
$bulan = date('m');
$tanggal = date('d');
include "../config/config.php";
$query = mysqli_query($con,"SELECT * from data_loger where YEAR(waktu)=$tahun and MONTH(waktu)=$bulan and DAY(waktu)=$tanggal order by id desc limit 1");
$waktu = mysqli_fetch_array($query);
// CARA PERTAMA	
function waktu_lalu($timestamp)
{
    $selisih = time() - strtotime($timestamp) ;
 
    $detik = $selisih ;
    $menit = round($selisih / 60 );
    $jam = round($selisih / 3600 );
    $hari = round($selisih / 86400 );
    $minggu = round($selisih / 604800 );
    $bulan = round($selisih / 2419200 );
    $tahun = round($selisih / 29030400 );
 
    if ($detik <= 60) {
        $waktu = $detik.' detik yang lalu';
    } else if ($menit <= 60) {
        $waktu = $menit.' menit yang lalu';
    } else if ($jam <= 24) {
        $waktu = $jam.' jam yang lalu';
    } else if ($hari <= 7) {
        $waktu = $hari.' hari yang lalu';
    } else if ($minggu <= 4) {
        $waktu = $minggu.' minggu yang lalu,'.' Pada : '.$timestamp;
    } else if ($bulan <= 12) {
        $waktu = $bulan.' bulan yang lalu,'.' Pada : '.$timestamp;
    } else {
        $waktu = $tahun.' tahun yang lalu,'.' Pada : '.$timestamp;
    }
    
    return $waktu;
}
$data_hari_ini = mysqli_num_rows($query);
if ($data_hari_ini == 0) {
    echo "Tidak Ada Data Hari Ini";
}else{
    echo waktu_lalu($waktu['waktu']);   
}
?>
