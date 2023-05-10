<?php 
include 'koneksi.php';

if(!isset($_SESSION['email']) || ($_SESSION['role'] != 'admin' && $_SESSION['role'] != 'staff')){
  header("Location: login.php");
  exit();
}

$query = "SELECT * FROM tiket";

if (isset($_GET['search'])) {
  $search = mysqli_real_escape_string($conn, $_GET['search']);
  $query .= " WHERE judul_film LIKE '%$search%'";
}

// cek apakah parameter sort di-set
if (isset($_GET['sort'])) {
  // jika parameter sort di-set, ambil nilai sort dan pastikan hanya memilih kolom yang valid
  $valid_columns = array('judul_film', 'status_film', 'studio');
  $sort = mysqli_real_escape_string($conn, $_GET['sort']);
  if (in_array($sort, $valid_columns)) {
    // buat query SQL dengan perintah ORDER BY sesuai dengan nilai sort
    $query .= " ORDER BY $sort";
  }
}

$result = mysqli_query($conn, $query);

if (!$result) {
  die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/crud.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <nav class="wrapper">
            <div class="prof">
                <div class="fname">Cinema</div>
                <div class="lname">KW</div>
            </div>
            <?php if($_SESSION['role'] == 'admin'): ?>
            <ul class="nav">
              <li><a href="crud_tiket.php" class="active">Data Tiket</a></li>
              <li><a href="crud_user.php">Data User</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
            <?php else: ?>
            <ul class="nav">
              <li><a href="crud_tiket.php" class="active">Data Tiket</a></li>
              <li><a href="riwayat_pembelian.php">Riwayat Pembelian</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
            <?php endif; ?>
        </nav>
        <div class="table-tiket">
        <form method="GET" action="">
          <div class="search-container">
            <input type="text" name="search" placeholder="Search..." class="search-input">
            <button type="submit" class="search-button">Search</button>
          </div>
        </form>
        <div class ="tes">
          <a href="crud_tiket/create.php" class="btn-primary">Add Data</a>
          <a href="crud_tiket.php" class=btn-secondary>Refresh</a>
        </div>
        <table>
            <thead>
            <tr class="table-judul">           
              <th>No</th>
              <th>Poster</th>
              <th class="jd"><a style="color:orange" href="?sort=judul_film">Judul Film</a></th>
              <th class="rl"><a style="color:orange" href="?sort=status_film">Status</a></th>
              <th class="jt">Jadwal Tayang</th>
              <th class="wt">Waktu</th>
              <th class="ht">Harga Tiket</th>
              <th class="dr">Durasi</th>
              <th>Rating</th>
              <th><a style="color:orange" href="?sort=studio">Studio</a></th>
              <th>Set</th>
            </tr>
            </thead>
            <?php
              $i=1;
              while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $i?></td>
                <td><img src="data:image/jpeg;base64,<?php echo base64_encode($row['poster']); ?>" alt="poster" style="max-width: 100px; max-height: 150px;"></td>
                <td><?php echo $row['judul_film']?></td>
                <td><?php echo $row['status_film']?></td>
                <td><?php echo $row['jadwal_tayang']?></td>
                <td><?php echo $row['waktu']?></td>
                <td>Rp <?php echo number_format($row['harga_tiket'], 0, ',', '.'); ?></td>
                <td><?php echo $row['durasi']?> Min.</td>
                <td><?php echo $row['rating']?></td>
                <td><?php echo $row['studio']?></td>
                <td class="set">
                    <a href="crud_tiket/update.php?id=<?php echo $row['id_tiket']?>" class="btn-danger-tiket" role="button">Update</a><br>
                    <a href="crud_tiket/delete.php?id=<?php echo $row['id_tiket']?>" class="btn-warning-tiket" role="button">Delete</a>
                </td>
            </tr>
            <?php
            $i++;
            }
            ?>
        </table>
        <br>
    </div>
  </div>
</body>
</html>
