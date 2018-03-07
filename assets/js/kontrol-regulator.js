
	$(document).ready(function(){
		$("#lepaskan").click(function(){
			var data = $('#posisi_regulator_lepaskan').serialize();
			$.ajax({
				type: 'POST',
				url: "function/kontrol-regulator.php",
				data: data,
				success: function() {
					window.alert('Berhasil Melepaskan Regulator');
				}
			});
		});
		$("#pasangkan").click(function(){
			var data = $('#posisi_regulator_pasangkan').serialize();
			$.ajax({
				type: 'POST',
				url: "function/kontrol-regulator.php",
				data: data,
				success: function() {
					window.alert('Berhasil Memasang Regulator');
				}
			});
		});
	});
