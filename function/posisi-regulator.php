<?php
 header("Content-type: text/json");
 include "../config/config.php";
	$query=	mysqli_query($con,"SELECT * from kendali_regulator limit 1");
	$tampil = mysqli_fetch_array($query);
	echo json_encode($tampil['posisi_regulator']);
 ?>