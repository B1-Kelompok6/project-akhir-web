<?php 
include 'koneksi.php';
if(!isset($_SESSION['email']) || ($_SESSION['role'] != 'admin' && $_SESSION['role'] != 'staff')){
  header("Location: login.php");
  exit();
}


// cek apakah parameter sort di-set
if (isset($_GET['sort'])) {
  // jika parameter sort di-set, ambil nilai sort
  $sort = $_GET['sort'];

  // buat query SQL dengan perintah ORDER BY sesuai dengan nilai sort
  $query = "SELECT * FROM user ORDER BY $sort";
} else {
  // jika parameter sort tidak di-set, tampilkan data tanpa pengurutan
  $query = "SELECT * FROM user";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="crud_user/crud_user.css">
    <title>Document</title>
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
            <li><a href="crud_user.php" class="active">Data User</a></li>
            <li><a href="riwayat_pembelian.php">Riwayat Pembelian</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
  </div>
  </div>
</body>
</html>