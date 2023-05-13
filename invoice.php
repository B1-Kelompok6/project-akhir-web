<?php 
include "koneksi.php";

$id_user = $_GET['id_user'];
$query_invoice = mysqli_query($conn, "SELECT * FROM riwayat_pemesanan WHERE id_user = $id_user ORDER BY id_pemesanan DESC LIMIT 1");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>
    <link rel="stylesheet" type="text/css" href="style/inv.css">
	<style type="text/css">
		
	</style>
</head>
<body>
	<div class="container2">
		<h1>INVOICE</h1>
		<?php 
		if(mysqli_num_rows($query_invoice) > 0){
			$data_invoice = mysqli_fetch_array($query_invoice);		  
		?>
		<table>
			<tr>
				<th>Kode Pemesanan</th>
				<td><?php echo $data_invoice['id_pemesanan']?></td>
			</tr>
			<tr>
				<th>Tanggal Pemesanan</th>
				<td><?php echo $data_invoice['tgl_pemesanan']; ?></td>
			</tr>
			<tr>
				<th>Film</th>
				<td><?php echo $data_invoice['film']; ?></td>
			</tr>
			<tr>
				<th>Tanggal</th>
				<td><?php echo $data_invoice['tanggal_tayang']; ?></td>
			</tr>
			<tr>
            	<th>Waktu</th>
				<td><?php echo $data_invoice['waktu']; ?></td>
			</tr>
			<tr>
            	<th>Bioskop</th>
				<td><?php echo $data_invoice['bioskop']; ?></td>
			</tr>
			<tr>
				<th>Jumlah Tiket</th>
				<td><?php echo $data_invoice['jumlah_tiket']; ?></td>
			</tr>
		</table>

		<p class="total">Total Pembayaran: Rp <?php echo number_format($data_invoice['total_harga'], 0, ',', '.'); ?></p>
        <a href="user_page.php" id="back">Oke</a>

		<?php }else {
		echo "Data riwayat pemesanan tidak tersedia";
		}
		?>
    </div>
</body>
</html>
