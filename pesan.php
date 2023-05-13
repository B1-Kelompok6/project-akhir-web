<?php 
include "koneksi.php";

date_default_timezone_set("Asia/Makassar");
$tanggal_pemesanan = date('Y-m-d H:i:s');

$id_user = $_GET['id_user'];

$email_user = mysqli_query($conn, "SELECT email FROM user WHERE id_user = $id_user");
$email_user_row = mysqli_fetch_array($email_user);
$email = $email_user_row['email'];

$id_tiket = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM tiket WHERE id_tiket = $id_tiket");
$data = mysqli_fetch_array($query);
$judul_film = $data['judul_film'];
$tanggal_tayang = $data['jadwal_tayang'];
$waktu = $data['waktu'];

if(isset($_POST['total_harga']) && isset($_POST['jumlah_tiket']) && isset($_POST['bioskop'])){
	$total = $_POST['total_harga'];
	$jumlah_tiket = $_POST['jumlah_tiket'];
	$nama_bioskop = $_POST['bioskop'];
  
	$query_bioskop = mysqli_query($conn, "SELECT id_bioskop FROM bioskop WHERE nama_bioskop = '$nama_bioskop'");
	if(mysqli_num_rows($query_bioskop) == 1) {
	  $hasil_bioskop = mysqli_fetch_array($query_bioskop);
	  $id_bioskop = $hasil_bioskop['id_bioskop'];
	}
	else {
	  echo "Gagal menambahkan riwayat pemesanan. Error: Biosko tidak ditemukan.";
	  exit();
	}
}

if(isset($_POST['submit'])){
	$nama_bioskop1 = $_POST['nama_bioskop'];
	$jumlah_tiket1 = $_POST['jumlah_tiket'];
	$total1 = $_POST['total'];
	$id_bioskop = $_POST['id_bioskop'];

	$query_riwayat = "INSERT INTO riwayat_pemesanan 
	VALUES ('','$tanggal_pemesanan', '$email', '$judul_film', '$tanggal_tayang', '$waktu', '$nama_bioskop1', '$jumlah_tiket1', '$total1', '$id_tiket', '$id_user', '$id_bioskop')";
	$result = mysqli_query($conn, $query_riwayat);

	if($result){
        echo "<script>
            alert('Pembelian tiket berhasil!');
            document.location.href = 'invoice.php?id_user=" . $id_user . "';
        </script>";
		exit();
	} else {
		echo "Pembelian gagal. Error: " . mysqli_error($conn);
	exit();
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
                <p><?php echo $judul_film?></p>

				<label for=""><b>Tanggal</b></label>
				<p><?php echo $tanggal_tayang ?></p>

				<label for=""><b>Waktu</b></label>
				<p><?php echo $waktu?></p>

				<label for="">Bioskop</label>
				<p><?php echo $nama_bioskop?></p>

				<label for=""><b>Jumlah Tiket</b></label>
				<p><?php echo $jumlah_tiket?></p>

                <label for="harga"><b>Total Harga</b></label>
				<p><?php echo "Rp " . number_format($total, 0, ',', '.')?></p>

				<input type="hidden" name="nama_bioskop" value="<?= $nama_bioskop ?>">
				<input type="hidden" name="jumlah_tiket" value="<?= $jumlah_tiket ?>">
				<input type="hidden" name="total" value="<?= $total ?>">
				<input type="hidden" name="id_bioskop" value="<?= $id_bioskop ?>">

                <button type="submit" name="submit">Bayar</button>
			</form>
			</div>
		</div>
</body>
</html>