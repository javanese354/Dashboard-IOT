<?php 
include "../config/config.php";
$posisi_regulator = $_POST['posisi_regulator'];

$query = "UPDATE kendali_regulator SET posisi_regulator='$posisi_regulator' WHERE id='1'";
$insert = mysqli_query($con, $query);
?>
