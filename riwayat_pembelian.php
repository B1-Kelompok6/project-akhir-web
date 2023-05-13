<?php 
include 'koneksi.php';

if(!isset($_SESSION['email']) || ($_SESSION['role'] != 'staff')){
  header("Location: login.php");
  exit();
}

$query = "SELECT * FROM riwayat_pemesanan";

if (isset($_GET['search'])) {
  $search = mysqli_real_escape_string($conn, $_GET['search']);
  $query .= " WHERE email_pemesan LIKE '%$search%' OR id_pemesanan LIKE '%$search%'";
}

if (isset($_GET['sort'])) {
  $valid_columns = array('tanggal_tayang');
  $sort = mysqli_real_escape_string($conn, $_GET['sort']);
  if (in_array($sort, $valid_columns)) {
    $query .= " ORDER BY $sort";
  }
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/crud.css">
    <title>Riwayat Pembelian</title>
</head>
<body>
    <div class="container">
        <nav class="wrapper">
            <div class="prof">
                <div class="fname">Cinema</div>
                <div class="lname">KW</div>
            </div>
            <ul class="nav">
              <li><a href="crud_tiket.php">Data Tiket</a></li>
              <li><a href="riwayat_pembelian.php" class="active">Riwayat Pembelian</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <div class="table-riwayat">
          <form method="GET" action="">
            <div class="search-container">
              <input type="text" name="search" placeholder="Search..." class="search-input">
              <button type="submit" class="search-button">Search</button>
            </div>
          </form>
          <div class ="tes">
            <a href="riwayat_pembelian.php" class=btn-secondary>Refresh</a>
          </div>
          <table>
              <thead>
              <tr class="table-judul">           
                <th>No</th>
                <th>Kode Pemesanan</th>
                <th>Tanggal Pemesanan</th>
                <th>Email</th>
                <th>Film</th>
                <th>Tanggal Tayang</th>
                <th>Waktu</th>
                <th>Bioskop</th>
                <th>Jumlah Tiket</th>
                <th class="thh">Total Harga</th>
              </tr>
              </thead>
              <?php
                $i=1;
                while($row = mysqli_fetch_assoc($result)){
              ?>
              <tr class ="isi">
                  <td><?php echo $i?></td>
                  <td><?php echo $row['id_pemesanan']?></td>
                  <td><?php echo $row['tgl_pemesanan']?></td>
                  <td><?php echo $row['email_pemesan']?></td>
                  <td><?php echo $row['film']?></td>
                  <td><?php echo $row['tanggal_tayang']?></td>
                  <td><?php echo $row['waktu']?></td>
                  <td><?php echo $row['bioskop']?></td>
                  <td><?php echo $row['jumlah_tiket']?></td>
                  <td>Rp <?php echo number_format($row['total_harga'], 0, ',', '.'); ?></td>
              </tr>
              <?php
              $i++;
              }
              ?>
          </table>
          <br>
        </div>
    </div>