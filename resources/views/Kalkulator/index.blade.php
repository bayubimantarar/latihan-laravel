<html>
	<head>
		<title></title>
	</head>
	<body>
		<p>Angka Pertama :<input type="number" name="angkapertama" id="angkapertama" /></p>
		<p>Angka Kedua : <input type="number" name="angkakedua" id="angkakedua" /></p>
		<p>Hasil : <input type="number" name="angkakedua" id="hasil" /></p>
		<p><a href="#" id="tambah">Tambah</a> <a href="#" id="bagi">Bagi</a></p>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#tambah").click(function(){
					var angkapertama 	= $("#angkapertama").val();
					var angkakedua 		= $("#angkakedua").val();

					var tambah = eval(angkapertama) + eval(angkakedua);

					$("#hasil").val(tambah);
				});

				$("#bagi").click(function(){
					var angkapertama 	= $("#angkapertama").val();
					var angkakedua 		= $("#angkakedua").val();

					if(angkapertama == 0 || angkakedua == 0){
						alert('Pembagi tidak boleh nol');	
					}else{
						var bagi = eval(angkapertama) / eval(angkakedua);					

						$("#hasil").val(bagi);
					}

				})
			});
		</script>
	</body>
</html>