<!DOCTYPE html>
<html>
<head>
	<title>Invoice Pembelian Tiket Bioskop Online</title>
    <link rel="stylesheet" type="text/css" href="inv.css">
	<style type="text/css">
		
	</style>
</head>
<body>
	<div class="container">
			<nav class="wrapper">
				<div class="prof">
					<div class="fname">Cinema</div>
					<div class="lname">KW</div>
				</div>
				<ul class="nav">
					<li><p></p></li>
					<li><a href="index.php" class="active">Now Playing</a></li>
					<li><a href="upcoming_page.php">Up Coming</a></li>
					<li><a href="about_us.php">About Us</a></li>
					<li><a href="login.php">Login</a></li>
				</ul>
			</nav>
	</div>

	<div class="container2">
		<h1>Invoice Pembelian Tiket Bioskop Online</h1>

		<table>
			<tr>
				<th>Kode Pemesanan</th>
				<td>1</td>
			</tr>
			<tr>
				<th>Tanggal Pemesanan</th>
				<td><?php echo $tgl_pemesan; ?></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><?php echo $email; ?></td>
			</tr>
			<tr>
				<th>Film</th>
				<td><?php echo $film; ?></td>
			</tr>
			<tr>
            <th>Bioskop</th>
				<td><?php echo $bioskop; ?></td>
			</tr>
			<tr>
				<th>Jumlah Tiket</th>
				<td><?php echo $jumlah_tiket; ?></td>
			</tr>
		</table>

		<p class="total">Total Pembayaran: Rp <?php echo number_format($total_harga, 0, ',', '.'); ?></p>
        <a href="user_page.php" id="back">Oke</a>
    </div>
</body>
</html>
