<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Monitoring Gas</title>
  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' />
  <link rel="stylesheet" type="text/css" href="css/keen-dashboards.css" />
  <!-- Demo Dependencies -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/docs.min.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/Ionicons/css/ionicons.min.css">
  <!-- Ukuran Icon -->
  <style>
	.size-12 { font-size: 12px; }
    .size-14 { font-size: 14px; }
    .size-16 { font-size: 16px; }
    .size-18 { font-size: 18px; }
    .size-21 { font-size: 21px; }
    .size-24 { font-size: 17px; }
    .size-32 { font-size: 24px; }
    .size-48 { font-size: 30px; }
    .size-64 { font-size: 74px; }
    .size-96 { font-size: 96px; }
	</style>
</head>
<body class="keen-dashboard" style="padding-top: 30px;padding-bottom: 30px;" onload="startTime()">
	<div class="container">
		<div id="peringatan" class="alert alert-danger" role="alert" style="display: none;">
		  <span class="step size-21">
			  <i class="icon ion-alert-circled"></i>
			</span>Peringatan ! Alat tidak berfungsi/dalam keadaan mati, segera periksa dan pastikan alat kembali berfungsi dengan baik. Data terakhir masuk pada <b><span id="time"></span></b>
		</div>
		<div id="kontent_data" style="display: block;">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-4">
						<div class="card text-white bg-info">
							<div class="card-header">MONITORING API </div>
							<div class="card-body">
							  <h2 class="card-title"> <div id="api">Sistem Offline</div></h2>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="card text-white bg-success">
						  <div class="card-header">SISTEM MONITORING GAS | DODY SAMUDRA</div>
						  <div class="card-body">
							<h2 id="clocktime"></h2>
						  </div>
						</div>
					</div>
				</div>
				<br>
			</div>
			<div class="col-sm-4">
				<div class="row">
					<div class="col-sm-12">
						<div class="card bg-light">
							<div class="card-header">ISI GAS</div>
							<div class="card-body">
							   <div id="container2"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="card bg-light">
					<div class="card-header">KONSENTRASI GAS DI UDARA</div>
					<div class="card-body">
					   <div id="test"></div>
					</div>
				</div>
				<br>
			</div>
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-4">
						<div class="card text-white bg-secondary">
							<div class="card-header">
								<span class="step size-21">
									<i class="icon ion-ios-speedometer-outline"></i>
								</span>   POSISI REGULATOR
							</div>
							<div class="card-body">
								<h1><div id="posisi">Sistem Offline</div></h1>
								<input type="text" id="posisi_regulator_lepaskan" name="posisi_regulator" value="0" hidden="">
								<button id="lepaskan" type="button" style="display: none;" class="btn btn-success">
									<span class="step size-21">
										<i class="icon ion-ios-unlocked-outline"></i>
									</span>  LEPASKAN
								</button>
								<input type="text" id="posisi_regulator_pasangkan" name="posisi_regulator" value="1" hidden="">
								<button id="pasangkan" type="button" style="display: none;" class="btn btn-info">
									<span class="step size-21">
									  <i class="icon ion-ios-locked-outline"></i>
									</span>  PASANGKAN</button>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="bd-callout bd-callout-info">
							<h5 id="conveying-meaning-to-assistive-technologies">
								<span class="step size-32">
									<i class="icon ion-information-circled"></i>
								</span> Info Data Monitoring Konsentrasi Gas
							</h5>
							<p> Data yang ditampilkan adalah data yang diperoleh pada hari ini <b><span id="tanggal"></span></b> , sedangkan data yang diperoleh pada hari kemarin tetap tersimpan sebagai Data Loger.</p>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="card text-white bg-warning">
									<div class="card-header">
										<span class="step size-21">
											<i class="icon ion-arrow-graph-up-right"></i>
										</span>   TERTINGGI
									</div>
								<div class="card-body">
									<h1><div id="max"></div> ppm</h1>
								</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="card text-white bg-success">
									<div class="card-header">
										<span class="step size-21">
											<i class="icon ion-arrow-graph-down-right"></i>
										</span>    TERENDAH
									</div>
									<div class="card-body">
										<h1><div id="min"></div>ppm</h1>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="card text-white bg-info">
									<div class="card-header">
										<span class="step size-21">
											<i class="icon ion-arrow-return-right"></i>
										</span>   RATA-RATA
									</div>
									<div class="card-body">
										<h1><div id="average"></div>ppm</h1>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
  <!-- Komponen Highchart -->
  <script src="assets/js/jquery.min.js" type="text/javascript"></script>
  <script src="assets/js/highcharts.js"></script>
  <script src="assets/js/highcharts-more.js"></script>
  <!-- Javascript File yang kita buat -->
  <script src="assets/js/kontrol-regulator.js"></script>
  <script src="assets/js/jam.js"></script>
  <script src="assets/js/waktu-peringatan.js"></script>
  <script src="assets/js/data.js"></script>
  <script src="assets/js/isi-gas.js"></script>
  <script src="assets/js/konsentrasi-gas.js"></script>
  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
