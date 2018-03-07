	var auto_refresh = setInterval(
    function () {
       $.ajax({
	    url         : "function/data.php",
	    type        : "GET",
	    dataType    : "json",
	    dataku        : {get_param : 'value'},
		    success     : function(dataku){
				var gas;
				var berat;
				var tanggal;
				var api;
				var posisi;
				gas = dataku[0]['gas']
				berat = dataku[0]['berat']
				waktu = dataku[0]['waktu']
				api = dataku[0]['api']
				posisi = dataku[0]['posisi']
				var lepaskan = document.getElementById('lepaskan');
				var pasangkan = document.getElementById('pasangkan');
				
				if (posisi == "TERPASANG"){
					lepaskan.style.display = 'block';
					pasangkan.style.display = 'none';
				}else if(posisi == "TERLEPAS"){
					pasangkan.style.display = 'block';
					lepaskan.style.display = 'none';
				}
				document.getElementById("posisi").innerHTML = posisi;
				document.getElementById("api").innerHTML = api;
				document.getElementById("berat").innerHTML = berat;
				document.getElementById("waktu").innerHTML = waktu;
			}
		});
       $('#min').load('function/min.php').fadeIn("slow");
       $('#max').load('function/max.php').fadeIn("slow");
       $('#average').load('function/average.php').fadeIn("slow");
       //$('#time').load('function/time.php').fadeIn("slow");
    }, 100); // refresh setiap 100 milliseconds
