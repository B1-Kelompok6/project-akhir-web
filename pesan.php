<?php 
include "koneksi.php";

$tanggal_pemesanan = date('Y-m-d');

$id_user = $_GET['id_user'];
$email_user = mysqli_query($conn, "SELECT email FROM user WHERE id_user = $id_user");

$id_tiket = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM tiket WHERE id_tiket = $id_tiket");
$data  = mysqli_fetch_array($query);
$judul_film = $data['judul_film'];
$tanggal_tayang = $data['jadwal_tayang'];
$waktu = $data['waktu'];


$total= $_POST['total_harga'];
$jumlah_tiket=$_POST['jumlah_tiket'];
$nama_bioskop = $_POST['theater'];
$query_bioskop = mysqli_query($conn, "SELECT id_bioskop FROM bioskop WHERE nama_bioskop = '$nama_bioskop'");
if(mysqli_num_rows($query_bioskop) == 1) {
  $hasil_bioskop = mysqli_fetch_array($query_bioskop);
  $id_bioskop = $hasil_bioskop['id_bioskop'];
}
else {
  echo "Gagal menambahkan riwayat pemesanan. Error: Bioskop tidak ditemukan.";
  exit();
}

if(isset($_POST['submit'])){
  $query_riwayat = "INSERT INTO riwayat_pemesanan 
  VALUES ('','$tanggal_pemesanan', '" . mysqli_fetch_array($email_user)['email'] . "', 
  '$judul_film', '$tanggal_tayang', '$waktu', '$nama_bioskop', '$jumlah_tiket', '$total', 
  '$id_tiket', '$id_user', '$id_bioskop')";
  $result = mysqli_query($conn, $query_riwayat);
  if($result){
    //jika berhasil, redirect ke halaman riwayat pemesanan
    header("Location: invoice.php");
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

                <button type="submit" name="submit">Bayar</button>
			</form>
			</div>
		</div>

</body>
</html>