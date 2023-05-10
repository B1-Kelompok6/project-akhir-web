<!DOCTYPE html>
<html>
<head>
	<title>Pop-Up Pemesanan Tiket Bioskop</title>
	<link rel="stylesheet" type="text/css" href="style/pesan.css">
</head>
<body>
	<div class="container2">
		<div class="form-popup" id="myForm">
			<form action="#" class="form-container2">
				<h1>Pemesanan Tiket Bioskop</h1>

				<label for="movie"><b>Film yang dipilih</b></label>
                <p>endgame</p>

				<label for="seat"><b>Jadwal</b></label>
				<p>1 april</p>

				<label for="email"><b>Bioskop</b></label>
				<p>example@gmail.com</p>

				<label for="tiket"><b>Jumlah Tiket</b></label>
				<p id="ticket-count">0</p>

                <label for="harga"><b>Total Harga</b></label>
				<p>40000</p>
        

                <a href="seat.php" id="n" >Batal</a>
                <a href="invoice.php" id="y">Bayar</a>
			</form>
			</div>
		</div>
	

	<script>
		function openForm() {
			document.getElementById("myForm").style.display = "block";
		}

		function closeForm() {
			document.getElementById("myForm").style.display = "none";
		}

		// Menampilkan form saat halaman dimuat
		window.onload = function() {
			openForm();
		}
	</script>

</body>
</html>
