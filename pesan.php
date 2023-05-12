<?php 
include "koneksi.php";

$id_tiket = $_GET['id'];
$id_user = $_GET['id_user'];

$query = mysqli_query($conn, "SELECT * FROM tiket WHERE id_tiket = $id_tiket");
$data  = mysqli_fetch_array($query);



$theater = $_POST['theater'];
$total= $_POST['total_harga'];
$jumlah_tiket=$_POST['jumlah_tiket'];

if(isset($_POST['submit'])){
    $query_riwayat = "INSERT INTO riwayat_pemesanan VALUES ('','$id_user', '$id_tiket', '$theater')";
    $result = mysqli_query($conn, $query_riwayat);
    if($result){
        //jika berhasil, redirect ke halaman riwayat pemesanan
        header("Location: riwayat_pemesanan.php");
    } else {
        //jika gagal, tampilkan pesan error
        echo "Gagal menambahkan riwayat pemesanan. Error: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Pop-Up Pemesanan Tiket Bioskop</title>
	<link rel="stylesheet" type="text/css" href="style/pesan.css">
</head>
<body>
	<div class="container2">
		<div class="form-popup" id="myForm">
			<form action="#" method="post" class="form-container2">
				<h1>Konfirmasi Pemesanan</h1>

				<label for=""><b>Film</b></label>
                <p><?php echo $data['judul_film']?></p>

				<label for=""><b>Tanggal</b></label>
				<p><?php echo $data['jadwal_tayang'] ?></p>

				<label for=""><b>Waktu</b></label>
				<p><?php echo $data['waktu']?></p>

				<label for="">Bioskop</label>
				<p><?php echo $theater?></p>

				<label for=""><b>Jumlah Tiket</b></label>
				<p><?php echo $jumlah_tiket?></p>

                <label for="harga"><b>Total Harga</b></label>
				<p><?php echo "Rp " . number_format($total, 0, ',', '.')?></p>

                <button type="submit" name="submit" id="submit">Bayar</button>
			</form>
			</div>
		</div>

</body>
</html>